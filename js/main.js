// Grabbing data from profile
$("#profileForm").submit(function(e) {
        // Do some special stuff to get file
        // upload passed to backend with data
	var formInput = new FormData();
	formInput.append("data", $(this).serialize());
        jQuery.each($("#uploadedPhoto")[0].files, function(i, file)
                    {
                        formInput.append("file-"+i, file);
                    });
	$.ajax({
		type: $(this).attr('method'),
		timeout: 3000,
                cache: false,
		async: false,
                contentType: false,
                processData: false,
		url: "../php/mailer.php",
		data:formInput,
		success: function(html) {
			$('.content').html("<p>Thanks for your submission!  Keep checking the blog to see your feature post!</p>");
		},
                error: function(html) {
			$('.content').html("<p>Hmmm...woops!<br/>Looks like an error occured.</p>");
                }
	});
	e.preventDefault();
});
