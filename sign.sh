#!/bin/bash
# This script creates the RSA-2048 signatures for our downloadable content

PRIVATE_KEY=~/private.pem
PUBLIC_KEY=~/public.pem
DUMMY_FILE=/etc/hostname

# Create or update a signature
sign_file() {
  if [ -f $FILE.sig ]; then
    SIZE=$(stat -c%s $FILE.sig)
    openssl dgst -sha256 -verify $PUBLIC_KEY -signature $FILE.sig $FILE >/dev/null 2>&1
    if [ ! $? -eq 0 ]; then 
      echo Updating signature for $FILE
      openssl dgst -sha256 -sign $PRIVATE_KEY -passin pass:$PASSWORD -out $FILE.sig $FILE
    fi
  else
    # No signature => create a new one
    echo Creating signature for $FILE
    openssl dgst -sha256 -sign $PRIVATE_KEY -passin pass:$PASSWORD -out $FILE.sig $FILE
  fi
}

read -s -p "Enter pass phrase for `realpath $PRIVATE_KEY`: " PASSWORD
echo
# Confirm that the pass phrase is valid by trying to sign a dummy file
openssl dgst -sha256 -sign $PRIVATE_KEY -passin pass:$PASSWORD $DUMMY_FILE >/dev/null 2>&1 || { echo Invalid pass phrase; exit 1; }

find ~/public_html -maxdepth 1 -name "*.ver" | while read FILE; do sign_file; done
find ~/public_html/downloads -name "*.exe" -type f | while read FILE; do sign_file; done
find ~/public_html/files -not -name "*.txt" -not -name "*.sh" -not -name "*.sig" -not -name "*pre*" -type f | while read FILE; do sign_file; done
