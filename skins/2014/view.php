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

?>			<h1 id="header"><?php echo $lrStrings[23] . LR_FILE; ?></h1>
<?php
if(@$header) { 
	echo $header; ?>

			<table>
				<tr>
					<td><a href="<?php echo LR_PARENT; ?>"><?php echo $lrStrings[21]; ?></a></td>
				</tr>
			</table>
<?php
}

include("footer.php");

?>
