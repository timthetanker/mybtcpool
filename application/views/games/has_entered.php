<div class="container">
    <div id="wrapper" style="max-width:1000px; min-width:100px; margin:0px auto">
        <?php var_dump($recordedPicks); ?>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h3 style="color: red"><?php echo strtoupper('FIRSTNAME HERE'); ?> You have ALREADY entered your
                    picks for <span style="color: black"> <b> <?php echo $tournament ?> </b></span> Round
                    <span class="numberSpan" style="color:#000;"> <b><?php echo $round ?></b> </span>
            .
        </h3>
        <small><i>You are only allowed to enter a round once.</i></small>
                <h4 style="color: red; text-align: center"><?php echo strtoupper($this->session->username) ?> Here are
                    your Picks </h4>
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
                    foreach ($recordedPicks as $key => $result) {
                        ?>
                        <tr>
                            <td>
                                <img src="<?php echo base_url('public/imgs/team-logos/' . $result->pick); ?>.png"
                                     alt="<?php echo $result->picked_teamName ?>"/>
                                <?php echo $result->picked_teamName ?>
                            </td>
                            <td>
                                By <span class="numberSpan"> <?php echo $result->points ?> </span> Points
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
</div>

