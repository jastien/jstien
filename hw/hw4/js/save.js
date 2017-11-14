    // console.log("loco");
    
    function check(){
        
        var question1 = document.quiz.question1.value;
        var question2 = document.quiz.question2.value;
        var question3 = document.quiz.question3.value;
        var correct = 0;
        
        if (question1 == "Sacramento") {
            correct++;
        }
        if (question2 == "1861"){
            correct++;
        }
        if (question3 == "Gilroy"){
            correct++;
        }
        
        var messages = ["Sorry, you have scored less than 80%", "Yee, you have scored above 80%!"];
        var pictures = ["img/red.png","img/green.png"];
        
        var range;
        
            if (correct < 5) {
                range = 0;
            }
            if (correct >= 5 ) {
                range = 1;
            }
            
        $("#after_submit").html($("<h1>Answers</h1>"))
            $("#message").append($("<table border=1>").append("<th>Question</th><th>Your Answer</th><th>Correct Answer</th>")
            .append($("<tr>")
                    .append($("<td>").html("Who is the most recent president?"))
                    .append($("<td>").html($("#president").val()))
                    .append($("<td>").html("Barack Obama"))
                )
            )
                
        
        
        document.getElementById("after_submit").style.visibility = "visible";
        document.getElementById("message").innerHTML = messages[range];
        document.getElementById("number_correct").innerHTML = "You got " + correct + " correct!";
        document.getElementById("picture").src = pictures[range];
    }