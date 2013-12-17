<?php
/**
 *
 * The Lost Rodent
 *
 * File viewer module
 *
 * Version:   2.0
 * Author:    Derrick Sobodash <derrick@sobodash.com>
 * Copyright: (c) 2011, 2012, 2013 Derrick Sobodash
 * Web site:  https://github.com/sobodash/lostrodent/
 * License:   BSD License <http://opensource.org/licenses/bsd-license.php>
 *
 */

include_once("syntax.php");

$filename = LR_BASEDIR . LR_FILE;
$ext = lrFileExt($filename);
$syntax = lrGetSyntax($filename);
$textflag = lrCheckText($filename);

if($ext == "md")
	$header = trim(lrMarkdown($filename));
else if($syntax != null)
	$header = "<pre" . (($syntax == "language-none") ? "" : " class=\"line-numbers\"") . "><code class=\"$syntax\">" . trim(str_replace("\t", "  ", file_get_contents($filename))) . "</code></pre>";
else if($textflag === true)
	$header = "<pre>\n" . rtrim(str_replace("\t", "  ", file_get_contents($filename))) . "\n</pre>\n";
else if(in_array($ext, array("jpg", "jpe", "jpeg"))) {
	list($width, $height, $type, $attr) = getimagesize($filename);
	$header = "\t\t\t<p><img src=\"" . LR_BASEURL . LR_FILE . "\" alt=\"" . array_pop(explode("/", LR_FILE)) . "\"" . (($width > 760) ? "width=\"100%\"" : "") . "></p>\n";
	$exif = lrGetCamera($filename);
	$header .= "\t\t\t<h2 class=\"photo\">${lrStrings[41]}</h2>\n";
	$header .= "\t\t\t<table class=\"photo\">\n";
	$header .= "\t\t\t\t<tr>\n";
	$header .= "\t\t\t\t\t<td><strong>${lrStrings[42]}:</strong></td><td class=\"spacer\">${exif['make']}</td><td><strong>${lrStrings[43]}:</strong></td><td>${exif['model']}</td>\n";
	$header .= "\t\t\t\t</tr>\n";
	$header .= "\t\t\t\t<tr>\n";
	$header .= "\t\t\t\t\t<td><strong>${lrStrings[44]}:</strong></td><td class=\"spacer\">${exif['exposure']}</td><td><strong>${lrStrings[45]}:</strong></td><td>${exif['aperture']}</td>\n";
	$header .= "\t\t\t\t</tr>\n";
	$header .= "\t\t\t\t<tr>\n";
	$header .= "\t\t\t\t\t<td><strong>${lrStrings[46]}:</strong></td><td class=\"spacer\">${exif['iso']}</td><td><strong>${lrStrings[47]}:</strong></td><td>${exif['date']}</td>\n";
	$header .= "\t\t\t\t</tr>\n";
	$header .= "\t\t\t</table>\n";
}
else if(in_array($ext, array("gif", "png"))) {
	list($width, $height, $type, $attr) = getimagesize($filename);
	$header = "\t\t\t<p><img src=\"" . LR_BASEURL . LR_FILE . "\" alt=\"" . array_pop(explode("/", LR_FILE)) . "\"" . (($width > 760) ? "width=\"100%\"" : "") . "></p>\n";
}
else
	lrError($lrErrorMsg[40], $lrErrorMsg[41]);

// Write the content
include(LR_CWD . "/skins/" . LR_SKIN . "/view.php");


/**
 * lrGetCamera(filename)
 *
 * Returns an array with the image's EXIF data or false on file not found
 */
function lrGetCamera($filename) {
	global $lrStrings;
	if ((isset($filename)) and (file_exists($filename))) {
		$exif_ifd0 = read_exif_data($filename ,'IFD0' ,0);
		$exif_exif = read_exif_data($filename ,'EXIF' ,0);
		$camera = array();

		// Make
		$camera["make"] = (@array_key_exists('Make', $exif_ifd0)) ? $exif_ifd0['Make'] : $lrStrings[40];
		// Model
		$camera["model"] = (@array_key_exists('Model', $exif_ifd0)) ? $exif_ifd0['Model'] : $lrStrings[40];
		// Exposure
		$camera["exposure"] = (@array_key_exists('ExposureTime', $exif_ifd0)) ? $exif_ifd0['ExposureTime'] : $lrStrings[40];
		// Aperture
		$camera["aperture"] = (@array_key_exists('ApertureFNumber', $exif_ifd0['COMPUTED'])) ? str_replace("f", "<em style=\"font-family: serif; padding-right: .15em\">f</em>", $exif_ifd0['COMPUTED']['ApertureFNumber']) : $lrStrings[40];
		// Date
		$camera["date"] = (@array_key_exists('DateTime', $exif_ifd0)) ? $exif_ifd0['DateTime'] : $lrStrings[40];
		// ISO
		$camera["iso"] = (@array_key_exists('ISOSpeedRatings',$exif_exif)) ? $exif_exif['ISOSpeedRatings'] : $lrStrings[40];

		return($camera);
	}
	else
		return(false);
}

?>
