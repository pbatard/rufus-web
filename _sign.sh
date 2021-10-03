#!/bin/bash
# This script creates the RSA-2048 signatures for our downloadable content

PRIVATE_KEY=~/private.pem
PUBLIC_KEY=~/public.pem

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

if [[ ! -f $PRIVATE_KEY ]] ; then
    echo $PRIVATE_KEY does not exist - aborting.
    exit 1
fi
if [[ ! -f $PUBLIC_KEY ]] ; then
    echo $PUBLIC_KEY does not exist - aborting.
    exit 1
fi
read -s -p "Enter pass phrase for `realpath $PRIVATE_KEY`: " PASSWORD
echo
# Confirm that the pass phrase is valid by trying to sign a dummy file
openssl dgst -sha256 -sign $PRIVATE_KEY -passin pass:$PASSWORD $PUBLIC_KEY >/dev/null 2>&1 || { echo Invalid pass phrase; exit 1; }

find ./ -maxdepth 1 -name "*.ver" ! -name "Fido.ver" ! -name "Loc.ver" | while read FILE; do sign_file; done
find ./downloads -name "*.exe" -type f | while read FILE; do sign_file; done
find ./files -not -name "*.txt" -not -name "*.sh" -not -name "*.sig" -not -name "*pre*" -type f | while read FILE; do sign_file; done
# Clear the PASSWORD variable just in case
PASSWORD=`head -c 50 /dev/random | base64`
