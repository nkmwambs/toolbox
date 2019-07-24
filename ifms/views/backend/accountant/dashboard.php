<?php 
//$month = date('Y-m-t',1522447200);
//print_r($this->finance_model->calculate_uncleared_cash_recieved_and_chqs('CHQ',$month));

//$fcps = $this -> db -> select(array('icpNo')) -> get('projectsdetails') -> result_array();

//print_r($fcps);

//print_r($this->finance_model->prod_pc_per_withdrawal_limit_model($month));


// Avoid the timeout of execution error on dashboard  file
ini_set("max_execution_time", 0);

//print_r($this->finance_model->prod_cash_received_in_month_model('2018-01-01'));

$grid_array = $this -> finance_dashboard -> build_dashboard_array($month);

$none_requested_params = isset($grid_array['parameters']['no']) ? $grid_array['parameters']['no'] : array();

$requested_params = isset($grid_array['parameters']['yes']) ? $grid_array['parameters']['yes'] : array();

if(empty($none_requested_params) && empty($requested_params)){
 	?>
 	<div class='row'>
 		<div class='col-xs-12'>
 			<div class='well' style="text-align: center;">No Parameters and kindly contact system admin to populate  parameters </div>
 		</div>
 		
 	</div>
 	<?php //break;
		}else{
	?>
<div class='row'>
	<div class='col-xs-12'>
		<form class='form-horizontal form-groups-bordered validate'>

			<div class="form-group">
				<label class="control-label col-xs-3">Parameter</label>
				<div class='col-xs-9' id=''>
					<select class="form-control select2" multiple="multiple">
						<option>Select parameter</option>
						<option>Budget Variance</option>
						<option>Count of petty cash transactions</option>
						<option>Percent petty cash transaction</option>
						<option>Bank statement available</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-xs-3">FCP</label>
				<div class="col-xs-9">
					<select class="form-control select2" multiple="multiple">
						<option>Select FCP</option>
						<option>KE0200</option>
						<option>KE0415</option>
						<option>KE0719</option>
						<option>KE0910</option>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-xs-3">Risk Levels</label>
				<div class="col-xs-9">
					<select class="form-control select2" multiple="multiple">
						<option>Select Risk Level</option>
						<option>Low</option>
						<option>Medium</option>
						<option>High</option>
					</select>
				</div>
			</div>

			<div class="form-group">

				<div class="col-xs-offset-6 col-xs-6">
					<button class="btn btn-primary">
						Filter
					</button>
				</div>
			</div>
		</form>

	</div>
</div>
<hr/>

<div class="row">
	
		<div class="col-xs-4">
		
			<a href="" id='btn_last_month' type='submit' class='btn btn-success pull-left'><i class='fa fa-angle-left'></i> Previous Month</a>
			
		</div>
		
	   <div class="col-xs-4" style="text-align: center;">
			<span><h4><?php echo date('F Y', strtotime($month)); ?></h4> </span>
			
	   </div>
	   	<div class="col-xs-4">
			
			<a id='btn_next_month' type='submit' href="" class='btn btn-success pull-right'>Next Month <i class='fa fa-angle-right'></i></a>
			
		</div>
	
	
</div>
<hr />
<div class='row'>
	<div class='col-xs-12'>
		
		<table  class='table table-striped table-responsive datatable'>
			<thead>
				
				<tr>
					<th rowspan="2">FCP ID</th>
					<th rowspan="2">Risk</th>
					<?php if(!empty($none_requested_params)){?>
					<th colspan="<?= count($none_requested_params); ?>">Non Requested Parameters</th>
					<?php } ?>
					<?php if(!empty($requested_params)){?>
					<th colspan="<?= count($requested_params); ?>">Requested Parameters</th>
					<?php } ?>
				</tr>
				<tr>
				
				<?php 
				
				if(!empty($none_requested_params)){
				 foreach ($none_requested_params as $none_requested_param) {
				 ?>
				     
				     <th><?= $none_requested_param; ?></th>
				 <?php }
						}
				?>
				<!--Requested Parameters-->
				
				<?php 
				if(!empty($requested_params)){
				 foreach ($requested_params as $requested_param) {
				 ?>
				     
				     <th><?= $requested_param; ?></th>
				     
				 <?php }
						}
				?>
				
				</tr>
			</thead>
			
			<tbody>
				<?php 
				 foreach ($grid_array['fcps_with_risks'] as $fcp_id => $value) { 
				?>
				   <tr>
				   	 <td style="background-color: black; color: white;"><?= $fcp_id; ?></td>
				   	 <?php if($value['risk']=='Low'){ ?>
				   	 
				   	 <td style="background-color: green; color: white;"><?= $value['risk']; ?></td>
				   	 
				   	 <?php }elseif($value['risk']=='High'){?>
				   	 <td style="background-color: red; color: white;"><?= $value['risk']; ?></td>
				   	 <?php }else{?>
				   	 	<td style="background-color: orange; color: white;"><?= $value['risk']; ?></td>
				   	<?php }?>
				   	 
				   	 <?php
				   	 if(isset($value['params'])){
				   	  foreach ($value['params'] as $param) {
				   	  	if($param=='Yes') {
				   	 ?>
				   	   <td style="background-color: green; color: white;"><?= $param;?></td>
				   	   <?php }else if($param=='No'){?>
				   	   	
				   	   	<td style="background-color: red; color: white;"><?= $param;?></td>
				   	   	
				   	   <?php }elseif(strrchr($param,'Yes')){?>
				   	   	 <td style="background-color: green; color: white;"><?= $param;?></td>
				   	   	<?php } elseif(strrchr($param,'No')){?>
				   	   	  	 <td style="background-color: red; color: white;"><?= $param;?></td>
				   	   	<?php }else{?>
				   	   	
				   	   	 <td><?= $param;?></td>
				   	   	 
				   	   	<?php }?>
				   	  <?php }
							}
				   	  ?>
				   </tr>
				<?php } ?>
			</tbody>
			
		</table>

		

	</div>

</div>
<?php } ?>

<script type="text/javascript">
	jQuery(document).ready(function($) {

		var datatable = $(".datatable").dataTable({
			dom : 'lBfrtip',
			buttons : ['pdf', 'csv', 'excel', 'copy']

		});

		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch : -1
		});
	});

$('#btn_last_month ,#btn_next_month').on('click',function(ev){
	
	if($(this).attr('id')=='btn_last_month')
	{
		 var href='<?=base_url();?>ifms.php/accountant/dashboard/<?=strtotime(date('Y-m-t',strtotime('last day of previous month',strtotime($month))));?>';
		 
		 window.location.href=href;
	}
	else
	{
		var href='<?=base_url();?>ifms.php/accountant/dashboard/<?=strtotime(date('Y-m-t',strtotime('last day of next month',strtotime($month))));?>';
		 
		 window.location.href=href;
	}
	
	ev.preventDefault();
	
});

function modify_td_background_color(){
 	
}

</script>