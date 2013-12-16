# The Lost Rodent #

The Lost Rodent is a lightweight, modular library that stands in for stock
directory indexers. It supports templates, and can be used to enable
indexing of directories on Apache or Nginx installations that explicitly
disable it.

Created as a spinoff of NotSoFancy, an earlier indexing project in 2004,
The Lost Rodent in its classic mode attempts to emulate the look and feel
of how the Mozilla project used to render Gopherspace.


## Features ##

* Syntax highlighting of source code with the Prism library
* Support for displaying documents in plain text and Markdown using the
  Parsedown library
* Selectively substitute file names with text descriptors
* Automatically parse .URL files into hyperlinks
* i18n ready (see /lang/)


## Installation ##

The Lost Rodent comes with sample files for installation on Apache and Nginx.
It should work with more servers: anything that supports PHP and URL rewriting
meets the minimum requirements.

### Apache ###

1. Copy the included htaccess file to .htaccess in the directory your plan
   to index.
2. Copy the lostrodent/ folder to the same directory.
3. Edit lostrodent/config.php accordingly.

### Nginx ###

1. Copy the lostrodent/ folder to the directory you plan to index.
2. Copy the included nginx file to /etc/nginx/sites-available/lostrodent.
3. Edit 'root' and 'server_name' to match your server address and the
   folder to which you copied lostrodent/.
4. Restart Nginx.


## Errata ##

The Lost Rodent ships with code from the Prism project and Parsedown, both
under the MIT license. The original licensing text is included with each.

Prism is created by Lea Varou and can be obtained from her GitHub at
https://github.com/LeaVerou/prism.

Parsedown is created by Emanuil Rusev and can be obtained from his GitHub at
https://github.com/erusev/parsedown.

