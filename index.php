<!DOCTYPE html>
<?
$latest_version = "3.13";
$previous_version = "3.7";
$latest_date = "2020.11.20";
$previous_date = "2019.09.09";
$lang1 = array('', 'Azerbaijani', 'Azerbaijan');
$lang2 = array('', 'Serbian', 'Serbia');
$bugfix = false;
$exe_size = 1.1;
$src_size = 3.5;
$langs = array(
  'en_IE' => array('en', 'English (International)'),
  'sq_AL' => array('sq', 'Albanian (Shqip)'),
  'ar_SA' => array('ar', 'Arabic (العربية)'),
  'hy_AM' => array('hy', 'Armenian (Հայերեն)'),
  'az_AZ' => array('az', 'Azerbaijani (Azərbaycan)'),
  'bn_BD' => array('bn', 'Bangla (বাংলা)'),
  'bs_BA' => array('bs', 'Bosnian (Bosánski)'),
  'bg_BG' => array('bg', 'Bulgarian (Български)'),
  'yue_HK' => array('yue', 'Cantonese [Hong Kong] (香港粵文)'),
  'ca_ES' => array('ca', 'Catalan (Català)'),
  'zh_CN' => array('zh_CN', 'Chinese Simplified (简体中文)'),
  'zh_TW' => array('zh_TW', 'Chinese Traditional (正體中文)'),
  'hr_HR' => array('hr', 'Croatian (Hrvatski)'),
  'cs_CZ' => array('cs', 'Czech (Čeština)'),
  'da_DK' => array('da', 'Danish (Dansk)'),
  'nl_NL' => array('nl', 'Dutch (Nederlands)'),
  'et_EE' => array('et', 'Estonian (eesti keel)'),
  'fi_FI' => array('fi', 'Finnish (Suomi)'),
  'fr_FR' => array('fr', 'French (Français)'),
  'gl_ES' => array('gl', 'Galician (Galego)'),
  'de_DE' => array('de', 'German (Deutsch)'),
  'el_GR' => array('el', 'Greek (Ελληνικά)'),
  'he_IL' => array('he', 'Hebrew (עברית)'),
  'hi_IN' => array('hi', 'Hindi (हिंदी)'),
  'hu_HU' => array('hu', 'Hungarian (Magyar)'),
  'id_ID' => array('id', 'Indonesian (Bahasa Indonesia)'),
  'ga_IE' => array('ga', 'Irish (Gaeilge)'),
  'it_IT' => array('it', 'Italian (Italiano)'),
  'ja_JP' => array('ja', 'Japanese (日本語)'),
  'ko_KR' => array('ko', 'Korean (한국어)'),
  'lv_LV' => array('lv', 'Latvian (Latviešu)'),
  'lt_LT' => array('lt', 'Lithuanian (Lietuvių)'),
  'mk_MK' => array('mk', 'Macedonian (Македонски)'),
  'ms_MY' => array('ms', 'Malay (Bahasa Malaysia)'),
  'nb_NO' => array('nb', 'Norwegian (Norsk)'),
  'or_IN' => array('or', 'Odia (ଓଡ଼ିଆ)'),
  'fa_IR' => array('fa', 'Persian (پارسی)'),
  'pl_PL' => array('pl', 'Polish (Polski)'),
  'pt_BR' => array('pt_BR', 'Portuguese [BR] (Português [BR])'),
  'pt_PT' => array('pt_PT', 'Portuguese [PT] (Português [PT])'),
  'ro_RO' => array('ro', 'Romanian (Română)'),
  'ru_RU' => array('ru', 'Russian (Русский)'),
  'sr_RS' => array('sr', 'Serbian [Latin] (Srpski [Latinica])'),
  'sk_SK' => array('sk', 'Slovak (Slovensky)'),
  'sl_SI' => array('sl', 'Slovenian (Slovenščina)'),
  'es_ES' => array('es', 'Spanish (Español)'),
  'sv_SE' => array('sv', 'Swedish (Svenska)'),
  'th_TH' => array('th', 'Thai (ไทย)'),
  'tr_TR' => array('tr', 'Turkish (Türkçe)'),
  'uk_UA' => array('uk', 'Ukrainian (Українська)'),
  'ur_PK' => array('ur', 'Urdu (اُردُو)'),
  'vi_VN' => array('vi', 'Vietnamese (Tiếng Việt)'),
  'cy_GB' => array('cy', 'Welsh (Cymraeg)'),
);
$locale = "en_IE";
if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"]))
  $locale = locale_accept_from_http($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
if (isSet($_GET["locale"])) {
  $locale = $_GET["locale"];
}
$locale = preg_replace("/[^a-zA-Z_]/", "", substr($locale,0,5));
foreach($langs as $code => $lang) {
  if(substr($locale,0,strlen($lang[0])) == $lang[0]) {
    $locale = $code;
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
<meta name="application-name" content="Rufus"/>
<meta name="msapplication-square70x70logo" content="pics/rufus-72.png"/>
<meta name="msapplication-square150x150logo" content="pics/rufus-150.png"/>
<meta name="msapplication-wide310x150logo" content="pics/rufus-150.png"/>
<meta name="msapplication-square310x310logo" content="pics/rufus-256.png"/>
<meta name="msapplication-TileColor" content="#3f4555"/>
<title>Rufus - <?= _("Create bootable USB drives the easy way");?></title>
<script type="text/javascript">
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-37022602-1', 'auto');
	ga('send', 'pageview');
</script>
<style type="text/css">
	body {
		background-color: #3f4555;
		font-family: Helvetica, Arial, FreeSans, san-serif;
		color: #ffffff;
	}
	#right_column {
		float: <?= $dir=="rtl"?"left":"right";?>;
		margin: 0 auto;
		margin-top: 10px;
		margin-right: 10px;
		width: 230px;
		font-size: 0.8em;
	}
	#container {
		margin: 0 auto;
		width: 730px;
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
	table.reference
	{
	color: #000030;
	background-color:#ffffff;
	border:1px solid #c3c3c3;
	border-collapse:collapse;
	width:100%;
	}
	table.reference th
	{
	background-color:#e5eecc;
	border:1px solid #c3c3c3;
	padding:3px;
	vertical-align:top;
	}
	table.reference td
	{
	border:1px solid #c3c3c3;
	padding:3px;
	vertical-align:top;
	}
	h1 { font-size: 3.8em; color: #c0baaa; margin-bottom: 3px; margin-top: 10px;}
	h1 .small { font-size: 0.4em; }
	h1 a { text-decoration: none }
	h2 { padding: 12px; font-size: 1.5em; color: #c0baaa; line-height: 1.3em; border: 2px solid #706a6a;}
	h3 { text-align: center; color: #c0baaa; }
	a { color: #c0baaa; }
	.tagline { font-size: 1.6em; margin-bottom: 30px; margin-top: 30px; font-style: italic;}
	.download { float: right; }
	pre { background: #000; color: #fff; padding: 15px;}
	code { display:inline-block; padding:3px 3px 4px 1px; color:#ececec; font-family:monospace, monospace; line-height:10px; font-size:16px; vertical-align:middle; }
	hr { border: 0; width: 80%; border-bottom: 1px solid #aaa}
	.kbd{
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
		box-shadow:inset 0 -1px 0 #bbb
	}
	.footer { font-size: 0.9em; text-align:center; padding-top:30px; font-style: italic; }
	.treeView{ -moz-user-select:none; position:relative; }
	.treeView ul{ margin:0 0 0 -1.5em; padding:0 0 0 1.5em; }
	.treeView li{ margin:0; padding:0; list-style-position:inside; list-style-image:none; cursor:auto; }
	.treeView li li{ padding-left:1.5em; }
	@media screen and (max-width: 1002px) {
	  .hide_on_small_screens {
	    display:none;
	  }
	}
</style>
</head>

<body>
<div id="right_column">
<label for="lang_select"><?=_("Change language:");?></label><select name="lang_select" id="lang_select" onchange="self.location='?locale='+this.options[this.selectedIndex].value">
<? foreach($langs as $code => $lang): ?>
  <option dir="ltr" <? if(substr($locale,0,strlen($lang[0])) == $lang[0]) echo "selected=\"selected\"";?> value="<?= $code;?>">
  <?= $lang[1]; ?>
</option>
<? endforeach; ?>
</select>
<div class="hide_on_small_screens">
<? if (substr($locale,0,2) == "en") echo "<a target=\"_blank\" href=\"https://github.com/pbatard/rufus/wiki/Localization#wiki-Translating_the_Rufus_Homepage\">Want your language here?</a>";
  else if (substr($locale,0,2) != "fr") echo "<a target=\"_blank\" href=\"https://github.com/pbatard/rufus/wiki/Localization#wiki-Editing_an_existing_homepage_translation\">" . _("Want to improve this translation?") . "</a>" ?>
&nbsp;<br />
&nbsp;<br />
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Rufus -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-8924382055379825"
     data-ad-slot="8722233764"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>
</div>
<div id="container">
	<hr style="width:728px;">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- Rufus - Downloads -->
	<center><ins class="adsbygoogle"
	     style="display:inline-block;width:728px;height:90px;text-decoration:none"
	     data-ad-client="ca-pub-8924382055379825"
	     data-ad-slot="7142613500"><span dir="ltr"><small>(<?= _("Placeholder for ads &mdash; Just like you, I wish this site could exist without them...");?>)</small></span></ins></center>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	<hr style="width:728px;">
	<h1><img border="0" src="pics/rufus-128.png" srcset="pics/rufus-128.png 1x, pics/rufus-256.png 2x" alt="[rufus icon]"/>
	<a target="_blank" href="https://github.com/pbatard/rufus">Rufus</a></h1>
	<div class="tagline">
		<?= _("Create bootable USB drives the easy way");?>
	</div>
		<? /* This is used display a screenshot of Rufus in your language (if available). Simply replace the "en" with your language (or lang_REGION, such as "pt_BR" or "zh_CN"), and I'll make sure a screenshot of Rufus in that language is displayed then. Or you can leave the string untranslated to have the English version displayed. Please make sure to keep the .png extension. */ printf("<img border=\"0\" src=\"pics/%s\" srcset=\"pics/%s 1x, pics/rufus_en_2x.png 2x\" alt=\"[rufus screenshot]\"/>", _("rufus_en.png"), _("rufus_en.png"));?>
		<p><?= _("Rufus is a utility that helps format and create bootable USB flash drives, such as USB keys/pendrives, memory sticks, etc.");?></p>
		<p><?= _("It can be especially useful for cases where:");?>
			<ul>
				<li><?= _("you need to create USB installation media from bootable ISOs (Windows, Linux, UEFI, etc.)");?></li>
				<li><?= _("you need to work on a system that doesn't have an OS installed");?></li>
				<li><?= _("you need to flash a BIOS or other firmware from DOS");?></li>
				<li><?= _("you want to run a low-level utility");?></li>
			</ul>
		</p>
		<p><?= _("Despite its small size, Rufus provides everything you need!");?></p>
		<p><? printf(_("Oh, and Rufus is <b>fast</b>. For instance it's about twice as fast as <a target=\"_blank\" %s>UNetbootin</a>, <a target=\"_blank\" %s>Universal USB Installer</a> or <a target=\"_blank\" %s>Windows 7 USB download tool</a>, on the creation of a Windows 7 USB installation drive from an ISO. It is also marginally faster on the creation of Linux bootable USB from ISOs."), "href=\"http://unetbootin.sourceforge.net/\"", "href=\"http://www.pendrivelinux.com/universal-usb-installer-easy-as-1-2-3\"", "href=\"https://www.microsoft.com/en-us/download/windows-usb-dvd-download-tool\"");?> <a href="#ref1"><sup>(1)</sup></a><br/>
		<?= _("A non exhaustive list of Rufus supported ISOs is also provided at the bottom of this page.");?> <a href="#ref2"><sup>(2)</sup></a></p>
		<? if (substr($locale,0,2) == $lang1[0] || substr($locale,0,2) == $lang2[0] || ($lang1[0] != '' && substr($locale,0,2) == "en")) echo "<p dir=\"ltr\" align=\"top\"><img style=\"position:relative;top:11px;\" src=\"pics/" . $lang1[2] . ".png\" srcset=\"/pics/" . $lang1[2] . ".png 1x, /pics/" . $lang1[2] . "-64px.png 2x\" alt=\"\"/>&nbsp;&nbsp;<b><font color=\"#dd8800\"><u>CALLING ON NEW TRANSLATORS!</u></font></b>" . (($lang2[0] != '') ? "&nbsp;&nbsp;<img style=\"position:relative;top:11px;\" src=\"pics/" . $lang2[2] . ".png\" srcset=\"pics/" . $lang2[2] . ".png 1x, pics/" . $lang2[2] . "-64px.png 2x\" alt=\"\"/>" : "") . "</p>
		<p dir=\"ltr\">The Rufus application would like to request <b>your</b> help with its translations, as the project is currently looking for volunteers that would be kind enough to <a target=\"_blank\" href=\"https://github.com/pbatard/rufus/blob/master/res/loc/ChangeLog.txt#L8-L70\">update the localization</a> for <b><i>" . $lang1[1] . "</i></b>" . (($lang2[0] != '') ? " and <b><i>" . $lang2[1] . "</i></b>" : "") . ".</p>
		<p dir=\"ltr\">If you think you are up to the task, please have a look <a target=\"_blank\" href=\"https://github.com/pbatard/rufus/wiki/Localization#Editing_an_existing_translation\">here</a>.</p>";?>
		<a name="download"></a>
		<h2 style="border: 4px solid #a09a8a;"><span style="font-size: 133%"><?= _("Download");?></span></h2>
			<p><b><? printf(_("Last updated %s:"), $latest_date);?></b></p>
			<p><ul><li><span style="font-size: 133%"><b><?= /* Abbreviation for MegaByte */ "<a href=\"https://github.com/pbatard/rufus/releases/download/v" . $latest_version . "/rufus-" . $latest_version . ".exe\">" . $app_name . "</a>";?></b></span> <span dir="<?= $dir;?>">(<?= "" . $exe_size . " " . _("MB");?>)</span></li>
			<li><?= "<a href=\"https://github.com/pbatard/rufus/releases/download/v" . $latest_version . "/rufus-" . $latest_version . "p.exe\">" . $app_name . " " . _("Portable") . "</a>";?> <span dir="<?= $dir;?>">(<?= "" . $exe_size . " " . _("MB");?>)</span></li>
			<li><a href="/downloads/"><?= _("Other versions");?> (GitHub)</a></li>
			<li><a target="_blank" href="https://www.fosshub.com/Rufus.html"><?= _("Other versions");?> (FossHub)</a></li>
			</ul></p>
		<h4><?= _("Supported Languages:");?></h4>
		<p><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
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
		</tr></table></p>
		<h4><?= _("System Requirements:");?></h4>
		<p><?= _("Windows 7 or later, 32 or 64 bit doesn't matter. Once downloaded, the application is ready to use.");?></p>
		<p><?= _("I will take this opportunity to express my gratitude to the translators who made it possible for Rufus, as well as this webpage, to be translated in various languages. If you find that you can use Rufus in your own language, you should really thank them!");?></p>
		<h2><?= _("Usage");?></h2>
		<p><?= _("Download the executable and run it &ndash; no installation is necessary.");?></p>
		<p><?= _("The executable is digitally signed and the signature should state:");?>
			<ul><li><i>"Akeo Consulting"</i> <?= _("(v1.3.0 or later)");?></li>
			<li><i>"Pete Batard - Open Source Developer"</i> <?= _("(v1.2.0 or earlier)");?></li></ul></p>
		<h4><?= _("Notes on DOS support:");?></h4>
		<p><? printf(_("If you create a DOS bootable drive and use a non-US keyboard, Rufus will attempt to select a keyboard layout according to the locale of your system. In that case, <a target=\"_blank\" %s>FreeDOS</a>, which is the default selection, is recommended over MS-DOS, as it supports more keyboard layouts."), "href=\"http://www.freedos.org\"");?></p>
		<h4><?= _("Notes on ISO Support:");?></h4>
		<p><? printf(_("All versions of Rufus since v1.1.0 allow the creation of a bootable USB from an <a target=\"_blank\" %s>ISO image</a> (.iso)."), "href=\"http://en.wikipedia.org/wiki/ISO_image\"");?></p>
		<p><? printf(_("Creating an ISO image from a physical disc or from a set of files is very easy to do however, through the use of a CD burning application, such as the freely available <a target=\"_blank\" %s>InfraRecorder</a> or <a target=\"_blank\" %s>CDBurnerXP</a>."), "href=\"http://infrarecorder.org/\"", "href=\"http://cdburnerxp.se/\"");?></p>
		<a name="FAQ"></a>
		<h2><?= _("Frequently Asked Questions (FAQ)");?></h2>
		<p><? /* You are encouraged to add the translation for " (in English)." after "HERE</a></b>" as the FAQ is only available in English */ printf(_("A Rufus FAQ is available <b><a target=\"_blank\" %s>HERE</a></b>."), "href=\"https://github.com/pbatard/rufus/wiki/FAQ\"");?><br/></p>
		<p><? printf(_("To provide feedback, report a bug or request an enhancement, please use the github <a target=\"_blank\" %s>issue tracker</a>. Or you can <a target=\"_blank\" %s>send an e-mail</a>."), "href=\"https://github.com/pbatard/rufus/issues\"", "href=\"mailto:pete@akeo.ie?subject=Rufus\"");?></p>
		<a name="license"></a>
		<h2><?= _("License")?></h2>
		<p><? printf(_("<a target=\"_blank\" %s>GNU General Public License (GPL) version 3</a> or later."), "href=\"http://www.gnu.org/licenses/gpl.html\"");?><br /><?= _("You are free to distribute, modify or even sell the software, insofar as you respect the GPLv3 license.")?></p>
		<p><? printf(_("Rufus is produced in a 100%% transparent manner, from its <a target=\"_blank\" %s>public source</a>, using a <a target=\"_blank\" %s>MinGW32</a> environment."), "href=\"https://github.com/pbatard/rufus\"", "href=\"http://www.mingw.org\"");?></p>
		<a name="changelog"></a>
		<h2><?= /* You are encouraged to append the translation for "(in English)" after "Changelog" as it is only available in English */ _("Changelog");?></h2>
		<ul dir="<?= $dir;?>">
			<li><?= $full_version;?>
				<ul dir="<?= $dir;?>">
					<li><span dir="ltr">Add a cheat mode (<div class="kbd">Alt</div>-<div class="kbd">M</div>) to accept disk images without a Boot Marker</span></li>
					<li><span dir="ltr">Add marquee operation progress to the taskbar icon</span></li>
					<li><span dir="ltr">Add zeroing/image writing progress to the log</span></li>
					<li><span dir="ltr">Switch to using <code>0x55</code> and <code>0xAA</code> instead of <code>0x00</code> and <code>0xFF</code> for low pass badblock check</span></li>
					<li><span dir="ltr">Switch to using fake/manufacturer units when computing the default label</span></li>
					<li><span dir="ltr">Fix overnumerous write retries on error when writing a disk image</span></li>
					<li><span dir="ltr">Work around Windows' abysmal handling of removable drives that contain an ESP</span></li>
					<li><span dir="ltr">Improve mounting/unmounting of volumes</span></li>
					<li><span dir="ltr">Update <a target="_blank" href="https://github.com/pbatard/uefi-ntfs">UEFI:NTFS</a> <a target="_blank" href="https://github.com/pbatard/efifs">file system drivers</a> to version 1.7</span></li>
					<li><span dir="ltr">Other internal fixes and improvements (VDS, error reporting, etc.)</span></li>
				</ul>
			</li>
			<? if($bugfix):?>
			<br />
			<li><?= $prev_version;?>
				<ul dir="<?= $dir;?>">
					<li><span dir="ltr">Fix regression where some ISOs (Debian) would produce a Syslinux error when booting in BIOS mode</span></li>
					<li><span dir="ltr">Fix potential <code>0xC0030057</code> errors when trying to create a persistent partitions on a non-FIXED drive</span></li>
				</ul>
			</li>
			<br />
			<? endif;?>
			<li><b><a target="_blank" href="https://github.com/pbatard/rufus/blob/master/ChangeLog.txt"><?= _("Other versions");?></a></b></li>
		</ul>

		<h2><?= _("Source Code");?></h2>
			<p><ul><li><?= /* Abbreviation for MegaByte */ "<a target=\"_blank\" href=\"https://github.com/pbatard/rufus/archive/v" . $latest_version . ".zip\">" . $app_name . "</a> <span dir=\"" . $dir . "\">(" . $src_size . " " . _("MB") . ")";?></span></li>
			<li><? printf(_("Alternatively, you can clone the <a target=\"_blank\" %s>git</a> repository using:"), "href=\"http://git-scm.com\"");?>
			<pre dir="ltr">$ git clone git://github.com/pbatard/rufus</pre></li>
			<li><? printf(_("For more information, see the <a target=\"_blank\" %s>github project</a>."), "href=\"https://github.com/pbatard/rufus\"");?></li></ul>
			<?= _("If you are a developer, you are very much encouraged to tinker with Rufus and submit patches.");?></p>
		<a name="donate"></a>
		<h2><?= _("Donations");?></h2>
			<p><?= _("Since I'm getting asked about this on regular basis, there is <b>no</b> donation button on this page.");?></p>
			<p><?= _("The main reason is that I feel that the donation system doesn't actually help software development and worse, can be guilt-inducing for users who choose not to donate.");?></p>
			<p><? if (substr($locale,0,2) == "en") echo "Instead, I think that <span lang=\"fr\"><i>\"<a target=\"_blank\" href=\"https://en.wiktionary.org/wiki/m%C3%A9c%C3%A9nat\">mécénat</a>\"</i></span>; or developer patronage, from <b>companies</b> which benefit most from a healthy <a target=\"_blank\" href=\"http://en.wikipedia.org/wiki/Free_and_open_source_software\">FLOSS</a> ecosystem, is what we should be aiming for. This is because, unless they are backed by a company, developers who want to provide quality Open Source software cannot realistically sustain full time development, no matter how generous their software users are.</p>
			<p>Also, unless you are <a target=\"_blank\" href=\"http://winhelp2002.mvps.org/hosts.htm\">blocking them</a> (hint, hint), you'll notice that there are ads on this page, which I consider sufficient revenue enough.</p>
			<p>Finally the fact that I have the freedom to develop <a target=\"_blank\" href=\"http://en.wikipedia.org/wiki/Free_software\">Free Software</a> in my spare time should indicate that I'm well-off enough, and therefore that you should direct your generosity towards people who need it a lot more than I do. "; printf(_("If you really insist, you can always make a donation to the <a target=\"_blank\" %s>Free Software Foundation</a>, as they are the main reason software like Rufus is possible."), "href=\"http://www.fsf.org/\"");?></p>
			<p><?= _("At any rate, I'll take this opportunity to say <i><u>thank you</u></i> for your continuing support and enthusiasm about this little program: it is much appreciated!");?></p>
			<p><?= _("But please continue to feel free to use Rufus without any guilt about not contributing for it financially &ndash; you should never have to!");?></p>
		<a name="ref1">&nbsp;</a>
		<h2>(1) <?= _("Speed comparison between Rufus and other applications");?></h2>
		<p><? printf(_("The following tests were carried out on a Windows 7 x64 Core 2 duo/4 GB RAM platform, with an USB 3.0 controller and a <a target=\"_blank\" %s>16 GB USB 3.0 ADATA S102 flash drive</a>."), "href=\"http://www.adata-group.com/index.php?action=product_feature&cid=1&piid=145&lan=en\"");?></p>
		<p><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr><td>&bull;&nbsp;</td><td>Windows 7 x64</td><td>:&nbsp;</td><td><i>en_windows_7_ultimate_with_sp1_x64_dvd_618240.iso</i></td></tr></table><br/>
		<table class="reference" style="width:70%">
		<tr><td width="80%">Windows 7 USB/DVD Download Tool v1.0.30</td><td>00:08:10</td></tr>
		<tr><td>Universal USB Installer v1.8.7.5</td><td>00:07:10</td></tr>
		<tr><td>UNetbootin v1.1.1.1</td><td>00:06:20</td></tr>
		<tr><td>RMPrepUSB v2.1.638</td><td>00:04:10</td></tr>
		<tr><td>WiNToBootic v1.2</td><td>00:03:35</td></tr>
		<tr><td><b>Rufus v1.1.1</b></td><td><b>00:03:25</b></td></tr>
		</table></p>
		<p><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr><td>&bull;&nbsp;</td><td>Ubuntu 11.10 x86</td><td>:&nbsp;</td><td><i>ubuntu-11.10-desktop-i386.iso</i></td></tr></table><br/>
		<table class="reference" style="width:70%">
		<tr><td width="80%">UNetbootin v1.1.1.1</td><td>00:01:45</td></tr>
		<tr><td>RMPrepUSB v2.1.638</td><td> 00:01:35</td></tr>
		<tr><td>Universal USB Installer v1.8.7.5</td><td>00:01:20</td></tr>
		<tr><td><b>Rufus v1.1.1</b></td><td><b>00:01:15</b></td></tr>
		</table></p>
		<p><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr><td>&bull;&nbsp;</td><td>Slackware 13.37 x86</td><td>:&nbsp;</td><td><i>slackware-13.37-install-dvd.iso</i></td></tr></table><br/>
		<table class="reference" style="width:70%">
		<tr><td width="80%">UNetbootin v1.1.1.1</td><td>01:00:00+</td></tr>
		<tr><td>Universal USB Installer v1.8.7.5</td><td>00:24:35</td></tr>
		<tr><td>RMPrepUSB v2.1.638</td><td>00:22:45</td></tr>
		<tr><td><b>Rufus v1.1.1</b></td><td><b>00:20:15</b></td></tr>
		</table></p>
		<a name="ref2">&nbsp;</a>
		<h2>(2) <?= _("Non exhaustive list of ISOs Rufus is known to work with");?></h2>
		<table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
			<td><a target="_blank" href="http://www.archlinux.org/">Arch&nbsp;Linux</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://archbang.org/">Archbang</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.nu2.nu/pebuilder/">BartPE/pebuilder</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://centos.org">CentOS</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.damnsmalllinux.org/">Damn&nbsp;Small&nbsp;Linux</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://www.debian.org/">Debian</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://fedoraproject.org/">Fedora</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.freedos.org/">FreeDOS</a></td><td><?=$comma;?>&nbsp;</td>
		</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
			<td><a target="_blank" href="http://www.freenas.org/">FreeNAS</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.gentoo.org/">Gentoo</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://gparted.org/">GParted</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.gnewsense.org/">gNewSense</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.hirensbootcd.org/">Hiren's&nbsp;Boot&nbsp;CD</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://reboot.pro/forum/52/">LiveXP</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://knoppix.net/">Knoppix</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://kolibrios.org">KolibriOS</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.kubuntu.org/">Kubuntu</a></td><td><?=$comma;?>&nbsp;</td>
		</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
			<td><a target="_blank" href="http://linuxmint.com/">Linux&nbsp;Mint</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://pogostick.net/~pnh/ntpasswd/">NT&nbsp;Password&nbsp;Registry&nbsp;Editor</a></td><td><?=$comma;?>&nbsp;</td>
			<!-- <td><a target="_blank" href="http://www.opensuse.org/">OpenSUSE</a></td><td><?=$comma;?>&nbsp;</td> -->
			<td><a target="_blank" href="http://partedmagic.com/">Parted&nbsp;Magic</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.partitionwizard.com/partition-wizard-bootable-cd.html">Partition&nbsp;Wizard</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.raspbian.org/">Raspbian</a></td><td><?=$comma;?>&nbsp;</td>
		</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
			<td><a target="_blank" href="http://reactos.org/">ReactOS</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.redhat.com/">Red&nbsp;Hat</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.rodsbooks.com/refind/">rEFInd</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.slackware.com/">Slackware</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.supergrubdisk.org/category/download/supergrub2diskdownload/super-grub2-disk-stable/">Super&nbsp;Grub2&nbsp;Disk</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://tails.boum.org/">Tails</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://trinityhome.org/">Trinity&nbsp;Rescue&nbsp;Kit</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="http://www.ubuntu.com/">Ubuntu</a></td><td><?=$comma;?>&nbsp;</td>
		</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
			<td><a target="_blank" href="http://www.ultimatebootcd.com/">Ultimate&nbsp;Boot&nbsp;CD</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://msdn.microsoft.com/en-us/subscriptions/downloads/default.aspx#searchTerm=&ProductFamilyId=140&Languages=en&FileExtensions=.iso&PageSize=10&PageIndex=0&FileId=0">Windows&nbsp;XP&nbsp;<span dir="ltr">(SP2+)</span></a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://msdn.microsoft.com/en-us/subscriptions/downloads/default.aspx#searchTerm=&ProductFamilyId=146&Languages=en&FileExtensions=.iso&PageSize=10&PageIndex=0&FileId=0">Windows&nbsp;Vista</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://msdn.microsoft.com/en-us/subscriptions/downloads/default.aspx#searchTerm=&ProductFamilyId=351&Languages=en&FileExtensions=.iso&PageSize=10&PageIndex=0&FileId=0">Windows&nbsp;Server&nbsp;2008</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://msdn.microsoft.com/en-us/subscriptions/downloads/default.aspx#searchTerm=&ProductFamilyId=350&Languages=en&FileExtensions=.iso&PageSize=10&PageIndex=0&FileId=0">Windows&nbsp;7</a></td><td><?=$comma;?>&nbsp;</td>
		</tr></table><table dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
			<td><a target="_blank" href="https://msdn.microsoft.com/en-us/subscriptions/downloads/default.aspx#searchTerm=&ProductFamilyId=481&Languages=en&FileExtensions=.iso&PageSize=10&PageIndex=0&FileId=0">Windows&nbsp;8</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://msdn.microsoft.com/en-us/subscriptions/downloads/default.aspx#searchTerm=&ProductFamilyId=524&Languages=en&FileExtensions=.iso&PageSize=10&PageIndex=0&FileId=0">Windows&nbsp;8.1</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://msdn.microsoft.com/en-us/subscriptions/downloads/default.aspx#searchTerm=&ProductFamilyId=483&Languages=en&FileExtensions=.iso&PageSize=10&PageIndex=0&FileId=0">Windows&nbsp;Server&nbsp;2012</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://www.microsoft.com/en-us/software-download/windows10ISO/">Windows&nbsp;10</a></td><td><?=$comma;?>&nbsp;</td>
			<td><a target="_blank" href="https://msdn.microsoft.com/en-us/subscriptions/downloads/default.aspx#searchTerm=&ProductFamilyId=665&Languages=en&FileExtensions=.iso&PageSize=10&PageIndex=0&FileId=0">Windows&nbsp;Server&nbsp;2016</a></td><td><?=$comma;?>&nbsp;</td>

			<td>&hellip;</td>
		</tr></table></p>
		<div class="footer"><table align="center" dir="<?= $dir;?>" cellspacing="0" cellpadding="0" border="0"><tr>
			<td>Copyright&nbsp;</td><td>©&nbsp;</td><td>2011-2020&nbsp;</td><td><a target="_blank" href="https://pete.akeo.ie">Pete&nbsp;Batard</a></td></tr></table>
			<? /* Please insert your language and name here.
If you want people to be able to e-mail you directly about this translation, you can insert your name with something like:
<a href="mailto:pete@akeo.ie?Subject=Rufus%20Homepage%20translation">Pete Batard</a> */ $tr = _("English translation by Pete Batard"); if (substr($tr,0,4) != "Engl") echo $tr . "<br/>";?>
			<?= _("USB icon by");?> PC Unleashed<br/>
			<?= _("Hosting by");?> <a target="_blank" href="https://pages.github.com/">GitHub</a>
			</div>
		</div>
	</div>
</body>
</html>
