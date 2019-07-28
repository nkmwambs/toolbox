<?php

class Tracer extends CI_controller{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('finance_dashboard');
		$this->load->model('finance_model');
	}
	
	function execution_time($month){
		$month = date('Y-m-01',$month);
		$data['response'] = $this->finance_dashboard->build_dashboard_array($month);
		$this->output->enable_profiler(TRUE);
		$this->load->view('backend/tracer',$data);
	}
	
}
