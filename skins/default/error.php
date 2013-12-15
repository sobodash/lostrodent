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

?>			<h1 id="header">ERROR: <?php echo $header; ?></h1>
			<p><?php echo $message ?></p>
			<p>Click <a href="javascript:history.go(-1)" title="Go Back">back</a> or <a href="<?php echo LR_BASEURL; ?>" title="<?php echo LR_TITLE; ?>">return to root</a>.</p>
<?php

include("footer.php");

?>
