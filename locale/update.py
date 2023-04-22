#! /usr/bin/env python3
# -*- coding=utf-8 -*-

import sys
import re
import os
import polib

def main():
  print("Update all .po files from .pot and create .mo file")
  cwd = os.getcwd()
  pot_path = os.path.join(cwd, 'index.pot')
  if not os.path.isfile(pot_path):
    print("ERROR: '" + pot_path + "' was not found")
    return -1
  print("Opening '" + pot_path + "'...");
  pot = polib.pofile(pot_path)
  problem_po = []
  for path, subdirs, files in os.walk(cwd):
    for name in files:
      if name.endswith('.po'):
        filename = os.path.join(path, name)
        print("Processing '" + filename + "'...")
        po = polib.pofile(filename)

        entry = po.find("Windows 7 or later, 32 or 64 bit doesn't matter. Once downloaded, the application is ready to use.")
        if entry:
          entry.msgid = "Windows 7 or later, 32 or 64 bit doesn't matter."
          parts = entry.msgstr.split(". ")
          if (len(parts) > 1):
            print("o Splitting Windows 7 string")
            entry.msgstr = parts[0] + "."
            entry2 = polib.POEntry(
               msgid  = "Once downloaded, the application is ready to use.",
               msgstr = parts[1]
            )
            po.append(entry2)
          else:
            p = os.path.relpath(path, cwd).replace("\\LC_MESSAGES", "")
            if p not in problem_po:
              problem_po.append(p)

            
        entry = po.find("If you create a DOS bootable drive and use a non-US keyboard, "
            "Rufus will attempt to select a keyboard layout according to the locale of "
            "your system. In that case, <a target=\"_blank\" %s>FreeDOS</a>, which is "
            "the default selection, is recommended over MS-DOS, as it supports more keyboard layouts.")
        if entry:
          entry.msgid = ("If you create a DOS bootable drive and use a non-US keyboard, "
            "Rufus will attempt to select a keyboard layout according to the locale of "
            "your system.")
          parts = entry.msgstr.split(". ")
          if (len(parts) > 1):
            print("o Shortening FreeDOS string")
            entry.msgstr = parts[0] + "."
          else:
            p = os.path.relpath(path, cwd).replace("\\LC_MESSAGES", "")
            if p not in problem_po:
              problem_po.append(p)

        po.merge(pot)
#        os.replace(filename, filename + '.old')
        po.save(filename)
        filename = filename.replace('.po', '.mo')
        po.save_as_mofile(filename)
  print("List of problematic languages:")
  for p in problem_po:
    print("o " + p)


# Load main only and run as stand-alone script
if __name__ == "__main__":
  main()
