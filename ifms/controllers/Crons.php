<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Crons extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> library('session');
	}
	
	
	private function clear_cached_data(){
		//$this->db->cache_delete_all();
		//$this->db->cache_delete('accountant', 'dasboard');
		unlink(base_url()."accountant+dashboard");
	}
	
	
	public function minute_jobs(){
		$this->clear_cached_data();
	}
	
	public function semi_hourly_jobs(){
		
	}
	
	public function hourly_jobs(){
		
	}
	
	public function daily_jobs(){
		
	}
	
	public function weekly_jobs(){
		
	}

}
