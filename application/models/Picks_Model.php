<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 26/06/2018
 * Time: 00:31
 */
class Picks_Model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function test($tour, $uID)
    {
        $sql = "Select picks.*, schedule.* 
                FROM picks
                JOIN schedule ON picks.gameID = schedule.gameID
                WHERE  picks.tournament = '$tour' AND picks.userID = '$uID'";
    }
    public function getUserTournamentPicks($tour, $userID)
    {
        $sql = "Select picks.*, schedule.* 
                FROM picks
                JOIN schedule ON picks.gameID = schedule.gameID
                WHERE  picks.tournament = '$tour' AND picks.userID = '$userID'";
        $stmnt = $this->db->query($sql);
        return $stmnt->result();
    }
}