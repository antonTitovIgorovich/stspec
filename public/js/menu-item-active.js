$(document).ready(function(){
	var href = location.href;
	    if (href[href.length - 1] === '/'){
	        href = href.substring(0, href.length - 1)
	    }
	$('.navbar-nav').find('li>a').each(function () {
	    if ($(this).attr('href') === href) {
	        	$(this).addClass('active');
	        	return 
		    }
	});
})