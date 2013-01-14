<?php
/*
Plugin Name: Merging Image Boxes
Plugin URI: http://graphicedit.com/blog/plugin/merging-image-boxes/
Description: Merging Image Boxes
Version: 1.0.1
Author: GraphicEdit
Author URI: http://www.graphicedit.com/

	Copyright 2011  GraphicEdit (email : contact@graphicedit.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
// init
function merging_image_boxes_init() {
	
	
	add_image_size( 'mib', 125, 125, true ); //(cropped)
	
	$mib_path = plugins_url() . '/merging-image-boxes';
	
	wp_enqueue_style( 'mib_style', $mib_path . '/merging-image-boxes.css'); 
	wp_enqueue_script('jquery');
	
	wp_enqueue_script( 'jquery_transform_js', $mib_path . '/jquery.transform-0.9.1.min.js');
	wp_enqueue_script( 'mib_js', $mib_path . '/merging-image-boxes.js');

	
	
}

// Options Page
function merging_image_boxes_options() {
	
		add_options_page('Merging Image Boxes', 'Merging Image Boxes', 'manage_options', 'merging-image-boxes/merging-image-boxes-options.php');
	
}



//show
function merging_image_boxes_show() {
?>

	<!-- merging_image_boxes [ start ] -->
<div id="im_wrapper" class="im_wrapper">
	<div style="background-position:0px 0px;">
		<img src="<?php echo get_option('merging_image_boxes_1');?>"/></div>
	<div style="background-position:-125px 0px;">
		<img src="<?php echo get_option('merging_image_boxes_2');?>"/></div>
	<div style="background-position:-250px 0px;">
		<img src="<?php echo get_option('merging_image_boxes_3');?>"/></div>
	<div style="background-position:-375px 0px;">
		<img src="<?php echo get_option('merging_image_boxes_4');?>"/></div>
	<div style="background-position:-500px 0px;">
		<img src="<?php echo get_option('merging_image_boxes_5');?>"/></div>
	<div style="background-position:-625px 0px;">
		<img src="<?php echo get_option('merging_image_boxes_6');?>"/></div>

	<div style="background-position:0px -125px;">
		<img src="<?php echo get_option('merging_image_boxes_7');?>"/></div>
	<div style="background-position:-125px -125px;">
		<img src="<?php echo get_option('merging_image_boxes_8');?>"/></div>
	<div style="background-position:-250px -125px;">
		<img src="<?php echo get_option('merging_image_boxes_9');?>"/></div>
	<div style="background-position:-375px -125px;">
		<img src="<?php echo get_option('merging_image_boxes_10');?>"/></div>
	<div style="background-position:-500px -125px;">
		<img src="<?php echo get_option('merging_image_boxes_11');?>"/></div>
	<div style="background-position:-625px -125px;">
		<img src="<?php echo get_option('merging_image_boxes_12');?>"/></div>

	<div style="background-position:0px -250px;">
		<img src="<?php echo get_option('merging_image_boxes_13');?>"/></div>
	<div style="background-position:-125px -250px;">
		<img src="<?php echo get_option('merging_image_boxes_14');?>"/></div>
	<div style="background-position:-250px -250px;">
		<img src="<?php echo get_option('merging_image_boxes_15');?>"/></div>
	<div style="background-position:-375px -250px;">
		<img src="<?php echo get_option('merging_image_boxes_16');?>"/></div>
	<div style="background-position:-500px -250px;">
		<img src="<?php echo get_option('merging_image_boxes_17');?>"/></div>
	<div style="background-position:-625px -250px;">
		<img src="<?php echo get_option('merging_image_boxes_18');?>"/></div>

	<div style="background-position:0px -375px;">
		<img src="<?php echo get_option('merging_image_boxes_19');?>"/></div>
	<div style="background-position:-125px -375px;">
		<img src="<?php echo get_option('merging_image_boxes_20');?>"/></div>
	<div style="background-position:-250px -375px;">
		<img src="<?php echo get_option('merging_image_boxes_21');?>"/></div>
	<div style="background-position:-375px -375px;">
		<img src="<?php echo get_option('merging_image_boxes_22');?>"/></div>
	<div style="background-position:-500px -375px;">
		<img src="<?php echo get_option('merging_image_boxes_23');?>"/></div>
	<div style="background-position:-625px -375px;">
		<img src="<?php echo get_option('merging_image_boxes_24');?>"/></div>
</div>
		
		<div id="im_loading" class="im_loading"></div>
		<div id="im_next" class="im_next"></div>
		<div id="im_prev" class="im_prev"></div>



	<!-- merging_image_boxes [ end ] -->
	
	
<?php
}

/*-------------- settings ---------------------------------*/
add_action( 'init', 'merging_image_boxes_init' );//init
add_action('admin_menu', 'merging_image_boxes_options');//options
add_shortcode( 'mib', 'merging_image_boxes_show' );//[mib]
?>