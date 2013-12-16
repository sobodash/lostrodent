<?php
/*
Default Template: File Viewer

Version:   2.0
Author:    Derrick Sobodash <derrick@sobodash.com>
Copyright: (c) 2011, 2012, 2013 Derrick Sobodash
Web site:  https://github.com/sobodash/lostrodent/
License:   BSD License <http://opensource.org/licenses/bsd-license.php>
*/

global $lrStrings;

include("header.php");
include_once(LR_CWD . "/include/mime.php");

$breadcrumbs = explode("/", LR_FILE);
$linkchain = "";
$firstloop = true;
for($i=count($breadcrumbs)-1; $i > 0; $i--) {
        if($firstloop === true) {
                $linkchain = array_pop($breadcrumbs) ;
                $firstloop = false;
        }
        else {
                $linkchain = "<a href=\"" . LR_BASEURL . implode("/", $breadcrumbs) . "\">" . array_pop($breadcrumbs) . "</a>/" . $linkchain;
        }
}
unset($firstloop, $breadcrumbs);

?>			<p id="header"><a href="<?php echo LR_BASEURL; ?>" title="<?php echo LR_TITLE; ?>"><img src="<?php echo LR_SYSURL . "/img/24px/go-home.png";; ?>" alt="[dir]"></a> /<?php echo $linkchain; ?></p>

			<div class="fileinfo">
				<table class="directory">
					<tr>
						<td rowspan="2" align="right"><img src="<?php echo LR_SYSURL . "/img/48px/" . str_replace("/", "-", lrGetMime(LR_BASEDIR . LR_FILE)); ?>.png" alt="[view]" class="icon"></td>
						<td colspan="3" class="filename"><?php echo array_pop(explode("/", LR_FILE)); ?> <a href="<?php echo LR_BASEURL . LR_FILE; ?>"><img src="<?php echo LR_SYSURL . "/img/16px/document-save.png"; ?>" width="16" height="16" alt="[raw]"></a></td>
					</tr>
					<tr>
						<td class="infomime"><?php echo "MIME: " . lrGetMime(LR_BASEDIR . LR_FILE); ?></td>
						<td class="infotime"><?php echo "Modified: " . date("Y/m/d @ H:i:s", filemtime(LR_BASEDIR . LR_FILE)); ?></td>
						<td class="infosize"><?php echo "File Size: " . lrFileSize(filesize(LR_BASEDIR . LR_FILE)); ?></td>
					</tr>
				</table>
			</div>
<?php
if(@$header) { 
	echo $header; ?>

			<div class="fileinfo">
				<table class="directory">
					<tr>
						<td rowspan="2" align="right"><img src="<?php echo LR_SYSURL . "/img/48px/go-home.png"; ?>" alt="[dir]" class="icon"></td>
						<td colspan="3" class="filename"><a href="<?php echo LR_PARENT; ?>"><?php echo $lrStrings[21]; ?></a></td>
					</tr>
					<tr>
						<td class="infomime">Directory</td>
						<td class="infotime"></td>
						<td class="infosize"></td>
					</tr>
				</table>
			</div>
<?php
}

include("footer.php");

?>
