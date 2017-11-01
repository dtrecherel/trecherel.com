from PIL import Image

def cropVertical(char):
	white = 255
	black = 0

	pixels = char.load()

	for y in range(char.size[1]):
		for x in range(char.size[0]):
			if pixels[x,y] == white:
				y_end = y+1
				break
	
	for y in reversed(range(char.size[1])):
		for x in range(char.size[0]):
			if pixels[x,y] == white:
				y_start = y
				break
	
	return char.crop((0, y_start, char.size[0], y_end))

def getChars(image):
	white   = 255
	black   = 0

	chars   = []
	pixels  = image.load()
	
	newchar, inchar = False, False

	count = 0
	for x in range(image.size[0]):
		inchar = False
		
		for y in range(image.size[1]):
			if pixels[x,y] == white:
				inchar = True
				break
		
		if inchar == True and newchar == False:
			# We just have detected a new character
			newchar = True
			x_start = x

		if inchar == False and newchar == True:
			# We just have finished detecting a character
			newchar = False
			x_end = x
			count += 1
			char = image.crop((x_start, 0, x_end, image.size[1]))
			char = cropVertical(char)
			chars.append(char)

	return count, chars


if __name__ == "__main__":
	line = Image.open('images/l.png')

	count_chars, chars = getChars(line)
	chars[0].save('images/c.png')
	print "%d characters detected" % (count_chars)
