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

/**
 * lrGetMime(filename)
 *
 * Attempts to guess the MIME type of a file from its extension. This is only
 * used to select icons and identify plain text files.
 */
function lrGetMime($filename) {
	$mime_types = array(
		// MS Word Document
		"dot" => "application/msword",
		"doc" => "application/msword",
		"docx" => "application/msword",
		// Acrobat PDF
		"pdf" => "application/pdf",
		// Open GPG Key
		"key" => "application/pgp-keys",
		// RSS+XML
		"rss" => "application/rss+xml",
		// MS Excel Spreadsheet
		"xls" => "application/vnd.ms-excel",
		"xlb" => "application/vnd.ms-excel",
		"xlt" => "application/vnd.ms-excel",
		"xlsx" => "application/vnd.ms-excel",
		// MS Powerpoint Presentation
		"ppt" => "application/vnd.ms-powerpoint",
		"pps" => "application/vnd.ms-powerpoint",
		// Open Document
		"odf" => "application/vnd.oasis.opendocument.formula",
		"odt" => "application/vnd.oasis.opendocument.text.png",
		"odp" => "application/vnd.oasis.opendocument.presentation",
		"ods" => "application/vnd.oasis.opendocument.spreadsheet",
		// Scribus
		"sla" => "application/vnd.scribus",
		// 7zip Archive
		"7z" => "application/x-7z-compressed",
		// ACE Archive
		"ace" => "application/x-ace",
		// Generic Archives
		"zoo" => "application/x-archive",
		"ar" => "application/x-archive",
		"arj" => "application/x-archive",
		"lha" => "application/x-archive",
		"cab" => "application/x-archive",
		// BitTorrent
		"torrent" => "application/x-bittorrent",
		// CD Images
		"nrg" => "application/x-cd-image",
		"ccd" => "application/x-cd-image",
		"mdf" => "application/x-cd-image",
		"cdi" => "application/x-cd-image",
		// CD CUE Sheet
		"cue" => "application/x-cue",
		// ELF Executable
		"elf" => "application/x-executable",
		// Shockwave Flash
		"swf" => "application/x-flash-video",
		"swfl" => "application/x-flash-video",
		// Glade
		"glade" => "application/x-glade",
		// Gzip
		"gz" => "application/x-gzip",
		"gzip" => "application/x-gzip",
		"tgz" => "application/x-gtar-compressed",
		// Java Archive
		"jar" => "application/java-archive",
		// MS DOS Program
		"com" => "application/x-msdos-program",
		"exe" => "application/x-msdos-program",
		"bat" => "application/x-msdos-program",
		"dll" => "application/x-msdos-program",
		"msi" => "application/x-msdos-program",
		// PHP Script
		"php" => "application/x-httpd-php",
		"pht" => "application/x-httpd-php",
		"phtml" => "application/x-httpd-php",
		"phps" => "application/x-httpd-php",
		"php3" => "application/x-httpd-php",
		"php4" => "application/x-httpd-php",
		"php5" => "application/x-httpd-php",
		// RAR Archive
		"rar" => "application/rar",
		// Ruby Script
		"rb" => "application/x-ruby",
		// MSBuild Solution
		"sln" => "application/x-sln",
		// Tarball
		"tar" => "application/x-tar",
		// Theme
		"theme" => "application/x-theme",
		// ZIP Archive
		"zip" => "application/zip",
		// Audio Generic
		"nsf" => "audio/x-generic",
		"nsfe" => "audio/x-generic",
		"gbs" => "audio/x-generic",
		"spc" => "audio/x-generic",
		"au" => "audio/x-generic",
		"psf" => "audio/x-generic",
		"psf2" => "audio/x-generic",
		"ssf" => "audio/x-generic",
		"gsf" => "audio/x-generic",
		"usf" => "audio/x-generic",
		"mod" => "audio/x-generic",
		"s3m" => "audio/x-generic",
		"it" => "audio/x-generic",
		"ay" => "audio/x-generic",
		"hes" => "audio/x-generic",
		"kss" => "audio/x-generic",
		"mdx" => "audio/x-generic",
		"s98" => "audio/x-generic",
		"sid" => "audio/x-generic",
		"vgm" => "audio/x-generic",
		"vgz" => "audio/x-generic",
		"ym" => "audio/x-generic",
		"adx" => "audio/x-generic",
		"adp" => "audio/x-generic",
		"dsp" => "audio/x-generic",
		"stm" => "audio/x-generic",
		"xm" => "audio/x-generic",
		"gym" => "audio/x-generic",
		"mid" => "audio/x-generic",
		"qsf" => "audio/x-generic",
		"mus" => "audio/x-generic",
		// MP3 Playlist
		"m3u" => "audio/x-mp3-playlist",
		// MPEG Audio
		"mpga" => "audio/x-mpeg",
		"mpega" => "audio/x-mpeg",
		"mp2" => "audio/x-mpeg",
		"mp3" => "audio/x-mpeg",
		"m4a" => "audio/x-mpeg",
		// Windows Media Audio
		"wma" => "audio/x-ms-wma",
		// Ogg Vorbis
		"oga" => "audio/ogg",
		"ogg" => "audio/ogg",
		"spx" => "audio/ogg",
		// Microsoft Wave
		"wav" => "audio/x-wav",
		// Debian Package
		"deb" => "application/x-debian-package",
		"udeb" => "application/x-debian-package",
		// Fonts
		"fon" => "font/x-font",
		"ttf" => "font/x-font",
		"otf" => "font/x-font",
		"woff" => "font/x-font",
		"eot" => "font/x-font",
		"pfa" => "font/x-font",
		"pfb" => "font/x-font",
		"pcf" => "font/x-font",
		// Microsoft Bitmap
		"bmp" => "image/x-ms-bmp",
		// GIF Image
		"gif" => "image/gif",
		// JPEG Image
		"jpeg" => "image/jpeg",
		"jpg" => "image/jpeg",
		"jpe" => "image/jpeg",
		// PNG Image
		"png" => "image/png",
		// TIFF Image
		"tiff" => "image/tiff",
		"tif" => "image/tiff",
		// PostScript Images
		"ps" => "application/postscript",
		"ai" => "application/postscript",
		"eps" => "application/postscript",
		"epsi" => "application/postscript",
		"epsf" => "application/postscript",
		"eps2" => "application/postscript",
		"eps3" => "application/postscript",
		// Generic Images
		"pcx" => "image/x-generic",
		"tga" => "image/x-generic",
		"psp" => "image/x-generic",
		"svg" => "image/x-generic",
		"svgz" => "image/x-generic",
		// Windows Icon
		"ico" => "image/x-icon",
		// Photoshop Image
		"psd" => "image/x-photoshop",
		// Gimp XCF Image
		"xcf" => "application/x-xcf",
		// Floppy Disk Images
		"xdf" => "application/x-disk-image",
		"d88" => "application/x-disk-image",
		"fdi" => "application/x-disk-image",
		"fdd" => "application/x-disk-image",
		"hdm" => "application/x-disk-image",
		"dup" => "application/x-disk-image",
		"d98" => "application/x-disk-image",
		"dsk" => "application/x-disk-image",
		"2hd" => "application/x-disk-image",
		// Hard Disk Images
		"hdi" => "application/x-hd-image",
		"img" => "application/x-hd-image",
		"thd" => "application/x-hd-image",
		"nhd" => "application/x-hd-image",
		// ROM Dumps
		"sfc" => "application/x-rom-image",
		"smc" => "application/x-rom-image",
		"nes" => "application/x-rom-image",
		"pce" => "application/x-rom-image",
		"gb" => "application/x-rom-image",
		"gbc" => "application/x-rom-image",
		"gba" => "application/x-rom-image",
		"gen" => "application/x-rom-image",
		"ngp" => "application/x-rom-image",
		"sms" => "application/x-rom-image",
		"gg" => "application/x-rom-image",
		"ws" => "application/x-rom-image",
		"wsc" => "application/x-rom-image",
		"z64" => "application/x-rom-image",
		"n64" => "application/x-rom-image",
		"a26" => "application/x-rom-image",
		"a78" => "application/x-rom-image",
		"lnx" => "application/x-rom-image",
		// Emails
		"eml" => "message/rfc822",
		// Opera Files
		"oex" => "opera/extension",
		"ua" => "opera/unite-application",
		"wgt" => "opera/widget",
		// RedHat Package
		"rpm" => "application/x-redhat-package-manager",
		// Cascading Stylesheet
		"css" => "text/css",
		// HTML Text
		"html" => "text/html",
		"htm" => "text/html",
		"shtml" => "text/html",
		// Plain Text
		"asc" => "text/plain",
		"txt" => "text/plain",
		"text" => "text/plain",
		"pot" => "text/plain",
		"brf" => "text/plain",
		// Rich Text
		"rtx" => "text/richtext",
		"rtf" => "text/richtext",
		// Backup Text
		"bak" => "text/x-bak",
		"old" => "text/x-bak",
		"~" => "text/x-bak",
		// BibTex
		"bib" => "text/x-bibtex",
		// Change Log
		"log" => "text/x-changelog",
		// C++ Headers
		"h++" => "text/x-c++hdr",
		"hpp" => "text/x-c++hdr",
		"hxx" => "text/x-c++hdr",
		"hh" => "text/x-c++hdr",
		// C Headers
		"h" => "text/x-chdr",
		// C++ Source
		"c++" => "text/x-c++src",
		"cpp" => "text/x-c++src",
		"cxx" => "text/x-c++src",
		"cc" => "text/x-c++src",
		// C Source
		"c" => "text/x-csrc",
		// XHTML Markup
		"xhtml" => "text/xhtml+xml",
		"xht" => "text/xhtml+xml",
		// Java Source
		"java" => "text/x-java",
		// JavaScript Source
		"js" => "application/javascript",
		// XML Data
		"xml" => "application/xml",
		"xsl" => "application/xml",
		"xsd" => "application/xml",
		// Python Source
		"py" => "text/x-python",
		// Shell Scripts
		"sh" => "text/x-script",
		"csh" => "text/x-script",
		"ksh" => "text/x-script",
		// Generic Source Code
		"asm" => "text/x-source",
		"ino" => "text/x-source",
		"f77" => "text/x-source",
		"f90" => "text/x-source",
		"s" => "text/x-source",
		"pas" => "text/x-source",
		"tcl" => "text/x-source",
		"asp" => "text/x-source",
		"patch" => "text/x-source",
		"el" => "text/x-source",
		"lsp" => "text/x-source",
		"pl" => "text/x-source",
		// SQL Data
		"sql" => "text/x-sql",
		// LaTeX
		"tex" => "text/x-tex",
		"ltx" => "text/x-tex",
		"sty" => "text/x-tex",
		"cls" => "text/x-tex",
		// VCard
		"vcf" => "text/x-vcard",
		// VCalendar
		"vcs" => "text/x-vcalendar",
		// Generic Video Formats
		"avi" => "video/x-generic",
		"wmv" => "video/x-generic",
		"movie" => "video/x-generic",
		"mkv" => "video/x-generic",
		"asf" => "video/x-generic",
		"asx" => "video/x-generic",
		"flv" => "video/x-generic",
		"ogv" => "video/x-generic",
		"qt" => "video/x-generic",
		"mov" => "video/x-generic",
		"mp4" => "video/x-generic",
		"mpeg" => "video/x-generic",
		"mpg" => "video/x-generic",
		"mpe" => "video/x-generic",
		"dv" => "video/x-generic",
		"3gp" => "video/x-generic",
		"url" => "application/x-mswinurl",
	);

	$ext = lrFileExt($filename);

	if (array_key_exists($ext, $mime_types))
		return($mime_types[$ext]);
	elseif (lrCheckText($filename)) {
		global $finfo;
		return($finfo->file($filename));
	}
	else
		return("application/octet-stream");
}

?>
