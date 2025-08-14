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
            // Re-throw the exception or handle it more gracefully if needed at a higher level
            throw new Exception('Impossible de se connecter à la base de données.', 0, $e);
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
            // Re-throw the exception to be caught by the calling code
            throw $e;
        }
    }

    // Prevent cloning the instance
    private function __clone() {}

    // Prevent unserializing the instance
    public function __wakeup() {}

    public static function createInClauseParams(array $idArray, string $paramPrefix): array
    {
        $ids = array_filter(array_map('intval', $idArray), fn($value) => is_numeric($value));
        $placeholders = [];
        $params = [];
        if (empty($ids)) {
            return ['placeholders' => 'NULL', 'params' => [], 'ids' => []];
        }
        foreach ($ids as $index => $id) {
            $placeholder = $paramPrefix . '_' . $index;
            $placeholders[] = ':' . $placeholder;
            $params[$placeholder] = $id;
        }
        return ['placeholders' => implode(', ', $placeholders), 'params' => $params, 'ids' => $ids];
    }

    public function fetch_items_by_category(string $categoryName): array
    {
        $sql = "SELECT c.id AS idObjet, c.name, cf.key, cf.value
                FROM compendium_group AS cg
                JOIN compendium AS c ON c.idGroup = cg.id
                JOIN compendium_fields AS cf ON cf.idCompendium = c.id
                WHERE cg.group = :category
                ORDER BY c.id";

        try {
            $stmt = $this->execute_query($sql, ['category' => $categoryName]);
            $results = $stmt->fetchAll();
        } catch (Exception $e) {
            error_log("Error fetching items for category '$categoryName': " . $e->getMessage());
            return [];
        }

        $items = [];
        foreach ($results as $row) {
            $itemId = $row['idObjet'];
            $itemName = $row['name'];
            $key = $row['key'];
            $value = $row['value'];

            if (!isset($items[$itemId])) {
                $items[$itemId] = ['id' => $itemId, 'name' => $itemName];
            }

            $safeKey = strtolower(trim($key));
            $items[$itemId][$safeKey] = $value;
        }
        
        foreach ($items as &$item) {
            if (!isset($item['prix'])) {
                $item['prix'] = 0;
            }
        }

        usort($items, fn($a, $b) => (int)$a['prix'] <=> (int)$b['prix']);

        return $items;
    }
}
