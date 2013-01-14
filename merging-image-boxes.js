jQuery.noConflict();
(function($) {
			//Paul Irish smartresize : http://paulirish.com/2009/throttled-smartresize-jquery-event-handler/
			(function($,sr){
				// debouncing function from John Hann
				// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
				var debounce = function (func, threshold, execAsap) {
					var timeout;
					return function debounced () {
						var obj = this, args = arguments;
						function delayed () {
							if (!execAsap)
								func.apply(obj, args);
							timeout = null;
						};
						if (timeout)
							clearTimeout(timeout);
						else if (execAsap)
							func.apply(obj, args);
						timeout = setTimeout(delayed, threshold || 100);
					};
				}
				//smartresize
				jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };
			})(jQuery,'smartresize');

	
		$(function() {
		  
				//check if the user made the
				//mistake to open it with IE
				var ie 			= false;
				if ($.browser.msie)
					ie = true;
				//flag to control the click event
				var flg_click	= true;
				//the wrapper
                var $im_wrapper	= $('#im_wrapper');
				//the thumbs
				var $thumbs		= $im_wrapper.children('div');
				//all the images
				var $thumb_imgs = $thumbs.find('img');
				//number of images
				var nmb_thumbs	= $thumbs.length;
				//image loading status
				var $im_loading	= $('#im_loading');
				//the next and previous buttons
				var $im_next	= $('#im_next');
				var $im_prev	= $('#im_prev');
				//number of thumbs per line
				var per_line	= 6;
				//number of thumbs per column
				var per_col		= Math.ceil(nmb_thumbs/per_line)
				//index of the current thumb
				var current		= -1;
				//mode = grid | single
				var mode		= 'grid';
				//an array with the positions of the thumbs
				//we will use it for the navigation in single mode
				var positionsArray = [];
				for(var i = 0; i < nmb_thumbs; ++i)
					positionsArray[i]=i;
				
				
				//preload all the images
				$im_loading.show();
				var loaded		= 0;
				$thumb_imgs.each(function(){
					var $this = $(this);
					$('<img/>').load(function(){
						++loaded;
						if(loaded == nmb_thumbs*2)
							start();
					}).attr('src',$this.attr('src'));
					$('<img/>').load(function(){
						++loaded;
						if(loaded == nmb_thumbs*2)
							start();
					}).attr('src',$this.attr('src').replace('/thumbs',''));
				});
				
				//starts the animation
				function start(){
					$im_loading.hide();
					//disperse the thumbs in a grid
					disperse();
					 
				}
				
				//disperses the thumbs in a grid based on windows dimentions
				function disperse(){
					if(!flg_click) return;
					setflag();
					mode			= 'grid';
					//center point for first thumb along the width of the window
					var spaces_w 	= $(window).width()/(per_line + 1);
					//center point for first thumb along the height of the window
					var spaces_h 	= $(window).height()/(per_col + 1);
					//let's disperse the thumbs equally on the page
					$thumbs.each(function(i){
						var $thumb 	= $(this);
						//calculate left and top for each thumb,
						//considering how many we want per line
						var left	= spaces_w*((i%per_line)+1) - $thumb.width()/2;
						var top		= spaces_h*(Math.ceil((i+1)/per_line)) - $thumb.height()/2;
						//lets give a random degree to each thumb
						var r 		= Math.floor(Math.random()*41)-20;
	
						if(ie)
							var param = {
								'left'		: left + 'px',
								'top'		: top + 'px'
							};
						else
							var param = {
								'left'		: left + 'px',
								'top'		: top + 'px',
								'rotate'	: r + 'deg'
							};
						$thumb.stop()
						.animate(param,700,function(){
							if(i==nmb_thumbs-1)
								setflag();
						})
						.find('img')
						.fadeIn(700,function(){
							$thumb.css({
								'background-image'	: 'none'
							});
							$(this).animate({
								'width'		: '115px',
								'height'	: '115px',
								'marginTop'	: '5px',
								'marginLeft': '5px'
							},150);
						});
					});
				}
				

				function setflag(){
					flg_click = !flg_click
				}
				

				$thumbs.bind('click',function(){
					if(!flg_click) return;
					setflag();
					
					var $this 		= $(this);
					current 		= $this.index();
					
					if(mode	== 'grid'){
						mode			= 'single';
						//the source of the full image
						var image_src	= $this.find('img').attr('src').replace('/thumbs','');
						
						$thumbs.each(function(i){
							var $thumb 	= $(this);
							var $image 	= $thumb.find('img');
							//first we animate the thumb image
							//to fill the thumbs dimentions
							$image.stop().animate({
								'width'		: '100%',
								'height'	: '100%',
								'marginTop'	: '0px',
								'marginLeft': '0px'
							},150,function(){
								//calculate the dimentions of the full image
								var f_w	= per_line * 125;
								var f_h	= per_col * 125;
								var f_l = $(window).width()/2 - f_w/2
								var f_t = $(window).height()/2 - f_h/2
								/*
								set the background image for the thumb
								and animate the thumbs postions and rotation
								 */
								if(ie)
									var param = {
										'left'	: f_l + (i%per_line)*125 + 'px',
										'top'	: f_t + Math.floor(i/per_line)*125 + 'px'
									};
								else
									var param = {
										'rotate': '0deg',
										'left'	: f_l + (i%per_line)*125 + 'px',
										'top'	: f_t + Math.floor(i/per_line)*125 + 'px'
									};
								$thumb.css({
									'background-image'	: 'url('+image_src+')'
								}).stop()
								.animate(param,1200,function(){
									//insert navigation for the single mode
									if(i==nmb_thumbs-1){
										addNavigation();
										setflag();
									}
								});
								//fade out the thumb's image
								$image.fadeOut(700);
							});
						});
					}
					else{
						setflag();
						//remove navigation
						removeNavigation();
						//if we are on single mode then disperse the thumbs
						disperse();
					}
				});
				
				//removes the navigation buttons
				function removeNavigation(){
					$im_next.stop().animate({'right':'-50px'},300);
					$im_prev.stop().animate({'left':'-50px'},300);
				}
				
				//add the navigation buttons
				function addNavigation(){
					$im_next.stop().animate({'right':'0px'},300);
					$im_prev.stop().animate({'left':'0px'},300);
				}
				
				//User clicks next button (single mode)
				$im_next.bind('click',function(){
					if(!flg_click) return;
					setflag();
					
					++current;
					var $next_thumb	= $im_wrapper.children('div:nth-child('+(current+1)+')');
					if($next_thumb.length>0){
						var image_src	= $next_thumb.find('img').attr('src').replace('/thumbs','');
						var arr 		= Array.shuffle(positionsArray.slice(0));
						$thumbs.each(function(i){
							//we want to change each divs background image
							//on a different point of time
							var t = $(this);
							setTimeout(function(){
								t.css({
									'background-image'	: 'url('+image_src+')'
								});
								if(i == nmb_thumbs-1)
									setflag();
							},arr.shift()*20);
						});
					}
					else{
						setflag();
						--current;
						return;
					}
				});
				
				//User clicks prev button (single mode)
				$im_prev.bind('click',function(){
					if(!flg_click) return;
					setflag();
					--current;
					var $prev_thumb	= $im_wrapper.children('div:nth-child('+(current+1)+')');
					if($prev_thumb.length>0){
						var image_src	= $prev_thumb.find('img').attr('src').replace('/thumbs','');
						var arr 		= Array.shuffle(positionsArray.slice(0));
						$thumbs.each(function(i){
							var t = $(this);
							setTimeout(function(){
								t.css({
									'background-image'	: 'url('+image_src+')'
								});
								if(i == nmb_thumbs-1)
									setflag();
							},arr.shift()*20);
						});
					}
					else{
						setflag();
						++current;
						return;
					}
				});
				
				//on windows resize call the disperse function
				$(window).smartresize(function(){
					removeNavigation()
					disperse();
				});
				
				//function to shuffle an array
				Array.shuffle = function( array ){
					for(
					var j, x, i = array.length; i;
					j = parseInt(Math.random() * i),
					x = array[--i], array[i] = array[j], array[j] = x
				);
					return array;
				};
            });

})(jQuery);