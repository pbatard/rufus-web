#!/bin/bash
url=pi3
add_else=
cat >index.html<<EOF
<!DOCTYPE html>
<html>
<head>
<title>Rufus</title>
<meta http-equiv="refresh" content="0;URL=en_IE.html">
</head>
<body>
<script type="text/javascript">
var lang = window.navigator.userLanguage || window.navigator.language;
EOF
for i in `curl -sS $url | sed -rn 's/.*<option.*value=\"(.*)\">/\1/p'`
do
  echo Creating $i.html
  if [ "${i:0:2}" == "zh" ] || [ "${i:0:2}" == "pt" ]; then
    echo $add_else 'if (lang == "'$i'") window.location = "'$i'.html";' >> index.html
  else
    echo $add_else 'if (lang.substr(0,2) == "'${i:0:2}'") window.location = "'$i'.html";' >> index.html
  fi
  curl -sS $url?locale=$i | sed -e "s/'?locale='+this.options\[this\.selectedIndex\]\.value\">/this\.options\[this\.selectedIndex\]\.value+'\.html'\">/g" > $i.html
  add_else=else
done
echo Creating index.html
cat >>index.html<<EOF
else window.location = "en_IE.html";
</script>
<div><a href="en_IE.html">Rufus</a></div>
</body>
</html>
EOF
