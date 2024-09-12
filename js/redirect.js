if ((active_page == 'thread' || active_page == 'index') && !!$.cookie('mod') && !(location.pathname).match(/\.php/)) {
	window.location.replace("/user.php?"+location.pathname+location.search+location.hash);
}

if ((active_page == 'thread' || active_page == 'index') && !$.cookie('mod') && !(location.pathname).match(/\.php/)) {
	$.ajax({
		url:'/signup.php',
		type: 'POST',
		dataType:'json',
		data: ({
			'auto':'auto'
		}),
		success: function(data) {
			if (data.status == 1) {
				window.location.replace("/user.php?"+location.pathname+location.search+location.hash);
			}
		}
	});
}