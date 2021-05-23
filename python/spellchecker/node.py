"""
Module Node.
"""

import string

class Node:
    """
    Class Node.
    """

    def __init__(self, letter=None, end=False):
        """
        Ctor.
        """

        self.letter = letter
        self.children = []
        for _ in string.ascii_lowercase:
            self.children.append(None)
        if isinstance(end, bool):
            self.end = end
