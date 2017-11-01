from PIL import Image
import glob, os
import hashlib
import getChars
import getLines

def OCR(char_img):
	dir = './hashes/'

	hash = hashlib.md5(char_img.tobytes()).hexdigest()

	char_detected = False

	files = glob.glob(dir+'*')

	for file in files:

		with open(file) as f:
			for line in f:
				line = line.rstrip()

				if hash == line:
					char_detected = True
					char_str = file[9:-4]
					break
		if char_detected:
			break
	
	# if the char has been detected, then we can return it. If it hasn't, we add its hash manually
	if char_detected:
		return char_str
	else:
		char_img.show()
		char_str = raw_input("Unknown char, please, add it: ")

		# Create ./hashes/ if it does not exist
		if not os.path.exists(dir):
			os.makedirs(dir)
		
		# Create ./hashes/char_str.txt if it does not exist
		filename = dir + char_str + ".txt"
		if not os.path.exists(filename):
			open(filename, 'w').close()

		# Add the hash at the end of the file
		with open(filename, 'a') as f:
			f.write(hash + '\n')
			f.close()
	
	return char_str

if __name__ == "__main__":
	file = 'r'
	image = Image.open('images/'+file+'.png')

	count_lines, lines = getLines.getLines(image)

	filename = './texts/'+file+'.txt'

	if not os.path.exists('./texts/'):
		os.makedirs('./texts/')

	if not os.path.exists(filename):
		open(filename, 'w').close()

	for line in lines:
		count_chars, chars = getChars.getChars(line)
		str = ""
		for char in chars:
			str += OCR(char)
		
		with open(filename, 'a') as f:
			f.write(str + '\n')
			f.close()
