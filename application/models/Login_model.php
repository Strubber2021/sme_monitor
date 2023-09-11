<?php

class Login_model extends CI_Model{

	function __construct()
	{
		parent::__construct();
	}

	function LoginFunction(){

		$username = html_escape($this->input->post('username'));
        $password = html_escape($this->input->post('password'));

        $data = array('username' => $username , 'password' => $password);
        $query = $this->db->get_where('ST_MASTER..Login_smemonitor',$data);

        if($query->num_rows() > 0){
            $row = $query->row();
            $this->session->set_userdata('user_id', $row->record_id); 
            $this->session->set_userdata('name', $row->name);
		}
		else if($query->num_rows == 0){
			$this->session->set_flashdata('error_message', '<h4 class="text-danger">Username หรือ Password ไม่ถูกต้อง!</h4>');
        	redirect(base_url().'login','refresh');
		}
	}



}