<?php

class Model {
    protected $db;

    function __construct() {
        if (!$this->db) {
            try {
                $this->db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root', '');
            }
            catch (Exception $e) {
                die('Error: ' . $e->getMessage());
            }
        }
    }
}