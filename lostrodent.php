<?php
/**
 *
 * The Lost Rodent
 *
 * This is a directory indexing script that supports templates and other many
 * other pretty features. It installs on both Apache and Nginx servers.
 *
 * Edit the variables in config.php to suit your installation environment.
 *
 * Create fancy headers for your directories in plain text or Markdown by
 * leaving README or README.md files similar to GitHub.
 *
 * You can create fake hyperlinks or rename files to more logical text by
 * fleshing out the details in the .files template.
 *
 * Version:   2.0
 * Author:    Derrick Sobodash <derrick@sobodash.com>
 * Copyright: (c) 2011, 2012, 2013 Derrick Sobodash
 * Web site:  https://github.com/sobodash/lostrodent/
 * License:   BSD License <http://opensource.org/licenses/bsd-license.php>
 *
 */

define("LR_VERSION", "2.0");

// Store the working directory
define("LR_CWD", getcwd());

// Include config file
include(LR_CWD . "/config.php");

// Include language file
include(LR_CWD . "/lang/" . LR_LANG . ".php");

// Sanitize request path to prevent hijacking
$path = rtrim($_SERVER["REQUEST_URI"], "/");
while(strpos($path, "//"))
	$path = str_replace("//", "/", $path);
while(strpos($path, "../"))
        $path = str_replace("../", "", $path);

// Do a quick check to make sure they are not trying to view the program itself
$install = substr(LR_SYSURL, strlen(LR_BASEURL));
if(substr($path, 0, strlen($install)) == $install)
	lrError($lrErrorMsg[10], $lrErrorMsg[11]);

// Check for "view" mode
if(strlen($path) > 6 && substr($path, -5) == "/view") {
	define("LR_VIEW", true);
	$path = substr($path, 0, strlen($path) - 5);
}
else
	define("LR_VIEW", false);

// Set the desired path
define("LR_PATH", $path . "/");
define("LR_FILE", $path);

// Set the parent
$temp = explode("/", $path);
array_pop($temp);
define("LR_PARENT", LR_BASEURL . implode("/", $temp));

// Garbage collection
unset($path, $temp, $install);

// Create a magic fileinfo handle used for detecting MIME types
$finfo = new finfo(FILEINFO_MIME);

$title = "";
$header = "";
$message = "";
$table = array();

if(is_dir(LR_BASEDIR . LR_PATH)) {
	$title = "(" . LR_PATH . ") @ " . LR_TITLE;
	include_once("include/directory.php");
}
else if(is_file(LR_BASEDIR . LR_FILE) && LR_VIEW) {
	$title = "(" . LR_FILE . ") @ " . LR_TITLE;
	include_once("include/view.php");
}
else {
	lrError($lrErrorMsg[20], $lrErrorMsg[21]);
}


/**
 * lrCheckText(filename)
 *
 * Returns a boolean true if the file is identified as MIME text
 */
function lrCheckText($filename) {
	global $finfo;
	if(strpos($finfo->file($filename), "text") === false)
		return(false);
	else
		return(true);
}


/**
 * lrError(header, message)
 *
 * Displays the error template with the given message and dies
 */
function lrError($header, $message) {
	global $title, $lrErrorMsg;

	$title = "(" . $lrErrorMsg[0]  . ") @ " . LR_TITLE;
	include(LR_CWD . "/skins/" . LR_SKIN . "/error.php");
	die();
}


/**
 * lrFilesize(length)
 *
 * Returns human-readable unit size for given file length
 */
function lrFileSize($size) {
	if((!$unit && $size >= 1<<30) || $unit == "GB")
		return(number_format($size / (1<<30), 2) . $lrStrings[13]);
	if((!$unit && $size >= 1<<20) || $unit == "MB")
		return(number_format($size / (1<<20), 2) . $lrStrings[12]);
	if((!$unit && $size >= 1<<10) || $unit == "KB")
		return(number_format($size / (1<<10), 2) . $lrStrings[11]);
	return(number_format($size) . " " . $lrStrings[10]);
}


/**
 * lrFileExt(filename)
 *
 * Returns the extension of a file
 */
function lrFileExt($filename) {
	return(pathinfo($filename, PATHINFO_EXTENSION));
}


/**
 * lrMarkdown(filename)
 *
 * Returns the content of filename. Filenames ending in .md will be formatted
 * as Markdown.
 */
function lrMarkdown($filename) {
	if(lrCheckText($filename) === false)
		lrError($lrErrorMsg[30], $lrErrorMsg[31]);

	include_once(LR_CWD . "/parsedown/Parsedown.php");
	return(Parsedown::instance()->parse(file_get_contents($filename)));
}

?>
