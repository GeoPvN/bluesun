$(document).on('click','.item-list',function(){
	$('.about').css('display','none');
	$('.service').css('display','none');
	$('.project').css('display','none');
	$('.team').css('display','none');
	$('.touch').css('display','none');
	$('.'+$(this).attr('url')).css('display','block');
	if($(this).attr('url')=='about'){
		about();
	}else if($(this).attr('url')=='service'){
		service();
	}else if($(this).attr('url')=='project'){
		project();
	}else if($(this).attr('url')=='team'){
		team();
	}else{
		touch();
	}
});

$(document).on('click','.service-id',function(){

});

about();

function about(){
	$('.about-h1').text('');
	$('.about-p').css('display', 'none');
	$('.btn-txt').css({visibility: "hidden"});
	TweenLite.defaultEase = Linear.easeNone;


	//show the square only once js has run
	//visibility set to hidden in css panel
	TweenLite.set(".blue-box", {visibility:"visible"});



	var tl = new TimelineLite();
	tl.fromTo(".about .l3", 1, {height:0}, {height:'100%'})
		.fromTo(".about .l2", 4, {width:0}, {width:'100%'})
	  	.fromTo(".about .l1", 1, {height:0}, {height:'100%'})
	  	.fromTo(".about .l4", 1, {width:0}, {width:'100%'})
	  	.fromTo(".blue-box", 1, {backgroundColor:"none"}, {backgroundColor:"#416AE0"})

	tl.timeScale(4) //play faster

	setTimeout(function(){

		new Typed('.about-h1', {
		  strings: ["Hi, There"],
		  typeSpeed: 35
		});
		$('.btn-txt').css({opacity: 0, visibility: "visible"}).animate({opacity: 1}, 200);
	}, 1700);

	setTimeout(function(){

		$('.about-p').css('display', 'inline-block').hide().fadeIn('slow');

	}, 2100);
}

function service(){
	$('.service-section .col-md-4').hide().slice(0, 3).show();
	$('.service-h1').text('');
	$('.service-p').css('visibility', 'hidden');
	//$('.btn-txt').css({visibility: "hidden"});
	TweenLite.defaultEase = Linear.easeNone;

	var w = $('.service-item img').css('width');
	var jh = $('.service-item img').css('height');
	$('.service-item').css({"width": w, "height": jh});
	var h = $('.blue-box').css('height');
	var oh = $('.blue-box-section').css('height');
	var tl = new TimelineLite();
	tl.fromTo(".blue-box-section", 1, {height:h,marginTop:'143px'}, {height:oh,marginTop:'0px'})

	tl.timeScale(2) //play faster

	TweenLite.set(".service-item", {visibility:"visible"});



	var tlt = new TimelineLite();
	tlt.fromTo(".service-item .l3", 1, {height:0}, {height:'100%'})
		.fromTo(".service-item .l2", 4, {width:0}, {width:'100%'})
	  	.fromTo(".service-item .l1", 1, {height:0}, {height:'100%'})
	  	.fromTo(".service-item .l4", 1, {width:0}, {width:'100%'})
	  	.fromTo(".service-section p", 1, {visibility:"hidden"}, {visibility:"visible"})
	  	.fromTo(".service-item", 1, {backgroundColor:"none"}, {backgroundColor:"#416AE0"})
	  	.fromTo(".service-item img", 1, {visibility:"hidden"}, {visibility:"visible"})

	  	

	tlt.timeScale(4) //play faster

	setTimeout(function(){

		new Typed('.service-h1', {
		  strings: ["Services"],
		  typeSpeed: 35
		});
	}, 600);

	setTimeout(function(){

		$('.service-p').css('visibility', 'visible').hide().fadeIn('slow');

	}, 980);
}

