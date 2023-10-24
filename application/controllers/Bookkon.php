<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookkon extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Bookkon_model');
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
		$data['yearNow'] = $thisyear = date('Y');

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

		//month
		$month_arr = array(0=>"01",1=>"02",2=>"03",3=>"04",4=>"05",5=>"06",6=>"07",7=>"08",8=>"09",9=>"10",10=>"11",11=>"12");

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
		//จำนวนลงทะเบียนสัปดาห์นี้
		foreach($date_thisweek as $value){
			$data['admin_thisweek'][] = $this->Bookkon_model->get_users_thisweek('ADMIN',$value);
			$data['emp_thisweek'][] = $this->Bookkon_model->get_emp_thisweek('EMP',$value);
		}
		//จำนวนบัญชีที่สมัครทั้งหมด
		$data['register_all'] = $this->Bookkon_model->get_admin_all('ADMIN',$datestart,$dateend);
		//จำนวนบัญชีที่สมัครวันก่อนหน้า
		$datenow = date("Y-m-d");
		$yesterday = date('Y-m-d',strtotime($datenow . "-1 days"));
		$data['register_yesterday'] = $this->Bookkon_model->get_admin_all('ADMIN',$datestart,$yesterday);

		//จำนวนผู้ใช้งานระบบทั้งหมด
		$data['admin_all'] = $this->Bookkon_model->get_admin_all('ADMIN',$datestart,$dateend);
		$data['emp_all'] = $this->Bookkon_model->get_emp_all('EMP',$datestart,$dateend);
		$data['user_total'] = $data['admin_all']+$data['emp_all'];
		if($data['user_total'] == 0){$data['user_total'] = 1;}
		$data['user_total1'] = $data['user_total'];
		$data['percent_admin'] = ($data['admin_all']*100)/$data['user_total'];
		$data['percent_emp'] = ($data['emp_all']*100)/$data['user_total'];
		$data['part_admin'] = $this->percent_chart_donut($data['user_total1'],$data['admin_all']);
		$data['part_emp'] = $this->percent_chart_donut($data['user_total1'],$data['emp_all']);

		//จำนวนผู้ใช้งานระบบวันก่อนหน้า
		$data['admin_yesterday'] = $this->Bookkon_model->get_admin_all('ADMIN',$datestart,$yesterday);
		$data['emp_yesterday'] = $this->Bookkon_model->get_emp_all('EMP',$datestart,$yesterday);
		$data['user_yesterday'] = $data['admin_yesterday']+$data['emp_yesterday'];

		//จำนวนลงทะเบียนใช้งานแต่ละเดือน
		$data['account_month'] = $this->get_month_account($month_arr);
		//จำนวนลงทะเบียนใช้งานรวมแต่ละเดือน
		$data['account_month_all'] = $this->get_month_account_all();
		//จำนวนแอดมินและผู้ใช้งานทั้งหมดในระบบแต่ละเดือน
		$data['users_month_all'] = $this->get_month_users_all($month_arr);

		//เปอร์เซ็นจำนวนผู้สมัครทั้งหมด
		$data['percent_register_all'] = ($data['register_all']*100)/$data['user_total1'];
		//5 บัญชี ที่เพิ่มเข้ามาใหม่ล่าสุด
		$data['company_recent'] = $this->Bookkon_model->get_admin_recent($datestart,$dateend);
		//คำแนะนำและติชมจากผู้ใช้
		$data['review_program'] = $this->Bookkon_model->get_review_program_all($datestart,$dateend);
		$data['comment_pr'] = $this->Bookkon_model->get_comment_pr($datestart,$dateend);

		//จำนวนการประเมินโปรแกรมทั้งหมด
		$data['monthname_review'] = $this->get_monthname();
		$data['monthadmin_review'] = $this->get_month_review("ADMIN",$month_arr);
		$data['monthemp_review'] = $this->get_month_review("EMP",$month_arr);
		$data['monthcomp0_review'] = $this->get_month_review_company0($month_arr);

		//เปอร์เซ็นผลการประเมินโปรแกรม
		$score_sum = count($data['review_program']);
		$score_max = $score_sum*25;
		if ($score_max == 0) { $score_max = 1; }
		$score = 0;
		foreach($data['review_program'] as $value){
			$score = $score+$value['total_score'];
		}
		$data['percent_program'] = ($score/$score_max)*100;
		$data['level_program'] = $this->reat_program($data['percent_program']);
		//จำนวนการส่งคำแนะนำ/ติชมแต่ละเดือน
		$data['month_review_all'] = $this->get_month_review_all($month_arr);
		//tab2
		$data['review_comment'] = $this->Bookkon_model->get_comment_all($datestart,$dateend);

		$data['page_type'] = 'bookkon';
		$data['page_name'] = 'bookkon';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'bookkon/js_chartist';
		$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
	}
	
	public function count_regis($result_date)
	{
		foreach($result_date as $value){
			$data['admin'][] = $this->Bookkon_model->get_users_thisweek('ADMIN',$value);
			$data['emp'][] = $this->Bookkon_model->get_emp_thisweek('EMP',$value);
		}
		return $data;
	}

	public function count_login($result_date)
	{
		foreach($result_date as $value){
			$login_on_web = $this->Bookkon_model->get_login_counter_web($value);
			$login_on_mobile = $this->Bookkon_model->get_login_counter_mobile($value);

			$login_web[] = (!empty($login_on_web)) ? $login_on_web['count'] : 0;
			$login_mobile[] = (!empty($login_on_mobile)) ? $login_on_mobile['count'] : 0;	
		}
		$login = [];
		$keys = array_keys($login_web+$login_mobile);
		foreach($keys as $v){
			$login[$v] = (empty($login_web[$v]) ? 0 : $login_web[$v]) + (empty($login_mobile[$v]) ? 0 : $login_mobile[$v]);
		}
		return $login;
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

			$data['result'] = $this->Bookkon_model->get_search_company_all($datestart,$dateend);

			$data['page_type'] = 'bookkon';
			$data['page_name'] = 'bookkon_company';
			$data['page_title'] = 'Program Monitor';
			$data['chart'] = 'bookkon/js_chartist';
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
				"total_user" => 0,
				"total_male" => 0,
				"total_female" => 0
			);
			$data['list_company'] = $this->Bookkon_model->get_company();
			$thismonth = date('m');
			$thisyear = date('Y');
			$yearstart = date('Y', strtotime('-1 years'));

			$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
			$dateStart = '01/01/'.$yearstart;
			$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
			$data['thisyear'] = $dateStart.' - '.$dateEnd;

			if(!empty($this->input->post('sys_customer_code'))){
				$data['sys_customer_code'] = $this->input->post('sys_customer_code');
				$date = $this->input->post('daterange');
				$daterange = explode(" - ",$date);
				$date1 = $daterange[0];
				$date2 = $daterange[1];
				$datestart = $this->transdate($date1);
				$dateend = $this->transdate($date2);

				if($data['sys_customer_code']['0'] == "ALL"){
					$data['result_search'] = $this->Bookkon_model->get_search_company_all($datestart,$dateend);
				}else{
					$in = '(' ."'". implode("','", $data['sys_customer_code'])."'" .')';
					$data['result_search'] = $this->Bookkon_model->get_search_bycompanyid($in,$datestart,$dateend);
				}

				if(!empty($data['result_search'])){
					$data['total_company'] = count($data['result_search']);
					foreach($data['result_search'] as $value)
					{
						$data['total_user'] = $data['total_user']+$value['total_hr']+$value['total'];
						$data['total_male'] = $data['total_male']+$value['male'];
						$data['total_female'] = $data['total_female']+$value['female'];	
					}
				}
			}

		$data['page_type'] = 'bookkon';
		$data['page_name'] = 'bookkon_user';
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
			"total_admin" => 0,
			"total_emp" => 0,
			"total_outsider" => 0
		);
		$data['list_company'] = $this->Bookkon_model->get_company();
		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));

		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart = '01/01/'.$yearstart;
		$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart.' - '.$dateEnd;

		
		if(!empty($this->input->post('company_id'))){

			$data['company_id'] = $this->input->post('company_id');
			$data['sys_user_type'] = $this->input->post('sys_user_type');
			$date = $this->input->post('daterange');
			$data['date_range'] = $this->input->post('daterange');
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);


			if($data['company_id']['0'] == "ALL")
			{
				if($data['sys_user_type'] == "ALL"){

					$data['scoring_id'] = $this->input->post('scoring_id');
					if(!empty($data['scoring_id'])){
						$scoring_show_status = $this->input->post('scoring_show_status');
						$scoring_show_status = ($scoring_show_status == 0) ? 1 : 0;
						$params = array(
							'scoring_show_status' => $scoring_show_status
						);
						$update = $this->Bookkon_model->update_scoring_show_status($data['scoring_id'],$params);
					}

					$data['review'] = $this->Bookkon_model->get_review_detail_all($datestart,$dateend);
					$admin = $this->Bookkon_model->get_review_countremark("ADMIN",$datestart,$dateend);
					$emp = $this->Bookkon_model->get_review_countremark("EMP",$datestart,$dateend);
					$company0 = $this->Bookkon_model->get_review_countcompany0($datestart,$dateend);
					$data['total_review'] = count($data['review']);
					$data['total_admin'] = $admin['total'];
					$data['total_emp'] = $emp['total'];
					$data['total_outsider'] = $company0['total'];
				}
				else if($data['sys_user_type'] == "ADMIN"){
					
					$data['scoring_id'] = $this->input->post('scoring_id');
					if(!empty($data['scoring_id'])){
						$scoring_show_status = $this->input->post('scoring_show_status');
						$scoring_show_status = ($scoring_show_status == 0) ? 1 : 0;
						$params = array(
							'scoring_show_status' => $scoring_show_status
						);
						$update = $this->Bookkon_model->update_scoring_show_status($data['scoring_id'],$params);
					}

					$data['review'] = $this->Bookkon_model->get_review_detail_type($data['sys_user_type'],$datestart,$dateend);
					$data['total_review'] = count($data['review']);
					$admin = $this->Bookkon_model->get_review_countremark("ADMIN",$datestart,$dateend);
					$data['total_admin'] = $admin['total'];

				}else if($data['sys_user_type'] == "EMP"){

					$data['scoring_id'] = $this->input->post('scoring_id');
					if(!empty($data['scoring_id'])){
						$scoring_show_status = $this->input->post('scoring_show_status');
						$scoring_show_status = ($scoring_show_status == 0) ? 1 : 0;
						$params = array(
							'scoring_show_status' => $scoring_show_status
						);
						$update = $this->Bookkon_model->update_scoring_show_status($data['scoring_id'],$params);
					}

					$data['review'] = $this->Bookkon_model->get_review_detail_type($data['sys_user_type'],$datestart,$dateend);
					$data['total_review'] = count($data['review']);
					$emp = $this->Bookkon_model->get_review_countremark("EMP",$datestart,$dateend);
					$data['total_emp'] = $emp['total'];
				}else{

					$data['scoring_id'] = $this->input->post('scoring_id');
					if(!empty($data['scoring_id'])){
						$scoring_show_status = $this->input->post('scoring_show_status');
						$scoring_show_status = ($scoring_show_status == 0) ? 1 : 0;
						$params = array(
							'scoring_show_status' => $scoring_show_status
						);
						$update = $this->Bookkon_model->update_scoring_show_status($data['scoring_id'],$params);
					}

					$data['review'] = $this->Bookkon_model->get_review_detail_vompany0($datestart,$dateend);
					$data['total_review'] = count($data['review']);
					$company0 = $this->Bookkon_model->get_review_countcompany0($datestart,$dateend);
					$data['total_outsider'] = $company0['total'];
				}
			}else{
			
				$in = '(' . implode(',', $data['company_id']) .')';

				if($data['sys_user_type'] == "ALL"){

					$data['scoring_id'] = $this->input->post('scoring_id');
					if(!empty($data['scoring_id'])){
						$scoring_show_status = $this->input->post('scoring_show_status');
						$scoring_show_status = ($scoring_show_status == 0) ? 1 : 0;
						$params = array(
							'scoring_show_status' => $scoring_show_status
						);
						$update = $this->Bookkon_model->update_scoring_show_status($data['scoring_id'],$params);
					}

					$data['review'] = $this->Bookkon_model->get_review_detail_byid($in,$datestart,$dateend);
					$admin = $this->Bookkon_model->get_review_countremark_byid("ADMIN",$in,$datestart,$dateend);
					$emp = $this->Bookkon_model->get_review_countremark_byid("EMP",$in,$datestart,$dateend);
					$data['total_review'] = count($data['review']);
					$data['total_admin'] = $admin['total'];
					$data['total_emp'] = $emp['total'];
				}
				else if($data['sys_user_type'] == "ADMIN"){

					$data['scoring_id'] = $this->input->post('scoring_id');
					if(!empty($data['scoring_id'])){
						$scoring_show_status = $this->input->post('scoring_show_status');
						$scoring_show_status = ($scoring_show_status == 0) ? 1 : 0;
						$params = array(
							'scoring_show_status' => $scoring_show_status
						);
						$update = $this->Bookkon_model->update_scoring_show_status($data['scoring_id'],$params);
					}

					$data['review'] = $this->Bookkon_model->get_review_bytypecompanyid($in,$data['sys_user_type'],$datestart,$dateend);
					$admin = $this->Bookkon_model->get_review_countremark_byid("ADMIN",$in,$datestart,$dateend);
					$data['total_review'] = count($data['review']);
					$data['total_admin'] = $admin['total'];
				}
				else if($data['sys_user_type'] == "EMP"){

					$data['scoring_id'] = $this->input->post('scoring_id');
					if(!empty($data['scoring_id'])){
						$scoring_show_status = $this->input->post('scoring_show_status');
						$scoring_show_status = ($scoring_show_status == 0) ? 1 : 0;
						$params = array(
							'scoring_show_status' => $scoring_show_status
						);
						$update = $this->Bookkon_model->update_scoring_show_status($data['scoring_id'],$params);
					}

					$data['review'] = $this->Bookkon_model->get_review_bytypecompanyid($in,$data['sys_user_type'],$datestart,$dateend);
					$emp = $this->Bookkon_model->get_review_countremark_byid("EMP",$in,$datestart,$dateend);
					$data['total_review'] = count($data['review']);
					$data['total_emp'] = $emp['total'];
				}else{
					$data['review'] = "";
				}
			}
		}
		$data['page_type'] = 'bookkon';
		$data['page_name'] = 'bookkon_review';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'js';
		$this->load->view('layouts/index',$data);

		}else{
			redirect('login');
		}
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

	public function get_month_account($month_arr)
	{
		$thismonth = date('m');
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$account_count[] = $this->Bookkon_model->get_users_all('ADMIN',$dateStart,$dateEnd);
		}
		return $account_count;
	}

	public function get_month_account_all()
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
		$dateStart = $thisyear.'-01-01';
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$account_count[] = $this->Bookkon_model->get_users_all('ADMIN',$dateStart,$dateEnd);
		}
		return $account_count;
	}

	public function get_month_users_all($month_arr)
	{
		$thismonth = date('m');
		$thisyear = date('Y');
		
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$admin_all = $this->Bookkon_model->get_users_all('ADMIN',$dateStart,$dateEnd);
			$emp_all = $this->Bookkon_model->get_emp_all('EMP',$dateStart,$dateEnd);
			$users_count[] = $admin_all+$emp_all;
		}
		return $users_count;
	}

	public function get_month_review($user_type,$month_arr)
	{
		$thismonth = date('m');
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$review_count[] = $this->Bookkon_model->get_review_count($user_type,$dateStart,$dateEnd);
		}
		return $review_count;
	}

	public function get_month_review_company0($month_arr)
	{
		$thismonth = date('m');
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$review_count[] = $this->Bookkon_model->get_review_count_company0($dateStart,$dateEnd);
		}
		return $review_count;
	}

	public function get_month_review_all($month_arr)
	{
		$thismonth = date('m');
		$thisyear = date('Y');
		foreach($month_arr as $value){
			$days = cal_days_in_month(CAL_GREGORIAN, $value, $thisyear);
			$dateStart = $thisyear.'-'.$value.'-01';
			$dateEnd = $thisyear.'-'.$value.'-'.$days;
			$review_count[] = $this->Bookkon_model->get_review_count_all($dateStart,$dateEnd);
		}
		return $review_count;
	}

	public function get_month_comment_all()
	{
		$thismonth = date('m');
		$thisyear = date('Y');
		// for($i=1; $i<=$thismonth; $i++){
		for($i=1; $i<=12; $i++){
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
			$conment_count[] = $this->Bookkon_model->get_comment_count_all($dateStart,$dateEnd);
		}
		return $conment_count;
	}

	public function transdate($date)
	{
		$date = str_replace('/', '-', $date);
        $date = date('Y-m-d', strtotime($date));
		return $date;
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

		$monday1 = strtotime("-1 week 4 day",$previous_1week);
		$tuesday1 = strtotime("-1 week 5 day",$previous_1week);
		$wednesday1 = strtotime("-1 week 6 day",$previous_1week);
		$thursday1 = strtotime("-1 week 7 day",$previous_1week);
		$friday1 = strtotime("-1 week 8 day",$previous_1week);
		$saturday1 = strtotime("-1 week 9 day",$previous_1week);
		$sunday1 = strtotime("-1 week 10 day",$previous_1week);

		$monday2 = strtotime("-1 week 4 day",$previous_2week);
		$tuesday2 = strtotime("-1 week 5 day",$previous_2week);
		$wednesday2 = strtotime("-1 week 6 day",$previous_2week);
		$thursday2 = strtotime("-1 week 7 day",$previous_2week);
		$friday2 = strtotime("-1 week 8 day",$previous_2week);
		$saturday2 = strtotime("-1 week 9 day",$previous_2week);
		$sunday2 = strtotime("-1 week 10 day",$previous_2week);
		
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
}