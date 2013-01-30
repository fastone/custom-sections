<?php
/*
Plugin Name: Sections
Plugin URI: http://jeroenvanwissen.nl/wordpress/sections-plugin
Description: Sections is a WordPress plugin that gives you an alternative to the default Widgets
Version: 0.1
Author: W!SSEN
Author URI: http://jeroenvanwissen.nl/

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



/*
Sections Lite
=============

- Sections Lite has no custom post type of its own.
  Choose post type to use as Section in the plugin configuration
  So it can be used with Types plugin or any other CPT plugin
- All other Sections features included

Sections
========

- Show shortcode [section id='<section post id>' title='<section title>'] and <?php show_section(array('id' => <section post id>, 'title' => '<section title>')); ?> below each section edit post.
- By default, <section title> will be rendered as <h2>, and the body content as-is ( <p> )
- With the show_section variant, custom templates can be used to show data. section_<name>.php
  <?php show_section(array('id' => <section post id>, 'template' => '<name>')); ?>
  So custom fields can be used.
- Sections edit post page will show all configured edit options that post type has configured. So featured image can be used too

*/

setlocale( LC_ALL, 'nl_NL' );

$path = str_replace( '\\', '/', ( dirname( __FILE__ ) ) );

define( 'SECTIONS_PATH', $path );
define( 'SECTIONS_TEMPLATES_PATH', SECTIONS_PATH.'/templates' );

require_once SECTIONS_PATH . '/functions.php';
require_once SECTIONS_PATH . '/classes/class-sections.php';

$sections = new Sections();
