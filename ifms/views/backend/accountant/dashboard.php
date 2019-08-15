<?php
//echo strtotime('2018-04-01');
//print_r($this->finance_model->prod_deposit_in_transit_data_model('2018-03-01'));
//echo date('Y-m-t',$this->finance_model->month);//date('Y-m-t',$this->finance_model->month);
// Avoid the timeout of execution error on dashboard  file
ini_set("max_execution_time", 0);

//print_r($this->finance_model->prod_cash_received_in_month_model('2018-01-01'));

$grid_array = $this -> finance_dashboard -> build_dashboard_array($month);

//print_r($grid_array['benchmark']);

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
<!--Filters to be completed in the next sprint -->
<!-- <div class='row'>
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
</div> -->
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
				   	 <td>

				   	 	<div class="btn-group">
							<button id="" type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
						    	<?= $fcp_id; ?> <span class="caret"></span>
						    </button>
						    	<ul class="dropdown-menu dropdown-default pull-left" role="menu">
									<li  style="">
										<a href="#" onclick="showAjaxModal('<?php echo base_url();?>ifms.php/modal/popup/modal_outstanding_cheques/<?php echo date('Y-m-t',strtotime($month));?>/<?=$fcp_id;?>')"><?php echo get_phrase('outstanding_cheques');?></a>
									</li>

									<li  style="" class="divider"></li>

									<li style="">
										<a href="#" onclick="showAjaxModal('<?php echo base_url();?>ifms.php/modal/popup/modal_transit_deposits/<?php echo date('Y-m-t',strtotime($month));?>/<?=$fcp_id;?>')"><?php echo get_phrase('deposits_in_transit');?></a>
									</li>

									<li style="<" class="divider"></li>

									<li style="">
										<a href="#" onclick="showAjaxModal('<?php echo base_url();?>ifms.php/modal/popup/modal_bank_reconcile/<?php echo date('Y-m-t',strtotime($month));?>/<?=$fcp_id;?>')"><?php echo get_phrase('bank_reconciliation');?></a>
									</li>

									<li style="" class="divider"></li>

									<li>
										<a href="#" onclick="showAjaxModal('<?php echo base_url();?>ifms.php/modal/popup/modal_variance_explanation/<?php echo date('Y-m-t',strtotime($month));?>/<?=$fcp_id;?>')"><?php echo get_phrase('variance_explanation');?></a>
									</li>

									<li class="divider"></li>

									<li style="">
										<a href="#" onclick="showAjaxModal('<?php echo base_url();?>ifms.php/modal/popup/modal_proof_of_cash/<?php echo date('Y-m-t',strtotime($month));?>/<?=$fcp_id;?>')"><?php echo get_phrase('proof_of_cash');?></a>

									</li>

									<li style="" class="divider"></li>

									<li>
										<a href="#" onclick="showAjaxModal('<?php echo base_url();?>ifms.php/modal/popup/modal_fund_balances/<?php echo date('Y-m-t',strtotime($month));?>/<?=$fcp_id;?>')"><?php echo get_phrase('fund_balance_report');?></a>

									</li>

									<li class="divider"></li>

									<li>
										<a href="#" onclick="showAjaxModal('<?php echo base_url();?>ifms.php/modal/popup/modal_expense_report/<?php echo date('Y-m-t',strtotime($month));?>/<?=$fcp_id;?>')"><?php echo get_phrase('expense_report');?></a>

									</li>

									<li class="divider"></li>

									<li>
										<a href="#" onclick="showAjaxModal('<?php echo base_url();?>ifms.php/modal/popup/modal_fund_ratios/<?php echo date('Y-m-t',strtotime($month));?>/<?=$fcp_id;?>')"><?php echo get_phrase('financial_ratios');?></a>

									</li>


									<li class="divider"></li>

										<li style="">
											<a href="<?php echo base_url();?>ifms.php/accountant/cash_journal/<?php echo strtotime($month);?>/<?=$fcp_id;?>"><?php echo get_phrase('cash_journal');?></a>
										</li>

									<li class="divider"></li>

										<li style="">
											<a href="<?php echo base_url();?>ifms.php/accountant/bank_statements/<?php echo strtotime($month);?>/<?=$fcp_id;?>"><?php echo get_phrase('bank_statements');?></a>
										</li>


									<li class="divider"></li>

										<li style="">
											<a href="<?php echo base_url();?>ifms.php/accountant/plans/<?=strtotime($month);?>/<?=$fcp_id;?>"><?php echo get_phrase('budget');?></a>
										</li>

									<li class="divider"></li>
						        </ul>
						    </div>
				   	 </td>
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
			buttons : ['pdf', 'csv', 'excel', 'copy'],
			lengthMenu: [[25,50, 100, 150,-1], [25,50 ,100,150 ,"All"]],
			pageLength: 25
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
