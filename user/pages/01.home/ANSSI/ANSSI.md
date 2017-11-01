---
title: WIP - ANSSI - Behind the wallpaper
slug: anssi/wallpaper
template: item
date: 28-10-2015

taxonomy:
	category: [ANSSI]
	tag: [WIP, OCR]
---

<span style="color:#ed6f6d;">**This post is still a WIP.**</span><br/>
In 2012, the [National Cybersecurity Agency of France][ANS] (*Agence nationale de la sécurité des systèmes d'information*, ANSSI) published a new wallpaper with a small particularity: a challenge was hidden inside.

===

Here is the wallpaper:

![ANSSI wallpaper][WAL]  

Now, let's start!

## Logo analysis

I already had the opportunity to go inside their office, and I remember seeing this big logo near the front door. I was wondering what the small inscriptions meant. (The ones we can see in the inner ring.)

![The logo][LOG]  

Here are the inscriptions we can see:

```text
Top:
A125894294F6A08D 
FDC21B055809130B 
D873AD692D563156 
F0450B4A33EB5315 
E99C64710CD78CDB 
AD2EEEF2E168A0EA 
8F2320C340CF7BBF 
52CC2D94BFA89E01 
613094E58C727F72 
3ACE254275121653 
EE46D39D1103A044 
8298EDE384A73E7E

Bottom:
TGUgc291cmlyZSBkZSBsYSBKb2NvbmRlIGNhY2hhaXQgYmllbiBkZXMgbXlzdOhyZXMuLi4K
AUTH : DE9C9C55 : PCA
```

The top part seems to represent 12 8-byte blocks. It looks like hexadecimals, but it is not as simple as hex-encoded text. Maybe it has been encrypted, or maybe this is just some data. Either way, I put this aside for now.

The lower part is easier, the long string is base64-encoded data, which can be decoded to give `Le sourire de la Joconde cachait bien des mystères...`. Regarding the 

## LSB Stegano

My second approach was to analyse the wallpaper with `Steganabara`, in order to find hidden information that could have been hidden using [LSB steganography.][STG] LSB steganography is a process in which you encode some information in the least significant bits. Because they're the *least significant* bits, they would hardly alter the image.

Using `Steganabara` we can see that information has indeed been hidden:

![Information has been hidden in the least significant bits][3I]  

Also, 2 sentences appear just below the agency name.

```
LA PERSEVERANCE EST LA NOBLESSE DE L'OBSTINATION
LES MOMENTS LES PLUS DIFFICILES SONT CEUX QUI DONNENT LE PLUS DE SATISFACTION
```

Are they trying to encourage us?

I split the image to into the 3 panes (red, green, blue). It looks like we have several sections of data with perhaps a hash to check whether we successfully transcribed it.

I made an OCR script to retrieve the data.

### Red

r

### Green

g

### Blue

Les données lues sur la couche rouge correspondent à une archive `bzip2`:

```
$ file data_red.bin 
data_red.bin: bzip2 compressed data, block size = 900k
``` 

[ANS]: https://www.ssi.gouv.fr "ANSSI webpage"
[WAL]: files/Logo/Logo.png "ANSSI Walpaper"
[LOG]: files/Parts/Medaille.png "Logo"
[STG]: https://en.wikipedia.org/wiki/Steganography "Steganography on Wikipedia"
[3I]: files/LSB/RGB_LSB.png "Informations cachées"
