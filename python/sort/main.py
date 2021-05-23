""" Module main/handler. """

from unorderedlist import UnorderedList
import sort

class Handler:
    """ Class Handler. """

    def __init__(self):
        """ Ctor. """

        self.ulist = UnorderedList()
        self.choices = {
            "1": self.ulist.is_empty,
            "2": self.ulist.add,
            "3": self.ulist.insert,
            "4": self.ulist.set,
            "5": self.ulist.size,
            "6": self.ulist.get,
            "7": self.ulist.index_of,
            "8": self.ulist.print_list,
            "9": self.ulist.remove,
            "a": self.ulist.add_random_items,
            "i": sort.insertion_sort,
            "b": sort.bubble_sort,
            "0": "Program terminated.",
        }

    @staticmethod
    def menu():
        """ Prints the menu. """

        print(
            "\n1. Check if list is empty.\
            \n2. Add item to the list.\
            \n3. Insert item to a specific index.\
            \n4. Edit item in the list.\
            \n5. Size of the list.\
            \n6. Get an item's value from the list.\
            \n7. Search for an item and get its index.\
            \n8. Check items in the list.\
            \n9. Remove item from the list.\
            \na. Add random items to the list.\
            \ni. Sort list by insertion sort.\
            \nb. Sort list by bubble sort.\
            \n0. Quit."
        )

    def run(self):
        """ Start the application. """

        while True:
            Handler.menu()

            user_input = input("\nMake your choice: ")

            if user_input == "1" or user_input == "5" or user_input == "8"\
                or user_input == "a":
                result = self.choices.get(user_input)()
                print(result)
            if user_input == "2":
                item = input("Add an item: ")
                self.choices.get(user_input)(item)
                print("Added item:", item + "\n")
            if user_input == "3" or user_input == "4":
                index = int(input("Add index: "))
                item = input("Add an item: ")

                if user_input == "4":
                    self.choices.get(user_input)(index, item)
                else:
                    self.choices.get(user_input)(index, item)
            if user_input == "6":
                index = int(input("Enter index: "))
                print(self.choices.get(user_input)(index))
            if user_input == "7" or user_input == "9":
                search = input("Search: ")
                print(self.choices.get(user_input)(search))
            if user_input == "i" or user_input == "b":
                result = self.choices.get(user_input)(self.ulist)
                print(result)
            if user_input == "0":
                print(self.choices.get(user_input))
                break


if __name__ == "__main__":
    Handler().run()
