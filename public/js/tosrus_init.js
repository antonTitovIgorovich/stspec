$(document).ready(function(){
    
    $("#main-image>img").tosrus();	
	
	$("#images").tosrus({
        infinite : true,
        slides   : {
            visible  : 2
        }
    });
    
})