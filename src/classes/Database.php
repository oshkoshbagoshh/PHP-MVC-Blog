<?php

//require_once  '../includes/config.php';
//require_once  '../includes/constants.php';


// // Initialize the database connection
// $database = new Database();
// $pdo = $database->getConnection();

class Database
{
    private $pdo;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        try {
            $this->pdo = new PDO(
                DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME,
                DB_USER,
                DB_PASSWORD
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function getData()
    {
        // Fetch data from the database
        // This is a placeholder for actual data fetching logic
        return [];
    }

    public function insertData($data)
    {
        // Insert data into the database
        // This is a placeholder for actual data insertion logic
        return true;
    }
}

