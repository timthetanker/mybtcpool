<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 12/28/2017
 * Time: 2:44 PM
 */


function isLogged(){
    if(!isset($_SESSION['userID'])){
        header('Location:signup.php');
    }
}
function getCurrentWeek(){
    global $db;
    //get Current Week NR
    //simply get all fixtures where current date is less than start date
    //https://stackoverflow.com/questions/48019038/not-understanding-mysql-statement-date-addnow-interval
    //https://www.w3resource.com/mysql/date-and-time-functions/mysql-date_add-function.php
    $sql = "select distinct weekNum from bru_schedule where DATE_ADD(NOW(), INTERVAL " . SERVER_TIMEZONE_OFFSET . " HOUR) < gameTimeEastern group by sport order by weekNum";
    $stmnt = $db->prepare($sql);
    $stmnt->execute();
    if($stmnt->rowCount() > 0){
        $row = $stmnt->fetch();
        //echo $row['weekNum'];
        return $row['weekNum'];
    }
    else{
        $sql = "select max(weekNum) as weekNum from bru_schedule";
        $stmnt2 = $db->prepare($sql);
        $stmnt2->execute();
        if($stmnt2->rowCount()>0) {
            $row = $stmnt2->fetch();
            return $row['weekNum'];
        }
    }
    die('Error getting current week: ');
}//function

function getUpcomingGames(){
    global $db;
    $sql = 'SELECT * from bru_schedule WHERE gameTimeEastern > NOW() GROUP BY tournament ORDER BY tournament';
    $stmnt = $db->prepare($sql);
    //$stmnt->bindValue(':weekNum', $weekNum);
    $stmnt->execute();
    if($stmnt->rowCount() > 0){
        $games = $stmnt->fetchAll();
        foreach ($games as $game){

            $upcoming[] = array('gameID' => $game['gameID'], 'gameTimeDate' => $game['gameTimeEastern'], 'tournament' => $game['tournament'], 'sport' => $game['sport'], 'weekNum' => $game['weekNum'], 'type' => 'Pool Type' );
        }
        if(is_array($upcoming)){
            return $upcoming;
        }
    }
    else{
        die('ERROR GETTING UPCOMING GAMES');
    }
}

function displayTeamsByGameID($gameID)
{
    global $db;
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //now prevents late submissions
    $sql = 'SELECT * FROM bru_schedule WHERE gameID = :gameID';
    $stmnt = $db->prepare($sql);
    $stmnt->bindValue(':gameID', $gameID);
    $stmnt->execute();
    if ($stmnt->rowCount() > 0) {
        $result = array();
        $games =  $stmnt->fetch();
        $weekNum = $games['weekNum'];
        $sport = $games['sport'];
        $tournament = $games['tournament'];
        $sql = 'SELECT * FROM bru_schedule WHERE weekNum = :weekNum AND sport = :sport AND tournament =:tournament ORDER BY gameTimeEastern ASC';
        $stmnt= $db->prepare($sql);
        $stmnt->bindValue(':weekNum', $weekNum);
        $stmnt->bindValue(':sport', $sport);
        $stmnt->bindValue(':tournament', $tournament);
        $stmnt->execute();
        if($stmnt->rowCount() > 0){
            $matches= $stmnt->fetchAll();
            foreach ($matches as $match) {
                $result[] = array('gameID' => $match['gameID'], 'weekNum' => $match['weekNum'], 'gameTimeEastern' => $match['gameTimeEastern'], 'homeID' => $match['homeTeam'], 'visitorID' => $match['awayTeam'], 'sport' => $match['sport'], 'venue' => $match['venue'], 'tournament' => $match['tournament'], 'spread' => $match['spread']);

            }//foreach
        }//statment weekNUm Sport
    }//statment gameID
    if (!isset($match)) {
        return false;
    }
    /// print_r($result);
    return $result;
}//function

