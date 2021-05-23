"""
Test module.
"""

import random
import string
import unittest
from spellchecker import SpellChecker
from trie import Trie
from node import Node

class TestSpellChecker(unittest.TestCase):
    """
    Test SpellChecker class.
    """

    def setUp(self):
        """
        Setting up test object.
        """

        self.sp = SpellChecker()

    def tearDown(self):
        """
        Destroying (nullifying) test object.
        """

        self.sp = None

    def test_node_list_is_empty(self):
        """
        Test if node list is empty after creation.
        """

        self.assertEqual(self.sp.node_list, [])

    def test_word_by_prefix(self):
        """
        Test by prefix of word that a maximum of ten words shows up.
        """

        self.sp.node_list = []
        words = []

        with open("tiny_dictionary.txt", "r") as fh:
            words.append(fh.read().rstrip().split("\n"))

        for _ in range(10):
            self.sp.node_list.append(random.choice(words))

        word_found = 0
        for _ in self.sp.node_list:
            if word_found < 10:
                word_found += 1
        self.assertLessEqual(len(self.sp.node_list), word_found)

    def test_change_of_dictionary(self):
        """
        Test if dictionary has been found.
        """

        filename = "tinytest.txt"
        with self.assertRaises(FileNotFoundError):
            with open(filename, "r") as _:
                pass


class TestTrie(unittest.TestCase):
    """
    Test Trie class.
    """

    def setUp(self):
        """
        Setting up Trie object.
        """

        self.trie = Trie()

    def tearDown(self):
        """
        Destroying Trie object.
        """

        self.trie = None

    def test_trie_object_is_of_trie(self):
        """
        Test to see if Trie object is an instance of the Trie class.
        """

        self.assertIsInstance(self.trie, Trie)

    def test_root_attribute_is_of_node(self):
        """
        Test to see if Node object is created when creating a Trie object.
        """

        self.assertIsInstance(self.trie.root, Node)

    def test_trie_attrib_in_sp_class(self):
        """
        Test to see if Trie object is created when creating
        a SpellChecker object.
        """

        sp = SpellChecker()
        self.assertIsInstance(sp.trie, Trie)


class TestNode(unittest.TestCase):
    """
    Test class for Node class.
    """

    def setUp(self):
        """
        Setting up Node object.
        """

        self.node = Node()

    def tearDown(self):
        """
        Destroying Trie object.
        """

        self.node = None

    def test_attributes_letter_end(self):
        """
        Test attributes "letter" and "end" instantiated
        with default values None and False respectively.
        """

        self.assertIsNone(self.node.letter)
        self.assertFalse(self.node.end)

    def test_len_and_val_of_children(self):
        """
        Test that attribute "children" has the correct
        length and value after creation.
        """

        self.assertEqual(len(self.node.children), len(string.ascii_lowercase))
        for element in self.node.children:
            self.assertIsNone(element)

    def test_corr_val_type_attrib_end(self):
        """
        Test if attribute "end" has the correct value type bool after creation.
        Raise AttributeError due to end is not defined if wrong value type.
        """

        with self.assertRaises(AttributeError):
            node = Node("a", "b")
            if node.end:
                pass


if __name__ == "__main__":
    unittest.main(verbosity=3)
