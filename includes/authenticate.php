<?php 
// Au submit du formulaire Login, vérifie l'authentification
if( isset( $_POST['login'] ) ) {
    $username = stripslashes( $_POST['username'] );
    $username = mysqli_real_escape_string( $conn, $username );
    $password = stripslashes( $_POST['password'] );
    $password = mysqli_real_escape_string( $conn, $password );  

    if( empty( $username ) ) $erreur="L'identifiant est obligatoire";
    elseif( empty( $password ) ) $erreur="Le mot de passe est oblibatoire";
    else {
    
        if( login( $username, $password, isset( $_POST['remember_me'] ) ) ) {
            echo '<meta http-equiv="refresh" content="0; URL=/vault/home">';
            die();
        } else  {
            $message = "L'identifiant ou le mot de passe est incorrect.";
        }
    }
}


// Au submit du formulaire Register, vérifie l'authentification
if( isset( $_POST["register"] ) ) {
    // récupérer le post et supprimer les antislashes ajoutés par le formulaire
    $username = stripslashes( $_POST['username'] );
    $username = mysqli_real_escape_string( $conn, $username );
    $password = stripslashes( $_POST['password'] );
    $password = mysqli_real_escape_string( $conn, $password );
    $confirmPassword = stripslashes( $_POST['confirmPassword'] );
    $confirmPassword = mysqli_real_escape_string( $conn, $confirmPassword );
    $email = stripslashes( $_POST['email'] );
    $email = mysqli_real_escape_string( $conn, $email );

    if( empty( $username ) ) $erreur="L'identifiant est obligatoire";
    elseif( empty( $password ) ) $erreur="Le mot de passe est oblibatoire";
    elseif( $password != $confirmPassword ) $erreur="Les mots des passes ne sont pas identiques";
    elseif( empty( $email ) ) $erreur="L'email est oblibatoire";
    elseif( !filter_var( $email, FILTER_VALIDATE_EMAIL) ) $erreur="L'email n'est pas valide";
    else{
        
        $user = find_user_by_username( $username );
        
        if( $user ) {
            $erreur = "Cet identifiant existe déjà.";
        } else {
            $user = find_user_by_email( $email );
            
            if( $user ) {
                $erreur = "Cette adresse email existe déjà.";
            } else {
                if( register( $username, $password, $email ) ) {
                    $success = true;
                } else {
                    $erreur = "Une erreur s'est produite, impossible de créer le compte.";
                }
            }
        }
    }
}

if( $group == 'logout' )
{
    logout();
}

/****************/
/*** REGISTER ***/
/****************/
function register( string $username, string $password, string $email ): bool
{
	global $conn;
    $sql = 'INSERT INTO users(username, email, password)
            VALUES(?, ?, ?)';

    $statement = $conn->prepare($sql);
    $statement->bind_param( 'sss', $username, $email, password_hash($password, PASSWORD_DEFAULT) );

    return $statement->execute();
}

/************/
/*** AUTH ***/
/************/
function login( string $username, string $password, bool $remember = false ): bool
{	
	$user = find_user_by_username( $username );

	if( $user && password_verify( $password, $user['password'] ) ) {
		//log_user_in( $user );

		if( $remember ) {
			remember_me( $user['id'] );
		}

		return true;
	}

	return false;
}

function log_user_in(array $user): bool
{
	// set username & id in the session
	$_SESSION['username'] = $user['username'];
	$_SESSION['user_id'] = $user['id'];
	return true;
}

function find_user_by_username( string $username )
{
	global $conn;
	$sql = 'SELECT id, username, password, email
				FROM users
				WHERE username = ?
				LIMIT 1';

	if( $statement = $conn->prepare($sql) ) {
		$statement->bind_param('s', $username);
		$statement->execute();
		$result = $statement->get_result();
		return $result->fetch_assoc();
	}
	exit;
}

