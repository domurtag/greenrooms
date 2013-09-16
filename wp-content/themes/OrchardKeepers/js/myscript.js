jQuery(document).ready(function($){
	$('.home_slider').bxSlider({
	  auto: true,
	  pause: 6000,
	  autoControls: true
	});
	
	$('.location_hire_slider').bxSlider({
	  auto: true,
	  pause: 6000,
	  autoControls: true
	});
	
	$(".gallery-icon a").colorbox({rel:'group1', width:"30%", height:"auto"});
	
	$(".make_a_booking").click(function(){
	
		if(jQuery(this).parent().find(".booking_form").css("display")!="block")
		{
			jQuery(this).parent().find(".booking_form").slideDown("fast");
		}
		else
		{
			jQuery(this).parent().find(".booking_form").slideUp("fast");
		}
		$(this).slideUp("fast");
		return false;
		
	});
	
});