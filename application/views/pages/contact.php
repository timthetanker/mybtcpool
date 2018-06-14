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
        width: 450px;
        height: 340px;
        border: 2px solid gray;
        border-radius: 10px;
    }

    #content_result {

        width: 450px;
        height: 192px;
        border: 2px solid gray;
        border-radius: 10px;
        margin-left: 559px;
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


</style>

<script type="text/javascript">

    // Ajax post
    /*  $(document).ready(function () {
        $(".submit").click(function (event) {
            event.preventDefault();
            var user_name = $("input#name").val();
            var password = $("input#pwd").val();
            jQuery.ajax({
                type: "POST",
     url: " //echo base_url(); ?>" + "pages/user_data_submit",
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
     });*/

    $(function () {
        var form = $('#updateInfo');
        var formMessages = $('#formMsg');

        // Set up an event listener for the contact form.
        $(form).submit(function (e) {
            // Stop the browser from submitting the form.
            e.preventDefault();

            //do the validation here
            if (!validateTabReg()) {
                return;
            }

            // Serialize the form data.
            var formData = $(form).serialize();

            // Submit the form using AJAX.
            $.ajax({
                type: 'POST',
                url: $(form).attr('action'),
                data: formData
            }).done(function (response) {
                // Make sure that the formMessages div has the 'success' class.
                $(formMessages).removeClass('error').addClass('success');

                // Set the message text.
                $(formMessages).html(response); // < html();

                // Clear the form.
                $('').val('')
            }).fail(function (data) {
                // Make sure that the formMessages div has the 'error' class.
                $(formMessages).removeClass('success').addClass('error');

                // Set the message text.
                var messageHtml = data.responseText !== '' ? data.responseText : 'Oops! An error occured and your message could not be sent.';
                $(formMessages).html(messageHtml); // < html()
            });

        });
        function validateTabReg() {
            var valid = true;
            return valid;
        }
    })
</script>
<div class="main">
    <div id="content">
        <h2 id="form_head">Codelgniter Ajax Post</h2><br/>
        <hr>
        <div id="form_input">
            <?php
            //Set form attributes
            $attributes = array('id' => 'updateInfo');
            echo form_open('pages/user_data_submit', $attributes);
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
        ?>
        <div id="formMsg">
            <p>Ajax Values From ID formMsg</p>
        </div>
    </div>
</div>
</body>
</html>