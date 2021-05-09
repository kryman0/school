"""
Module for the menus.
"""
import analyzer

def empty_rows():
    """
    Adding empty rows.
    """
    print()


def alternatives():
    """
    Prints a choose from menu.
    """
    print("Välj något av följande:")
    empty_rows()


def lines():
    """
    Displaying the menu for function lines in module analyzer.
    """
    print("lines: Analysera antalet icke-tomma rader i filen")


def words():
    """
    Displaying the menu for function words in module analyzer.
    """
    print("words: Analysera antalet ord i filen")


def letters():
    """
    Displaying the menu for function letters in module analyzer.
    """
    print("letters: Analysera antalet tecken och bokstäver i filen")

def word_frequency():
    """
    Displaying the menu for function word_frequency in module analyzer.
    """
    print("word_frequency (wf): Analysera ord frekvensen i filen")

def letter_frequency():
    """
    Displaying the menu for function letter_frequency in module analyzer.
    """
    print("letter_frequency (lf): Analysera bokstavsfrekvensen i filen")

def analyze_all(user_input=None):
    """
    Displaying all the menus.
    """
    res_dict = {}

    if not user_input:
        print("all: Analysera filen")

    elif user_input:
        res_lines = analyzer.lines(user_input)
        # print("Antalet icke-tomma rader:", res_lines)

        res_words = analyzer.words(user_input)
        # print("\nAntalet ord:", res_words)

        res_letters = analyzer.letters(user_input)
        # print(
        #     "\nAlla tecken förutom rader:", res_letters[0],
        #     "\nAntal bokstäver:", res_letters[1]
        # )

        res_word_freq = analyzer.word_frequency(user_input)
        # print("\nSju högsta förekommande orden:")
        # for value, key in res_word_freq[0][:7]:
        #     print(
        #     key, round(value / res_word_freq[1] * 100, 2), "%"
        #     )

        res_lett_freq = analyzer.letter_frequency(user_input)
        # print("\nSju högsta förekommande bokstäverna:")
        # for value, key in res_lett_freq[0][:7]:
        #     print(
        #     key, round(value / res_lett_freq[1] * 100, 2), "%"
        #     )

    empty_rows()


def start():
    """
    Introduction menu.
    """
    alternatives()
    print("change: Byter fil.")
    print("quit: Avslutar programmet.")
    empty_rows()


def file():
    """
    Menu for chosen file.
    """
    alternatives()
    lines()
    words()
    letters()
    word_frequency()
    letter_frequency()
    analyze_all()


if __name__ == "main":
    start()
