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

$breadcrumbs = explode("/", LR_PATH);
array_pop($breadcrumbs);
$linkchain = "";
$firstloop = true;
for($i=count($breadcrumbs)-1; $i > 0; $i--) {
	if($firstloop === true) {
		$linkchain = array_pop($breadcrumbs) . "/";
		$firstloop = false;
	}
	else {
		$linkchain = "<a href=\"" . LR_BASEURL . implode("/", $breadcrumbs) . "\">" . array_pop($breadcrumbs) . "</a>/" . $linkchain;
	}
}
unset($firstloop, $breadcrumbs);

?>			<p id="header"><a href="<?php echo LR_BASEURL; ?>" title="<?php echo LR_TITLE; ?>"><img src="<?php echo LR_SYSURL . "/img/24px/go-home.png"; ?>" alt="[root]"></a> /<?php echo $linkchain; ?></p>
<?php
if(@$header && (LR_MARKDOWN === true)) { 
?>
			<div class="info">
				<?php echo str_replace("\n", "\n\t\t\t\t", $header); ?>

			</div>
<?php
}

else if(@$header) { 
?>
			<div class="info">
				<pre><?php echo @$header; ?></pre>
			</div>
<?php
}
 ?>
			<table class="directory">
				<tr>
					<td rowspan="2" align="right"><img src="<?php echo LR_SYSURL . "/img/48px/go-home.png"; ?>" alt="[dir]" class="icon"></td>
					<td colspan="3" class="filename"><a href="<?php echo LR_PARENT; ?>"><?php echo $lrStrings[21]; ?></a></td>
				</tr>
				<tr>
					<td class="infomime">Directory</td>
					<td class="infotime"></td>
					<td class="infosize"></td>
				</tr><?php
foreach($table as $null=>$value) {
?>

				<tr>
					<td rowspan="2" align="right"><img src="<?php echo is_dir($value["path"]) ? LR_SYSURL . "/img/48px/folder" : LR_SYSURL . "/img/48px/" . str_replace("/", "-", $value["mime"]); ?>.png" alt="<?php echo is_dir($value["path"]) ? "[dir]" : " "; ?>" class="icon"></td>
					<td colspan="3" class="filename"><a href="<?php echo $value["url"]; ?>"><?php echo $value["name"]; ?></a><?php if($value["raw"] != null) {?> <a href="<?php echo $value["raw"]; ?>"><img src="<?php echo LR_SYSURL . "/img/16px/document-save.png"; ?>" width="16" height="16" alt="[raw]"></a><?php } ?></td>
				</tr>
				<tr>
					<td class="infomime"><?php echo is_dir($value["path"]) ? "Directory" : "MIME: " .$value["mime"]; ?></td>
					<td class="infotime"><?php echo is_dir($value["path"]) ? "" : "Modified: " . $value["modified"]; ?></td>
					<td class="infosize"><?php echo is_dir($value["path"]) ? "" : "File Size: " . lrFileSize($value["size"]); ?></td>
				</tr><?php
}
?>

			</table>
<?php

include("footer.php");

?>
