---
title: Airbus D&S - 2014 - Trust The Future - Google.fr
slug: airbus/trust-the-future/google
template: item
date: 05-11-2015

taxonomy:
	category: [Airbus]
	tag: [STEGANO]
---

In 2014, Airbus Defense and Space organized its first cybersecurity challenge named "Trust The Future", and restricted to a few French engineering schools. This is the `Google.fr` challenge, [the other ones can be found here.][CHL]

===

Let's take a look at the `Google.fr` files. We have an `.html` and a `.png` file. We didn't see anything useful in the file `Google.html`. However after looking closer at the image `logo11w.png`, we notice seven black pixels on it.

![Seven black pixels][PXL]

The trick here was to note down their coordinates. We quickly notice that they range between 50 and 120, which means they can represent ASCII character:

```text
  X;Y

 72; 97    Ha
 73; 95    I_
 95; 83    _S  
103; 97    ga 
110;111    no
116; 51    t3
116;101    te
```

The token is `I_Hate_St3gano`. (I'm not sure about `te/t3`, so if someone remembers, contact me. ;-) )

[CHL]: https://www.trecherel.com/airbus/trust-the-future "The other challenges of A&D Trust The Future"
[PXL]: files/logo11w_black_pixels.png "Google logo with black pixels"