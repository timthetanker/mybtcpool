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


$(function () {
    $.each($(".user-icon[data-game-id=11]"), function (key, value) {
        var b = $(".bars[data-game-id=11] .data-point.user-bar").position();
        if (b != null) {
            var mid = parseFloat($(".bars[data-game-id=11] .data-point.user-bar").width()) + parseFloat(b.left);
            mid = mid - parseFloat($(this).width() / 2) - 4;
            $(this).css("left", mid + "px");
        }
    });
});