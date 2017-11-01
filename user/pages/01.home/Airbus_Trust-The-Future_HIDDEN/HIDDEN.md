---
title: Airbus D&S - 2014 - Trust The Future - HIDDEN.png
slug: airbus/trust-the-future/hidden
template: item
date: 22-10-2015

taxonomy:
	category: [Airbus]
	tag: [STEGANO]
---

In 2014, Airbus Defense and Space organized its first cybersecurity challenge named "Trust The Future", and restricted to a few French engineering schools. This is the `HIDDEN.png` challenge, [the other ones can be found here.][CHL]

===

Now, let's start. We have to retrieve the token from a `.png` file.  
As you may know, *Portable Network Graphic* (PNG) is an image format that support lossless data compression. It seemed likely to me that the token was *visually* hidden. Indeed, a secret message is almost visible to the naked eye, just below the line "DEFENCE & SPACE".

![HID]

This challenge is pretty easy; the token is written with the color `#FCFCFC` on a white background. To reveal it, we use `steganabra` and its `Color Map` feature to create the `HIDDEN_solution.png` file, where the secret message is visible.

![SOL]

Here's the secret message:  
`The token is I_am_Hidden`

Pretty simple!

### What's the deal with the PNG format?!

If it was a `.jpg`, the white zone might have been altered by (almost) invisible artifact, destroying the hidden message.


[CHL]: https://www.trecherel.com/airbus/trust-the-future "The other challenges of A&D Trust The Future"
[HID]: files/HIDDEN.png "HIDDEN.png"
[SOL]: files/HIDDEN_solution.png "The secret message is visible"
