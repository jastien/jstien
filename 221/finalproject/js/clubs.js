//Array of teams accessible in global
var teams = []

$(document).ready(function() {
        // #1 EVENT: CHANGE MENU COLOR AT HOVER:
        $("ul li a").hover(function() {
            $(this).css("color", "#02baff");
        }); //END #1 EVENT

        // #2 EVENT: CHANGE MENU COLOR BACK AT MOUSELEAVE:
        $("ul li a").mouseleave(function() {
            $(this).css("color", "");
        }); //END #2 EVENT

        var state = $('#state').val();

        //Making the button into jQuery button
        $('button').button();

        //3. EVENT: click
        $("#submit").click(function() {
                // console.log(teams)
                if ($("#type").val()) {
                    var state = $("#type").val()
                        // console.log(team)
                    for (var i in teams[0]) {
                        if (teams[0][i].state == state) {
                            // console.log(teams[0][i])
                            // For loop to loop through data and display it in HTML.
                            //If/else statements to hide name and phone values is not provided in spreadsheet. 
                            if (teams[0][i].stateorganizationname == undefined) {
                                var name = ('<p id="name">' + 'State Organization Name: Not available </p>')
                            }
                            else {
                                var name = ('<p id="name">' + 'State Organization Name: ' + teams[0][i].stateorganizationname + '</p>')
                            }
                            if (teams[0][i].phone == undefined) {
                                var phone = ('<p id="phone">' + 'Phone: Not available </p>')
                            }
                            else {
                                var phone = ('<p id="phone">' + 'Phone: ' + teams[0][i].phone + '</p>')
                            }
                            var state = ('<p id="state">' + 'State: ' + teams[0][i].state + '</p>')
                            var contactPerson = ('<p id="contactperson">' + 'Contact Person: ' + teams[0][i].contactperson + '</p>')
                            var email = ('<p id="email">' + 'Email: ' + teams[0][i].email + '</p>')

                            $('#displayData').append(state, name, contactPerson, email, phone);
                            $('#displayData').append("<br>" + "<br>");

                        }
                    }
                }


            }) // END 3. EVENT: click

        $.ajax({
            //URL to get manufacturer
            url: 'https://anydata.hensys.com/sheet/1V78dkAg6Mo5aHJnTXjFqL3QkUfKm6NnlBpe9CdOW-CI',
            dataType: 'json',
            type: 'GET'
        })

        .done(function(data) {
                console.log(data);
                teams = data
                    //For loop to display states in form. 
                for (var i in data[0]) {
                    $("#type").append($('<option>').html(data[0][i].state).attr('value', data[0][i].state))
                } //End for loop.
            }) //End done function

        .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

    }) //End document.ready
