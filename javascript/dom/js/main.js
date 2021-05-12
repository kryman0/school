(function () {
    'use strict';

    var box1 = document.getElementById("box1");

    var box1CSS = getComputedStyle(box1);

    function getBrowserSize() {
        console.log("Inner width: " + innerWidth + "px," + " inner height: " + innerHeight + "px");

        console.log("getComp. width: " + box1CSS.width + "," + " height: " + box1CSS.height);

        console.log("offs. width: " + box1.offsetWidth + "," + " height: " + box1.offsetHeight);

        console.log("getComp. left: " + box1CSS.left + "," + " top: " + box1CSS.top);
    }

    getBrowserSize();

    function moveBoxCenter() {
        box1.style.transform = "translate(-50%, -50%)";

        console.log("getComp. width: " + box1CSS.width + "," + " height: " + box1CSS.height);

        console.log("offs. width: " + box1.offsetWidth + "," + " height: " + box1.offsetHeight);

        console.log("getComp. left: " + box1CSS.left + "," + " top: " + box1CSS.top);
    }

    moveBoxCenter();

    box1.addEventListener("click", function(event) {
        event.target.classList.toggle("selected");

        console.log(event);
    });

    var elementsClassSelected = document.getElementsByClassName("selected");

    document.addEventListener("keydown", function(event) {
        var key = event.key;

        if (key == "e") {
            for (var i = 0; i < elementsClassSelected.length; i++) {
                elementsClassSelected[i].classList.toggle("circle");
            }
        }

        if (key == "r") {
            for (i = 0; i < elementsClassSelected.length; i++) {
                if (elementsClassSelected[i].classList.contains("green")) {
                    elementsClassSelected[i].classList.replace("green", "yellow");
                } else if (elementsClassSelected[i].classList.contains("yellow")) {
                    elementsClassSelected[i].classList.replace("yellow", "red");
                } else if (elementsClassSelected[i].classList.contains("red")) {
                    elementsClassSelected[i].classList.replace("red", "blue");
                } else if (elementsClassSelected[i].classList.contains("blue")) {
                    elementsClassSelected[i].classList.replace("blue", "green");
                }
            }
        }

        if (key == "t") {
            var elFromClassSelected = document.querySelectorAll(".selected");

            for (i = 0; i < elFromClassSelected.length; i++) {
                var copyOfElSelected = elFromClassSelected[i].cloneNode();
                var inWidthMinOffWidth = (innerWidth - elFromClassSelected[0].offsetWidth);
                var inHeightMinOffHeight = (innerHeight - elFromClassSelected[0].offsetHeight);
                var posLeft = Math.floor(Math.random() * inWidthMinOffWidth);
                var posTop = Math.floor(Math.random() * inHeightMinOffHeight);

                copyOfElSelected.style.setProperty("left", posLeft.toString() + "px");
                copyOfElSelected.style.setProperty("top", posTop.toString() + "px");
                copyOfElSelected.style.removeProperty("transform");

                var firstSelected = getComputedStyle(elFromClassSelected[0]);
                var zIndex = parseInt(firstSelected.zIndex);

                copyOfElSelected.style.setProperty("z-index", (zIndex + 1).toString());
                document.body.appendChild(copyOfElSelected);

                copyOfElSelected.addEventListener("click", function(event) {
                    event.target.classList.toggle("selected");
                });
            }

            console.log("Elements copied: " + elFromClassSelected.length);
        }

        if (key == "a" || key == "s") {
            if (key == "a") {
                for (i = 0; i < elementsClassSelected.length; i++) {
                    elementsClassSelected[i].style.zIndex--;
                }
            }
            if (key == "s") {
                for (i = 0; i < elementsClassSelected.length; i++) {
                    elementsClassSelected[i].style.zIndex++;
                }
            }
        }

        if (key == "y") {
            var deleteElSel = document.querySelectorAll(".selected");

            for (i = 0; i < deleteElSel.length; i++) {
                document.body.removeChild(deleteElSel[i]);
            }
        }

        if (key == "ArrowDown" || key == "ArrowLeft" || key == "ArrowRight" || key == "ArrowUp") {
            var steps = 10;

            for (i = 0; i < elementsClassSelected.length; i++) {
                var elCompStyle = getComputedStyle(elementsClassSelected[i]);

                var top = parseInt(elCompStyle.top) + steps;
                var bottom = parseInt(elCompStyle.top) - steps;
                var left = parseInt(elCompStyle.left) - steps;
                var right = parseInt(elCompStyle.left) + steps;

                if (key == "ArrowDown") {
                    elementsClassSelected[i].style.top = top.toString() + "px";
                } else if (key == "ArrowUp") {
                    elementsClassSelected[i].style.top = bottom.toString() + "px";
                } else if (key == "ArrowLeft") {
                    elementsClassSelected[i].style.left = left.toString() + "px";
                } else if (key == "ArrowRight") {
                    elementsClassSelected[i].style.left = right.toString() + "px";
                }
            }
        }

        if (key == "u") {
            var elSelected = document.querySelectorAll(".selected");

            for (i = 0; i < elSelected.length; i++) {
                elSelected[i].classList.remove("selected");
            }
        }

        if (key == "i") {
            elSelected = document.querySelectorAll(".selected");

            var elDiv = document.querySelectorAll("div");

            for (i = 0; i < elDiv.length; i++) {
                elDiv[i].classList.add("selected");
            }

            console.log("Valda element: " + (elDiv.length - elSelected.length));
        }

        if (key == "p") {
            var copyBox1 = box1.cloneNode();

            copyBox1.style.top = Math.floor(Math.random() * inHeightMinOffHeight).toString() + "px";
            copyBox1.style.left = Math.floor(Math.random() * inWidthMinOffWidth).toString() + "px";

            var copyBox1ColorClasses = [ "green", "yellow", "blue", "red" ];
            var colorClass = Math.floor(Math.random() * copyBox1ColorClasses.length);

            copyBox1.classList.add(copyBox1ColorClasses[colorClass]);

            var copyBox1ShapeClasses = [ null, "circle" ];
            var shapeClass = Math.floor(Math.random() * copyBox1ShapeClasses.length);

            copyBox1.classList.add(copyBox1ShapeClasses[shapeClass]);

            document.body.appendChild(copyBox1);
        }
    });

    document.addEventListener("dblclick", function(event) {
        event.target.classList.add("animateSize");
        event.target.style.width = "2px";
        event.target.style.height = "2px";

        setTimeout(function() {
            event.target.parentNode.removeChild(event.target);
        }, 2000);
    });

    function changeSize(keyPress) {
        var ten = 10;
        var width = box1.offsetWidth;
        var height = box1.offsetHeight;

        if (keyPress == "q") {
            var offWidth = width + ten;
            var offHeight = height + ten;

            box1.style.setProperty("width", offWidth + "px");
            box1.style.setProperty("height", offHeight + "px");
        } else {
            offWidth = width - ten;
            offHeight = height - ten;

            box1.style.setProperty("width", offWidth + "px");
            box1.style.setProperty("height", offHeight + "px");
        }
    }

    document.addEventListener("keypress", function(event) {
        var key = event.key;

        if (key == "q" || key == "w") {
            if (box1.classList.contains("selected")) {
                changeSize(key);
            }
        }

        console.log(event);
    });

    var iconLight = document.getElementsByClassName("bell");

    iconLight[0].addEventListener("click", function(event) {
        var bellText = document.getElementsByClassName("bell-text")[0];
        var number = 2;
        var startLessonId;

        function startLesson() {
            bellText.innerHTML = number--;
            if (number < 0) {
                clearInterval(startLessonId);
                bellText.innerHTML = "JavaScript har börjat!";
            }
        }

        if (event.target.classList.contains("fas")) {
            event.target.classList.remove("fas");
            event.target.classList.add("far");

            startLessonId = setInterval(startLesson, 1000);
        } else {
            event.target.classList.remove("far");
            event.target.classList.add("fas");

            bellText.innerHTML = "";
        }
    });
})();
