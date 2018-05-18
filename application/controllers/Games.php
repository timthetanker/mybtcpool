<?php

/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 11/05/2018
 * Time: 14:09
 */
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
    //var_dump($data['allGames']);
    $this->load->view('templates/header', $data);
    $this->load->view('games/'.$page, $data);
    //$this->load->view('templates/upcoming_fixtures_tbl', $data['games']);
    $this->load->view('templates/footer', $data);
    }

    public function record_picks(){
        $gameID = $this->input->post('gameID');
        $tournament = $this->input->post('tournament');

    }


}
    /*$games[] = $this->users_model->getUpcomingGames();
    if(is_array($games)){
        foreach ($games as $game){
            $data['games'] = array('gameID' => $game['gameID'], 'weekNum' =>$game['weekNum'], 'homeID' => $game['homeID'], 'visitorID' => $game['visitorID'] );
         }
        }*/
