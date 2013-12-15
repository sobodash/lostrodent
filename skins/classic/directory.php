<?php
/*
Default Template: Directory Listing

Version:   2.0
Author:    Derrick Sobodash <derrick@sobodash.com>
Copyright: (c) 2011, 2012, 2013 Derrick Sobodash
Web site:  https://github.com/sobodash/lostrodent/
License:   BSD License <http://opensource.org/licenses/bsd-license.php>
*/

global $lrStrings;

include("header.php");

?>			<h1 id="header"><?php echo $lrStrings[20] . LR_PATH; ?></h1>
<?php
if(@$header && (LR_MARKDOWN === true)) { 
?>
			<div id="info">
				<?php echo str_replace("\n", "\n\t\t\t\t", $header); ?>

			</div>
<?php
}

else if(@$header) { 
?>
			<div id="info">
				<pre><?php echo @$header; ?></pre>
			</div>
<?php
}
 ?>
			<table>
				<tr>
					<td align="right"></td>
					<td><a href="<?php echo LR_PARENT; ?>"><?php echo $lrStrings[21]; ?></a></td>
				</tr><?php
foreach($table as $null=>$value) {
?>
				<tr>
					<td align="right"><img src="<?php echo LR_SYSURL . "/skins/" . LR_SKIN . "/img/"; echo is_dir($value["path"]) ? "folder" : "file"; ?>.png"></td>
					<td><a href="<?php echo $value["url"]; ?>"><?php echo $value["name"]; ?></a><?php if($value["syntax"] || strpos($value["mime"], "text")) { ?><?php if($value["raw"]) {?> <a href="<?php echo $value["raw"]; ?>">[<?php echo strtolower($lrStrings[22]); ?>]</a><?php }} ?></td>
				</tr><?php
}
?>

			</table>
<?php

include("footer.php");

?>
