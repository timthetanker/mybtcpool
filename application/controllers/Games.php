<?php

class Games extends CI_Controller {
    /*public $upcoming = array();*/
    public function make_selections($page = 'make_selections')
{
   if(!file_exists(APPPATH . '/views/games/'.$page.'.php')){
        show_404();
        echo 'ERROR...SENT WE ARE ALREADY WORKING ON IT! PLEASE TRY AGAIN IN 5-MINS';
    }

    $data['title'] = 'Make Your Picks';
    $data['gameID'] = $this->games_model->getSelectedGame($this->uri->segment(3));
    $data['allGames'] = $this->games_model->displayTeamsByGameID($this->uri->segment(3));
    var_dump($data['gameID']);
    $this->load->view('templates/header', $data);
    $this->load->view('games/'.$page, $data);
    //$this->load->view('templates/upcoming_fixtures_tbl', $data['games']);
    $this->load->view('templates/footer', $data);
    }

    public function record_picks(){
        if(!file_exists(APPPATH . '/views/games/record_picks.php')){
            show_404();
            echo 'ERROR...SENT WE ARE ALREADY WORKING ON IT! PLEASE TRY AGAIN IN 5-MINS';
        }
        $data['title'] = 'Uploading Your Selections';
        $data['tournament'] = $tournament = $this->input->post('tournament')[0];
        $data['round'] = $round = $this->input->post('round');
        $this->load->view('templates/header', $data);
        $this->load->view('games/record_picks', $data);
        //$this->load->view('templates/upcoming_fixtures_tbl', $data['games']);
        $this->load->view('templates/footer', $data);
    }


}
    /*$games[] = $this->users_model->getUpcomingGames();
    if(is_array($games)){
        foreach ($games as $game){
            $data['games'] = array('gameID' => $game['gameID'], 'weekNum' =>$game['weekNum'], 'homeID' => $game['homeID'], 'visitorID' => $game['visitorID'] );
         }
        }*/
