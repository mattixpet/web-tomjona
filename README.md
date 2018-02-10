# web-homepage

## Summary:
* Here's a homepage I made for myself, equipped with
  * Links to other projects displayed as nice images.
  * Social sidebar with links (facebook, twitter, etc.).
  * Simple webchat/shoutbox I wrote myself in pure javascript (uses php to store logs on server).
  * English/Icelandic translations for the page.
  * About, contact, resume links.
* Uses jade, stylus and php together.

## Usage:
* Any php server, just mount **site/** as the root directory for the site.
* Modify the **templates/*.jade**, **styles/style.styl**, **site/static/php/{en.php,is.php}** files to suit your needs.
* After modification of .jade or .styl files, run **compile.bat** with stylus and jade in the path, this compiles the templates into .css and .html files and renames said .html files to .php.
* If you want the chat to work, you have to modify **site/static/php/chatbox.php** and add your own database details.

## Info:
* Dependencies which have to be manually acquired if you want to use this framework for modifying the site:
  * Stylus (0.49.3)
  * Jade (1.8.2)
* I wrote an article about the first steps of this site, creating the framework, [check it out](http://tildaemis.blogspot.is/2015/04/a-small-website-with-two-languages.html).
* A lot of the content on my site isn't very active these days, the blogs mainly.

###### Written in 2015.
