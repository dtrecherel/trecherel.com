---
title: Airbus D&S - 2014 - Trust The Future - CHALLENGE.pcap
slug: airbus/trust-the-future/challenge
template: item
date: 13-11-2015

taxonomy:
	category: [Airbus]
	tag: [PCAP]
---

In 2014, Airbus Defense and Space organized its first cybersecurity challenge named "Trust The Future", and restricted to a few French engineering schools. This is the `CHALLENGE.pcap` challenge, [the other ones can be found here.][CHL]

===

In this one, we have to analyze some network traffic!

We use `tshark` to look at the file. Here is the most interesting part:

```text
$ tshark -r CHALLENGE.pcap
  1   0.000000    127.0.0.1 -> 127.0.0.1    TCP 74 55025→71 [SYN] Seq=0 Win=43690 Len=0 MSS=65495 SACK_PERM=1 TSval=1160060 TSecr=0 WS=128
  2   0.000027    127.0.0.1 -> 127.0.0.1    TCP 74 21→55025 [SYN, ACK] Seq=0 Ack=1 Win=43690 Len=0 MSS=65495 SACK_PERM=1 TSval=1160060 TSecr=1160060 WS=128
  3   0.000051    127.0.0.1 -> 127.0.0.1    TCP 66 55025→21 [ACK] Seq=1 Ack=1 Win=43776 Len=0 TSval=1160060 TSecr=1160060
  4   0.000815    127.0.0.1 -> 127.0.0.1    FTP 94 Response: 220 pyftpdlib 1.4.1 ready.
  5   0.000934    127.0.0.1 -> 127.0.0.1    TCP 66 55025→21 [ACK] Seq=1 Ack=29 Win=43776 Len=0 TSval=1160060 TSecr=1160060
  6   2.793029    127.0.0.1 -> 127.0.0.1    FTP 77 Request: USER user
  7   2.793114    127.0.0.1 -> 127.0.0.1    TCP 66 21→55025 [ACK] Seq=29 Ack=12 Win=43776 Len=0 TSval=1160758 TSecr=1160758
  8   2.793380    127.0.0.1 -> 127.0.0.1    FTP 99 Response: 331 Username ok, send password.
  9   2.793443    127.0.0.1 -> 127.0.0.1    TCP 66 55025→21 [ACK] Seq=12 Ack=62 Win=43776 Len=0 TSval=1160758 TSecr=1160758
 10   5.402992    127.0.0.1 -> 127.0.0.1    FTP 78 Request: PASS 12345
 11   5.403416    127.0.0.1 -> 127.0.0.1    FTP 89 Response: 230 Login successful.
 12-23 [...]
 24  11.079147    127.0.0.1 -> 127.0.0.1    FTP 83 Request: RETR TOP_SECRET
 25-37 [...]
 38  16.475578    127.0.0.1 -> 127.0.0.1    FTP 76 Request: RETR KEY
 39-46 [...]
 47  19.597427    127.0.0.1 -> 127.0.0.1    FTP 72 Request: QUIT
 48  19.597835    127.0.0.1 -> 127.0.0.1    FTP 80 Response: 221 Goodbye.
 49-51 [...]
```
	

This shows us a FTP connection on localhost. The source connects to the FTP using the username `user` and the password `12345` (sadly, this is not the token). Then, they retrieves (`RETR`) two files: `TOP_SECRET` and `KEY`.

We use `scapy` to extract those files.

```python
$ scapy
Welcome to Scapy (2.2.0)
>>> packets = rdpcap('CHALLENGE.pcap')
>>> file1 = open('TOP_SECRET', 'w')
>>> file1.write(str( packets[25][Raw] ))
>>> file1.close()
>>> file2 = open('KEY', 'w')
>>> file2.write(str( packets[39][Raw] ))
>>> file2.close()
```

We take a look at both the files:

