<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends CI_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('Request_model');
		$this->load->database();
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
			$data['result_ninechang'] = $this->Request_model->get_request_ninechang();
			$data['request_bukkhon'] = $this->Request_model->get_request_bukkhon();

			$data['page_type'] = 'request';
			$data['page_name'] = 'request';
			$data['page_title'] = 'Program Monitor';
			$data['chart'] = 'request/js_request';
			$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}

	public function update_ninechang()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{

			$id = $this->input->post('request_id');
			$request_status = $this->input->post('request_status');

			if($request_status == '0'){$request_status = '1';}
			else{$request_status = '0';}

			$params = array(
				'request_status' => $request_status,
				'updated_at' => date('Y-m-d H:i:s')
			);

			$update = $this->Request_model->update_ninechang($id,$params);

			if($update == true){
				redirect('Request');
			}else{
				$this->session->set_flashdata('error_message', 'ไม่สามารถดำเนินการได้');
				redirect('Request');
			}
		}else{
			redirect('login');
		}

	}

	public function update_bukkhon()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
			$petition_id = $this->input->post('petition_id');
			$petition_status = $this->input->post('petition_status');

			if($petition_status == '0'){$petition_status = '1';}
			else{$petition_status = '0';}

			$params = array(
				'petition_status' => $petition_status,
				'updated_at' => date('Y-m-d H:i:s')
			);

			$update = $this->Request_model->update_bukkhon($petition_id,$params);

			if($update == true){
				redirect('Request');
			}else{
				$this->session->set_flashdata('error_message', 'ไม่สามารถดำเนินการได้');
				redirect('Request');
			}
		}else{
			redirect('login');
		}

	}
} 