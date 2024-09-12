$(document).ready(function () {
	$('.thread').on('click','.fa-thumbs-up',function(event) {
		var upvote = $(this);
		$.get(upvote.attr('href'), function(data, status){
			if (status != 'success') {
				alert('Something went wrong, please try again later.');
			}
			else if (data == 'duplicate') {
				alert('You have already upvoted this post.');
			}
			else if(data == 'self') {
				alert('You cannot upvote your own posts.');
			}
			else if(data == 'toosoon') {
				alert('You cannot upvote again so soon.');
			}
			else if (data == 'ok') {
				upvote.prev().html('&nbsp;+'+(Number(upvote.prev().text())+1).toString()+'&nbsp;');
			}
			else {
				alert('Something went wrong, please try again later.');
			}
		});
		return false;
	});
});