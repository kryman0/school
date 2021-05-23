""" Module Sort """

# Original insertion sort.
# def insertion_sort(items):
#     """ Insertion sort """

#     for i in range(1, len(items)):
#         j = i
#         while j > 0 and items[j] < items[j-1]:
#             items[j], items[j-1] = items[j-1], items[j]
#             j -= 1

#     return items

def insertion_sort(self):
    """ Insertion sort. """

    current_node = self.head

    for i in range(1, self.size()):
        j = i

        current_node = self.head
        while j > 0 and current_node.next != None:
            if int(current_node.next.data) < int(current_node.data):
                tmp = current_node.next.data
                current_node.next.data = current_node.data
                current_node.data = tmp
            current_node = current_node.next

        j -= 1

    return "List sorted."

# Original bubble sort.
# def bubble_sort(items):
#     """ Bubble sort """
#     for i in range(len(items)):
#         for j in range(len(items)-1-i):
#             if items[j] > items[j+1]:
#                 items[j], items[j+1] = items[j+1], items[j]     # Byt plats

#     return items

def bubble_sort(self):
    """ Bubble sort. """

    for i in range(self.size()):
        current_node = self.head
        for _ in range(self.size() - 1 - i):
            while current_node.next != None:
                if int(current_node.next.data) < int(current_node.data):
                    tmp = current_node.data
                    current_node.data = current_node.next.data
                    current_node.next.data = tmp
                current_node = current_node.next

    current_node = self.head

    return "Bubble list sorted.\n" + self.print_list()
