"""
Module to present the menu.
"""
import analyzer, menu

def press_enter():
    """
    Asking user to press enter to continue.
    """
    print("\nTryck enter för att fortsätta.")
    input()

quit = False
while not quit:
    menu.start()

    user_input = input("Skriv in ett filnamn för att analysera: ")
    print()

    if user_input == "quit":
        quit = True
        print("Avslutar programmet")
        break

    elif user_input.endswith(".txt"):
        filename = user_input
        file_not_found = analyzer.check_file_exists(filename)

        while True:
            if file_not_found:
                break
            menu.file()
            user_input = input("Välj ett val " + "(" + filename + "): ")
            if user_input == "quit":
                quit = True
                break

            elif user_input == "lines":
                analyzer.lines(filename)
                press_enter()

            elif user_input == "words":
                analyzer.words(filename)
                press_enter()

            elif user_input == "letters":
                analyzer.letters(filename)
                press_enter()

            elif "word_frequency" in user_input or "wf" in user_input:
                analyzer.word_frequency(filename)
                press_enter()

            elif "letter_frequency" in user_input or "lf" in user_input:
                analyzer.letter_frequency(filename)
                press_enter()

            elif user_input == "all":
                menu.analyze_all(filename)
                press_enter()

            else:
                print("Ogiltigt kommando.")
                press_enter()

    else:
        print("Ogiltigt kommando.")
        press_enter()
