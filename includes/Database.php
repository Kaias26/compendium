<?php

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        $dsn = 'mysql:host=' . DB_SERVERNAME . ';dbname=' . DB_NAME . ';charset=utf8mb4';
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->connection = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
        } catch (PDOException $e) {
            // Log the error for debugging purposes
            error_log("Database connection error: " . $e->getMessage());
            // Redirect to home with a flash message
            set_flash_message('danger', 'Impossible de se connecter à la base de données. Veuillez réessayer plus tard.');
            header('Location: /home');
            exit;
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

    public function execute_query(string $sql, array $params = []): PDOStatement
    {
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            // Log the error for debugging purposes
            error_log("Database query error: " . $e->getMessage());
            // Redirect to home with a flash message
            set_flash_message('danger', 'Un problème est survenu lors de l\'accès aux données. Veuillez réessayer plus tard.');
            header('Location: /home');
            exit;
        }
    }

    // Prevent cloning the instance
    private function __clone() {}

    // Prevent unserializing the instance
    public function __wakeup() {}
}