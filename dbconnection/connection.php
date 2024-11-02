<?php
class Database
{
    private $host = "127.0.0.1";
    private $db_name = "nuerovista";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection()
    {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            return $this->conn;
        } catch (PDOException $e) {
            error_log("Connection Error: " . $e->getMessage());
            return null;
        }
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}

/*
This code implements a Database connection class:

1. Class Properties:
   - $host: Database server address (localhost)
   - $db_name: Name of the database (nuerovista)
   - $username: Database user (root)
   - $password: Database password (empty)
   - $conn: Public property to store connection object

2. getConnection() Method:
   - Creates and returns a PDO database connection
   - Builds DSN (Data Source Name) string with:
     * Host address
     * Database name
     * UTF-8 character encoding
   - Sets PDO options for:
     * Error handling (ERRMODE_EXCEPTION)
     * Default fetch mode (FETCH_ASSOC)
     * Prepared statement emulation (disabled)
   - Returns null if connection fails
   - Logs any connection errors

3. __get() Magic Method:
   - Provides read access to private properties
   - Checks if requested property exists
   - Returns property value if it exists
   - Used for encapsulation while allowing property access

4. Security Features:
   - Uses PDO for secure database operations
   - Implements error handling with try-catch
   - Logs errors instead of displaying them
   - Uses prepared statements by default

5. Design Pattern:
   - Follows singleton-like pattern for database connection
   - Encapsulates database credentials
   - Provides clean interface for database operations
*/
