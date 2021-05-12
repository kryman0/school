(function () {
    'use strict';

    var hangman = window.Hangman, i = 0;
    var letterBox = document.getElementsByClassName("letter-box")[0];
    var alphabet = "abcdefghijklmnopqrstuvwxyzåäö".split("");
    var activeWord = hangman.activeWord();
    var wordBox = document.getElementsByClassName("word")[0];
    var hangmanParts = hangman.validParts.slice();
    var resultElement = document.getElementsByClassName("result-text")[0];
    var guessingElement = document.getElementsByClassName("guessing-letters")[0];
    var guessArr = [];

    for (i = 0; i < hangman.validParts.length; i++) {
        hangman.hide(hangman.validParts[i]);
    }

    for (i = 0; i < alphabet.length; i++) {
        var letterEl = document.createElement("div");
        var letter = document.createTextNode(alphabet[i].toUpperCase());

        letterEl.className = "letter";
        letterEl.appendChild(letter);
        letterBox.appendChild(letterEl);
    }

    for (i = 0; i < activeWord.length; i++) {
        if (activeWord[i].indexOf(" ") > -1) {
            wordBox.innerHTML = wordBox.innerHTML.concat(" ");
        } else {
            wordBox.innerHTML = wordBox.innerHTML.concat("-");
        }
    }

    document.addEventListener("click", function(event) {
        if (event.target.classList.contains("letter")) {
            if (!event.target.classList.contains("clicked-letter")) {
                guessArr.push(event.target.innerHTML);
                guessArr.sort();
                guessingElement.innerHTML = guessArr.slice();

                event.target.classList.remove("letter");
                event.target.classList.add("clicked-letter");

                var wordBoxIntoArray = wordBox.innerHTML.split("");

                for (i = 0; i < activeWord.length; i++) {
                    var getIndexOfWord = activeWord[i].indexOf(event.target.innerHTML);

                    if (getIndexOfWord > -1) {
                        wordBoxIntoArray[i] = event.target.innerHTML;
                    }
                }

                if (activeWord.indexOf(event.target.innerHTML) < 0) {
                    hangman.show(hangmanParts.shift());
                }
                if (hangmanParts.length == 0 && wordBox.innerHTML != activeWord) {
                    resultElement.innerHTML = "Game Over!";
                } else if (wordBoxIntoArray.slice().join("") == activeWord) {
                    resultElement.innerHTML = "You Won The Game!";

                    hangmanParts.length = 0;
                }
                if (hangmanParts.length == 0) {
                    var letters = document.querySelectorAll(".letter");

                    for (i = 0; i < letters.length; i++) {
                        letters[i].classList.remove("letter");
                        letters[i].classList.add("clicked-letter");
                    }
                }

                wordBox.innerHTML = wordBoxIntoArray.slice().join("");
            }
        }
    });
})();
