<?php
/**
 *
 * The Lost Rodent
 *
 * Directory listing module
 *
 * Version:   2.0
 * Author:    Derrick Sobodash <derrick@sobodash.com>
 * Copyright: (c) 2011, 2012, 2013 Derrick Sobodash
 * Web site:  https://github.com/sobodash/lostrodent/
 * License:   BSD License <http://opensource.org/licenses/bsd-license.php>
 *
 */

global $table, $lrBlacklist, $lrIndex;

// Get files in the path
$dir = array();
$d = dir(LR_BASEDIR . LR_PATH);
while(false !== ($entry = $d->read()))
	// Hide blacklisted files
	if($entry[0] != "." && !in_array($entry, $lrBlacklist))
		$dir[] = $entry;
$d->close();

// Garbage collection
unset($d);

// Find first header file and format it
for($i = 0; $i < count($lrIndex); $i ++) {
	if(file_exists(LR_BASEDIR . LR_PATH . "/" . $lrIndex[$i])) {
		if(lrFileExt(LR_BASEDIR . LR_PATH . "/" . $lrIndex[$i]) == "md") {
			$header = trim(lrMarkdown(LR_BASEDIR . LR_PATH . "/" . $lrIndex[$i]));
			define("LR_MARKDOWN", true);
		}
		else {
			$header = rtrim(file_get_contents(LR_BASEDIR . LR_PATH . "/" . $lrIndex[$i]));
			define("LR_MARKDOWN", false);
		}
		break;
	}
}

//natcasesort($dir);

include_once("dirarray.php");
$table = lrDirArray($dir);

// Write the directories
include(LR_CWD . "/skins/" . LR_SKIN . "/directory.php");

?>
