<?php

class Database
{
    private static $instance = null;
    private $connection;

    private function __construct()
    {
        // Use constants defined in config_local.php
        $servername = DB_SERVERNAME;
        $username = DB_USERNAME;
        $password = DB_PASSWORD;
        $dbname = DB_NAME;

        // Create connection
        $this->connection = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        $this->connection->set_charset('utf8');
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection(): mysqli
    {
        return $this->connection;
    }

    public function execute_query(string $sql, string $param_types = '', ...$params) {
        if ($statement = $this->connection->prepare($sql)) {
            if (!empty($param_types)) {
                $statement->bind_param($param_types, ...$params);
            }
            $statement->execute();
            $result = $statement->get_result();
            return $result;
        } else {
            // Log the error for debugging purposes
            error_log("Database query error: " . $this->connection->error);
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
