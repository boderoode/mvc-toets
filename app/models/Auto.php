<?php

Class Auto {
    private $db;
    
    public function __construct()
    {
        $this->db = new Database();
    }
    public function GetAuto()
    {
        $this->db->query('SELECT auto.Type, auto.Kenteken, 
        FROM auto
                          ');
        $result = $this->db->resultSet();
        return $result;
    }

    
}