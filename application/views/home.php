<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Ippuku</title>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<link rel="stylesheet" href="<?php echo site_url('css/supersized.css');?>" type="text/css" media="screen" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo site_url('js/jquery.url.js');?>"></script>
		<script type="text/javascript" src="<?php echo site_url('js/supersized.3.1.3.min.js');?>"></script>
        <!--<script src="http://cdn.jquerytools.org/1.2.5/tiny/jquery.tools.min.js"></script>-->
        <script type="text/javascript" src="<?php echo site_url('js/overlay.js');?>"></script>
        <script type="text/javascript" src="<?php echo site_url('js/overlay.apple.js');?>"></script>
		<script type="text/javascript" src="<?php echo site_url('js/ippuku.js');?>"></script>
        <link rel="stylesheet" href="<?php echo site_url('css/ippuku.css');?>" type="text/css" media="screen, projection">  
        <!--[if IE]>
        <link rel="stylesheet" href="<?php echo site_url('css/ippuku-ie.css');?>" type="text/css" media="screen, projection">  
        <![endif]-->
	</head>
<body>		
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
	<div id="logo-navi" class="content">
		<h3><img src="<?php echo site_url('img/ipk-logo.png');?>"/></h3>
		<p class="navi">
			<a href="<?php echo site_url('hours/index/en/');?>" alt="Hours" rel="#overlay" id="hour">%%hour%%</a>
			<a href="<?php echo site_url('directions/index/en/');?>" alt="Directions" rel="#overlay" id="dirc">%%dirc%%</a>
        <p>
        <p class="navi">
			<a href="<?php echo site_url('menus/index/en/');?>" alt="Menus" rel="#overlay" id="menu">%%menu%%</a>
			<a href="<?php echo site_url('reservations/index/en/');?>" alt="Reservations" rel="#overlay" id="rsvn">%%rsvn%%</a>
        <p>
        <p class="navi">
            <a href="<?php echo site_url('about/index/en/');?>" alt="About" rel="#overlay" id="about">%%about%%</a>
		</p>
	</div>
    <div id="lang" class="content">
        <a href="<?php echo site_url('home/index/ja/');?>" alt="Japanese">日本語</a>
        <a href="<?php echo site_url('home/index/en/');?>"alt="English" class="active">English</a>
    </div>

	<!--Thumbnail Navigation-->
    <div id="prevthumb"></div> <div id="nextthumb"></div>
	
	<!--Control Bar-->
	<div id="controls-wrapper">
		<div id="controls">
			<!--Slide counter-->
			<div id="slidecounter">
				<span class="slidenumber"></span>/<span class="totalslides"></span>
			</div>
			<!--Slide captions displayed here-->
			<div id="slidecaption"></div>
			<!--Navigation-->
			<div id="navigation">
				<img id="prevslide" src="<?php echo site_url('img/back_dull.png');?>"/><img id="pauseplay" src="<?php echo site_url('img/pause_dull.png');?>"/><img id="nextslide" src="<?php echo site_url('img/forward_dull.png');?>"/>
			</div>
			<!--Logo in bar-->
			<!--<a href="" class="stamp"><img src=""/></a>-->
		</div>
	</div>

    <!-- overlayed element -->
    <div id="overlay" class="content">
        <!-- the external content is loaded inside this tag -->
        <div id="wrap"></div>
    </div>
</body>
</html>
