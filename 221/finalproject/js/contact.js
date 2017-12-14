// #1 EVENT: CHANGE MENU COLOR AT HOVER:
$("ul li a").hover(function() {
    $(this).css("color", "#02baff");
}); //END #1 EVENT

// #2 EVENT: CHANGE MENU COLOR BACK AT MOUSELEAVE:
$("ul li a").mouseleave(function() {
    $(this).css("color", "");
}); //END #2 EVENT

//2. INTERACTIVE FORM, 4. and 5. event .click and .submit
$('.sendButton').button().click(function(e) {

    $("#submitForm").submit();

    e.preventDefault();

});
//END 2. INTERACTIVE FORM, 4. and 5. event .click and .submit