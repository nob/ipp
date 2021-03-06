jQuery(function($){

    var autoplay = 0;
    //if flash intro is requested,
    if ($('#flash-wrap').length > 0) {
        $('#noflash-msg').show();
        //load intro flash movie.
        flashembed("flash", {
            src: 'intro-v2.swf',
            bgcolor: '#000000',
            expressInstall: "http://static.flowplayer.org/swf/expressinstall.swf",
            onFail: function() {
                closeFlash();
                autoplay = 1;
                $('#pauseplay').toggleClass('play'); //show pause button.
            }
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
        $('#pauseplay').toggleClass('play'); //show pause button.
    }
    //call Supersized screen slideshow.
    $.supersized({
        //Functionality
        slideshow               :   1,		//Slideshow on/off
        autoplay				:	autoplay,//Slideshow starts playing automatically
        start_slide             :   1,		//Start slide (0 is random)
        random					: 	0,		//Randomize slide order (Ignores start slide)
        slide_interval          :   3500,	//Length between transitions
        transition              :   1, 		//0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left
        transition_speed		:	500,	//Speed of transition
        new_window				:	0,		//Image links open in new window/tab
        pause_hover             :   0,		//Pause slideshow on hover
        keyboard_nav            :   1,		//Keyboard navigation on/off
        performance				:	1,		//0-Normal, 1-Hybrid speed/quality, 2-Optimizes image quality, 3-Optimizes transition speed // (Only works for Firefox/IE, not Webkit)
        image_protect			:	0,		//Disables image dragging and right click with Javascript
        image_path				:	'/img/', //Default image path

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
                                            {image : '/img/slide/1i-01.jpg'},
                                            {image : '/img/slide/1i-02.jpg'},
                                            {image : '/img/slide/1i-03.jpg'},
                                            {image : '/img/slide/1i-04.jpg'},
                                            {image : '/img/slide/1i-05.jpg'},
                                            {image : '/img/slide/1i-06.jpg'},

                                            {image : '/img/slide/2y-01.jpg'},
                                            {image : '/img/slide/2y-02.jpg'},
                                            {image : '/img/slide/2y-03.jpg'},
                                            {image : '/img/slide/2y-04.jpg'},
                                            {image : '/img/slide/2y-05.jpg'},
                                            {image : '/img/slide/2y-06.jpg'},

                                            {image : '/img/slide/3i-07.jpg'},
                                            {image : '/img/slide/3i-08.jpg'},
                                            {image : '/img/slide/3i-09.jpg'},
                                            {image : '/img/slide/3i-10.jpg'},
                                            {image : '/img/slide/3i-11.jpg'},
                                            {image : '/img/slide/3i-12.jpg'},

                                            {image : '/img/slide/4s-01.jpg'},
                                            {image : '/img/slide/4s-02.jpg'},
                                            {image : '/img/slide/4s-03.jpg'},
                                            {image : '/img/slide/4s-04.jpg'},
                                            {image : '/img/slide/4s-05.jpg'}

                                    ]

    });

    //Initialize overlay.
    var overlays = $('a[rel]').overlay({
        speed: 'slow',
        left: 90, //This parameter is modified. Now it's position from right.
        top: 85,
        onBeforeLoad: function() {
            //for IE8 (or lower) & jQuery fadeIn() bug.
            if (jQuery.browser.msie && parseInt(jQuery.browser.version) <= 8) {
                $('#overlay').css('filter', 'progid:DXImageTransform.Microsoft.gradient(startColorStr=#992E292A,endColorStr=#992E292A)');
            }
            // load the page specified in the trigger
            $('#wrap').hide('fast'); //hide current content by fast before loading next.
            $('#wrap').load(this.getTrigger().attr("href"));
            $('#wrap').show('fast'); //now show the content by fast.
            //activate the trigger to change it's color.
            this.getTrigger().toggleClass('active', true);
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

    //Define other button behavior.
    $("#pauseplay").click(function() {
        api.playToggle();
    });
    $("#prevslide").click(function() {
        api.prevSlide();
    });
    $("#nextslide").click(function() {
        api.nextSlide();
    });

    if(jQuery.support.opacity){
        $("#prevslide, #nextslide").mouseover(function() {
           $(this).stop().animate({opacity:1},100);
        }).mouseout(function(){
           $(this).stop().animate({opacity:0.6},100);
        });
    }

    $("#tori_hour-en, #tori_hour-ja").click(function() {
        api.goTo(7); //Jump to Yakitori slides.
    });
    $("#soba_hour-en, #soba_hour-ja").click(function() {
        api.goTo(19); //Jump to Soba slides.
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
    var lang = jQuery.url.setUrl(url).segment(2);
    var current_lang = (lang === 'en') ? 'ja' : 'en';
    var url = url.replace('\/index\/', '\/json\/');
    $.getJSON(url, function(data) {
        $.each(data, function (key, val) {
            if (key == 'html_title') {
                $('title').text(val);
            } else if (key == 'meta_description') {
                $('meta[name=description]').attr('content', val);
            } else if (key == 'new') {
                $('#' + key + '-' + current_lang).attr('id', key + '-' + lang);
            } else {
                $('#' + key + '-' + current_lang).text(val);
                var new_url = $('#' + key + '-' + current_lang).attr('href').replace('\/' + current_lang, '\/' + lang);
                $('#' + key + '-' + current_lang).attr('href', new_url);
                $('#' + key + '-' + current_lang).attr('id', key + '-' + lang);
            }
        });
    });
}
