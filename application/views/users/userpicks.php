<?php
if(!isset($this->session->userID)){
    die('NOT LOGGED');
}
?>
<h1>HI <?php echo ucfirst($username) ?> AS REQUESTED HERE ARE YOUR PICKS FOR <?php echo $tournamentName ?></h1>
<pre>
<?php
var_dump($tournamentEntries);
?>
</pre>
