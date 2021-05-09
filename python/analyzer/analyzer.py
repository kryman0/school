"""
Module for text analyzing.
"""
import re, string

filename = None

def check_file_exists(filename):
    """
    Check if file exists.
    """
    file_not_found = True
    try:
        open(filename, "r")
        return not file_not_found
    except:
        print("Kunde ej hitta filen.\n")
        return file_not_found


def file(filename, mode="r"):
    """
    Get the file, e.g. "phil.txt".
    """
    return open(filename, mode)


def lines(filename):
    """
    Analyze the number of non-empty lines.
    """
    get_file = file(filename)
    non_empty_lines = 0

    with get_file as fh:
        lst_from_file = fh.read().split("\n")

    for item in lst_from_file:
        if item == "":
            continue
        else:
            non_empty_lines += 1

    if filename:
        print("Antalet icke-tomma rader:", non_empty_lines)

    return non_empty_lines

def words(filename):
    """
    Analyze number of words.
    """
    get_file = file(filename)
    words = 0

    with get_file as fh:
        lst_from_file = fh.read().split()

    for word in lst_from_file:
        words += 1

    if filename:
        print("Antalet ord:", words)

    return words

def letters(filename):
    """
    Analyze number of characters.
    """
    get_file = file(filename)
    with get_file as fh:
        lst_from_file = fh.read().split("\n")

    chars = 0
    for item in lst_from_file:
        for letter in item:
            chars += 1

    get_file = file(filename)
    with get_file as fh:
        all_letters = re.findall("[a-z]", fh.read(), re.IGNORECASE)

    if filename:
        print(
            "Alla tecken förutom rader:", chars, "\n"
            "Antal bokstäver:", len(all_letters)
        )

    return chars, len(all_letters)

def word_frequency(filename):
    """
    Analyze top seven words frequency.
    """
    get_file = file(filename)
    with get_file as fh:
        lst_from_file = fh.read().lower().translate(
        str.maketrans("", "", string.punctuation)
        ).split()

    sorted(lst_from_file)

    words_dict = {}
    for item in lst_from_file:
        words_dict[item] = lst_from_file.count(item)

    result_list = []
    for key, value in words_dict.items():
        result_list.append((value, key))

    result_list.sort(reverse=True)

    if filename:
        print("Sju högsta förekommande orden:")
        for value, key in result_list[:7]:
            print(
            key, round(value / len(lst_from_file) * 100, 2), "%"
            )

    return result_list, len(lst_from_file)

def letter_frequency(filename):
    """
    Analyze top seven letters frequency.
    """
    get_file = file(filename)
    with get_file as fh:
        lst_from_file = fh.read().lower().translate(
        str.maketrans("", "", string.punctuation)
        ).split()
    lst_from_file.sort()

    letters_list = []
    for item in lst_from_file:
        for letter in item:
            letters_list.append(letter)
    letters_list.sort()

    letters_dict = {}
    for letter in letters_list:
        letters_dict[letter] = letters_list.count(letter)

    result_list = []
    for key, value in letters_dict.items():
        result_list.append((value, key))

    result_list.sort(reverse=True)

    if filename:
        print("Sju högsta förekommande bokstäverna:")
        for value, key in result_list[:7]:
            print(
            key, round(value / len(letters_list) * 100, 2), "%"
            )

    return result_list, len(letters_list)