function isActive($userID, $tournament, $weekNum)
{
    global $db;
    $sql = "SELECT userID FROM bru_picks
			WHERE userID = :userID AND tournament = :tournament AND weekNum = :round";
    $stmnt = $db->prepare($sql);
    $stmnt->bindValue(':userID', $userID);
    $stmnt->bindValue(':tournament', $tournament);
    $stmnt->bindValue(':round', $weekNum);
    $stmnt->execute();
    if ($stmnt->rowCount() > 0) {
        return true; //IS ENTERED
    } else {
        return false; //NOT ENTERED
    }
}

function getPicks($userID, $tournament, $round)
{
    global $db;
    $sql = 'SELECT bru_picks.userID, bru_picks.gameID, bru_picks.pickID, bru_picks.weekNum, bru_picks.tournament, bru_picks.score, bru_picks.team,
		 	bru_schedule.gameID, bru_schedule.homeTeam, bru_schedule.awayTeam
		 	FROM bru_picks
		 	JOIN bru_schedule
		 	ON bru_picks.gameID = bru_schedule.gameID
		 	WHERE bru_picks.userID = :userID AND bru_picks.tournament = :tournament AND bru_picks.weekNum = :weekNum';

    $statement = $db->prepare($sql);
    $statement->bindValue(':userID', $userID);
    $statement->bindValue(':tournament', $tournament);
    $statement->bindValue(':weekNum', $round);
    $statement->execute();
    $picks = $statement->fetchAll();
    if ($statement->rowCount() > 0) {
        foreach ($picks as $pick) {
            $result[] = array('selectedTeam' => $pick['team'], 'score' => $pick['score'],
                'homeTeam' => $pick['homeTeam'],  'awayTeam' => $pick['awayTeam']);
        }//foreach display ENTERED USERS PICKS
    } else {
        return false;
    }
    if(isset($result)){
        return $result;
    }
    return false;
}


function dateDayMonthName($timestamp){
    $timestamp = strtotime($timestamp);
    $date = date('D d M', $timestamp);
    return $date;
}


#TODO ADD REALTIME CURRENCY CONVERSION
#TODO SET FUNCTION FOR DIFFERENT POOL PAYOUT AMOUNTS
function getPoolPayout($tournament, $week)
{
    global $db;
    $sql = 'SELECT count(DISTINCT userID) AS nrPlayers FROM bru_picks WHERE tournament = :tournament AND weekNum =:weekNum';
    $stmnt = $db->prepare($sql);
    $stmnt->bindValue(':tournament', $tournament);
    $stmnt->bindValue(':weekNum', $week);
    $stmnt->execute();
    if ($stmnt->rowCount() > 0) {
        $number_users = $stmnt->fetch();
        $payout = $number_users['nrPlayers'] * 100;
        number_format($payout, 0, 0, ',');
        return $payout;
    }
    return false;
}

//SHOW USER STATS




function getLastCompletedWeek($sport, $tournament) {
    global $db;
    $lastCompletedWeek = 0;
    $sql = 'select s.weekNum, max(s.gameTimeEastern) as lastGameTime,
    (select count(*) from bru_schedule where weekNum = s.weekNum and (bru_schedule.homeScore is NULL or bru_schedule.awayScore is null)) as scoresMissing
    from bru_schedule s
    where s.gameTimeEastern < NOW() AND sport = :sport AND tournament = :tournament
    group by s.weekNum
    order by s.weekNum';
    //echo $sql;

    $stmnt = $db->prepare($sql);
    $stmnt->bindValue(':sport', $sport);
    $stmnt->bindValue(':tournament', $tournament);

    $stmnt->execute();
    $results = $stmnt->fetch();
    $lastCompletedWeek = (int)$results['weekNum'];
    return $lastCompletedWeek;
}
//$query->free;




function getGameTotal($week, $sport, $tournament) {
    //get the total number of games for a given week
    global $db;
    $sql = 'select count(gameID) as gameTotal from bru_schedule where weekNum = :weekNum AND sport =:sport AND tournament = :tournament';
    $stmnt = $db->prepare($sql);
    $stmnt->bindValue(':weekNum',$week);
    $stmnt->bindValue(':sport', $sport);
    $stmnt->bindValue(':tournament', $tournament);

    $stmnt->execute();
    if ($stmnt->rowCount() > 0) {
        $row = $stmnt->fetch();
        return $row['gameTotal'];
    }
    die('Error getting game total: ');
}




