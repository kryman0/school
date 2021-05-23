""" Module UnorderedList. """

import math
import random
from node import Node
from errors import IndexOutOfRangeError, ValueExistentError

class UnorderedList:
    """ Class UnorderedList. """

    def __init__(self):
        """ Ctor. """

        self.head = None

    def is_empty(self):
        """ Returns if list is empty or not. """

        return True if self.head is None else False

    def add(self, data):
        """ Add new node to the list. """

        new_node = Node(data)

        if self.head is None:
            self.head = new_node
        else:
            current_node = self.head
            while current_node.next:
                current_node = current_node.next
            current_node.next = new_node

    def insert(self, index, data):
        """ Add node to a specific index. """

        if self.head is None:
            raise ValueExistentError(
                "List does not exist. Use the add method instead."
            )
        elif index < 0:
            raise IndexOutOfRangeError("Index is too low.")

        current_node = self.head
        value_of_current_node_next = current_node.next
        new_node = Node(data)
        counter = 0

        while counter < index:
            counter += 1
            if counter == index:
                if not value_of_current_node_next:
                    raise IndexOutOfRangeError("Index is too high.")

                break
            else:
                current_node = current_node.next
                value_of_current_node_next = current_node.next

        if index == 0:
            new_node.next = current_node
            current_node = new_node
            self.head = current_node
        else:
            new_node.next = current_node.next
            current_node.next = new_node

    def set(self, index, data):
        """ Edit node at index. """

        if self.head is None:
            raise ValueExistentError(
                "List does not exist. Use the add method instead."
            )
        elif index < 0:
            raise IndexOutOfRangeError("Index is too low.")

        current_node = self.head
        counter, nodes = 0, self.size()

        if index >= nodes:
            raise IndexOutOfRangeError("Index is too high.")
        else:
            while counter < index:
                current_node = current_node.next
                counter += 1

        current_node.data = data

    def size(self):
        """ Returns amount of nodes in list. """

        current_node = self.head
        nodes = 0

        while current_node:
            nodes += 1
            current_node = current_node.next

        return nodes

    def get(self, index):
        """ Returns value of a node in the list. """

        current_node = self.head
        nodes = self.size()

        if self.head is None:
            raise ValueExistentError(
                "List does not exist. Use the add method instead."
            )
        elif index < 0:
            raise IndexOutOfRangeError("Index is too low.")
        elif index >= nodes:
            raise IndexOutOfRangeError("Index is too high.")

        counter = 0
        while counter < index:
            current_node = current_node.next
            counter += 1

        return current_node.data

    def index_of(self, data):
        """ Searches for data in the list, and returns its index position. """

        current_node = self.head
        counter = 0
        while current_node:
            if data == current_node.data:
                return counter

            current_node = current_node.next
            counter += 1

        raise ValueExistentError("Value not found.")

    def print_list(self):
        """ Returns content of the list. """

        current_node = self.head
        while current_node:
            print(current_node.data)
            current_node = current_node.next

        return ""

    def remove(self, data):
        """ Removes node by search value. """

        current_node = self.head
        counter = 0
        node_index = self.index_of(data)

        if current_node.next is None:
            self.head = None

            return ""
        elif node_index == 0:
            self.head = current_node.next

            return ""

        while counter < node_index:
            previous_node = current_node
            current_node = current_node.next

            if data == current_node.data:
                previous_node.next = current_node.next
                del current_node

                return ""

            counter += 1

    def add_random_items(self):
        "Add some random test numbers."

        for _ in range(1, 6):
            self.add(math.floor(random.random() * 100 + 1))

        return self.print_list()
