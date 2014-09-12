<script type="text/javascript">
	$('.navbar').on('gumby.onFixed', function(e) {
		$('.nav_wrap').addClass('booyah');
		$('#first').removeClass('show').addClass('noshow');
		$('#second').removeClass('noshow').addClass('show');
		}).on('gumby.onUnfixed', function(e) {
		$('.nav_wrap').removeClass('booyah');
		$('#first').removeClass('noshow').addClass('show');
		$('#second').removeClass('show').addClass('noshow');
  });

$('.nav_wrap').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
	$('.nav_wrap').removeClass('animated fadeInDown')
});
$('#about').click(function(event){
	  event.preventDefault();
  $('html, body').animate({
	scrollTop: $('.about').offset().top}, 1000);
 });
 $('#work').click(function(event){
	  event.preventDefault();
  $('html, body').animate({
	scrollTop: $('.cs_title').offset().top}, 1000);
 });
 $('#services').click(function(event){
	  event.preventDefault();
  $('html, body').animate({
	scrollTop: $('.services').offset().top}, 1000);
 });
 $('#contact').click(function(event){
	  event.preventDefault();
  $('html, body').animate({
	scrollTop: $('footer').offset().top}, 1000);
 });
 $('#reel').click(function(){
	$('#reel_vid').removeClass('none');
	$('.parapa').addClass('animated fadeOutUp');
	$('.parapa').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		$(this).addClass('none');
		$(this).removeClass('animated fadeOutUp');
		$('#reel_vid video').get(0).play();
	}); 
 });

$(document).ready(function () {
	var slideCount = $('.slider .cs_container .slide').length;
	var sliderWidth = 100; 
	var slideWidth = sliderWidth /  slideCount;
	var sliderContainerWidth = slideCount * sliderWidth;
	
	$('.slider').css({ width: sliderWidth +'%'});
	$('.slider .cs_container').css({ width: sliderContainerWidth +'%', marginLeft: - sliderWidth +'%'});
	$('.slide').css({ width: slideWidth +'%'});
    $('.slider .cs_container .slide:last-child').prependTo('.slider .cs_container');

    function moveLeft() {
        $('.slider .cs_container').transition({
            left: + sliderWidth +'%'
        }, 500, 'ease', function () {
            $('.slider .cs_container .slide:last-child').prependTo('.slider .cs_container');
            $('.slider .cs_container').css({left: ''});
        });
    };

    function moveRight() {
        $('.slider .cs_container').transition({
            left: - sliderWidth +'%'
        }, 500,'ease', function () {
            $('.slider .cs_container .slide:first-child').appendTo('.slider .cs_container');
            $('.slider .cs_container').css({left: ''});
        });
    };
    $('#previous').click(function () {
        moveLeft();
    });

    $('#next').click(function () {
        moveRight();
    });
	
	$('.modal .close, .open').on('click',function(){
    if($('.modal').is(':visible')){
		var vidname = $(this).attr('videoname');
        var resourceVideo = $('#'+vidname+' iframe').attr('src');
		if($(this).hasClass('close')) {
			resourceVideo = resourceVideo.substr(0,resourceVideo.lastIndexOf("&"))
		} else if($(this).hasClass('open')) {
			resourceVideo = resourceVideo+'&amp;autoplay=1';
		}
        $('#'+vidname+' iframe').attr('src','').attr('src',resourceVideo);
        };
    })
   
   $('.control_button').on('click',function(){
    if($('.modal').is(':visible')){
		var windows = $('.modal iframe');
		
		for(var i = 0; i<windows.length; i++) {
			var resourceVideo = $(windows[i]).attr('src');
			if(resourceVideo.match(/autoplay/)) {
				resourceVideo = resourceVideo.substr(0,resourceVideo.lastIndexOf("&"))
			} 
			$(windows[i]).attr('src','').attr('src',resourceVideo);	
		}
	}
    });

}); 

window.onload = function() {
	
	// Video
	var video = document.getElementById("demoreel");
	// Buttons
	var playButton = document.getElementById("play-pause");
	var muteButton = document.getElementById("mute");
	var fullScreenButton = document.getElementById("full-screen");

	// Sliders
	var seekBar = document.getElementById("seek-bar");
	var volumeBar = document.getElementById("volume-bar");


	// Event listener for the play/pause button
	playButton.addEventListener("click", function() {
	
		if (video.paused == true) {
			// Play the video
			video.play();

			// Update the button text to 'Pause'
			playButton.innerHTML = "<i class=\"icon-pause\"></i> ";
		} else {
			// Pause the video
			video.pause();

			// Update the button text to 'Play'
			playButton.innerHTML = "<i class=\"icon-play\"></i>";
		}
	});


	// Event listener for the mute button
	muteButton.addEventListener("click", function() {
		if (video.muted == false) {
			// Mute the video
			video.muted = true;

			// Update the button text
			muteButton.innerHTML = "<i class=\"icon-mute\"></i>";
		} else {
			// Unmute the video
			video.muted = false;

			// Update the button text
			muteButton.innerHTML = "<i class=\"icon-sound\"></i>";
		}
	});


	// Event listener for the full-screen button
	fullScreenButton.addEventListener("click", function() {
		if (video.requestFullscreen) {
			video.requestFullscreen();
		} else if (video.mozRequestFullScreen) {
			video.mozRequestFullScreen(); // Firefox
		} else if (video.webkitRequestFullscreen) {
			video.webkitRequestFullscreen(); // Chrome and Safari
		}
	});


	// Event listener for the seek bar
	seekBar.addEventListener("change", function() {
		// Calculate the new time
		var time = video.duration * (seekBar.value / 100);

		// Update the video time
		video.currentTime = time;
	});

	
	// Update the seek bar as the video plays
	video.addEventListener("timeupdate", function() {
		// Calculate the slider value
		var value = (100 / video.duration) * video.currentTime;

		// Update the slider value
		seekBar.value = value;
	});

	// Pause the video when the seek handle is being dragged
	seekBar.addEventListener("mousedown", function() {
		video.pause();
	});

	// Play the video when the seek handle is dropped
	seekBar.addEventListener("mouseup", function() {
		video.play();
	});

	// Event listener for the volume bar
	volumeBar.addEventListener("change", function() {
		// Update the video volume
		video.volume = volumeBar.value;
	});
}
</script>
