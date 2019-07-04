<?php

class Finance{
	
	function __construct() {

		$this->CI =& get_instance();

		$this -> CI-> load -> model('finance_model');
		
	}
	
	function project_opening_balance_grouped_by_project($project){
		
		$opening_balance = $this->CI->finance_model->project_opening_funds_balances($project);
		
		$opening_balance_accounts = array_column($opening_balance, 'funds');
		$opening_balance_amount = array_column($opening_balance, 'amount');
		
		$opening_balance_account_with_amount = array_combine($opening_balance_accounts, $opening_balance_amount);
		
		return $opening_balance_account_with_amount;
	}
	
	function project_income_at_given_month($project,$month){
		$project_income_at_given_month = $this->CI->finance_model->project_income_at_given_month($project,$month);
		
		$account = array_column($project_income_at_given_month, 'AccNo');
		$amount = array_column($project_income_at_given_month, 'Cost');
		
		return array_combine($account, $amount);
	}
	
	function fund_balance_grid_array($project,$month){
		$revenue_accounts = $this->CI->finance_model->revenue_accounts();
		
		$opening_balance_account_with_amount = $this->project_opening_balance_grouped_by_project($project);
		$project_income_as_at_last_month= $this->project_income_at_given_month($project,strtotime('-1 months',$month));
		
		$grid_array = array();
		
		foreach($revenue_accounts as $account){
			
			$grid_array[$account->AccNo]['opening_balance'] = 0;
			
			$opening_balance = 0;
			
			if(isset($project_income_as_at_last_month[$account->AccNo])){
				$opening_balance = $project_income_as_at_last_month[$account->AccNo];				
			}
			
			
			if(isset($opening_balance_account_with_amount[$account->AccNo])){
				$opening_balance += $opening_balance_account_with_amount[$account->AccNo];				
				$grid_array[$account->AccNo]['opening_balance'] = $opening_balance;
				$grid_array[$account->AccNo]['month_income'] = 0;
			}
		}
		
		return $grid_array;
	}
	
}