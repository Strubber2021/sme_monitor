<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Jobth_model');
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
			// $yearstart = date('Y', strtotime('-1 years'));
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

			//จำนวนผู้ใช้งานในระบบ
			$data['employers_all'] = $this->Jobth_model->get_employers_all($datestart,$dateend);
			$data['users_all'] = $this->Jobth_model->get_users_all($datestart,$dateend);
			$data['account_all'] = $data['users_all']+$data['employers_all'];
			$data['account_all1'] = $data['users_all']+$data['employers_all'];
			if($data['account_all']==0){$data['account_all']=1;}
			//เปอร์เซ็นจำนวนผู้ใช้งานในระบบ
			$data['percent_employers'] = ($data['employers_all']*100)/$data['account_all'];
			$data['percent_users'] = ($data['users_all']*100)/$data['account_all'];
			$data['part_employer'] = $this->percent_chart_donut($data['account_all1'],$data['employers_all']);
			$data['part_user'] = $this->percent_chart_donut($data['account_all1'],$data['users_all']);
			//จำนวนบัญชีผู้ใช้งานวันก่อนหน้า
			$datenow = date("Y-m-d");
			$yesterday = date('Y-m-d',strtotime($datenow . "-1 days"));
			$data['employers_yesterday'] = $this->Jobth_model->get_employers_all($datestart,$yesterday);
			$data['users_yesterday'] = $this->Jobth_model->get_users_all($datestart,$yesterday);
			$data['account_yesterday'] = $data['employers_yesterday']+$data['users_yesterday'];
			//เปอร์เซ็นแสดงทั้งหมด(ใช้ *10 สร้างเส้นprogress-bar)
			$data['percent_account'] = ($data['account_all']*10)/$data['account_all'];
			//5 บัญชี ที่เพิ่มเข้ามาใหม่ล่าสุด
			$data['employers_recent'] = $this->Jobth_model->get_employers_recent($datestart,$dateend);
			$data['users_recent'] = $this->Jobth_model->get_users_recent($datestart,$dateend);
			//คำแนะนำและติชมจากผู้ใช้
			$data['review_program'] = $this->Jobth_model->get_review_program($datestart,$dateend);
			$data['review_program_all'] = count($data['review_program']);
			//จำนวนการประเมินโปรแกรมทั้งหมด
			$data['monthname_review'] = $this->get_monthname();
			$data['month_employers'] = $this->get_month_review("employer",$month_arr);
			$data['month_users'] = $this->get_month_review("user",$month_arr);

			//จำนวนการส่งคำแนะนำ/ติชมแต่ละเดือน
			$data['month_review_all'] = $this->get_month_review_all($month_arr);


			//ประกาศหาคนและหางานในระบบ
			$data['jobs_all'] = $this->Jobth_model->get_jobs_count_all($datestart,$dateend);
			$data['resumes_all'] = $this->Jobth_model->get_resumes_count_all($datestart,$dateend);
			$data['jobth_all'] = $data['jobs_all']+$data['resumes_all'];
			$data['jobth_all1'] = $data['jobs_all']+$data['resumes_all'];
			if($data['jobth_all']==0){$data['jobth_all']=1;}


			$data['page_type'] = 'jobth';
			$data['page_name'] = 'jobth';
			$data['page_title'] = 'Program Monitor';
			$data['chart'] = 'jobth/js_chartist';
			$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}

	public function get_month_account_all($month_arr)
	{
		$thisyear = date('Y');
		$dateStart = $thisyear.'-01-01';
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateEnd = $thisyear.'-'.$value.'-'.$days;

			$employers = $this->Jobth_model->get_regis_employers_m($dateStart,$dateEnd);
			$users = $this->Jobth_model->get_regis_users_m($dateStart,$dateEnd);

			$account_month[] = $employers+$users;
		}
		return $account_month;
	}

	public function get_month_account($month_arr)
	{
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;

			$employers = $this->Jobth_model->get_regis_employers_m($dateStart,$dateEnd);
			$users = $this->Jobth_model->get_regis_users_m($dateStart,$dateEnd);

			$account_month[] = $employers+$users;
		}
		return $account_month;
	}

	public function count_regis($result_date)
	{
		foreach($result_date as $value){
			$data['employers'][] = $this->Jobth_model->get_regis_employers($value);
			$data['users'][] = $this->Jobth_model->get_regis_users($value);	
		}
		return $data;
	}

	//======================================================================

	public function user()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data = array(
			"total_company" => 0,
			"total_user" => 0,
			"total_member" => 0,
			"total_nomember" => 0
		);

		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));
		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart = '01/01/'.$yearstart;
		$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart.' - '.$dateEnd;

		if(!empty($this->input->post('user_type'))){
			$data['user_type'] = $this->input->post('user_type');
			$data['is_member'] = $this->input->post('is_member');
			$date = $this->input->post('daterange');

			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);

			if($data['user_type'] == "employer")
			{
				if($data['is_member'] == "y"){
					
					$data['result'] = $this->Jobth_model->get_employers_y($datestart,$dateend);
					$data['total_company'] = count($data['result']);
					$data['total_member'] = $data['total_company'];
					
				}else{

					$data['result'] = $this->Jobth_model->get_employers_n($datestart,$dateend);
					$data['total_company'] = count($data['result']);
					$data['total_nomember'] = $data['total_company'];

				}
			}else{
				//user
				if($data['is_member'] == "y"){

					$data['result'] = $this->Jobth_model->get_users_y($datestart,$dateend);
					$data['total_user'] = count($data['result']);
					$data['total_member'] = $data['total_user'];

				}else{

					$data['result'] = $this->Jobth_model->get_users_n($datestart,$dateend);
					$data['total_user'] = count($data['result']);
					$data['total_nomember'] = $data['total_user'];

				}

			}
		}

		$data['page_type'] = 'jobth';
		$data['page_name'] = 'jobth_user';
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
			"total_user" => 0,
			"total_job_all" => 0,
			"total_resume_all" => 0,
			"total_member" => 0,
			"total_nomember" => 0
		);

		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));
		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart = '01/01/'.$yearstart;
		$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart.' - '.$dateEnd;
		$data['list_jobs'] = $this->Jobth_model->get_master_job_type();

		if(!empty($this->input->post('user_type'))){
			$data['user_type'] = $this->input->post('user_type');
			$data['job_type_id'] = $this->input->post('job_type_id');
			$data['is_member'] = $this->input->post('is_member');
			$date = $this->input->post('daterange');
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);


			if($data['user_type'] == 'employer')
			{
				if($data['job_type_id']['0'] == 'ALL'){

					if($data['is_member'] == 'y'){
						$data['result'] = $this->Jobth_model->get_emp_jobtype_all_y($datestart,$dateend);
						$data['total_job_all'] = count($data['result']);
						$total_company = $this->Jobth_model->count_emp_jobtype_all_y($datestart,$dateend);
						$data['total_company'] = $total_company['total'];
						$data['total_member'] = $data['total_company'];	

					}else{
						$data['result'] = $this->Jobth_model->get_emp_jobtype_all_n($datestart,$dateend);
						$data['total_job_all'] = count($data['result']);
						$total_company = $this->Jobth_model->count_emp_jobtype_all_n($datestart,$dateend);
						$data['total_company'] = $total_company['total'];
						$data['total_nomember'] = $data['total_company'];
					}

				}else{

					$in = '(' . implode(',', $data['job_type_id']) .')';

					if($data['is_member'] == 'y'){
						$data['result'] = $this->Jobth_model->get_emp_jobtype_byid_y($in,$datestart,$dateend);
						$data['total_job_all'] = count($data['result']);
						$total_company = $this->Jobth_model->count_emp_jobtype_byid_y($in,$datestart,$dateend);
						$data['total_company'] = $total_company['total'];
						$data['total_member'] = $data['total_company'];	
					
					}else{

						$data['result'] = $this->Jobth_model->get_emp_jobtype_byid_n($in,$datestart,$dateend);
						$data['total_job_all'] = count($data['result']);
						$total_company = $this->Jobth_model->count_emp_jobtype_byid_n($in,$datestart,$dateend);
						$data['total_company'] = $total_company['total'];
						$data['total_nomember'] = $data['total_company'];
					}

				}
			}else{

				if($data['job_type_id']['0'] == 'ALL'){

					if($data['is_member'] == 'y'){
						$data['result'] = $this->Jobth_model->get_res_jobtype_all_y($datestart,$dateend);
						$data['total_resume_all'] = count($data['result']);
						$total_user = $this->Jobth_model->count_res_jobtype_all_y($datestart,$dateend);
						$data['total_user'] = $total_user['total'];
						$data['total_member'] = $data['total_user'];	

					}else{

						$data['result'] = $this->Jobth_model->get_res_jobtype_all_n($datestart,$dateend);
						$data['total_resume_all'] = count($data['result']);
						$total_user = $this->Jobth_model->count_res_jobtype_all_n($datestart,$dateend);
						$data['total_user'] = $total_user['total'];
						$data['total_nomember'] = $data['total_user'];
					}

				}else{

					$in = '(' . implode(',', $data['job_type_id']) .')';

					if($data['is_member'] == 'y'){

						$data['result'] = $this->Jobth_model->get_res_jobtype_byid_y($in,$datestart,$dateend);
						$data['total_job_all'] = count($data['result']);
						$total_user = $this->Jobth_model->count_res_jobtype_byid_y($in,$datestart,$dateend);
						$data['total_user'] = $total_user['total'];
						$data['total_member'] = $data['total_user'];
					
					}else{

						$data['result'] = $this->Jobth_model->get_res_jobtype_byid_n($in,$datestart,$dateend);
						$data['total_job_all'] = count($data['result']);
						$total_user = $this->Jobth_model->count_res_jobtype_byid_n($in,$datestart,$dateend);
						$data['total_user'] = $total_user['total'];
						$data['total_nomember'] = $data['total_user'];
					}

				}
				//user
			}
			
		}
		
		$data['page_type'] = 'jobth';
		$data['page_name'] = 'jobth_job';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'js';
		$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}


	public function review()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data = array(
			"total_review" => 0,
			"total_employers" => 0,
			"total_users" => 0
		);

		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));
		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart = '01/01/'.$yearstart;
		$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart.' - '.$dateEnd;

		if(!empty($this->input->post('user_type'))){
			$data['user_type'] = $this->input->post('user_type');
			$date = $this->input->post('daterange');
			$data['date_range'] = $this->input->post('daterange');
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);

			if($data['user_type'] == "ALL"){

				$data['review_employer'] = $this->Jobth_model->get_review_byemployer();
				$data['review_user'] = $this->Jobth_model->get_review_byuser();

				$data['total_review'] = count($data['review_employer'])+count($data['review_user']);
				$data['total_employers'] = count($data['review_employer']);
				$data['total_users'] = count($data['review_user']);

			}else if($data['user_type'] == "employer"){
				$data['id'] = $this->input->post('id');
				if(!empty($data['id'])){
					$status = $this->input->post('view_status');
					$status = ($status == 0) ? 1 : 0;
					$params = array(
						'view_status' => $status
					);
					$update = $this->Jobth_model->update_user_program_report($data['id'],$params);
				}

				$data['review_employer'] = $this->Jobth_model->get_review_byemployer();
				$data['total_review'] = count($data['review_employer']);
				$data['total_employers'] = count($data['review_employer']);
			
			}else if($data['user_type'] == "user"){
				$data['id'] = $this->input->post('id');
				if(!empty($data['id'])){
					$status = $this->input->post('view_status');
					$status = ($status == 0) ? 1 : 0;
					$params = array(
						'view_status' => $status
					);
					$update = $this->Jobth_model->update_user_program_report($data['id'],$params);
				}

				$data['review_user'] = $this->Jobth_model->get_review_byuser();
				$data['total_review'] = count($data['review_user']);
				$data['total_users'] = count($data['review_user']);
			}
		}

		$data['page_type'] = 'jobth';
		$data['page_name'] = 'jobth_review';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'js';
		$this->load->view('layouts/index',$data);
		}else{
			redirect('login');
		}
	}


	public function employers()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
			$thismonth = date('m');
			$thisyear = date('Y');
			$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
			$datestart = "2021-01-01";
			$dateend = $thisyear.'-'.$thismonth.'-'.$days;

			$data['result'] = $this->Jobth_model->get_employers($datestart,$dateend);

			$data['page_type'] = 'jobth';
			$data['page_name'] = 'jobth_employers_all';
			$data['page_title'] = 'Program Monitor';
			$data['chart'] = 'jobth/js_chartist';
			$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}

	public function users()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
			$thismonth = date('m');
			$thisyear = date('Y');
			$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
			$datestart = "2021-01-01";
			$dateend = $thisyear.'-'.$thismonth.'-'.$days;

			$data['result'] = $this->Jobth_model->get_users($datestart,$dateend);

			// $data['page_type'] = 'jobth';
			// $data['page_name'] = 'jobth_users_all';
			// $data['page_title'] = 'Program Monitor';
			// $data['chart'] = 'jobth/js_chartist';
			// $this->load->view('layouts/index',$data);
		}else{
			redirect('login');
		}
	}

	public function get_month_review($user_type,$month_arr)
	{
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$review_count[] = $this->Jobth_model->get_review_month_count($user_type,$dateStart,$dateEnd);
		}
		return $review_count;
	}

	public function get_month_review_all($month_arr)
	{	
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$review_count[] = $this->Jobth_model->get_review_month_all($dateStart,$dateEnd);
		}
		return $review_count;
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

	public function partChart($percent){

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

	public function transdate($date)
	{
		$date = str_replace('/', '-', $date);
        $date = date('Y-m-d', strtotime($date));
		return $date;
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

		// $monday = strtotime("-1 week 4 day",$previous_week);
		// $tuesday = strtotime("-1 week 5 day",$previous_week);
		// $wednesday = strtotime("-1 week 6 day",$previous_week);
		// $thursday = strtotime("-1 week 7 day",$previous_week);
		// $friday = strtotime("-1 week 8 day",$previous_week);
		// $saturday = strtotime("-1 week 9 day",$previous_week);
		// $sunday = strtotime("-1 week 10 day",$previous_week);
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

		// $monday = strtotime("-1 week 4 day",$previous_week);
		// $tuesday = strtotime("-1 week 5 day",$previous_week);
		// $wednesday = strtotime("-1 week 6 day",$previous_week);
		// $thursday = strtotime("-1 week 7 day",$previous_week);
		// $friday = strtotime("-1 week 8 day",$previous_week);
		// $saturday = strtotime("-1 week 9 day",$previous_week);
		// $sunday = strtotime("-1 week 10 day",$previous_week);
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

		// $monday1 = strtotime("-1 week 4 day",$previous_1week);
		// $tuesday1 = strtotime("-1 week 5 day",$previous_1week);
		// $wednesday1 = strtotime("-1 week 6 day",$previous_1week);
		// $thursday1 = strtotime("-1 week 7 day",$previous_1week);
		// $friday1 = strtotime("-1 week 8 day",$previous_1week);
		// $saturday1 = strtotime("-1 week 9 day",$previous_1week);
		// $sunday1 = strtotime("-1 week 10 day",$previous_1week);
		$monday1 = strtotime("-1 week 6 day",$previous_1week);
		$tuesday1 = strtotime("-1 week 7 day",$previous_1week);
		$wednesday1 = strtotime("-1 week 8 day",$previous_1week);
		$thursday1 = strtotime("-1 week 9 day",$previous_1week);
		$friday1 = strtotime("-1 week 10 day",$previous_1week);
		$saturday1 = strtotime("-1 week 11 day",$previous_1week);
		$sunday1 = strtotime("-1 week 12 day",$previous_1week);

		// $monday2 = strtotime("-1 week 4 day",$previous_2week);
		// $tuesday2 = strtotime("-1 week 5 day",$previous_2week);
		// $wednesday2 = strtotime("-1 week 6 day",$previous_2week);
		// $thursday2 = strtotime("-1 week 7 day",$previous_2week);
		// $friday2 = strtotime("-1 week 8 day",$previous_2week);
		// $saturday2 = strtotime("-1 week 9 day",$previous_2week);
		// $sunday2 = strtotime("-1 week 10 day",$previous_2week);
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

		// $monday1 = strtotime("-1 week 4 day",$previous_1week);
		// $tuesday1 = strtotime("-1 week 5 day",$previous_1week);
		// $wednesday1 = strtotime("-1 week 6 day",$previous_1week);
		// $thursday1 = strtotime("-1 week 7 day",$previous_1week);
		// $friday1 = strtotime("-1 week 8 day",$previous_1week);
		// $saturday1 = strtotime("-1 week 9 day",$previous_1week);
		// $sunday1 = strtotime("-1 week 10 day",$previous_1week);
		$monday1 = strtotime("-1 week 6 day",$previous_1week);
		$tuesday1 = strtotime("-1 week 7 day",$previous_1week);
		$wednesday1 = strtotime("-1 week 8 day",$previous_1week);
		$thursday1 = strtotime("-1 week 9 day",$previous_1week);
		$friday1 = strtotime("-1 week 10 day",$previous_1week);
		$saturday1 = strtotime("-1 week 11 day",$previous_1week);
		$sunday1 = strtotime("-1 week 12 day",$previous_1week);

		// $monday2 = strtotime("-1 week 4 day",$previous_2week);
		// $tuesday2 = strtotime("-1 week 5 day",$previous_2week);
		// $wednesday2 = strtotime("-1 week 6 day",$previous_2week);
		// $thursday2 = strtotime("-1 week 7 day",$previous_2week);
		// $friday2 = strtotime("-1 week 8 day",$previous_2week);
		// $saturday2 = strtotime("-1 week 9 day",$previous_2week);
		// $sunday2 = strtotime("-1 week 10 day",$previous_2week);
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

	public function count_login($result_date)
	{
		foreach($result_date as $value){
			$data = $this->Jobth_model->get_login_counter($value);
			$login[] = !empty($data) ? $data['count_sum'] : "0";
		}
		return $login;
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

}