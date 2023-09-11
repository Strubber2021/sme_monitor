<?php
class Bookkon_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	function get_login_counter_web($day)
	{
		$this->db->select('counter as count');
		$this->db->where('date',$day);
		$query = $this->db->get('HR_PRO..counter_visit_web');
		return $query->row_array();
	}

	function get_login_counter_mobile($day)
	{
		$this->db->select('counter as count');
		$this->db->where('date',$day);
		$query = $this->db->get('HR_PRO..counter_visit_mobile');
		return $query->row_array();
	}

	function get_users_thisweek($user_type,$day)
	{
		$this->db->select('HR_PRO..sys_users.id');
		$this->db->from('HR_PRO..sys_users');
		$this->db->join('HR_PRO..company','HR_PRO..sys_users.id = HR_PRO..company.created_by', 'left');
		$this->db->where('HR_PRO..sys_users.sys_user_type',$user_type);
		$this->db->where('HR_PRO..company.name != ',null);
		$this->db->where('HR_PRO..sys_users.created_at >=',$day." 00:00:00");
		$this->db->where('HR_PRO..sys_users.created_at <=',$day." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_emp_thisweek($user_type,$day)
	{
		$this->db->select('id');
		$this->db->from('HR_PRO..sys_users');
		$this->db->where('sys_user_type',$user_type);
		$this->db->where('emp_work_status !=', '5');
		$this->db->where('created_at >=',$day." 00:00:00");
		$this->db->where('created_at <=',$day." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_admin_all($user_type,$dateStart,$dateEnd)
	{
		$this->db->select('HR_PRO..sys_users.id');
		$this->db->from('HR_PRO..sys_users');
		$this->db->join('HR_PRO..company','HR_PRO..sys_users.id = HR_PRO..company.created_by','left');
		$this->db->where('HR_PRO..sys_users.sys_user_type',$user_type);
		$this->db->where('HR_PRO..company.name !=',null);
		$this->db->where('HR_PRO..sys_users.created_at >=',$dateStart." 00:00:00");
		$this->db->where('HR_PRO..sys_users.created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_users_all($user_type,$dateStart,$dateEnd)
	{
		$this->db->select('HR_PRO..sys_users.id');
		$this->db->from('HR_PRO..sys_users');
		$this->db->join('HR_PRO..company','HR_PRO..sys_users.id = HR_PRO..company.created_by','left');
		$this->db->where('HR_PRO..sys_users.sys_user_type',$user_type);
		$this->db->where('HR_PRO..company.name !=',null);
		$this->db->where('HR_PRO..sys_users.created_at >=',$dateStart." 00:00:00");
		$this->db->where('HR_PRO..sys_users.created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_emp_all($user_type,$dateStart,$dateEnd)
	{
		$this->db->select('id');
		$this->db->where('sys_user_type',$user_type);
		$this->db->where('emp_work_status !=','5');
		$this->db->where('created_at >=',$dateStart." 00:00:00");
		$this->db->where('created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get('HR_PRO..sys_users');
		return $query->num_rows();
	}

	function get_admin_recent($dateStart,$dateEnd)
	{
		$this->db->select('username,HR_PRO..company.name,HR_PRO..company.created_at');
		$this->db->from('HR_PRO..company');
		$this->db->join('HR_PRO..sys_users','HR_PRO..company.created_by = HR_PRO..sys_users.id','inner');
		$this->db->where('HR_PRO..company.name !=',null);
		$this->db->where('HR_PRO..company.created_at >=',$dateStart." 00:00:00");
		$this->db->where('HR_PRO..company.created_at <=',$dateEnd." 23:59:59");
		$this->db->order_by('HR_PRO..company.created_at','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_review_program_all($dateStart,$dateEnd)
	{
		$sql = "SELECT SCORE.[id]
		,SCORE.[company_id]
		,SCORE.[data]
		,SCORE.[remark]
		,SCORE.[total_score]
		,SCORE.[max_score]
		,SCORE.[created_at]
		,SCORE.[created_by]
		,[sys_user_type]
		,[HR_PRO]..[sys_users].[name]
		,[username]
		FROM [HR_PRO]..[company_scoring_system] AS SCORE
		LEFT JOIN [HR_PRO]..[sys_users] ON SCORE.[created_by] = [HR_PRO]..[sys_users].[id]
		WHERE SCORE.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		AND SCORE.[company_id] != '0'
		ORDER BY SCORE.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_comment_pr($dateStart,$dateEnd)
	{
		$sql = "SELECT SCORE.[id]
		,SCORE.[company_id]
		,SCORE.[data]
		,SCORE.[remark]
		,SCORE.[total_score]
		,SCORE.[max_score]
		,SCORE.[created_at]
		,SCORE.[created_by]
		,[sys_user_type]
		,[HR_PRO]..[sys_users].[name]
		,[username]
		FROM [HR_PRO]..[company_scoring_system] AS SCORE
		LEFT JOIN [HR_PRO]..[sys_users] ON SCORE.[created_by] = [HR_PRO]..[sys_users].[id]
		WHERE SCORE.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		AND SCORE.[company_id] = '0'
		ORDER BY SCORE.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_review_count($user_type,$dateStart,$dateEnd)
	{
		$this->db->select('HR_PRO..company_scoring_system.id');
		$this->db->from('HR_PRO..company_scoring_system');
		$this->db->join('HR_PRO..sys_users','HR_PRO..company_scoring_system.created_by = HR_PRO..sys_users.id','left');
		$this->db->where('HR_PRO..sys_users.sys_user_type',$user_type);
		$this->db->where('HR_PRO..company_scoring_system.created_at >=',$dateStart." 00:00:00");
		$this->db->where('HR_PRO..company_scoring_system.created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_review_count_company0($dateStart,$dateEnd)
	{
		$this->db->select('HR_PRO..company_scoring_system.id');
		$this->db->from('HR_PRO..company_scoring_system');
		$this->db->join('HR_PRO..sys_users','HR_PRO..company_scoring_system.created_by = HR_PRO..sys_users.id','left');
		$this->db->where('HR_PRO..company_scoring_system.company_id','0');
		$this->db->where('HR_PRO..company_scoring_system.created_at >=',$dateStart." 00:00:00");
		$this->db->where('HR_PRO..company_scoring_system.created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_review_count_all($dateStart,$dateEnd)
	{
		$this->db->select('HR_PRO..company_scoring_system.id');
		$this->db->from('HR_PRO..company_scoring_system');
		$this->db->join('HR_PRO..sys_users','HR_PRO..company_scoring_system.created_by = HR_PRO..sys_users.id','left');
		$this->db->where('HR_PRO..company_scoring_system.created_at >=',$dateStart." 00:00:00");
		$this->db->where('HR_PRO..company_scoring_system.created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_comment_all($dateStart,$dateEnd)
	{
		$this->db->select('id');
		$this->db->where('remark !=',null);
		$this->db->where('created_at >=',$dateStart." 00:00:00");
		$this->db->where('created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get('HR_PRO..company_scoring_system');
		return $query->num_rows();
	}

	function get_company()
	{
		$this->db->select('*');
		$this->db->where('name !=',null);
		$query = $this->db->get('HR_PRO..company');
		return $query->result_array();
	}

	function get_search_bycompanyid($company_id,$dateStart,$dateEnd)
	{
		$sql = "SELECT 
		Company.[company_id]
		,Company.[sys_customer_code]
		,Company.[short_name]
		,Company.[name]
		,Company.[name_en]
		,Company.[person_name]
		,Company.[company_tel]
		,Company.[created_at]
		,[username]
		,[company_img]
	,(SELECT count([HR_PRO].[dbo].[sys_users].[id]) 
		FROM [HR_PRO].[dbo].[sys_users]  
		WHERE [HR_PRO].[dbo].[sys_users].[sys_customer_code] = Company.[sys_customer_code]     
		AND [HR_PRO].[dbo].[sys_users].[user_level] = '2' AND emp_work_status != '5'
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		) AS total_hr
	,(SELECT count([HR_PRO].[dbo].[sys_users].[id]) 
		FROM [HR_PRO].[dbo].[sys_users]  
		WHERE [HR_PRO].[dbo].[sys_users].[sys_customer_code] = Company.[sys_customer_code]     
		AND [HR_PRO].[dbo].[sys_users].[user_level] = '3' AND emp_work_status != '5'
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		) AS total
	,(SELECT count([HR_PRO].[dbo].[sys_users].[id]) 
		FROM [HR_PRO].[dbo].[sys_users]  
		WHERE [HR_PRO].[dbo].[sys_users].[sys_customer_code] = Company.[sys_customer_code] 
		AND [HR_PRO].[dbo].[sys_users].[gender] = 'm' AND emp_work_status != '5'
		AND [HR_PRO].[dbo].[sys_users].[sys_user_type] = 'EMP'
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		) AS male
	,(SELECT count([HR_PRO].[dbo].[sys_users].[id]) 
		FROM [HR_PRO].[dbo].[sys_users]  
		WHERE [HR_PRO].[dbo].[sys_users].[sys_customer_code] = Company.[sys_customer_code] 
		AND [HR_PRO].[dbo].[sys_users].[gender] = 'f' AND emp_work_status != '5'
		AND [HR_PRO].[dbo].[sys_users].[sys_user_type] = 'EMP'
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		) AS female
		,(SELECT [HR_PRO].[dbo].[company_timesheet].[updated_at] FROM [HR_PRO].[dbo].[company_timesheet] 
		WHERE [HR_PRO].[dbo].[company_timesheet].company_id = Company.[company_id] ORDER BY updated_at DESC
		OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_company_time  
		,(SELECT TOP 1 [HR_PRO].[dbo].[company_timesheet].[updated_at]
		FROM [HR_PRO].[dbo].[company_timesheet]
		WHERE [HR_PRO].[dbo].[company_timesheet].company_id = Company.[company_id]
		ORDER BY updated_at DESC) AS company_time
		,(SELECT [HR_PRO].[dbo].[employee_slip_table].[created_at] FROM [HR_PRO].[dbo].[employee_slip_table] 
		WHERE [HR_PRO].[dbo].[employee_slip_table].company_id = Company.[company_id] ORDER BY created_at DESC
		OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_company_slip
		,(SELECT TOP 1 [HR_PRO].[dbo].[employee_slip_table].[created_at]
		FROM [HR_PRO].[dbo].[employee_slip_table]
		WHERE [HR_PRO].[dbo].[employee_slip_table].company_id = Company.[company_id]
		ORDER BY created_at DESC) AS company_slip
		FROM [HR_PRO].[dbo].[company] AS Company
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[sys_users].[id] = Company.[created_by]
		WHERE Company.[sys_customer_code] IN $company_id
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";  
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_search_company_all($dateStart,$dateEnd)
	{
		$sql = "SELECT 
		Company.[company_id] 
		,Company.[sys_customer_code] 
		,Company.[short_name] 
		,Company.[name] 
		,Company.[name_en] 
		,Company.[person_name] 
		,Company.[company_tel] 
		,Company.[created_at] 
		,[username]
		,[company_img]
		,(SELECT count([HR_PRO].[dbo].[sys_users].[id]) 
		FROM [HR_PRO].[dbo].[sys_users] 
		WHERE [HR_PRO].[dbo].[sys_users].[sys_customer_code] = Company.[sys_customer_code] 
		AND [HR_PRO].[dbo].[sys_users].[user_level] = '2' AND emp_work_status != '5'
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' ) AS total_hr
		,(SELECT count([HR_PRO].[dbo].[sys_users].[id]) 
		FROM [HR_PRO].[dbo].[sys_users] 
		WHERE [HR_PRO].[dbo].[sys_users].[sys_customer_code] = Company.[sys_customer_code] 
		AND [HR_PRO].[dbo].[sys_users].[user_level] = '3' AND emp_work_status != '5'
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' ) AS total
		,(SELECT count([HR_PRO].[dbo].[sys_users].[id]) 
		FROM [HR_PRO].[dbo].[sys_users] 
		WHERE [HR_PRO].[dbo].[sys_users].[sys_customer_code] = Company.[sys_customer_code] 
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
		AND [HR_PRO].[dbo].[sys_users].[sys_user_type] = 'EMP' AND emp_work_status != '5'
		AND [HR_PRO].[dbo].[sys_users].[gender] = 'm' ) AS male 
		,(SELECT count([HR_PRO].[dbo].[sys_users].[id]) 
		FROM [HR_PRO].[dbo].[sys_users] 
		WHERE [HR_PRO].[dbo].[sys_users].[sys_customer_code] = Company.[sys_customer_code] 
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
		AND [HR_PRO].[dbo].[sys_users].[sys_user_type] = 'EMP' AND emp_work_status != '5'
		AND [HR_PRO].[dbo].[sys_users].[gender] = 'f' ) AS female
		,(SELECT [HR_PRO].[dbo].[company_timesheet].[updated_at] FROM [HR_PRO].[dbo].[company_timesheet] 
		WHERE [HR_PRO].[dbo].[company_timesheet].company_id = Company.[company_id] ORDER BY updated_at DESC
		OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_company_time  
		,(SELECT TOP 1 [HR_PRO].[dbo].[company_timesheet].[updated_at]
		FROM [HR_PRO].[dbo].[company_timesheet]
		WHERE [HR_PRO].[dbo].[company_timesheet].company_id = Company.[company_id]
		ORDER BY updated_at DESC) AS company_time
		,(SELECT [HR_PRO].[dbo].[employee_slip_table].[created_at] FROM [HR_PRO].[dbo].[employee_slip_table] 
		WHERE [HR_PRO].[dbo].[employee_slip_table].company_id = Company.[company_id] ORDER BY created_at DESC
		OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_company_slip
		,(SELECT TOP 1 [HR_PRO].[dbo].[employee_slip_table].[created_at]
		FROM [HR_PRO].[dbo].[employee_slip_table]
		WHERE [HR_PRO].[dbo].[employee_slip_table].company_id = Company.[company_id]
		ORDER BY created_at DESC) AS company_slip
		FROM [HR_PRO].[dbo].[company] AS Company 
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[sys_users].[id] = Company.[created_by] 
		WHERE Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
		AND Company.[name] IS NOT NULL 
		ORDER BY Company.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

  //review&comment
	function get_review_detail_all($dateStart,$dateEnd)
	{
		$sql = "SELECT Review.[id]
		,Review.[company_id]
		,[data]
		,Review.[remark]
		,[total_score]
		,[max_score]
		,Review.[created_at]
		,Review.[created_by]
		,[sys_user_type]
		,[HR_PRO].[dbo].[company].[name]
		,[scoring_type]
		,[scoring_show_status]
		FROM [HR_PRO].[dbo].[company_scoring_system] AS Review
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[sys_users].[id] = Review.[created_by]
		LEFT JOIN [HR_PRO].[dbo].[company] ON [HR_PRO].[dbo].[company].[sys_customer_code] = [HR_PRO].[dbo].[sys_users].[sys_customer_code]
		WHERE Review.[remark] IS NOT NULL 
		AND Review.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Review.[id] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_review_detail_type($sys_user_type,$dateStart,$dateEnd)
	{
		$sql = "SELECT Review.[id]
		,Review.[company_id]
		,[data]
		,Review.[remark]
		,[total_score]
		,[max_score]
		,Review.[created_at]
		,Review.[created_by]
		,[sys_user_type]
		,[HR_PRO].[dbo].[company].[name]
		,[scoring_type]
		,[scoring_show_status]
		FROM [HR_PRO].[dbo].[company_scoring_system] AS Review
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[sys_users].[id] = Review.[created_by]
		LEFT JOIN [HR_PRO].[dbo].[company] ON [HR_PRO].[dbo].[company].[sys_customer_code] = [HR_PRO].[dbo].[sys_users].[sys_customer_code]
		WHERE Review.[remark] IS NOT NULL 
		AND [HR_PRO].[dbo].[sys_users].[sys_user_type] = '$sys_user_type'
		AND Review.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Review.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_review_detail_vompany0($dateStart,$dateEnd)
	{
		$sql = "SELECT Review.[id]
		,Review.[company_id]
		,[data]
		,Review.[remark]
		,[total_score]
		,[max_score]
		,Review.[created_at]
		,Review.[created_by]
		,[sys_user_type]
		,[HR_PRO].[dbo].[company].[name]
		,[scoring_type]
		,[scoring_show_status]
		FROM [HR_PRO].[dbo].[company_scoring_system] AS Review
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[sys_users].[id] = Review.[created_by]
		LEFT JOIN [HR_PRO].[dbo].[company] ON [HR_PRO].[dbo].[company].[sys_customer_code] = [HR_PRO].[dbo].[sys_users].[sys_customer_code]
		WHERE Review.[remark] IS NOT NULL 
		AND Review.[company_id] = 0
		AND Review.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Review.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_review_bytypecompanyid($company_id,$sys_user_type,$dateStart,$dateEnd)
	{
		$sql = "SELECT Review.[id]
		,Review.[company_id]
		,[data]
		,Review.[remark]
		,[total_score]
		,[max_score]
		,Review.[created_at]
		,Review.[created_by]
		,[sys_user_type]
		,[HR_PRO].[dbo].[company].[name]
		,[scoring_type]
		,[scoring_show_status]
		FROM [HR_PRO].[dbo].[company_scoring_system] AS Review
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[sys_users].[id] = Review.[created_by]
		LEFT JOIN [HR_PRO].[dbo].[company] ON [HR_PRO].[dbo].[company].[sys_customer_code] = [HR_PRO].[dbo].[sys_users].[sys_customer_code]
		WHERE Review.[remark] IS NOT NULL 
		AND [HR_PRO].[dbo].[sys_users].[sys_user_type] = '$sys_user_type'
		AND Review.[company_id] IN $company_id
		AND Review.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Review.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_review_detail_byid($company_id,$dateStart,$dateEnd)
	{
		$sql = "SELECT Review.[id]
		,Review.[company_id]
		,[data]
		,Review.[remark]
		,[total_score]
		,[max_score]
		,Review.[created_at]
		,Review.[created_by]
		,[sys_user_type]
		,[HR_PRO].[dbo].[company].[name]
		,[scoring_type]
		,[scoring_show_status]
		FROM [HR_PRO].[dbo].[company_scoring_system] AS Review
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[sys_users].[id] = Review.[created_by]
		LEFT JOIN [HR_PRO].[dbo].[company] ON [HR_PRO].[dbo].[company].[sys_customer_code] = [HR_PRO].[dbo].[sys_users].[sys_customer_code]
		WHERE Review.[remark] IS NOT NULL 
		AND Review.[company_id] IN $company_id
		AND Review.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Review.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_review_type_byid($company_id,$user_type,$dateStart,$dateEnd)
	{
		$sql = "SELECT Review.[id]
		,Review.[company_id]
		,[data]
		,Review.[remark]
		,[total_score]
		,[max_score]
		,Review.[created_at]
		,Review.[created_by]
		,[sys_user_type]
		,[HR_PRO].[dbo].[company].[name]
		FROM [HR_PRO].[dbo].[company_scoring_system] AS Review
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[sys_users].[id] = Review.[created_by]
		LEFT JOIN [HR_PRO].[dbo].[company] ON [HR_PRO].[dbo].[company].[sys_customer_code] = [HR_PRO].[dbo].[sys_users].[sys_customer_code]
		WHERE Review.[remark] IS NOT NULL 
		AND Review.[company_id] IN $company_id
		AND [HR_PRO].[dbo].[sys_users].[sys_user_type] = '$user_type'
		AND Review.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Review.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_review_countremark($user_type,$dateStart,$dateEnd)
	{
		$sql = "SELECT count([HR_PRO].[dbo].[company_scoring_system].[id]) AS total
		FROM [HR_PRO].[dbo].[company_scoring_system] 
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[company_scoring_system].[created_by] = [HR_PRO].[dbo].[sys_users].[id]
		WHERE [HR_PRO].[dbo].[sys_users].[sys_user_type] = '$user_type'
		AND [HR_PRO].[dbo].[company_scoring_system].[remark] IS NOT NULL
		AND [HR_PRO].[dbo].[company_scoring_system].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
	}

	function get_review_countcompany0($dateStart,$dateEnd)
	{
		$sql = "SELECT count([HR_PRO].[dbo].[company_scoring_system].[id]) AS total
		FROM [HR_PRO].[dbo].[company_scoring_system] 
		WHERE [HR_PRO].[dbo].[company_scoring_system].[remark] IS NOT NULL
		AND [HR_PRO].[dbo].[company_scoring_system].[company_id] = '0'
		AND [HR_PRO].[dbo].[company_scoring_system].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
	}

	function get_review_countremark_byid($user_type,$company_id,$dateStart,$dateEnd)
	{
		$sql = "SELECT count([HR_PRO].[dbo].[company_scoring_system].[id]) AS total
		FROM [HR_PRO].[dbo].[company_scoring_system] 
		LEFT JOIN [HR_PRO].[dbo].[sys_users] ON [HR_PRO].[dbo].[company_scoring_system].[created_by] = [HR_PRO].[dbo].[sys_users].[id]
		WHERE [HR_PRO].[dbo].[sys_users].[sys_user_type] = '$user_type'
		AND [HR_PRO].[dbo].[company_scoring_system].[company_id] IN $company_id
		AND [HR_PRO].[dbo].[company_scoring_system].[remark] IS NOT NULL
		AND [HR_PRO].[dbo].[company_scoring_system].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
	}

	function update_scoring_show_status($id,$params)
	{
		$this->db->where('id',$id);
		return $this->db->update('HR_PRO..company_scoring_system',$params);
	}
}