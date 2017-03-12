<?php  
function poljavino($tip,$naziv,$placeholder,$poruka)
{
	?><table class="table table-bordered table-responsive">
<tr>
    	<td><label class="control-label"><?php echo strtoupper(substr($placeholder, 0,1)) . substr($placeholder, 1); ?></label></td>
        <td><input  class="form-control" <?php 
	if (isset($_POST[$naziv])): 
		?>
	value="<?php echo $_POST[$naziv] ?>"
<?php endif; ?>
type="<?php echo $tip ?>" id="<?php echo $_POST[$naziv] ?>" name="<?php echo $naziv ?>"
placeholder="<?php echo $placeholder ?>"
/> </td>
    </tr>
</table>
 <?php if (isset($poruka[$naziv])): ?>
	<p class="alert alert-success" id="<?php echo $naziv ?>"><?php echo $poruka[$naziv]; ?></p>
<?php  endif;   }