#/bin/sh
find . -not -name "*.txt" -not -name "*.sh" -not -name "*pre*" -type f -print0 | xargs -0 sha256sum | awk '{print $1}' | sort | uniq | xxd -r -p | hexdump -v -e '31/1 "0x%02x, " 1/1 " 0x%02x,\n"'
