<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>%%html_title%%</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta name="description" content="%%meta_description%%" />
		<meta name="keywords" content="Japanese, Izakaya, Yakitori, Shochu, Berkeley, 焼き鳥, 焼鳥, 焼酎, 居酒屋, バークレー" />
        <meta name="robots" content="index, nofollow, noodp">
        <meta name="google" content="notranslate" />
        <link rel="shortcut icon" href="<?php echo site_url('img/favicon.ico');?>">
		<link rel="stylesheet" href="<?php echo site_url('css/supersized.css');?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo site_url('css/ippuku-v5.css');?>" type="text/css" media="screen, projection">
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo site_url('css/ippuku-ie.css');?>" type="text/css" media="screen, projection">
        <![endif]-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo site_url('js/jquery.url.js');?>"></script>
		<script type="text/javascript" src="<?php echo site_url('js/supersized.3.2.7.min.js');?>"></script>
        <!--<script src="http://cdn.jquerytools.org/1.2.5/tiny/jquery.tools.min.js"></script>-->
        <script type="text/javascript" src="<?php echo site_url('js/overlay.js');?>"></script>
        <!--<script type="text/javascript" src="<?php echo site_url('js/overlay.apple.js');?>"></script>-->
        <script type="text/javascript" src="<?php echo site_url('js/toolbox.flashembed.js');?>"></script>
		<script type="text/javascript" src="<?php echo site_url('js/ippuku-v7.js');?>"></script>
        <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-23614931-1']);
          _gaq.push(['_trackPageview']);
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
        <script>
            var _prum = [['id', '53aa0804abe53db55ae1eb67'],
                         ['mark', 'firstbyte', (new Date()).getTime()]];
            (function() {
                var s = document.getElementsByTagName('script')[0]
                  , p = document.createElement('script');
                p.async = 'async';
                p.src = '//rum-static.pingdom.net/prum.min.js';
                s.parentNode.insertBefore(p, s);
            })();
        </script>
	</head>
<body>
    <noscript>
        <div class="error-msg">Please turn on Javascript on your web browser to see this website correctly.</div>
    </noscript>
<?php
if ($with_intro === true)
{
?>
    <!-- flash movie layer-->
    <div id="flash-wrap">
        <div id="flash">
            <div id="noflash-msg">
                <img src="<?php echo site_url('img/flashplayer_100x100.jpg');?>" alt="Flash player"/>
                <h3>Get Adobe Flash Player</h3>
                <p>You must have the latest Flash player installed to see this website correctly. </p>
                <p>You can <a href="http://get.adobe.com/flashplayer/" alt="dowonlod Flash player" target="_blank">download it here</a>.</p>
            </div>
        </div>
        <p><a href="<?php echo site_url('home');?>" id="enter" alt="Enter Ippuku">Enter Ippuku</a></p>
    </div>
<?php
}
?>
<?php
if ((isset($this->config) AND $this->config->item("dev_mode")))
{
?>
    <div id="dev-info" class="content">
        <span>SERVER IP: <?php echo $_SERVER['SERVER_ADDR']; ?></span>
    </div>
<?php
}
?>
		<h1 id="logo" class="content" <?php if ($with_intro === true) { echo 'style="display:none"';}?>><a href="<?php echo site_url('home');?>" alt="Ippuku"><img src="<?php echo site_url('img/ipk-logo-new.png');?>" alt="Ippuku logo"/></a></h1>
        <div id="navi" class="content">
        <img src="/img/new026_02.gif" id="new-<?php echo $lang?>" alt="%%new%%">
            <h2>
                <a href="<?php echo site_url("tori_hours/index/$lang/");?>" alt="Hours" rel="#overlay" id="tori_hour-<?php echo $lang?>">%%tori_hour%%</a>
            </h2>
            <h2>
                <a href="<?php echo site_url("soba_hours/index/$lang/");?>" alt="Hours" rel="#overlay" id="soba_hour-<?php echo $lang?>">%%soba_hour%%</a>
            </h2>
            <h2>
                <a href="<?php echo site_url("reservations/index/$lang/");?>" alt="Reservations" rel="#overlay" id="rsvn-<?php echo $lang?>">%%rsvn%%</a>
            </h2>
            <h2>
                <a href="<?php echo site_url("directions/index/$lang/");?>" alt="Directions" rel="#overlay" id="dirc-<?php echo $lang?>">%%dirc%%</a>
            </h2>
<!--
Comment out until contents of "Menu" and "About" contents is fixd.
            <h2>
                <a href="<?php echo site_url("menus/index/$lang/");?>" alt="Menus" rel="#overlay" id="menu-<?php echo $lang?>">%%menu%%</a>
                <a href="<?php echo site_url("about/index/$lang/");?>" alt="About" rel="#overlay" id="about-<?php echo $lang?>">%%about%%</a>
            </h2>
-->
        </div>
	</div>
    <div id="lang" class="content">
        <a href="<?php echo site_url('home/index/ja/');?>" alt="Japanese" id="ja" class="<?php if ($lang == 'ja') echo 'active'; ?>">日本語</a>
        <a href="<?php echo site_url('home/index/en/');?>"alt="English" id="en" class="<?php if ($lang == 'en') echo 'active'; ?>">English</a>
    </div>

	<!--Thumbnail Navigation-->
    <div id="prevthumb"></div> <div id="nextthumb"></div>

	<!--Control Bar-->
	<div id="controls-wrapper">
		<div id="controls">
			<div id="navigation" class="content">
                <a id="prevslide"></a>
                <a id="pauseplay" class="play"></a>
                <a id="nextslide"></a>
			</div>
		</div>
	</div>

    <!-- overlayed element -->
    <div id="overlay" class="content">
        <!-- the external content is loaded inside this tag -->
        <div id="wrap"></div>
    </div>
</body>
</html>
