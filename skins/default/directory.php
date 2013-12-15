<?php
/*
Default Template: Directory Listing

Version:   2.0
Author:    Derrick Sobodash <derrick@sobodash.com>
Copyright: (c) 2011, 2012, 2013 Derrick Sobodash
Web site:  https://github.com/sobodash/lostrodent/
License:   BSD License <http://opensource.org/licenses/bsd-license.php>
*/

include("header.php");

?>			<h1 id="header">Index of <?php echo LR_PATH; ?></h1>
			<p><?php echo $header; ?></p>
			<table>
				<tr>
					<td><i class="icon-back"></i> <a href="<?php echo LR_PARENT; ?>">Parent Directory</a></td>
				</tr><?php
@include(LR_BASEDIR . LR_PATH . "/.files");
foreach($dir as $null=>$value) {
?>
				<tr>
					<td>
						<i class="icon-<?php echo is_dir(LR_BASEDIR . LR_PATH . $value) ? "folder-empty" : "doc"; ?>"></i>
						<a href="<?php echo LR_PATH . $value; ?>"><?php echo ($files[$value]) ? $files[$value] : $value; ?></a>
						<?php echo is_dir(LR_BASEDIR . LR_PATH . $value) ? "" : lrFilesize(filesize(LR_BASEDIR . LR_PATH . $value)); ?>
					</td>
				</tr><?php
}
?>

			</table>
<?php

include("footer.php");

?>
