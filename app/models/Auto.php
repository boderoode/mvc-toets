<?php
/**
 * Dit is de model voor de controller Lessen
 */

class Auto
{
    //properties
    private $db;

    // Dit is de constructor van de Country model class
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAutos()
    {
        $this->db->query("SELECT Mankementen
                          FROM Mankementen");

        $this->db->bind(':Id', 2, PDO::PARAM_INT);

        return $this->db->resultSet();
    }

    public function getTopics($autosId)
    
    {

        //Hiermee maak je je query
        $sql = "SELECT Les.DatumTijd
                       ,Les.Id
                       ,Onderwerp.Onderwerp
                FROM Onderwerp
                INNER JOIN Les 
                ON Les.Id = Onderwerp.LesId
                WHERE LesId = :lessonId";
        //Prepareer je query
        $this -> db->query($sql);

        //bind de echte waarde van lessonId
        $this->db->bind(':lessonId', $autosId, PDO::PARAM_INT);

        return $this->db->resultSet();
    }


    public function addTopic($post)
    {
            $sql = "INSERT INTO Onderwerp (LesId
                                           ,Onderwerp)
                                VALUES      (:lesId,
                                             :topic);";

               $this->db->query($sql);
               
               $this->db->bind(':autoId', $post['id'], PDO::PARAM_INT);

               $this->db->bind(':topic', $post['topic'], PDO::PARAM_STR);
    
                return $this->db->execute();
            }
}