#GET ALL USER CORRECT / WRONG PICKS & SHOW PICKS IN PROGRESS / RESULTS PENDING

#1. GET ALL USER PICKS
#BELOW FUNCTION WILL RETURN ALL PICKS MADE BY USER
function getAllUserPicks($userID)
{
    global $db;
    $sql = 'SELECT bru_picks.userID, bru_picks.gameID, bru_picks.pickID, bru_picks.weekNum, bru_picks.tournament, bru_picks.score, bru_picks.team,
		 	bru_schedule.gameID, bru_schedule.homeTeam, bru_schedule.awayTeam, bru_schedule.homeScore, bru_schedule.awayScore, bru_schedule.sport
		 	FROM bru_picks
		 	JOIN bru_schedule
		 	ON bru_picks.gameID = bru_schedule.gameID
		 	WHERE bru_picks.userID = :userID ORDER BY tournament';

    $statement = $db->prepare($sql);
    $statement->bindValue(':userID', $userID);
    //$statement->bindValue(':tournament', $tournament);
    //$statement->bindValue(':weekNum', $round);
    $statement->execute();
    if ($statement->rowCount() > 0) {
        $result = $statement->fetchAll();
    }
    if(isset($result)){
        return $result;
    }
    return false;
}

#2 BELOW FUNCTION WILL LOOP THROUGH USER PICKS CHECKING FOR CORRECT / WRONG PICKS
function checkUserPicks($userID)
{
    global $db;
    $allUserPicks = getAllUserPicks($userID);

    foreach ($allUserPicks as $pick) {
        $tournament = $pick['tournament'];
        $weekNum = $pick['weekNum'];
        $userID = $pick['userID'];

        $sql = 'SELECT bru_picks.*, bru_schedule.*
            FROM bru_picks
            JOIN bru_schedule ON bru_picks.gameID = bru_schedule.gameID
            WHERE bru_schedule.gameTimeEastern < NOW() AND bru_picks.tournament = :tournament AND bru_picks.weekNum = :weekNum AND bru_picks.userID = :userID AND bru_schedule.homeScore IS NOT NULL AND bru_schedule.awayScore IS NOT NULL ';

        $stmnt = $db->prepare($sql);
        $stmnt->bindValue(':tournament', $tournament);
        $stmnt->bindValue(':weekNum', $weekNum);
        $stmnt->bindValue(':userID', $userID);
        $stmnt->execute();
        $results = $stmnt->fetchAll();
        if ($stmnt->rowCount() > 0) {
            $totalCorrectPicks = 0;
            foreach ($results as $index => $result) {
                $returnResults[$index] = array('picked' => $result['team'], 'homeScore' => $result['homeScore'], 'awayScore' => $result['awayScore'], 'homeTeam' => $result['homeTeam'],
                    'awayTeam' => $result['awayTeam'], 'score' => $result['score'], 'tournament' => $result['tournament'], 'weekNum' => $result['weekNum']);

                $pickedTeam = $result['team'];
                if ($result['homeScore'] > $result['awayScore']) {
                    $matchOutcome = $result['homeTeam'];
                    $matchScore = $result['homeScore'];
                    $returnResults[$index]['matchOutcome'] = $matchOutcome;
                    $returnResults[$index]['matchScore'] = $matchScore;
                }
                if ($result['awayScore'] > $result['homeScore']) {
                    $matchOutcome = $result['awayTeam'];
                    $matchScore = $result['awayScore'];
                    $returnResults[$index]['matchOutcome'] = $matchOutcome;
                    $returnResults[$index]['matchScore'] = $matchScore;
                }
                if ($pickedTeam === $matchOutcome) {
                    $totalCorrectPicks++;
                    $margin = abs($matchScore - $result['points']);
                    //INDEX WILL START AT 0 SO WE ADD ONE TO $INDEX
                    $nrGames = $index + 1;
                    $returnResults[$index]['totatlCorrectPicks'] = $totalCorrectPicks;
                    $returnResults[$index]['margin'] = $margin;
                    $returnResults[$index]['nrGames'] = $nrGames;
                }
                elseif ($pickedTeam !== $matchOutcome) {
                    $margin = 'WRONG PICK';
                    $returnResults[$index]['margin'] = $margin;
                }
            }
        }
    }
    if(isset($returnResults)){
        return $returnResults;
    }
    return false;
}
#3 DISPLAY PENDING PICKS WHERE MATCH RESULT IS NOT UPLOADED OR MATCH HAS NOT BEEN UPLOADED
function displayPendingPicks($userID)
{
    global $db;
    $allUserPicks = getAllUserPicks($userID);
    foreach ($allUserPicks as $pick) {
        $userID = $pick['userID'];

        $sql = 'SELECT bru_picks.*, bru_schedule.*
            FROM bru_picks
            JOIN bru_schedule ON bru_picks.gameID = bru_schedule.gameID
            WHERE bru_picks.userID = :userID AND bru_schedule.gameTimeEastern > NOW() AND bru_schedule.awayScore IS NULL AND  bru_schedule.awayScore IS NULL ORDER BY bru_schedule.tournament';
        $stmnt = $db->prepare($sql);
        $stmnt->bindValue(':userID', $userID);
        $stmnt->execute();
        $results = $stmnt->fetchAll();
        if ($stmnt->rowCount() > 0) {
            foreach ($results as $index => $result) {
                $returnResults[$index] = array('picked' => $result['team'], 'homeTeam' => $result['homeTeam'], 'awayTeam' => $result['awayTeam'], 'predictedScore' => $result['score'], 'gameTimeEastern' => $result['gameTimeEastern'],'tournament' => $result['tournament'], 'weekNum' => $result['weekNum']);
            }
        }
    }
    if(isset($returnResults)){
        return $returnResults;
    }
    return false;
}


