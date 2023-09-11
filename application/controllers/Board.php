<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');
		$this->load->library('form_validation');
		$this->load->helper('url', 'form');
		$this->load->database();
		$this->load->library('session');
	}

	public function index()
	{
		if($this->session->userdata('user_id') && $this->session->userdata('name'))
		{
		$data['type_repair'] = $this->Welcome_model->get_typerepair();
		$monday = date("Y-m-d", strtotime("monday this week"));
		$sunday = date("Y-m-d", strtotime("sunday this week"));

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

		
		//ประกาศหาช่างและหางานที่เพิ่มมาสัปดาห์นี้
		$date_thisweek = $this->thisweek();
		foreach($date_thisweek as $value)
		{
			//หาช่าง
			$data['job_thisweek'][] = $this->Welcome_model->get_job_thisweek($value);
			//หางาน
			$data['techn_thisweek'][] = $this->Welcome_model->get_techn_thisweek($value);
		}

		//เปอร์เซ็นหางานและหาช่างในระบบ
		$data['job_all'] =  $this->Welcome_model->get_job_all($datestart,$dateend);
		$data['techn_all'] = $this->Welcome_model->get_techn_all($datestart,$dateend);
		$data['result_total'] = $data['job_all']['total']+$data['techn_all']['total'];
		$data['result_total1'] = $data['job_all']['total']+$data['techn_all']['total'];
		if($data['result_total'] == 0){$data['result_total'] = 1;}
		$data['percent_job'] = ($data['job_all']['total']*100)/$data['result_total'];
		$data['percent_techn'] = ($data['techn_all']['total']*100)/$data['result_total'];

		/*หาช่าง*/
		$data['part_job'] = $this->percent_chart_donut($data['result_total'],$data['job_all']['total']);
		/*หางาน*/
		$data['part_techn'] =$this->percent_chart_donut($data['result_total'],$data['techn_all']['total']);

		//contact
		$data['contact'] = $this->Welcome_model->get_contact($datestart,$dateend);
		$data['contact_count_all'] = $this->Welcome_model->get_contact_count_all($datestart,$dateend);

		//barchart contact
		$data['monthname_contact'] = $this->get_monthname();
		$data['month_contact'] = $this->get_month_contact();
		
		$monday =date('d/m/Y',strtotime($monday));
		$sunday =date('d/m/Y',strtotime($sunday));
		$data['thisweek'] = $monday.' - '.$sunday;
	
		$data['page_type'] = 'board';
		$data['page_name'] = 'dashboard_board';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'board/js_chartist';

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
			"count_job" => 0,
			"count_techn" => 0,
			"count_member" => 0,
			"count_all" => 0,
			"progress_barjob" => 0,
			"progress_bartech" => 0
		);

		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));

		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		// $dateStart = '01/01/'.$yearstart;
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

		$techn_all = $this->Welcome_model->get_techn_all($datestart,$dateend);
		$job_all = $this->Welcome_model->get_job_all($datestart,$dateend);
		$count_user_all = $techn_all['total']+$job_all['total'];

		if(!empty($this->input->post('user_type'))){

			$user_type = $this->input->post('user_type');
			$data['user_type'] = $user_type;
			//$regis_type = $this->input->post('regis_type');
			$date = $this->input->post('daterange');
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);

			if($user_type == '1'){
				
				// $data['job_detail'] = $this->Welcome_model->get_job_detail($datestart,$dateend);
				// $data['count_job'] = $this->Welcome_model->get_job_count($datestart,$dateend);
				// $data['progress_barjob'] = ($data['count_job']['total']/$count_user_all)*100;
				// $data['count_all'] = $data['count_job']['total'];

				$data['job_detail'] = $this->Welcome_model->get_job_detail($datestart,$dateend);
				$data['count_job'] = count($data['job_detail']);
				$data['progress_barjob'] = ($data['count_job']/$count_user_all)*100;
				$data['count_all'] = $data['count_job'];
				

			}else if($user_type == '2'){

				// $data['count_techn'] = $this->Welcome_model->get_techn_count($datestart,$dateend);
				// $data['progress_bartech'] = ($data['count_techn']['total']/$count_user_all)*100;
				// $data['count_all'] = $data['count_techn']['total'];

				$data['techn_detail'] = $this->Welcome_model->get_techn_detail($datestart,$dateend);
				if(!empty($data['techn_detail'])){
					foreach($data['techn_detail'] as $key => $row)
					{
						$arr_type_id = json_decode($row['type_repair_id'], true);
						$arr_provinces_id = json_decode($row['provinces_id'], true);

						$type_name = $this->get_type_repair($arr_type_id);
						$data['techn_detail'][$key]["type_name"] = $type_name;

						$provinces_name_th = $this->get_provinces($arr_provinces_id);
						$data['techn_detail'][$key]["provinces_name_th"] = $provinces_name_th;
					}
				}

				$data['count_techn'] = count($data['techn_detail']);
				$data['progress_bartech'] = ($data['count_techn']/$count_user_all)*100;
				$data['count_all'] = $data['count_techn'];
			}
			// else{
			// 	$data['count_job'] = $this->Welcome_model->get_job_count($datestart,$dateend);
			// 	$data['count_techn'] = $this->Welcome_model->get_techn_count($datestart,$dateend);
			// 	$data['count_all'] = $data['count_job']['total']+$data['count_techn']['total'];

			// 	$data['job_detail'] = $this->Welcome_model->get_job_detail($datestart,$dateend);
			// 	$data['techn_detail'] = $this->Welcome_model->get_techn_detail($datestart,$dateend);
			// 	if(!empty($data['techn_detail'])){
			// 		foreach($data['techn_detail'] as $key => $row)
			// 		{
			// 			$arr_type_id = json_decode($row['type_repair_id'], true);
			// 			$arr_provinces_id = json_decode($row['provinces_id'], true);

			// 			$type_name = $this->get_type_repair($arr_type_id);
			// 			$data['techn_detail'][$key]["type_name"] = $type_name;

			// 			$provinces_name_th = $this->get_provinces($arr_provinces_id);
			// 			$data['techn_detail'][$key]["provinces_name_th"] = $provinces_name_th;
			// 		}
			// 	}

			// }	
		}

		$data['page_type'] = 'board';
		$data['page_name'] = 'dashboard_user';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'board/js_chartist';

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
			"total_job" => 0,
			"total_techn" => 0,
			"total_member" => 0,
			"total_nomember" => 0,
			"type_id" => 13
		);
		$data['list_typerepair'] = $this->Welcome_model->get_typerepair();
		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));
		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart = '01/01/'.$yearstart;
		$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart.' - '.$dateEnd;
		
		if(!empty($this->input->post('user_type'))){

			$data['user_type'] = $this->input->post('user_type');
			$data['type_id'] = $this->input->post('type_id');
			$date = $this->input->post('daterange');
			
			$daterange = explode(" - ",$date);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);

			if($data['user_type'] == 1)
			{
				//หาช่าง
				if($data['type_id']['0'] == 13) //ALL
				{
					$data['result_job'] = $this->Welcome_model->get_job_detail_all($datestart,$dateend);
					$data['type_id'] = 13;
				
				}else{

					$in = '(' ."'". implode("','", $data['type_id'])."'" .')';
					$data['result_job'] = $this->Welcome_model->get_job_detail_bytypeid($in,$datestart,$dateend);
					
				}
				$data['total_job'] = count($data['result_job']);
				$data['total_nomember'] = $data['total_job'];
			}
			
			else{

				//หางาน user_type = 2
				if($data['type_id']['0'] == 13){

					$data['result_techn'] = $this->Welcome_model->get_techn_detail_all($datestart,$dateend);
					
				}else{

					foreach($data['type_id'] as $value)
					{
						$sql[] = '[MA_Board].[dbo].[Post_technician].type_repair_id LIKE '."'".'%"'.$value.'"%'."'";
					} 
					$query = " AND (".implode(" OR ", $sql).")";

					$data['result_techn'] = $this->Welcome_model->get_techn_detail_bytypeid($query,$datestart,$dateend);
					
				}

				if(!empty($data['result_techn'])){
					foreach($data['result_techn'] as $key => $row)
					{
						$arr_type_id = json_decode($row['type_repair_id'], true);
						
						$type_name = $this->get_type_repair($arr_type_id);
						$data['result_techn'][$key]["type_name"] = $type_name;

					}
				}
				$data['total_techn'] = count($data['result_techn']);
				$data['total_nomember'] = $data['total_techn'];

			}
		}

		$data['page_type'] = 'board';
		$data['page_name'] = 'board_job';
		$data['page_title'] = 'Program Monitor';
		$data['chart'] = 'board/js_chartist';

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
			"total_review" => 0
		);
		$thismonth = date('m');
		$thisyear = date('Y');
		$yearstart = date('Y', strtotime('-1 years'));

		$days = cal_days_in_month(CAL_GREGORIAN, $thismonth, $thisyear);
		$dateStart = '01/01/'.$yearstart;
		$dateEnd = $days.'/'.$thismonth.'/'.$thisyear;
		$data['thisyear'] = $dateStart.' - '.$dateEnd;

		if(!empty($this->input->post('daterange'))){

			$data['date'] = $this->input->post('daterange');
			$daterange = explode(" - ",$data['date']);
			$date1 = $daterange[0];
			$date2 = $daterange[1];
			$datestart = $this->transdate($date1);
			$dateend = $this->transdate($date2);

			$data['result_review'] = $this->Welcome_model->get_contact_detail_all($datestart,$dateend);
			$data['total_review'] = count($data['result_review']);
		}
		
		$data['page_type'] = 'board';
		$data['page_name'] = 'board_review';
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

	public function get_type_repair($type_repair_arr)
	{
		foreach($type_repair_arr as $value){
			$type_name[] = $this->Welcome_model->get_typename($value);
		}
		return $type_name;
	}

	public function get_provinces($provinces_arr)
	{
		foreach($provinces_arr as $value){
			$provinces_name_th[] = $this->Welcome_model->get_provinces($value);
		}
		return $provinces_name_th;
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

		if($result_type ==0){
			$part = 0;
		}
		else if($result_type <= $chart_donut_part1){
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

	public function get_month_contact()
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
			$contact_count[] = $this->Welcome_model->get_contact_count($dateStart,$dateEnd);
		}
		return $contact_count;
	}
}