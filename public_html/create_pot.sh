#!/bin/sh
xgettext --package-version=1.1 --from-code=UTF-8 --copyright-holder="Pete Batard" --package-name="Rufus Homepage" --msgid-bugs-address=pete@akeo.ie -L PHP -c -d index -o ./locale/index.pot index.php 
sed --in-place ./locale/index.pot --expression='s/SOME DESCRIPTIVE TITLE/Rufus Homepage/'
sed --in-place ./locale/index.pot --expression='1,6s/YEAR/2014/'
sed --in-place ./locale/index.pot --expression='1,6s/PACKAGE/Rufus/'
sed --in-place ./locale/index.pot --expression='1,6s/FIRST AUTHOR/Pete Batard/'
sed --in-place ./locale/index.pot --expression='1,6s/EMAIL@ADDRESS/pete@akeo.ie/'
