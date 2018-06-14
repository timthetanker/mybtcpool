$(document).ready(function () {
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
});