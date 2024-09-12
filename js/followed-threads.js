var watchlist = {};

/**
 * [render /> Creates a watchlist container and populates it with info
 * about each thread that's currently being watched. If the watchlist container
 * already exists, it empties it out and repopulates it.]
 * @param  {[Bool]} reset [If true and the watchlist is rendered, remove it]
 */
watchlist.render = function(reset) {

	$.ajax({
		url: '/user.php?/followed_threads',
		type: 'GET',
		dataType: 'json',
		data: ({ seenlist : true}),
		success: function(data) {
			if (reset == null) reset = false;
			if (reset && $('#watchlist').length) $('#watchlist').remove();
			var threads = [];
			data.forEach(function(e, i) {
				//look at line 69, that's what (e) is here.
				threads.push('<div class="watchlist-inner" id="watchlist-'+i+'">' +
				'<span>[<a class="watchlist-remove" id="'+e['post']+'" style="text-decoration: none;" href="/user.php?/'+e['board']+'/unfollow/'+e['post']+'">x</a>] /'+e['board']+'/ - ' +
				'<a href="/user.php?/'+e['board']+'/res/'+e['post']+'.html">'+e['title']+'</a><span'+(e['seen'] == 0?'':' style="color:red; font-weight:700;"')+'> (' +
				e['seen']+') </span></span>' +
				'</div>');
			});
			if ($('#watchlist').length) {
				//If the watchlist is already there, empty it and append the threads.
				$('#watchlist').children('.watchlist-inner').remove();
				$('#watchlist').children('.watchlist-controls').remove();
				$('#watchlist').append(threads.join(''));
				$('#watchlist').append('<div class="watchlist-controls">'+
						'<span><a href="javascript:void(0)" class="watchlist-clearAll">['+_('Clear All')+']</a></span>&nbsp'+
						'<span><a href="javascript:void(0)" class="watchlist-hide">['+_('Hide')+']</a></span>&nbsp'+
						'<span><a href="javascript:void(0)" class="watchlist-update">['+_('Update')+']</a></span>'+
					'</div>');
			} else {
				//If the watchlist has not yet been rendered, create it.
				var menuStyle = getComputedStyle($('.boardlist')[0]);
				$((active_page == 'ukko') ? 'hr:first' : (active_page == 'catalog') ? 'body>span:first' : 'form[name="post"]').before(
			$('<div id="watchlist">'+
					threads.join('')+
						'<div class="watchlist-controls">'+
						'<span><a href="javascript:void(0)" class="watchlist-clearAll">['+_('Clear All')+']</a></span>&nbsp'+
						'<span><a href="javascript:void(0)" class="watchlist-hide">['+_('Hide')+']</a></span>&nbsp'+
						'<span><a href="javascript:void(0)" class="watchlist-update">['+_('Update')+']</a></span>'+
					'</div>'+
						'</div>').css("background-color", menuStyle.backgroundColor).css("border", menuStyle.borderBottomWidth+" "+menuStyle.borderBottomStyle+" "+menuStyle.borderBottomColor));
			}
			return this;
		} 
	});
};


$(document).ready(function(){
	if (!(active_page == 'thread' || active_page == 'index' || active_page == 'catalog' || active_page == 'ukko') || !$.cookie('mod')) {
		return;
	}

	//Append the watchlist toggle button.
	$('.boardlist').append('<span class="sub">[ <a class="watchlist-toggle" href="#">'+_('watchlist')+'</a> ]</span>');
	//Append a watch thread button after every OP.
	
	//Draw the watchlist, hidden.
	watchlist.render();

	//Show or hide the watchlist.
	$(document).on('click','.watchlist-toggle,.watchlist-hide', function(e) {
		//if ctrl+click, reset the watchlist.
		if (e.ctrlKey) {
			watchlist.render(true);
		}
		if ($('#watchlist').css('display') !== 'none') {
			$('#watchlist').css('display', 'none');
		} else {
			$('#watchlist').css('display', 'block');
		} //Shit got really weird with hide/show. Went with css manip. Probably faster anyway.
		return false;
	});

	//Trigger the watchlist add function.
	//The selector is passed as an argument in case the page is not a thread.
	$('.thread').on('click','.fa-eye', function(e) {
		var follow = $(this);
		$.get(follow.attr('href'), function(data, status){
			if (status != 'success') {
				alert('Something went wrong, please try again later.');
			}
			watchlist.render();
		});
		follow.removeClass("fa-eye").addClass("fa-eye-slash").attr('href',follow.attr('href').replace('follow','unfollow'));
		return false;
	});
	

	//The index is saved in .watchlist-inner so that it can be passed as the argument here.
	//$('.watchlist-remove').on('click') won't work in case of re-renders and
	//the page will need refreshing. This works around that.
	$('.thread').on('click','.fa-eye-slash', function(e) {
		var unfollow = $(this);
		$.get(unfollow.attr('href'), function(data, status){
			if (status != 'success') {
				alert('Something went wrong, please try again later.');
			}
			watchlist.render();
		});
		unfollow.removeClass("fa-eye-slash").addClass("fa-eye").attr('href',unfollow.attr('href').replace('unfollow','follow'));
		return false;
	});
	
	$(document).on('click','.watchlist-remove', function(e) {
		var unfollow = $(this);
		$.get(unfollow.attr('href'), function(data, status){
			if (status != 'success') {
				alert('Something went wrong, please try again later.');
			}
			watchlist.render();
		});
		$('#post_no_'+unfollow.attr('id')).parent().find('.fa-eye-slash').removeClass("fa-eye-slash").addClass("fa-eye").attr('href',unfollow.attr('href').replace('unfollow','follow'));
		return false;
	});

	$(document).on('click','.watchlist-clearAll', function(e) {
		$('.watchlist-remove').click();
			
	});

	$(document).on('click','.watchlist-update', function(e) {
		watchlist.render();
	});

	
});
