<?php
print_r($grid);

$points = range(0, 10);

?>

<div class="form-group">
	<div class="col-xs-12" style="text-align: center;">
		Check on the Profile Per Category to Nominate
	</div>
</div>

<?php
foreach($grid as $group_key=>$group){
	if(isset($group['group_name'])){
?>

<div class="form-group">
	<div class="col-xs-12">
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a class="btn btn-icon btn-block" data-toggle="collapse" data-parent="#accordion" href="#category_<?=$group_key;?>">
							<i class="fa fa-folder"></i> 
								 <h4><?=$group['group_name'];?></h4>
						</a>
					</h4>
				</div>
				
				<div id="category_<?=$group_key;?>" class="panel-collapse collapse">
					<div class="panel-body">
						<table class="table table-bordered">
							<tbody>
								<?php foreach($group['questions'] as $question){
									
								?>
									<tr>
										<td style="text-align: center">
											<h4><?=$question['question_text'];?></h4>
										</td>
									</tr>
									<tr>
										<td>
											<?php
												if($question['question_type'] == 'U'){
											?>
											<textarea class="form-control" disabled="disabled" rows="25">
												<?=$question['response'];?>
											</textarea>
											
											<?php
												}elseif($question['question_type'] !=='|'){
													if(strpos($question['response'], 'http') !== false){
											?>
													<a target="__blank" href="<?=$question['response'];?>">Click here to view for more information</a>
											<?php
													}
												}elseif($question['question_type'] =='|'){
													foreach($question['response'] as $file_name => $uploaded_file){
											?>		
													<a target="__blank" href="<?=$uploaded_file;?>"><?=$file_name;?></a></br/>
											<?php
													}
												}else{
													echo $question['response'];	
												}
											?>
										</td>
									</tr>
									
								<?php }?>
								<tr>
										<td style="text-align: center;">
											<h4>Nominate</h4>
										</td>
									</tr>
									<tr>
										<td>
											<select class="form-control score" id="score_<?=$group_key;?>"
											 data-survey-id = "<?=$survey_id;?>" 
											  data-nomination-level = "<?=$nomination_level;?>" 
											   data-question-group-id = "<?=$group_key;?>"	
											   	data-token = "<?=$token;?>" 
											   	data-fcp = "<?=$fcp;?>"
											>
												<option value=""><?=get_phrase('select_a_score');?></option>
													<?php
														foreach($points as $point){
													?>
														<option value="<?=$point?>" <?php if($point == $group['score']) echo 'selected';?>><?=$point?></option>
													<?php
														}
													?>
											</select>
										</td>
									</tr>
							</tbody>
						</table>										
					</div>
				</div>		
			</div>	
		</div>		
	</div>
</div>	

<?php
}
}
?>

<script>
	$(".score").on('change',function(){
		
		var url = "<?=base_url();?>poya.php/partner/post_a_score/";
		var data_to_post = $(this).data();
		data_to_post.score = $(this).val();
		
		$.ajax({
			url:url,
			data:data_to_post,
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