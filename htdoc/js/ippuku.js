jQuery(function($){

    var autoplay = 0;
    //if flash intro is requested,
    if ($('#flash-wrap').length > 0) {
        $('#noflash-msg').show();
        //load intro flash movie.
        flashembed("flash", {
            src: 'intro.swf', 
            bgcolor: '#000000',
            expressInstall: "http://static.flowplayer.org/swf/expressinstall.swf"
        });
        //Initialize "Enter" anchor.
        $('#enter').click(function() {
            event.preventDefault ? event.preventDefault() : event.returnValue = false;
            closeFlash();
        });
    //or if flash intro is not requested,
    } else {
        //start playing slide show.
        autoplay = 1;
    }
        
    //call Supersized screen slideshow. 
    $.supersized({
        //Functionality
        slideshow               :   1,		//Slideshow on/off
        autoplay				:	autoplay,//Slideshow starts playing automatically
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
        image_path				:	'/new/img/', //Default image path

        //Size & Position
        min_width		        :   0,		//Min width allowed (in pixels)
        min_height		        :   0,		//Min height allowed (in pixels)
        vertical_center         :   1,		//Vertically center background
        horizontal_center       :   1,		//Horizontally center background
        fit_portrait         	:   1,		//Portrait images will not exceed browser height
        fit_landscape			:   1,		//Landscape images will not exceed browser width
        
        //Components
        navigation              :   1,		//Slideshow controls on/off
        thumbnail_navigation    :   0,		//Thumbnail navigation
        slide_counter           :   1,		//Display slide numbers
        slide_captions          :   0,		//Slide caption (Pull from "title" in slides array)
        slides 					:  	[		//Slideshow Images
                                            //{image : '<?php echo site_url("img/slide/img_0436.jpg");?>', title : 'AAA by BBB', url : ''},  
                                            {image : '/new/img/slide/img_0436.jpg'},  
                                            {image : '/new/img/slide/img_0422.jpg'},  
                                            {image : '/new/img/slide/img_0440.jpg'},  
                                            {image : '/new/img/slide/img_0424.jpg'},  
                                            {image : '/new/img/slide/img_0426.jpg'},  
                                            {image : '/new/img/slide/img_0433.jpg'},  
                                            {image : '/new/img/slide/img_0435.jpg'},  
                                            {image : '/new/img/slide/img_0423.jpg'},  
                                            {image : '/new/img/slide/img_0445.jpg'},  
                                            {image : '/new/img/slide/img_0438.jpg'},  
                                            {image : '/new/img/slide/img_0428.jpg'},  
                                            {image : '/new/img/slide/img_0420.jpg'},  
                                            {image : '/new/img/slide/img_0419.jpg'},  
                                            {image : '/new/img/slide/img_0431.jpg'},  
                                            {image : '/new/img/slide/img_0417.jpg'},  
                                            {image : '/new/img/slide/img_0418.jpg'}  
                                    ]
                                    
    }); 

    //Initialize overlay.
    var overlays = $('a[rel]').overlay({
        speed: 'slow', 
        left: 90, //This parameter is modified. Now it's position from right. 
        top: 85,
        onBeforeLoad: function() { 
            //for IE & jQuery fadeIn() bug.
            if (jQuery.browser.msie) {
                $('#overlay').css('filter', 'progid:DXImageTransform.Microsoft.gradient(startColorStr=#992E292A,endColorStr=#992E292A)');
            }   
            // load the page specified in the trigger 
            $('#wrap').hide('fast'); //hide current content by fast before loading next.
            $('#wrap').load(this.getTrigger().attr("href")); 
            $('#wrap').show('slow'); //now show the content.
            //activate the trigger to change it's color.
            this.getTrigger().toggleClass('active', true);
        },
        onLoad: function() {
            // grab wrapper element inside content 
            //var wrap = this.getOverlay().find("#wrap"); 
            // load the page specified in the trigger 
            //wrap.load(this.getTrigger().attr("href")); 
        },
        onClose: function() { 
            //deactivate the trigger to change it's color.
            this.getTrigger().toggleClass('active', false);
        }
    });

    //Initialize langage button.
    $('#lang a').click(function(){
        event.preventDefault ? event.preventDefault() : event.returnValue = false;
        $.each(overlays, function (key, val) {
            var ol = overlays.eq(key).overlay();
            if (ol.isOpened()) ol.close(); 
        });
        $('#lang a').toggleClass('active', false);
        $(this).toggleClass('active', true);
        translateNavi();
    });

});

function closeFlash() {
    $('#flash').hide();
    $('#flash-wrap > p').hide();
    $('#logo').fadeIn(600, function() {
        if (jQuery.browser.msie) {
            $('#logo').removeAttr('style');
       } 
    });
    $('#flash-wrap').delay(800).fadeOut(1500);
    
    //start playing slide show.
    $('#pauseplay').trigger('click');
}

function translateNavi() {
    var url = $('#lang a.active').attr('href');
    var lang = jQuery.url.setUrl(url).segment(3);
    var current_lang = (lang === 'en') ? 'ja' : 'en';
    var url = url.replace('\/index\/', '\/json\/');
    $.getJSON(url, function(data) {
        $.each(data, function (key, val) {
            $('#' + key + '-' + current_lang).text(val);
            var new_url = $('#' + key + '-' + current_lang).attr('href').replace('\/' + current_lang, '\/' + lang);
            $('#' + key + '-' + current_lang).attr('href', new_url);
            $('#' + key + '-' + current_lang).attr('id', key + '-' + lang);
        });
    });
} 
