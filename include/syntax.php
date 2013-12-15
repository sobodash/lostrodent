
<?php
/**
 *
 * Version:   2.0
 * Author:    Derrick Sobodash <derrick@sobodash.com>
 * Copyright: (c) 2011, 2012, 2013 Derrick Sobodash
 * Web site:  https://github.com/sobodash/lostrodent/
 * License:   BSD License <http://opensource.org/licenses/bsd-license.php>
 *
 */


/**
 * lrGetSyntax(filename)
 *
 * Detects the proper Prism syntax highlighter to use based on the filename.
 */
function lrGetSyntax($filename) {
	$extensions = array(
		// Markup Syntax
		"htm" => "markup",
		"html" => "markup",
		"shtml" => "markup",
		"xml" => "markup",
		"xsl" => "markup",
		"xst" => "markup",
		"xht" => "markup",
		"xhtml" => "markup",
		"rss" => "markup",

		// Cascading Stylesheet Syntax
		"css" => "css",

		// PHP Syntax
		"php" => "php",
		"pht" => "php",
		"phtml" => "php",
		"phps" => "php",
		"php3" => "php",
		"php4" => "php",
		"php5" => "php",

		// Shell Syntax
		"sh" => "bash",
		"csh" => "bash",
		"ksh" => "bash",

		// C# Syntax
		"cs" => "csharp",

		// C Syntax
		"c" => "c",
		"h" => "c",

		// C++ Syntax
		"cpp" => "cpp",
		"c++" => "cpp",
		"cxx" => "cpp",
		"cc" => "cpp",
		"hpp" => "cpp",
		"h++" => "cpp",
		"hxx" => "cpp",
		"hh" => "cpp",

		// SQL Syntax
		"sql" => "sql",

		// Java Syntax
		"java" => "java",

		// JavaScript Syntax
		"js" => "javascript",

		// Python Syntax
		"py" => "python",

		// Ruby Syntax
		"rb" => "ruby",
	);

	if(isset($extensions[lrFileExt($filename)]))
		return("language-" . $extensions[lrFileExt($filename)]);
	else if(lrCheckText($filename))
		return("language-none");
	else
		return(null);
}

?>
