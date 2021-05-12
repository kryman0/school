/** Test5 module. */
window.Test5 = (function() {
    /** Returning Test5. */
    var test5 = {
        "questions": [
            "Har en annan färg än röd.",
            "Har en annan form än kvadrat.",
            "Är röd och kvadrat."
        ],

        "objectsClasses": [
            "test4-objects square object1",
            "test4-objects rectangle object2",
            "test4-objects circle object3",
            "test4-objects triangle object4",
            "test4-objects square object5",
            "test4-objects triangle object6",
            "test4-objects rectangle object7",
            "test4-objects square object8",
            "test4-objects circle object9",
            "test4-objects rectangle object10"
        ],

        /**
         * @method checkObject
         * @param {number} gNum - Check right number in right order.
         * @param {string} evClN - Check right object by class name in right order.
         * Check right object.
         */
        "checkObject": function(gNum, evClN) {
            if (gNum == 1 && evClN == "test4-objects square object1 test5-suggestions") {
                return 1;
            } else if (gNum == 2 && evClN == "test4-objects rectangle object2 test5-suggestions") {
                return 2;
            } else if (gNum == 3 && evClN == "test4-objects circle object3 test5-suggestions") {
                return 3;
            } else if (gNum == 4 && evClN == "test4-objects triangle object4 test5-suggestions") {
                return 4;
            } else if (gNum == 5 && evClN == "test4-objects square object5 test5-suggestions") {
                return 5;
            } else if (gNum == 6 && evClN == "test4-objects triangle object6 test5-suggestions") {
                return 6;
            } else if (gNum == 7 && evClN == "test4-objects rectangle object7 test5-suggestions") {
                return 7;
            } else if (gNum == 8 && evClN == "test4-objects square object8 test5-suggestions") {
                return 8;
            } else if (gNum == 9 && evClN == "test4-objects circle object9 test5-suggestions") {
                return 9;
            } else if (gNum == 10&&evClN == "test4-objects rectangle object10 test5-suggestions") {
                return 10;
            }

            return false;
        },

        "testFive": false
    };

    return test5;
})();
