<?php  

function poljavino($tip,$naziv,$placeholder,$poruka)
{
	?>
	<label><?php echo strtoupper(substr($placeholder, 0,1)) . substr($placeholder, 1); ?></label>
	<input 
	<?php 
	if (isset($_POST[$naziv])): 
		?>
	value="<?php echo $_POST[$naziv] ?>"
<?php endif; ?>
type="<?php echo $tip ?>" id="<?php echo $_POST[$naziv] ?>" name="<?php echo $naziv ?>"
placeholder="<?php echo $placeholder ?>"
/>




<?php if (isset($poruka[$naziv])): ?>
	<p class="alert alert-success" id="<?php echo $naziv ?>"><?php echo $poruka[$naziv]; ?></p>
<?php  endif;



}
