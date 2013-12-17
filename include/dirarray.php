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

include_once("mime.php");
include_once("syntax.php");


/**
 * lrDirArray(dir)
 *
 * Expands an array of files to include more information and sorts it
 * alphabetically.
 */
function lrDirArray($dir) {
	if(file_exists(LR_BASEDIR . LR_PATH . "/.files"))
		include_once(LR_BASEDIR . LR_PATH . "/.files");

	// Store it to prevent repeat concatenation
	$path = LR_BASEDIR . LR_PATH;

	$sort_key = array();
	$table = array();

	foreach($dir as $null=>$value) {
		// Hit the sorting array
		$sort_key[] = strtolower((@$files[$value]) ? $files[$value] : $value);

		// Parse Internet shortcuts
		if(lrFileExt($path . $value) == "url") {
			$ini_array = parse_ini_file($path . $value);
			$url = $ini_array["URL"];
			unset($ini_array);
		}
		else
			$url = LR_BASEURL . LR_PATH . $value;

		// Build the row
		$temp = array(
			"url" => $url,
			"path" => LR_BASEDIR . LR_PATH . $value,
			"name" => ((@$files[$value]) ? $files[$value] : $value),
			"size" => filesize($path . $value),
			"mime" => lrGetMime($path . $value),
			"syntax" => lrGetSyntax($path . $value),
			"modified" => date("Y/m/d @ H:i:s", filemtime(LR_BASEDIR . LR_PATH . $value)));

		// Add the view command to relevant files
		if(!strpos($temp["mime"], "mswinurl") && ($temp["syntax"] || (strpos($temp["mime"], "text"))) || in_array(lrFileExt($value), array("jpg", "jpe", "jpeg", "png", "gif"))) {
			$temp["raw"] = $temp["url"];
			$temp["url"] .= "/view";
		}
		else {
			$temp["raw"] = null;
		}
		$table[] = $temp;
	}
	array_multisort($sort_key, SORT_ASC, SORT_STRING, $table);
	return($table);
}

?>
