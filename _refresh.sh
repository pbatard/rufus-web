#!/bin/bash
url=nano
add_else=
# Array of locales that require custom handling.
# The first locale is the one the key will default to, unless it's one of the subsequent values.
# e.g. 'ar' should default to 'ar_SA' unless it's 'ar_IQ' (which should have its own ar_IQ page).
declare -A custom=(
  ['ar']='ar_SA;ar_IQ'
  ['pt']='pt_PT;pt_BR'
  ['zh']='zh_TW;zh_CN'
)
cat >index.html<<EOF
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta name="description" content="Rufus is a small application that creates bootable USB drives, which can then be used to install or run Microsoft Windows, Linux or DOS. In just a few minutes, and with very few clicks, Rufus can help you run a new Operating System on your computer...">
<meta name="keywords" content="Application,BIOS,Boot,Bootable,DOS,Download,Drive,Fast,Flash,Formatting,FreeDOS,Linux,Portable,Rufus,Small,Standlone,UEFI,USB,Utility,Windows">
<meta name="author" content="Pete Batard">
<meta name="application-name" content="Rufus"/>
<!-- This madness about trying to satisfy everyone with an icon has got to stop. W3C, aren't you supposed to standardize this crap?!? -->
<link rel="apple-touch-icon" href="pics/rufus-150.png" />
<link rel="apple-touch-icon-precomposed" href="pics/rufus-150.png" />
<link rel="icon" href="pics/rufus-32.png" sizes="32x32" />
<link rel="icon" href="pics/rufus-64.png" sizes="64x64" />
<link rel="icon" href="pics/rufus-72.png" sizes="72x72" />
<link rel="icon" href="pics/rufus-128.png" sizes="128x128" />
<link rel="icon" href="pics/rufus-150.png" sizes="150x150" />
<link rel="icon" href="pics/rufus-192.png" sizes="192x192" />
<link rel="icon" href="pics/rufus-256.png" sizes="256x256" />
<link rel="icon" href="pics/rufus-512.png" sizes="512x512" />
<meta name="msapplication-square70x70logo" content="pics/rufus-72.png"/>
<meta name="msapplication-square150x150logo" content="pics/rufus-150.png"/>
<meta name="msapplication-wide310x150logo" content="pics/rufus-150.png"/>
<meta name="msapplication-square310x310logo" content="pics/rufus-256.png"/>
<meta name="msapplication-TileImage" content="pics/rufus-256.png" />
<meta name="msapplication-TileColor" content="#3f4555"/>
<title>Rufus - The Official Website (Download, New Releases)</title>
<style type="text/css">
body { margin:0; padding:0; }
.frame { display:block; width:100vw; height:100vh; max-width:100%; margin:0; padding:0; border:0; box-sizing:border-box; }
</style>
</head>
<body style="margin:0px;padding:0px;overflow:hidden" id="body">
<noscript><iframe class="frame" src="en_IE.html"></iframe></noscript>
<script type="text/javascript">
var localized_index = "en_IE.html";
var lang = window.navigator.userLanguage || window.navigator.language;
EOF
for i in `curl -sS $url | sed -rn 's/.*<option.*value=\"(.*)\">/\1/p'`
do
  echo Creating $i.html
    if [[ -v custom[${i:0:2}] ]]; then
      IFS=";" read -r -a arr <<< "${custom[${i:0:2}]}"
      if [ "$i" == "${arr[0]}" ]; then
        echo $add_else 'if (lang == "'${arr[1]}'") localized_index = "'${arr[1]}'.html";' >> index.html
        echo 'else if (lang.substr(0,2) == "'${arr[0]:0:2}'") localized_index = "'${arr[0]}'.html";' >> index.html
      fi
  else
    echo $add_else 'if (lang.substr(0,2) == "'${i:0:2}'") localized_index = "'$i'.html";' >> index.html
  fi
  curl -sS $url?locale=$i | sed -e "s/'?locale='+this.options\[this\.selectedIndex\]\.value\">/this\.options\[this\.selectedIndex\]\.value+'\.html'\">/g" > $i.html
  add_else=else
done
echo Creating index.html
cat >>index.html<<EOF
document.getElementById("body").innerHTML = \`<iframe class="frame" src="\${localized_index}"></iframe>\`;
</script>
</body>
</html>
EOF
