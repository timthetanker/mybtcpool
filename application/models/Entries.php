<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 26/06/2018
 * Time: 00:31
 */
class Entries extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function getUserTournamentPicks($tour, $userID)
    {
        $sql = "SELECT * FROM picks WHERE tournament = '$tour' AND userID = '$userID'";
        $stmnt = $this->db->query($sql);
        return $stmnt->result();
    }
}