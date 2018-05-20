<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 19/05/2018
 * Time: 06:26
 */
class Games_model extends CI_Model {
    public function __construct()
    {
        $this->load->database();
    }

    public function getUpcomingGames()
    {
        $sql = 'SELECT * from schedule WHERE gameTimeEastern > NOW() GROUP BY tournament ORDER BY tournament ASC ';
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows() > 0){
            return $stmnt->result();
        }
        return false;
    }

    public function getSelectedGame($gameID)
    {
        #TODO add check to prevent submission where tournament has started
        $sql = "SELECT * FROM schedule WHERE gameID = '$gameID'";
        $stmnt = $this->db->query($sql);

        if($stmnt->num_rows() > 0){
            return $stmnt->result();
        }
        return false;
    }


    public function displayTeamsByGameID($gameID)
    {
        #TODO add check to prevent submission where tournament has started
        $sql = "SELECT * FROM schedule WHERE gameID = '$gameID'";
        $stmnt = $this->db->query($sql);

        if($stmnt->num_rows() > 0){
            foreach ($stmnt->result_array() as $row) {
                $weekNum = $row['weekNum'];
                $sport = $row['sport'];
                $tournament = $row['tournament'];
            }
        } else {
            return false;
        }
        $sql = "SELECT * FROM schedule WHERE weekNum = '$weekNum' AND sport = '$sport' AND tournament = '$tournament' ORDER BY gameTimeEastern ASC";
        $stmnt = $this->db->query($sql);
        if($stmnt->num_rows() > 0){
            return $stmnt->result();
        }//if
        return false;
    }

    public function record_picks($data)
    {
        foreach ($data as $key => $value) {
            $userID = $data->userID;
            $pickedTeam = $value['pick'];
            $gameID = $value['gameID'];
            $points = $value['points'];
            $tournament = $value['tournament'];
            $weekNum = $value['weekNum'];


            $sql = "INSERT INTO picks(userID, gameID, points, sport, tournament, weekNum, pick) 
                    VALUES ('$userID', '$gameID', '$points', 'rugby', '$tournament',  '$weekNum', '$pickedTeam') ";
            $stmnt = $this->db->query($sql);

            foreach ($value as $pick) {
                echo $pick;
            }
        }
    }

    public function has_started($tournament, $round)
    {

        $sql = "SELECT * FROM schedule WHERE tournament = '$tournament' AND weekNum = '$round'";
        $stmnt = $this->db->query($sql);
        if($this->num_rows > 0){
            return $stmnt->result();
        }
        return false;
    }
}//classs



