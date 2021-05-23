"""
Module SpellChecker.
"""

import string
from node import Node
from trie import Trie

class SpellChecker:
    """
    SpellChecker class.
    """

    def __init__(self):
        """
        Ctor.
        """

        self.trie = Trie()
        self.node_list = []
        self.menus = {
            "1": self.check_word,
            "2": self.add_word,
            "3": self.get_words_by_prefix,
            "4": self.change_dictionary,
            "5": self.print_dictionary
        }

    def add_word(self, word):
        """
        Add word to Trie object.
        """

        word = word.lower()
        current_node = self.trie.root

        for letter in word:
            index = ord(letter) - 97
            try:
                if current_node.children[index] is None:
                    current_node.children[index] = Node(letter)
            except IndexError as e:
                print(e)
            current_node = current_node.children[index]
        current_node.end = True

        # Commented (probably working) code with an earlier version
        # of adding a word.
        #
        # for i, l in enumerate(word):
        #     print(i)
        #     if i == 0:
        #         if not root.children:
        #             root.children.append(Node(l))
        #             current_node = root.children[0]
        #             # print(current_node.letter)
        #         else:
        #             for index, node in enumerate(root.children):
        #                 if l == node.letter:
        #                     current_node = node
        #                     break
        #                 if index == len(root.children) - 1:
        #                     current_node = Node(l)
        #                     root.children.append(current_node)
        #                     # print(current_node.letter)
        #     else:
        #         # print(current_node.letter)
        #         previous_node = False
        #         last_node = False
        #         if current_node.children:
        #             for index, node in enumerate(current_node.children):
        #                 if l == node.letter:
        #                     current_node = node
        #                     break
        #                 if index == len(current_node.children) - 1:
        #                     # new_node = Node(l)
        #                     if i == len(word) - 1:
        #                         current_node.children.append(Node(l, True))
        #                     else:
        #                         new_node = Node(l)
        #                         current_node.children.append(new_node)
        #                         current_node = new_node
        #         else:
        #             if i == len(word) - 1:
        #                 current_node.children.append(Node(l, True))
        #             # cn = current_node.children[0]
        #             # print(cn.letter)
        #             else:
        #                 new_node = Node(l)
        #                 current_node.children.append(new_node)
        #                 current_node = new_node

    def check_word(self, word):
        """
        Returns True/False if word found.
        """

        word = word.lower()

        current_node = self.trie.root
        current_node_found = False

        for i, _ in enumerate(word):
            for current_node in current_node.children:
                if current_node:
                    if word[i] == current_node.letter:
                        current_node_found = True
                        break
            if not current_node_found:
                return "Word not found."
            elif i == len(word) - 1:
                if current_node.end:
                    return word + " exists."
                return "Word not found."
            else:
                current_node_found = False

    def get_words_by_prefix(self, char):
        """
        Check if words exists by prefix.
        """

        self.node_list = []

        self.print_dictionary(True)

        word_found = 0
        if len(char) < 3:
            return
        for word in self.node_list:
            if word.startswith(char) and word_found < 10:
                word_found += 1
                print(word)

    def print_dictionary(self, prefix=False):
        """
        Prints the dictionary.
        """

        current_node = self.trie.root
        counter = 0
        empty_array = []
        for _ in range(len(string.ascii_lowercase)):
            empty_array.append(None)
        self.recursive_print(current_node, empty_array, counter, prefix)

    def recursive_print(self, node, array, level, prefix):
        """
        Recursive method printing out the dictionary.
        """

        if node.end:
            word = ""
            array[level] = "end"

            for element in array:
                if element != "end":
                    word += element
                else:
                    break
            if not prefix:
                print(word)
            else:
                self.node_list.append(word)
        for i in range(len(string.ascii_lowercase)):
            if node.children[i]:
                if node.children[i].letter:
                    array[level] = node.children[i].letter
                self.recursive_print(node.children[i], array, level + 1, prefix)

    def change_dictionary(self, filename=None, init=None):
        """
        Changes the dictionary.
        """

        if not init:
            self.__init__()
        with open(filename, "r") as fh:
            word_list = fh.read().splitlines()
        for word in word_list:
            self.add_word(word)

    @staticmethod
    def menu():
        """
        Prints the menu.
        """

        print(
            "\n1: Check if word exists.\
            \n2: Add a word.\
            \n3: Get word suggestions.\
            \n4: Change dictionary.\
            \n5: Print all words in the dictionary.\
            \nq: Quit the program.\
            \n\nYour choice: "
        )

    def init(self):
        """
        Initializes the application.
        """

        self.change_dictionary("tiny_dictionary.txt", "init")

        while True:
            self.menu()
            user_input = input()
            if user_input == "1":
                word = input("Enter a word: ")
                result = self.menus.get(user_input)(word)
                print(result)
            if user_input == "2":
                word = input("Enter a word: ")
                result = self.menus.get(user_input)(word)
            if user_input == "3":
                prefix = ""
                while True:
                    prefix += input(
                        "Enter three letters (q! to quit option): " + prefix
                    )
                    if prefix.endswith("q!"):
                        break
                    self.menus.get(user_input)(prefix)
            if user_input == "4":
                filename = input("Enter dictionary (filename.ext): ")
                self.menus.get(user_input)(filename)
            if user_input == "5":
                print()
                self.menus.get(user_input)()
            if user_input == "q":
                break


if __name__ == "__main__":
    SpellChecker().init()
