<?php

class Request_model extends CI_model{

	function __construct()
	{
		parent::__construct();
	}

	function get_request_ninechang()
	{
		$this->db->select('MA_System..Company_request.id,MA_System..Company_request.created_at,company_name,request_name,request_detail,type_name,request_file,company_certificate,request_status');
		$this->db->from('MA_System..Company_request');
		$this->db->where('MA_System..Company_request.isdelete','0');
		$this->db->join('MA_System..Type_request_topics','MA_System..Company_request.request_topics = MA_System..Type_request_topics.id');
		$this->db->join('MA_System..Type_request','MA_System..Company_request.company_type = MA_System..Type_request.id');
		$this->db->join('MA_System..Company_information','MA_System..Company_request.company_id = MA_System..Company_information.company_id');
		$this->db->order_by('MA_System..Company_request.created_at', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_request_bukkhon()
	{
		$this->db->select('petition_id,HR_PRO..company_petition.created_at,sys_customer_code,HR_PRO..company.name,petition_topics,pettition_details,person_type,petition_book,company_certificate,petition_status');
		$this->db->from('HR_PRO..company_petition');
		$this->db->join('HR_PRO..company','HR_PRO..company_petition.company_id = HR_PRO..company.company_id');
		$this->db->order_by('HR_PRO..company_petition.created_at', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	function update_ninechang($request_id,$params)
	{
		$this->db->where('id',$request_id);
		return $this->db->update('MA_System..Company_request',$params);
	}

	function update_bukkhon($petition_id,$params)
	{
		$this->db->where('petition_id',$petition_id);
		return $this->db->update('HR_PRO..company_petition',$params);
	}
}