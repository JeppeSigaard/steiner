//////////////////////////////////
// Javascript tilføjet af Tairy //
//////////////////////////////////


var $container;
$(document).ready(function(){
	
	// Aktiver swipe (flyt evt til mobil/tablet only)
	$('body').swipe({
  		swipeLeft:function(event, direction, distance, duration, fingerCount){
	   		if($('#mobile-expand').hasClass('expand')){/*ingenting*/}
		 	else{
			 	if($('#mobile-expand').is(':visible')){
					$('#mobile-expand').addClass('expand');
				 	$('body').animate({"margin-left": "-182px"},200);
			 	}}
  		},
  		swipeRight:function(event, direction, distance, duration, fingerCount){
	   		if($('#mobile-expand').hasClass('expand')){
		   	if($('#mobile-expand').is(':visible')){
			   	$('#mobile-expand').removeClass('expand');
				$('body').animate({"margin-left": "0"},200);
		   		}}
  		}
	});

	$('.entry-content').each(function(){
		// Fjern mellemrum, hvis første paragraf i en artikel indeholder et billede.
		var firstP = $(this).children('p:first-child');
		if (firstP.length > 0){
			if(firstP.children('img').length > 0){
				firstP.css("margin-bottom","0px");
		}}
		
		});
	
	$('article').each(function(){
		var date = $(this).find('p>.event-date-span');
		if (date.length > 0){
			$(this).find('.entry-header').prepend('<h3>'+date.html()+'</h3><br/>');
			}
		});
		
	// indstil masonry, når dokumentet hentes
	imagesLoaded( document.querySelector('#content'), function( instance ) {
        var $container = $('#tankefuld_stones');
        // initialize
        $container.masonry({
          itemSelector: '.tf_stone',
          columnWidth: 320
        });
    });
	
	
	// Mobil sidemenu
	$('#mobile-expand').click(function(){
		if($(this).hasClass('expand')){
			$('body').animate({"margin-left": "0"},200);
			//$('#swipe-menu').animate({"right": "-182px"},500);
			$(this).removeClass('expand');
			}
		else{
			$('body').animate({"margin-left": "-182px"},200);
			//$('#swipe-menu').animate({"right": "0"},500);
			$(this).addClass('expand');
			}
		return false;
		});
	
	// Navigation til toppen
	$('a[href=#top]').click(function(){
        $('html, body').animate({scrollTop:0});
        return false;
    });
	
	// Deaktiver navigation til den side man allerede er på
	$('li.current-menu-item>a').click(function(){
        return false;
    });
	
		
	// Hvis mobiltelefon eller tablet - ting
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 	
		// henvis til facebook app i stedet for www på menuklik
		$(".fb-link").click(function(){
			document.location = "fb://profile/177616225772507";
			return false;
			});
		
		// henvis til facebook app i stedet for www på alle a med korrekt adresse
		$("a").click(function(){
			if($(this).attr('href') == "http://www.facebook.com/tankefuldsvendborg"){
			document.location = "fb://profile/177616225772507";
			return false;
			}});
			
		
			
		// Tilføj evt. mere
		}	
	
	$('.wood_stone').each(function(){
		if (!$.trim($(this).html())){
			$(this).hide();
			}
		});
	
	$('.tf_stone').delay(200).animate({opacity:1},400);
	
	
});