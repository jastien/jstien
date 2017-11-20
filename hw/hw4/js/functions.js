    // console.log("loco");
    
    
    var score = 0;
    var imageG = '<img src="img/green.png"/>';
    var imageR = '<img src="img/red.png"/>';
    
    
    //jQuery for the three last questions
    $(document).ready(function() {
        
        //jQuery buttn
        $("#submit").button()
        $("#reset").button()
        $("#resetSecondButton").button()
            // reset button
            // http://jsfiddle.net/jfaulk/ju0kc3ra/
            document.getElementById("reset").onclick = function reset() {
                location.reload(true);
            }
             document.getElementById("resetSecondButton").onclick = function reset() {
                location.reload(true);
            }
        
        
        $("#submit").click(function() {
            
            //Question 4
            if ($('#president').val().toLowerCase() != "bo") {
                $('#displayAnswerIncorrect4').text("Wrong answer!").css("color" ,"#ff4c4c");
                $("#displayAnswerIncorrect4").append('</br>' + imageR + 'Correct answer is Barack Obama');
                $("#displayAnswerIncorrect4").show()
                $("#displayAnswerCorrect4").hide()
                
            } else {
                $("#displayAnswerIncorrect4").hide()
                $("#displayAnswerCorrect4").show()
                $('#displayAnswerCorrect4').append('<br>' + 'Correct answer!' + imageG).css("color","#00cc00");
                score++;
            }
            
            //Question 5
            if ($('#states').val().toLowerCase() != "50") {
                $('#displayAnswerIncorrect5').text("Wrong answer!").css("color" , "#ff4c4c");
                $("#displayAnswerIncorrect5").append('</br>' + imageR + "Correct answer is 50 states");
                $("#displayAnswerIncorrect5").show()
                $("#displayAnswerCorrect5").hide()
                
            } else {
                $("#displayAnswerIncorrect5").hide()
                $("#displayAnswerCorrect5").show()
                $('#displayAnswerCorrect5').append('<br>' + 'Correct answer!' + imageG).css("color","#00cc00");        
                score++;
            }
            
            //Question 6
            if ($("#food1").is(":checked") && $("#food2").is(":checked") && $("#food3").is(":checked")) {
                $('#displayAnswerIncorrect6').text("Wrong answer!").css("color" , "#ff4c4c");
                $("#displayAnswerIncorrect6").append('</br>' + imageR + "Correct answer is cheese and vegetables");
                $("#displayAnswerIncorrect6").show()
                $("#displayAnswerCorrect6").hide()
            
            } else if ($("#food1").is(":checked") && $("#food2").is(":checked")){
                $('#displayAnswerCorrect6').text("Correct answer!").css("color","#00cc00");
                $('#displayAnswerCorrect6').append(imageG);       
                $("#displayAnswerIncorrect6").hide()
                $("#displayAnswerCorrect6").show()
                score++;
            } else{
                $('#displayAnswerIncorrect6').text("Wrong answer!").css("color" , "#ff4c4c");
                $("#displayAnswerIncorrect6").append('</br>' + imageR + "Correct answer is cheese and vegetables");
                $("#displayAnswerIncorrect6").show()
                $("#displayAnswerCorrect6").hide()
            }
            
            //display score
            
            var messages = ["Sorry, you have scored less than 80%", "Yee, you have scored above 80%!"];
            var pictures = ["img/red.png","img/green.png"];
        
            var range;
            var congratulations = '<h1 style="color:green;">Congratulations!</h1>';
            var image = ("<img id='fireworksImage' src='img/fireworks.png'>");
            
        
            if (score < 5) {
                range = 0;
            }
            if (score >= 5 ) {
                range = 1;
                 $('#congrats').append(congratulations, image);
            }   
          
            
            document.getElementById("number_correct").innerHTML = "You got " + score + " questions correct!";
            document.getElementById("message").innerHTML = messages[range];
            


        })// End $("#submit").click(function() 
    }) //End $(document).ready(function()
    
    
    
    
    //Javascript for the last first questions
    answers = ["Sacramento", "1861", "Gilroy"];
    
    function check(){

        var question1 = document.quiz.question1.value;
        var question2 = document.quiz.question2.value;
        var question3 = document.quiz.question3.value;
    
        
        var answer1Incorrect = ('<p id="one" style="color:red;">' + 'Wrong answer!' + imageR + '<br>' + 'Correct answer is: ' + answers[0] + '</p>')
        var answer2Incorrect = ('<p id="two" style="color:red;">' + 'Wrong answer!' + imageR + '<br>' + 'Correct answer is: ' + answers[1] + '</p>')
        var answer3Incorrect = ('<p id="three" style="color:red;">' + 'Wrong answer!' + imageR + '<br>' + 'Correct answer is: ' + answers[2] + '</p>')

        var answerCorrect = ('<p id="answer1.1" style="color:green;">' + 'Correct answer!' + imageG + '</p>')
        

        
        if (question1 == "Sacramento") {
            $('#displayAnswer1').append(answerCorrect);
            $('#one').hide()
            score++;
        } else{
            $('#displayAnswer1').append(answer1Incorrect);
        }
        
        if (question2 == "1861"){
            $('#displayAnswer2').append(answerCorrect);
            $('#two').hide()
            score++;
        } else{
            $('#displayAnswer2').append(answer2Incorrect);
        }
        
        if (question3 == "Gilroy"){
            $('#displayAnswer3').append(answerCorrect);
            $('#three').hide()
            score++;
        } else{
            $('#displayAnswer3').append(answer3Incorrect);
        }
        
        // var messages = ["Sorry, you have scored less than 80%", "Yee, you have scored above 80%!"];
        // var pictures = ["img/red.png","img/green.png"];
        
        // var range;
        
        //     if (score < 5) {
        //         range = 0;
        //     }
        //     if (score >= 5 ) {
        //         range = 1;
        //     }
        
        document.getElementById("after_submit").style.visibility = "visible";
        
        // document.getElementById("message").innerHTML = messages[range];
        // document.getElementById("number_correct").innerHTML = "You got " + score + " correct!";
        
    } //End check()

    
    
    
    