/*
function getUserCorrectPicks($userID, $tournament, $week){
        global $db;
    {{ PDO::ATTR_ERRMODE; }}
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

    $sql ='SELECT bru_picks.*, bru_schedule.*
		FROM bru_picks
		join bru_schedule on bru_picks.gameID = bru_schedule.gameID
		WHERE bru_picks.tournament = :tournament AND picks.weekNum = :weekNr AND bru_picks.userID = :userID AND bru_schedule.awayScore  IS NOT NULL AND bru_schedule.homeScore IS NOT NULL ';
    $stmnt = $db->prepare($sql);
    $stmnt->bindValue(':tournament', $tournament);
    $stmnt->bindValue(':weekNum', $week);
    $stmnt->bindValue(':userID', $userID);
    $stmnt->execute();
    //CONDITION = RESULT PENDING
    if($stmnt->rowCount() < 1){
        $status = 'RESULTS PENDING CHECK BACK SOON';
        return $status;
    }
    //CONDITION = GETTING RESULTS
    if($stmnt->rowCount() > 1) {
        $stmnt->fetchAll();
    }

    //ERROR
    return false;
}




#--COMES FROM NFL PICKEM----#
#TODO COMES FROM NFL PICKEM WORK ON  FIXING THIS
function calculateStats($sport, $week, $tournament) {
    global $db, $weekStats, $playerTotals, $possibleScoreTotal;
    //get latest week with all entered scores
    $lastCompletedWeek = getLastCompletedWeek($sport, $tournament);

    //loop through weeks
    for($weekNr = 1; $weekNr <= $lastCompletedWeek; $weekNr++) {
        //get array of games
        $games = array();
        $sql ='Select * from bru_schedule where weekNum = ' . $weekNr . '  and sport =:sport order by gameTimeEastern, gameID';
        $stmnt = $db->prepare($sql);
        $stmnt->bindValue(':sport', $sport);
        $stmnt->execute($sql);
        echo '<pre>';

        foreach($stmnt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $games[$row['gameID']]['gameID'] = $row['gameID'];
            $games[$row['gameID']]['homeID'] = $row['homeTeam'];
            $games[$row['gameID']]['visitorID'] = $row['awayTeam'];
             if ((int)$row['homeScore'] > (int)$row['awayScore']) {
               $games[$row['gameID']]['winnerID'] = $row['homeID'];
            }
            if ((int)$row['visitorScore'] > (int)$row['homeScore']) {
               $games[$row['gameID']]['winnerID'] = $row['visitorID'];
            }
        }
        //get array of player picks
        $playerPicks = array();
        $playerWeeklyTotals = array();
        $sql ='Select p.userID, p.gameID, p.pickID, p.score, u.firstname, u.lastname, u.userName
       from bru_picks p
       inner join bru_users u on p.userID = u.userID
       inner join bru_schedule s on p.gameID = s.gameID
       where s.weekNum = ' . $week . '
       order by u.lastname, u.firstname, s.gameTimeEastern';

        $stmnt = $db->prepare($sql);
        $stmnt->execute();
        foreach ($stmnt->fetchAll(PDO::FETCH_ASSOC) as $row) {
             $playerPicks[$row['userID'] . $row['gameID']] = $row['pickID'];
             $playerWeeklyTotals[$row['userID']]['week'] = $weekNr;
            $playerTotals[$row['userID']]['wins'] += 0;
            $playerTotals[$row['userID']]['name'] = $row['firstname'] . ' ' . $row['lastname'];
            $playerTotals[$row['userID']]['userName'] = $row['userName'];
            if (!empty($games[$row['gameID']]['winnerID']) && $row['pickID'] === $games[$row['gameID']]['winnerID']) {
                //player has picked the winning team
                $playerWeeklyTotals[$row['userID']]['score'] += 1;
                $playerTotals[$row['userID']]['score'] += 1;
            } else {
                $playerWeeklyTotals[$row['userID']]['score'] += 0;
                $playerTotals[$row['userID']]['score'] += 0;
            }
        }
        //get winners & highest score for current week
        $highestScore = 0;
        arsort($playerWeeklyTotals);
        foreach($playerWeeklyTotals as $playerID => $stats) {
            if ($stats['score'] > $highestScore) $highestScore = $stats['score'];
            if ($stats['score'] < $highestScore) break;
            $weekStats[$week]['winners'][] = $playerID;
            var_dump($playerTotals[$playerID]['wins'] += 1);
        }
        $weekStats[$week]['highestScore'] = $highestScore;
        $weekStats[$week]['possibleScore'] = getGameTotal($week, $sport, $tournament);
        $possibleScoreTotal += $weekStats[$week]['possibleScore'];
    }
     echo '</pre>';
}


/*
function recordPicks($userID)
{
    //check if user already entered
    global $db;
    $sql = "SELECT userID FROM selections WHERE userID = :userID";
    $stmnt = $db->prepare($sql);
    $stmnt->bindValue(':userID', $stmnt);
    $stmnt->execute();
    if ($stmnt->rowCount() > 0) {
        //THROW ERROR DIE()
        echo '<h1> USER ALREADY ENTERED</h1>';
    }
    //CHECK HOW MANY SELECTIONS WE ARE UPLOADING
    $y = 1;    //TO show game number, $Y gets iterated in foreach loop below
    foreach ($_POST['picks'] as $id => $winner) { //winning team
        $result = array(
            $teamsel[] = $winner => 'winner',
//var_dump($winner);
            $gameID = $_POST['gameID'][$id] => 'gameID',
//var_dump($matchId);
            $score = $_POST['score'][$id] => 'score',
//var_dump($score);
            $tournament = $_POST['tournament'][$id] => 'tournament',
//var_dump($tournament);
            $round = $_POST['round'][$id] => 'round',
//var_dump($round);
            $curDate = date('Ymd') => 'date');

//ADD PICKS TO DB
        $sql = 'INSERT INTO bru_picks (userID, gameID, selectedTeam, points, tournament, weekNum, pickDate)
								VALUES (:userID, :gameID, :selectedTeam, :points, :tournament, :weekNum, :pickDate )';
        $statement = $db->prepare($sql);
        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':gameID', $gameID);
        $statement->bindValue(':team', $winner);
        $statement->bindValue(':score', $score);
        $statement->bindValue(':tournament', $tournament);
        $statement->bindValue(':weekNum', $round);
        $statement->bindValue(':pickDate', $curDate);
        $statement->execute();
        if ($stmnt->rowCount() > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
*/
?>
