/**
 * LitePress
 * Copyright (C) 2011 Nirix
 *
 * @author Nirix <nrx@nirix.net>
 * @copyright Nirix
 * @license http://www.gnu.org/licenses/gpl-3.0.html GNU GPL v3-only
 */

$(document).ready(function(){
	// Find all elements with a data-confirm attribute
	// and assign a click event to show a confirm box
	// with the value of the data-confirm attribute.
	$('[data-confirm]').each(function(){
		var anchor = this;
		$(this).click(function(){
			return confirm($(anchor).attr('data-confirm'));
		});
	});
});