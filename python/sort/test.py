""" Module Test """

import unittest
from unorderedlist import UnorderedList
from errors import IndexOutOfRangeError, ValueExistentError
import sort

class TestUnorderedList(unittest.TestCase):
    """ Test class for UnorderedList. """

    def setUp(self):
        """ Setup the objects. """

        self.ulist = UnorderedList()
        self.ulist.add("test node")

    def tearDown(self):
        """ Remove the objects. """

        self.ulist = None

    def test_insert(self):
        """ Test insert method. """

        # Raise ValueExistentError.
        self.ulist = UnorderedList()
        with self.assertRaises(ValueExistentError):
            self.ulist.insert(0, "test")

        # Raise IndexOutOfRangeError.
        self.ulist.add("test node")
        with self.assertRaises(IndexOutOfRangeError):
            self.ulist.insert(-1, "test")
        with self.assertRaises(IndexOutOfRangeError):
            self.ulist.insert(1, "test")

    def test_set(self):
        """ Test set method. """

        with self.assertRaises(IndexOutOfRangeError):
            self.ulist.set(-1, "test")
        with self.assertRaises(IndexOutOfRangeError):
            self.ulist.set(1, "test")

    def test_get(self):
        """ Test get method. """

        with self.assertRaises(IndexOutOfRangeError):
            self.ulist.get(-1)
        with self.assertRaises(IndexOutOfRangeError):
            self.ulist.get(1)

    def test_index_of(self):
        """ Test index_of method. """

        with self.assertRaises(ValueExistentError):
            self.ulist.index_of("test node ")

    def test_remove(self):
        """ Test remove method. """

        with self.assertRaises(ValueExistentError):
            self.ulist.index_of(" test node")

    def test_populated_list_bubble_sort(self):
        """ Test lists are same after sorting. """

        print()

        lst = [1, 3, 4, 8, 9]

        self.ulist.remove("test node")
        self.ulist.add(9)
        self.ulist.add(1)
        self.ulist.add(4)
        self.ulist.add(3)
        self.ulist.add(8)

        sort.bubble_sort(self.ulist)

        current_node = self.ulist.head

        for item in lst:
            if current_node.next != None:
                self.assertEqual(item, current_node.data)
            current_node = current_node.next

    def test_empty_list_bubble_sort(self):
        """ Test if list is empty after sorting. """

        self.ulist.remove("test node")

        sort.bubble_sort(self.ulist)

        self.assertTrue(self.ulist.is_empty())


if __name__ == "__main__":
    unittest.main(verbosity=3)
