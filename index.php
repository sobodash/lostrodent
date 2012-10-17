<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title>Lost Rodent<?php if($_SERVER["REQUEST_URI"]) echo " (".$_SERVER["REQUEST_URI"].")"; ?></title>
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
          <td align="right"><?php if(is_dir(substr($path, 1) . $value)) echo "<img src=\"/pub/img/folder.png\" height=\"16\" width=\"16\" alt=\"(DIR)\">"; else echo "<img src=\"/pub/img/file.png\" height=\"16\" width=\"16\" alt=\"(FILE)\">"; ?></td>
          <td><a href="<?php echo $path . $value; ?>"><?php if($files[$value]) echo $files[$value]; else echo $value; ?></a></td>
        </tr>
<?PHP
}
?>
      </table>
      <p><a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-html32-blue" align="right" height="31" width="88"></a><br><i>Powered by The Lost Rodent 1.0. Released under the BSD license. &copy; 2012 Derrick Sobodash.</i></p>
    </div>
  </body>
</html>
