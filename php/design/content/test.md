---
views:    
    main:
        sort: 2
        data:
            meta:
                type: toc-sort

    toc:
        region: sidebar-left
        template: anax/v2/toc/default
        data:
            title: Innehåll Innehåll Innehåll Innehåll Innehåll Innehåll Innehåll Innehåll
            meta:
                type: book-toc

    toc2:
        region: sidebar-right
        template: anax/v2/block/default
        data:            
            meta:
                type: single
                route: block/om-kursrepo

title: "Testar Markdown konstruktioner"
---

# Testar Markdown konstruktioner

## DIV
<div style="background-color: red">
    Div i ren HTML här
</div>

### PRE
pre:

    <div style="background-color: blue">
        En DIV i CODE i PRE i MD genom indentation.
    </div>

#### P
Vanliga paragrafer

Ny paragraf genom blanka linjer emellan

##### UL
- list föremål 1
- list föremål 2

###### HTML blandat med MD
Texten på denna linje är skriven i vanlig md som en paragraf, men under i ren html fast det visar sig att den är inuti en md paragraf.

<span style="padding: 10px; color: green">HTML SPAN</span>
