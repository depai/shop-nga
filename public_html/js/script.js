// Search
var Search=function(){
	$('#search_button').click(function(event) {
		let keyword = $('#search_keyword').val(),
			check = [];
		$('#searchbox').toggleClass('active');
		if(keyword)
		{
			$(this).unbind("click");
		}
		else{
			event.preventDefault();
		}
	});
};

var Menu=function(){
	$('.more').click(function(event) {
		$('.category-popup').toggleClass('active');
		$(this).toggleClass('active');
	});
};

var Reply=function(){
	$('.reply').click(function(event) {
		
	});
}





$(function(){
	Search();
	Menu();
	Reply();
});


