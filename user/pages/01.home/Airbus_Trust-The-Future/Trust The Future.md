---
title: Airbus D&S - 2014 - Trust The Future
slug: airbus/trust-the-future
template: item
date: 22-10-2015

taxonomy:
	category: [Airbus]
---

In 2014, Airbus Defense and Space organized its first cybersecurity challenge named "Trust The Future", and restricted to a few French engineering schools. This challenge mixes reverse, stegano, and much more.

===

You can download the [challenge here.][LNK]

- Password: `-->__TrustTh3FuTur3__<--`
- MD5: `4542cb330ed7fae6ecb71ecfadb03df6`

You can extract the files with the `gpg` command:

```bash
# Variables
PASSWORD="-->__TrustTh3FuTur3__<--"
INPUT="CHALLENGES.gpg"
OUTPUT="CHALLENGES"


# Decrypt the GPG file
echo "$PASSWORD" | \
    gpg --passphrase-fd 0 --no-tty --output $OUTPUT --decrypt $INPUT;
# Decompress the archive
tar -zxvf $OUTPUT;
```

You will get a bunch of files, representing the different challenges:

1. bootme
2. [CHALLENGE.pcap][C02]
3. crackme1
4. crackme1-w32
5. crackme2
6. crackme3
7. crypto.tgz
8. [G00d_Luck.html][C08]
9. [Google.fr][C09]
10. [HIDDEN.png][C10]
11. noise.wav
12. SECRET.zip
13. [shadow][C13]
14. XOXO.html

That's it! Here we go! It would be too long to write the whole writeup here, so I'll split it into different ones.

[LNK]: /user/pages/01.home/Airbus_Trust-The-Future/files/CHALLENGES.gpg "Challenge"

[C01]: https://www.trecherel.com/airbus/trust-the-future/bootme "bootme"
[C02]: https://www.trecherel.com/airbus/trust-the-future/challenge "CHALLENGE.pcap"
[C03]: https://www.trecherel.com/airbus/trust-the-future/crackme1 "HIDDEN.png"
[C04]: https://www.trecherel.com/airbus/trust-the-future/crackme1-w32 "crackme1-w32"
[C05]: https://www.trecherel.com/airbus/trust-the-future/crackme2 "crackme2"
[C06]: https://www.trecherel.com/airbus/trust-the-future/crackme3 "crackme3"
[C07]: https://www.trecherel.com/airbus/trust-the-future/crypto "crypto.tgz"
[C08]: https://www.trecherel.com/airbus/trust-the-future/g00d_luck "G00d_Luck.html"
[C09]: https://www.trecherel.com/airbus/trust-the-future/Google "Google.fr"
[C10]: https://www.trecherel.com/airbus/trust-the-future/hidden "HIDDEN.png"
[C11]: https://www.trecherel.com/airbus/trust-the-future/noise "noise.wav"
[C12]: https://www.trecherel.com/airbus/trust-the-future/secret "SECRET.zip"
[C13]: https://www.trecherel.com/airbus/trust-the-future/shadow "shadow"
[C14]: https://www.trecherel.com/airbus/trust-the-future/xoxo "XOXO.html"
