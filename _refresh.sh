#!/bin/bash
url=nano
add_else=
cat >index.html<<EOF
<!DOCTYPE html>
<html>
<head>
<title>Rufus</title>
<style type="text/css">
body { margin:0; padding:0; }
.frame { display:block; width:100vw; height:100vh; max-width:100%; margin:0; padding:0; border:0; box-sizing:border-box; }
</style>
</head>
<body style="margin:0px;padding:0px;overflow:hidden">
<script type="text/javascript">
var localized_index = "en_IE.html";
var lang = window.navigator.userLanguage || window.navigator.language;
EOF
for i in `curl -sS $url | sed -rn 's/.*<option.*value=\"(.*)\">/\1/p'`
do
  echo Creating $i.html
  if [ "${i:0:2}" == "zh" ] || [ "${i:0:2}" == "pt" ]; then
    echo $add_else 'if (lang == "'$i'") localized_index = "'$i'.html";' >> index.html
  else
    echo $add_else 'if (lang.substr(0,2) == "'${i:0:2}'") localized_index = "'$i'.html";' >> index.html
  fi
  curl -sS $url?locale=$i | sed -e "s/'?locale='+this.options\[this\.selectedIndex\]\.value\">/this\.options\[this\.selectedIndex\]\.value+'\.html'\">/g" > $i.html
  add_else=else
done
echo Creating index.html
cat >>index.html<<EOF
</script>
<iframe id="frame" class="frame"></iframe>
<script>document.getElementById("frame").src = localized_index;</script>	
</body>
</html>
EOF
