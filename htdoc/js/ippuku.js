jQuery(function($){
    $.supersized({
        //Functionality
        slideshow               :   1,		//Slideshow on/off
        autoplay				:	1,		//Slideshow starts playing automatically
        start_slide             :   1,		//Start slide (0 is random)
        random					: 	0,		//Randomize slide order (Ignores start slide)
        slide_interval          :   3000,	//Length between transitions
        transition              :   1, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
        transition_speed		:	500,	//Speed of transition
        new_window				:	0,		//Image links open in new window/tab
        pause_hover             :   0,		//Pause slideshow on hover
        keyboard_nav            :   1,		//Keyboard navigation on/off
        performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
        image_protect			:	0,		//Disables image dragging and right click with Javascript
        image_path				:	'img/', //Default image path

        //Size & Position
        min_width		        :   0,		//Min width allowed (in pixels)
        min_height		        :   0,		//Min height allowed (in pixels)
        vertical_center         :   1,		//Vertically center background
        horizontal_center       :   1,		//Horizontally center background
        fit_portrait         	:   0,		//Portrait images will not exceed browser height
        fit_landscape			:   0,		//Landscape images will not exceed browser width
        
        //Components
        navigation              :   1,		//Slideshow controls on/off
        thumbnail_navigation    :   0,		//Thumbnail navigation
        slide_counter           :   1,		//Display slide numbers
        slide_captions          :   0,		//Slide caption (Pull from "title" in slides array)
        slides 					:  	[		//Slideshow Images
                                            //{image : '<?php echo site_url("img/slide/img_0436.jpg");?>', title : 'AAA by BBB', url : ''},  
                                            {image : 'img/slide/img_0436.jpg'},  
                                            {image : 'img/slide/img_0422.jpg'},  
                                            {image : 'img/slide/img_0440.jpg'},  
                                            {image : 'img/slide/img_0424.jpg'},  
                                            {image : 'img/slide/img_0426.jpg'},  
                                            {image : 'img/slide/img_0433.jpg'},  
                                            {image : 'img/slide/img_0435.jpg'},  
                                            {image : 'img/slide/img_0423.jpg'},  
                                            {image : 'img/slide/img_0445.jpg'},  
                                            {image : 'img/slide/img_0438.jpg'},  
                                            {image : 'img/slide/img_0428.jpg'},  
                                            {image : 'img/slide/img_0420.jpg'},  
                                            {image : 'img/slide/img_0419.jpg'},  
                                            {image : 'img/slide/img_0431.jpg'},  
                                            {image : 'img/slide/img_0417.jpg'},  
                                            {image : 'img/slide/img_0418.jpg'}  
                                    ]
                                    
    }); 

    //Initialize overlay.
    var overlays = $('a[rel]').overlay({
        speed: 'slow', 
        left: 370, 
        top: 100,
        onBeforeLoad: function() { 
            // grab wrapper element inside content 
            var wrap = this.getOverlay().find("#wrap"); 
            // load the page specified in the trigger 
            wrap.load(this.getTrigger().attr("href")); 
        }
    });

    //Initialize langage button.
    $('#lang a').click(function(){
        event.preventDefault();
        $.each(overlays, function (key, val) {
                var ol = overlays.eq(key).overlay();
                if (ol.isOpened()) ol.close(); 
        });
        $(this).toggleClass('active', true);
        $(this).siblings().toggleClass('active', false);
        translate_navi();
    });
});

function translate_navi() {
    var url = $(".active").attr("href");
    var lang = jQuery.url.setUrl(url).segment(3);
    var current_lang = (lang === "en") ? "ja" : "en";
    var url = url.replace("\/index\/", "\/json\/");
    $.getJSON(url, function(data) {
        $.each(data, function (key, val) {
            $("#" + key).text(val);
            var new_url = $("#" + key).attr("href").replace("\/" + current_lang, "\/" + lang);
            $("#" + key).attr("href", new_url);
        });
    });
} 