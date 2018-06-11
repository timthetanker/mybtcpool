<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 11/06/2018
 * Time: 19:50
 */

?>
<style>

    .main {
        width: 1015px;
        position: absolute;
        top: 10%;
        left: 20%;
    }

    #form_head {
        text-align: center;
        background-color: #FEFFED;
        height: 66px;
        margin: 0 0 -29px 0;
        padding-top: 35px;
        border-radius: 8px 8px 0 0;
        color: rgb(97, 94, 94);
    }

    #content {
        position: absolute;
        width: 450px;
        height: 340px;
        border: 2px solid gray;
        border-radius: 10px;
    }

    #content_result {
        position: absolute;
        width: 450px;
        height: 192px;
        border: 2px solid gray;
        border-radius: 10px;
        margin-left: 559px;
        margin-top: -262px;
    }

    #form_input {
        margin-left: 50px;
        margin-top: 36px;
    }

    label {
        margin-right: 6px;
        font-weight: bold;
    }

    #form_button {
        padding: 0 21px 15px 15px;
        position: absolute;
        bottom: 0px;
        width: 414px;
        background-color: #FEFFED;
        border-radius: 0px 0px 8px 8px;
        border-top: 1px solid #9A9A9A;
    }

    .submit {
        font-size: 16px;
        background: linear-gradient(#ffbc00 5%, #ffdd7f 100%);
        border: 1px solid #e5a900;
        color: #4E4D4B;
        font-weight: bold;
        cursor: pointer;
        width: 300px;
        border-radius: 5px;
        padding: 10px 0;
        outline: none;
        margin-top: 20px;
        margin-left: 15%;
    }

    .submit:hover {
        background: linear-gradient(#ffdd7f 5%, #ffbc00 100%);
    }

    .label_output {
        color: #4A85AB;
        margin-left: 10px;
    }

    #result_id {
        text-align: center;
        background-color: #FCD6F4;
        height: 47px;
        margin: 0 0 -29px 0;
        padding-top: 12px;
        border-radius: 8px 8px 0 0;
        color: rgb(97, 94, 94);
    }

    #result_show {
        margin-top: 35px;
        margin-left: 45px;
    }

    .input_box {
        height: 40px;
        width: 240px;
        padding: 20px;
        border-radius: 3px;
        background-color: #FEFFED;
        margin-left: 30px;
    }

    input#date_id {
        margin-left: 10px;
    }

    input#name_id {
        margin-left: 53px;
    }

    input#validate_dd_id {
        margin-left: 65px;
    }

    div#value {
        margin-left: 140;
        margin-top: -20;
    }

    input#pwd {
        margin-left: 40px;
    }

    div#value_pwd {
        margin-left: 160;
        margin-top: -20;
    }
</style>

<script type="text/javascript">

    // Ajax post
    $(document).ready(function () {
        $(".submit").click(function (event) {
            event.preventDefault();
            var user_name = $("input#name").val();
            var password = $("input#pwd").val();
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "pages/user_data_submit",
                dataType: 'json',
                data: {name: user_name, pwd: password},
                success: function (res) {
                    if (res) {
// Show Entered Value
                        jQuery("div#result").show();
                        jQuery("div#value").html(res.username);
                        jQuery("div#value_pwd").html(res.pwd);
                    }
                }
            });
        });
    });
</script>
<div class="main">
    <div id="content">
        <h2 id="form_head">Codelgniter Ajax Post</h2><br/>
        <hr>
        <div id="form_input">
            <?php

            // Form Open
            echo form_open();

            // Name Field
            echo form_label('User Name');
            $data_name = array('name' => 'name', 'class' => 'input_box', 'placeholder' => 'Please Enter Name', 'id' => 'name');
            echo form_input($data_name);
            echo "<br>";
            echo "<br>";

            // Password Field
            echo form_label('Password');
            $data_name = array('type' => 'password', 'name' => 'pwd', 'class' => 'input_box', 'placeholder' => '', 'id' => 'pwd');
            echo form_input($data_name);
            ?>
        </div>
        <div id="form_button">
            <?php echo form_submit('submit', 'Submit', "class='submit'"); ?>
        </div>
        <?php
        // Form Close
        echo form_close(); ?>
        <?php

        // Display Result Using Ajax
        echo "<div id='result' style='display: none'>";
        echo "<div id='content_result'>";
        echo "<h3 id='result_id'>You have submitted these values</h3><br/><hr>";
        echo "<div id='result_show'>";
        echo "<label class='label_output'>Entered Name :<div id='value'> </div></label>";
        echo "<br>";
        echo "<br>";
        echo "<label class='label_output'>Entered Password :<div id='value_pwd'> </div></label>";
        echo "<div>";
        echo "</div>";
        echo "</div>";
        ?>
    </div>
</div>
</body>
</html>