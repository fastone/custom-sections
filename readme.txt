=== Custom Sections ===
Contributors: jvwissen
Donate link: http://www.jeroenvanwissen.nl/weblog/wordpress/custom-sections
Tags: widgets, posttype
Requires at least: 3.3
Tested up to: 4.7.2
Stable tag: 0.4.8

Custom Sections is a WordPress plugin that gives you an alternative to the default Widgets

== Description ==

Custom Sections is a WordPress plugin that gives you an alternative to the default Widgets. Custom Sections are pieces of content to be used as shortcode or directly in your theme.

To use custom template files for sections, files must be named section-templatename.php

== Installation ==

1. Upload the folder `custom-sections` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Settings -> Custom Sections to configure the custom post type to be used as section.

The custom post type can optionaly be created by the user in the functions.php, or via a plugin that can create custom post types without programming.

== Screenshots ==

== Changelog ==

= 0.4.8 (2015-10-6) =
* Added 'section_exists' function to check if a section exists. Use: if ( section_exists('<slug or id>') ) { .. }

= 0.4.7 (2015-9-17) =
* Removed check that prevented to have a section in a section. Use at own risk, could cause infinite loading.

= 0.4.6 (2015-8-17) =
* Fixed: In preparation for supporting PHP7, WordPress 4.3 is deprecating the use of PHP 4 style class constructors. The proper method is to extend WP_Widget in your class and call parent::__construct().

= 0.4.5 (2014-8-25) =
* Added filter to remove html special chars from the section template filename.

= 0.4.4 (2014-3-20) =
* Fixed "Undefined index: internal_post_type" notice

= 0.4.3 (2014-2-12) =
* Added slug to sections shortcode & function call
* Fixed search for section-{name}.php files in parent/child setups
* Moved all text labels to _e() functions.
* section-{name}.php files can now use 'Template Name:' comment header to show human friendly names in popup.

= 0.4.2 (2014-1-4) =
* Fix in version number

= 0.4.1 (2014-1-4) =
* Fixes in readme.txt

= 0.4 (2014-1-4) =
* Added internal custom post type ( 'custom-sections' )
* Added template functionality to use custom templates for output
* Added template selection in widget
* Added button to add section shortcode into content
* Fixed settings menu name
* Fixed show only published sections in widget

= 0.3 (2013-3-20) =
* Added Custom Sections Widget

= 0.2 (2013-1-13) =
* Refactored to Custom Sections

= 0.1.1 (2013-1-31) =
* Removed Dutch locale

= 0.1 (2013-1-31) =
* Initial release

== TODO's ==

* Create documentation
