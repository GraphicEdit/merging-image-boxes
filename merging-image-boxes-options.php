<?php
if ( $_POST['update_pluginoptions'] == 'true' ) { pluginoptions_update(); }
?>

<div class="wrap">
	<h2>Merging Image Boxes Options</h2>
		
    <div style="margin-left:0px;">
		
		<form method="POST" action="">
			<input type="hidden" name="update_pluginoptions" value="true" />
			
				

			<h4>Row1</h4>
			<p>Image-1: <input type="text" size="100" name="merging_image_boxes_1" id="merging_image_boxes_1" size="32" value="<?php echo get_option('merging_image_boxes_1'); ?>"/></p>
			<p>Image-2: <input type="text" size="100" name="merging_image_boxes_2" id="merging_image_boxes_2" size="32" value="<?php echo get_option('merging_image_boxes_2'); ?>"/></p>
			<p>Image-3: <input type="text" size="100" name="merging_image_boxes_3" id="merging_image_boxes_3" size="32" value="<?php echo get_option('merging_image_boxes_3'); ?>"/></p>
			<p>Image-4: <input type="text" size="100" name="merging_image_boxes_4" id="merging_image_boxes_4" size="32" value="<?php echo get_option('merging_image_boxes_4'); ?>"/></p>
			<p>Image-5: <input type="text" size="100" name="merging_image_boxes_5" id="merging_image_boxes_5" size="32" value="<?php echo get_option('merging_image_boxes_5'); ?>"/></p>
			<p>Image-6: <input type="text" size="100" name="merging_image_boxes_6" id="merging_image_boxes_6" size="32" value="<?php echo get_option('merging_image_boxes_6'); ?>"/></p>
																		
			<h4>Row2</h4>
			<p>Image-7: <input type="text" size="100" name="merging_image_boxes_7" id="merging_image_boxes_7" size="32" value="<?php echo get_option('merging_image_boxes_7'); ?>"/></p>
			<p>Image-8: <input type="text" size="100" name="merging_image_boxes_8" id="merging_image_boxes_8" size="32" value="<?php echo get_option('merging_image_boxes_8'); ?>"/></p>
			<p>Image-9: <input type="text" size="100" name="merging_image_boxes_9" id="merging_image_boxes_9" size="32" value="<?php echo get_option('merging_image_boxes_9'); ?>"/></p>
			<p>Image-10: <input type="text" size="100" name="merging_image_boxes_10" id="merging_image_boxes_10" size="32" value="<?php echo get_option('merging_image_boxes_10'); ?>"/></p>
			<p>Image-11: <input type="text" size="100" name="merging_image_boxes_11" id="merging_image_boxes_11" size="32" value="<?php echo get_option('merging_image_boxes_11'); ?>"/></p>
			<p>Image-12: <input type="text" size="100" name="merging_image_boxes_12" id="merging_image_boxes_12" size="32" value="<?php echo get_option('merging_image_boxes_12'); ?>"/></p>

			<h4>Row3</h4>
			<p>Image-13: <input type="text" size="100" name="merging_image_boxes_13" id="merging_image_boxes_13" size="32" value="<?php echo get_option('merging_image_boxes_13'); ?>"/></p>
			<p>Image-14: <input type="text" size="100" name="merging_image_boxes_14" id="merging_image_boxes_14" size="32" value="<?php echo get_option('merging_image_boxes_14'); ?>"/></p>
			<p>Image-15: <input type="text" size="100" name="merging_image_boxes_15" id="merging_image_boxes_15" size="32" value="<?php echo get_option('merging_image_boxes_15'); ?>"/></p>
			<p>Image-16: <input type="text" size="100" name="merging_image_boxes_16" id="merging_image_boxes_16" size="32" value="<?php echo get_option('merging_image_boxes_16'); ?>"/></p>
			<p>Image-17: <input type="text" size="100" name="merging_image_boxes_17" id="merging_image_boxes_17" size="32" value="<?php echo get_option('merging_image_boxes_17'); ?>"/></p>
			<p>Image-18: <input type="text" size="100" name="merging_image_boxes_18" id="merging_image_boxes_18" size="32" value="<?php echo get_option('merging_image_boxes_18'); ?>"/></p>
		
			<h4>Row4</h4>
			<p>Image-19: <input type="text" size="100" name="merging_image_boxes_19" id="merging_image_boxes_19" size="32" value="<?php echo get_option('merging_image_boxes_19'); ?>"/></p>
			<p>Image-20: <input type="text" size="100" name="merging_image_boxes_20" id="merging_image_boxes_20" size="32" value="<?php echo get_option('merging_image_boxes_20'); ?>"/></p>
			<p>Image-21: <input type="text" size="100" name="merging_image_boxes_21" id="merging_image_boxes_21" size="32" value="<?php echo get_option('merging_image_boxes_21'); ?>"/></p>
			<p>Image-22: <input type="text" size="100" name="merging_image_boxes_22" id="merging_image_boxes_22" size="32" value="<?php echo get_option('merging_image_boxes_22'); ?>"/></p>
			<p>Image-23: <input type="text" size="100" name="merging_image_boxes_23" id="merging_image_boxes_23" size="32" value="<?php echo get_option('merging_image_boxes_23'); ?>"/></p>
			<p>Image-24: <input type="text" size="100" name="merging_image_boxes_24" id="merging_image_boxes_24" size="32" value="<?php echo get_option('merging_image_boxes_24'); ?>"/></p>

		

		
			<input type="submit" name="Submit" value="Update Options" class="button" />
		</form>
		     
	</div>
