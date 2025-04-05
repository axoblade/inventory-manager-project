<?php
class MySQLDatabase
{
    private $connection;

    /**
     * Constructor - establishes database connection
     * @param string $host Database host
     * @param string $username Database username
     * @param string $password Database password
     * @param string $database Database name
     */
    public function __construct()
    {
        $host = "localhost";
        $username = "root";
        $password = "root";
        $database = "inventory";
        $port = 8889;
        $this->connection = new mysqli($host, $username, $password, $database, $port);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    /**
     * Insert data into a table
     * @param string $tableName Name of the table
     * @param array $data Associative array of column => value pairs
     * @return int|bool Last insert ID on success, false on failure
     */
    public function insert($tableName, $data)
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $types = str_repeat("s", count($data)); // assuming all strings for simplicity

        $stmt = $this->connection->prepare("INSERT INTO $tableName ($columns) VALUES ($placeholders)");
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param($types, ...array_values($data));
        $result = $stmt->execute();
        $insertId = $stmt->insert_id;
        $stmt->close();

        return $result ? $insertId : false;
    }

    /**
     * Fetch data from a table
     * @param string $tableName Name of the table
     * @param array $conditions Associative array of conditions (column => value)
     * @param string $columns Columns to select (default: *)
     * @return array Array of results or empty array if no results
     */
    public function fetchData($tableName, $conditions = [], $columns = "*")
    {
        $query = "SELECT $columns FROM $tableName";
        $params = [];
        $types = "";

        if (!empty($conditions)) {
            $whereClauses = [];
            foreach ($conditions as $column => $value) {
                $whereClauses[] = "$column = ?";
                $params[] = $value;
                $types .= "s";
            }
            $query .= " WHERE " . implode(" AND ", $whereClauses);
        }

        $stmt = $this->connection->prepare($query);
        if (!$stmt) {
            return [];
        }

        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $data ?: [];
    }

    /**
     * Execute a raw SQL query with optional parameters
     * @param string $sql The SQL query to execute
     * @param array $params Optional array of parameters to bind
     * @param string $types Optional string of parameter types (e.g., "iss" for integer, string, string)
     * @return array|bool For SELECT queries: array of results or empty array if no results
     *                   For other queries: true on success, false on failure
     * @throws Exception If query preparation fails
     */
    public function query($sql, $params = [], $types = "")
    {
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            throw new Exception("Query preparation failed: " . $this->connection->error);
        }

        // Bind parameters if provided
        if (!empty($params)) {
            // If types aren't specified, default to strings
            if (empty($types)) {
                $types = str_repeat("s", count($params));
            }
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();

        // For SELECT queries, return results
        if (stripos(trim($sql), 'SELECT') === 0) {
            $result = $stmt->get_result();
            $data = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $data ?: [];
        }

        // For other queries (INSERT, UPDATE, DELETE), return success status
        $success = $stmt->affected_rows >= 0;
        $stmt->close();
        return $success;
    }

    /**
     * Update a record in a table
     * @param string $tableName Name of the table
     * @param int $id ID of the record to update
     * @param array $updates Associative array of column => value pairs to update
     * @return bool True on success, false on failure
     */
    public function update($tableName, $id, $updates)
    {
        if (empty($updates)) {
            return false;
        }

        $setClauses = [];
        $params = [];
        $types = "";

        foreach ($updates as $column => $value) {
            $setClauses[] = "$column = ?";
            $params[] = $value;
            $types .= "s";
        }

        $params[] = $id;
        $types .= "i"; // assuming ID is integer

        $query = "UPDATE $tableName SET " . implode(", ", $setClauses) . " WHERE id = ?";
        $stmt = $this->connection->prepare($query);
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param($types, ...$params);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    /**
     * Delete a record from a table
     * @param string $tableName Name of the table
     * @param int $id ID of the record to delete
     * @return bool True on success, false on failure
     */
    public function delete($tableName, $id)
    {
        $stmt = $this->connection->prepare("DELETE FROM $tableName WHERE id = ?");
        if (!$stmt) {
            return false;
        }

        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    /**
     * Close the database connection
     */
    public function close()
    {
        $this->connection->close();
    }

    /**
     * Escape string to prevent SQL injection
     * @param string $value The string to escape
     * @return string The escaped string
     */
    public function escape($value)
    {
        return $this->connection->real_escape_string($value);
    }
}
