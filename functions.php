<?php

/**
 * show_section function
 *
 * @since 0.1
 * @version 0.4
 * */
function show_section( $id, $options = array() ) {
	echo CustomSections::show_section( $id, $options );
}

/**
 * undocumented function
 *
 * @since 0.4
 * @version 0.4
 **/
function get_section_templates() {
	return CustomSections::get_section_templates();
}
