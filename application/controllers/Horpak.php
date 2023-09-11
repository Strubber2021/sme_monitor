<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horpak extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Horpak_model');
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
		$dateStart = '01/01/'.$yearstart;
		$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart.' - '.$dateEnd;

		if(!empty($this->input->post('daterange'))){
			$date = $this->input->post('daterange');
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);
			$data['thisyear'] = $date1.' - '.$date2;
		}else{
			$datestart = $yearstart."-"."01-01";
			$dateend = $thisyear."-".$thismonth."-".$days;
		}

		// จำนวนผู้สมัครโปรแกรมปีนี้ quarter
		$data['regis_facebook'] = $this->register_4Quarter(1);
		$data['regis_google'] = $this->register_4Quarter(3);
		$data['regis_email'] = $this->register_4Quarter(2);

		$date_thisweek = $this->thisweek();
		foreach($date_thisweek as $value)
		{
			//facebook
			$data['admin_facebook'][] = $this->Horpak_model->get_admin_week(1,$value);
			//google
			$data['admin_google'][] = $this->Horpak_model->get_admin_week(2,$value);
			//email
			$data['admin_email'][] = $this->Horpak_model->get_admin_week(3,$value);
		}

		//เปอร์เซ็นการสมัครบัญชีเข้าใช้งาน
		$data['regis_facebook_all'] = $this->Horpak_model->get_register(1,$datestart,$dateend);
		$data['regis_google_all'] = $this->Horpak_model->get_register(3,$datestart,$dateend);
		$data['regis_email_all'] = $this->Horpak_model->get_register(2,$datestart,$dateend);

		$data['result_total'] = $data['regis_facebook_all']['total']+$data['regis_google_all']['total']+$data['regis_email_all']['total'];
		$data['result_total1'] = $data['result_total'];
		if($data['result_total'] == 0)
		{$data['result_total'] = 1;}

		$data['percent_facebook'] = ($data['regis_facebook_all']['total']*100)/$data['result_total'];
		$data['percent_google'] = ($data['regis_google_all']['total']*100)/$data['result_total'];
		$data['percent_email'] = ($data['regis_email_all']['total']*100)/$data['result_total'];

		$data['part_facebook'] = $this->part_chart($data['percent_facebook']);
		$data['part_google'] = $this->part_chart($data['percent_google']);
		$data['part_email'] = $this->part_chart($data['percent_email']);

		//ผู้ใช้งานระบบที่เพิ่มเข้ามาสัปดาห์นี้
		$date_thisweek = $this->thisweek();
		foreach($date_thisweek as $value)
		{
			//แอดมิน
			$data['admin_thisweek'][] = $this->Horpak_model->get_register_thisweek_admin($value);
			//ผู้ดูแล/นิติ
			$data['employee1_thisweek'][] = $this->Horpak_model->get_register_thisweek($value,1);
			//ช่าง
			$data['employee2_thisweek'][] = $this->Horpak_model->get_register_thisweek($value,2);
			//ผู้เช่า
			$data['employee3_thisweek'][] = $this->Horpak_model->get_register_thisweek($value,3);
		}

		//จำนวนผู้ใช้งานระบบทั้งหมด
		$data['admin_all'] = $this->Horpak_model->get_admin_all($datestart,$dateend);
		$data['employee1_all'] = $this->Horpak_model->get_employee_all(1,$datestart,$dateend);
		$data['employee2_all'] = $this->Horpak_model->get_employee_all(2,$datestart,$dateend);
		$data['employee3_all'] = $this->Horpak_model->get_employee_all(3,$datestart,$dateend);

		$data['user_total'] = $data['admin_all']['total']+$data['employee1_all']['total']+$data['employee2_all']['total']+$data['employee3_all']['total'];
		$data['user_total1'] = $data['user_total'];
		if($data['user_total'] == 0){
			$data['user_total'] = 1;
		}
		$data['percent_admin'] = ($data['admin_all']['total']*100)/$data['user_total'];
		$data['percent_employee1'] = ($data['employee1_all']['total']*100)/$data['user_total'];
		$data['percent_employee2'] = ($data['employee2_all']['total']*100)/$data['user_total'];
		$data['percent_employee3'] = ($data['employee3_all']['total']*100)/$data['user_total'];

		//5 บัญชี ที่เพิ่มเข้ามาใหม่ล่าสุด
		$data['company_recent'] = $this->Horpak_model->get_admin_recent($datestart,$dateend);
		//คำแนะนำและติชมจากผู้ใช้
		$data['comment_topic'] = $this->Horpak_model->get_topic();
		$data['comment'] = $this->Horpak_model->get_comment_all($datestart,$dateend);
		
		//จำนวนการประเมินโปรแกรมทั้งหมด
		$data['monthname_comment'] = $this->get_monthname();
		$data['month_comment_admin'] = $this->get_month_comment_admin();
		$data['month_comment_emp1'] = $this->get_month_comment_type(1);
		$data['month_comment_emp2'] = $this->get_month_comment_type(2);
		$data['month_comment_emp3'] = $this->get_month_comment_type(3);

		//เปอร์เซ็นผลการประเมินโปรแกรม
		$score_sum = count($data['comment']);
		$score_max = $score_sum*20;
		if ($score_max == 0) { $score_max = 1; }
		$score = 0;
		foreach($data['comment'] as $value){
			$sum_evaluate = $value['sum_evaluate'];
			$score = $score+$sum_evaluate;
		}
		$data['percent_program'] = ($score/$score_max)*100;
		$data['level_program'] = $this->reat_program($data['percent_program']);
		$data['month_comment_all'] = $this->get_month_comment_all();

		//tab2 
		//งานแจ้งซ่อม
		$data['result_ma'] = $this->Horpak_model->get_ma_all($datestart,$dateend);
		//ความคิดเห็น
		$data['result_comment'] = $this->Horpak_model->get_evaluate_detail_all($datestart,$dateend);
		
		//อะไหล่
		$result_parts = $this->Horpak_model->get_parts_detail_all($datestart,$dateend);
		$data['result_parts'] = count($result_parts);

		$data['page_type'] = 'horpak';
		$data['page_name'] = 'horpak';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'horpak/js_chartist';
		
		$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}

	public function company()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$thismonth = date('m');
		$thisyear = date('Y');
		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$datestart = "2021-01-01";
		$dateend = $thisyear.'-'.$thismonth.'-'.$days;

		$data['result'] = $this->Horpak_model->get_search_admin_all($datestart,$dateend);

		$data['page_type'] = 'horpak';
		$data['page_name'] = 'horpak_company';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'horpak/js_chartist';
		
		$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}

	public function user()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data = array(
			"total_company" => 0,
			"total_admin" => 0,
			"total_emp1" => 0,
			"total_emp2" => 0,
			"total_emp3" => 0,
			"employees_type" => 'admin'
		);

		$data['list_company'] = $this->Horpak_model->get_company();
	
		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));
		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart1 = '01/01/'.$yearstart;
		$dateEnd1 = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart1.' - '.$dateEnd1;
	
		if(!empty($this->input->post('company_id'))){
			$data['company_id'] = $this->input->post('company_id');
			$data['employees_type'] = $this->input->post('employees_type');
			$date = $this->input->post('daterange');
			
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);

			if($data['company_id']['0'] == "ALL"){

				if($data['employees_type'] == 'admin'){
					//เลือกทั้งหมด/แอดมิน
					$data['result_search'] = $this->Horpak_model->get_search_admin_all($datestart,$dateend);
					$data['total_company'] = count($data['result_search']);
					$data['total_admin'] = $data['total_company'];
				
				}else if($data['employees_type'] == "1"){
					//เลือกทั้งหมด/นิติ
					$data['result_emp'] = $this->Horpak_model->get_searchemp_type_all($data['employees_type'],$datestart,$dateend);
					
					$total_company = $this->Horpak_model->get_total_emptype($data['employees_type'],$datestart,$dateend);
					$data['total_company'] = count($total_company);

					$data['total_emp1'] = count($data['result_emp']);

				}else if($data['employees_type'] == "2"){
					//เลือกทั้งหมด/นายช่าง
					$data['result_emp'] = $this->Horpak_model->get_searchemp_type_all($data['employees_type'],$datestart,$dateend);
					
					$total_company = $this->Horpak_model->get_total_emptype($data['employees_type'],$datestart,$dateend);
					$data['total_company'] = count($total_company);

					$data['total_emp2'] = count($data['result_emp']);
	
				}else{

					//เลือกทั้งหมด/ผู้เช่า
					$data['result_emp'] = $this->Horpak_model->get_searchemp_type_all($data['employees_type'],$datestart,$dateend);
					
					$total_company = $this->Horpak_model->get_total_emptype($data['employees_type'],$datestart,$dateend);
					$data['total_company'] = count($total_company);

					$data['total_emp3'] = count($data['result_emp']);
				}
			}
			else{
				
				//เลือกหอพัก
				$in = '(' ."'". implode("','", $data['company_id'])."'" .')';
				
				if($data['employees_type'] == 'admin'){
					//เลือกหอพัก/แอดมิน
					$data['result_search'] = $this->Horpak_model->get_search_admin_byid($in,$datestart,$dateend);
					$data['total_company'] = count($data['result_search']);
					$data['total_admin'] = $data['total_company'];
				
				}

				else if($data['employees_type'] == "1"){
					//เลือกหอพัก/นิติ
					$data['result_emp'] = $this->Horpak_model->get_searchemp_type_byid($in,$data['employees_type'],$datestart,$dateend);
					
					$total_company = $this->Horpak_model->get_total_emptype_byid($in,$data['employees_type'],$datestart,$dateend);
					$data['total_company'] = count($total_company);

					$data['total_emp1'] = count($data['result_emp']);

				}else if($data['employees_type'] == "2"){
					//เลือกหอพัก/นายช่าง
					$data['result_emp'] = $this->Horpak_model->get_searchemp_type_byid($in,$data['employees_type'],$datestart,$dateend);
					
					$total_company = $this->Horpak_model->get_total_emptype_byid($in,$data['employees_type'],$datestart,$dateend);
					$data['total_company'] = count($total_company);

					$data['total_emp2'] = count($data['result_emp']);
	
				}else{

					//เลือกหอพัก/ผู้เช่า
					$data['result_emp'] = $this->Horpak_model->get_searchemp_type_byid($in,$data['employees_type'],$datestart,$dateend);
					
					$total_company = $this->Horpak_model->get_total_emptype_byid($in,$data['employees_type'],$datestart,$dateend);
					$data['total_company'] = count($total_company);

					$data['total_emp3'] = count($data['result_emp']);
				}
			}
		}

		$data['page_type'] = 'horpak';
		$data['page_name'] = 'horpak_user';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'horpak/js_chartist';
		
		$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}

	function job()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data = array(
			"total_company" => 0,
			"total_job" => 0,
			"total_ma" => 0,
			"total_pm" => 0,
			"job_type" => 'ma'
		);
		$data['list_company'] = $this->Horpak_model->get_company();
		
		if(!empty($this->input->post('company_id'))){

			$data['company_id'] = $this->input->post('company_id');
			$data['job_type'] = $this->input->post('job_type');

			if($data['company_id']['0'] == "ALL"){

				if($data['job_type'] == 'ma'){
					//ma
					$data['result_ma'] = $this->Horpak_model->get_ma_detail_all();
					$data['total_company'] = count($data['result_ma']);

					if(!empty($data['result_ma'])){
						foreach($data['result_ma'] as $value){
							$data['total_job'] += $value['total'];
							$data['total_ma'] = $data['total_job'];
						}
					}
				
				}else{
					//pm
					$data['result_pm'] = $this->Horpak_model->get_pm_detail_all();
					$data['total_company'] = count($data['result_pm']);

					if(!empty($data['result_pm'])){
						foreach($data['result_ma'] as $value){
							$data['total_job'] += $value['total'];
							$data['total_pm'] = $data['total_job'];
						}
					}
				}

			}else{
				//เลือกหอพัก
				$in = '(' ."'". implode("','", $data['company_id'])."'" .')';

				if($data['job_type'] == 'ma'){
					//ma
					$data['result_ma'] = $this->Horpak_model->get_ma_detail_byid($in);
					$data['total_company'] = count($data['result_ma']);

					if(!empty($data['result_ma'])){
						foreach($data['result_ma'] as $value){
							$data['total_job'] += $value['total'];
							$data['total_ma'] = $data['total_job'];
						}
					}
				
				}else{
					//pm
					$data['result_pm'] = $this->Horpak_model->get_pm_detail_all();
					$data['total_company'] = count($data['result_pm']);

					if(!empty($data['result_pm'])){
						foreach($data['result_ma'] as $value){
							$data['total_job'] += $value['total'];
							$data['total_pm'] = $data['total_job'];
						}
					}
				}

			}
		}
		
		$data['page_type'] = 'horpak';
		$data['page_name'] = 'horpak_job';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'horpak/js_chartist';
		
		$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}

	function review()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data = array(
			"total_comment" => 0,
			"total_admin" => 0,
			"total_emp1" => 0,
			"total_emp2" => 0,
			"total_emp3" => 0,
			"employees_type" => 'admin'
		);
		$data['list_company'] = $this->Horpak_model->get_company();
		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));
		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart1 = '01/01/'.$yearstart;
		$dateEnd1 = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart1.' - '.$dateEnd1;

		if(!empty($this->input->post('company_id'))){

			$data['company_id'] = $this->input->post('company_id');
			$data['employees_type'] = $this->input->post('employees_type');
			$date = $this->input->post('daterange');
			
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);

			if($data['company_id']['0'] == "ALL"){

				if($data['employees_type'] == 'admin'){
					//เลือกทั้งหมด/ผู้ดูแล,เจ้าของ
					$data['result_comment'] = $this->Horpak_model->get_evaluate_all($datestart,$dateend);
					$data['total_comment'] = count($data['result_comment']);
					$data['total_admin'] = $data['total_comment'];
				
				}else if($data['employees_type'] == "1"){
					//เลือกทั้งหมด/นิติ
					$data['result_comment'] = $this->Horpak_model->get_evaluate_byemp($data['employees_type'],$datestart,$dateend);
					$data['total_comment'] = count($data['result_comment']);
					$data['total_emp1'] = $data['total_comment'];

				}else if($data['employees_type'] == "2"){
					//เลือกทั้งหมด/นายช่าง
					$data['result_comment'] = $this->Horpak_model->get_evaluate_byemp($data['employees_type'],$datestart,$dateend);
					$data['total_comment'] = count($data['result_comment']);
					$data['total_emp2'] = $data['total_comment'];
	
				}else{
					//เลือกทั้งหมด/ผู้เช่า
					$data['result_comment'] = $this->Horpak_model->get_evaluate_byemp($data['employees_type'],$datestart,$dateend);
					$data['total_comment'] = count($data['result_comment']);
					$data['total_emp3'] = $data['total_comment'];
	
				}

			}else{

				// เลือกหอพัก
				$in = '(' ."'". implode("','", $data['company_id'])."'" .')';

				if($data['employees_type'] == 'admin'){
					//เลือกทั้งหมด/ผู้ดูแล,เจ้าของ
					$data['result_comment'] = $this->Horpak_model->get_evaluate_bycomp($in,$datestart,$dateend);
					$data['total_comment'] = count($data['result_comment']);
					$data['total_admin'] = $data['total_comment'];
				
				}else if($data['employees_type'] == "1"){
					//เลือกทั้งหมด/นิติ
					$data['result_comment'] = $this->Horpak_model->get_evaluate_bycompemp($in,$data['employees_type'],$datestart,$dateend);
					$data['total_comment'] = count($data['result_comment']);
					$data['total_emp1'] = $data['total_comment'];

				}else if($data['employees_type'] == "2"){
					//เลือกทั้งหมด/นายช่าง
					$data['result_comment'] = $this->Horpak_model->get_evaluate_bycompemp($in,$data['employees_type'],$datestart,$dateend);
					$data['total_comment'] = count($data['result_comment']);
					$data['total_emp2'] = $data['total_comment'];
	
				}else{
					//เลือกทั้งหมด/ผู้เช่า
					$data['result_comment'] = $this->Horpak_model->get_evaluate_bycompemp($in,$data['employees_type'],$datestart,$dateend);
					$data['total_comment'] = count($data['result_comment']);
					$data['total_emp3'] = $data['total_comment'];
	
				}

			}

		}

		$data['page_type'] = 'horpak';
		$data['page_name'] = 'horpak_review';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'horpak/js_chartist';
		
		$this->load->view('layouts/index',$data);
		}else{
			redirect('login');
		}
	}

	function parts()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data['list_company'] = $this->Horpak_model->get_company();
		// $data['repair_group'] = $this->Horpak_model->get_repair_group();

		if(!empty($this->input->post('company_id'))){

			$data['company_id'] = $this->input->post('company_id');
			
			if($data['company_id']['0'] == "ALL"){

				$data['result_repair'] = $this->Horpak_model->get_parts_detail();
				
			}else{

				// เลือกหอพัก
				$in = '(' ."'". implode("','", $data['company_id'])."'" .')';
				$data['result_repair'] = $this->Horpak_model->get_parts_detail_bycompid($in);

			}
		}

		$data['page_type'] = 'horpak';
		$data['page_name'] = 'horpak_parts';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'horpak/js_chartist';
		
		$this->load->view('layouts/index',$data);
		
		}else{
			redirect('login');
		}
	}

	public function part_chart($percent)
	{
		$part = 0;
		if($percent > 87.5){
			$part = 8;
		}else if($percent > 75){
			$part = 7;
		}else if($percent > 62.5){
			$part = 6;
		}else if($percent > 50){
			$part = 5;
		}else if($percent > 37.5){
			$part = 4;
		}else if($percent > 25){
			$part = 3;
		}else if($percent > 12.5){
			$part = 2;
		}else if($percent > 0){
			$part = 1;
		}else{
			$part = 0;
		}
		return $part;
	}

	public function register_4Quarter($oauth_provider)
	{
		$thisyear = date('Y');
		$regis_count = [];

		$startQ1 = $thisyear."-01-01";
		$EndQ1 = $thisyear."-03-31";
		$regis_q1 = $this->Horpak_model->get_register($oauth_provider,$startQ1,$EndQ1);
		
		$startQ2 = $thisyear."-04-01";
		$EndQ2 = $thisyear."-06-30";
		$regis_q2 = $this->Horpak_model->get_register($oauth_provider,$startQ2,$EndQ2);
		
		$startQ3 = $thisyear."-07-01";
		$EndQ3 = $thisyear."-09-30";
		$regis_q3 = $this->Horpak_model->get_register($oauth_provider,$startQ3,$EndQ3);
		
		$startQ4 = $thisyear."-10-01";
		$EndQ4 = $thisyear."-12-31";
		$regis_q4 = $this->Horpak_model->get_register($oauth_provider,$startQ4,$EndQ4);
		
		array_push($regis_count,$regis_q1['total'],$regis_q2['total'],$regis_q3['total'],$regis_q4['total']);
		return $regis_count;
	}

	public function transdate($date)
	{
		$date = str_replace('/', '-', $date);
        $date = date('Y-m-d', strtotime($date));
		return $date;
	}

	public function thisweek()
	{
		$data[] = date("Y-m-d", strtotime("previous monday"));
		$data[] = date("Y-m-d", strtotime("previous tuesday"));
		$data[] = date("Y-m-d", strtotime("previous wednesday"));
		$data[] = date("Y-m-d", strtotime("previous thursday"));
		$data[] = date("Y-m-d", strtotime("previous friday"));
		$data[] = date("Y-m-d", strtotime("previous saturday"));
		$data[] = date("Y-m-d", strtotime("previous sunday"));

		return $data;
	}

	public function get_monthname()
	{
		$thismonth = date('m');
		for($i=1; $i<=$thismonth; $i++){
			if($i<10){
				$month_arr[] = "0".$i;
			}else{
				$month_arr[] = $i;
			}
		}
		foreach ($month_arr as $value) {
			$datetime = DateTime::createFromFormat('m', $value);
			$montname = $datetime->format('M');
			$montname_arr[] =	'"'.$montname.'"';
		}
		return $montname_arr;
	}

	public function get_month_comment_admin()
	{
		$thismonth = date('m');
		$thisyear = date('Y');
		for($i=1; $i<=$thismonth; $i++){
			if($i<10){
				$month_arr[] = "0".$i;
			}else{
				$month_arr[] = $i;
			}
		}
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$conment_count[] = $this->Horpak_model->get_comment_count_admin($dateStart,$dateEnd);
		}
		return $conment_count;
	}

	public function get_month_comment_type($employee_type)
	{
		$thismonth = date('m');
		$thisyear = date('Y');
		for($i=1; $i<=$thismonth; $i++){
			if($i<10){
				$month_arr[] = "0".$i;
			}else{
				$month_arr[] = $i;
			}
		}
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$conment_count[] = $this->Horpak_model->get_comment_count_employee($employee_type,$dateStart,$dateEnd);
		}
		return $conment_count;
	}

	public function get_month_comment_all()
	{
		$thismonth = date('m');
		$thisyear = date('Y');
		for($i=1; $i<=$thismonth; $i++){
			if($i<10){
				$month_arr[] = "0".$i;
			}else{
				$month_arr[] = $i;
			}
		}
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$conment_count[] = $this->Horpak_model->get_comment_count_all($dateStart,$dateEnd);
		}
		return $conment_count;
	}

	public function reat_program($score)
	{
		if($score > 80){
			$overall = "ดีมาก";
		}else if($score > 60){
			$overall = "ดี";
		}else if($score > 40){
			$overall = "พอใช้";
		}else{
			$overall = "น้อย";
		}
		return $overall;
	}

}