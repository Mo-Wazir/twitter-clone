$(function(){
	$('.search').keyup(function(){
		var search = $(this).val();
		$.post('http://localhost/twitter-clone/core/ajax/search.php', {
			search: search
		},
		function(data){
			$('search-result').html(data);
		});
	});
});