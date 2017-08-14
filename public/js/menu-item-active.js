$(document).ready(function(){
	$('.navbar-nav').find('li>a').each(function () {
	    var href = location.href;
	    if (href[href.length - 1] === '/'){
	        href = href.substring(0, href.length - 1)
	    }
	    if ($(this).attr('href') === href) {
	        $(this).addClass('active');
		    }
	});
})