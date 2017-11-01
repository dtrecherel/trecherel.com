from PIL import Image

def getLines(image):
	"""
		This function takes an image with several lines of text and returns several images with only one line of text
	"""

	white = 255
	black = 0

	lines = []
	pixels = image.load()
	
	newline, inline = False, False

	count = 0
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
			# We just have finished detecting a line
			newline = False
			y_end = y
			count += 1
			lines.append(image.crop((0, y_start, image.size[0], y_end)))

	return count, lines

if __name__ == "__main__":
	image = Image.open('images/b.png')

	count_lines, lines = getLines(image)
	print "%d lines detected" % (count_lines)

	c = 0
	for line in lines:
		line.save('images/l'+str(c)+'.png')
		c +=1
