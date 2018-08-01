var brupicks = {
    data: {
        submitAttempt: 0,
        init_complete: false,
        use_worker: false,
        device_display: "desktop"
    },
    init: function (c) {
        console.log("init picks");
        $(".margin-scale .annot").each(function (d) {
            if ($(this).attr("data-bru-mg")) {
                $(this).css("left", brupicks.rugby.getPickBarPositionPx(40, $(this).parent().width(), $(this).data("bru-mg"), $(this).width(), "pick") + "px")
            }
        });
        $(".margin-scale .actual").each(function (d) {
            if ($(this).attr("data-bru-mg")) {
                $(this).css("left", (12 + brupicks.rugby.getPickBarPositionPx(40, $(this).parent().width(), $(this).data("bru-mg"), $(this).width(), "actual")) + "px")
            }
        });
        if ($(".mobile-toolbar").css("display") == "block") {
            bru.data.device_display = "mobile"
        }
        $(window).resize(function () {
            if ($(".mobile-toolbar").css("display") == "block") {
                bru.data.device_display = "mobile"
            } else {
                bru.data.device_display = "desktop"
            }
            console.log("reset to " + bru.data.device_display);
            brupicks.initSoccer()
        });
        brupicks.initSoccer();
        $(".cricket-picker input[type=radio]").on("change", function (g) {
            var f = $(this).parent().find(".cricket-margin");
            var d = $(this).parent().data("bru-game-id");
            $("#picker" + d + " .save-status").hide();
            if ($("#cricket-picker" + $(this).attr("id")).data("bru-winner-id") != $(this).val()) {
                f.find("input.runs").val("");
                f.find("input.wickets").val("");
                f.find("select").val("")
            }
            $(this).parent().find("label").addClass("unselected").removeClass("active");
            $(".cricket-picker label[for=" + $(this).attr("id") + "]").addClass("active").removeClass("unselected");
            if ($(this).val() == "0") {
                f.addClass("hidden");
                $("#cricket-picker" + d).removeClass("shown");
                console.log("token " + $("#picker" + d).data("bru-token"));
                brupicks.savePick(d, $("#picker" + d).data("bru-token"), {
                    winner_id: 0,
                    runs: 0,
                    wickets: 0
                })
            } else {
                $("#cricket-picker" + d).addClass("shown");
                $("#cricket-picker" + $(this).attr("id")).data("bru-winner-id", $(this).val());
                f.removeClass("hidden").removeClass("right-win").removeClass("left-win").addClass($(this).data("bru-margin-class"));
                $(this).parent().find(".margin-by").html($(this).data("bru-team") + " to win by");
                f.find("input.runs").focus()
            }
        });
        $(".cricket-picker input[type=number]").focus(function () {
            $(this).removeClass("pulsing")
        });
        $(".cricket-picker input[type=number]").on("blur", function (d) {
            brupicks.cricket.validatePick($(this).data("bru-game-id"))
        });
        $(".cricket-picker input[type=number]").on(function (d) {
            console.log(d)
        });
        $(".cricket-picker input[type=number]").on("keyup", function (d) {
            console.log("change");
            brupicks.cricket.processPick($(this).data("bru-game-id"))
        });
        if (bru.data.mobile) {
            return
        }
        var a = function () {
            if ($(".mini-log").length > 0) {
                var e = $(".mini-log").offset();
                if ($(".mini-log").data("bru-initial") == "0") {
                    $(".mini-log").data("bru-initial", e.top)
                }
                var d = $(".mini-log table.mini-log-scrollable tr").length;
                if (d <= 25) {
                    if (e.top < window.pageYOffset) {
                        $(".mini-log").addClass("scrolled")
                    } else {
                        if (parseInt($(".mini-log").data("bru-initial"), 10) > window.pageYOffset) {
                            if ($(".mini-log").hasClass("scrolled")) {
                                $(".mini-log").removeClass("scrolled")
                            }
                        }
                    }
                }
            }
        };
        var b = null;
        $(window).scroll(function () {
            if (b) {
                clearTimeout(b)
            }
            b = setTimeout(a, 250)
        })
    },
    initSoccer: function () {
        $(".soccer-picker .mobile-input").unbind("click").on("click", function () {
            $(this).addClass("active");
            $("body").scrollTop($(this).offset().top - 100);
            $(".rugby-trigger-mask").remove();
            $("body").append('<div class="rugby-trigger-mask"></div>');
            $(".rugby-trigger-mask").show().on("click", function (c) {
                $(this).hide().remove();
                $(".mobile-input").removeClass("active");
                $(".soccer-score-chooser").remove();
                $("#picker" + $(this).parent().data("bru-game-id") + " input").blur()
            });
            var b = "left";
            if ($(this).parent().hasClass("right")) {
                b = "right"
            }
            var d = "<div class='soccer-score-chooser'>";
            d += '<div class="title" style="background:#' + $(this).data("bru-colour") + ";color:#" + $(this).data("bru-text-colour") + '">' + $(this).data("bru-team-name") + "</div>";
            d += '   <div class="items">';
            d += '   <div class="itemRow">';
            d += '   <div class="itemCell" data-bru-score="1" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">1</div>";
            d += '   <div class="itemCell" data-bru-score="2" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">2</div>";
            d += '    <div class="itemCell" data-bru-score="3" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">3</div>";
            d += "    </div>";
            d += '    <div class="itemRow">';
            d += '    <div class="itemCell" data-bru-score="4" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">4</div>";
            d += '    <div class="itemCell" data-bru-score="5" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">5</div>";
            d += '    <div class="itemCell" data-bru-score="6" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">6</div>";
            d += "   </div>";
            d += '   <div class="itemRow">';
            d += '    <div class="itemCell" data-bru-score="7" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">7</div>";
            d += '    <div class="itemCell" data-bru-score="8" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">8</div>";
            d += '    <div class="itemCell" data-bru-score="9" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">9</div>";
            d += "    </div>";
            d += '    <div class="itemRow">';
            d += '    <div class="itemCell grey"></div>';
            d += '   <div class="itemCell" data-bru-score="0" onclick="brupicks.soccer.choosePick(' + $(this).parent().data("bru-game-id") + ",'" + b + "',$(this).html())\">0</div>";
            d += '   <div class="itemCell grey"></div>';
            d += "   </div>";
            d += "    </div>";
            d += "</div>";
            $("body").append(d)
        });
        var a = function (c) {
            switch (c.which) {
                case 9:
                    $(".rugby-trigger-mask").remove();
                    $("#picker" + c.data.game_id + " input").blur();
                    $("#picker" + c.data.game_id + " .goals." + c.data.side + " .options").hide();
                    break;
                case 13:
                    $(".rugby-trigger-mask").remove();
                    $("#picker" + c.data.game_id + " input").blur();
                    $("#picker" + c.data.game_id + " .goals." + c.data.side + " .options").hide();
                    $("#picker" + c.data.game_id + " .goals." + c.data.side + " input").trigger("change");
                    break;
                case 27:
                    $(".rugby-trigger-mask").remove();
                    $("#picker" + c.data.game_id + " input").blur();
                    $("#picker" + c.data.game_id + " .goals." + c.data.side + " .options").hide();
                    break;
                case 38:
                    if (!$("#picker" + c.data.game_id + " .goals." + c.data.side + " .options .goal").hasClass("selected")) {
                        $("#picker" + c.data.game_id + " .goals." + c.data.side + " .options .goal0").addClass("selected");
                        $("#picker" + c.data.game_id + " .goals." + c.data.side + " input").val(0)
                    } else {
                        var b = $("#picker" + c.data.game_id + " .goals." + c.data.side + "  .options .goal.selected").html();
                        b = parseInt(b, 10);
                        b = b - 1;
                        if (b < 12) {
                            $("#picker" + c.data.game_id + " .goals." + c.data.side + " input").val(b);
                            $("#picker" + c.data.game_id + " .goals." + c.data.side + "  .options .goal.selected").removeClass("selected");
                            $("#picker" + c.data.game_id + " .goals." + c.data.side + "  .options .goal" + b).addClass("selected")
                        }
                    }
                    break;
                case 40:
                    if (!$("#picker" + c.data.game_id + " .goals." + c.data.side + " .options .goal").hasClass("selected")) {
                        $("#picker" + c.data.game_id + " .goals." + c.data.side + " .options .goal0").addClass("selected");
                        $("#picker" + c.data.game_id + " .goals." + c.data.side + " input").val(0)
                    } else {
                        var b = $("#picker" + c.data.game_id + " .goals." + c.data.side + "  .options .goal.selected").html();
                        b = parseInt(b, 10);
                        b++;
                        if (b < 12) {
                            $("#picker" + c.data.game_id + " .goals." + c.data.side + " input").val(b);
                            $("#picker" + c.data.game_id + " .goals." + c.data.side + "  .options .goal.selected").removeClass("selected");
                            $("#picker" + c.data.game_id + " .goals." + c.data.side + "  .options .goal" + b).addClass("selected")
                        }
                    }
                    break;
                default:
                    return
            }
        };
        $(".soccer-picker input").unbind("focus").on("focus", function () {
            $(this).parent().find(".options").show();
            $(".rugby-trigger-mask").remove();
            $("body").append('<div class="rugby-trigger-mask"></div>');
            $(".rugby-trigger-mask").show().on("click", function (c) {
                $(this).hide().remove();
                $("#picker" + $(this).parent().data("bru-game-id") + " input").blur();
                $(".soccer-picker .options").hide()
            });
            var b = "left";
            if ($(this).parent().hasClass("right")) {
                b = "right"
            }
            $(document).bind("keydown", {
                game_id: $(this).parent().data("bru-game-id"),
                side: b
            }, a)
        });
        $(".soccer-picker input").unbind("focusout").on("focusout", function (b) {
            $(document).unbind("keydown", a);
            b.preventDefault()
        });
        $(".soccer-picker input").unbind("change").on("change", function (b) {
            brupicks.soccer.processPick($(this).parent().data("bru-game-id"))
        })
    },
    openPastResults: function (c, b, a) {
        bru.ui.overlay.open({
            title: "ajax",
            content: {
                url: "ajax/write_past_results.php",
                method: "POST",
                data: {
                    t1: b,
                    t2: a
                }
            },
            footer: "close",
            scroll: true,
            overlay_toolbar: true
        })
    },
    openYourHistory: function (c, b, a) {
        alert("todo your history between " + b + " and " + a)
    },
    openCommunityStats: function (a) {
        bru.ui.overlay.open({
            title: "ajax",
            content: {
                url: "ajax/write_community_stats.php",
                method: "POST",
                data: {
                    g: a
                }
            },
            footer: "close",
            scroll: true,
            width: "600px",
            autofit: false,
            overlay_toolbar: true
        })
    },
    openRateThePlayer: function (b, a) {
        window.open("https://www.alloutrugby.com/rate-the-player/?utm_source=superbru&utm_medium=nav_menu&utm_campaign=SuperRugby2017", "_blank")
    },
    changePoolPicksDisplay: function (a, b) {
        $(".wenger-results-panel").removeClass("active");
        $(".wenger-results-panel[data-wenger-type='" + b + "']").addClass("active");
        $(".wenger-display-chooser a").removeClass("active");
        $(".wenger-display-chooser a[data-wenger-type='" + b + "']").addClass("active");
        $.ajax({
            type: "GET",
            url: "ajax/set_wenger_results_cookie.php",
            timeout: 30000,
            cache: false,
            dataType: "json",
            data: {
                display: b
            }
        }).done(function (e, c, d) {
            if (e.result == "success") {
            }
        })
    },
    cricket: {
        validatePick: function (c) {
            var a = $("#cricket-picker" + c + " input.runs").val();
            var d = $("#cricket-picker" + c + " input.wickets").val();
            var b = $("#cricket-picker" + c + " input[type=radio]:checked").val();
            if (a == "" || d == "" || $("#cricket-picker" + c).data("bru-existing") == b + "-" + a + "-" + d) {
                if (d == "") {
                    $("#cricket-picker" + c + " input.wickets").addClass("pulsing")
                }
                if (a == "") {
                    $("#cricket-picker" + c + " input.runs").addClass("pulsing")
                }

            }
        },
        changeMargin: function (a, e, d, b) {
            var f = true;
            if (e == "") {
                $("#cricket-picker" + a + " select.runs").addClass("pulsing");
                f = false
            }
            if (d == "") {
                $("#cricket-picker" + a + " select.wickets").addClass("pulsing");
                f = false
            }
            if (f) {
                brupicks.savePick(a, $("#picker" + a).data("bru-token"), {
                    winner_id: $("#cricket-picker" + a + " input[type=radio]:checked").val(),
                    runs: e,
                    wickets: d
                })
            }
        },
        processPick: function (c) {
            var a = $("#cricket-picker" + c + " input.runs").val();
            var d = $("#cricket-picker" + c + " input.wickets").val();
            var b = $("#cricket-picker" + c + " input[type=radio]:checked").val();
            if (a == "" || d == "" || $("#cricket-picker" + c).data("bru-existing") == b + "-" + a + "-" + d) {
                if (d == "") {
                    $("#cricket-picker" + c + " input.wickets").addClass("pulsing")
                }
                if (a == "") {
                    $("#cricket-picker" + c + " input.runs").addClass("pulsing")
                }
                return
            }
            if (isNaN(a) || isNaN(d)) {
                alert("Please enter a numeric value for runs and wickets only.");
                return
            }
            if (a > 400 || a < 1) {
                alert("Please enter a 1 to 400 run margin.");
                return
            }
            if (d > 10 || d < 1) {
                alert("Please enter a 1 to 10 wicket margin.");
                return
            }
            if (a % 1 !== 0 || d % 1 !== 0) {
                alert("Please enter a whole number for your run and wicket margins.");
                return
            }
            brupicks.savePick(c, $("#picker" + c).data("bru-token"), {
                winner_id: b,
                runs: a,
                wickets: d
            })
        },
        setSuperover: function (d, f, e, c, b) {
            var a = $("#cricket-picker" + d + " input[type=radio]:checked").val();
            $("#picker" + d + " .superover-add").hide();
            $("#picker" + d + " .superover-remove").show();
            $("#picker" + d + " .cricket-margin .container").addClass("hidden");
            $("#picker" + d + " .cricket-margin .both-instruction").hide();
            brupicks.savePick(d, $("#picker" + d).data("bru-token"), {
                winner_id: a,
                runs: 0,
                wickets: 0,
                superover: 1
            })
        },
        cancelSuperover: function (c, b, a) {
            $("#picker" + c + " .superover-add").show();
            $("#picker" + c + " .superover-remove").hide();
            $("#picker" + c + " .cricket-margin .container").removeClass("hidden");
            $("#picker" + c + " .cricket-margin .container select").val("");
            $("#picker" + c + " .cricket-margin .both-instruction").show()
        }
    },
    soccer: {
        focusGoal: function (b, a) {
            $("#picker" + b + " .goals." + a + " .options").show()
        },
        exposeMore: function (b, a) {
            $("#picker" + b + " .goals." + a + " .options .more").hide();
            $("#picker" + b + " .goals." + a + " .options .hidden").removeClass("hidden")
        },
        setGoal: function (b, a, c) {
            $("#picker" + b + " .goals." + a + " input").val(c).trigger("change");
            $("#picker" + b + " .goals." + a + " .options").hide();
            $(".rugby-trigger-mask").remove()
        },
        processPick: function (b) {
            var a = $("#soccer-picker" + b + " .goals.left input").val();
            var c = $("#soccer-picker" + b + " .goals.right input").val();
            if (a + "-" + c == $("#soccer-picker" + b).data("bru-existing")) {
                return
            }
            if (a == "" || c == "") {
                console.log("incomplete score");
                return
            }
            if (isNaN(a) || isNaN(c)) {
                alert("Please enter a numeric value for each team's goals.");
                return
            }
            if (a % 1 !== 0 || c % 1 !== 0) {
                alert("Please enter a whole number for each team's goals.");
                return
            }
            if (a > 12 || c > 12 || a < 0 || c < 0) {
                alert("Please choose 12 or fewer goals for each team.");
                return
            }
            a = parseInt(a, 10);
            c = parseInt(c, 10);
            $("#picker" + b + " .goals.left input").val(a);
            $("#picker" + b + " .goals.right input").val(c);
            brupicks.savePick(b, $("#picker" + b).data("bru-token"), {
                left_score: a,
                right_score: c
            })
        },
        choosePick: function (b, a, c) {
            $(".rugby-trigger-mask").remove();
            $("#picker" + b + " .goals." + a + " .mobile-input").html(c).removeClass("active");
            $("#picker" + b + " .goals." + a + " input").val(c).trigger("change").blur();
            $(".soccer-score-chooser").remove();
            if (a == "left" && $("#picker" + b + " .goals.right input").val() == "") {
                $("#picker" + b + " .goals.right .mobile-input").trigger("click")
            }
        }
    },
    rugby: {
        getPickBarPositionPx: function (g, c, e, f, b) {
            var d = 0;
            var a = 0;
            f = parseInt(f, 10);
            e = parseInt(e, 10);
            if (e < -1 * g) {
                a = 0
            } else {
                if (e > g) {
                    a = 1
                } else {
                    if (e < 0) {
                        d = g - Math.abs(e)
                    } else {
                        if (e == 0) {
                            d = g
                        } else {
                            d = g + e
                        }
                    }
                    a = d / (g * 2)
                }
            }
            return (a * c) - (f / 2)
        },
        insertMore: function (c, e, b, a, k) {
            var l = "";
            if (e == "left") {
                $(".rugby-vert-picker .container .more-left").remove();
                var f = 0;
                var d = -40;
                for (i = 41; i < 121; i++) {
                    d--;
                    css = "";
                    if ((i - 1) % 10 == 0 && i > 2) {
                        css += " ten"
                    }
                    $(".overlay .rugby-vert-picker .container .team-" + e).prepend("<div class='" + css + " ' data-sc='" + f + "' data-mg='" + d + "' onclick=\"brupicks.rugby.choosePick($(this)," + c + "," + d + ",'" + a + " by " + Math.abs(d) + "')\"><span class='t'>" + k + "</span><span class='s'>by " + i + "</span></div>")
                }
                var h = (74 * 40)
            } else {
                $(".rugby-vert-picker .container .more-right").remove();
                var d = 40;
                var f = 0;
                for (i = 41; i < 121; i++) {
                    d++;
                    css = "";
                    if ((i - 1) % 10 == 0 && i > 2) {
                        css += " ten"
                    }
                    $(".overlay .rugby-vert-picker .container .team-" + e).append("<div class='" + css + "' data-sc='" + f + "' data-mg='" + d + "' onclick=\"brupicks.rugby.choosePick($(this)," + c + "," + d + ",'" + a + " by " + Math.abs(d) + "')\"><span class='t'>" + k + "</span><span class='s'>by " + i + "</span></div>")
                }
                var h = ((40 * 40) + (35 * 40))
            }
            $(".overlay .content").scrollTop(h)
        },
        triggerPickMobile: function (t, e, b, m, l, u, q, k, h) {
            var f = null;
            if ($("#pick" + t).data("bru-margin") != "") {
                f = parseInt($("#pick" + t).data("bru-margin"), 10)
            }
            var o = "<div class='rugby-vert-picker'><div class='container'><div class='team-group team-left t" + k + "' style='border-left:7px solid #" + u + "'>";
            var v = -41;
            var a = 0;
            if (f >= -40) {
                o += "<div class='more-left' data-sc='" + a + "' data-mg='" + v + "' onclick=\"brupicks.rugby.insertMore(" + t + ",'left'," + k + ",'" + m + "','" + e + "')\"><span class='t'>More</span><span class='s'><i class='fa fa-chevron-up' aria-hidden='true'></i></span></div>"
            }
            var p = 40;
            if (f < -40) {
                p = 120;
                v = -121
            }
            for (i = p; i > 0; i = i - 1) {
                if (i < p - 8) {
                    a++
                }
                v++;
                css = "";
                if (f != null) {
                    if (v == f) {
                        css = "left"
                    }
                }
                if ((i - 1) % 10 == 0 && i > 2) {
                    css += " ten"
                }
                o += "<div class='" + css + " ' data-sc='" + a + "' data-mg='" + v + "' onclick=\"brupicks.rugby.choosePick($(this)," + t + "," + v + ",'" + m + " by " + Math.abs(v) + "')\"><span class='t'>" + e + "</span><span class='s'>by " + i + "</span></div>"
            }
            v++;
            a++;
            css = "";
            o += "</div><div class='team-group team-draw'>";
            if (v == f) {
                css = "selected-draw"
            }
            o += "<div class='draw " + css + " ' data-sc='" + a + "' data-mg='" + v + "' onclick=\"brupicks.rugby.choosePick($(this)," + t + "," + v + ",'Draw')\"><span class='t'>Draw</span><span class='s'></span></div>";
            o += "</div><div class='team-group team-right t" + h + "' style='border-left:7px solid #" + q + "'>";
            var c = 41;
            if (f > 40) {
                c = 121
            }
            for (i = 1; i < c; i++) {
                a++;
                v++;
                css = "";
                if (v == f) {
                    css = "right"
                }
                if ((i) % 10 == 0 && i > 2) {
                    css += " ten"
                }
                o += "<div class='" + css + "' data-sc='" + a + "' data-mg='" + v + "' onclick=\"brupicks.rugby.choosePick($(this)," + t + "," + v + ",'" + l + " by " + Math.abs(v) + "')\"><span class='t'>" + b + "</span><span class='s'>by " + i + "</span></div>"
            }
            if (f <= 40) {
                o += "<div class='more-right' data-sc='" + a + "' data-mg='" + v + "' onclick=\"brupicks.rugby.insertMore(" + t + ",'right'," + h + ",'" + l + "','" + b + "')\"><span class='t'>More</span><span class='s'><i class='fa fa-chevron-down' aria-hidden='true'></i></span></div>"
            }
            o += "</div></div></div>";
            var x = 40;
            var d = 82 / 2 * x;
            var n = parseInt($(window).height(), 10);
            d = d - (Math.round(n / 2) - 40);
            if (f != null) {
                d = (p + f) * x - (x * 6)
            }
            bru.ui.overlay.open({
                title: "Your Pick",
                content: o,
                scroll: true,
                scroll_to: d,
                overlay_toolbar: true,
                footer: "close",
                pad: false
            })
        },
        triggerPick: function (e, s, p, f, c, n, l, m, k) {
            if (bru.data.device_display == "mobile") {
                brupicks.rugby.triggerPickMobile(e, s, p, f, c, n, l, m, k);
                return
            } else {
            }
            $("body").append('<div class="rugby-trigger-mask"></div>');
            $(".rugby-trigger-mask").show().on("click", function (g) {
                $(this).hide().remove();
                $(".vert-picker" + e + " .team-left").empty();
                $(".vert-picker" + e + " .team-right").empty();
                $(".vert-picker" + e + " .team-draw").empty();
                $(".rugby-vert-picker").removeClass("show")
            });
            var a = $(".trigger" + e + " .rugby-vert-picker");
            a.addClass("show");
            var t = null;
            if ($("#pick" + e).data("bru-margin") != "") {
                t = $("#pick" + e).data("bru-margin")
            }
            var q = 0;
            var h = -121;
            var d = "";
            for (i = 120; i > 0; i = i - 1) {
                if (i < 112) {
                    q++
                }
                h++;
                d = "";
                if (h == t) {
                    d = "left"
                }
                $(".vert-picker" + e + " .team-left").append("<div class='" + d + " hover-pick" + f + "' data-sc='" + q + "' data-mg='" + h + "' onclick=\"brupicks.rugby.choosePick($(this)," + e + "," + h + ",'" + f + " by " + Math.abs(h) + "')\"><span class='t'>" + s + "</span><span class='s'>by " + i + "</span></div>")
            }
            h++;
            q++;
            d = "";
            if (h == t) {
                d = "selected-draw"
            }
            $(".vert-picker" + e + " .team-draw").append("<div class='draw " + d + " ' data-sc='" + q + "' data-mg='" + h + "' onclick=\"brupicks.rugby.choosePick($(this)," + e + "," + h + ",'Draw')\"><span class='t'>Draw</span><span class='s'></span></div>");
            for (i = 1; i < 121; i++) {
                q++;
                h++;
                d = "";
                if (h == t) {
                    d = "right"
                }
                $(".vert-picker" + e + " .team-right").append("<div class='" + d + " hover-pick" + c + "' data-sc='" + q + "' data-mg='" + h + "' onclick=\"brupicks.rugby.choosePick($(this)," + e + "," + h + ",'" + c + " by " + Math.abs(h) + "')\"><span class='t'>" + p + "</span><span class='s'>by " + i + "</span></div>")
            }
            if (t == null) {
                a.scrollTop(3390)
            } else {
                var b = t;
                if (b > -112) {
                    b = b - 7
                }
                a.scrollTop((b + 120) * 30)
            }
            $("html,body").animate({
                scrollTop: $("#pick" + e).offset().top - ($(window).height() - $("#pick" + e).outerHeight(true)) / 2
            }, 200)
        },
        choosePick: function (b, h, c, a) {
            $(".rugby-trigger-mask").remove();
            if (bru.data.device_display == "mobile") {
                bru.ui.overlay.close();
                $(".trigger" + h + " label").html(a + '<i class="fa fa-angle-down" aria-hidden="true"></i>').addClass("picked");
                $("#pick" + h).data("bru-margin", c.toString());
                var e = 0;
                if (c < 0) {
                    e = $(".trigger" + h).data("bru-left-team-id")
                } else {
                    if (c > 0) {
                        e = $(".trigger" + h).data("bru-right-team-id")
                    }
                }
                brupicks.savePick(h, $(".trigger" + h + " .token").html(), {
                    winner_id: e,
                    margin: Math.abs(c)
                });
                return
            }
            var k = (b.data("sc") + 1) * b.height();
            if (c < 0) {
                sm = 120 - Math.abs(c)
            } else {
                if (c == 0) {
                    sm = 120
                } else {
                    sm = 120 + c
                }
            }
            b.parent().parent().parent().scrollTop(k);
            b.parent().parent().parent().data("bru-start-scroll", sm);
            $(".trigger" + h + " .rugby-vert-picker .container .team-group > div").removeClass("left").removeClass("right").removeClass("draw");
            var v = "";
            var t = "";
            if (c < 0) {
                side = "left";
                v = "right";
                t = "draw"
            } else {
                if (c > 0) {
                    side = "right";
                    v = "draw";
                    t = "left"
                } else {
                    side = "selected-draw";
                    v = "right";
                    t = "left"
                }
            }
            $("#margin-scale" + h).addClass("show");
            var s = $("#margin-scale" + h).width();
            var d = 40;
            var l = 0;
            var n = 0;
            if (c < -1 * d) {
                n = 0
            } else {
                if (c > d) {
                    n = 1
                } else {
                    if (c < 0) {
                        l = d - Math.abs(c)
                    } else {
                        if (c == 0) {
                            l = d
                        } else {
                            l = d + c
                        }
                    }
                    n = l / (d * 2)
                }
            }
            var q = $("#margin-scale" + h + " .user");
            var f = (n * s) - (q.width() / 2);
            q.css("left", f + "px");
            b.parent().parent().parent().removeClass("show");
            b.addClass(side);
            $(".trigger" + h + " label").html(a + '<i class="fa fa-angle-down" aria-hidden="true"></i>').addClass("picked");
            $("#pick" + h).data("bru-margin", c.toString());
            $(".vert-picker" + h + " .team-left").empty();
            $(".vert-picker" + h + " .team-right").empty();
            $(".vert-picker" + h + " .team-draw").empty();
            var e = 0;
            if (c < 0) {
                e = $(".trigger" + h).data("bru-left-team-id")
            } else {
                if (c > 0) {
                    e = $(".trigger" + h).data("bru-right-team-id")
                }
            }
            brupicks.savePick(h, $(".trigger" + h + " .token").html(), {
                winner_id: e,
                margin: Math.abs(c)
            })
        }
    },
    motorsport: {
        triggerPick: function (a, c, f) {
            if (bru.data.device_display == "mobile") {
                brupicks.motorsport.triggerPickMobile(a, c, f);
                return
            }
            var b = $(".motorsport-vert-picker-template.desktop.race" + a).html();
            $("#label-" + f).addClass("active");
            $("body").append('<div class="rugby-trigger-mask"></div>');
            $(".rugby-trigger-mask").show().on("click", function (g) {
                $(this).hide().remove();
                $("#label-" + f).removeClass("active");
                $(".motorsport-vert-picker").removeClass("show")
            });
            var e = $(".trigger-" + f + " .motorsport-vert-picker.race" + a);
            e.html(b).addClass("show");
            var d = $("#picks-form" + a + " #pick-" + f).val();
            if (d != "" && d != 0) {
                $(".trigger-" + f + " .motorsport-vert-picker.race" + a + " .container").find(".driver[data-driver-id=" + d + "]").addClass("selected")
            }
            brupicks.motorsport.dehiliteSelected(a, f)
        },
        triggerPickMobile: function (a, c, e) {
            var d = $("#picks-form" + a + " #pick-" + e).val();
            $(".motorsport-vert-picker-template.mobile.race" + a + " .container .driver").attr("data-position", e);
            if (d != "" && d != 0) {
                $(".motorsport-vert-picker-template.mobile.race" + a + " .container .driver").removeClass("selected");
                $(".motorsport-vert-picker-template.mobile.race" + a + " .container").find(".driver[data-driver-id=" + d + "]").addClass("selected")
            }
            brupicks.motorsport.dehiliteSelected(a, e);
            var b = $(".motorsport-vert-picker-template.mobile.race" + a).html();
            b = "<div class='motorsport-vert-picker race" + a + " mobile'>" + b + "</div>";
            bru.ui.overlay.open({
                title: c,
                content: b,
                scroll: true,
                scroll_to: 0,
                overlay_toolbar: true,
                footer: "close",
                pad: false
            })
        },
        dehiliteSelected: function (a, c) {
            $(".motorsport-vert-picker-template.mobile.race" + a + " .driver").removeClass("already-picked");
            if (c != "pole" && c != "lap") {
                var b = Array();
                for (i = 1; i <= 10; i++) {
                    if ($("#picks-form" + a + " #pick-pos" + i).val() != "") {
                        $(".trigger-" + c + " .motorsport-vert-picker.race" + a + " .container").find(".driver[data-driver-id=" + $("#picks-form" + a + " #pick-pos" + i).val() + "]").addClass("already-picked");
                        $(".motorsport-vert-picker-template.mobile.race" + a + " .container").find(".driver[data-driver-id=" + $("#picks-form" + a + " #pick-pos" + i).val() + "]").addClass("already-picked")
                    }
                }
            }
        },
        pick: function (a, c, f, d, b, e) {
            $(".rugby-trigger-mask").remove();
            $(".motorsport-vert-picker").removeClass("show");
            $("#picks-form" + a + " #pick-" + f).val(d);
            $("#picks-form" + a + " #label-" + f).removeClass("active");
            $("#picks-form" + a + " .trigger-" + f + " .motorsport-vert-picker .driver").removeClass("selected");
            c.addClass("selected");
            $("#picks-form" + a + " #label-" + f).html("<div class='flag'><span class='flag-icon flag-icon-" + e + " flag-icon'></span></div><div class='name'>" + b + "</div><i class='fa fa-angle-down' aria-hidden='true'></i>");
            brupicks.motorsport.validate(a)
        },
        pickMobile: function (a, c, f, d, b, e) {
            $("#picks-form" + a + " #pick-" + f).val(d);
            $("#picks-form" + a + " #label-" + f).html("<div class='flag'><span class='flag-icon flag-icon-" + e + " flag-icon'></span></div><div class='name'>" + b + "</div><i class='fa fa-angle-down' aria-hidden='true'></i>");
            bru.ui.overlay.close();
            brupicks.motorsport.validate(a)
        },
        validate: function (a) {
            var b = [];
            var e = [];
            for (i = 1; i <= 10; i++) {
                if ($("#picks-form" + a + " #pick-pos" + i).val() != "") {
                    if (b.indexOf($("#picks-form" + a + " #pick-pos" + i).val()) == -1) {
                        b.push($("#picks-form" + a + " #pick-pos" + i).val());
                        e.push(1)
                    } else {
                        for (j = 0; j <= 10; j++) {
                            if (b[j] == $("#picks-form" + a + " #pick-pos" + i).val()) {
                                e[j]++
                            }
                        }
                    }
                }
            }
            for (i = 1; i <= 10; i++) {
                for (j = 0; j <= 10; j++) {
                    if (b[j] == $("#picks-form" + a + " #pick-pos" + i).val()) {
                        if (e[j] > 1) {
                            $("#picks-form" + a + " #save-status-pos" + i).html("<i class=\"fa fa-exclamation-triangle lightred\"  aria-hidden=\"true\"  onclick=\"bru.ui.alert('You have picked the same finisher in more than one position. Pick not saved.','Status','conf')\"></i>")
                        } else {
                            if ($("#picks-form" + a + " #saved-pos" + i).val() == $("#picks-form" + a + " #pick-pos" + i).val()) {
                                $("#picks-form" + a + " #save-status-pos" + i).html("<i class=\"fa fa-unlock-alt lightgreen\" aria-hidden=\"true\"  onclick=\"bru.ui.alert('This pick is safely saved, but it may still be changed.','Status','conf')\"></i>")
                            } else {
                                $("#picks-form" + a + " #save-status-pos" + i).html("<i class=\"fa fa-floppy-o lightred\" aria-hidden=\"true\"  onclick=\"bru.ui.alert('This pick is not saved. Click Save Picks at the bottom to save.','Status','conf')\"></i>")
                            }
                        }
                    }
                }
            }
            if ($("#picks-form" + a + " #pick-pole").val() != "" && $("#picks-form" + a + " #pole-available").val() == 1) {
                if ($("#picks-form" + a + " #saved-pole").val() == $("#picks-form" + a + " #pick-pole").val()) {
                    $("#picks-form" + a + " #save-status-pole").html("<i class=\"fa fa-unlock-alt lightgreen\" aria-hidden=\"true\" onclick=\"bru.ui.alert('This pick is safely saved.','Status','conf')\"></i>")
                } else {
                    $("#picks-form" + a + " #save-status-pole").html("<i class=\"fa fa-floppy-o lightred\" aria-hidden=\"true\"  onclick=\"bru.ui.alert('This pick is not saved. Click Save Picks at the bottom to save.','Status','conf')\"></i>")
                }
            }
            if ($("#picks-form" + a + " #pick-lap").val() != "") {
                if ($("#picks-form" + a + " #saved-lap").val() == $("#picks-form" + a + " #pick-lap").val()) {
                    $("#picks-form" + a + " #save-status-lap").html("<i class=\"fa fa-unlock-alt lightgreen\"  aria-hidden=\"true\" onclick=\"bru.ui.alert('This pick is safely saved.','Status','conf')\"></i>")
                } else {
                    $("#picks-form" + a + " #save-status-lap").html("<i class=\"fa fa-floppy-o lightred\" aria-hidden=\"true\"  onclick=\"bru.ui.alert('This pick is not saved. Click Save Picks at the bottom to save.','Status','conf')\"></i>")
                }
            }
        },
        save: function (n, c) {
            var e = $("#picks-form" + n + " #save-token").val();
            var h = {
                pole: $("#picks-form" + n + " #pick-pole").val(),
                lap: $("#picks-form" + n + " #pick-lap").val(),
                pos1: $("#picks-form" + n + " #pick-pos1").val(),
                pos2: $("#picks-form" + n + " #pick-pos2").val(),
                pos3: $("#picks-form" + n + " #pick-pos3").val(),
                pos4: $("#picks-form" + n + " #pick-pos4").val(),
                pos5: $("#picks-form" + n + " #pick-pos5").val(),
                pos6: $("#picks-form" + n + " #pick-pos6").val(),
                pos7: $("#picks-form" + n + " #pick-pos7").val(),
                pos8: $("#picks-form" + n + " #pick-pos8").val(),
                pos9: $("#picks-form" + n + " #pick-pos9").val(),
                pos10: $("#picks-form" + n + " #pick-pos10").val()
            };
            var d = "";
            var b = "";
            var a = [];
            if ($("#picks-form" + n + " #pick-pole").val() == "" && $("#picks-form" + n + " #pole-available").val() == 1) {
                d += "Pole position<br />"
            }
            var g = 0;
            var l = false;
            for (i = 1; i <= 10; i++) {
                if ($("#picks-form" + n + " #pick-pos" + i).val() == "") {
                    b += i + ", ";
                    g++
                } else {
                    if (a.indexOf($("#picks-form" + n + " #pick-pos" + i).val()) == -1) {
                        a.push($("#picks-form" + n + " #pick-pos" + i).val())
                    } else {
                        l = true
                    }
                }
            }
            if (l) {
                bru.ui.alert("You have chosen one or more finishers in multiple positions.", "There's a problem");
                return
            }
            if (b.length > 0) {
                b = b.substr(0, b.length - 2);
                if (g == 1) {
                    d += "Position " + b + "<br />"
                } else {
                    d += "Positions " + b + "<br />"
                }
            }
            if ($("#picks-form" + n + " #pick-lap").val() == "") {
                d += "Fastest lap"
            }
            if (d != "") {
                d = "Please choose the following:<br /><br />" + d;
                bru.ui.alert(d, "There's a problem");
                return
            }
            var k = 0;
            if ($("#picks-form" + n + " #email-conf").is(":checked")) {
                k = 1
            }
            var f = {
                type: "GET",
                url: "ajax/save_pick_motorsport.php",
                timeout: 30000,
                cache: false,
                dataType: "jsonp",
                data: {
                    rs: 1,
                    token: e,
                    picks: JSON.stringify(h),
                    email_conf: k,
                    re: 1
                }
            };
            if (brupicks.data.use_worker) {
                f.url = "https://worker.superbru.com/" + c + "/ajax/save_pick_motorsport.php"
            }
            $("#picks-form" + n + " #save-button").hide();
            $("#picks-form" + n + " #save-indicator").removeClass("hidden");
            brupicks.data.submitAttempt++;
            $.ajax(f).done(function (q, o, p) {
                if (f.dataType == "jsonp") {
                    q = q[0]
                }
                if (q.result == "success") {
                    $("#picks-form" + n + " #save-indicator").html("<div class='text-center'>Continuing to confirmation...</div>");
                    document.location = "play_motorsport_confirm.php?tk=" + e
                } else {
                    if (q.code != 0) {
                        bru.ui.alert(q.data, "Picks not saved")
                    } else {
                        if (brupicks.data.submitAttempt <= 2) {
                            var m = window.setTimeout(function () {
                                brupicks.motorsport.save(c)
                            }, 3000)
                        } else {
                            brupicks.data.submitAttempt = 0;
                            bru.ui.alert("Saving failed. Please try again.", "Picks not saved");
                            brupicks.recordPickError(e, p.status, q.data);
                            $("#picks-form" + n + " #save-button").show();
                            $("#picks-form" + n + " #save-indicator").addClass("hidden")
                        }
                    }
                }
            }).fail(function (p, o) {
                if (f.dataType == "jsonp") {
                    p = p[0]
                }
                if (brupicks.data.submitAttempt <= 3) {
                    var m = window.setTimeout(function () {
                        brupicks.motorsport.save(c)
                    }, 3000)
                } else {
                    brupicks.data.submitAttempt = 0;
                    bru.ui.alert("Saving failed. Please try again.", "Picks not saved");
                    brupicks.recordPickError(e, p.status, p.statusText);
                    $("#picks-form" + n + " #save-button").show();
                    $("#picks-form" + n + " #save-indicator").addClass("hidden")
                }
            }).always(function (o, m) {
            })
        },
        lockPick: function (a) {
            var c = true;
            if (typeof Storage !== "undefined") {
                if (typeof localStorage.prevent_lock_confirm !== "undefined") {
                    if (localStorage.prevent_lock_confirm == "yes") {
                        brupicks.motorsport.lockPickProcess(a);
                        c = false
                    }
                }
            }
            if (c) {
                var b = "<div class='text-center'>Only lock your picks if you want to see other players' picks before the race.<br><br><b>Once you lock, YOU CAN'T CHANGE YOUR PICKS.</b></div>";
                if (typeof Storage !== "undefined") {
                    b += "<div class='text-center' style='margin-top:10px'><label><input type='checkbox' id='stop_lock_confirm' name='stop_lock_confirm' onchange='brupicks.stopLockConfirm($(this).is(\":checked\"))' />&nbsp;&nbsp;I get it. Stop showing this message</label></div>"
                }
                bru.ui.overlay.open({
                    title: "Are you sure?",
                    content: b,
                    footer: {
                        type: "lock",
                        game_id: a
                    },
                    style: "alert",
                    scroll: false,
                    alert_style: "lock"
                })
            }
        },
        lockPickProcess: function (a) {
            $.ajax({
                type: "GET",
                url: "ajax/lock_pick.php",
                timeout: 30000,
                cache: false,
                dataType: "json",
                data: {
                    g: a
                }
            }).done(function (d, b, c) {
                if (d.result == "success") {
                    if (document.location.pathname.indexOf("pool.php") != -1) {
                        bru.page.loadTab("races", {}, "race" + a)
                    }
                    bru.ui.overlay.close()
                } else {
                    bru.ui.alert("Sorry, your pick couldn't be locked: " + d.data, "Error")
                }
            }).fail(function (c, b) {
                bru.ui.alert("Sorry, your pick couldn't be locked. Please try again.", "Error")
            }).always(function (c, b) {
                $(".lock-icon" + gameId).removeClass("pulse")
            })
        }
    },
    sevens: {
        choosePick: function (d, a, e, c, b) {
            brupicks.savePick(d, b, {
                winner_id: a,
                margin: e
            });
            $("#sevens-picker" + d + " .user").addClass("shown").removeClass("left-high").removeClass("left-low").removeClass("draw").removeClass("right-high").removeClass("right-low").addClass(c);
            $("#sevens-picker" + d + " label").removeClass("selected");
            $("#sevens-picker" + d + " label[for=pick-" + d + "-" + c).addClass("selected")
        }
    },
    stopLockConfirm: function (a) {
        if (typeof Storage !== "undefined") {
            if (a) {
                localStorage.prevent_lock_confirm = "yes"
            }
        }
    },
    stopLockConfirmRound: function (a) {
        if (typeof Storage !== "undefined") {
            if (a) {
                localStorage.prevent_lock_round_confirm = "yes"
            }
        }
    },
    lockRound: function (a, e) {
        var c = true;
        if (c) {
            var d = Math.random().toString(36).substring(7);
            $.ajax({
                type: "GET",
                url: "ajax/get_player_picks_for_lock_confirmation.php",
                timeout: 30000,
                cache: false,
                dataType: "json",
                data: {
                    round_id: e
                }
            }).done(function (h, f, g) {
                if (h.result == "success") {
                    $("#" + d).html(h.data)
                }
            });
            var b = "<div class='text-center'>This will lock all your picks for Round " + e + ".<br><div id='" + d + "' class='text-center picks'>" + bru.snippets.spinner + "</div><br><b>YOU WON'T BE ABLE TO CHANGE THEM</b></div>";
            if (typeof Storage !== "undefined") {
            }
            bru.ui.overlay.open({
                title: "Are you sure?",
                content: b,
                footer: {
                    type: "lock_round",
                    round_id: e,
                    game_id: a
                },
                style: "alert",
                scroll: false,
                alert_style: "lock"
            })
        }
    },
    lockPick: function (l) {
        var h = true;
        var g = true;
        var e = false;
        var m = "<div class='text-center'>Lock to see other players' picks before kick-off.<br><br></div>";
        if ($("#pick" + l).length != 0) {
            var b = parseFloat($(".trigger" + l).data("bru-left-comm"));
            var a = parseFloat($(".trigger" + l).data("bru-right-comm"));
            var f = parseInt($("#pick" + l).data("bru-margin"), 10);
            if ((f < 0 && b <= 10) || (f > 0 && a <= 10)) {
                h = true;
                g = false;
                e = true
            }
            f = Math.abs(f);
            if (parseInt($("#pick" + l).data("bru-margin"), 10) == 0) {
                m += "<div class='text-center' style='font-size:1.5em'>Draw</div>"
            } else {
                if (parseInt($("#pick" + l).data("bru-margin"), 10) < 0) {
                    m += "<div class='text-center'  style='font-size:1.5em'>" + $(".trigger" + l).data("bru-left-team-name") + " by " + f + "</div>"
                } else {
                    if (parseInt($("#pick" + l).data("bru-margin"), 10) > 0) {
                        m += "<div class='text-center'  style='font-size:1.5em'>" + $(".trigger" + l).data("bru-right-team-name") + " by " + f + "</div>"
                    }
                }
            }
        } else {
            if ($("#cricket-picker" + l).length != 0) {
                var b = parseFloat($("#cricket-picker" + l).data("bru-left-comm"));
                var a = parseFloat($("#cricket-picker" + l).data("bru-right-comm"));
                if ($("#pick-" + l + "-left").is(":checked")) {
                    if ($("#cricket-picker" + l + " select.runs").val() == "") {
                        m += "<div class='text-center'  style='font-size:1.3em'>" + $("#pick-" + l + "-left").data("bru-team") + " by superover</div>"
                    } else {
                        m += "<div class='text-center'  style='font-size:1.3em'>" + $("#pick-" + l + "-left").data("bru-team") + " by " + $("#cricket-picker" + l + " select.runs").val() + " runs or " + $("#cricket-picker" + l + " select.wickets").val() + " wickets</div>"
                    }
                    if (b <= 10) {
                        e = true;
                        g = false;
                        h = true
                    }
                } else {
                    if ($("#pick-" + l + "-right").is(":checked")) {
                        if ($("#cricket-picker" + l + " select.runs").val() == "") {
                            m += "<div class='text-center'  style='font-size:1.3em'>" + $("#pick-" + l + "-right").data("bru-team") + " by superover</div>"
                        } else {
                            m += "<div class='text-center'  style='font-size:1.3em'>" + $("#pick-" + l + "-right").data("bru-team") + " by " + $("#cricket-picker" + l + " select.runs").val() + " runs or " + $("#cricket-picker" + l + " select.wickets").val() + " wickets</div>"
                        }
                        if (a <= 10) {
                            e = true;
                            g = false;
                            h = true
                        }
                    }
                }
            } else {
                if ($("#soccer-picker" + l).length != 0) {
                    var b = parseFloat($("#soccer-picker" + l).data("bru-left-comm"));
                    var a = parseFloat($("#soccer-picker" + l).data("bru-right-comm"));
                    var k = 100 - b - a;
                    var d = parseInt($("#soccer-picker" + l + " .soccer-left-score").val(), 10);
                    var c = parseInt($("#soccer-picker" + l + " .soccer-right-score").val(), 10);
                    if (d > c && b <= 10) {
                        e = true;
                        g = false;
                        h = true
                    } else {
                        if (d < c && a <= 10) {
                            e = true;
                            g = false;
                            h = true
                        } else {
                            if (d == c && k <= 10) {
                                e = true;
                                g = false;
                                h = true
                            }
                        }
                    }
                    m += "<div class='text-center'  style='font-size:1.3em'>" + $("#soccer-picker" + l + " .soccer-left-score").data("bru-team-name") + " " + $("#soccer-picker" + l + " .soccer-left-score").val() + " - " + $("#soccer-picker" + l + " .soccer-right-score").val() + " " + $("#soccer-picker" + l + " .soccer-right-score").data("bru-team-name") + "</div>"
                }
            }
        }
        if (e) {
            m += "<div style='text-align:center;margin:5px 0 0 0;font-size:0.9em;color:#c0392b'>You're picking quite an upset!</div>"
        }
        if (typeof Storage !== "undefined") {
            if (typeof localStorage.prevent_lock_confirm !== "undefined" && !e) {
                if (localStorage.prevent_lock_confirm == "yes") {
                    brupicks.lockPickProcess(l);
                    h = false
                }
            }
        }
        if (h) {
            m += "<div class='text-center'><br>Once you lock, <b>YOU CAN'T CHANGE YOUR PICK.</b></div>";
            if (typeof Storage !== "undefined" && g) {
                m += "<div class='text-center' style='margin-top:10px'><label><input type='checkbox' id='stop_lock_confirm' name='stop_lock_confirm' onchange='brupicks.stopLockConfirm($(this).is(\":checked\"))' />&nbsp;&nbsp;I get it. Stop showing this message</label></div>"
            }
            bru.ui.overlay.open({
                title: "Are you sure?",
                content: m,
                footer: {
                    type: "lock",
                    game_id: l
                },
                style: "alert",
                scroll: false,
                alert_style: "lock"
            })
        }
    },
    lockPickRoundProcess: function (a, b) {
        $(".lock-buttons").html("<i style='margin-left:20px' class='fa fa-lock fa-spin fa-fw'></i>");
        $.ajax({
            type: "GET",
            url: "ajax/lock_pick.php",
            timeout: 30000,
            cache: false,
            dataType: "json",
            data: {
                g: a,
                r: b,
                a: 1
            }
        }).done(function (e, c, d) {
            if (e.result == "success") {
                $("#picker" + a + " .pick-status").html("<div class='lock-status locked'><i class='fa fa-lock' aria-hidden='true'></i></div><div class='date'>Locked</div>").show();
                $("#picker" + a + " .pick-status").show();
                $("#picker" + a + " .save-status").html("").hide();
                $("#picker" + a + " label").attr("onclick", "");
                $("#picker" + a + " label i").hide();
                if (document.location.pathname.indexOf("pool.php") != -1) {
                    bru.page.loadTab("matches", {}, "game" + a)
                }
                bru.ui.overlay.close()
            } else {
                bru.ui.alert("Sorry, your pickss couldn't be locked: " + e.data, "Error")
            }
        }).fail(function (d, c) {
            bru.ui.alert("Sorry, your pick couldn't be locked. Please try again.", "Error")
        }).always(function (d, c) {
            $(".lock-icon" + a).removeClass("pulse")
        })
    },
    lockPickProcess: function (a) {
        $(".lock-icon" + a).addClass("pulse");
        $.ajax({
            type: "GET",
            url: "ajax/lock_pick.php",
            timeout: 30000,
            cache: false,
            dataType: "json",
            data: {
                g: a
            }
        }).done(function (d, b, c) {
            if (d.result == "success") {
                $("#picker" + a + " .pick-status").html("<div class='lock-status locked'><i class='fa fa-lock' aria-hidden='true'></i></div><div class='date'>Locked</div>").show();
                $("#picker" + a + " .pick-status").show();
                $("#picker" + a + " .save-status").html("").hide();
                $("#picker" + a + " label").attr("onclick", "");
                $("#picker" + a + " label i").hide();
                if (document.location.pathname.indexOf("pool.php") != -1) {
                    bru.page.loadTab("matches", {}, "game" + a)
                }
                $(".experts-detail[data-game-id=" + a + "] table").removeClass("hidden");
                $(".experts-detail[data-game-id=" + a + "] p").hide();
                bru.ui.overlay.close()
            } else {
                bru.ui.alert("Sorry, your pick couldn't be locked: " + d.data, "Error")
            }
        }).fail(function (c, b) {
            bru.ui.alert("Sorry, your pick couldn't be locked. Please try again.", "Error")
        }).always(function (c, b) {
            $(".lock-icon" + a).removeClass("pulse")
        })
    },
    savePick: function (c, b, d) {
        $("#cricket-picker" + c + " select").removeClass("pulsing").addClass("saving");
        var a = "Saving";
        if (brupicks.data.submitAttempt == 1) {
            a = "Trying again"
        } else {
            if (brupicks.data.submitAttempt == 2) {
                a = "Trying a 2nd time"
            } else {
                if (brupicks.data.submitAttempt == 3) {
                    a = "Trying a 3rd time"
                } else {
                    if (brupicks.data.submitAttempt > 3) {
                        a = "Trying a " + brupicks.data.submitAttempt + "th time"
                    }
                }
            }
        }
        brupicks.data.submitAttempt++;
        $("#picker" + c + " .pick-status").hide();
        $("#picker" + c + " .save-status").removeClass("error").show().html('<i class="fa fa-floppy-o" aria-hidden="true"></i><div class="status-tag">' + a + "&hellip;</div>");
        var f = "";
        if (typeof d == "object") {
            f = JSON.stringify(d)
        } else {
            if (d.substr(0, 1) == "%") {
                d = decodeURI(d)
            }
            d = JSON.stringify(JSON.parse(d));
            f = d
        }
        var e = {
            type: "GET",
            url: "ajax/save_pick.php",
            timeout: 30000,
            cache: false,
            dataType: "json",
            data: {
                rs: 1,
                token: b,
                picks: f,
                pick_test: d,
                attempt: brupicks.data.submitAttempt,
                pre_converted: 1,
                re: 1
            }
        };
        if (d.hasOwnProperty("winner_id")) {
            e.data.winner_id = d.winner_id
        }
        if (d.hasOwnProperty("margin")) {
            e.data.margin = d.margin
        }
        if (brupicks.data.use_worker) {
            e.dataType = "jsonp";
            e.url = "https://worker.superbru.com/player/ajax/save_pick_worker.php"
        }
        $.ajax(e).done(function (m, h, l) {
            if (e.dataType == "jsonp") {
                m = m[0]
            }
            if (m.result == "success") {
                $("#picker" + c + " .pick-status").html("<div class='lock-status unlocked'><i class='fa fa-unlock-alt' aria-hidden='true' onclick='brupicks.lockPick(" + c + ")'></i></div><div class='date'>Saved</div>").show();
                $("#picker" + c + " .pick-status").show();
                $("#picker" + c + " .save-status").html("").hide();
                $("#soccer-picker" + c).data("bru-existing", d.left_score + "-" + d.right_score);
                $("#picker" + c + " .pick-status").append("<div><a href='javascript:void(0)' onclick='brupicks.lockPick(" + c + ")' class='lock-link' data-tooltip=\"Lock your pick to see other players' picks before kick-off\">Lock Pick</a></div>");
                brupicks.data.submitAttempt = 0;
                console.log("pick: " + m.data.text);
                $(".left-col .match-card[data-bru-game-id=" + c + "]").data("bru-pick", m.data.text);
                $("#cricket-picker" + c + " select").addClass("saved");
                brupicks.updateSummary(c)
            } else {
                $("#cricket-picker" + c + " select").addClass("error");
                if (m.code != 0) {
                    $("#picker" + c + " .save-status").show().addClass("error").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i><div class="status-tag">Not saved:<br />' + m.data + "</div>")
                } else {
                    if (brupicks.data.submitAttempt <= 2) {
                        var g = window.setTimeout(function () {
                            brupicks.savePick(c, b, d)
                        }, 3000)
                    } else {
                        brupicks.data.submitAttempt = 0;
                        console.log("save pick error (A) token " + b);
                        var k = encodeURI(JSON.stringify(d));
                        $("#picker" + c + " .save-status").show().addClass("error").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i><div class="status-tag">Save failed!</div><button onclick="brupicks.savePick(' + c + ",'" + b + "','" + k + "')\">Try Again</button>");
                        brupicks.recordPickError(b, l.status, m.data)
                    }
                }
            }
        }).fail(function (l, k) {
            $("#cricket-picker" + c + " select").addClass("error");
            if (e.dataType == "jsonp") {
                l = l[0]
            }
            if (brupicks.data.submitAttempt <= 3) {
                var g = window.setTimeout(function () {
                    brupicks.savePick(c, b, d)
                }, 3000)
            } else {
                brupicks.data.submitAttempt = 0;
                var h = encodeURI(JSON.stringify(d));
                console.log("save pick error (B) token " + b);
                $("#picker" + c + " .save-status").show().addClass("error").html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i><div class="status-tag">Save failed!</div><button onclick="brupicks.savePick(' + c + ",'" + b + "','" + h + "')\">Try Again</button>");
                brupicks.recordPickError(b, l.status, l.statusText)
            }
        }).always(function (h, g) {
            $("#cricket-picker" + c + " select").removeClass("saving")
        })
    },
    recordPickError: function (b, a, c) {
    },
    updateSummary: function (a) {
        var c = $(".match-card[data-bru-game-id=" + a + "]").data("bru-round-id");
        var b = "<table class='data max pick-summary'>";
        $(".left-col .match-card[data-bru-round-id=" + c + "]").each(function () {
            b += "<tr>";
            b += "  <td class='text-right teams'>";
            b += $(this).data("bru-teams");
            b += "  </td>";
            var d = "";
            if ($(this).data("bru-pick") == "No pick") {
                d = "no-pick"
            }
            b += "  <td class='text-left pick " + d + "'>";
            b += $(this).data("bru-pick");
            b += "  </td>";
            b += "</tr>"
        });
        b += "</table>";
        $(".pick-summary").removeClass("hidden");
        $(".pick-summary .picks").html(b)
    },
    vsr: {
        triggerPopup: function (a) {
            if (a == 1) {
                var b = "<div class='vsr-slide vsr-slide-start'><p><b>The XV is Back. Ready?</b> megapool is offering Vodacom Red customers and DStv Premium subscribers exclusive prizes during Vodacom Super Rugby 2018.</p>\n<p>You have already joined your DStv account to qualify for DStv prizes.</p><p>Are you also a <b>Vodacom customer</b>?</p><div class='button-group mid'><a href='javascript:void(0)' class='button' data-action='vodacom-customer'>Yes, I'm a Vodacom customer</a><a href='javascript:void(0)' class='button' data-action='dstv-only'>No</a></div><br><div><a href='javascript:void(0)' class='' data-action='dstv-only'>I'm not interested, thanks</a></div></div>"
            } else {
                var b = "<div class='vsr-slide vsr-slide-start'><p><b>The XV is Back. Ready?</b> megapool is offering Vodacom Red customers and DStv Premium subscribers exclusive prizes during Vodacom Super Rugby 2018.</p>\n<p>To stand a chance to WIN, click on the button below which pertains to you:</p><div class='button-group'><a href='javascript:void(0)' class='button' data-action='vodacom-customer'>Vodacom customer</a><a href='javascript:void(0)' class='button' data-action='dstv'>DStv Premium subscriber</a><a href='javascript:void(0)' class='button' data-action='both'>Both</a><a href='javascript:void(0)' class='button' data-action='neither'>Neither</a></div></div>"
            }
            b += "<div class='vsr-slide vsr-slide-phone hidden'><p>Please enter your cell number so Superbru can verify that you are a Vodacom customer and secure your eligibility to qualify for prizes exclusive to Vodacom Red customers.</p><form class='basic'><input type='text' id='vodacom-phone' name='vodacom-phone' placeholder='Your cell number' /><div class='only'>Your number will <b>not</b> be used for marketing purposes and will only be used to verify you as a Vodacom Red customer</div></form><div class='button-group'><a href='javascript:void(0)' class='button' data-action='submit-phone' data-next='thanks'>Submit</a></div><div><a href='javascript:void(0)' class='' data-action='vodacom-back'>Back</a></div></div>";
            b += "<div class='vsr-slide vsr-slide-dstv hidden'><p><b>DStv Subscriber</b></p><p>Join your DStv Connect ID to your Superbru account to qualify for exclusive prizes from Supersport.</p><div class='button-group'><a href='/player/edit_settings.php#tab=dstv' class='button' data-action='dstv-join'>Join Accounts</a></div><div><a href='javascript:void(0)' class='' data-action='vodacom-back'>Back</a></div></div>";
            b += "<div class='vsr-slide vsr-slide-benefits hidden'><p>Would you like to know more about the benefits of being a Vodacom Red customer or a DStv Premium subscriber?</p><form class='basic'><div class='group check-group slim-margin'><label><input type='checkbox' id='vodacom-red' name='vodacom-red'>Email me information about Vodacom Red</label></div><div class='group check-group'><label><input type='checkbox' id='dstv-subs' name='dstv-subs'>Email me information about DStv Premium</label></div></form><div class='button-group'><a href='javascript:void(0)' class='button' data-action='submit-email'>Submit</a></div><div><a href='javascript:void(0)' class='' data-action='no-email'>No thanks</a></div></div>";
            b += "<div class='vsr-slide vsr-slide-close hidden'><p>Thank you! Enjoy Vodacom Super Rugby.</p><div class='button-group'><a href='javascript:void(0)' class='button' data-action='close'>Close</a></div></div>";
            bru.ui.overlay.open({
                title: "Vodacom Super Rugby",
                content: "<img src='https://superbru-cdn.scdn3.secure.raxcdn.com/superrugby/images/xv_popup_header2.jpg' width='100%' /><div class='vsr-popup'>" + b + "<a href='javascript:void(0)' target='_blank' class='vodacom-terms' data-action='vodacom-terms'>Terms and Conditions</a></div></div>",
                header: false,
                autofit: false,
                pad: false,
                width: "560px"
            });
            $("body").on("click", ".vsr-popup a", function () {
                if ($(this).data("action") == "vodacom-customer") {
                    $(".overlay .vsr-slide").addClass("hidden");
                    $(".overlay .vsr-slide-phone").removeClass("hidden")
                }
                if ($(this).data("action") == "number-terms") {
                    $(".terms-holder.number-terms").show();
                    $(this).hide()
                }
                if ($(this).data("action") == "close-number-terms") {
                    $(".terms-holder.number-terms").hide();
                    $("a.number-terms").show()
                }
                if ($(this).data("action") == "vodacom-terms") {
                    window.open("http://www.vodacom.co.za/vodacom/terms/competition-terms/vodacom-rugby-superbru-xv-is-back", "_system")
                }
                if ($(this).data("action") == "close-vodacom-terms") {
                    $(".terms-holder.vodacom-terms").hide();
                    $("a.vodacom-terms").show()
                }
                if ($(this).data("action") == "vodacom-back") {
                    $(".overlay .vsr-slide").addClass("hidden");
                    $(".overlay .vsr-slide-start").removeClass("hidden")
                }
                if ($(this).data("action") == "dstv") {
                    $(".overlay .vsr-slide").addClass("hidden");
                    $(".overlay .vsr-slide-dstv").removeClass("hidden");
                    $.ajax({
                        type: "POST",
                        url: "ajax/vodacom_phone_response.php",
                        timeout: 30000,
                        cache: false,
                        dataType: "json",
                        data: {
                            r: "dstv"
                        }
                    }).done(function (k, g, h) {
                    }).fail(function (h, g) {
                    }).always(function (h, g) {
                    })
                }
                if ($(this).data("action") == "both") {
                    $(".overlay .vsr-slide").addClass("hidden");
                    $(".overlay .vsr-slide-phone").removeClass("hidden");
                    $(".overlay .vsr-slide-phone a[data-action='submit-phone']").data("next", "dstv");
                    $.ajax({
                        type: "POST",
                        url: "ajax/vodacom_phone_response.php",
                        timeout: 30000,
                        cache: false,
                        dataType: "json",
                        data: {
                            r: "both"
                        }
                    }).done(function (k, g, h) {
                    }).fail(function (h, g) {
                    }).always(function (h, g) {
                    })
                }
                if ($(this).data("action") == "submit-phone") {
                    var e = $(".overlay #vodacom-phone").val();
                    e = e.replace(/\s/g, "");
                    var d = /^0(6|7|8){1}[0-9]{1}[0-9]{7}$/;
                    if (d.test(e) === true) {
                        $.ajax({
                            type: "POST",
                            url: "ajax/vodacom_phone_response.php",
                            timeout: 30000,
                            cache: false,
                            dataType: "json",
                            data: {
                                r: "vodacom",
                                phone: e,
                                benefits_red: 0,
                                benefits_dstv: 0
                            }
                        }).done(function (k, g, h) {
                            if (k.result == "success") {
                                $(".overlay .vsr-slide").addClass("hidden");
                                if ($(".overlay .vsr-slide-phone a[data-action='submit-phone']").data("next") == "dstv") {
                                    $(".overlay .vsr-slide-dstv").removeClass("hidden")
                                } else {
                                    $(".overlay .vsr-slide-close").removeClass("hidden")
                                }
                            } else {
                                bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                            }
                        }).fail(function (h, g) {
                            bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                        }).always(function (h, g) {
                        })
                    } else {
                        alert("Your number doesn't look correct. It should be 10 digits long, starting with 06, 07 or 08.");
                        $(".overlay #vodacom-phone").focus()
                    }
                }
                if ($(this).data("action") == "neither") {
                    $.ajax({
                        type: "POST",
                        url: "ajax/vodacom_phone_response.php",
                        timeout: 30000,
                        cache: false,
                        dataType: "json",
                        data: {
                            r: "neither"
                        }
                    }).done(function (k, g, h) {
                        if (k.result == "success") {
                            $(".overlay .vsr-slide").addClass("hidden");
                            $(".overlay .vsr-slide-benefits").removeClass("hidden")
                        } else {
                            bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                        }
                    }).fail(function (h, g) {
                        bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                    }).always(function (h, g) {
                    })
                }
                if ($(this).data("action") == "dstv-only") {
                    $.ajax({
                        type: "POST",
                        url: "ajax/vodacom_phone_response.php",
                        timeout: 30000,
                        cache: false,
                        dataType: "json",
                        data: {
                            r: "dstvonly"
                        }
                    }).done(function (k, g, h) {
                        if (k.result == "success") {
                            $(".overlay .vsr-slide").addClass("hidden");
                            $(".overlay .vsr-slide-benefits").removeClass("hidden")
                        } else {
                            bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                        }
                    }).fail(function (h, g) {
                        bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                    }).always(function (h, g) {
                    })
                }
                if ($(this).data("action") == "no-email") {
                    r = "neither";
                    if (a == 1) {
                        r = "dstv"
                    }
                    $.ajax({
                        type: "POST",
                        url: "ajax/vodacom_phone_response.php",
                        timeout: 30000,
                        cache: false,
                        dataType: "json",
                        data: {
                            r: r,
                            benefits_red: 0,
                            benefits_dstv: 0
                        }
                    }).done(function (k, g, h) {
                        if (k.result == "success") {
                            $(".overlay .vsr-slide").addClass("hidden");
                            $(".overlay .vsr-slide-close").removeClass("hidden")
                        } else {
                            bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                        }
                    }).fail(function (h, g) {
                        bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                    }).always(function (h, g) {
                    })
                }
                if ($(this).data("action") == "submit-email") {
                    var f = 0;
                    var c = 0;
                    if ($(".overlay .vsr-slide #vodacom-red").is(":checked")) {
                        f = 1
                    }
                    if ($(".overlay .vsr-slide #dstv-subs").is(":checked")) {
                        c = 1
                    }
                    r = "neither";
                    if (a == 1) {
                        r = "dstv"
                    }
                    $.ajax({
                        type: "POST",
                        url: "ajax/vodacom_phone_response.php",
                        timeout: 30000,
                        cache: false,
                        dataType: "json",
                        data: {
                            r: r,
                            benefits_red: f,
                            benefits_dstv: c
                        }
                    }).done(function (k, g, h) {
                        if (k.result == "success") {
                            $(".overlay .vsr-slide").addClass("hidden");
                            $(".overlay .vsr-slide-close").removeClass("hidden")
                        } else {
                            bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                        }
                    }).fail(function (h, g) {
                        bru.ui.alert("Sorry, this task failed. Please try again.", "Error")
                    }).always(function (h, g) {
                    })
                }
                if ($(this).data("action") == "close") {
                    bru.ui.overlay.close()
                }
            })
        }
    }
};
$(function () {
    brupicks.init()
});

