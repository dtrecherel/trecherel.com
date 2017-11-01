#!/usr/bin/env python

from __future__ import division
from PIL import Image
import hashlib

def getLines(image):
	"""
		This function takes an image with several lines of text and returns several images with only one line of text
	"""

	white = 255
	black = 0

	lines = []
	pixels = image.load()
	
	newline, inline = False, False

	for y in range(image.size[1]):
		inline = False

		for x in range(image.size[0]):
			if pixels[x,y] == white:
				inline = True
				break

		if   inline == True and newline == False:
			# We just have discovered a new line
			newline = True
			y_start = y
		elif inline == False and newline == True:
			# We just have finished reading a line
			newline = False
			y_end = y
			lines.append(image.crop((0, y_start, image.size[1], y_end)))

def segment(image):
	white   = 255
	black   = 0

	letters = []
	pixels  = image.load()
	
	in_letter, cur_letter = False, False
	x_start = 0
	x_end   = 0	

	for x in range(image.size[0]):
		in_letter = False # For each column, we'll suppose at first that there is no black pixels
		
		for y in range(image.size[1]):
			if (pixels[x,y] == black):
				in_letter = True
				break;
		
		if ( not(cur_letter) and     in_letter ):
			cur_letter = True
			x_start = x

		if (     cur_letter  and not(in_letter) ):
			cur_letter = False
			x_end = x
			letters.append(image.crop((x_start, 0, x_end, image.size[1])))
	return letters

def hash2char(hash):
	with open('charset-hashes.txt') as f:
		for line in f:
			splitted = line.replace('\n','').split(' ')
			if hash == splitted[1]:
				return splitted[0]

def crack(image):
	image_contrasted = contrast(image)
	letters = segment(image_contrasted)

	string = ""

	for letter in letters:
		hash = hashlib.md5(letter.tobytes()).hexdigest()
		string += hash2char(hash)
	return string

def main():
	image = Image.open('captcha.png')
	string = crack(image)
	print string

if __name__ == '__main__':
	main()
