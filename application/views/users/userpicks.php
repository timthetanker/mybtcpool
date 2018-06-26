<?php
if(!isset($this->session->userID)){
    die('NOT LOGGED');
}
var_dump($tournamentEntries);

?>
<h1>HI <?php echo ucfirst($username) ?> AS REQUESTED HERE ARE YOUR PICKS FOR <?php echo $tournamentName ?></h1>
<pre>
<?php

?>
    <style>
        .number-span {
            background-color: #000;
            color: #fff;
            font-family: Courier, serif;
            font-size: 110%;
            padding: 0px 3px 0px 3px;
            text-align: center;
            margin-right: 5px;
            border: 1px solid #333;
            border-radius: 4px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
        }
    </style>
<table class="table table-responsive table-striped">
    <thead>
    <tr>
        <th>SELECTED TEAM</th>
        <th>TO WIN BY</th>
        <th>RESULT</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($tournamentEntries as $index => $pick) {
        ?>
        <tr>
            <td>
                <?php echo $pick->pick; //users pick
                ?>

            </td>
            <td>
                <span class="number-span"> <?php echo $pick->points; ?>  </span> Points
            </td>
            <td>
                PENDING <?php #TODO CALCULATE WINNER
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</pre>
