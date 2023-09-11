<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SME extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('SME_model');
		$this->load->helper('url', 'form');
		$this->load->database();
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));
		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart ='01/'.$thismonth.'/'.$thisyear;
		$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thismonth'] = $dateStart.' - '.$dateEnd;

		if(!empty($this->input->post('daterange'))){

			$date = $this->input->post('daterange');
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);

			$data['contact'] = $this->SME_model->get_contact_daterange($datestart,$dateend);

			$date_search1 = date('d/m/Y', strtotime($datestart));
			$date_search2 = date('d/m/Y', strtotime($dateend));
			$data['thismonth'] = $date_search1.' - '.$date_search2;

		}else{

			$data['contact'] = $this->SME_model->get_contact();
		}
		
		$data['x'] = 0;
		$data['page_type'] = 'sme';
		$data['page_name'] = 'sme';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'board/js_chartist';
		
		$this->load->view('layouts/index',$data);
		}else{
			redirect('login');
		}
	}

	public function transdate($date)
	{
		$date = str_replace('/', '-', $date);
        $date = date('Y-m-d', strtotime($date));
		return $date;
	}
}