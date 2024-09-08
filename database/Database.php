<?php
class Database
{
    private static $instance = null;
    private $connection;
    private $servername = "localhost";
    private $username = "root";
    // private $password = "password";

    private function __construct()
    {
        try {
            // Use double quotes to expand variables
            $this->connection = new PDO("mysql:host={$this->servername};dbname=ip", $this->username);
            // set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance->connection;
    }
}
