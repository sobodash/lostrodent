<?php
/**
 *
 * Version:   2.0
 * Author:    Derrick Sobodash <derrick@sobodash.com>
 * Copyright: (c) 2011, 2012, 2013 Derrick Sobodash
 * Web site:  https://github.com/sobodash/lostrodent/
 * License:   BSD License <http://opensource.org/licenses/bsd-license.php>
 *
 */

// Language
define("LR_LANG", "en");

// URL of the top directory
define("LR_BASEURL", "http://127.0.0.1");

// Web address of Lost Rodent install
define("LR_SYSURL", "http://127.0.0.1/lostrodent");

// Path of the top directory
define("LR_BASEDIR", "/var/www");

// Title of the directory
define("LR_TITLE", "Demo Directory");

// Skin
define("LR_SKIN", "classic");

// Index headers in order of preference
$lrIndex = array(
	"README.md", // Markdown file like GitHub
	"README",    // Plain text
	".note");    // Fallback for 1.0

// System files to block from index
// Files beginning with . are hidden by default (.htaccess/.htpasswd)
$lrBlacklist = array(
	"README.md",
        "index.php",
        "favicon.ico",
        "favicon.png",
        "apple-touch-icon.png",
        "cgi-bin",
	"lostrodent"
);

// Social links
// (Only Google+ and RenRen need a full URL; all others are username only)
$lrSocial = array(
	// Facebook Username
	// http://www.facebook.com/YOURUSERNAME/
	"facebook"   => "YOURUSERNAME",
	// GitHub Username
	// https://github.com/YOURUSERNAME/
	"github"     => "YOURUSERNAME",
	// Reddit Handle
	// http://www.reddit.com/user/YOURUSERNAME/
	"reddit"     => "YOURUSERNAME",
	// Google+ Profile URL
	// https://plus.google.com/u/0/23049203947022
	"gplus"      => "https://plus.google.com/u/0/23049203947022",
	// LinkedIn Username
	// http://www.linkedin.com/in/YOURUSERNAME/
	"linkedin"   => "YOURUSERNAME",
	// RenRen Profile URL
	// http://www.renren.com/profile.do?id=12938120983
	"renren"     => "http://www.renren.com/profile.do?id=12938120983",
	// Skype Account
	"skype"      => "YOURACCOUNT",
	// Tumblr Username
	// http://YOURUSERNAME.tumblr.com/
	"tumblr"     => "YOURUSERNAME",
	// Twitter Username
	// https://twitter.com/YOURUSERNAME/
	"twitter"    => "YOURUSERNAME",
	// Weibo Username
	// http://weibo.com/YOURUSERNAME/
	"weibo"      => "YOURUSERNAME",
	// Pinterest Username
	// https://www.pinterest.com/YOURUSERNAME/
	"pinterest"  => "YOURUSERNAME",
	// Last.fm Username
	// http://www.last.fm/user/YOURUSERNAME/
	"lastfm"     => "YOURUSERNAME",
	// QQ Account
	"qq"         => "YOURUSERNAME",
	// SoundCloud Username
	// http://soundcloud.com/YOURUSERNAME/
	"soundcloud" => "YOURUSERNAME",
	// Behance Username
	// http://www.behance.net/YOURUSERNAME/
	"behance"    => "YOURUSERNAME",
	// E-mail Address
	"email"      => "a@a.com"
);

?>
