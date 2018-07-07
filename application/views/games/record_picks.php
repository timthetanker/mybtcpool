<?php
echo $title;
var_dump($picks);
?>

<style type="text/css">
    table {
    }

    table td {
        background-color: #FFF;
        text-align: center;
        color: black;
    }

    tr:nth-child(even) {
        background: #FFF
    }

    tr:nth-child(odd) {
        background: grey
    }

    .numberSpan {
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
<div class="container">
    <div id="wrapper" style="max-width:1000px; min-width:100px; margin:0px auto">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-xs-12 col-md-12 text-center" style="/*margin-top:100px;*/">
                        <h3 style="color: red"><?php echo $this->session->username ?> here are your picks. GOOD
                            LUCK! </h3>
                        <style>td {
                                text-align: left !important
                            }
                        </style>
                        <table class="table table-responsive table-striped">
                            <thead>
                            <tr>
                                <th>
                                    Selected Team
                                </th>
                                <th>
                                    Winning Margin
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($picks as $key => $result) {
                                ?>
                                <tr>
                                    <td>
                                        <!-- <img src=" . base_url('public/imgs/team-logos/' . $homeTeam) . ".png  alt='$homeTeamName'/>";-->
                                        <img src="<?php echo base_url('public/imgs/team-logos/' . $result['pick']); ?>.png"
                                             alt="<?php echo $result['pick'] ?>"/>
                                        <?php echo $result['winner'] ?>
                                    </td>
                                    <td>
                                        By <span class="numberSpan"> <?php echo $result['points'] ?> </span> Points
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>