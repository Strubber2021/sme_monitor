<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ninechang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Ninechang_model');
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
			$yearstart = '2021';
			$data['yearNow'] = $thisyear = date('Y');

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
			//date
			$date_thisweek = $this->thisweek();
			$date_previous = $this->previous_week();
			$date_previous2 = $this->previous_2week();

			//month now
			$month_arr = $this->get_month_number();
			//label date
			$data['label_thisweek'] = $this->label_thisweek();
			$data['label_previous'] = $this->label_previous_week();
			$data['label_previous2'] = $this->label_previous_2week();
			//จำนวนผู้เข้าใช้งานสัปดาห์นี้
			$data['login'] = $this->count_login($date_thisweek);
			//จำนวนผู้เข้าใช้งาน 1 สัปดาห์ที่ผ่านมา
			$data['login_previous'] = $this->count_login($date_previous);
			//จำนวนผู้เข้าใช้งาน 2 สัปดาห์ที่ผ่านมา
			$data['login_previous2'] = $this->count_login($date_previous2);
			//จำนวนลงทะเบียนสัปดาห์นี้
			$data['regis_week'] = $this->count_regis($date_thisweek);
			//จำนวนลงทะเบียน 1 สัปดาห์ที่ผ่านมา
			$data['regis_previous'] = $this->count_regis($date_previous);
			//จำนวนลงทะเบียน 2 สัปดาห์ที่ผ่านมา
			$data['regis_previous2'] = $this->count_regis($date_previous2);
			//จำนวนลงทะเบียนใช้งานแต่ละเดือน
			$data['account_month'] = $this->get_month_account($month_arr);
			//จำนวนลงทะเบียนใช้งานรวมแต่ละเดือน
			$data['account_month_all'] = $this->get_month_account_all($month_arr);
			//จำนวนแอดมินและผู้ใช้งานทั้งหมดในระบบแต่ละเดือน
			$data['users_month_all'] = $this->get_month_users_all($month_arr);
			$data['admin_all'] = $this->Ninechang_model->get_admin_all($datestart,$dateend);
			$data['employee1_all'] = $this->Ninechang_model->get_employee_1($datestart,$dateend);
			$data['employee2_all'] = $this->Ninechang_model->get_employee_2($datestart,$dateend);
			$data['user_total'] = $data['admin_all']+$data['employee1_all']+$data['employee2_all'];
			$data['user_total'] == 0 ? 1 : $data['user_total'];
			$data['user_total1'] = $data['user_total'];
			//เปอร์เซ็นจำนวนผู้ใช้งานในระบบ
			$data['percent_admin'] = round(($data['admin_all']*100)/$data['user_total']);
			$data['percent_employee1'] = round(($data['employee1_all']*100)/$data['user_total']);
			$data['percent_employee2'] = round(($data['employee2_all']*100)/$data['user_total']);
			$data['part_admin'] = $this->percent_chart_donut($data['user_total1'],$data['admin_all']);
			$data['part_employee1'] = $this->percent_chart_donut($data['user_total1'],$data['employee1_all']);
			$data['part_employee2'] = $this->percent_chart_donut($data['user_total1'],$data['employee2_all']);
			//เปอร์เซ็นการลงทะเบียนใช้งานระบบ
			$data['regis_facebook_all'] = $this->Ninechang_model->get_register_all1(1,$datestart,$dateend);
			$data['regis_google_all'] = $this->Ninechang_model->get_register_all1(3,$datestart,$dateend);
			$data['regis_email_all'] = $this->Ninechang_model->get_register_all1(2,$datestart,$dateend);
			$data['result_total'] = $data['regis_facebook_all']+$data['regis_google_all']+$data['regis_email_all'];
			$data['result_total'] == 0 ? 1 : $data['result_total'];
			$data['result_total1'] = $data['result_total'];
			$data['percent_facebook'] = round(($data['regis_facebook_all']*100)/$data['result_total']);
			$data['percent_google'] = round(($data['regis_google_all']*100)/$data['result_total']);
			$data['percent_email'] = round(($data['regis_email_all']*100)/$data['result_total']);
			$datenow = date("Y-m-d");
			$yesterday = date('Y-m-d',strtotime($datenow . "-1 days"));
			//จำนวนบัญชีผู้ใช้งานวันก่อนหน้า
			$data['regis_facebook_yesterday'] = $this->Ninechang_model->get_register_all1(1,$datestart,$yesterday);
			$data['regis_google_yesterday'] = $this->Ninechang_model->get_register_all1(3,$datestart,$yesterday);
			$data['regis_email_yesterday'] = $this->Ninechang_model->get_register_all1(2,$datestart,$yesterday);
			$data['total_yesterday'] = $data['regis_facebook_yesterday']+$data['regis_google_yesterday']+$data['regis_email_yesterday'];
			//จำนวนผู้ใช้งานระบบวันก่อนหน้า
			$data['admin_yesterday'] = $this->Ninechang_model->get_admin_all($datestart,$yesterday);
			$data['employee1_yesterday'] = $this->Ninechang_model->get_employee_1($datestart,$yesterday);
			$data['employee2_yesterday'] = $this->Ninechang_model->get_employee_2($datestart,$yesterday);
			$data['user_yesterday'] = $data['admin_yesterday']+$data['employee1_yesterday']+$data['employee2_yesterday'];
			//5 บัญชี ที่เพิ่มเข้ามาใหม่ล่าสุด
			$data['company_recent'] = $this->Ninechang_model->get_admin_recent($datestart,$dateend);
			//คำแนะนำและติชมจากผู้ใช้
			$data['comment'] = $this->Ninechang_model->get_comment($datestart,$dateend);
			$data['comment_topic'] = $this->Ninechang_model->get_topic();
			//จำนวนการประเมินโปรแกรมทั้งหมด
			$data['month_comment_admin'] = $this->get_month_comment_admin($month_arr);
			$data['month_comment_emp1'] = $this->get_month_comment_type(1,$month_arr);
			$data['month_comment_emp2'] = $this->get_month_comment_type(2,$month_arr);
			//จำนวนการส่งคำแนะนำ/ติชมแต่ละเดือน
			$data['month_comment_all'] = $this->get_month_comment_all($month_arr);
			//เปอร์เซ็นผลการประเมินโปรแกรม
			$score_sum = count($data['comment']);
			$score_max = $score_sum*20;
			if ($score_max == 0) { $score_max = 1; }
			$score = 0;
			foreach($data['comment'] as $value){
			    $sum_evaluate = $value['sum_evaluate'];
			    $score = $score+$sum_evaluate;
			}
			$data['percent_program'] = round(($score/$score_max)*100);
			$data['level_program'] = $this->reat_program($data['percent_program']);

			$data['comment_pr'] = $this->Ninechang_model->get_comment_pr($datestart,$dateend);
			
			/* tab 2 */
			//งานแจ้งซ่อม
			$data['result_ma'] = $this->Ninechang_model->get_ma_all($datestart,$dateend);
			//อะไหล่
			$result_parts = $this->Ninechang_model->get_parts_all($datestart,$dateend);
			$result_parts_ma = $this->Ninechang_model->get_parts_ma($datestart,$dateend);
			$data['result_parts'] = $result_parts+$result_parts_ma;
			//เครื่องจักร
			$data['result_equipment'] = $this->Ninechang_model->get_equipment($datestart,$dateend);
			//ความคิดเห็น
			$data['result_comment'] = $this->Ninechang_model->get_evaluate_all($datestart,$dateend);

			
			$data['page_type'] = 'ninechang';
			$data['page_name'] = 'ninechang';
			$data['page_title'] = 'Program Monitor';
			$data['chart'] = 'ninechang/js_chartist';
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

			$data['result'] = $this->Ninechang_model->get_search_company_all($datestart,$dateend);

			$data['page_type'] = 'ninechang';
			$data['page_name'] = 'ninechang_company';
			$data['page_title'] = 'Program Monitor';
			$data['chart'] = 'js';
			
			$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}

	public function user()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
			$data['list_company'] = $this->Ninechang_model->get_company();

			$thismonth = date('m');
			$thisyear = date('Y');
			$yearstart = '2021';
			$data['yearNow'] = $thisyear = date('Y');

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

			if(!empty($this->input->post('company_id'))){
				$data['company_id'] = $this->input->post('company_id');
				$data['total_employee1'] = 0;
				$data['total_employee2'] = 0;
				
				$date = $this->input->post('daterange');
				$daterange = explode(" - ",$date);
				$date1 = $daterange[0];
				$date2 = $daterange[1];
				$datestart = $this->transdate($date1);
				$dateend = $this->transdate($date2);

				if($data['company_id']['0'] == "ALL"){
					$data['result_search'] = $this->Ninechang_model->get_search_company_all($datestart,$dateend);
					$data['total_company'] = count($data['result_search']);
				}else{
					$in = '(' . implode(',', $data['company_id']) .')';
				$data['result_search'] = $this->Ninechang_model->get_search_bycompanyid($in,$datestart,$dateend);
					$data['total_company'] = count($data['company_id']);
				}
				
				if(!empty($data['result_search'])){
					foreach($data['result_search'] as $value)
					{
						$data['total_employee1'] = $data['total_employee1']+$value['total_employee1'];
						$data['total_employee2'] = $data['total_employee2']+$value['total_employee2'];
					}
				}
			}

			
			print_r($this->input->post('company_id'));
				

			$data['page_type'] = 'ninechang';
			$data['page_name'] = 'user';
			$data['page_title'] = 'Program Monitor';
			$data['chart'] = 'js';
			
			$this->load->view('layouts/index',$data);
		
		}else{
			redirect('login');
		}
	}

	public function job()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{

		$data = array(
			"total_company" => 0,
			"total_job" => 0,
			"total_ma" => 0,
			"total_pm" => 0,
			"total_job_ma" => 0,
			"total_job_pm" => 0
		);

		$data['list_company'] = $this->Ninechang_model->get_company();
		
		if(!empty($this->input->post('company_id'))){
			
			$data['company_id'] = $this->input->post('company_id');
			$data['job_type'] = $this->input->post('job_type');

			if($data['company_id']['0'] == "ALL")
			{
				if($data['job_type'] == 1){
					//MA
					$data['result_ma'] = $this->Ninechang_model->get_ma_detail_all();
					$data['total_company'] = count($data['result_ma']);

					if(!empty($data['result_ma'])){
						foreach($data['result_ma'] as $value){
							$data['total_job'] += $value['total'];
							$data['total_ma'] = $data['total_job'];
						}
					}
				}else if($data['job_type'] == 2){
					//PM
					$data['result_pm'] = $this->Ninechang_model->get_pm_detail_all();
					$data['total_company'] = count($data['result_pm']);

					if(!empty($data['result_pm'])){
						foreach($data['result_pm'] as $value){
							$data['total_job'] += $value['total'];
							$data['total_pm'] = $data['total_job'];
						}
					}
				}else{
					//ALL
					$data['result_ma'] = $this->Ninechang_model->get_ma_detail_all();
					$data['result_pm'] = $this->Ninechang_model->get_pm_detail_all();
					$data['total_company'] = count($data['result_ma']) + count($data['result_pm']);

					if(!empty($data['result_ma'])){
						foreach($data['result_ma'] as $value){
							$data['total_job_ma'] += $value['total'];
							$data['total_ma'] = $data['total_job'];
						}
					}

					if(!empty($data['result_pm'])){
						foreach($data['result_pm'] as $value){
							$data['total_job_pm'] += $value['total'];
							$data['total_pm'] = $data['total_job'];
						}
					}
					$data['total_job'] = $data['total_job_ma']+$data['total_job_pm'];
				}
			}
			else{

				$in = '(' . implode(',', $data['company_id']) .')';

				if($data['job_type'] == 1){
					//MA
					$data['result_ma'] = $this->Ninechang_model->get_ma_detail_bycompanyid($in);
					$data['total_company'] = count($data['result_ma']);
					if(!empty($data['result_ma'])){
						foreach($data['result_ma'] as $value){
							$data['total_job'] += $value['total'];
							$data['total_ma'] = $data['total_job'];
						}
					}
				}else if($data['job_type'] == 2){
					//PM
					$data['result_pm'] = $this->Ninechang_model->get_pm_detail_bycompanyid($in);
					$data['total_company'] = count($data['result_pm']);

					if(!empty($data['result_pm'])){
						foreach($data['result_pm'] as $value){
							$data['total_job'] += $value['total'];
							$data['total_pm'] = $data['total_job'];
						}
					}

				}else{
					//ALL
					$data['total_job_ma'] = 0;
					$data['total_job_pm'] = 0;
				
					$data['result_ma'] = $this->Ninechang_model->get_ma_detail_bycompanyid($in);
					$data['result_pm'] = $this->Ninechang_model->get_pm_detail_bycompanyid($in);
					$data['total_company'] = count($data['company_id']);

					if(!empty($data['result_ma'])){
						foreach($data['result_ma'] as $value){
							$data['total_job_ma'] += $value['total'];
							$data['total_ma'] = $data['total_job_ma'];
						}
					}

					if(!empty($data['result_pm'])){
						foreach($data['result_pm'] as $value){
							$data['total_job_pm'] += $value['total'];
							$data['total_pm'] = $data['total_job_pm'];
						}
					}
					
					$data['total_job'] = $data['total_ma']+$data['total_pm'];

				}
			}

		} //IF
		
		$data['page_type'] = 'ninechang';
		$data['page_name'] = 'job';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'js';
		
		$this->load->view('layouts/index',$data);
		}else{
			redirect('login');
		}
	}

	public function parts()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data['list_company'] = $this->Ninechang_model->get_company();
		if(!empty($this->input->post('company_id'))){
			$data['company_id'] = $this->input->post('company_id');
			if($data['company_id']['0'] == "ALL"){

				$result_parts = $this->Ninechang_model->get_parts_detail_all();
				$result_parts_ma = $this->Ninechang_model->get_parts_ma_all();
				$data['result_parts'] = array_merge($result_parts, $result_parts_ma);
			}else{

				// เลือกหอพัก
				$in = '(' ."'". implode("','", $data['company_id'])."'" .')';

				$result_parts = $this->Ninechang_model->get_parts_detail_bycompid($in);
				$result_parts_ma = $this->Ninechang_model->get_parts_ma_bycompid($in);
				$data['result_parts'] = array_merge($result_parts, $result_parts_ma);
			}
		}

		$data['page_type'] = 'ninechang';
		$data['page_name'] = 'parts';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'js';
		
		$this->load->view('layouts/index',$data);
		}else{
			redirect('login');
		}
	}

	public function equipment()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data = array(
			"total_equipment" => 0
		);
		$data['list_company'] = $this->Ninechang_model->get_company();
		
		if(!empty($this->input->post('company_id'))){
			$data['company_id'] = $this->input->post('company_id');
			if($data['company_id']['0'] == "ALL"){
				$data['result_equipment'] = $this->Ninechang_model->get_equipment_detail_all();
				$data['total_equipment'] = count($data['result_equipment']);
			}else{
				$in = '(' ."'". implode("','", $data['company_id'])."'" .')';
				$data['result_equipment'] = $this->Ninechang_model->get_equipment_detail_bycompid($in);
				$data['total_equipment'] = count($data['result_equipment']);
			}
		}
		
		$data['page_type'] = 'ninechang';
		$data['page_name'] = 'equipment';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'js';
		
		$this->load->view('layouts/index',$data);
		}else{
			redirect('login');
		}
	}

	public function evaluate()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data['list_company'] = $this->Ninechang_model->get_company();
		$data['comment_topic'] = $this->Ninechang_model->get_topic();
		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));

		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart = '01/01/'.$yearstart;
		$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart.' - '.$dateEnd;

		if(!empty($this->input->post('company_id'))){

			$data['company_id'] = $this->input->post('company_id');
			$data['user_type'] = $this->input->post('user_type');
			$date = $this->input->post('daterange');
			$data['date_range'] = $this->input->post('daterange');
			$data['evaluate_id'] = $this->input->post('evaluate_id');
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);

			if($data['company_id']['0'] == "ALL")
			{
				//company ALL
				if($data['user_type'] == "ALL"){

					if(!empty($data['evaluate_id'])){
						$status = $this->input->post('status');
						$status = ($status == 0) ? 1 : 0;
						$params = array(
							'status' => $status
						);
						$update = $this->Ninechang_model->update_status_evaluate($data['evaluate_id'],$params);
					}

					//ทั้งหมด
					$data['comment'] = $this->Ninechang_model->get_evaluate_detail_all($datestart,$dateend);
					$data['total_evaluate'] = $this->Ninechang_model->get_evaluate_count_all($datestart,$dateend);
					$data['total_admin'] = $this->Ninechang_model->get_evaluate_count_admin($datestart,$dateend);
					$data['total_employee1'] = $this->Ninechang_model->get_evaluate_count_employee(1,$datestart,$dateend);
					$data['total_employee2'] = $this->Ninechang_model->get_evaluate_count_employee(2,$datestart,$dateend);

					$data['total_evaluate'] = $data['total_evaluate']['total'];
					$data['total_admin'] = $data['total_admin']['total'];
					$data['total_employee1'] = $data['total_employee1']['total'];
					$data['total_employee2'] = $data['total_employee2']['total'];

				}else if($data['user_type'] == 1){
					//แอดมิน

					if(!empty($data['evaluate_id'])){
						$status = $this->input->post('status');
						$status = ($status == 0) ? 1 : 0;
						$params = array(
							'status' => $status
						);
						$update = $this->Ninechang_model->update_status_evaluate($data['evaluate_id'],$params);
					}

					$data['comment'] = $this->Ninechang_model->get_evaluate_detail_admin($datestart,$dateend);
					$data['total_evaluate'] = count($data['comment']);
					$data['total_admin'] = $data['total_evaluate'];

				}else if($data['user_type'] == 2){
					//ผู้แจ้งซ่อม

					if(!empty($data['evaluate_id'])){
						$status = $this->input->post('status');
						$status = ($status == 0) ? 1 : 0;
						$params = array(
							'status' => $status
						);
						$update = $this->Ninechang_model->update_status_evaluate($data['evaluate_id'],$params);
					}

					$data['comment'] = $this->Ninechang_model->get_evaluate_detail_employee(1,$datestart,$dateend);
					$data['total_evaluate'] = count($data['comment']);
					$data['total_employee1'] = $data['total_evaluate'];

				}else{
					//นายช่าง user_type = 3

					if(!empty($data['evaluate_id'])){
						$status = $this->input->post('status');
						$status = ($status == 0) ? 1 : 0;
						$params = array(
							'status' => $status
						);
						$update = $this->Ninechang_model->update_status_evaluate($data['evaluate_id'],$params);
					}

					$data['comment'] = $this->Ninechang_model->get_evaluate_detail_employee(2,$datestart,$dateend);
					$data['total_evaluate'] = count($data['comment']);
					$data['total_employee2'] = $data['total_evaluate'];
				}

			}else{

				$in = '(' . implode(',', $data['company_id']) .')';

				if($data['user_type'] == "ALL"){
					//ทั้งหมด
					if(!empty($data['evaluate_id'])){
						$status = $this->input->post('status');
						$status = ($status == 0) ? 1 : 0;
						$params = array(
							'status' => $status
						);
						$update = $this->Ninechang_model->update_status_evaluate($data['evaluate_id'],$params);
					}

					$data['comment'] = $this->Ninechang_model->get_evaluate_detail_byid($in,$datestart,$dateend);
					$data['total_evaluate'] = $this->Ninechang_model->get_evaluate_count_byid($in,$datestart,$dateend);
					$data['total_admin'] = $this->Ninechang_model->get_evaluate_count_adminbyid($in,$datestart,$dateend);
					$data['total_employee1'] = $this->Ninechang_model->get_evaluate_count_employeebyid($in,1,$datestart,$dateend);
					$data['total_employee2'] = $this->Ninechang_model->get_evaluate_count_employeebyid($in,2,$datestart,$dateend);

					$data['total_evaluate'] = $data['total_evaluate']['total'];
					$data['total_admin'] = $data['total_admin']['total'];
					$data['total_employee1'] = $data['total_employee1']['total'];
					$data['total_employee2'] = $data['total_employee2']['total'];

				}else if($data['user_type'] == 1){
					//แอดมิน
					if(!empty($data['evaluate_id'])){
						$status = $this->input->post('status');
						$status = ($status == 0) ? 1 : 0;
						$params = array(
							'status' => $status
						);
						$update = $this->Ninechang_model->update_status_evaluate($data['evaluate_id'],$params);
					}

					$data['comment'] = $this->Ninechang_model->get_evaluate_detail_adminbyid($in,$datestart,$dateend);
					$data['total_evaluate'] = count($data['comment']);
					$data['total_admin'] = $data['total_evaluate'];

				}else if($data['user_type'] == 2){
					//ผู้แจ้งซ่อม
					if(!empty($data['evaluate_id'])){
						$status = $this->input->post('status');
						$status = ($status == 0) ? 1 : 0;
						$params = array(
							'status' => $status
						);
						$update = $this->Ninechang_model->update_status_evaluate($data['evaluate_id'],$params);
					}

					$data['comment'] = $this->Ninechang_model->get_evaluate_detail_employeebyid($in,1,$datestart,$dateend);
					$data['total_evaluate'] = count($data['comment']);
					$data['total_employee1'] = $data['total_evaluate'];
				}else{
					//นายช่าง user_type = 3
					if(!empty($data['evaluate_id'])){
						$status = $this->input->post('status');
						$status = ($status == 0) ? 1 : 0;
						$params = array(
							'status' => $status
						);
						$update = $this->Ninechang_model->update_status_evaluate($data['evaluate_id'],$params);
					}

					$data['comment'] = $this->Ninechang_model->get_evaluate_detail_employeebyid($in,2,$datestart,$dateend);
					$data['total_evaluate'] = count($data['comment']);
					$data['total_employee2'] = $data['total_evaluate'];
				}
			}
		}

		$data['page_type'] = 'ninechang';
		$data['page_name'] = 'evaluate';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'js';
		
		$this->load->view('layouts/index',$data);
		}else{
			redirect('login');
		}
	}


	public function register_4Quarter($oauth_provider)
	{
		$thisyear = date('Y');
		$regis_count = [];

		$startQ1 = $thisyear."-01-01";
		$EndQ1 = $thisyear."-03-31";
		$regis_q1 = $this->Ninechang_model->get_register($oauth_provider,$startQ1,$EndQ1);
		
		$startQ2 = $thisyear."-04-01";
		$EndQ2 = $thisyear."-06-30";
		$regis_q2 = $this->Ninechang_model->get_register($oauth_provider,$startQ2,$EndQ2);
		
		$startQ3 = $thisyear."-07-01";
		$EndQ3 = $thisyear."-09-30";
		$regis_q3 = $this->Ninechang_model->get_register($oauth_provider,$startQ3,$EndQ3);
		
		$startQ4 = $thisyear."-10-01";
		$EndQ4 = $thisyear."-12-31";
		$regis_q4 = $this->Ninechang_model->get_register($oauth_provider,$startQ4,$EndQ4);
		
		array_push($regis_count,$regis_q1['total'],$regis_q2['total'],$regis_q3['total'],$regis_q4['total']);
		return $regis_count;
	}

	public function percent_chart_donut($total,$result_type)
	{
		$total = $total/8;
		$chart_donut_part1 = $total;
		$chart_donut_part2 = $total*2;
		$chart_donut_part3 = $total*3;
		$chart_donut_part4 = $total*4;
		$chart_donut_part5 = $total*5;
		$chart_donut_part6 = $total*6;
		$chart_donut_part7 = $total*7;
		$chart_donut_part8 = $total*8;

		if($result_type == 0)
		{
			$part = 0;
		}else if($result_type <= $chart_donut_part1){
			$part = 1;
		}else if($result_type > $chart_donut_part1 && $result_type <= $chart_donut_part2){
			$part = 2;
		}else if($result_type > $chart_donut_part2 && $result_type <= $chart_donut_part3){
			$part = 3;
		}else if($result_type > $chart_donut_part3 && $result_type <= $chart_donut_part4){
			$part = 4;
		}else if($result_type > $chart_donut_part4 && $result_type <= $chart_donut_part5){
			$part = 5;
		}else if($result_type > $chart_donut_part5 && $result_type <= $chart_donut_part6){
			$part = 6;
		}else if($result_type > $chart_donut_part6 && $result_type <= $chart_donut_part7){
			$part = 7;
		}else if($result_type > $chart_donut_part7 && $result_type <= $chart_donut_part8){
			$part = 8;
		}
		return $part;
	}

	public function thisweek()
	{
		$data[] = date("Y-m-d", strtotime("Monday this week"));
		$data[] = date("Y-m-d", strtotime("Tuesday this week"));
		$data[] = date("Y-m-d", strtotime("Wednesday this week"));
		$data[] = date("Y-m-d", strtotime("Thursday this week"));
		$data[] = date("Y-m-d", strtotime("Friday this week"));
		$data[] = date("Y-m-d", strtotime("Saturday this week"));
		$data[] = date("Y-m-d", strtotime("Sunday this week"));

		return $data;
	}

	public function label_thisweek()
	{
		$data[] = date("d/m", strtotime("Monday this week"));
		$data[] = date("d/m", strtotime("Tuesday this week"));
		$data[] = date("d/m", strtotime("Wednesday this week"));
		$data[] = date("d/m", strtotime("Thursday this week"));
		$data[] = date("d/m", strtotime("Friday this week"));
		$data[] = date("d/m", strtotime("Saturday this week"));
		$data[] = date("d/m", strtotime("Sunday this week"));

		return $data;
	}

	public function previous_week()
	{
		$previous_week = strtotime("-1 week +1 day");
		$monday = strtotime("-1 week 6 day",$previous_week);
		$tuesday = strtotime("-1 week 7 day",$previous_week);
		$wednesday = strtotime("-1 week 8 day",$previous_week);
		$thursday = strtotime("-1 week 9 day",$previous_week);
		$friday = strtotime("-1 week 10 day",$previous_week);
		$saturday = strtotime("-1 week 11 day",$previous_week);
		$sunday = strtotime("-1 week 12 day",$previous_week);

		$data[] = date("Y-m-d",$monday);
		$data[] = date("Y-m-d",$tuesday);
		$data[] = date("Y-m-d",$wednesday);
		$data[] = date("Y-m-d",$thursday);
		$data[] = date("Y-m-d",$friday);
		$data[] = date("Y-m-d",$saturday);
		$data[] = date("Y-m-d",$sunday);

		return $data;
	}

	public function label_previous_week()
	{
		$previous_week = strtotime("-1 week +1 day");
		$monday = strtotime("-1 week 6 day",$previous_week);
		$tuesday = strtotime("-1 week 7 day",$previous_week);
		$wednesday = strtotime("-1 week 8 day",$previous_week);
		$thursday = strtotime("-1 week 9 day",$previous_week);
		$friday = strtotime("-1 week 10 day",$previous_week);
		$saturday = strtotime("-1 week 11 day",$previous_week);
		$sunday = strtotime("-1 week 12 day",$previous_week);
		
		$data[] = date("d/m",$monday);
		$data[] = date("d/m",$tuesday);
		$data[] = date("d/m",$wednesday);
		$data[] = date("d/m",$thursday);
		$data[] = date("d/m",$friday);
		$data[] = date("d/m",$saturday);
		$data[] = date("d/m",$sunday);

		return $data;
	}

	public function previous_2week()
	{
		$previous_2week = strtotime("-2 week +1 day");
		$previous_1week = strtotime("-1 week +1 day");
		$monday1 = strtotime("-1 week 6 day",$previous_1week);
		$tuesday1 = strtotime("-1 week 7 day",$previous_1week);
		$wednesday1 = strtotime("-1 week 8 day",$previous_1week);
		$thursday1 = strtotime("-1 week 9 day",$previous_1week);
		$friday1 = strtotime("-1 week 10 day",$previous_1week);
		$saturday1 = strtotime("-1 week 11 day",$previous_1week);
		$sunday1 = strtotime("-1 week 12 day",$previous_1week);

		$monday2 = strtotime("-1 week 6 day",$previous_2week);
		$tuesday2 = strtotime("-1 week 7 day",$previous_2week);
		$wednesday2 = strtotime("-1 week 8 day",$previous_2week);
		$thursday2 = strtotime("-1 week 9 day",$previous_2week);
		$friday2 = strtotime("-1 week 10 day",$previous_2week);
		$saturday2 = strtotime("-1 week 11 day",$previous_2week);
		$sunday2 = strtotime("-1 week 12 day",$previous_2week);

		$data[] = date("Y-m-d",$monday2);
		$data[] = date("Y-m-d",$tuesday2);
		$data[] = date("Y-m-d",$wednesday2);
		$data[] = date("Y-m-d",$thursday2);
		$data[] = date("Y-m-d",$friday2);
		$data[] = date("Y-m-d",$saturday2);
		$data[] = date("Y-m-d",$sunday2);
		$data[] = date("Y-m-d",$monday1);
		$data[] = date("Y-m-d",$tuesday1);
		$data[] = date("Y-m-d",$wednesday1);
		$data[] = date("Y-m-d",$thursday1);
		$data[] = date("Y-m-d",$friday1);
		$data[] = date("Y-m-d",$saturday1);
		$data[] = date("Y-m-d",$sunday1);

		return $data;
	}

	public function label_previous_2week()
	{
		$previous_2week = strtotime("-2 week +1 day");
		$previous_1week = strtotime("-1 week +1 day");

		$monday1 = strtotime("-1 week 6 day",$previous_1week);
		$tuesday1 = strtotime("-1 week 7 day",$previous_1week);
		$wednesday1 = strtotime("-1 week 8 day",$previous_1week);
		$thursday1 = strtotime("-1 week 9 day",$previous_1week);
		$friday1 = strtotime("-1 week 10 day",$previous_1week);
		$saturday1 = strtotime("-1 week 11 day",$previous_1week);
		$sunday1 = strtotime("-1 week 12 day",$previous_1week);

		$monday2 = strtotime("-1 week 6 day",$previous_2week);
		$tuesday2 = strtotime("-1 week 7 day",$previous_2week);
		$wednesday2 = strtotime("-1 week 8 day",$previous_2week);
		$thursday2 = strtotime("-1 week 9 day",$previous_2week);
		$friday2 = strtotime("-1 week 10 day",$previous_2week);
		$saturday2 = strtotime("-1 week 11 day",$previous_2week);
		$sunday2 = strtotime("-1 week 12 day",$previous_2week);

		$data[] = date("d/m",$monday2);
		$data[] = date("d/m",$tuesday2);
		$data[] = date("d/m",$wednesday2);
		$data[] = date("d/m",$thursday2);
		$data[] = date("d/m",$friday2);
		$data[] = date("d/m",$saturday2);
		$data[] = date("d/m",$sunday2);
		$data[] = date("d/m",$monday1);
		$data[] = date("d/m",$tuesday1);
		$data[] = date("d/m",$wednesday1);
		$data[] = date("d/m",$thursday1);
		$data[] = date("d/m",$friday1);
		$data[] = date("d/m",$saturday1);
		$data[] = date("d/m",$sunday1);

		return $data;
	}

	public function get_monthname($month_arr)
	{
		foreach ($month_arr as $value) {
			$datetime = DateTime::createFromFormat('m', $value);
			$montname = $datetime->format('M');
			$montname_arr[] =	'"'.$montname.'"';
		}
		return $montname_arr;
	}
	
	public function get_month_comment_admin($month_arr)
	{
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$conment_count[] = $this->Ninechang_model->get_comment_count_admin($dateStart,$dateEnd);
		}
		return $conment_count;
	}
	
	public function get_month_comment_type($employee_type,$month_arr)
	{
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$conment_count[] = $this->Ninechang_model->get_comment_count_employee($employee_type,$dateStart,$dateEnd);
		}
		return $conment_count;
	}

	public function get_month_account($month_arr)
	{
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$account_count[] = $this->Ninechang_model->get_register_all($dateStart,$dateEnd);
		}
		return $account_count;
	}

	public function get_month_account_all($month_arr)
	{
		$thisyear = date('Y');
		$dateStart = $thisyear.'-01-01';
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$account_count[] = $this->Ninechang_model->get_register_all($dateStart,$dateEnd);
		}
		return $account_count;
	}

	public function get_month_users_all($month_arr)
	{	
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;	

			$admin_all = $this->Ninechang_model->get_admin_all($dateStart,$dateEnd);
			$employee1_all = $this->Ninechang_model->get_employee_1($dateStart,$dateEnd);
			$employee2_all = $this->Ninechang_model->get_employee_2($dateStart,$dateEnd);
			$user_count[] = $admin_all+$employee1_all+$employee2_all;

		}
		return $user_count;
	}

	public function get_month_number()
	{
		$thismonth = date('m');

		for($i=1; $i<=$thismonth; $i++){
			if($i<10){
				$month_arr[] = "0".$i;
			}else{
				$month_arr[] = $i;
			}
		}
		return $month_arr;
	}

	public function get_month_comment_all($month_arr)
	{		
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$conment_count[] = $this->Ninechang_model->get_comment_count_all($dateStart,$dateEnd);
		}
		return $conment_count;
	}

	public function reat_program($score)
	{
		if($score > 80){
			$overall = "ดีมาก";
		}else if($score > 65){
			$overall = "ดี";
		}else if($score > 45){
			$overall = "พอใช้";
		}else{
			$overall = "น้อย";
		}
		return $overall;
	}

	public function transdate($date)
	{
		$date = str_replace('/', '-', $date);
        $date = date('Y-m-d', strtotime($date));
		return $date;
	}

	public function fetch_group()
	{
		if($this->input->post('company_id'))
		{
			echo $this->Ninechang_model->fetch_group($this->input->post('company_id'));
		}
	}

	public function count_regis($result_date)
	{
		foreach($result_date as $value){
			//facebook
			$data['admin_facebook'][] = $this->Ninechang_model->get_admin_thisweek_provider(1,$value);
			//email
			$data['admin_email'][] = $this->Ninechang_model->get_admin_thisweek_provider(2,$value);
			//google
			$data['admin_google'][] = $this->Ninechang_model->get_admin_thisweek_provider(3,$value);
		}
		return $data;
	}

	public function count_login($result_date)
	{
		foreach($result_date as $value){
			$data = $this->Ninechang_model->get_login_counter($value);
			$login[] = !empty($data) ? $data['login_count'] : "0";
		}
		return $login;
	}

}