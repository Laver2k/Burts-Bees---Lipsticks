$(document).ready(function(){

	//Looks for a 'competition' anchor tag in URL and shows the competition form and scrolls it into view.
	var identifier = window.location.hash; 
	if (identifier === "#competition") {
		$("#form-8hour").show("slow");
		$('body').animate({
			scrollTop: $("#form-8hour").offset().top
		}, 2000);
	}

	var skrollrActive = false;
	//Scrolls images on homepage
	$(function () {  // initialize skrollr if the window width is big enough
		if ($(window).width() > 1019) {
			skrollr.init();
			skrollrActive = true;
		}
		$(window).on('resize', function () { // disable skrollr if the window is resized too small
			if ($(window).width() <= 1019) {
				if(skrollrActive==true) {
					skrollr.get().destroy();
					skrollrActive = false;
				}
			} else { //But if we resize upwards, lets reenable the skrollr again.
				if(skrollrActive==false) {
				skrollr.init();
				skrollrActive = true;
				}
			}
		});
	});

	//8 hour countdown
	var $nextTime = $("#dynamic-countdown").val();
	$("#lipstick-countdown").countdown($nextTime, function(event) {
	    var time = String(event.strftime("%H:%M':%S"));
	    time = time + '"';
	    $(this).text(time);
	});

	//Open side nav
    $("#menu-button").click(function(e){
	    $("#mobile-nav").css("width", "100%");
	    e.preventDefault();
    });

    //Close side nav
    $("#close-button").click(function(e){
		$("#mobile-nav").css("width", "0");
	    e.preventDefault();
    });

	//submit form data through ajax to prevent redirect
	$(document).on("click", "#giveaway-submit", function(e){
		e.preventDefault();
		$('#loading-spinner').show();
		$('#giveaway-submit').hide();
	    $.ajax({
	        url:'../_/ajax/lipsticks.php',
	        type:'post',
	        data:$('#lipstick-giveaway-form').serialize(),
	        success:function(response){
	        	if (response==="") {
					$('#loading-spinner').hide();
					$('#giveaway-submit').show();
	        		$("#lipstick-giveaway-form").hide();
	        		$("#giveaway-thanks").show();
	        	} else {
	        		$("#form-errors p").html(response);
					$('#loading-spinner').hide();
					$('#giveaway-submit').show();
	        	}
	        }
	    });
	});


	//Submit 'read my lips' form
	$(document).on("click", "#read-my-lips-submit", function(e){
		e.preventDefault();
		$('#loading-spinner').show();
		$('#read-my-lips-submit').hide();
	    $.ajax({
	        url:'../_/ajax/read-my-lips.php',
	        type:'post',
	        data:$('#read-my-lips-form').serialize(),
	        success:function(response){
	        	if (response==="") {
					$('#loading-spinner').hide();
					$('#read-my-lips-submit').show();
	        		$("#win-panel").hide();
	        		$("#thanks-panel").show();
					$('body').animate({
						scrollTop: $("#thanks-panel").offset().top - 60
					}, 1);
			

	        	} else {
	        		$("#form-errors p").html(response);
					$('#loading-spinner').hide();
					$('#read-my-lips-submit').show();
	        	}
	        }
	    });
	});


    //Lip smudge slider
    $('.shade-button').click(function(e){
    	e.preventDefault();
    	var newColor = $(this).data("colour");
    	$(".show").removeClass("show");
    	$(".shade-category-current").removeClass("shade-category-current");
    	$("#smudges-"+newColor).addClass("show");
    	$(".arrow-"+newColor).addClass("shade-category-current");
    	switch(newColor){
    		case "pinks":
    		$('.smudge[data-shade="iced-iris"]').click();
    		break;
    		case "nudes":
    		$('.smudge[data-shade="nile-nude"]').click();
    		break;
    		case "reds":
    		$('.smudge[data-shade="scarlet-soaked"]').click();
    		break;
    		case "plums":
    		$('.smudge[data-shade="tulip-tide"]').click();
    		break;
    	}
    });

    //Toggle details for diffent lipstick shades when the smudge is clicked.
    $('.smudge').click(function(e){
    	e.preventDefault();
    	var clickedShade = $(this).data("shade");
    	$(".active").removeClass("active");
    	$(".lips-"+clickedShade).addClass("active");
    	$(this).addClass("active");
    });

    //Open 8-hour form
    $('#get-yours').click(function(){
    	$('#form-8hour').fadeIn('slow');
    });

    //Close 8-hour form
    $('#close-form').click(function(){
    	$('#form-8hour').fadeOut('slow');
    });


    //Animates map pins
    $('.pin-offset').removeClass('pin-offset');

    //Instore experience page field switcher
    $('#consultation-radio-buttons input').click(function(e){ //When a radio button is clicked
    	$('.manchester-date, .glasgow-date, .birmingham-date').hide(); //Hide all the options
		$('#consultation-date, #consultation-time').show(); //Show the dropdown boxes
    	var $city = $('input[name="location"]:checked').val(); //Get the city being clicked on
    	
    	if ($city === "manchester") {
    		$('.manchester-date').show(); //show manchester dates
    	}

     	if ($city === "glasgow") {
    		$('.glasgow-date').show(); //show glasgow dates
    	}

    	if ($city === "birmingham") {
    		$('.birmingham-date').show(); //show birmingham dates
    	}

    	$('#consultation-date').val("select");
    	$('#consultation-time').val("select");
    });


	//Consultation form AJAX
	$(document).on("click", "#consultation-book-now", function(e){
		e.preventDefault();
		$('#loading-spinner').show();
		$('#consultation-book-now').hide();
	    $.ajax({
	        url:'../_/ajax/consultations.php',
	        type:'post',
	        data:$('#consultation-form').serialize(),
	        success:function(response){
	        	if (response==="") {
					$('#loading-spinner').hide();
					$('#consultation-book-now').show();
	        		$("#consultation-form").hide();
	        		$("#consultation-thanks").show();
					$(".background-hands").css("background", "none");
	        	} else {
	        		$("#form-errors p").html(response);
					$('#loading-spinner').hide();
					$('#consultation-book-now').show();
	        	}
	        }
	    });
	});

	//Cycle through clues on Read The Lips competition
	$("#next-clue").click(function(){
		$("#incorrect").hide();

		var question = parseInt($("#current-question").data("question"));

		var answer = $("#answer"+question).data("answer").toString().toLowerCase();
		var userAnswer = $("#answer-input").val().toString().toLowerCase();

		if(userAnswer == answer) { //If correct
			$("#answer-input").val("")
			$("#answer-input").focus();
			if(question < 5) { //If there are more questions
				var offset = (52-104)*question; //Offset is calculated and used for highlighting current question
				question = question+1; //Signal that we want the next question
				$("#current-question").data("question", question); //Change the expected answer for the next question
				var nextVideo = $("#answer"+question).data("video"); //Find out which video to show next
				$("iframe").attr('src', nextVideo);//Show a new video
				$("#clue-hexagons").css('background-position', '0px '+offset+'px'); //Change the current question step image
			} else {
				//Show the competiton form
				$('body').animate({
					scrollTop: $("#quiz-panel").offset().top - 60
				}, 1);
				$("#quiz-panel").hide();
				$("#win-panel").show();
					//Offset scrolling for mobile nav bar,
					//if ($(window).width() < 1020) {
			
					//}
			}

		} else {
			//Incorrect answer
			$("#incorrect").show();
			$("#answer-input").val("")
			$("#answer-input").focus();
		}
	});


	//scroll to consultation form
	$("#book-your-consultation").click(function(){
		$('body').animate({
			scrollTop: $("#book-a-consultation-section").offset().top
		}, 2000);
	});


	//ecard slider
	$slider = $('#card-slider ul').bxSlider({
		nextSelector: '#next-wrapper',
		prevSelector: '#prev-wrapper',
		pager:false,
		nextText: '<img src="img/cards/right.png">',
		prevText: '<img src="img/cards/left.png">',
		touchEnabled: false,
		onSliderLoad: function() {
		$("#card-slider ul li:not([class='bx-clone'])").eq(0).addClass('current');
		},
		onSlideBefore: function() {
		$("#card-slider ul li").removeClass('current');
		current = $slider.getCurrentSlide();
		$("#card-slider ul li:not([class='bx-clone'])").eq(current).addClass('current');
		}
	});


	  //Lip matrix - option selector
	  $('.matrix-row .answer').click(function(){
	  	var $row = $(this).closest(".matrix-row");
	  	$row.find('.answer').removeClass('active');
	  	$row.find('.answer').addClass('inactive');
	  	$(this).removeClass('inactive');
	  	$(this).addClass('active');
	  	$question = $(this).data('question');
	  	$answer = $(this).data('answer');
	  	$("#question"+$question+"-answer").val($answer);
	  });

	  //Lip matrix - show the results
	  $('#see-results').click(function(){
	  	var $combination = "."+$('#question1-answer').val()+"-"+$('#question2-answer').val()+"-"+$('#question3-answer').val();
	  	$('#quiz-section').hide();
	  	$('.lipstick-result').hide();
	  	$($combination).show();
	  	$('#answers-section').show();
		$('body').animate({
			scrollTop: $("#matrix-section").offset().top
		}, 1000);
	  });

	  //Lip matrix - reset the quiz
	  $('#retake-quiz').click(function(){
	  	var $combination = "."+$('#question1-answer').val()+"-"+$('#question2-answer').val()+"-"+$('#question3-answer').val();
	  	$('.lipstick-result').hide();
	  	$('#answers-section').hide();
	  	$('#quiz-section').show();
		$('body').animate({
			scrollTop: $("#matrix-section").offset().top
		}, 1000); 
	  });

	  $("#smile a").click(function(){
		  var $eventLabel = $(this).attr("data-buybutton");
		  ga('send', 'event', 'buy-links', 'clicked', $eventLabel); 
	  });

	  $(".lipstick-result a").click(function(){
		  var $eventLabel = $(this).attr("data-buybutton");
		  ga('send', 'event', 'buy-links', 'clicked', $eventLabel); 
	  });


	 //ecard - switch step.
	$("#personalise-it").click(function(){
		$(".step-1").css("display", "none");
		$(".step-2").css("display", "inline-block");
		$(".card-container .card").addClass("flipped");
		$('body').animate({
			scrollTop: $("#step").offset().top
		}, 100); 

		var $currentCard = $("#card-slider .current img").data("image");
		$("#chosen-card").val($currentCard);

	});

	//ecard - when a lipstick colour is clicked, change the textarea colour
	$("#customise-font img").click(function(){
		var $newColour = $(this).data("color");
		$(".card-message").removeClass("ruby-ripple");
		$(".card-message").removeClass("scarlet-soaked");
		$(".card-message").removeClass("iced-iris");
		$(".card-message").addClass($newColour);
		$("#chosen-font").val($newColour);
	});

	//ecard - when a lip-printclicked, change the card background.
	$("#customise-lips img").click(function(){
		var $newBackgroundColour = $(this).data("print");
		$(".back-1").removeClass("back-1");
		$(".back-2").removeClass("back-2");
		$(".back-3").removeClass("back-3");
		$(".back-4").removeClass("back-4");
		$(".back").addClass($newBackgroundColour);
		$("#chosen-lipstick").val($newBackgroundColour);
	});

	//ecard - step 2 > 1
	$("#go-back").click(function(){
		$(".step-2").css("display", "none");
		$(".step-1").css("display", "inline-block");
		$(".card-container .card").removeClass("flipped");
		$('body').animate({
			scrollTop: $("#step").offset().top
		}, 100); 
	});


	//ecard - step 3 > 2
	$("#go-back-to-customise").click(function(){
		$(".step-3").css("display", "none");
		$(".step-2").css("display", "inline-block");
		$('body').animate({
			scrollTop: $("#step").offset().top
		}, 100); 
	});

	//ecard - step 2 > 3
	$("#happy-with-that").click(function(){
		var $message = $("#card-slider .current .card-message").val();
		$(".card-container .card").addClass("flippable");

		$("#chosen-message").val($message);

		$.ajax({
		    url:'../_/ajax/card-save.php',
		    type:'post',
		    data:$('#share-form-fields').serialize(),
		    success:function(response){
		    	$("#card-id").val(response);
				$(".step-2").css("display", "none");
				$(".step-3").css("display", "inline-block");
				$(".card-container .card").removeClass("flipped");	

				//Update sharing links to use the newly created card ID
				//FB Timeline
				var link = String($("#facebook-timeline-link").attr("href")); 
				var newlink = link.replace(/CARDID/g, $("#card-id").val()); 
				$("#facebook-timeline-link").attr("href", newlink);
				//FB Message
				link = String($("#facebook-message-link").attr("href")); 
				newlink = link.replace(/CARDID/g, $("#card-id").val()); 
				$("#facebook-message-link").attr("href", newlink);
				//Twitter
				link = String($("#tweet-link-link").attr("href")); 
				newlink = link.replace(/CARDID/g, $("#card-id").val()); 
				$("#tweet-link-link").attr("href", newlink);
		    }

		});



	});

	//submit ecard form via email
	$("#share-send").click(function(e){
		e.preventDefault();
		$('#loading-spinner').show();
		$('#share-send').hide();
	    $.ajax({
	        url:'../_/ajax/card-email.php',
	        type:'post',
	        data:$('#share-form-fields').serialize(),
	        success:function(response){
	        	if (response==="") {
					$('#loading-spinner').hide();
	        		$("#share-form").hide();
	        		$(".step-3").css("display", "none");
	        		$("#slider-wrapper").css("display", "none");
	        		$(".step-4").show();
					$('body').animate({
						scrollTop: $("#step").offset().top
					}, 100); 
	        	} else {
	        		$("#form-errors p").html(response);
					$('#loading-spinner').hide();
					$('#share-send').show();

	        	}
	        }

	    });
	});


	//User can only enter 20 words.
	$(".card-message").on('keyup', function() {
		var words = this.value.match(/\S+/g).length;
		if (words > 20) {
		  // Split the string on first 20 words and rejoin on spaces
		  var trimmed = $(this).val().split(/\s+/, 20).join(" ");
		  // Add a space at the end to make sure more typing creates new words
		  $(this).val(trimmed + " ");
		}
	});
	



});

