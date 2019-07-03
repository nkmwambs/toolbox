<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poya_model extends  CI_Model{
	
	function __construct()
    {
        parent::__construct();
    }
	
	function active_for_voting_survey_id(){
		$survey_id = 0;
		
		$surveys = $this->db->get_where('poya_survey',array('status'=>1));
		
		if($surveys->num_rows()>0){
			$survey_id = $surveys->row()->limesurvey_id;
		}
		
		return $survey_id;
	}
}
