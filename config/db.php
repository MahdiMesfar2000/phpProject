<?php

class Database {
    // Change the method name to be more specific
    public static function connectPDO() {
        $dsn = 'mysql:host=localhost;dbname=ecommerce';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET NAMES 'utf8'");
            return $pdo;
        } catch (PDOException $e) {
            // You might want to handle the exception according to your application's needs
            die('Connection failed: ' . $e->getMessage());
        }
    }
}
