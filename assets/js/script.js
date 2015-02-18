$(document).ready(function() {
	
	// Get the "action" attribute specified in our form
	var action = $('form').attr('action');
	
	// Where we will show our results
	var results = $('#results');
	
	// Ajax search function
	function ajax_search(search) {
		$.post(action, {
				search: search
				}, function(data) {
				
					// If we got some results
					if (data.length) {
						
						var el = $('<ul />');
						
						// For each of our search results
						$.each(data, function(i,item){
							
							$(el).append('<li><span class="name">' + item.full_name_highlighed + '</span> &ndash; <span class="contents">' + item.contents + '</li>');
						});
						
						$(results).empty().append(el);
						//console.log(data);
					}
					
					// We got nothin'
					else {
						$(results).empty();
					}
					
			}, 'json');
	}
	
	// On keyup
	$('#search').keyup(function() {
		
		// Get search string, remove all white space
		var search = $(this).val().replace(/^\s+|\s+$/g,"");
		
		// If our search string consists of at least one character
		if (search.length > 1) {
			
			// Run after 400 milliseconds
			clearTimeout($.data(this, 'timer'));
			
		    var wait = setTimeout(function() {
				ajax_search(search)
			}, 400);

		    $.data(this, 'timer', wait);

		}
		else
		{
			$(results).empty();
		}
	});
	
});