/** Test2 module. */
window.Test2 = (function() {
    /** Variables. */
    var i;
    var randomNumber = Math.floor(Math.random() * 1000 + 10);
    var fizzBuzzResults = [], testTwo = false;

    /** Returning Test2. */
    var test2 = {
        /**
         * @method fizzBuzz
         * Creating random fizz buzz numbers.
         */
        "fizzBuzz": function() {
            for (i = 1; i <= randomNumber; i++) {
                if (i % 3 == 0 && i % 5 == 0) {
                    fizzBuzzResults.push("fizzBuzz");
                } else if (i % 3 == 0) {
                    fizzBuzzResults.push("fizz");
                } else if (i % 5 == 0) {
                    fizzBuzzResults.push("buzz");
                } else {
                    fizzBuzzResults.push(i);
                }
            }

            return fizzBuzzResults;
        },

        "testTwo": testTwo,

        "question": "Vilket ord eller vilken siffra följer i sekvensen:"
    };

    return test2;
})();
