#!/bin/sh
find . -type l | tar -cvf symlinks.tar -T -
