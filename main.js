if(!Date.prototype.toISOString) 
{
    Date.prototype.toISOString = function() 
	{
        function pad(n) {return n < 10 ? '0' + n : n}
        return this.getUTCFullYear() + '-'
            + pad(this.getUTCMonth() + 1) + '-'
                + pad(this.getUTCDate()) + 'T'
                    + pad(this.getUTCHours()) + ':'
                        + pad(this.getUTCMinutes()) + ':'
                            + pad(this.getUTCSeconds()) + 'Z';
    };
}
function onAfterSlide(obj)
{
	var currentSlide = obj.items.visible;
	jQuery("#" + jQuery(currentSlide).attr("id") + "_content").fadeIn();
	jQuery(".slider_navigation .more").css("display", "none");
	jQuery("#" + jQuery(currentSlide).attr("id") + "_url").css("display", "block");
}
/*function onAfterSlide(prevSlide, currentSlide)
{
	jQuery("#" + jQuery(currentSlide).attr("id") + "_content").fadeIn();
	jQuery(".slider_navigation .more").css("display", "none");
	jQuery("#" + jQuery(currentSlide).attr("id") + "_url").css("display", "block");
}*/
function onBeforeSlide()
{
	jQuery(".slider_content").fadeOut();
}
jQuery(document).ready(function($){
	
	/*Вопрос-ответ*/
	if ($('.faq_cats').is('div')){
		$('.faq_wrap').on('click','.pagn button:not(.active)',function(){
			var pag = $(this);
			var cat = [];
			if ($('.faq_cats ul li ul li').hasClass('active')){
				var ct = $('.faq_cats ul li ul li.active');
			}else{
				var ct = $('.faq_cats li.active');
			}
			cat.push(ct.data('cat'));
			if (ct.find('ul')){
				ct.find('ul').children().each(function(index,el){
					cat.push($(this).data('cat'));
				});
			}
			cat = JSON.stringify(cat);
			$.ajax({
				url : '/wp-admin/admin-ajax.php',
				type : 'POST',
				dataType: 'json',
				data :'action=faqpag&cat='+cat+'&pag='+pag.text(),
				success: function(data) {
					$('.faq_list').html(data.content);
					$('.pagn').html(data.pagination);
					$('html, body').animate({
						scrollTop: $('.faq_wrap').offset().top
					}, 1000);
				}
			});
		});
		
		$('.faq_cats li').click(function(e){
			e.stopPropagation();
			if (!$(this).hasClass('active')){
				var cat = [];
				cat.push($(this).data('cat'));
				if ($(this).find('ul')){
					$(this).find('ul').children().each(function(index,el){
						cat.push($(this).data('cat'));
					});
				}
				cat = JSON.stringify(cat);
				$.ajax({
					url : '/wp-admin/admin-ajax.php',
					type : 'POST',
					dataType: 'json',
					data :'action=faqsel&cat='+cat,
					success: function(data) {
						$('.faq_list').html(data.content);
						if ($('.pagn').is('div')){
							$('.pagn').remove();
						}
						if (data.pagination!=''){
							$('.faq_wrap').append(data.pagination);
						}
					}
				});
				$('.faq_cats li.active').removeClass('active');
				$(this).addClass('active');
				if (!$(this).parent().parent().hasClass('active')){
					$(this).parent().parent('li').addClass('active');
				}
			}
			if ($(this).find('ul')){
				$(this).find('ul').slideToggle(400);
			}
		});
	}
	/*------------*/
	
	/*Страница отзывов*/
	if ($('#rev-form').is('div')){
		$('#revvrach option').each(function(index){
			if (index!=0){
				$('#revvr').append('<option value="'+$(this).val()+'">'+$(this).text()+'</option>');
			}
		});
		$('#revspec option').each(function(index){
			if (index!=0){
				$('#revtp').append('<option value="'+$(this).val()+'">'+$(this).text()+'</option>');
			}
		});
	}
	$('.rev-list').on('click','.revitem_all',function(){
		$(this).parent().toggleClass('ropen');
		$(this).siblings().find('.hidden').slideToggle(300);
	});
	
	$('.mobsel').click(function(){
		$(this).parent().toggleClass('active');
	});
	
	$('#revtypes select').change(function(){
		if ($(this).val()!=0){
			if ($(this).attr('id')=='revvrach'){
				$('.revrach_sel').addClass('active');
				$('.revrach_sel span').html($(this).find('option:selected').text());
			}
			if ($(this).attr('id')=='revtype'){
				$('.revtype_sel').addClass('active');
				$('.revtype_sel span').html($(this).find('option:selected').text());
			}
			if ($(this).attr('id')=='revspec'){
				$('.revspec_sel').addClass('active');
				$('.revspec_sel span').html($(this).find('option:selected').text());
			}
		}else{
			if ($(this).attr('id')=='revvrach'){
				$('.revrach_sel').removeClass('active');
				$('.revrach_sel span').html('');
			}
			if ($(this).attr('id')=='revtype'){
				$('.revtype_sel').removeClass('active');
				$('.revtype_sel span').html('');
			}
			if ($(this).attr('id')=='revspec'){
				$('.revspec_sel').removeClass('active');
				$('.revspec_sel span').html('');
			}
		}
		$('#revtypes').trigger('submit');
	});
	$('.revrach_sel svg').click(function(){
		$('#revvrach option:first').prop('selected',true);
		$('.revrach_sel').removeClass('active');
		$('.revrach_sel span').html('');
		$('#revtypes').trigger('submit');
	});
	$('.revtype_sel svg').click(function(){
		$('#revtype option:first').prop('selected',true);
		$('.revtype_sel').removeClass('active');
		$('.revtype_sel span').html('');
		$('#revtypes').trigger('submit');
	});
	$('.revspec_sel svg').click(function(){
		$('#revspec option:first').prop('selected',true);
		$('.revspec_sel').removeClass('active');
		$('.revspec_sel span').html('');
		$('#revtypes').trigger('submit');
	});
	$('#revtypes').submit(function(e){
		$.ajax({
			url : '/wp-admin/admin-ajax.php',
			type : 'POST',
			dataType: 'json',
			data :'action=revsel&vrach='+$("#revvrach").val()+'&type='+$("#revtype").val()+'&spec='+$("#revspec").val(),
			success: function(data) {
				$('.rev-list').html(data.content);
			}
		});
		return false;
	});
	/*----------------*/
	
	/*Слайдер на главной*/
	if ($('#home_slider').is('section')){
		$('.home_slider_item').each(function(index, element) {
			if ($(window).width()<480){
				$(this).find('img:not(.hsbg,.f_slide)').attr('data-lazy',$(this).attr("data-imgm"));
			}else{
				$(this).find('img:not(.hsbg,.f_slide)').attr('data-lazy',$(this).attr("data-img"));
			}
		});
		$('.home_slider').slick({
			infinite: true,
			lazyLoad: 'ondemand',
			autoplay: true,
			autoplaySpeed: 5000
		});
	}
	/*------------------*/
	
	/*FAQ form modal*/
	$('.btn_faq').click(function(){
		$.fancybox.open({
			src: '#faq-modal',
			type: 'inline'
		});
	});
	/*--------------*/
	/*Бегущая строка скролл*/
	if ($('.runwrap').is('div')){
		$(window).scroll(function(){
			if ($(window).scrollTop()>=$('.runwrap').height()){
				$('body').addClass('runscroll');
			}else{
				$('body').removeClass('runscroll');
			}
		});
	}
	/*---------------------*/
	
	/*Слайдер отзывов на услугах*/
	if ($('.otzivi_slider').is('div')){
		$('.otzivi_slider').on('click','.revitem_all',function(){
			$(this).parent().toggleClass('ropen');
			$(this).siblings().find('.hidden').slideToggle(300);
		});
		$('.otzivi_slider').slick({
			adaptiveHeight:true,
			infinite: true,
			dots:true,
			slidesToShow:3,
			autoplay:true,
			autoplaySpeed:5000,
			responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow:2,
                }
            },
			{
                breakpoint: 768,
                settings: {
                    arrows:false,
					slidesToShow:2
                }
            },	
			{
                breakpoint: 480,
                settings: {
                    slidesToShow:1,
					arrows:false
                }
            }
        ]
		});
	}
	/*--------------------------*/
	
	//mobile menu
	$(".mobile-menu-switch").click(function(event){
		event.preventDefault();
		if(!$(".mobile-menu").is(":visible"))
			$(".mobile-menu-divider").css("display", "block");
		$(".mobile_menu_container nav.mobile_menu").slideToggle(500, function(){
			if(!$(".mobile_menu_container nav.mobile_menu").is(":visible"))
				$(".mobile-menu-divider").css("display", "none");
		});
	});
	$(".collapsible-mobile-submenus .template-arrow-menu").on("click", function(event){
		event.preventDefault();
		$(this).next().slideToggle(300);
		$(this).toggleClass("template-arrow-expanded");
	});
	
	//slider
	$(".slider").carouFredSel({
		responsive: true,
		prev: {
			button: '#prev',
			onAfter: onAfterSlide,
			onBefore: onBeforeSlide,
			fx: config.slider_effect,
			easing: config.slider_transition,
			duration: parseInt(config.slider_transition_speed)
		},
		next: {
			button: '#next',
			onAfter: onAfterSlide,
			onBefore: onBeforeSlide,
			fx: config.slider_effect,
			easing: config.slider_transition,
			duration: parseInt(config.slider_transition_speed)
		},
		auto: {
			play: config.slider_autoplay=="true" ? true : false,
			pauseDuration: parseInt(config.slide_interval),
			onAfter: onAfterSlide,
			onBefore: onBeforeSlide,
			fx: config.slider_effect,
			easing: config.slider_transition,
			duration: parseInt(config.slider_transition_speed)
		}
	},
	{
		wrapper: {
			classname: "caroufredsel_wrapper caroufredsel_wrapper_slider"
		}
	});
	
	//upcoming classes
	$(".upcoming_classes").carouFredSel({
		responsive: ($(".upcoming_classes").children().length>2 ? true : false),
		direction: "up",
		items: {
			visible: 3
		},
		scroll: {
			items: 1,
			easing: "swing",
			pauseOnHover: true
		},
		prev: {
			button: function() {
				return $(this).parent().parent().parent().find('.upcoming_class_prev');
			}
		},
		next: {
			button: function() {
				return $(this).parent().parent().parent().find('.upcoming_class_next');
			}
		},
		auto: {
			play: false
		}
	});
	
	//training_classes
	$(".accordion").accordion({
		event: 'change',
		heightStyle: 'content',
		active: false
	});
	$(".accordion.wide").bind("accordionactivate", function(event, ui){
		$(window).trigger("refresh");
		$("html, body").animate({scrollTop: $("#"+$(ui.newHeader).attr("id")).offset().top}, 400);
	});
	$(".tabs").tabs({
		event: 'change',
		create: function(){
			$("html, body").scrollTop(0);
		}
	});
	
	//browser history
	$(".tabs .ui-tabs-nav a").click(function(){
		if($(this).attr("href").substr(0,4)!="http")
			$.bbq.pushState($(this).attr("href"));
		else
			window.location.href = $(this).attr("href");
	});
	$(".ui-accordion .ui-accordion-header").click(function(){
		$.bbq.pushState("#" + $(this).attr("id").replace("accordion-", ""));
	});
	
	//hashchange
	$(window).bind("hashchange", function(event){
		var hashSplit = $.param.fragment().split("-");
		if(hashSplit[0].substr(0,7)!="filter=" && hashSplit[0].substr(0,4)!="page")
		{
			$('.ui-accordion .ui-accordion-header#accordion-' + decodeURIComponent($.param.fragment())).trigger("change");
			var hashString = "";
			for(var i=0; i<hashSplit.length-1; i++)
				hashString = hashString + hashSplit[i] + (i+1<hashSplit.length-1 ? "-" : "");
			$('.ui-accordion .ui-accordion-header#accordion-' + decodeURIComponent(hashString)).trigger("change");
		}
		$('.tabs .ui-tabs-nav [href="#' + decodeURIComponent($.param.fragment()) + '"]').trigger("change");
		
		// get options object from hash
		var hashOptions = $.deparam.fragment();

		if(typeof(hashOptions.filter)!="undefined")
		{
			// apply options from hash
			$(".isotope_filters a").removeClass("selected");
			if($('.isotope_filters a[href="#filter='+hashOptions.filter+'"]').length)
				$('.isotope_filters a[href="#filter='+hashOptions.filter+'"]').addClass("selected");
			else
				$(".isotope_filters li:first a").addClass("selected");
			$(".theme_gallery").isotope(hashOptions);
			//$(".timetable_isotope").isotope(hashOptions);
		}
		
		if(location.hash.substr(1,7)=="comment")
		{
			if($(location.hash).length)
			{
				var offset = $(location.hash).offset();
				$("html, body").animate({scrollTop: offset.top-10}, 400);
			}
		}
		
		if(location.hash.substr(1,4)=="page")
		{
			if(parseInt($("#comment_form [name='prevent_scroll']").val())==1)
			{
				$("#comment_form [name='prevent_scroll']").val(0);
				$("#comment_form [name='paged']").val(parseInt(location.hash.substr(6)));
			}
			else
			{
				$.ajax({
					url: config.ajaxurl,
					data: "action=theme_get_comments&post_id=" + $("#comment_form [name='post_id']").val() + "&paged="+parseInt(location.hash.substr(6)),
					type: "get",
					dataType: "json",
					success: function(json){
						if(typeof(json.html)!="undefined")
							$("#comments").html(json.html);
						var hashSplit = location.hash.split("/");
						var offset = null;
						if(hashSplit.length==2 && hashSplit[1]!="")
							offset = $("#" + hashSplit[1]).offset();
						else
							offset = $("#comments").offset();
						if(offset!=null)
							$("html, body").animate({scrollTop: offset.top-10}, 400);
						$("#comment_form [name='paged']").val(parseInt(location.hash.substr(6)));
					}
				});
			}
			return;
		}
		
		//open gallery details
		if(location.hash.substr(1,21)=="gallery-details-close" || typeof(hashOptions.filter)!="undefined")
		{
			$(".gallery_item_details_list").animate({height:'0'},{duration:200,easing:'easeOutQuint', complete:function(){
				$(this).css("display", "none")
				$(".gallery_item_details_list .gallery_item_details").css("display", "none");
			}
			});
		}
		else if(location.hash.substr(1,15)=="gallery-details")
		{
			var detailsBlock = $(location.hash);
			$(".gallery_item_details_list .gallery_item_details").css("display", "none");
			detailsBlock.css("display", "block");
			var galleryItem = $("#gallery-item-" + location.hash.substr(17));
			detailsBlock.find(".prev").attr("href", (galleryItem.prevAll(":not('.isotope-hidden')").first().length ? galleryItem.prevAll(":not('.isotope-hidden')").first().find(".open_details").attr("href") : $(".theme_gallery").children(":not('.isotope-hidden')").last().find(".open_details").attr("href")));
			detailsBlock.find(".next").attr("href", (galleryItem.nextAll(":not('.isotope-hidden')").first().length ? galleryItem.nextAll(":not('.isotope-hidden')").first().find(".open_details").attr("href") : $(".theme_gallery").children(":not('.isotope-hidden')").first().find(".open_details").attr("href")));
			var visible=parseInt($(".gallery_item_details_list").css("height"))==0 ? false : true;
			var galleryItemDetailsOffset;
			if(!visible)
			{
				$(".gallery_item_details_list").css("display", "block").animate({height:detailsBlock.height()}, 500, 'easeOutQuint', function(){
					$(this).css("height", "100%");
				});
				galleryItemDetailsOffset = $(".gallery_item_details_list").offset();
				$("html, body").animate({scrollTop: galleryItemDetailsOffset.top-10}, 400);
			}
			else
			{
				/*$(".gallery_item_details_list").animate({height:'0'},{duration:200,easing:'easeOutQuint',complete:function() 
				{
					$(this).css("display", "none")*/
					//$(".gallery_item_details_list").css("height", "100%");
					galleryItemDetailsOffset = $(".gallery_item_details_list").offset();
					$("html, body").animate({scrollTop: galleryItemDetailsOffset.top-10}, 400);
					/*$(".gallery_item_details_list").css("display", "block").animate({height:detailsBlock.height()},{duration:500,easing:'easeOutQuint'});
				}});*/
			}
		}
	}).trigger("hashchange");
	
	//timeago
	/*uncomment and configure timeago strings below if you need
	jQuery.timeago.settings.strings = {
	  prefixAgo: null,
	  prefixFromNow: null,
	  suffixAgo: "ago",
	  suffixFromNow: "from now",
	  seconds: "less than a minute",
	  minute: "about a minute",
	  minutes: "%d minutes",
	  hour: "about an hour",
	  hours: "about %d hours",
	  day: "a day",
	  days: "%d days",
	  month: "about a month",
	  months: "%d months",
	  year: "about a year",
	  years: "%d years",
	  wordSeparator: " ",
	  numbers: []
	};*/
	$("abbr.timeago").timeago();
	
	//footer recent posts, most commented, most viewed
	$(".latest_tweets, .footer_recent_posts, .most_commented, .most_viewed").carouFredSel({
		direction: "up",
		scroll: {
			items: 1,
			easing: "swing",
			pauseOnHover: true,
			height: "variable"
		},
		auto: {
			play: false
		}
	});
	$(".latest_tweets").trigger("configuration", {
		items: {
			visible: ($(".latest_tweets").children().length>2 ? 3 : $(".footer_recent_posts").children().length)
		},
		prev: {
			button: function() {
				return $(this).parent().parent().parent().find('.latest_tweets_prev');
			}
		},
		next: {
			button: function() {
				return $(this).parent().parent().parent().find('.latest_tweets_next');
			}
		}
	});
	$(".footer_recent_posts").trigger("configuration", {
		items: {
			visible: ($(".footer_recent_posts").children().length>2 ? 3 : $(".footer_recent_posts").children().length)
		},
		prev: {
			button: function() {
				return $(this).parent().parent().parent().find('.footer_recent_posts_prev');
			}
		},
		next: {
			button: function() {
				return $(this).parent().parent().parent().find('.footer_recent_posts_next');
			}
		}
	});
	$(".most_commented").trigger("configuration", {
		items: {
			visible: ($(".most_commented").children().length>2 ? 3 : $(".most_commented").children().length)
		},
		prev: {
			button: function() {
				return $(this).parent().parent().parent().find('.most_commented_prev');
			}
		},
		next: {
			button: function() {
                return $(this).parent().parent().parent().find('.most_commented_next');
			}
		}
	});
	$(".most_viewed").trigger("configuration", {
		items: {
			visible: ($(".most_viewed").children().length>2 ? 3 : $(".most_viewed").children().length)
		},
		prev: {
			button: function() {
				return $(this).parent().parent().parent().find('.most_viewed_prev');
			}
		},
		next: {
			button: function() {
				return $(this).parent().parent().parent().find('.most_viewed_next');
			}
		}
	});
	
	function windowResize()
	{
		$(".accordion").each(function(){
			var $this = $(this);
			if($this.hasClass("ui-accordion")) {
				$this.accordion("refresh");
			}
		});
		$(".slider").trigger('configuration', ['debug', false, true]);
		$(".upcoming_classes, .latest_tweets, .footer_recent_posts, .most_commented, .most_viewed").trigger('configuration', ['debug', false, true]);
	}
	//window resize
	$(window).resize(windowResize);
	window.addEventListener('orientationchange', windowResize);
	
	//scroll top
	$("a[href='#top']").click(function() {
		$("html, body").animate({scrollTop: 0}, "slow");
		return false;
	});
	
	//hint
	$(".search input[type='text'], .comment_form input[type='text'], .comment_form textarea, .contact_form input[type='text'], .contact_form textarea, .comment-form-comment textarea,.woocommerce .widget_product_search form .search-field").hint();
	
	//tooltip
	$(".tooltip").bind("mouseover click", function(){
		var position = $(this).position();
		var tooltip_text = $(this).children(".tooltip_text");
		tooltip_text.css("width", $(this).outerWidth() + "px");
		tooltip_text.css("height", tooltip_text.height() + "px");
		tooltip_text.css({"top": position.top-tooltip_text.innerHeight() + "px", "left": position.left + "px"});
	});
	
	//isotope
	//$(".theme_gallery").isotope();
	//$(".timetable_isotope").isotope();
	
	//fancybox
	$(".fancybox").attr("rel", "gallery");
	$(".fancybox").fancybox({
		'speedIn': 600, 
		'speedOut': 200,
		'transitionIn': 'elastic'
	});
	$(".fancybox-video").bind('click',function() 
	{
		$.fancybox(
		{
			'autoScale':false,
			'speedIn': 600, 
			'speedOut': 200,
			'transitionIn': 'elastic',
			'width':(this.href.indexOf("vimeo")!=-1 ? 600 : 680),
			'height':(this.href.indexOf("vimeo")!=-1 ? 338 : 495),
			'href':(this.href.indexOf("vimeo")!=-1 ? this.href : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/')),
			'type':(this.href.indexOf("vimeo")!=-1 ? 'iframe' : 'swf'),
			'swf':
			{
				'wmode':'transparent',
				'allowfullscreen':'true'
			}
		});
		return false;
	});
	$(".fancybox-iframe").fancybox({
		'speedIn': 600, 
		'speedOut': 200,
		'transitionIn': 'elastic',
		'width' : '75%',
		'height' : '75%',
		'autoScale' : false,
		'titleShow': false,
		'type' : 'iframe'
	});
	
	//comment form, contact form
	if($(".contact_form").length)
		$(".contact_form")[0].reset();
	if($(".comment_form").length)
		$(".comment_form")[0].reset();
	$(".comment_form, .contact_form").submit(function(event){
		event.preventDefault();
		var data = $(this).serializeArray();
		var id = $(this).attr("id");
		$("#"+id+" [type='checkbox']:not(:checked)").each(function(){
			data.push({name: $(this).attr("name"), value: 0});
		});
		if(parseInt($("#"+id+" [name='name']").data("required"), 10))
			data.push({name: 'name_required', value: 1});
		if(parseInt($("#"+id+" [name='email']").data("required"), 10))
			data.push({name: 'email_required', value: 1});
		if(parseInt($("#"+id+" [name='website']").data("required"), 10))
			data.push({name: 'website_required', value: 1});
		if(parseInt($("#"+id+" [name='message']").data("required"), 10))
			data.push({name: 'message_required', value: 1});
		data.push({name: 'name_default', value: $("#"+id+" [name='name']").data("default")});
		data.push({name: 'email_default', value: $("#"+id+" [name='email']").data("default")});
		data.push({name: 'website_default', value: $("#"+id+" [name='website']").data("default")});
		data.push({name: 'message_default', value: $("#"+id+" [name='message']").data("default")});
		$("#"+id+" .block").block({
			message: false,
			overlayCSS: {opacity:'0.3'}
		});
		$("#"+id+" [type='submit']").prop("disabled", true);
		$.ajax({
			url: config.ajaxurl,
			data: data,
			type: "post",
			dataType: "json",
			success: function(json){
				$("#"+id+" [name='submit'], #"+id+" [name='name'], #"+id+" [name='email'], #"+id+" [name='website'], #"+id+" [name='message'], #"+id+" .g-recaptcha, #"+id+"terms").qtip('destroy');
				if(typeof(json.isOk)!="undefined" && json.isOk)
				{
					if(typeof(json.submit_message)!="undefined" && json.submit_message!="")
					{
						$("#"+id+" [name='submit']").qtip(
						{
							style: {
								classes: 'ui-tooltip-success'
							},
							content: { 
								text: json.submit_message 
							},
							hide: false,
							position: { 
								my: "right center",
								at: "left center" 
							}
						}).qtip('show');
						//close tooltip after 5 sec
						/*setTimeout(function(){
							$("#"+id+" [name='submit']").qtip("api").hide();
						}, 5000);*/
						if(id=="comment_form" && typeof(json.html)!="undefined")
						{
							$("#comments").html(json.html);
							$("#comment_form [name='comment_parent_id']").val(0);
							if(typeof(json.comment_id)!="undefined" && $("#comments").children().length)
							{
								var offset = $("#comment-" + json.comment_id).offset();
								$("html, body").animate({scrollTop: offset.top-10}, 400);
								if(typeof(json.change_url)!="undefined" && $.param.fragment()!=json.change_url.replace("#", ""))
									$("#comment_form [name='prevent_scroll']").val(1);
							}
							if(typeof(json.change_url)!="undefined")
								window.location.href = json.change_url;
						}
						$("#"+id)[0].reset();
						if(typeof(grecaptcha)!="undefined")
							grecaptcha.reset();
						$("#cancel_comment").css("display", "none");
						$("#"+id+" [name='name'], #"+id+" [name='email'], #"+id+" [name='website'], #"+id+" [name='message']").addClass("hint");
					}
				}
				else
				{
					if(typeof(json.submit_message)!="undefined" && json.submit_message!="")
					{
						$("#"+id+" [name='submit']").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.submit_message 
							},
							position: { 
								my: "right center",
								at: "left center" 
							}
						}).qtip('show');
						if(typeof(grecaptcha)!="undefined" && grecaptcha.getResponse()!="")
							grecaptcha.reset();
					}
					if(typeof(json.error_name)!="undefined" && json.error_name!="")
					{
						$("#"+id+" [name='name']").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.error_name 
							},
							position: { 
								my: "bottom center",
								at: "top center" 
							}
						}).qtip('show');
					}
					if(typeof(json.error_email)!="undefined" && json.error_email!="")
					{
						$("#"+id+" [name='email']").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.error_email 
							},
							position: { 
								my: "bottom center",
								at: "top center" 
							}
						}).qtip('show');
					}
					if(typeof(json.error_website)!="undefined" && json.error_website!="")
					{
						$("#"+id+" [name='website']").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.error_website 
							},
							position: { 
								my: "bottom center",
								at: "top center" 
							}
						}).qtip('show');
					}
					if(typeof(json.error_message)!="undefined" && json.error_message!="")
					{
						$("#"+id+" [name='message']").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.error_message 
							},
							position: { 
								my: "bottom center",
								at: "top center" 
							}
						}).qtip('show');
					}
					if(typeof(json.error_captcha)!="undefined" && json.error_captcha!="")
					{
						$("#"+id+" .g-recaptcha").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.error_captcha 
							},
							position: { 
								my: "bottom left",
								at: "top left" 
							}
						}).qtip('show');
					}
					if(typeof(json.error_terms)!="undefined" && json.error_terms!="")
					{
						$("#"+id+"terms").qtip(
						{
							style: {
								classes: 'ui-tooltip-error'
							},
							content: { 
								text: json.error_terms 
							},
							position: { 
								my: (config.is_rtl ? "bottom right" : "bottom left"),
								at: (config.is_rtl ? "top right" : "top left")
							}
						}).qtip('show');
					}
				}
				$("#"+id+" .block").unblock();
				$("#"+id+" [type='submit']").removeProp("disabled");
			}
		});
	});
	//woocommerce
	$(".woocommerce .quantity .plus").on("click", function(){
		var input = $(this).prev();
		input.val(parseInt(input.val())+1);
		$("input[name='update_cart']").removeAttr("disabled");
	});
	$(".woocommerce .quantity .minus").on("click", function(){
		var input = $(this).next();
		input.val((parseInt(input.val())-1>0 ? parseInt(input.val())-1 : 0));
		$("input[name='update_cart']").removeAttr("disabled");
	});
	$(document.body).on("updated_cart_totals", function(){
		$(".woocommerce .quantity .plus").off("click");
		$(".woocommerce .quantity .plus").on("click", function(){
			var input = $(this).prev();
			input.val(parseInt(input.val())+1);
			$("input[name='update_cart']").removeAttr("disabled");
		});
		$(".woocommerce .quantity .minus").off("click");
		$(".woocommerce .quantity .minus").on("click", function(){
			var input = $(this).next();
			input.val((parseInt(input.val())-1>0 ? parseInt(input.val())-1 : 0));
			$("input[name='update_cart']").removeAttr("disabled");
		});
		var sum = 0;
		$(".shop_table.cart .input-text.qty.text").each(function(){
			sum += parseInt($(this).val());
		});
		if(sum>0)
			$(".cart_items_number").html(sum).css("display", "block");
	});
	$(document.body).on("added_to_cart", function(event, data){
		var sum = 0;
		$(data["div.widget_shopping_cart_content"]).find(".quantity").each(function(){
			sum += parseInt($(this).html());
		});
		if(sum>0)
			$(".cart_items_number").html(sum).css("display", "block");
	});
});