#! /usr/bin/env python3
# -*- coding=utf-8 -*-

import sys
import re
import os
import polib

# global variables

def main():
	print("Update all .po files from .pot and create .mo file")
	cwd = os.getcwd()
	pot_path = os.path.join(cwd, 'index.pot')
	if not os.path.isfile(pot_path):
		print("ERROR: '" + pot_path + "' was not found")
		return -1
	print("Opening '" + pot_path + "'...");
	pot = polib.pofile(pot_path)
	for path, subdirs, files in os.walk(cwd):
		for name in files:
			if name.endswith('.po'):
				filename = os.path.join(path, name)
				print("Processing '" + filename + "'...")
				po = polib.pofile(filename)
				# Fix typo in speed tests
				for entry in po.translated_entries():
					entry.msgid = entry.msgid.replace('tests carried', 'tests were carried')
				po.merge(pot)
				# Uncomment to create a backup
				# os.replace(filename, filename + '.old')
				po.save(filename)
				filename = filename.replace('.po', '.mo')
				po.save_as_mofile(filename)


# Load main only in ran as stand-alone script
if __name__ == "__main__":
	main()
