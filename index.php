<?php
/*

The Lost Rodent

This is a simple directory listing script that allows you to emulate the
look of how the Mozilla project used to render pages from Gopherspace. It
is designed to give the user slightly more control over the look of their
directories and to enable directory listing on servers where it is disabled.

Installation is very straightforward.

Rename htaccess to .htaccess, then put it and index.php in the folder from
which you would like to enable indexes. The .htaccess file links all subfolders
back to index.php, allowing endless recursion. All paths which are not a file
will be passed to The Lost Rodent. If the path is a directory, The Lost Rodent
will return an index. If the path doesn't exist, it will return an Error 404.

Edit the $rootdir variable immediately below this header to point to where
you have installed The Lost Rodent. This is used to create image links, and it
should not have a trailing slash. You can also change the $title variable.

To add descritions to a directory, create a .note file. This file is not
inherited by subdirectories. You can assign descriptions to files by adding
.files. Templates for each are included with this source code.

Version:   1.1
Author:    Derrick Sobodash <derrick@sobodash.com>
Copyright: (c) 2011, 2012 Derrick Sobodash
Web site:  https://github.com/sobodash/lostrodent/
License:   BSD License <http://opensource.org/licenses/bsd-license.php>

*/


/*-----------------------------------------------------------------------------
START EDITING
-----------------------------------------------------------------------------*/

$rootdir = "http://my.website.com/pub";
$title   = "The Lost Rodent"

/*-----------------------------------------------------------------------------
STOP EDITING
-----------------------------------------------------------------------------*/



?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title><?php echo $title; if($_SERVER["REQUEST_URI"]) echo " (".$_SERVER["REQUEST_URI"].")"; ?></title>
    <style>
    html {
      background-color: #f0f0f0;
    }
    div {
      width: 736px;
      margin: 44px auto;
      padding: 30px 30px 10px 30px;
      background-color: #fff;
      border: 1px solid #ddd;
      -moz-border-radius: 10px;
      -webkit-border-radius: 10px;
      border-radius: 10px;
      font-family: monospace;
      font-size: 9pt;
    }
    h1 {
      font-family: sans-serif;
      font-weight: 400;
      font-size: 14pt;
      border-bottom: 1px solid #ddd;
      margin-top: 4pt;
    }
    a {
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }
    tr {
      height: 13pt;
    }
    p {
      width: 100%;
    }
    i {
      font-family: sans-serif;
    }
    #valid {
      float: right;
    }
  </style>
  </head>
  <body>
    <div>
      <h1>Index of <?php if($_SERVER["REQUEST_URI"]) echo urldecode($_SERVER["REQUEST_URI"]); ?></h1>
<?php

// Get the path
$path = urldecode($_SERVER["REQUEST_URI"]);

// Get files in the path
$d = dir(".." . $path);
$dir = array();
while(false !== ($entry = $d->read()))
	if($entry[0] != "." && $entry != "index.php" && $entry != "img") $dir[] = $entry;
$d->close();
natcasesort($dir);

//var_dump($dir);
?>
<?php
if(is_file(".." . $path.".note")) {
?>
      <p>
<?php echo str_replace("\n", "<br>\n", rtrim(@file_get_contents(".." . $path.".note"))); ?>

      </p>
<?php
}
else if(is_file(".".$path.".note")) {
?>
      <p>
<?php echo str_replace("\n", "<br>\n", rtrim(@file_get_contents(".".$path.".note"))); ?>

      </p>
<?php
}
?>
      <table>
        <tr>
          <td align="right"></td>
          <td><a href="..">Parent Directory</A></td>
        </tr>
<?php
@include("..".$path.".files");
foreach($dir as $null=>$value) {
?>
        <tr>
          <td align="right"><?php if(is_dir("../" . substr($path, 1) . $value)) echo "<img src=\"" . $rootdir . "/img/folder.png\" height=\"16\" width=\"16\" alt=\"(DIR)\">"; else echo "<img src=\"" . $rootdir . "/img/file.png\" height=\"16\" width=\"16\" alt=\"(FILE)\">"; ?></td>
          <td><a href="<?php echo $path . $value; ?>"><?php if($files[$value]) echo $files[$value]; else echo $value; ?></a></td>
        </tr>
<?PHP
}
?>
      </table>
      <p>
        <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-html32-blue" align="right" height="31" width="88"></a>
        <i>Powered by <a href="https://github.com/sobodash/lostrodent/">The Lost Rodent</a> 1.1. Released under the <a href="http://opensource.org/licenses/bsd-license.php">BSD license</a>.
        <br>
        Copyright &copy; 2011, 2012 Derrick Sobodash.</i>
      </p>
    </div>
  </body>
</html>
