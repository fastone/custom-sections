/*global window,jQuery*/
function addCustomSection() {
	'use strict';
	var section_name = jQuery('#custom_section_name').val(),
		section_template = jQuery('#custom_section_template').val();

	if (section_name === '') {
		// Show message to user that section must be selected...
		return;
	}

	if (section_template === '') {
		window.send_to_editor("[section name=\"" + section_name + "\"]");
	} else {
		window.send_to_editor("[section name=\"" + section_name + "\" template=\"" + section_template + "\"]");
	}

}