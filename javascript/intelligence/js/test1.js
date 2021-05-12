/** Test1 module. */
window.Test1 = (function() {
    /** Variables. */
    var questions = [
        'Vad är x: var x = 3 + "3" + "3" - 3;',
        "Vad för värde får isThisTrue om: var isThisTrue = 0; isThisTrue = !isThisTrue;",
        "Vilket index nummer har siffran 7: var a = [ [ 1, 2, 3 ], [ 4, 5, [ 6, 7, 8 ] ] ];",
        "Vad returnerar funktionen: var x = 5; function counter(x++) { return x; }",
        'Vad är z: var x = { "y": "0" }; var z = Boolean(x.y);'
    ];

    var suggestions = [
        [ "NaN", 6, 330 ],
        [ "undefined", "false", "true" ],
        [ "a[1][0][3]", "a[1][2][1]", "a[6]" ],
        [ "SyntaxError", 5, 6 ],
        [ "false", "undefined", "true" ]
    ];

    var answers = [ 330, "true", "a[1][2][1]", "SyntaxError", "true" ];

    var testOne = true;

    /** Returning Test1. */
    var test1 = {
        "questions": function(question) {
            return questions[question];
        },

        "suggestions": suggestions,

        "answers": answers,

        "testOne": testOne
    };

    return test1;
})();
