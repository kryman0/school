/** Test4 module. */
window.Test4 = (function() {
    /** Variables. */
    var questions = [
        "Den blåa cirkeln", "Den gula fyrkanten", "Den gråa rektangeln", "Den rosa cirkeln",
        "Den röda triangeln", "Den gröna fyrkanten", "Den orangea triangeln",
        "Den svarta rektangeln", "Den lila fyrkanten", "Den bruna rektangeln"
    ];

    /**
     * @function checkObject
     * @param {number} guessingNumber - Check right number in order.
     * @param {string} eventClassName - Check right flag by class name in right order.
     * Check right object guessed.
     */
    function checkObject(guessingNumber, eventClassName) {
        if (guessingNumber == 1 && eventClassName == "test4-objects circle object9") {
            return true;
        } else if (guessingNumber == 2 && eventClassName == "test4-objects square object1") {
            return true;
        } else if (guessingNumber == 3 && eventClassName == "test4-objects rectangle object7") {
            return true;
        } else if (guessingNumber == 4 && eventClassName == "test4-objects circle object3") {
            return true;
        } else if (guessingNumber == 5 && eventClassName == "test4-objects triangle object6") {
            return true;
        } else if (guessingNumber == 6 && eventClassName == "test4-objects square object5") {
            return true;
        } else if (guessingNumber == 7 && eventClassName == "test4-objects triangle object4") {
            return true;
        } else if (guessingNumber == 8 && eventClassName == "test4-objects rectangle object2") {
            return true;
        } else if (guessingNumber == 9 && eventClassName == "test4-objects square object8") {
            return true;
        } else if (guessingNumber == 10 && eventClassName == "test4-objects rectangle object10") {
            return true;
        }

        return false;
    }

    /** Return Test4 object. */
    var test4 = {
        "questions": questions,

        "checkObject": checkObject,

        "testFour": false
    };

    return test4;
})();
