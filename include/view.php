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
else
	lrError($lrErrorMsg[40], $lrErrorMsg[41]);

// Write the content
include(LR_CWD . "/skins/" . LR_SKIN . "/view.php");

?>
