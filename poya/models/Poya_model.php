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
	
	function get_active_survey(){
		$survey = array();
		
		$surveys = $this->db->get_where('poya_survey',array('status'=>1));
		
		if($surveys->num_rows()>0){
			$survey = $surveys->row();
		}
		
		return $survey;
	}
	
	function nomination_levels(){
		return array('1'=>'Cluster Level','2'=>'Regional Level','3'=>'National Level');
	}
	
	function get_all_surveys(){
		return $this->db->get('poya_survey')->result_object();	
	}
	
	function cast_votes_summary_per_level($survey_id, $nom_level= ""){
		
		$nomination_level = ($nom_level == "")?$this->poya_model->get_nomination_level():$nom_level;
		
		$this->db->select(array('limesurvey_id','nomination_level','fcp_id','question_group_name','score','lastmodifieddate'));
		
		$votes_obj = $this->db->get_where('poya_vote',
		array('nomination_level'=>$nomination_level,'limesurvey_id'=>$survey_id));
		
		$voters = array();
		
		if($votes_obj->num_rows()>0){
			$voters = $votes_obj->result_object();
		}
		
		return $voters;
	}
	
	function get_nomination_level() {
		$active_survey = (array)$this -> poya_model -> get_active_survey();

		extract($active_survey);

		$current_date = date('Y-m-d');

		$nomination_level = 0;

		if (strtotime($current_date) < strtotime($cluster_voting_start_date) && $cluster_voting_start_date == "0000-00-00") {
			//Voting has not begun

		} elseif (strtotime($current_date) >= strtotime($cluster_voting_start_date) && strtotime($current_date) < strtotime($cluster_voting_end_date)) {
			//We are cluster nomination level
			$nomination_level = 1;

		} elseif (strtotime($current_date) >= strtotime($regional_voting_start_date) && strtotime($current_date) < strtotime($regional_voting_end_date)) {
			//We are regional voting
			$nomination_level = 2;

		} elseif (strtotime($current_date) >= strtotime($national_voting_start_date) && strtotime($current_date) < strtotime($national_voting_end_date)) {
			//We are national voting
			$nomination_level = 3;

		} else {
			//Survey is closed
		}

		return $nomination_level;
	}
}
