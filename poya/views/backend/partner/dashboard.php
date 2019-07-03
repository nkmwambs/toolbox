<hr />
<?php
//print_r($projects);
?>
<div class="row">
	<div class="col-xs-12">
		<div class="panel panel-info">
								
				<div class="panel-heading">
					<div class="panel-title"><?= get_phrase('nominate'); ?></div>						
				</div>
										
				<div class="panel-body">
					<!-- <div class="btn btn-warning">Votes Cast</div>
					<hr /> -->
					<?php echo form_open(base_url() . 'poya.php/partner/nominate/', array('id' => 'frm_nominate', 'class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data')); ?>
					
					<div class="form-group">
						<div class="col-xs-12"  style="text-align: center;">
							<h3>Choose an FCP to View a Profile For</h3> 
						</div>
					</div>		
					
					<div class="form-group">
						<div class="col-xs-12">
															
								<?php
									foreach($projects as $projects_row){
								?>
									<div class="btn-toolbar">
										<?php
										foreach($projects_row as $project=>$token){
											
										?>
											<div id="<?=$token;?>" class="btn btn-info project_btn"><?=$project;?></div>
										<?php
										}
										?>
									</div>
								<?php
									}
								?>
								
						</div>
						</div>
						
						<div id="profile">
							
						</div>
					
					
				</div>
			</div>	
	</div>
</div>

<script>
	$('.project_btn').on('click',function(){
		
		$('.project_btn').each(function(i,el){
			if($(el).hasClass('btn-success')){
				$(el).toggleClass('btn-success btn-info');
			}
			
		});
		
		$(this).toggleClass('btn-info btn-success');
		
		var token = $(this).attr('id');
		var fcp = $(this).html();
		var url = "<?=base_url();?>poya.php/partner/retrieve_profiles/"+token;
		
		$.ajax({
			url:url,
			data:{'fcp':fcp},
			type:"POST",
			beforeSend:function(){
				$("#overlay").css('display','block');
			},
			success:function(resp){
				
				$("#profile").html(resp);
				$("#overlay").css('display','none');
			},
			error:function(rhx,msgErr){
				alert(msgErr);
				$("#overlay").css('display','none');
			}
		});
	});
</script>