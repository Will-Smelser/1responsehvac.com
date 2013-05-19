
$(document).ready( function () {
	var loc = document.location.href;
	loc = loc.split('/').slice(-1);
	var navLinks = $('.navLink').toArray();
	for (i in navLinks) {
		var navLink = navLinks[i];
				
		if ($(navLink).attr('href') == loc) {
			$(navLink).css('background-color', '#888');
			}
		}	
	
	});
