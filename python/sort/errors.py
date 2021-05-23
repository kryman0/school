""" Module Exceptions. """

class Error(Exception):
    """ Custom exceptions. """
    pass


class IndexOutOfRangeError(Error):
    """
    IndexOutOfRangeError exception class.
    Checking index in range.
    """
    pass

class ValueExistentError(Error):
    """
    ValueExistentError exception class.
    Checking if value exists.
    """
    pass