</div>


<?php
function pluginoptions_update()
{
	
	update_option('merging_image_boxes_1', 	$_POST['merging_image_boxes_1']);
	update_option('merging_image_boxes_2', 	$_POST['merging_image_boxes_2']);
	update_option('merging_image_boxes_3', 	$_POST['merging_image_boxes_3']);
	update_option('merging_image_boxes_4', 	$_POST['merging_image_boxes_4']);
	update_option('merging_image_boxes_5', 	$_POST['merging_image_boxes_5']);
	update_option('merging_image_boxes_6', 	$_POST['merging_image_boxes_6']);
	update_option('merging_image_boxes_7', 	$_POST['merging_image_boxes_7']);
	update_option('merging_image_boxes_8', 	$_POST['merging_image_boxes_8']);
	update_option('merging_image_boxes_9', 	$_POST['merging_image_boxes_9']);
	update_option('merging_image_boxes_10', 	$_POST['merging_image_boxes_10']);
	update_option('merging_image_boxes_11', 	$_POST['merging_image_boxes_11']);
	update_option('merging_image_boxes_12', 	$_POST['merging_image_boxes_12']);
	update_option('merging_image_boxes_13', 	$_POST['merging_image_boxes_13']);
	update_option('merging_image_boxes_14', 	$_POST['merging_image_boxes_14']);
	update_option('merging_image_boxes_15', 	$_POST['merging_image_boxes_15']);
	update_option('merging_image_boxes_16', 	$_POST['merging_image_boxes_16']);
	update_option('merging_image_boxes_17', 	$_POST['merging_image_boxes_17']);
	update_option('merging_image_boxes_18', 	$_POST['merging_image_boxes_18']);
	update_option('merging_image_boxes_19', 	$_POST['merging_image_boxes_19']);
	update_option('merging_image_boxes_20', 	$_POST['merging_image_boxes_20']);
	update_option('merging_image_boxes_21', 	$_POST['merging_image_boxes_21']);
	update_option('merging_image_boxes_22', 	$_POST['merging_image_boxes_22']);
	update_option('merging_image_boxes_23', 	$_POST['merging_image_boxes_23']);
	update_option('merging_image_boxes_24', 	$_POST['merging_image_boxes_24']);
	
	


	
	
}
?>
