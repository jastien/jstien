            // var randomNumber = 5 + 6;
            // console.log(randomNumber);
            
            var randomNumber = Math.floor(Math.random() * 99) + 1;
            console.log(randomNumber);
            
            //To display the number to guess in the HTML
            // document.getElementById("numberToGuess").innerHTML = randomNumber;
            
            var guesses = document.querySelector('#guesses');
            var lastResult = document.querySelector('#lastResult');
            var lowOrHi = document.querySelector('#lowOrHi');
            
            var guessSubmit = document.querySelector('.guessSubmit');
            var guessField = document.querySelector('.guessField');
            
            var guessCount = 1;
            // var resetButton;
            var resetButton = document.querySelector('#reset');
            guessField.focus();
            resetButton.style.display = 'none';
            
            var correct = 0;
            var incorrect = 0;
            function checkGuess() {
                // alert('I am a placeholder');
                score.innerHTML = 'Wins: ' + correct + ' and losses: ' + incorrect + '!';
                score.style.backgroundColor = 'white';
            
                var userGuess = Number(guessField.value);
                if (guessCount === 1) {
                    guesses.innerHTML = 'Previous guesses: ';
                    guesses.style.backgroundColor = 'white';
                }
                guesses.innerHTML += userGuess + ' ,';
                
                    if (userGuess === randomNumber) {
                        lastResult.innerHTML = 'Congratulations! Your got it right!';
                        lastResult.style.backgroundColor = '#00cc00';
                        lastResult.style.padding = '20px';
                        lowOrHi.innerHTML = '';
                        $('#lowOrHi').hide();
                        correct++;
                        //  won++;
                        setGameOver();
                    } else if (guessCount === 7) {
                        lastResult.innerHTML = 'Sorry, you lost! The number to guess was ' + randomNumber + '!';
                        lastResult.style.backgroundColor = '#ff4c4c';
                        lastResult.style.padding = '20px';
                        $('#lowOrHi').hide();
                        incorrect++;
                        // lost++;
                        setGameOver();
                    } else{
                        lastResult.innerHTML = 'Wrong';
                        lastResult.style.backgroundColor = '#ff4c4c';
                        lastResult.style.padding = '5px';
                        if (userGuess < 0 || userGuess > 100){
                            $('#lowOrHi').show();
                            lowOrHi.innerHTML = 'Please enter a number betweeen 1 and 99! This attempt does not. This attempt does not apply as one of the seven attempts!';
                            lowOrHi.style.backgroundColor = '#ff4c4c';
                            // $('#guesses').hide();
                            // $("#guesses").empty(this);
                            guessCount--;

                        } else if (userGuess < randomNumber) {
                            $('#lowOrHi').show();
                            lowOrHi.innerHTML = 'Last guess was too low!';
                            lowOrHi.style.backgroundColor = 'white';
                            lowOrHi.style.color = 'red';
                            
                        } else if (userGuess > randomNumber) {
                            $('#lowOrHi').show();
                            lowOrHi.innerHTML = 'Last guess was too high!';
                            lowOrHi.style.backgroundColor = 'white';
                            lowOrHi.style.color = 'green';
                        }
                    }
                    
                    guessCount++;
                    guessField.value = '';
                    guessField.focus();
                    
            } //End function checkGuess
            
            guessSubmit.addEventListener('click', checkGuess);
            
            function setGameOver() {
                guessField.disabled = true;
                guessSubmit.disabled = true;
                resetButton.style.display = 'inline';
                resetButton.addEventListener('click', resetGame);
            }
            
            function resetGame() {
                guessCount = 1;
            
                var resetParas = document.querySelectorAll('.resultParas p');
                for (var i = 0; i < resetParas.length; i++) {
                    resetParas[i].textContent = '';
                }
            
                resetButton.style.display = 'none';
            
                guessField.disabled = false;
                guessSubmit.disabled = false;
                guessField.value = '';
                guessField.focus();
            
                lastResult.style.backgroundColor = 'white';
            
                randomNumber = Math.floor(Math.random() * 99) + 1;
            }//end function resetGame()
            
            
            //reset button
            // http://jsfiddle.net/jfaulk/ju0kc3ra/
            // document.getElementById("reset").onclick = function reset() {
            //     location.reload(true);
            // }
            
            