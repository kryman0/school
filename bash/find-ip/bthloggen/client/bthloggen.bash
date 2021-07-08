#!/usr/bin/env bash
#
# Bash script to test the server for kmom10.
#
#
SERVER="$(cat server.txt)"
URL="$SERVER:1337"
VERSION="1.0.0"

function main {
	while true
	do
		case "$1" in
			url)
				get_server_url; exit 0; ;;
			view)
				sec_par="$(if [[ $2 != "" ]]; then echo "$2"; fi;)"
				view_"$sec_par" "$@"; exit 0; ;;
			use)
				change_server_name "$@"; exit 0; ;;
			-h | --help)
				show_help; exit 0; ;;
			-v | --version)
				show_version; exit 0; ;;
			-c | --count)
				display_number_of_rows "$@"; exit 0; ;;
		esac
	done
}

function show_help {
	help_text="
Commands available:

url             Get url to view the server in browser.
view            List all entries.
view url <url>  View all entries containing <url>.
view ip <ip>    View all entries containing <ip>.
use <server>    Set the servername (localhost or service name).

Options available:

-h, --help      Display the menu.
-v, --version   Display the current version.
-c, --count     Display the number of rows returned.
"
	printf "%s\n" "$help_text"
}

function get_server_url {
	(cat server.txt)
}

function view_ {
	if [[ "$*" = "count" ]]
	then
		(curl "$URL"/data?count=true)
	else
		(curl "$URL"/data)
	fi
}

function view_url {
	if [[ "$4" = "count" ]]
	then
		(curl "$URL"/data?url="count+$3")
	else
		(curl "$URL"/data?url="$3")
	fi
}

function view_ip {
	if [[ "$4" = "count" ]]
	then
		(curl "$URL"/data?ip="count+$3")
	else
		(curl "$URL"/data?ip="$3")
	fi
}

function change_server_name {
	echo "172.20.0.2 $2" > /etc/hosts
	echo "Server is now: $2" 
	echo "$2" > server.txt
}

function show_version {
	echo "$VERSION"
}

function display_number_of_rows {
	if [[ "$3" = "ip" ]]
	then
		shift; view_ip "$@" "count"
	elif [[ "$3" == "url" ]]
	then
		shift; view_url "$@" "count"
	else
		view_ "count"
	fi
}

main "$@"
