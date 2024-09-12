onready(function(){
	var do_embed_dm = function(tag) {
		$('div.dailymotion-container a', tag).click(function() {
			var videoID = $(this.parentNode).data('video');
		
			$(this.parentNode).html('<iframe style="float:left;margin: 10px 20px" type="text/html" '+
				'width="360" height="270" src="//www.dailymotion.com/embed/video/' + videoID +
				'?autoplay=1" allowfullscreen frameborder="0"/>');

			return false;
		});
	};
	do_embed_dm(document);

        // allow to work with auto-reload.js, etc.
        $(document).on('new_post', function(e, post) {
                do_embed_dm(post);
        });
});

onready(function(){
	var do_embed_dm = function(tag) {
		$('div.vimeo-container a', tag).click(function() {
			var videoID = $(this.parentNode).data('video');
		
			$(this.parentNode).html('<iframe style="float:left;margin: 10px 20px" type="text/html" '+
				'width="360" height="270" src="//player.vimeo.com/video/' + videoID +
				'?autoplay=1" allowfullscreen frameborder="0"/>');

			return false;
		});
	};
	do_embed_dm(document);

        // allow to work with auto-reload.js, etc.
        $(document).on('new_post', function(e, post) {
                do_embed_dm(post);
        });
});