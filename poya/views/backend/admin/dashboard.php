<?php
//print_r($votes_cast);
?>
<hr />
<div class="row">
	<div class="col-xs-4">
		<select class="form-control">
			<option value=""><?php echo "Choose a Survey ID";?></option>
			<?php foreach($surveys as $survey){?>
				<option value="<?=$survey->poya_survey_id;?>"><?=$survey->limesurvey_id;?> (<?=$survey->cluster_voting_start_date;?> - <?=$survey->national_voting_end_date;?>)</option>
			<?php }?>
		</select>
	</div>
	<div class="col-xs-4">
		<select class="form-control">
			<option value=""><?php echo "Choose Nomination Level";?></option>
			<?php
				foreach($nomination_levels as $nomination_level_key=>$nomination_level){
			?>
				<option value="<?=$nomination_level_key;?>"><?=$nomination_level;?></option>
			<?php
			}
			?>
		</select>
	</div>
	<div class="col-xs-2">
		<div class="btn btn-default" id="btn_go">Go</div>
	</div>
</div>

<hr />

<div class="row">
	<div class="col-xs-12">
		<table class="table table-striped datatable">
			<thead>
				<tr>
					<th>Survey ID</th>
					<th>Nomination Level</th>
					<th>Voted FCP</th>
					<th>Category</th>
					<th>Score</th>
					<th>Vote Submitted Date</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($votes_cast as $vote){?>
					<tr>
						<td><?=$vote->limesurvey_id;?></td>
						<td><?=$nomination_levels[$vote->nomination_level];?></td>
						<td><?=$vote->fcp_id;?></td>
						<td><?=$vote->question_group_name;?></td>
						<td><?=$vote->score;?></td>
						<td><?=$vote->lastmodifieddate;?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>
</div>

<script>
	$(".datatable").DataTable();
	
	$('#btn_go').on('click',function(){
		alert('You have only one survey with 1 level of nomination. Atleast 2 levels are required');
	})
	
</script>