function project(){
	$('.project-section .col-md-4').hide().slice(0, 3).show();
	$('.project-h1').text('');
	$('.project-p').css('visibility', 'hidden');
	//$('.btn-txt').css({visibility: "hidden"});
	TweenLite.defaultEase = Linear.easeNone;

	var w = $('.project-item img').css('width');
	var jh = $('.project-item img').css('height');
	$('.project-item').css({"width": w, "height": jh});
	var h = $('.blue-box').css('height');
	var oh = $('.blue-box-section').css('height');
	var tl = new TimelineLite();
	tl.fromTo(".blue-box-section", 1, {height:h,marginTop:'143px'}, {height:oh,marginTop:'0px'})

	tl.timeScale(2) //play faster

	TweenLite.set(".project-item", {visibility:"visible"});



	var tlt = new TimelineLite();
	tlt.fromTo(".project-section .l3", 1, {height:0}, {height:'100%'})
		.fromTo(".project-section .l2", 4, {width:0}, {width:'100%'})
	  	.fromTo(".project-section .l1", 1, {height:0}, {height:'100%'})
	  	.fromTo(".project-section .l4", 1, {width:0}, {width:'100%'})
	  	.fromTo(".project-section p", 1, {visibility:"hidden"}, {visibility:"visible"})
	  	.fromTo(".project-item img", 1, {visibility:"hidden"}, {visibility:"visible"})

	  	

	tlt.timeScale(4) //play faster

	setTimeout(function(){

		new Typed('.project-h1', {
		  strings: ["Projects"],
		  typeSpeed: 35
		});
	}, 600);

	setTimeout(function(){

		$('.project-p').css('visibility', 'visible').hide().fadeIn('slow');

	}, 980);
}

function team(){
	$('.team-section .col-md-4').hide().slice(0, 3).show();
	$('.team-h1').text('');
	$('.team-p').css('visibility', 'hidden');
	//$('.btn-txt').css({visibility: "hidden"});
	TweenLite.defaultEase = Linear.easeNone;

	var w = $('.team-item img').css('width');
	var jh = $('.team-item img').css('height');
	$('.team-item').css({"width": w, "height": jh});
	var h = $('.blue-box').css('height');
	var oh = $('.blue-box-section').css('height');
	var tl = new TimelineLite();
	tl.fromTo(".blue-box-section", 1, {height:h,marginTop:'143px'}, {height:oh,marginTop:'0px'})

	tl.timeScale(2) //play faster

	TweenLite.set(".team-item", {visibility:"visible"});



	var tlt = new TimelineLite();
	tlt.fromTo(".team-item .l3", 1, {height:0}, {height:'100%'})
		.fromTo(".team-item .l2", 4, {width:0}, {width:'100%'})
	  	.fromTo(".team-item .l1", 1, {height:0}, {height:'100%'})
	  	.fromTo(".team-item .l4", 1, {width:0}, {width:'100%'})
	  	.fromTo(".team-section h2", 1, {visibility:"hidden"}, {visibility:"visible"})
	  	.fromTo(".team-section p", 1, {visibility:"hidden"}, {visibility:"visible"})
	  	.fromTo(".team-item img, .red", 1, {visibility:"hidden"}, {visibility:"visible"})

	  	

	tlt.timeScale(4) //play faster

	setTimeout(function(){

		new Typed('.team-h1', {
		  strings: ["Team"],
		  typeSpeed: 35
		});
	}, 600);

	setTimeout(function(){

		$('.team-p').css('visibility', 'visible').hide().fadeIn('slow');

	}, 850);
}

function touch(){
	$('.touch-section .col-md-4').hide().slice(0, 3).show();
	$('.touch-h1').text('');
	$('.touch-p').css('visibility', 'hidden');
	
	//$('.btn-txt').css({visibility: "hidden"});
	TweenLite.defaultEase = Linear.easeNone;

	var h = $('.blue-box').css('height');
	var oh = $('.blue-box-section').css('height');
	var tl = new TimelineLite();
	tl.fromTo(".blue-box-section", 1, {height:h,marginTop:'143px'}, {height:oh,marginTop:'0px'})

	tl.timeScale(2) //play faster

	setTimeout(function(){

		new Typed('.touch-h1', {
		  strings: ["Get in touch"],
		  typeSpeed: 35
		});
	}, 600);

	setTimeout(function(){

		$('.touch-p').css('visibility', 'visible').hide().fadeIn('slow');

	}, 1180);
}

var show_int = 1;
var timer;
var MOUSE_OVER = false;
$('body').bind('mousewheel', function(e){
  if(MOUSE_OVER){
    if(e.preventDefault) { e.preventDefault(); } 
    e.returnValue = false; 
    return false; 
  }

});

$('.container-fluid').mouseenter(function(){ MOUSE_OVER=true; });
$('.container-fluid').mouseleave(function(){ MOUSE_OVER=false; });

