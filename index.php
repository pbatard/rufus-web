<!DOCTYPE html>
<?
$latest_version = "4.1";
$beta_version = "4.2";
$previous_version = "3.16";
$latest_date = "2023.05.31";
$beta_date = "2023.07.10";
$previous_date = "2021.10.13";
$lang1 = array('', 'Malay', 'Malaysia');
$lang2 = array('', 'Croatian', 'Croatia');
$bugfix = false;
$beta = true;
$x64_size = 1.3;
$x86_size = 1.4;
$arm64_size = 4.5;
$beta_size = 1.4;
$src_size = 6.0;
$nb_screenshots = 5;
$screenshot_height = "600px";
$screenshot_duration = 10000;
$langs = array(
  'en_IE' => array('en', '🇮🇪/🇬🇧/🇺🇸 English (International)'),
  'sq_AL' => array('sq', '🇦🇱 Albanian (Shqip)'),
  'ar_SA' => array('ar_SA', '🇸🇦 Arabic (العربية)'),
  'hy_AM' => array('hy', '🇦🇲 Armenian (Հայերեն)'),
  'az_AZ' => array('az', '🇦🇿 Azerbaijani (Azərbaycan)'),
  'bn_BD' => array('bn', '🇧🇩 Bangla (বাংলা)'),
  'bs_BA' => array('bs', '🇧🇦 Bosnian (Bosánski)'),
  'bg_BG' => array('bg', '🇧🇬 Bulgarian (Български)'),
  'yue_HK' => array('yue', '🇭🇰 Cantonese [Hong Kong] (香港粵文)'),
  'ca_ES' => array('ca', '🏴󠁥󠁳󠁣󠁴󠁿 Catalan (Català)'),
  'zh_CN' => array('zh_CN', '🇨🇳 Chinese Simplified (简体中文)'),
  'zh_TW' => array('zh_TW', '🇹🇼 Chinese Traditional (正體中文)'),
  'hr_HR' => array('hr', '🇭🇷 Croatian (Hrvatski)'),
  'cs_CZ' => array('cs', '🇨🇿 Czech (Čeština)'),
  'da_DK' => array('da', '🇩🇰 Danish (Dansk)'),
  'nl_NL' => array('nl', '🇳🇱 Dutch (Nederlands)'),
  'et_EE' => array('et', '🇪🇪 Estonian (eesti keel)'),
  'fi_FI' => array('fi', '🇫🇮 Finnish (Suomi)'),
  'fr_FR' => array('fr', '🇫🇷 French (Français)'),
  'gl_ES' => array('gl', '🏴󠁥󠁳󠁧󠁡󠁿 Galician (Galego)'),
  'de_DE' => array('de', '🇩🇪 German (Deutsch)'),
  'el_GR' => array('el', '🇬🇷 Greek (Ελληνικά)'),
  'he_IL' => array('he', '🇮🇱 Hebrew (עברית)'),
  'hi_IN' => array('hi', '🇮🇳 Hindi (हिंदी)'),
  'hu_HU' => array('hu', '🇭🇺 Hungarian (Magyar)'),
  'id_ID' => array('id', '🇮🇩 Indonesian (Bahasa Indonesia)'),
  'ga_IE' => array('ga', '🇮🇪 Irish (Gaeilge)'),
  'it_IT' => array('it', '🇮🇹 Italian (Italiano)'),
  'ja_JP' => array('ja', '🇯🇵 Japanese (日本語)'),
  'ko_KR' => array('ko', '🇰🇷 Korean (한국어)'),
  'ar_IQ' => array('ar_IQ', '🏴󠁩󠁲󠀱󠀶󠁿 Kurdish (کوردی)'),
  'lv_LV' => array('lv', '🇱🇻 Latvian (Latviešu)'),
  'lt_LT' => array('lt', '🇱🇹 Lithuanian (Lietuvių)'),
  'mk_MK' => array('mk', '🇲🇰 Macedonian (Македонски)'),
  'ms_MY' => array('ms', '🇲🇾 Malay (Bahasa Malaysia)'),
  'mi_NZ' => array('mi', '🇳🇿 Maori (Māori)'),
  'nb_NO' => array('nb', '🇳🇴 Norwegian (Norsk)'),
  'or_IN' => array('or', '🇮🇳 Odia (ଓଡ଼ିଆ)'),
  'fa_IR' => array('fa', '🇮🇷 Persian (پارسی)'),
  'pl_PL' => array('pl', '🇵🇱 Polish (Polski)'),
  'pt_BR' => array('pt_BR', '🇧🇷 Portuguese [BR] (Português [BR])'),
  'pt_PT' => array('pt_PT', '🇵🇹 Portuguese [PT] (Português [PT])'),
  'ro_RO' => array('ro', '🇷🇴 Romanian (Română)'),
  'ru_RU' => array('ru', '🇷🇺 Russian (Русский)'),
  'sr_RS' => array('sr', '🇷🇸 Serbian [Latin] (Srpski [Latinica])'),
  'si_LK' => array('si', '🇱🇰 Sinhala (සිංහල)'),
  'sk_SK' => array('sk', '🇸🇰 Slovak (Slovensky)'),
  'sl_SI' => array('sl', '🇸🇮 Slovenian (Slovenščina)'),
  'es_ES' => array('es', '🇪🇸 Spanish (Español)'),
  'sv_SE' => array('sv', '🇸🇪 Swedish (Svenska)'),
  'th_TH' => array('th', '🇹🇭 Thai (ไทย)'),
  'tr_TR' => array('tr', '🇹🇷 Turkish (Türkçe)'),
  'uk_UA' => array('uk', '🇺🇦 Ukrainian (Українська)'),
  'ur_PK' => array('ur', '🇵🇰 Urdu (اُردُو)'),
  'vi_VN' => array('vi', '🇻🇳 Vietnamese (Tiếng Việt)'),
  'cy_GB' => array('cy', '🏴󠁧󠁢󠁷󠁬󠁳󠁿 Welsh (Cymraeg)'),
);
$locale = "en_IE";
$short_locale = "en";
if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
  $locale = locale_accept_from_http($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
if (isSet($_GET["locale"])) {
  $locale = $_GET["locale"];
}
$locale = preg_replace("/[^a-zA-Z_]/", "", substr($locale,0,5));
foreach($langs as $code => $lang) {
  if(substr($locale,0,strlen($lang[0])) == $lang[0]) {
    $locale = $code;
    $short_locale = $lang[0];
    break;
  }
}
$bcp47_locale = str_replace("_", "-", $locale);
// Must append ".utf8" suffix here, else languages such as Azerbaijani won't work
setlocale(LC_MESSAGES, $locale . ".utf8");
// Also set the LANGUAGE variable, which may be needed on some systems
putenv("LANGUAGE=" . $locale);
bindtextdomain("index", "./locale");
bind_textdomain_codeset("index", "UTF-8");
textdomain("index");

// Right-To-Left specific initialization
$dir = "ltr";
$app_name = "Rufus " . $latest_version;
$tr_version = _("Version");
$full_version = "<b>" . $tr_version . " " . $latest_version . "</b> (" . $latest_date . ")" . ($bugfix?" [BUGFIX RELEASE]":"");
$prev_version = "<b>" . $tr_version . " " . $previous_version . "</b> (" . $previous_date . ")";
$comma = ",";
switch (substr($locale,0,2)) {
case "ar":
case "fa":
case "he":
case "ur":
  $dir = "rtl";
  $app_name = "<span dir=\"ltr\">" . $latest_version . " Rufus</span>";
  $full_version = "<span dir=\"ltr\">" . ($bugfix?"[BUGFIX RELEASE] (":"(") . $latest_date . ") <b>" . $latest_version . " " . $tr_version . "</b></span>";
  $prev_version = "<span dir=\"ltr\">(" . $previous_date . ") <b>" . $previous_version . " " . $tr_version . "</b></span>";
  if(substr($locale,0,2) != "he")
    $comma = "،";
  break;
}
?>

<html <?= "lang=\"$bcp47_locale\" dir=\"$dir\"";?>>
<head profile="http://www.w3.org/2005/10/profile">
<meta charset='utf-8'>
<meta name="description" content="Rufus: Create bootable USB drives the easy way">
<meta name="keywords" content="Application,BIOS,Boot,Bootable,DOS,Download,Drive,Fast,Flash,Formatting,FreeDOS,Linux,Portable,Rufus,Small,Standlone,UEFI,USB,Utility,Windows">
<meta name="author" content="Pete Batard">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="application-name" content="Rufus">
<meta name="msapplication-square70x70logo" content="/pics/rufus-72.png">
<meta name="msapplication-square150x150logo" content="/pics/rufus-150.png">
<meta name="msapplication-wide310x150logo" content="/pics/rufus-150.png">
<meta name="msapplication-square310x310logo" content="/pics/rufus-256.png">
<meta name="msapplication-TileColor" content="#3f4555">
<title>Rufus - <?= _("Create bootable USB drives the easy way");?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script>
function setCookie(name, value, days) {
	var expires = "";
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toUTCString();
	}
	document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') c = c.substring(1, c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
	}
	return "";
}
document.addEventListener("DOMContentLoaded", function(event)
{
	if (getCookie('display_cookie_notice') != 'no')
		document.getElementById('cookie-notice').style.display = 'block';
});
</script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6PCK0CM7G9"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'G-6PCK0CM7G9');
</script>
<style type="text/css">
	:root {
		--bs-body-line-height: 1.2;
	}
	body {
		background-color: #3f4555;
		font-family: Helvetica, Arial, FreeSans, san-serif !important;
		color: #ffffff;
	}
	#right_column {
		float: <?= $dir=="rtl"?"left":"right";?>;
		margin: 0 auto;
		margin-top: 10px;
		margin-right: 10px;
		width: 250px;
		font-size: 0.8em;
	}
	#container {
		margin: 0 auto;
		width: 735px;
		overflow: auto;
	}
	#notice {
		border:4px solid #ffa520;
		color:#ffffff;
		padding:1em;
		width:94%;
		margin-left:auto;
		margin-right:auto;
	}
	#cookie-statement {
		background-color: #5a5a5a;
		border: none;
		border-radius: 0;
		color: #fff;
		-moz-border-radius: 0;
		-webkit-border-radius: 0;
		margin: -8px -8px;
		padding: 5px 0px 5px 15px;
		position: relative;
		width: 100%;
		z-index: 999;
	}
	#cookie-statement a {
		background-color: #303030;
		border: 1px solid rgba(0,0,0,.1);
		-moz-border-radius: 2px;
		-webkit-border-radius: 2px;
		border-radius: 2px;
		color: #fff;
		cursor: pointer;
		line-height: 200%;
		padding: 4px 8px;
		text-decoration: none;
		white-space: nowrap;
	}
	table.reference {
		color: #000030;
		background-color:#ffffff;
		border:1px solid #c3c3c3;
		border-collapse:collapse;
		width:100%;
	}
	table.reference th {
		background-color:#e5eecc;
		border:1px solid #c3c3c3;
		padding:3px;
		vertical-align:top;
	}
	table.reference td {
		border:1px solid #c3c3c3;
		padding:3px;
		vertical-align:top;
	}
	th.title { background-color: #80e090 }
	td.item { color: #444444; background-color: #e8e8e8; }
	td.item a { color: #0a58ca; }
	td.item a:hover { color: fuchsia; }
	td.item a:visited { color: purple; }
	li { line-height: 1.3em; }
	h1, h2, h3, h4 { font-weight: bold; }
	h1 { font-size: 3.8em; color: #c0baaa; margin-bottom: 3px; margin-top: 10px; }
	h1 .small { font-size: 0.4em; }
	h1 a { text-decoration: none; }
	h2 { padding: 12px; font-size: 1.5em; color: #c0baaa; line-height: 1.3em; border: 2px solid #706a6a; margin-top: 40px; margin-bottom: 20px; }
	h3 { text-align: center; color: #c0baaa; }
	h4 { font-size: 1.0em; margin-top: 24px; margin-bottom: 10px; }
	a { color: #c0baaa; }
	.cookie-notification { background: #fffbe4; border-color: #f8f6e6; overflow: hidden; }
	.tagline { font-size: 1.6em; margin-bottom: 30px; margin-top: 30px; font-style: italic; }
	.download { float: right; }
	pre { background: #000; color: #fff; padding: 15px; margin-top: 15px; }
	code { display: inline-block; padding: 3px 3px 4px 1px; color: #ececec; font-family: monospace, monospace; line-height: 10px; font-size: 16px; vertical-align: middle; }
	hr { border: 0; width: 80%; border-bottom: 1px solid #aaa; }
	.kbd {
		display:inline-block;
		padding:3px 5px;
		font-family:monospace, monospace;
		font-size:11px;
		line-height:10px;
		color:#555;
		vertical-align:middle;
		background-color:#fcfcfc;
		border:solid 1px #ccc;
		border-bottom-color:#bbb;
		border-radius:3px;
		box-shadow:inset 0 -1px 0 #bbb;
	}
	.footer { font-size: 0.9em; text-align:center; padding-top: 30px; font-style: italic; }
	.treeView{ -moz-user-select: none; position: relative; }
	.treeView ul { margin: 0 0 0 -1.5em; padding: 0 0 0 1.5em; }
	.treeView li { margin: 0; padding: 0; list-style-position: inside; list-style-image: none; cursor: auto; }
	.treeView li li { padding-left: 1.5em; }
	@media screen and ( max-width: 1002px; ) {
		.hide_on_small_screens { display: none; }
	}
	.carousel-indicators { bottom: -45px; }
	.carousel-indicators li {
		width: 10px;
		height: 10px;
		border-radius: 100%;
	}
</style>
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<div id="cookie-notice" style="display: none;">
  <div id="cookie-statement" class="cookie-notification">
    <div class="text">
      <span><?= _("This page uses Google services, which may serve <u>non-personalised</u> cookies for advertising, analytics and security.");?></span>
      <? echo "<a href=\"https://policies.google.com/technologies/cookies?hl=" . $locale . "\" target=\"_blank\">" ?><?= _("See details");?></a>
      <a href="#" onclick="document.getElementById('cookie-notice').style.display = 'none'; setCookie('display_cookie_notice', 'no', 365);"><?= _("OK");?></a>
    </div>
  </div>
  <div style="height: 15px;"></div>
</div>
<div id="right_column">
<label for="lang_select"><?=_("Change language:");?></label><select name="lang_select" id="lang_select" onchange="self.location='?locale='+this.options[this.selectedIndex].value">
<? foreach($langs as $code => $lang): ?>
  <option dir="ltr" <? if(substr($locale,0,strlen($lang[0])) == $lang[0]) echo "selected=\"selected\"";?> value="<?= $lang[0];?>">
  <?= $lang[1]; ?>
</option>
<? endforeach; ?>
</select>
<div class="hide_on_small_screens">
<? if (substr($locale,0,2) == "en") echo "<a target=\"_blank\" href=\"https://github.com/pbatard/rufus/wiki/Localization#wiki-Translating_the_Rufus_Homepage\">Want your language here?</a>";
  else if (substr($locale,0,2) != "fr") echo "<a target=\"_blank\" href=\"https://github.com/pbatard/rufus/wiki/Localization#wiki-Editing_an_existing_homepage_translation\">" . _("Want to improve this translation?") . "</a>" ?>
&nbsp;<br/>
&nbsp;<br/>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Rufus - Sidebar -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-8924382055379825"
     data-ad-slot="8722233764"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).requestNonPersonalizedAds = 1;
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>
<div id="container">
	<hr style="width:728px;">
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Rufus - Banner -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:728px;height:90px"
	     data-ad-client="ca-pub-8924382055379825"
	     data-ad-slot="7142613500"></ins>
	<script>
	     (adsbygoogle = window.adsbygoogle || []).requestNonPersonalizedAds = 1;
	     (adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	<hr style="width:728px;">
	<h1><img border="0" src="/pics/rufus-128.png" srcset="/pics/rufus-128.png 1x, /pics/rufus-256.png 2x" alt="[rufus icon]"/>
	<a target="_blank" href="https://github.com/pbatard/rufus">Rufus</a></h1>
	<div class="tagline"><center><?= _("Create bootable USB drives the easy way");?></center></div>
	<div id="carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?=$screenshot_duration;?>">
		<div class="carousel-inner">
<? for ($i = 1; $i <= $nb_screenshots; $i++) {
$screenshot_lang = (file_exists("pics/screenshot" . $i . "_" . $short_locale . ".png")) ? $short_locale : "en";
printf("\t\t\t<div class=\"carousel-item%s\">\n", ($i == 1) ? " active" : "");
printf("\t\t\t\t<img src=\"/pics/screenshot%d_" . $screenshot_lang . ".png\" class=\"d-block\" alt=\"Rufus screenshot %d\" style=\"height: %s; margin: auto;\">\n", $i, $i, $screenshot_height);
printf("\t\t\t</div>\n");
} ?>
		</div>
		<div class="carousel-indicators">
<? for ($i = 0; $i < $nb_screenshots; $i++) {
printf("\t\t\t\t<button type=\"button\" data-bs-target=\"#carousel\" data-bs-slide-to=\"%d\" aria-label=\"Slide %d\"%s></button>\n", $i, $i + 1, ($i == 0) ? " class=\"active\" aria-current=\"true\"" : "");
} ?>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
	<p>&nbsp;</p>
	<p><?= _("Rufus is a utility that helps format and create bootable USB flash drives, such as USB keys/pendrives, memory sticks, etc.");?></p>
	<p><?= _("It can be especially useful for cases where:");?></p>
	<ul>
		<li><?= _("you need to create USB installation media from bootable ISOs (Windows, Linux, UEFI, etc.)");?></li>
		<li><?= _("you need to work on a system that doesn't have an OS installed");?></li>
		<li><?= _("you need to flash a BIOS or other firmware from DOS");?></li>
		<li><?= _("you want to run a low-level utility");?></li>
	</ul>
	<p><?= _("Despite its small size, Rufus provides everything you need!");?></p>
	<p><?= _("A non exhaustive list of Rufus supported ISOs is also provided at the bottom of this page.");?> <a href="#ref1"><sup>(1)</sup></a></p>
	<? if (substr($locale,0,2) == $lang1[0] || substr($locale,0,2) == $lang2[0] || ($lang1[0] != '' && substr($locale,0,2) == "en")) echo "<p dir=\"ltr\" align=\"top\"><img style=\"position:relative\" src=\"/pics/flags/" . $lang1[2] . ".png\" srcset=\"/pics/flags/" . $lang1[2] . ".png 1x, /pics/flags/" . $lang1[2] . "-64px.png 2x\" alt=\"\"/>&nbsp;&nbsp;<b><font color=\"#dd8800\"><u>CALLING ON NEW TRANSLATORS!</u></font></b>" . (($lang2[0] != '') ? "&nbsp;&nbsp;<img style=\"position:relative\" src=\"/pics/flags/" . $lang2[2] . ".png\" srcset=\"/pics/flags/" . $lang2[2] . ".png 1x, /pics/flags/" . $lang2[2] . "-64px.png 2x\" alt=\"\"/>" : "") . "</p>
	<p dir=\"ltr\">The Rufus application would like to request <b>your</b> help with its translations, as the project is currently looking for volunteers that would be kind enough to <a target=\"_blank\" href=\"https://github.com/pbatard/rufus/blob/master/res/loc/ChangeLog.txt#L8-L83\">update the localization</a> for <b><i>" . $lang1[1] . "</i></b>" . (($lang2[0] != '') ? " and <b><i>" . $lang2[1] . "</i></b>" : "") . ".</p>
	<p dir=\"ltr\">If you think you are up to the task, please have a look <a target=\"_blank\" href=\"https://github.com/pbatard/rufus/wiki/Localization#editing-an-existing-translation\">here</a>.</p>";?>
	<a name="download"></a>
	<h2 style="border: 4px solid #a09a8a;"><span style="font-size: 133%"><?= _("Download");?></span></h2>
		<p><b><?= _("Latest releases:") ;?></b></p>
		<table cellspacing="1" cellpadding="6" border="0">
			<tr>
				<th class="title" width=220><?= _("Link") ;?></th>
				<th class="title" width=100><?= _("Type") ;?></th>
				<th class="title" width=160><?= _("Platform") ;?></th>
				<th class="title" width=100><?= _("Size") ;?></th>
				<th class="title" width=120><?= _("Date") ;?></th>
			</tr>
			<tr>
				<td class="item"><?= "<a href=\"https://github.com/pbatard/rufus/releases/download/v" . $latest_version . "/rufus-" . $latest_version . ".exe\">" . "<code>rufus-" . $latest_version . ".exe</code></a>";?></td>
				<td class="item"><?= _("Standard") ;?></td>
				<td class="item">Windows x64</td>
				<td class="item"><span dir="<?= $dir;?>"><?= "" . $x64_size . " " . _("MB");?></span></td>
				<td class="item"><?= $latest_date;?></td>
			</tr>
			<tr>
				<td class="item"><?= "<a href=\"https://github.com/pbatard/rufus/releases/download/v" . $latest_version . "/rufus-" . $latest_version . "p.exe\">" . "<code>rufus-" . $latest_version . "p.exe</code></a>";?></td>
				<td class="item"><?= _("Portable") ;?></td>
				<td class="item">Windows x64</td>
				<td class="item"><span dir="<?= $dir;?>"><?= "" . $x64_size . " " . _("MB");?></span></td>
				<td class="item"><?= $latest_date;?></td>
			</tr>
			<tr>
				<td class="item"><?= "<a href=\"https://github.com/pbatard/rufus/releases/download/v" . $latest_version . "/rufus-" . $latest_version . "_x86.exe\">" . "<code>rufus-" . $latest_version . "_x86.exe</code></a>";?></td>
				<td class="item"><?= _("Standard") ;?></td>
				<td class="item">Windows x86</td>
				<td class="item"><span dir="<?= $dir;?>"><?= "" . $x86_size . " " . _("MB");?></span></td>
				<td class="item"><?= $latest_date;?></td>
			</tr>
			<tr>
				<td class="item"><?= "<a href=\"https://github.com/pbatard/rufus/releases/download/v" . $latest_version . "/rufus-" . $latest_version . "_arm64.exe\">" . "<code>rufus-" . $latest_version . "_arm64.exe</code></a>";?></td>
				<td class="item"><?= _("Standard") ;?></td>
				<td class="item">Windows ARM64</td>
				<td class="item"><span dir="<?= $dir;?>"><?= "" . $arm64_size . " " . _("MB");?></span></td>
				<td class="item"><?= $latest_date;?></td>
			</tr>
<? if($beta):?>
			<tr>
				<td class="item"><?= "<a href=\"https://github.com/pbatard/rufus/releases/download/v" . $beta_version . "_BETA/rufus-" . $beta_version . "_BETA.exe\">" . "<code>rufus-" . $beta_version . "_BETA.exe</code></a>";?></td>
				<td class="item"><?= "<a href=\"https://raw.githubusercontent.com/pbatard/rufus/master/ChangeLog.txt\">" .  _("BETA") . "</a>";?></td>
				<td class="item">Windows x64</td>
				<td class="item"><span dir="<?= $dir;?>"><?= "" . $beta_size . " " . _("MB");?></span></td>
				<td class="item"><?= $beta_date;?></td>
			</tr>
<? endif;?>
		</table>&nbsp;
		<p><span style="font-size: 110%"><a href="/downloads/"><?= _("Other versions");?> (GitHub)</a><br/>
		<a target="_blank" href="https://www.fosshub.com/Rufus.html"><?= _("Other versions");?> (FossHub)</a></span></p>
	<h4><?= _("System Requirements:");?></h4>
	<p><?= _("Windows 8 or later.");?> <?= _("Once downloaded, the application is ready to use.");?></p>
	<h4><?= _("Supported Languages:");?></h4>
	<table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td><i>Bahasa Indonesia</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Bahasa Malaysia</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Български</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Čeština</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Dansk</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Deutsch</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Ελληνικά</i></td><td><?=$comma;?>&nbsp;</td>
	</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td><i>English</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Español</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Français</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Hrvatski</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Italiano</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Latviešu</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Lietuvių</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Magyar</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Nederlands</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Norsk</i></td><td><?=$comma;?>&nbsp;</td>
	</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td><i>Polski</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Português</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Português do Brasil</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Русский</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Română</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Slovensky</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Slovenščina</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Srpski</i></td><td><?=$comma;?>&nbsp;</td>
	</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td><i>Suomi</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Svenska</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Tiếng&nbsp;Việt</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Türkçe</i></td><td><?=$comma;?>&nbsp;</td>
		<td><i>Українська</i></td><td><?=$comma;?>&nbsp;</td>
		<td>简体中文</td><td><?=$comma;?>&nbsp;</td>
		<td>正體中文</td><td><?=$comma;?>&nbsp;</td>
		<td>日本語</td><td><?=$comma;?>&nbsp;</td>
		<td>한국어</td><td><?=$comma;?>&nbsp;</td>
		<td>ไทย</td><td><?=$comma;?>&nbsp;</td>
	</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td>עברית</td><td><?=$comma;?>&nbsp;</td>
		<td>العربية</td><td><?=$comma;?>&nbsp;</td>
		<td>پارسی</td><td>.</td>
	</tr></table>
	&nbsp;
	<p><?= _("I will take this opportunity to express my gratitude to the translators who made it possible for Rufus, as well as this webpage, to be translated in various languages. If you find that you can use Rufus in your own language, you should really thank them!");?></p>
	<h2><?= _("Usage");?></h2>
	<p><?= _("Download the executable and run it &ndash; no installation is necessary.");?></p>
	<p><?= _("The executable is digitally signed and the signature should state:");?></p>
	<ul>
		<li><i>"Akeo Consulting"</i> <?= _("(v1.3.0 or later)");?></li>
		<li><i>"Pete Batard - Open Source Developer"</i> <?= _("(v1.2.0 or earlier)");?></li>
	</ul>
	<h4><?= _("Notes on DOS support:");?></h4>
	<p><?= _("If you create a DOS bootable drive and use a non-US keyboard, Rufus will attempt to select a keyboard layout according to the locale of your system.");?></p>
	<h4><?= _("Notes on ISO Support:");?></h4>
	<p><? printf(_("All versions of Rufus since v1.1.0 allow the creation of a bootable USB from an <a target=\"_blank\" %s>ISO image</a> (.iso)."), "href=\"http://en.wikipedia.org/wiki/ISO_image\"");?></p>
	<p><? printf(_("Creating an ISO image from a physical disc or from a set of files is very easy to do however, through the use of a CD burning application, such as the freely available <a target=\"_blank\" %s>InfraRecorder</a> or <a target=\"_blank\" %s>CDBurnerXP</a>."), "href=\"http://infrarecorder.org/\"", "href=\"https://www.fosshub.com/CDBurnerXP.html\"");?></p>
	<a name="FAQ"></a>
	<h2><?= _("Frequently Asked Questions (FAQ)");?></h2>
	<p><? /* You are encouraged to add the translation for " (in English)." after "HERE</a></b>" as the FAQ is only available in English */ printf(_("A Rufus FAQ is available <b><a target=\"_blank\" %s>HERE</a></b>."), "href=\"https://github.com/pbatard/rufus/wiki/FAQ\"");?><br/></p>
	<p><? printf(_("To provide feedback, report a bug or request an enhancement, please use the GitHub <a target=\"_blank\" %s>issue tracker</a>. Or you can <a target=\"_blank\" %s>send an e-mail</a>."), "href=\"https://github.com/pbatard/rufus/issues\"", "href=\"mailto:pete@akeo.ie?subject=Rufus\"");?></p>
	<a name="license"></a>
	<h2><?= _("License")?></h2>
	<p><? printf(_("<a target=\"_blank\" %s>GNU General Public License (GPL) version 3</a> or later."), "href=\"http://www.gnu.org/licenses/gpl.html\"");?><br /><?= _("You are free to distribute, modify or even sell the software, insofar as you respect the GPLv3 license.")?></p>
	<p><? printf(_("Rufus is produced in a 100%% transparent manner, from its <a target=\"_blank\" %s>public source</a>, using a <a target=\"_blank\" %s>MinGW32</a> environment."), "href=\"https://github.com/pbatard/rufus\"", "href=\"http://mingw-w64.org\"");?></p>
	<a name="changelog"></a>
	<h2><?= /* You are encouraged to append the translation for "(in English)" after "Changelog" as it is only available in English */ _("Changelog");?></h2>
	<ul dir="<?= $dir;?>">
		<li><?= $full_version;?><ul dir="<?= $dir;?>">
			<li><span dir="ltr">Add timeouts on enumeration queries that may stall on some systems</span></li>
			<li><span dir="ltr">Restore MS-DOS drive creation through the download of binaries from Microsoft</span></li>
			<li><span dir="ltr">Update the log button icon</span></li>
			<li><span dir="ltr">Fix UEFI:NTFS incompatibility with Windows Dev Kit 2023 platform</span></li>
			<li><span dir="ltr">Fix more GRUB <code>out of range pointer</code> errors with Ubuntu/Fedora when booting in BIOS mode</span></li>
		</ul></li>
<? if($bugfix):?>
		<br />
		<li><?= $prev_version;?><ul dir="<?= $dir;?>">
			<li><span dir="ltr">Fix ISO mode support for Red Hat 8.2+ and derivatives</span></li>
			<li><span dir="ltr">Fix BIOS boot support for Arch derivatives</span></li>
			<li><span dir="ltr">Fix removal of some boot entries for Ubuntu derivatives</span></li>
			<li><span dir="ltr">Fix log not being saved on exit</span></li>
			<li><span dir="ltr">Add Windows 11 <i>"Extended"</i> installation support (Disables TPM/Secure Boot)</span></li>
			<li><span dir="ltr">Add <a target="_blank" href="https://github.com/pbatard/UEFI-Shell/releases">UEFI Shell</a> ISO downloads</span></li>
			<li><span dir="ltr">Add support for Intel NUC card readers</span></li>
			<li><span dir="ltr">Improve Windows 11 support</span></li>
			<li><span dir="ltr">Improve Windows version reporting</span></li>
			<li><span dir="ltr">Speed up clearing of MBR/GPT</span></li>
		</ul></li>
		<br />
<? endif;?>
		<li><b><a target="_blank" href="https://github.com/pbatard/rufus/blob/master/ChangeLog.txt"><?= _("Other versions");?></a></b></li>
	</ul>
	<h2><?= _("Source Code");?></h2>
		<ul><li><?= /* Abbreviation for MegaByte */ "<a target=\"_blank\" href=\"https://github.com/pbatard/rufus/archive/v" . $latest_version . ".zip\">" . $app_name . "</a> <span dir=\"" . $dir . "\">(" . $src_size . " " . _("MB") . ")";?></span></li>
		<li><? printf(_("Alternatively, you can clone the <a target=\"_blank\" %s>git</a> repository using:") . "\n", "href=\"http://git-scm.com\"");?>
		<pre dir="ltr">$ git clone https://github.com/pbatard/rufus</pre></li>
		<li><? printf(_("For more information, see the <a target=\"_blank\" %s>GitHub project</a>."), "href=\"https://github.com/pbatard/rufus\"");?></li></ul>
		<p><?= _("If you are a developer, you are very much encouraged to tinker with Rufus and submit patches.");?></p>
	<a name="donate"></a>
	<h2><?= _("Donations");?></h2>
		<p><?= _("Since I'm getting asked about this on regular basis, there is <b>no</b> donation button on this page.");?></p>
		<p><?= _("The main reason is that I feel that the donation system doesn't actually help software development and worse, can be guilt-inducing for users who choose not to donate.");?></p>
		<p><? if (substr($locale,0,2) == "en") echo "Instead, I think that <span lang=\"fr\"><i>\"<a target=\"_blank\" href=\"https://en.wiktionary.org/wiki/m%C3%A9c%C3%A9nat\">mécénat</a>\"</i></span>; or developer patronage, from <b>companies</b> which benefit most from a healthy <a target=\"_blank\" href=\"http://en.wikipedia.org/wiki/Free_and_open_source_software\">FLOSS</a> ecosystem, is what we should be aiming for. This is because, unless they are backed by a company, developers who want to provide quality Open Source software cannot realistically sustain full time development, no matter how generous their software users are.</p>
		<p>Also, unless you are <a target=\"_blank\" href=\"http://winhelp2002.mvps.org/hosts.htm\">blocking them</a> (hint, hint), you'll notice that there are ads on this page, which I consider sufficient revenue enough.</p>
		<p>Finally the fact that I have the freedom to develop <a target=\"_blank\" href=\"http://en.wikipedia.org/wiki/Free_software\">Free Software</a> in my spare time should indicate that I'm well-off enough, and therefore that you should direct your generosity towards people who need it a lot more than I do. "; printf(_("If you really insist, you can always make a donation to the <a target=\"_blank\" %s>Free Software Foundation</a>, as they are the main reason software like Rufus is possible."), "href=\"http://www.fsf.org/\"");?></p>
		<p><?= _("At any rate, I'll take this opportunity to say <i><u>thank you</u></i> for your continuing support and enthusiasm about this little program: it is much appreciated!");?></p>
		<p><?= _("But please continue to feel free to use Rufus without any guilt about not contributing for it financially &ndash; you should never have to!");?></p>
	<a name="ref1"></a>
	<h2>(1) <?= _("Non exhaustive list of ISOs Rufus is known to work with");?></h2>
	<table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td><a target="_blank" href="https://almalinux.org">AlmaLinux</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://archlinux.org">Arch&nbsp;Linux</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="http://www.nu2.nu/pebuilder">BartPE</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.centos.org">CentOS</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://clonezilla.org/clonezilla-live.php">Clonezilla</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="http://www.damnsmalllinux.org">Damn&nbsp;Small&nbsp;Linux</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.debian.org">Debian</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://elementary.io">Elementary OS</a></td><td><?=$comma;?>&nbsp;</td>
	</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td><a target="_blank" href="https://getfedora.org">Fedora</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.freedos.org">FreeDOS</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://garudalinux.org">Garuda Linux</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.gentoo.org">Gentoo</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://gparted.org">GParted</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.hirensbootcd.org">Hiren's&nbsp;Boot&nbsp;CD</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.kali.org">Kali Linux</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://knoppix.net">Knoppix</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://kolibrios.org">KolibriOS</a></td><td><?=$comma;?>&nbsp;</td>
	</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<!--<td><a target="_blank" href="https://kubuntu.org">Kubuntu</a></td><td><?=$comma;?>&nbsp;</td>-->
		<td><a target="_blank" href="https://linuxmint.com">Linux&nbsp;Mint</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://manjaro.org">Manjaro Linux</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://pogostick.net/~pnh/ntpasswd">NT&nbsp;Password&nbsp;Registry&nbsp;Editor</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.opensuse.org">OpenSUSE</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.raspberrypi.com/software/">Raspberry Pi OS</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.raspbian.org">Raspbian</a></td><td><?=$comma;?>&nbsp;</td>
	</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td><a target="_blank" href="https://reactos.org">ReactOS</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.redhat.com">Red&nbsp;Hat</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.rodsbooks.com/refind">rEFInd</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://rockylinux.org">Rocky Linux</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="http://www.slackware.com">Slackware</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.supergrubdisk.org/category/download/supergrub2diskdownload/super-grub2-disk-stable">Super&nbsp;Grub2&nbsp;Disk</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://tails.boum.org">Tails</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://trinityhome.org">Trinity&nbsp;Rescue&nbsp;Kit</a></td><td><?=$comma;?>&nbsp;</td>
	</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td><a target="_blank" href="https://www.truenas.com/download-truenas-core">TrueNAS CORE</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://ubuntu.com">Ubuntu</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://github.com/pbatard/UEFI-Shell/releases">UEFI Shell</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.ultimatebootcd.com">Ultimate&nbsp;Boot&nbsp;CD</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://docs.microsoft.com/en-us/lifecycle/products/windows-xp">Windows&nbsp;XP&nbsp;<span dir="ltr">(SP2+)</span></a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://docs.microsoft.com/en-us/lifecycle/products/windows-vista">Windows&nbsp;Vista</a></td><td><?=$comma;?>&nbsp;</td>
	</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td><a target="_blank" href="https://docs.microsoft.com/en-us/lifecycle/products/windows-7">Windows&nbsp;7</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.microsoft.com/en-us/software-download/windows8ISO">Windows&nbsp;8/8.1</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.microsoft.com/en-us/software-download/windows10ISO/">Windows&nbsp;10</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.microsoft.com/en-ie/windows-server">Windows&nbsp;Server&nbsp;2019</a></td><td><?=$comma;?>&nbsp;</td>
		<td><a target="_blank" href="https://www.microsoft.com/en-us/software-download/windows11">Windows&nbsp;11</a></td><td><?=$comma;?>&nbsp;</td>
		<td>&hellip;</td>
	</tr></table>
	<div class="footer"><table align="center" dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
		<td>Copyright&nbsp;</td><td>©&nbsp;</td><td>2011-2023&nbsp;</td><td><a target="_blank" href="https://pete.akeo.ie">Pete&nbsp;Batard</a></td></tr></table>
		<? /* Please insert your language and name here.
If you want people to be able to e-mail you directly about this translation, you can insert your name with something like:
<a href="mailto:pete@akeo.ie?Subject=Rufus%20Homepage%20translation">Pete Batard</a> */ $tr = _("English translation by Pete Batard"); if (substr($tr,0,4) != "Engl") echo $tr . "<br/>";?>
		<?= _("USB icon by");?> PC Unleashed<br/>
		<?= _("Hosting by");?> <a target="_blank" href="https://pages.github.com/">GitHub</a>
		</div><? if ($short_locale == "ja") echo "&nbsp; <!-- Heck if I know why Japanese needs this in order to remove scrollbars when using bootstrap -->" ?> 
	</div>
</body>
</html>
