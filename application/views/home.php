<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Ippuku</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<link rel="stylesheet" href="<?php echo site_url('css/supersized.css');?>" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo site_url('css/ippuku.css');?>" type="text/css" media="screen, projection">  
        <!--[if lte IE 8]>
        <link rel="stylesheet" href="<?php echo site_url('css/ippuku-ie.css');?>" type="text/css" media="screen, projection">  
        <![endif]-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo site_url('js/jquery.url.js');?>"></script>
		<script type="text/javascript" src="<?php echo site_url('js/supersized.3.1.3.min.js');?>"></script>
        <!--<script src="http://cdn.jquerytools.org/1.2.5/tiny/jquery.tools.min.js"></script>-->
        <script type="text/javascript" src="<?php echo site_url('js/overlay.js');?>"></script>
        <!--<script type="text/javascript" src="<?php echo site_url('js/overlay.apple.js');?>"></script>-->
        <script type="text/javascript" src="<?php echo site_url('js/toolbox.flashembed.js');?>"></script>
		<script type="text/javascript" src="<?php echo site_url('js/ippuku.js');?>"></script>
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
                <img src="<?php echo site_url('img/flashplayer_100x100.jpg');?>" />
                <h3>Get Adobe Flash Player</h3>
                <p>You must have the latest Flash player installed to see this website correctly. </p>
                <p>You can <a href="http://get.adobe.com/flashplayer/" target="_blank">download it here</a>.</p>
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
		<h3 id="logo" class="content" <?php if ($with_intro === true) { echo 'style="display:none"';}?>><a href="<?php echo site_url('home');?>" alt="Ippuku"><img src="<?php echo site_url('img/ipk-logo-new.png');?>"/></a></h3>
        <div id="navi" class="content">
            <p>
                <a href="<?php echo site_url("hours/index/$lang/");?>" alt="Hours" rel="#overlay" id="hour-<?php echo $lang?>">%%hour%%</a>
            </p>
            <p>
                <a href="<?php echo site_url("reservations/index/$lang/");?>" alt="Reservations" rel="#overlay" id="rsvn-<?php echo $lang?>">%%rsvn%%</a>
            </p>
            <p>
                <a href="<?php echo site_url("directions/index/$lang/");?>" alt="Directions" rel="#overlay" id="dirc-<?php echo $lang?>">%%dirc%%</a>
            </p>
<!--
Comment out until contents of "Menu" and "About" is fixd.
            <p>
                <a href="<?php echo site_url("menus/index/$lang/");?>" alt="Menus" rel="#overlay" id="menu-<?php echo $lang?>">%%menu%%</a>
                <a href="<?php echo site_url("about/index/$lang/");?>" alt="About" rel="#overlay" id="about-<?php echo $lang?>">%%about%%</a>
            </p>
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
			<!--Slide counter-->
            <!--
			<div id="slidecounter">
				<span class="slidenumber"></span>/<span class="totalslides"></span>
			</div>
            -->
			<!--Slide captions displayed here-->
			<!--<div id="slidecaption"></div>-->
			<!--Navigation-->
			<div id="navigation">
				<img id="prevslide" src="<?php echo site_url('img/back_dull.png');?>"/>
                <img id="pauseplay" src="<?php echo site_url('img/pause_dull.png');?>"/>
                <img id="nextslide" src="<?php echo site_url('img/forward_dull.png');?>"/>
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
