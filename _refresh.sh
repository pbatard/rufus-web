#!/bin/bash
url=nas
index=index.html
main_region=('ar_SA' 'pt_PT' 'zh_CN')
spec_region=('ar_IQ' 'pt_BR' 'zh_TW')
locale_var=""

echo "s/'?locale='+this.options\[this\.selectedIndex\]\.value\">/'\/'+this\.options\[this\.selectedIndex\]\.value\">/g" > cmd.sed
for l in ${main_region[@]}; do
  echo "s/value=\"$l\"/value=\"${l:0:2}\"/g" >> cmd.sed
done

for l in `curl -sS $url | sed -rn 's/.*<option.*value=\"(.*)\">/\1/p'`
do
  dir=$l
  mkdir -p $dir 
  if [[ ${main_region[@]} =~ $l ]]; then dir=${l:0:2}; fi
  if [ -z "$locale_var" ]; then
    locale_var="\"${dir}\""
  else
    locale_var="${locale_var}, \"${dir}\""
  fi
  echo Processing $dir/index.html
  curl -sS $url?locale=$l -o $dir/index.html
  sed -b -i -f cmd.sed $dir/index.html
done

rm cmd.sed
cat >$index<<EOF
<!DOCTYPE html>
<html>
  <head>
    <meta charset='utf-8'>
    <meta name="description" content="Rufus is a small application that creates bootable USB drives, which can then be used to install or run Microsoft Windows, Linux or DOS. In just a few minutes, and with very few clicks, Rufus can help you run a new Operating System on your computer...">
    <meta name="keywords" content="Application,BIOS,Boot,Bootable,DOS,Download,Drive,Fast,Flash,Formatting,FreeDOS,Linux,Portable,Rufus,Small,Standlone,UEFI,USB,Utility,Windows">
    <meta name="author" content="Pete Batard">
    <meta name="application-name" content="Rufus"/>
    <title>Rufus - The Official Website (Download, New Releases)</title>
  </head>
  <body>
    <script>
     var supported_languages = [
      ${locale_var}
     ];
     var localized_index = "en";
     var lang = (window.navigator.language || window.navigator.userLanguage).replace('-', '_');
EOF

add_else=
for l in ${spec_region[@]}; do
  echo "     ${add_else}if (lang == \"$l\")" >> $index
  echo "       localized_index = \"$l\";" >> $index
  add_else="else "
done

cat >>$index<<EOF
     else
       localized_index = lang.split('_')[0];
     if (supported_languages.indexOf(localized_index) < 0)
       localized_index = "en";
     window.location = '/' + localized_index;
    </script>
    <noscript>
      <meta http-equiv="refresh" content="0; url=https://rufus.ie/en/" />
    </noscript>
  </body>
</html>
EOF