function find_user_by_email( string $email )
{
	global $conn;
	$sql = 'SELECT id, username, password, email
				FROM users
				WHERE email = ?
				LIMIT 1';

	if( $statement = $conn->prepare($sql) ) {
		$statement->bind_param('s', $email);
		$statement->execute();
		$result = $statement->get_result();
		return $result->fetch_assoc();
	}
	exit;
}

function logout(): void
{
    if( is_user_logged_in() ) {

        // delete the user token
        delete_user_token($_SESSION['user_id']);

        // delete session
        unset($_SESSION['username'], $_SESSION['user_id`']);

        // remove the remember_me cookie
        if (isset($_COOKIE['remember_me'])) {
            unset($_COOKIE['remember_me']);
            setcookie('remember_user', null, -1);
        }
    }
}

function is_user_logged_in(): bool
{
    // check the session
    if (isset($_SESSION['username'])) {
        return true;
    }

    // check the remember_me in cookie
    $token = filter_input(INPUT_COOKIE, 'remember_me', FILTER_SANITIZE_STRING);

    if ($token && token_is_valid($token)) {

        $user = find_user_by_token($token);

        if ($user) {
            return log_user_in($user);
        }
    }
    return false;
}

/****************/
/*** REMEMBER ***/
/****************/
function remember_me(int $user_id, int $day = 30)
{
    [$selector, $validator, $token] = generate_tokens();

    // remove all existing token associated with the user id
    delete_user_token($user_id);

    // set expiration date
    $expired_seconds = time() + 60 * 60 * 24 * $day;

    // insert a token to the database
    $hash_validator = password_hash($validator, PASSWORD_DEFAULT);
    $expiry = date('Y-m-d H:i:s', $expired_seconds);

    if (insert_user_token($user_id, $selector, $hash_validator, $expiry)) {
        setcookie('remember_me', $token, $expired_seconds);
    }
    exit();
}

function generate_tokens(): array
{
    $selector = bin2hex(random_bytes(16));
    $validator = bin2hex(random_bytes(32));

    return [$selector, $validator, $selector . ':' . $validator];
}

function parse_token(string $token): ?array
{
    $parts = explode(':', $token);

    if ($parts && count($parts) == 2) {
        return [$parts[0], $parts[1]];
    }
    return null;
}

function insert_user_token(int $user_id, string $selector, string $hashed_validator, string $expiry): bool
{
	global $conn;
    $sql = 'INSERT INTO user_tokens(user_id, selector, hashed_validator, expiry)
            VALUES(?, ?, ?, ?)';

    $statement = $conn->prepare($sql);
    $statement->bind_param('isss', $user_id, $selector, $hashed_validator, $expiry);

    return $statement->execute();
}

function find_user_token_by_selector(string $selector)
{
	global $conn;
    $sql = 'SELECT id, selector, hashed_validator, user_id, expiry
                FROM user_tokens
                WHERE selector = ? AND
                    expiry >= now()
                LIMIT 1';

    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $selector);

    $statement->execute();
    $result = $statement->get_result();

	return $result->fetch_assoc();
}

function delete_user_token(int $user_id): bool
{
	global $conn;
    $sql = 'DELETE FROM user_tokens WHERE user_id = ?';
    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $user_id);

    return $statement->execute();
}

function find_user_by_token(string $token)
{
	global $conn;
    $tokens = parse_token($token);

    if (!$tokens) {
        return null;
    }

    $sql = 'SELECT users.id, username
            FROM users
            INNER JOIN user_tokens ON user_id = users.id
            WHERE selector = ? AND
                expiry > now()
            LIMIT 1';

    $statement = $conn->prepare($sql);
    $statement->bind_param('s', $tokens[0]);
    $statement->execute();
    $result = $statement->get_result();

	return $result->fetch_assoc();
}

function token_is_valid(string $token): bool { // parse the token to get the selector and validator 
	[$selector, $validator] = parse_token($token);

	$tokens = find_user_token_by_selector($selector);
	if (!$tokens) {
    	return false;
	}

	return password_verify($validator, $tokens['hashed_validator']);
}
?>