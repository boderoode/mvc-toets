<?php

/**
 * Dit is de model voor de controller Countries
 */

class User
{
    //properties
    private $db;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getNames()
    {
        $this->db->query('SELECT * FROM names');
        return $this->db->resultSet();
    }

    


}