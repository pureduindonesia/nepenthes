<?php

namespace App\Models;

header('Content-Type: application/json; charset=utf-8');


use PDO;
use PDOException;

class Model
{
    protected $db;


    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=employees", 'root', '');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db = $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }


    public function getDB()
    {
        return $this->db;
    }
}
