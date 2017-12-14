$(document).ready(function() {
        // #1 EVENT: CHANGE MENU COLOR AT HOVER:
        $("ul li a").hover(function() {
            $(this).css("color", "#02baff");
        }); //END #1 EVENT

        // #2 EVENT: CHANGE MENU COLOR BACK AT MOUSELEAVE:
        $("ul li a").mouseleave(function() {
            $(this).css("color", "");
        }); //END #2 EVENT


        $(function() {
            $('#accordion').accordion();

        });

        // #2 EVENT CHANGE ACCODION MENU COLOR AT HOVER:
        $("ul li a").hover(function() {
            $(this).css("color", "#02baff");
        });

        $("ul li a").mouseleave(function() {
            $(this).css("color", "");
        }); //END #2 EVENT
    }) //End document.ready
