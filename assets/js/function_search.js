window.onload = function() {
	new Ajax.Autocompleter("title", "autocomplete_choices", base_url+"application/ajaxsearch/", {});

$('function_search_form').onsubmit=function() {
	inline_results();
	return false;
}
}

function inline_results() {
	new Ajax.Updater ( 'function_description', base_url+'application/ajaxsearch', { method:'post', postBody:'description=true&function_name=$F('title')});
	new Effect.Appear('function_description');
}
