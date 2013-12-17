<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
		<meta name="description" content="Description">
		<link rel="shortcut icon" href="<?php echo LR_SYSURL; ?>/favicon.ico">
		<link rel="stylesheet" href="<?php echo LR_SYSURL . "/skins/" . LR_SKIN; ?>/style.css" type="text/css" media="all">
		<link rel="stylesheet" href="<?php echo LR_SYSURL;?>/prism/prism-light.css" type="text/css" media="all">
		<title><?php global $title; echo $title; ?></title>
	</head>
	<body>
		<script src="<?php echo LR_SYSURL; ?>/prism/prism-light.js" type="text/javascript"></script>
		<div id="wrapper">
			<div id="social">
<?php
global $lrSocial;
if($lrSocial["facebook"] != null) { ?>
				<a href="https://www.facebook.com/<?php echo $lrSocial["facebook"]; ?>/"><img src="<?php echo LR_SYSURL; ?>/img/24px/facebook.png" alt="[facebook]" width="24" height="24"></a>
<?php }
if($lrSocial["gplus"] != null) { ?>
				<a href="<?php echo $lrSocial["gplus"]; ?>"><img src="<?php echo LR_SYSURL; ?>/img/24px/googleplus.png" alt="[google+]" width="24" height="24"></a>
<?php }
if($lrSocial["lastfm"] != null) { ?>
				<a href="https://www.last.fm/user/<?php echo $lrSocial["lastfm"]; ?>/"><img src="<?php echo LR_SYSURL; ?>/img/24px/lastfm.png" alt="[last.fm]" width="24" height="24"></a>
<?php }
if($lrSocial["skype"] != null) { ?>
				<a href="skype:<?php echo $lrSocial["skype"]; ?>"><img src="<?php echo LR_SYSURL; ?>/img/24px/skype.png" alt="[skype]" width="24" height="24"></a>
<?php }
if($lrSocial["twitter"] != null) { ?>
				<a href="https://twitter.com/<?php echo $lrSocial["twitter"]; ?>/"><img src="<?php echo LR_SYSURL; ?>/img/24px/twitter.png" alt="[twitter]" width="24" height="24"></a>
<?php } ?>
			</div>
