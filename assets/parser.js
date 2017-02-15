$('select#uname').on('mouseout',function() {
		var username = $('text#uname').val();
		if ($.trim(username)!=''){
			$.post('scripts/check_user.php', {username: username}, function(data){
			$('div#notify').html(data);	
			});
		}
});
