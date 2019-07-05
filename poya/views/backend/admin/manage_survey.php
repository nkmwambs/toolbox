<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<hr />
<div class="row">
	<div class="col-sm-12">
		<?php echo $output; ?>
	</div>
</div>
 

<script>
	//$('#field-cluster_voting_start_date').removeClass('datepicker-input');
	$('#field-cluster_voting_end_date').addClass('datepicker');
	$('.datepicker').datepicker({
		format:'yyyy-mm-dd'
	});
</script> 