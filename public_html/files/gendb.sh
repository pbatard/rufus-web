#/bin/sh
find . -not -name "*.txt" -not -name "*.sh" -not -name "*pre*" -type f -print0 | xargs -0 sha256sum | sort | uniq -w 64 | awk -F '' '{ for(i=1; i<=64; i+=2) {printf "0x%s%s, ", $i,$(i+1);}} {print "// " substr($0,69)}'
