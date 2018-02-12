/*!
 * cleanzone-template v2.0.3 (https://foxythemes.net/themes/cleanzone/)
 * Copyright 2014-2015 Foxy Themes all rights reserved 
 */

var App = function() {
        function a(a) {
            var b = $("#sidebar-collapse")[0],
                c = $("#cl-wrapper");
            $(".cl-sidebar");
            c.hasClass("sb-collapsed") ? ($(".fa", b).addClass("fa-angle-left").removeClass("fa-angle-right"), c.removeClass("sb-collapsed")) : ($(".fa", b).removeClass("fa-angle-left").addClass("fa-angle-right"), c.addClass("sb-collapsed"))
        }
        var b = {
            animate: !1,
            popover: !0,
            assetsPath: "assets",
            imgPath: "img",
            jsPath: "js",
            libsPath: "lib",
            tooltip: !0
        };
        return {
            conf: b,
            init: function(c) {
                function d() {
                    var a = $("#cl-wrapper .collapse-button"),
                        b = a.outerHeight(),
                        c = $("#head-nav").height(),
                        d = $(window).height() - (a.is(":visible") ? b : 0) - c;
                    f.css("height", d), $("#cl-wrapper .nscroller").nanoScroller({
                        preventPageScrolling: !0
                    })
                }

                function e(a, b) {
                    if (($("#cl-wrapper").hasClass("sb-collapsed") || $(window).width() > 755 && $(window).width() < 963) && $("ul", a).length > 0) {
                        $(a).removeClass("ocult");
                        var c = $("ul", a);
                        if (!$(".dropdown-header", a).length) {
                            var d = '<li class="dropdown-header">' + $(a).children().html() + "</li>";
                            c.prepend(d)
                        }
                        g.appendTo("body");
                        var e = $(a).offset().top + 8 - $(window).scrollTop(),
                            f = $(a).width();
                        g.css({
                            top: e,
                            left: f + 8
                        }), g.html('<ul class="sub-menu">' + c.html() + "</ul>"), g.show(), c.css("top", e)
                    } else g.hide()
                }
                if ($.extend(b, c), $(".cl-vnavigation li ul").each(function() {
                        $(this).parent().addClass("parent")
                    }), $(".cl-vnavigation li ul li.active").each(function() {
                        $(this).parent().show().parent().addClass("open")
                    }), $(".cl-vnavigation").delegate(".parent > a", "click", function(a) {
                        $(".cl-vnavigation .parent.open > ul").not($(this).parent().find("ul")).slideUp(300, "swing", function() {
                            $(this).parent().removeClass("open")
                        });
                        var b = $(this).parent().find("ul");
                        b.slideToggle(300, "swing", function() {
                            var a = $(this).parent();
                            a.hasClass("open") ? a.removeClass("open") : a.addClass("open"), $("#cl-wrapper .nscroller").nanoScroller({
                                preventPageScrolling: !0
                            })
                        }), a.preventDefault()
                    }), $(".cl-toggle").click(function(a) {
                        var b = $(".cl-vnavigation");
                        b.slideToggle(300, "swing", function() {}), a.preventDefault()
                    }), $("#sidebar-collapse").click(function() {
                        a()
                    }), $("#cl-wrapper").hasClass("fixed-menu")) {
                    var f = $("#cl-wrapper .menu-space");
                    f.addClass("nano nscroller"), $(window).resize(function() {
                        d()
                    }), d(), $("#cl-wrapper .nscroller").nanoScroller({
                        preventPageScrolling: !0
                    })
                }
                var g = $("<div id='sub-menu-nav' style='position:fixed;z-index:9999;'></div>");
                $(".cl-vnavigation li").hover(function(a) {
                    e(this, a)
                }, function(a) {
                    g.removeClass("over"), setTimeout(function() {
                        !g.hasClass("over") && !$(".cl-vnavigation li:hover").length > 0 && g.hide()
                    }, 500)
                }), g.hover(function(a) {
                    $(this).addClass("over")
                }, function() {
                    $(this).removeClass("over"), g.fadeOut("fast")
                }), $(document).click(function() {
                    g.hide()
                }), $(document).on("touchstart click", function(a) {
                    g.fadeOut("fast")
                }), g.click(function(a) {
                    a.stopPropagation()
                }), $(".cl-vnavigation li").click(function(a) {
                    ($("#cl-wrapper").hasClass("sb-collapsed") || $(window).width() > 755 && $(window).width() < 963) && $("ul", this).length > 0 && !($(window).width() < 755) && (e(this, a), a.stopPropagation())
                });
                var h = 220,
                    i = 500,
                    j = $('<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>');
                j.appendTo("body"), jQuery(window).scroll(function() {
                    jQuery(this).scrollTop() > h ? jQuery(".back-to-top").fadeIn(i) : jQuery(".back-to-top").fadeOut(i)
                }), jQuery(".back-to-top").click(function(a) {
                    return a.preventDefault(), jQuery("html, body").animate({
                        scrollTop: 0
                    }, i), !1
                }), $(".nscroller").nanoScroller(), b.animate ? $("body").animate({
                    opacity: 1,
                    "margin-left": 0
                }, 400) : $("body").css({
                    opacity: 1,
                    "margin-left": 0
                }), $(".dropdown").on("shown.bs.dropdown", function() {
                    $(".nscroller").nanoScroller()
                }), $(".nav-tabs").on("shown.bs.tab", function(a) {
                    $(".nscroller").nanoScroller()
                }), b.tooltip && $('.ttip, [data-toggle="tooltip"]').tooltip(), b.popover && $('[data-popover="popover"]').popover()
            }
        }
    }(),App.speechCommand = function(a, b) {
        var c = {
            action: !1,
            dictation: !1,
            interim: !1,
            dictationEnd: !1,
            dictationEndCommand: "final.",
            listen: !1
        };
        $.extend(c, b), a ? c.action ? App.speech_commands.push({
            command: a,
            dictation: c.dictation,
            dictationEnd: c.dictationEnd,
            dictationEndCommand: c.dictationEndCommand,
            interim: c.interim,
            action: c.action,
            listen: c.listen
        }) : alert("Must have an action function") : alert("Must have a command text")
    }, App
}(App || {});
$(function() {
    function a(a) {
        for (var b = window.location.search.substring(1), c = b.split("&"), d = 0; d < c.length; d++) {
            var e = c[d].split("=");
            if (e[0] == a) return e[1]
        }
    }
    if ("webkitSpeechRecognition" in window) {
        App.speech({
            lang: "en"
        }), App.speechCommand("go to", {
            action: function() {
                $.gritter.add({
                    title: "Go to Page",
                    text: "Tell me where do you want to go?",
                    image: App.conf.imgPath + "/mic-icon.png",
                    class_name: "clean",
                    time: ""
                })
            },
            listen: function(a) {
                switch (a) {
                    case "dashboard":
                        location.href = "index.html?listen=on";
                        break;
                    case "sidebar":
                        location.href = "layouts-sidebar.html?listen=on";
                        break;
                    case "ui elements":
                        location.href = "ui-elements.html?listen=on";
                        break;
                    case "buttons":
                        location.href = "ui-buttons.html?listen=on";
                        break;
                    case "icons":
                        location.href = "ui-icons.html?listen=on";
                        break;
                    case "grid":
                        location.href = "ui-grid.html?listen=on";
                        break;
                    case "tabs":
                        location.href = "ui-tabs-accordions.html?listen=on";
                        break;
                    case "accordions":
                        location.href = "ui-tabs-accordions.html?listen=on";
                        break;
                    case "tabs and accordions":
                        location.href = "ui-tabs-accordions.html?listen=on";
                        break;
                    case "nestable lists":
                        location.href = "ui-nestable-lists.html?listen=on";
                        break;
                    case "form elements":
                        location.href = "form-elements.html?listen=on";
                        break;
                    case "validation":
                        location.href = "form-validation.html?listen=on";
                        break;
                    case "wizard":
                        location.href = "form-wizard.html?listen=on";
                        break;
                    case "input masks":
                        location.href = "form-masks.html?listen=on";
                        break;
                    case "text editor":
                        location.href = "form-wysiwyg.html?listen=on";
                        break;
                    case "tables":
                        location.href = "tables-general.html?listen=on";
                        break;
                    case "data tables":
                        location.href = "tables-datatables.html?listen=on";
                        break;
                    case "maps":
                        location.href = "maps.html?listen=on";
                        break;
                    case "typography":
                        location.href = "typography.html?listen=on";
                        break;
                    case "charts":
                        location.href = "charts.html?listen=on";
                        break;
                    case "blank page":
                        location.href = "pages-blank.html?listen=on";
                        break;
                    case "blank page header":
                        location.href = "pages-blank-header.html?listen=on";
                        break;
                    case "login":
                        location.href = "pages-login.html?listen=on";
                        break;
                    case "404 page":
                        location.href = "pages-404.html?listen=on";
                        break;
                    case "500 page":
                        location.href = "pages-500.html?listen=on";
                        break;
                    case "500 page":
                        location.href = "pages-500.html?listen=on";
                        break;
                    default:
                        $.gritter.add({
                            title: "Error",
                            text: "Could not find: <strong>" + a + "</strong> page, Please try again.",
                            image: App.conf.imgPath + "/mic-icon.png",
                            class_name: "clean",
                            time: ""
                        })
                }
            }
        }), App.speechCommand("change title", {
            action: function() {
                $.gritter.add({
                    title: "Change Title",
                    text: "Tell me the new title...",
                    image: App.conf.imgPath + "/mic-icon.png",
                    class_name: "clean",
                    time: ""
                })
            },
            listen: function(a) {
                $(".navbar-brand span").html(a)
            },
            interim: function(a) {
                $(".navbar-brand span").html(a)
            }
        }), App.speechCommand("log out", {
            action: function() {
                location.href = "pages-login.html"
            }
        }), App.speechCommand("toggle sidebar", {
            action: function() {
                App.toggleSideBar()
            }
        }), App.speechCommand("scroll down", {
            action: function() {
                var a = $(window).scrollTop();
                $("html, body").animate({
                    scrollTop: a + 500
                }, "slow")
            }
        }), App.speechCommand("scroll up", {
            action: function() {
                var a = $(window).scrollTop();
                $("html, body").animate({
                    scrollTop: a - 500
                }, "slow")
            }
        }), App.speechCommand("go bottom", {
            action: function() {
                $("html, body").animate({
                    scrollTop: $(document).height()
                }, "slow")
            }
        }), App.speechCommand("go top", {
            action: function() {
                $("html, body").animate({
                    scrollTop: 0
                }, "slow")
            }
        });
        var b = {
            action: function() {
                $.gritter.add({
                    title: "Hello",
                    text: "Tell me what is your name?",
                    image: App.conf.imgPath + "/user-icon.png",
                    class_name: "clean",
                    time: ""
                })
            },
            listen: function(a) {
                function b(a) {
                    return a.replace(/\w\S*/g, function(a) {
                        return a.charAt(0).toUpperCase() + a.substr(1).toLowerCase()
                    })
                }
                var c = b(a);
                $.gritter.add({
                    title: "Clean Zone",
                    text: "Welcome home <strong>" + c + "</strong>!",
                    image: App.conf.imgPath + "/user-icon.png",
                    class_name: "clean",
                    time: ""
                }), $(".side-user .info a").html(c), $(".profile_menu > a span").html(c)
            }
        };
        App.speechCommand("hello", b), App.speechCommand("hi", b);
        var c = {
            action: function() {
                $.gritter.add({
                    title: "Clean Zone",
                    text: "Your welcome!",
                    image: App.conf.imgPath + "/user-icon.png",
                    class_name: "clean",
                    time: ""
                })
            }
        };
        App.speechCommand("thanks", c), App.speechCommand("thank you", c), App.speechCommand("email", {
            dictation: !0,
            dictationEndCommand: "end of email",
            dictationEnd: function() {
                var a = $('<div class="progress progress-striped active" style="display:none;"><div style="width: 0%" class="progress-bar progress-bar-info">0%</div></div>').css("margin", "10px 0 0 0");
                $("#mod-info .interim").fadeOut(function() {
                    $(this).html("")
                }), a.appendTo("#mod-info .modal-body").fadeIn(), a.find(".progress-bar").animate({
                    width: 900
                }, {
                    duration: 5e3,
                    step: function(a, b) {
                        var c = (100 * a / b.end).toFixed(0);
                        $(this).html(c + "%")
                    },
                    complete: function() {
                        $("#mod-info").modal("hide")
                    }
                }), $("#mod-info .modal-body h4").html("Thank you!"), $("#mod-info .modal-body p").addClass("text-center").html("We are sending a new e-mail...")
            },
            action: function() {
                var a = $('<div role="dialog" tabindex="-1" id="mod-info" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button></div><div class="modal-body"><div class="text-center"><div class="i-circle primary"><i class="fa fa-envelope"></i></div><h4>Tell me your message...</h4><div contenteditable="true"><p class="text-left"><span class="msg"></span><span class="interim color-primary"></span></p></div></div></div><div class="modal-footer"><button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button><button data-dismiss="modal" class="btn btn-primary" type="button">Send</button></div></div></div></div>');
                a.appendTo("body"), $("#mod-info").modal(), $("#mod-info").on("hidden.bs.modal", function() {
                    $(this).removeData("bs.modal"), $(this).remove()
                })
            },
            listen: function(a) {
                $("#mod-info .msg").append(" " + a), $("#mod-info .interim").fadeOut(function() {
                    $(this).html("")
                })
            },
            interim: function(a) {
                $("#mod-info .interim").show().html(a)
            }
        }), App.speechCommand("stop", {
            action: function() {
                App.speech("stop")
            }
        }), "on" == a("listen") && App.speech("start"), $(".speech-button").click(function(a) {
            var b = $('<div role="dialog" tabindex="-1" id="mod-sound" data-backdrop="false" class="modal fade"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h2 class="hthin"><img src="' + App.conf.imgPath + '/mic-icon.png" /> Speech API</h2></div><div class="modal-body" style="padding:0 25px;"><div><h4>Voice Recognition</h4><div><p class="text-left">Thanks to Google Speech API we can do <a href="https://dvcs.w3.org/hg/speech-api/raw-file/tip/speechapi.html">Speech Recognition</a> in our web sites, initially Chrome 25+ and up versions support this, but don&#39;t worry! browsers are working on a <a href="https://wiki.mozilla.org/HTML5_Speech_API">standard</a> and soon we will see this working on our favorites browsers. </p><h4 class="spacer2">Let the party begin</h4><p>First you must to allow microphone access clicking on <strong>"Allow"</strong> option above this modal. After this you&#39;ll see the Microphone icon with a blur effect, this means that voice recognition starts.</p><h4 class="spacer2">Voice Commands</h4><p>After that, try to say <strong>"Hello"</strong> at your mic. Do you see what happens? things in template start to change, now try these commands:</p><ul><li><strong>"Go to"</strong>: wait for a message and then say a page title like "tables"</li><li><strong>"Change title"</strong> - Sets template title</li><li><strong>"Scroll down"</strong> and <strong>"Scroll up"</strong></li><li><strong>"Go top"</strong> and <strong>"Go bottom"</strong></li><li><strong>"Toggle sidebar"</strong></li><li><strong>"log out"</strong></li><li><strong>"Thank you"</strong></li><li><strong>"Stop"</strong> - Stops recognition</li><li><strong>"Email"</strong> - Compose an e-mail with your voice, to end dictation just say "end of email"</li></ul><p>Do you want more commands? you can add a voice command easily with our own API.</p></div></div></div><div class="modal-footer"><button data-dismiss="modal" class="btn btn-primary" type="button">DONE!</button></div></div></div></div>');
            b.appendTo("body"), $("#mod-sound").modal(), $("#mod-sound").on("hidden.bs.modal", function() {
                $(this).removeData("bs.modal"), $(this).remove()
            }), App.speech("start"), a.preventDefault(), a.stopPropagation()
        })
    }
});