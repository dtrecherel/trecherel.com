---
title: Airbus D&S - 2014 - Trust The Future - shadow
slug: airbus/trust-the-future/shadow
template: item
date: 28-10-2015

taxonomy:
	category: [Airbus]
	tag: [JS]
---

In 2014, Airbus Defense and Space organized its first cybersecurity challenge named "Trust The Future", and restricted to a few French engineering schools. This is the `shadow` challenge, [the other ones can be found here.][CHL]

===

We have a shadow file! This kind of file are used to store users' passwords in encrypted format under Linux.

```text
$1$gNdVWdxu$ihd.dBdcC49pWkwhr/xYt0
```

As we can see, we just have the hashed password. The token is probably that password... in clear.

But how does this work? Well, we can divide the string into 3 substrings separated by the character `$`:

```text
$1$gNdVWdxu$ihd.dBdcC49pWkwhr/xYt0
|1|   2    |          3          |

1. Hash algorithm
It represents the hash algorithm used. Here '1' means 'MD5', a weak hash algorithm.

2. The salt
The salt is a random set of data that is combined with the password to produce the hash.
It is used to avoid that, for a given hash algorithm, two users with the same password get the same hash.

3. The hash
It is the hash of the combination of the password and the salt
```

Here's a simple schema of how it works:

```text
	                    +-----------+
	(password,salt) --> | HASH ALG. | --> hash
	                    +-----------+
```

In our case, we have the salt, the hash algorithm used, and the final hash. To find the password, we can use python to bruteforce it.

```python
#!/usr/bin/env python

import crypt
import argparse

def getAlgo(str):
	str = str.split('$')
	return str[1]

def getSalt(str):
	str = str.split('$')
	return str[2]

def getHash(str):
	str = str.split('$')
	return str[3]


parser = argparse.ArgumentParser(description='Use this script to bruteforce hash from /etc/shadow!')
parser.add_argument('-f', action='store', dest='pathShadow', help='Path to the file with the hash')
parser.add_argument('-d', action='store', dest='pathDict'  , help='Path to the dictionnary')

args = parser.parse_args();

if (args.pathShadow == None) or (args.pathDict == None):
	parser.print_help()
	exit
else:
	hashFile = open (args.pathShadow, 'r')
	for line in hashFile.readlines():
		line = line.replace("\n","")
		algo = getAlgo(line)
		salt = getSalt(line)
		hash = getHash(line)
  
	dictFile = open (args.pathDict, 'r')
	for word in dictFile.readlines():
		word = word.replace("\n","")
		cryptWord = crypt.crypt(word, "$"+algo+"$"+salt+"$")
		hashWord  = getHash(cryptWord)
		if (hashWord == hash):
			print "Password found: \'" + word + "\'"
			break
```

We decided to use one of the wordlists available on Kali to find the password, `sqlmap.txt` was the right one!

```
$ ./bruteforce.py -f shadow -d /usr/share/wordlists/sqlmap.txt
Password found: 'loutre'
```

Our token is `loutre`.

[CHL]: https://www.trecherel.com/airbus/trust-the-future "The other challenges of A&D Trust The Future"
