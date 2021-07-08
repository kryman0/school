#!/usr/bin/env bash
#
# Creating a JSON file with regex filters.
#
#
function main {
	(mkdir -p data)
	(touch log.json)
	(mv log.json data/)
	(sed -E -n 's/([^- ]+).*(http.?[://]+[^\/\\\(\)\"]*).*/\t{\n\t\t"ip": "\1",\n\t\t"url": "\2"\n\t},/p' < ../access-50k.log > data/log.json)
	access_file="$(cat data/log.json)"
	echo -e [\\n"${access_file:0:${#access_file}-4}\\n\\t}\\n]" > data/log.json
}

main
