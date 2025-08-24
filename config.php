<?php

/**
 * Database
 */
class Database
{
    private PDO $pdo;

    public function __construct()
    {
        $driver = 'pgsql';
        $host = 'localhost';
        $dbname = 'blog_db';
        $username = 'blog_user';
        $password = 'blog_password';

        $dsn = "$driver:host=$host;dbname=$dbname";
        $this->pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function getConnection(): PDO
    {
        return $this->pdo;
    }
}
