$(function(){
	var w = $(window).width() + 24,
		$hauses_form = $('.hauses-form'),
		$hause_img = $('.hause-img'),
		colors = ['bg-info','bg-blue','bg-primary'],
		iter = 0;;
	
	$(window).resize(function(){
		w = $(window).width() + 24;
		
		resize_fun();
	});
	
	$('.up-top').click(function(){
		$('html, body').animate({scrollTop: 0},800);
	});
	
	$('.navbar-default .navbar-nav > li > a').click(function(){
		$("html, body").animate({scrollTop: $($(this).attr('href')).offset().top},800);
		
		return false;
	});
	
	resize_fun();
	
	function resize_fun(){
		$('#map .background-cover').css('height', $('#map .background-cover').outerWidth() * 0.708502024291498);
		$('.rectangle').each(function(){
			$(this).height($(this)[0].getBoundingClientRect().width);
		});
		$('.hauses-form').height($('.hauses-form').prev()[0].getBoundingClientRect().width);
		
		if(w <= 992) {
			$('#header .triangle').removeClass('triangle-right').addClass('triangle-bottom');
			$('.triangle-left, .triangle-right').removeClass('triangle-left triangle-right').addClass('triangle-top');
			
			$hauses_form.find('.form-group.row > .col-xs-12:first-child').each(function(){
				var text = $(this).text();
				$(this).next().find('input').attr('placeholder', text);
			});
		} else {
			$('#header .triangle').removeClass('triangle-bottom').addClass('triangle-right');
			$('.triangle-top').removeClass('triangle-top').addClass('triangle-left');
		}
	}
	
	$('.header-feedback-toggle').click(function(){
		$(this).parent().toggleClass('open');
	});
	
	$.each($hause_img,function(i){
		var $this = $(this);
		
		$this
			.next()
			.addClass(colors[iter])
			.find('.triangle')
			.addClass(colors[iter]);
		
		iter++;
		
		if((i + 1) % 3 == 0){
			if(w > 992){
				$this
					.next()
					.find('.triangle')
					.removeClass('triangle-left')
					.addClass('triangle-bottom');
				
	        	$this
					.insertAfter($this.next())
					.addClass('pull-right');
			}
			
			iter = 0;
		}
	});
	
	if($hause_img.length % 3 == 0){
		$hauses_form.removeClass('col-md-12');
		$hauses_form.addClass('col-md-8');
	}
	
	if($hause_img.length - 3 * parseInt($hause_img.length / 3) == 2){
		$hauses_form.removeClass('col-md-12');
		$hauses_form.addClass('col-md-4');
		
		$hauses_form.find('.form-group.row > .col-xs-12:first-child').each(function(){
			var text = $(this).text();
			$(this).next().find('input').attr('placeholder', text);
		});
	}

	var mq = window.matchMedia('(max-width: 991px)');

	console.log(mq.matches);

	if(mq.matches)
	{
		$('#house-h1-box').removeAttr('style');
		$('.hause-inf').removeAttr('style');
	}


});