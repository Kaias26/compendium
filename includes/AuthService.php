<?php

require_once("Database.php");

class AuthService
{
    private $conn;
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        $this->conn = $db->getConnection();
    }

    /****************/
    /*** REGISTER ***/
    /****************/
    public function register(string $username, string $password, string $email): bool
    {
        $sql = 'INSERT INTO users(username, email, password)
                VALUES(:username, :email, :password)';

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $params = [
            ':username' => $username,
            ':email' => $email,
            ':password' => $password_hash
        ];

        $statement = $this->db->execute_query($sql, $params);
        return $statement->rowCount() > 0;
    }

    /**************/
    /*** UPDATE ***/
    /**************/
    public function update(int $id, string $username, string $password, string $email): bool
    {
        $sql = 'UPDATE users set username = :username, email = :email, password = :password
                WHERE id = :id';

        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $params = [
            ':username' => $username,
            ':email' => $email,
            ':password' => $password_hash,
            ':id' => $id
        ];

        $statement = $this->db->execute_query($sql, $params);
        return $statement->rowCount() > 0;
    }

    /************/
    /*** AUTH ***/
    /************/
    public function login(string $username, string $password, bool $remember = false): bool
    {
        $user = $this->find_user_by_username($username);

        if ($user && password_verify($password, $user['password'])) {
            $this->log_user_in($user);

            if ($remember) {
                $this->remember_me($user['id']);
            }

            return true;
        }

        return false;
    }

    public function log_user_in(array $user): bool
    {
        session_regenerate_id(true);
        // set username & id in the session
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        return true;
    }

    public function find_user_by_username(string $username)
    {
        $sql = 'SELECT id, username, password, email
                FROM users
                WHERE username = :username
                LIMIT 1';

        $statement = $this->db->execute_query($sql, [':username' => $username]);
        return $statement->fetch();
    }

    public function find_user_by_email(string $email)
    {
        $sql = 'SELECT id, username, password, email
                FROM users
                WHERE email = :email
                LIMIT 1';

        $statement = $this->db->execute_query($sql, [':email' => $email]);
        return $statement->fetch();
    }

    public function find_user_by_id(int $id)
    {
        $sql = 'SELECT id, username, password, email
                FROM users
                WHERE id = :id
                LIMIT 1';

        $statement = $this->db->execute_query($sql, [':id' => $id]);
        return $statement->fetch();
    }

    public function logout(): void
    {
        if ($this->is_user_logged_in()) {

            // delete the user token
            $this->delete_user_token($_SESSION['user_id']);

            // delete session
            unset($_SESSION['username'], $_SESSION['user_id`']);

            // remove the remember_me cookie
            if (isset($_COOKIE['remember_me'])) {
                unset($_COOKIE['remember_me']);
                setcookie('remember_user', null, -1);
            }
        }
    }

    public function is_user_logged_in(): bool
    {
        // check the session
        if (isset($_SESSION['username'])) {
            return true;
        }

        // check the remember_me in cookie
        $token = filter_input(INPUT_COOKIE, 'remember_me', FILTER_SANITIZE_STRING);

        if ($token && $this->token_is_valid($token)) {

            $user = $this->find_user_by_token($token);
            if ($user) {
                return $this->log_user_in($user);
            }
        }
        return false;
    }

    /****************/
    /*** REMEMBER ***/
    /****************/
    public function remember_me(int $user_id, int $day = 30)
    {
        [$selector, $validator, $token] = $this->generate_tokens();

        // remove all existing token associated with the user id
        $this->delete_user_token($user_id);

        // set expiration date
        $expired_seconds = time() + 60 * 60 * 24 * $day;

        // insert a token to the database
        $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
        $expiry = date('Y-m-d H:i:s', $expired_seconds);

        if ($this->insert_user_token($user_id, $selector, $hash_validator, $expiry)) {
            setcookie('remember_me', $token, $expired_seconds);
        }
    }

    /****************/
    /*** TOKENS ***/
    /****************/
    public function generate_tokens(): array
    {
        $selector = bin2hex(random_bytes(16));
        $validator = bin2hex(random_bytes(32));

        return [$selector, $validator, $selector . ':' . $validator];
    }

    public function parse_token(string $token): ?array
    {
        $parts = explode(':', $token);

        if ($parts && count($parts) == 2) {
            return [$parts[0], $parts[1]];
        }
        return null;
    }

    public function insert_user_token(int $user_id, string $selector, string $hashed_validator, string $expiry): bool
    {
        $sql = 'INSERT INTO user_tokens(user_id, selector, hashed_validator, expiry)
                VALUES(:user_id, :selector, :hashed_validator, :expiry)';

        $params = [
            ':user_id' => $user_id,
            ':selector' => $selector,
            ':hashed_validator' => $hashed_validator,
            ':expiry' => $expiry
        ];

        $statement = $this->db->execute_query($sql, $params);
        return $statement->rowCount() > 0;
    }

    public function find_user_token_by_selector(string $selector)
    {
        $sql = 'SELECT id, selector, hashed_validator, user_id, expiry
                FROM user_tokens
                WHERE selector = :selector AND
                expiry >= NOW()
                LIMIT 1';

        $statement = $this->db->execute_query($sql, [':selector' => $selector]);
        return $statement->fetch();
    }

    public function delete_user_token(int $user_id): bool
    {
        $sql = 'DELETE FROM user_tokens WHERE user_id = :user_id';
        $statement = $this->db->execute_query($sql, [':user_id' => $user_id]);
        return $statement->rowCount() > 0;
    }

    public function find_user_by_token(string $token)
    {
        $tokens = $this->parse_token($token);

        if (!$tokens) {
            return null;
        }

        $sql = 'SELECT users.id, username
                FROM users
                INNER JOIN user_tokens ON user_id = users.id
                WHERE selector = :selector AND
                expiry > NOW()
                LIMIT 1';

        $statement = $this->db->execute_query($sql, [':selector' => $tokens[0]]);
        return $statement->fetch();
    }

    public function token_is_valid(string $token): bool
    {
        [$selector, $validator] = $this->parse_token($token);

        $tokens = $this->find_user_token_by_selector($selector);
        if (!$tokens) {
            return false;
        }

        return password_verify($validator, $tokens['hashed_validator']);
    }
}