```text
$ xxd KEY
0000000: 5448 335f 4b33 595f 3133 3337 0a         TH3_K3Y_1337.
$ xxd TOP_SECRET
0000000: 0403 305b 4133 595f 3133 aa62 120d 23a3  ..0[A3Y_13.b..#.
0000010: 77d6 445f 3133 2e37 5448 395f 5733 2d32  w.D_13.7TH9_W3-2
0000020: 411c 4052 262b 002b 1e67 505f 32b1 6505  A.@R&+.+.gP_2.e.
0000030: 00ca 656d 1f46 2154 3132 37df 5748 335b  ..em.F!T127.WH3[
0000040: a330 595f 655b 5617 2027 583a 2513 302c  .0Y_e[V. 'X:%.0,
0000050: 1109 1376 0b00 4638 2e6c 2a3a 5241 0043  ...v..F8.l*:RA.C
0000060: 5e18 785e 492d 5a55 3133 3337 54d1 6619  ^.x^I-ZU1337T.f.
0000070: 0e23 a563 d42e 3337 5455 335f 4b39 5947  .#.c..37TU3_K9YG
0000080: 3133 3337 5449 335f 4b87 d85f 3133 3343  1337TI3_K.._133C
0000090: 3938 1c2c 2e41 3a6c 4566 6732 544b b109  98.,.A:lEfg2TK..
00000a0: 7967 2c27 3a33 3233 bc4b 335f 4fdb 5a5f  yg,':323.K3_O.Z_
00000b0: 3163 7832 5248 335f 4b32 595e 3163 3337  1cx2RH3_K2Y^1c37
00000c0: 5429 335f 4b33 59                        T)3_K3Y
```

We were a bit stuck at first, and we didn't know what to do: this was my first time on this kind of challenge. We could see parts of the key in the `TOP_SECRET` file, so we tried to highlight them:

```text
0000000: XXXX XXXX XXXX XXXX XXXX XXXX XXXX XXXX  ................
0000010: XXXX XXXX XXXX XXXX XXXX XXXX XXXX XXXX  ................
0000020: XXXX XXXX XXXX XXXX XXXX XXXX XXXX XXXX  ................
0000030: XXXX XXXX XXXX XXXX XXXX XXXX XXXX XXXX  ................
0000040: XXXX XXXX XXXX XXXX XXXX XXXX XXXX XXXX  ................
0000050: XXXX XXXX XXXX XXXX XXXX XXXX XXXX XXXX  ................
0000060: XXXX XXXX XXXX XXXX 3133 3337 XXXX XXXX  ........1337....
0000070: XXXX XXXX XXXX 3337 54XX 335f 4bXX 59XX  ......37T.3_K.Y.
0000080: 3133 3337 54XX 335f 4bXX XX5f 3133 33XX  1337T.3_K.._133.
0000090: XXXX XXXX XXXX XXXX XXXX XXXX XXXX XXXX  ................
00000a0: XXXX XXXX XXXX XXXX XXXX XXXX XXXX XXXX  ................
00000b0: XXXX XXXX XX48 335f 4bXX 59XX 31XX 3337  .....H3_K.Y.1.37
00000c0: 54XX 335f 4b33 59                        T.3_K3Y
```

That's when it made sense: the key `TH3_K3Y_1337` was repeated throughout the file (without the newline), and the encryption method was probably `XOR`! Hurray!

Let's use python to get the decrypted file:

```python
#!/usr/bin/env python

from itertools import izip, cycle
import argparse

parser = argparse.ArgumentParser('Use this script to decrypt a file using a key and the XOR algorithm.')
parser.add_argument('-f', action='store', dest='pathInput' , help='Path to the encrypted file')
parser.add_argument('-k', action='store', dest='pathKey'   , help='Path to the key file')
parser.add_argument('-o', action='store', dest='pathOutput', help='Path to the output file')

args = parser.parse_args();

if (args.pathInput == None) or (args.pathKey == None) or (args.pathOutput == None):
	parser.print_help()
	exit
else:
	fEncrypted = open(args.pathInput ,'r')
	fKey       = open(args.pathKey   ,'r')
	fDecrypted = open(args.pathOutput,'w')
	
	strEncrypted = fEncrypted.read()
	# I use rstrip() to remove the newline character of the key
	strKey       = fKey.read().rstrip()
	strDecrypted = ''.join( chr(ord(x) ^ ord(k)) for x,k in izip(strEncrypted, cycle(strKey)))
	fDecrypted.write(strDecrypted)
	
	fEncrypted.close()
	fKey.close()
	fDecrypted.close()
```

```text
$ ./xor_decryption.py -f TOP_SECRET -k KEY -o TOP_SECRET_decrypted

$ file TOP_SECRET_decrypted
TOP_SECRET_decrypted: Zip archive data, at least v1.0 to extract

$ mv TOP_SECRET_decrypted{,.zip}

$ unzip TOP_SECRET_decrypted.zip
Archive:  TOP_SECRET_decrypted.zip
 extracting: tmp/serc3t
 
$ cat tmp/serc3t
The token is : A_Huge_secr3t
```

Well, the token is: `A_Huge_secr3t`! 



[CHL]: https://www.trecherel.com/airbus/trust-the-future "The other challenges of A&D Trust The Future"
