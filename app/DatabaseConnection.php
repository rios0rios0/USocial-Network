<?php
/**
 * Created by PhpStorm.
 * User: rios0rios0
 * Date: 20/03/19
 * Time: 19:29
 */

class DatabaseConnection
{
    private $db = "";
    private $host = "localhost";
    private $user = "username";
    private $password = "password";

    public function __construct()
    {
        try {
            $connection = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully...";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}