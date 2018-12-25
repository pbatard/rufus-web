#!/bin/sh
find . -type l | tar -cvf _symlinks.tar -T -
