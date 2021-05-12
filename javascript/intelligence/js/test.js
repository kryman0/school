/** Test main module for the application. */
var Test = (function() {
    "use strict";

    /** Variables defined. */
    var countDown, counter, fizzBuzzText = "", fizzBuzzValues = [], flag, flags = [];
    var flagsGuessed, getQuestion, getQuestionElement, getSuggestions = [], getTest4ListItems, i;
    var li, number, ol, pauseObject, questionAndSuggestion = 0, showObject, sum = 0, table, td;
    var test1Sum = 0, test2Sum = 0, test3Sum = 0, test4Sum = 0, test5Sum = 0, test3FlagsElement;
    var test3IntroElement, test3FlagsTimeout, test4Object, totalSum = 0;
    var button, buttonYes, div, img, nextTestButton, para;
    var texts = [
        "Det rätta svaret är",
        "Gå vidare till nästa fråga?",
        "Gå vidare till nästa test?",
        "Testet börjar med att 9 flaggor visas under 5 sekunder. Därefter döljs de. " +
        "Du skall nu klicka på rätt ruta där motsvarande flagga ligger, i rätt ordning. " +
        "Du får fortsätta så länge du gissar rätt. När alla flaggorna visas så är testet över, " +
        "eller när du gissar fel. Rätt klick ger ett poäng styck.",
        "Testet kommer rita ut 10 unika objekt. Objektet kan vara en kvadrat, cirkel, triangel " +
        "eller en rektangel. Objektet har en färg. Du kommer få en numrerad lista med 10 " +
        "alternativ som säger i vilken ordning som de olika objekten skall klickas på. " +
        "Du måste klicka på rätt objekt i rätt ordning. Om du klickar fel så fortsätter testet " +
        "med nästa alternativ på listan. Testet sker under tidspress på 15 sekunder.",
        "I testet ska man välja att klicka eller inte klicka på ett objekt som uppfyller eller " +
        "inte uppfyller något av de tre alternativen som presenteras vid varje objekt. " +
        "Testet visar ett objekt under 1 sekund därefter en paus i 1 sekund. " +
        "Allt som allt visas tio objekt. Objekten är samma som i övningen innan."
    ];

    var welcomeElement = document.getElementsByClassName("welcome-box")[0];
    var test1Element = document.getElementsByClassName("test1")[0];
    var testTitle = document.getElementsByClassName("test-title")[0];
    var test1ButtonElementClicked = document.getElementsByClassName("test1-button");
    var questionElement = document.getElementsByClassName("questions")[0];
    var suggestionElement = document.getElementsByClassName("suggestions")[0];
    var displayAnswerElement = document.getElementsByClassName("display-answer")[0];
    var displayPointsElement = document.getElementsByClassName("display-points")[0];
    var askForNextQuestionElement = document.getElementsByClassName("ask-for-next-question")[0];

    /**
     * @function renew
     * @param {string} currentTest - Check current test.
     * Renew (remove/add) elements after reset.
     */
    function removeElements(currentTest) {
        test1Element.removeChild(questionElement);
        test1Element.removeChild(suggestionElement);
        test1Element.removeChild(displayAnswerElement);
        test1Element.removeChild(displayPointsElement);
        test1Element.removeChild(askForNextQuestionElement);

        fizzBuzzText = "";
        fizzBuzzValues.length = 0, getSuggestions.length = 0, questionAndSuggestion = 0, sum = 0;

        questionElement = document.createElement("div");
        questionElement.className = "questions";
        suggestionElement = document.createElement("div");
        suggestionElement.className = "suggestions";
        displayAnswerElement = document.createElement("div");
        displayAnswerElement.className = "display-answer";
        displayPointsElement = document.createElement("div");
        displayPointsElement.className = "display-points";
        askForNextQuestionElement = document.createElement("div");
        askForNextQuestionElement.className = "ask-for-next-question";
        test1Element.appendChild(questionElement);
        test1Element.appendChild(suggestionElement);
        test1Element.appendChild(displayAnswerElement);
        test1Element.appendChild(displayPointsElement);
        test1Element.appendChild(askForNextQuestionElement);

        while (suggestionElement.firstChild) {
            suggestionElement.removeChild(suggestionElement.firstChild);
        }

        if (currentTest == "test1") {
            if (!document.body.contains(welcomeElement)) {
                while (suggestionElement.firstChild) {
                    suggestionElement.removeChild(suggestionElement.firstChild);
                }

                getQuestion = window.Test1.questions(questionAndSuggestion);
                questionElement.innerHTML = getQuestion;
                window.Test1.suggestions[questionAndSuggestion].forEach(function (element) {
                    getSuggestions.push(element).toString();
                });

                for (i = 0; i < getSuggestions.length; i++) {
                    button = document.createElement("button");
                    button.classList.add("test1-button");
                    button.innerHTML = getSuggestions[i];
                    suggestionElement.appendChild(button);
                }

                getSuggestions.length = 0;
            }
        } else if (currentTest == "test2") {
            testTitle.innerHTML = "Deltest 2: Fizzbuzz";

            fizzBuzzValues = window.Test2.fizzBuzz().slice(-5);
            fizzBuzzValues.slice(0, -1).map(el => fizzBuzzText += el.toString() + " ");

            questionElement.innerHTML = window.Test2.question + " " + fizzBuzzText;

            for (i = 0; i < 4; i++) {
                button = document.createElement("button");
                button.classList.add("test1-button");

                if (i == 0) {
                    button.innerHTML = "fizz";
                } else if (i == 1) {
                    button.innerHTML = "buzz";
                } else if (i == 2) {
                    button.innerHTML = "fizzBuzz";
                } else {
                    window.Test2.fizzBuzz().length = 0;
                    button.innerHTML = window.Test2.fizzBuzz().length;
                }

                suggestionElement.appendChild(button);
            }
        } else if (currentTest == "test3") {
            if (test3FlagsTimeout != undefined) {
                clearTimeout(test3FlagsTimeout);
            }

            if (test1Element.contains(test3IntroElement)) {
                test1Element.removeChild(test3IntroElement);
            }

            div = document.createElement("div");
            div.className = "test3-intro";
            test1Element.appendChild(div);
            testTitle.innerHTML = "Deltest 3: Minne";
            test1Element.style.display = "block";
            test1Element.style.width = "60%";
            para = document.createElement("p");
            para.innerHTML = 'Klicka <span class="link-to-test">här</span> för att fortsätta.';
            div.innerHTML = texts[3];
            div.append(para);
            test3IntroElement = document.getElementsByClassName("test3-intro")[0];
        } else if (currentTest == "test4") {
            if (test1Element.contains(test3IntroElement)) {
                test1Element.removeChild(test3IntroElement);
            }

            div = document.createElement("div");
            div.className = "test3-intro";
            test1Element.appendChild(div);
            testTitle.innerHTML = "Deltest 4: Visuell förmåga och läsförståelse";
            test1Element.style.display = "block";
            test1Element.style.width = "60%";
            para = document.createElement("p");
            para.innerHTML = 'Klicka <span class="link-to-test">här</span> för att fortsätta.';
            div.innerHTML = texts[4];
            div.append(para);
            test3IntroElement = document.getElementsByClassName("test3-intro")[0];

            if (countDown || !countDown) {
                clearInterval(countDown);
            }
        } else if (currentTest == "test5") {
            counter = 0;

            if (test1Element.contains(test3IntroElement)) {
                test1Element.removeChild(test3IntroElement);
            }

            div = document.createElement("div");
            div.className = "test3-intro";
            test1Element.appendChild(div);
            testTitle.innerHTML = "Deltest 5: Uppfattningsförmåga";
            test1Element.style.display = "block";
            test1Element.style.width = "60%";
            para = document.createElement("p");
            para.innerHTML = 'Klicka <span class="link-to-test">här</span> för att fortsätta.';
            div.innerHTML = texts[5];
            div.append(para);
            test3IntroElement = document.getElementsByClassName("test3-intro")[0];

            if (showObject || !showObject) {
                clearInterval(showObject);
                clearTimeout(pauseObject);
            }
        }
    }

    /**
     * @function runAgain
     * Run once main function.
     */
    function runAgain() {
        document.addEventListener("click", function (event) {
            event.stopImmediatePropagation();
            if (event.target.classList.contains("link-to-test")) {
                if (window.Test1.testOne) {
                    document.body.removeChild(welcomeElement);
                    test1Element.style.display = "block";
                    testTitle.innerHTML = "Deltest 1: Tipsfrågor";

                    getQuestion = window.Test1.questions(questionAndSuggestion);
                    questionElement.innerHTML = getQuestion;
                    window.Test1.suggestions[questionAndSuggestion].forEach(function (element) {
                        getSuggestions.push(element).toString();
                    });

                    for (i = 0; i < getSuggestions.length; i++) {
                        button = document.createElement("button");
                        button.classList.add("test1-button");
                        button.innerHTML = getSuggestions[i];
                        suggestionElement.appendChild(button);
                    }

                    getSuggestions.length = 0;

                    buttonYes = document.createElement("button");
                    buttonYes.className = "test1-button-yes";
                    buttonYes.innerHTML = "Ja";
                    askForNextQuestionElement.append(buttonYes);
                } else if (window.Test3.testThree) {
                    test3IntroElement = document.getElementsByClassName("test3-intro")[0];
                    test3IntroElement.style.display = "none";

                    flags = window.Test3.flags.slice();
                    div = document.createElement("div");
                    div.className = "test3-countries";
                    questionElement.appendChild(div);

                    getQuestionElement = document.getElementsByClassName("test3-countries")[0];
                    getQuestionElement.style.visibility = "hidden";

                    for (i = 0; i < flags.length; i++) {
                        div = document.createElement("div");

                        if (i == 0) {
                            div.innerHTML = "1. " + flags[6];
                        } else if (i == 1) {
                            div.innerHTML = "2. " + flags[3];
                        } else if (i == 2) {
                            div.innerHTML = "3. " + flags[0];
                        } else if (i == 3) {
                            div.innerHTML = "4. " + flags[8];
                        } else if (i == 4) {
                            div.innerHTML = "5. " + flags[4];
                        } else if (i == 5) {
                            div.innerHTML = "6. " + flags[1];
                        } else if (i == 6) {
                            div.innerHTML = "7. " + flags[7];
                        } else if (i == 7) {
                            div.innerHTML = "8. " + flags[2];
                        } else if (i == 8) {
                            div.innerHTML = "9. " + flags[5];
                        }

                        getQuestionElement.appendChild(div);

                        div = document.createElement("div");
                        div.classList.add("test3-flags", "flag" + (i + 1));
                        img = document.createElement("img");
                        img.setAttribute("src", "img/flag" + (i + 1) + ".png");
                        img.classList.add("flags", "flag" + (i + 1));
                        div.appendChild(img);
                        suggestionElement.appendChild(div);
                    }

                    test3FlagsElement = document.getElementsByClassName("test3-flags");

                    flagsGuessed = 1, sum = 0;

                    test3FlagsTimeout = setTimeout(function () {
                        for (i = 0; i < test3FlagsElement.length; i++) {
                            while (test3FlagsElement[i].firstChild) {
                                test3FlagsElement[i].removeChild(test3FlagsElement[i].firstChild);
                            }
                        }

                        getQuestionElement.style.visibility = "visible";
                    }, 5000);
                } else if (window.Test4.testFour) {
                    Test.test4();
                } else if (window.Test5.testFive) {
                    Test.test5();
                }
            } else if (event.target.classList.contains("test1-button")) {
                if (!event.target.style.backgroundColor) {
                    displayAnswerElement.style.display = "block";
                    displayPointsElement.style.display = "block";
                    askForNextQuestionElement.style.display = "block";

                    if (window.Test1.testOne) {
                        for (i = 0; i < test1ButtonElementClicked.length; i++) {
                            if (test1ButtonElementClicked[i].innerHTML ==
                                window.Test1.answers[questionAndSuggestion]) {
                                test1ButtonElementClicked[i].style.backgroundColor = "green";
                            } else {
                                test1ButtonElementClicked[i].style.backgroundColor = "red";
                            }
                        }

                        if (event.target.innerHTML == window.Test1.answers[questionAndSuggestion]) {
                            sum += 3;
                        }

                        test1Sum = sum;

                        var displayText1 = texts[0]+" "+window.Test1.answers[questionAndSuggestion];

                        displayAnswerElement.innerHTML = displayText1;
                        displayPointsElement.innerHTML = "Dina poäng: " + sum;

                        askForNextQuestionElement.innerHTML = texts[1];
                        askForNextQuestionElement.append(buttonYes);

                        if (questionAndSuggestion == window.Test1.suggestions.length - 1) {
                            askForNextQuestionElement.innerHTML = texts[2];
                            nextTestButton = document.createElement("button");
                            nextTestButton.className = "next-test";
                            nextTestButton.innerHTML = "Ja";
                            askForNextQuestionElement.append(nextTestButton);
                        }

                        questionAndSuggestion++;
                    } else if (window.Test2.testTwo) {
                        for (i = 0; i < test1ButtonElementClicked.length; i++) {
                            if (test1ButtonElementClicked[i].innerHTML ==
                                window.Test2.fizzBuzz().slice(-1)) {
                                test1ButtonElementClicked[i].style.backgroundColor = "green";
                            } else {
                                test1ButtonElementClicked[i].style.backgroundColor = "red";
                            }
                        }

                        if (event.target.innerHTML == window.Test2.fizzBuzz().slice(-1)) {
                            sum += 3;
                        }

                        test2Sum = sum;

                        var displayText2 = texts[0] + " " + window.Test2.fizzBuzz().slice(-1);

                        displayAnswerElement.innerHTML = displayText2;
                        displayPointsElement.innerHTML = "Dina poäng: " + sum;

                        askForNextQuestionElement.innerHTML = texts[2];
                        nextTestButton = document.createElement("button");
                        nextTestButton.className = "next-test";
                        nextTestButton.innerHTML = "Ja";
                        askForNextQuestionElement.append(nextTestButton);
                    }
                }
            } else if (event.target.classList.contains("test1-button-yes")) {
                displayAnswerElement.style.display = "none";
                askForNextQuestionElement.style.display = "none";

                getQuestion = window.Test1.questions(questionAndSuggestion);
                questionElement.innerHTML = getQuestion;
                window.Test1.suggestions[questionAndSuggestion].forEach(function (element) {
                    getSuggestions.push(element).toString();
                });

                for (i = 0; i < getSuggestions.length; i++) {
                    button = document.createElement("button");
                    button.classList.add("test1-button");
                    button.innerHTML = getSuggestions[i];
                    suggestionElement.replaceChild(button, suggestionElement.children[i]);
                }

                getSuggestions.length = 0;
            } else if (event.target.classList.contains("test3-flags")) {
                flag = event.target;

                if (window.Test3.checkFlag(flagsGuessed, flag.className)) {
                    number = window.Test3.checkFlag(flagsGuessed, flag.className);
                    sum++;
                    flagsGuessed++;

                    test3Sum = sum;

                    img = document.createElement("img");
                    img.setAttribute("src", "img/flag" + number + ".png");
                    img.classList.add("flags", "flag" + number);

                    for (i = 0; i < test3FlagsElement.length; i++) {
                        if (test3FlagsElement[i].classList.contains("flag" + number)) {
                            test3FlagsElement[i].appendChild(img);
                        }
                    }

                    displayPointsElement.style.display = "block";
                    displayPointsElement.style.clear = "both";
                    displayPointsElement.innerHTML = "Dina poäng: " + sum;

                    if (flagsGuessed == 10) {
                        askForNextQuestionElement.style.display = "block";
                        askForNextQuestionElement.innerHTML = texts[2];
                        nextTestButton = document.createElement("button");
                        nextTestButton.className = "next-test";
                        nextTestButton.innerHTML = "Ja";
                        askForNextQuestionElement.append(nextTestButton);
                    }
                } else {
                    for (i = 0; i < test3FlagsElement.length; i++) {
                        img = document.createElement("img");
                        img.setAttribute("src", "img/flag" + (i + 1) + ".png");
                        img.classList.add("flags", "flag" + (i + 1));
                        if (test3FlagsElement[i].firstChild) {
                            continue;
                        } else {
                            test3FlagsElement[i].appendChild(img);
                        }
                    }

                    displayPointsElement.style.display = "block";
                    displayPointsElement.style.clear = "both";
                    displayPointsElement.innerHTML = "Dina poäng: " + sum;

                    askForNextQuestionElement.style.display = "block";
                    askForNextQuestionElement.innerHTML = texts[2];
                    nextTestButton = document.createElement("button");
                    nextTestButton.className = "next-test";
                    nextTestButton.innerHTML = "Ja";
                    askForNextQuestionElement.append(nextTestButton);
                }
            } else if (countDown) {
                test4Object = event.target;

                if (test4Object.classList.contains("test4-objects")) {
                    if (number != 10) {
                        number++;
                        getTest4ListItems.style.removeProperty("font-weight");
                        getTest4ListItems = document.getElementsByClassName("test4-li" + number)[0];
                        getTest4ListItems.style.setProperty("font-weight", "bold");
                    }

                    if (window.Test4.checkObject(flagsGuessed, test4Object.className)) {
                        sum++;
                        flagsGuessed++;

                        test4Sum = sum;
                    } else {
                        flagsGuessed++;
                    }
                }
            } else if (showObject) {
                var test5Object = event.target;

                if (test5Object.classList.contains("test5-suggestions")) {
                    var getRightNumber=window.Test5.checkObject(counter + 1, test5Object.className);

                    if (counter + 1 == getRightNumber) {
                        sum++;
                        test5Sum = sum;
                    }
                }
            } else if (event.target.classList.contains("next-test")) {
                if (window.Test1.testOne) {
                    window.Test1.testOne = false;
                    window.Test2.testTwo = true;

                    removeElements("test2");
                } else if (window.Test2.testTwo) {
                    window.Test2.testTwo = false;
                    window.Test3.testThree = true;

                    removeElements("test3");
                } else if (window.Test3.testThree) {
                    window.Test3.testThree = false;
                    window.Test4.testFour = true;

                    removeElements("test4");
                } else if (window.Test4.testFour) {
                    window.Test4.testFour = false;
                    window.Test5.testFive = true;

                    removeElements("test5");
                }
            }
        });
    }

    /** Test4 function. */
    function test4() {
        test1Element.removeChild(test3IntroElement);
        ol = document.createElement("ol");
        ol.className = "test4-ol";
        table = document.createElement("table");
        table.className = "test4-table";
        var tr1 = document.createElement("tr");
        var tr2 = document.createElement("tr");
        var tr3 = document.createElement("tr");

        table.append(tr1, tr2, tr3);
        suggestionElement.appendChild(table);

        for (i = 0; i < window.Test4.questions.length; i++) {
            li = document.createElement("li");
            li.classList.add("test4-li" + (i + 1));
            li.innerHTML = window.Test4.questions[i];

            td = document.createElement("td");

            if (i == 0 || i == 4 || i == 7) {
                td.classList.add("test4-objects", "square", "object" + (i + 1));
            } else if (i == 1 || i == 6 || i == 9) {
                td.classList.add("test4-objects", "rectangle", "object" + (i + 1));
            } else if (i == 2 || i == 8) {
                td.classList.add("test4-objects", "circle", "object" + (i + 1));
            } else {
                td.classList.add("test4-objects", "triangle", "object" + (i + 1));
            }

            if (i < 4) {
                tr1.appendChild(td);
            } else if (i > 3 && i < 7) {
                tr2.appendChild(td);
            } else {
                tr3.appendChild(td);
            }

            ol.appendChild(li);
        }

        questionElement.appendChild(ol);

        counter = 15, flagsGuessed = 1, number = 1, sum = 0;

        getTest4ListItems = document.getElementsByClassName("test4-li1")[0];
        getTest4ListItems.style.setProperty("font-weight", "bold");

        countDown = setInterval(function () {
            if (counter === 0) {
                clearInterval(countDown);
                countDown = false;

                displayPointsElement.style.display = "block";
                displayPointsElement.style.clear = "both";
                displayPointsElement.innerHTML = "Dina poäng: " + sum;

                askForNextQuestionElement.style.display = "block";
                askForNextQuestionElement.innerHTML = texts[2];
                nextTestButton = document.createElement("button");
                nextTestButton.className = "next-test";
                nextTestButton.innerHTML = "Ja";
                askForNextQuestionElement.append(nextTestButton);
            }

            counter--;
        }, 1000);
    }

    /** Test5 function. */
    function test5() {
        var test5ObjEl, test5QuestionsElement, test5SuggestionsElement;

        test1Element.removeChild(test3IntroElement);

        div = document.createElement("div");
        div.className = "test5-questions-box";
        questionElement.appendChild(div);
        test5QuestionsElement = document.getElementsByClassName("test5-questions-box")[0];

        div = document.createElement("div");
        div.className = "test5-suggestions-box";
        questionElement.appendChild(div);
        test5SuggestionsElement = document.getElementsByClassName("test5-suggestions-box")[0];

        window.Test5.questions.forEach(function (el) {
            div = document.createElement("div");
            div.className = "test5-questions";
            div.innerHTML = el;
            test5QuestionsElement.appendChild(div);
        });

        showObject = setInterval(function () {
            test5ObjEl = document.getElementsByClassName("test5-suggestions")[0];

            if (counter == window.Test5.objectsClasses.length) {
                clearInterval(showObject);
                showObject = false;

                displayPointsElement.style.display = "block";
                displayPointsElement.style.clear = "both";
                displayPointsElement.innerHTML = "Dina poäng: " + sum;

                askForNextQuestionElement.style.display = "block";
                totalSum = test1Sum + test2Sum + test3Sum + test4Sum + test5Sum;

                var intelligenceText1 = "Din intelligens av maximal intelligens: ";

                askForNextQuestionElement.innerHTML = intelligenceText1 + totalSum + " av 47.";
            }

            div = document.createElement("div");
            div.className = window.Test5.objectsClasses[counter];
            div.classList.add("test5-suggestions");
            test5SuggestionsElement.appendChild(div);

            pauseObject = setTimeout(function () {
                while (test5SuggestionsElement.firstChild) {
                    test5SuggestionsElement.removeChild(test5SuggestionsElement.firstChild);
                }
                clearTimeout(pauseObject);
                counter++;
            }, 1000);

            if (test5SuggestionsElement.contains(test5ObjEl)) {
                test5SuggestionsElement.removeChild(test5ObjEl);
            }
        }, 1000);
    }

    /** Returning this Test module as an object. */
    var test = {
        "reset": function() {
            if (window.Test1.testOne) {
                Test.removeElements("test1");
            } else if (window.Test2.testTwo) {
                Test.removeElements("test2");
            } else if (window.Test3.testThree) {
                Test.removeElements("test3");
            } else if (window.Test4.testFour) {
                Test.removeElements("test4");
            } else if (window.Test5.testFive) {
                Test.removeElements("test5");
            }
        },

        "runAgain": runAgain,

        "removeElements": removeElements,

        "test4": test4,

        "test5": test5
    };

    return test;
})();

Test.runAgain();
