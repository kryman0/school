/** Test3 module. */
window.Test3 = (function() {
    /** Variables. */
    var testThree = false;

    /**
     * @function checkFlag
     * @param {number} guessingNumber - Check what number has been guessed.
     * @param {string} eventClassName - Check flag class name.
     * Checking right flag has been guessed.
     */
    function checkFlag(guessingNumber, eventClassName) {
        if (guessingNumber == 1 && eventClassName == "test3-flags flag7") {
            return 7;
        } else if (guessingNumber == 2 && eventClassName == "test3-flags flag4") {
            return 4;
        } else if (guessingNumber == 3 && eventClassName == "test3-flags flag1") {
            return 1;
        } else if (guessingNumber == 4 && eventClassName == "test3-flags flag9") {
            return 9;
        } else if (guessingNumber == 5 && eventClassName == "test3-flags flag5") {
            return 5;
        } else if (guessingNumber == 6 && eventClassName == "test3-flags flag2") {
            return 2;
        } else if (guessingNumber == 7 && eventClassName == "test3-flags flag8") {
            return 8;
        } else if (guessingNumber == 8 && eventClassName == "test3-flags flag3") {
            return 3;
        } else if (guessingNumber == 9 && eventClassName == "test3-flags flag6") {
            return 6;
        }

        return false;
    }

    /** Returning Test3. */
    var test3 = {
        "testThree": testThree,

        "flags": [
            "Polen", "Sverige", "Italien", "Spanien", "Bhutan",
            "Kenya", "Makedonien", "Zimbabwe", "Schweiz"
        ],

        "checkFlag": checkFlag
    };

    return test3;
})();
