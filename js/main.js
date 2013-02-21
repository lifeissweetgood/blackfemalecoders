// Grabbing data from profile
$("#profileForm").submit(function(e) {
	$.ajax({
		type: $("#profileForm").attr('method'),
		timeout: 3000,
		async: false,
		url: "../php/mailer.php",
		data: $("#profileForm").serialize(),
		success: function(html) {
			$('.content').html("<p>Thanks for your submission!  Keep checking the blog to see your feature post!</p>");
		}
	});
	e.preventDefault();
});
