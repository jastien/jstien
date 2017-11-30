    var userId=''
    var score = 0;
    var imageG = '<img src="img/green.png"/>';
    var imageR = '<img src="img/red.png"/>';
    answers = ["Sacramento", "1861", "Gilroy", "Barack Obama", "50 states", "4"];
  
  
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
            
            var question1 = document.quiz.question1.value;
            var question2 = document.quiz.question2.value;
            var question3 = document.quiz.question3.value;
            var question4 = document.quiz.question4.value;
            var question5 = document.quiz.question5.value;
            var question6 = document.quiz.question6.value;
        
            
            var answer1Incorrect = ('<p id="one" style="color:red;">' + 'Wrong answer!' + imageR + '<br>' + 'Correct answer is: ' + answers[0] + '</p>')
            var answer2Incorrect = ('<p id="two" style="color:red;">' + 'Wrong answer!' + imageR + '<br>' + 'Correct answer is: ' + answers[1] + '</p>')
            var answer3Incorrect = ('<p id="three" style="color:red;">' + 'Wrong answer!' + imageR + '<br>' + 'Correct answer is: ' + answers[2] + '</p>')
            var answer4Incorrect = ('<p id="four" style="color:red;">' + 'Wrong answer!' + imageR + '<br>' + 'Correct answer is: ' + answers[3] + '</p>')
            var answer5Incorrect = ('<p id="five" style="color:red;">' + 'Wrong answer!' + imageR + '<br>' + 'Correct answer is: ' + answers[4] + '</p>')
            var answer6Incorrect = ('<p id="six" style="color:red;">' + 'Wrong answer!' + imageR + '<br>' + 'Correct answer is: ' + answers[5] + '</p>')
    
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
            
            if (question4 == "bo"){
                $('#displayAnswer4').append(answerCorrect);
                $('#four').hide()
                score++;
            } else{
                $('#displayAnswer4').append(answer4Incorrect);
            }
            
            if (question5 == "50"){
                $('#displayAnswer5').append(answerCorrect);
                $('#five').hide()
                score++;
            } else{
                $('#displayAnswer5').append(answer5Incorrect);
            }
            if (question6 == "4"){
                $('#displayAnswer6').append(answerCorrect);
                $('#six').hide()
                score++;
            } else{
                $('#displayAnswer6').append(answer6Incorrect);
            }
            
    
            document.getElementById("after_submit").style.visibility = "visible";
            
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
                
            $.ajax({
                type: "GET",
                url: "/jstien/hw/hw5/saveRecords.php",
                dataType: "text",
                data: {"score": score},
                success: function(data, status) {
                    // alert(data);
                    // console.log (data);   // display what feedback from server php code
                    $("#scoreAverage").append("<br>You have taken the quiz " + data.trials + " times.<br>");
                    $("#scoreAverage").append("Your average score is " + data.average);
                },
                complete: function(data, status) {
                    // alert(status);
                    // console.log(data);
                }
            });
            
            
            
            //  $.ajax({
            //     type: "GET",
            //     url: "/jstien/hw/hw5/saveRecords.php",
            //     // dataType: "text",
            //     data: {"userId": userId},
            //     success: function(data, status) {
            //         // alert(data);
            //         console.log (data);   // display what feedback from server php code
            //         // $("#scoreAverage").append("<br>You have taken the quiz " + data.trials + " times.<br>");
            //         // $("#scoreAverage").append("Your average score is " + data.average);
            //     },
            //     complete: function(data, status) {
            //         // alert(status);
            //         // console.log(data);
            //     }
            // });
            

        })// End $("#submit").click(function() 
    }) //End $(document).ready(function()
 
  