var start = 0;
var end = 3;
$('.service-section').bind('mousewheel', function(a){
	var upDown = a.originalEvent.wheelDelta;

	if ( timer ) clearTimeout(timer);

    timer = setTimeout(function(){	

	if(upDown > 0){

		if (start != 0) {
			start -= 3;
  			end -= 3;
		
	  		console.log(start);console.log(end);
	  		$('.service-section .col-md-4').hide().slice(start, end).show('slow');
		
  		}

  	}
  	else
  	{

  		start += 3;
  		end += 3;

  		var allNews = $( ".service-section .col-md-4" ).length;
  		var a;

		if(allNews%3 != 0)
		{ a = allNews+(3-allNews%3) }
		else
		{ a = allNews;}

		if (end > a) {
			start -= 3;
	  		end -= 3;
		}else{
			console.log(end);
	  		$('.service-section .col-md-4').hide().slice(start, end).show('slow');
		}

  	}

  	}, 400);

  	return false;

});

$('.project-section').bind('mousewheel', function(a){
	var upDown = a.originalEvent.wheelDelta;

	if ( timer ) clearTimeout(timer);

    timer = setTimeout(function(){	

	if(upDown > 0){

		if (start != 0) {
			start -= 3;
  			end -= 3;
		
	  		console.log(start);console.log(end);
	  		$('.project-section .col-md-4').hide().slice(start, end).show('slow');
		
  		}

  	}
  	else
  	{

  		start += 3;
  		end += 3;

  		var allNews = $( ".project-section .col-md-4" ).length;
  		var a;

		if(allNews%3 != 0)
		{ a = allNews+(3-allNews%3) }
		else
		{ a = allNews;}

		if (end > a) {
			start -= 3;
	  		end -= 3;
		}else{
			console.log(end);
	  		$('.project-section .col-md-4').hide().slice(start, end).show('slow');
		}

  	}

  	}, 400);

  	return false;

});

$('.team-section').bind('mousewheel', function(a){
	var upDown = a.originalEvent.wheelDelta;

	if ( timer ) clearTimeout(timer);

    timer = setTimeout(function(){	

	if(upDown > 0){

		if (start != 0) {
			start -= 3;
  			end -= 3;
		
	  		console.log(start);console.log(end);
	  		$('.team-section .col-md-4').hide().slice(start, end).show('slow');
		
  		}

  	}
  	else
  	{

  		start += 3;
  		end += 3;

  		var allNews = $( ".team-section .col-md-4" ).length;
  		var a;

		if(allNews%3 != 0)
		{ a = allNews+(3-allNews%3) }
		else
		{ a = allNews;}

		if (end > a) {
			start -= 3;
	  		end -= 3;
		}else{
			console.log(end);
	  		$('.team-section .col-md-4').hide().slice(start, end).show('slow');
		}

  	}

  	}, 400);

  	return false;

});

$('.container-fluid').bind('mousewheel', function(e){
  var delta = e.originalEvent.wheelDelta;
	start = 0;
	end = 3;

	if ( timer ) clearTimeout(timer);

    timer = setTimeout(function(){
        // Make your AJAX request here...

if(delta > 0){

  	if (show_int == 5){show_int=4}
  	if (show_int > 0){show_int--}
    //go up
    if(show_int == 1){
		$('.service').css('display','none');
		$('.project').css('display','none');
		$('.team').css('display','none');
		$('.about').css('display','block');
		about();
    }else
    if(show_int == 2){
    	$('.about').css('display','none');
		$('.service').css('display','block');
		$('.project').css('display','none');
		$('.team').css('display','none');
		service();
    }else
    if(show_int == 3){
    	$('.about').css('display','none');
		$('.service').css('display','none');
		$('.project').css('display','block');
		$('.team').css('display','none');
		project();
    }else
    if(show_int == 4){
    	$('.about').css('display','none');
		$('.service').css('display','none');
		$('.project').css('display','none');
		$('.team').css('display','block');
		team();
    }




}
else
{
  	if (show_int < 5) {if(show_int==0){show_int=2}else{show_int++}}
    if(show_int == 1){
		$('.service').css('display','none');
		$('.project').css('display','none');
		$('.team').css('display','none');
		$('.about').css('display','block');
		about();
    }else
    if(show_int == 2){
    	$('.about').css('display','none');
		$('.service').css('display','block');
		$('.project').css('display','none');
		$('.team').css('display','none');
		service();
    }else
    if(show_int == 3){
    	$('.about').css('display','none');
		$('.service').css('display','none');
		$('.project').css('display','block');
		$('.team').css('display','none');
		project();
    }else
    if(show_int == 4){
    	$('.about').css('display','none');
		$('.service').css('display','none');
		$('.project').css('display','none');
		$('.team').css('display','block');
		team();
    }
}
}, 400);
});

$( ".parent-red" ).hover(
  function() {


    $($(this).children()).animate({
        width: "0"
    }, 300 );

  }, function() {
    $($(this).children()).animate({
        width: "200px"
    }, 300 );
  }
);