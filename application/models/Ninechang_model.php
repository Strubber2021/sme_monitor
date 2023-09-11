<?php
class Ninechang_model extends CI_Model
{
    function __construct()
    {
      parent::__construct();
    }

    function get_login_counter($day){
		$this->db->select('login_count');
		$this->db->where('login_date', $day);
		$this->db->from('MA_System..login_count');
		$query = $this->db->get();
		return $query->row_array();
    }

    function get_register($oauth_provider,$dateStart,$dateEnd)
    {
		$sql = "SELECT count([MA_System].[dbo].[users].[id]) AS total 
		FROM [MA_System].[dbo].[users]
		WHERE [MA_System].[dbo].[users].[oauth_provider] = '$oauth_provider'
		AND [MA_System].[dbo].[users].[created] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";       
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_register_all($dateStart,$dateEnd)
    {
		$this->db->select('id');
		$this->db->from('MA_System..users');
		$this->db->where('oauth_provider !=', NULL);
		$this->db->where('MA_System..users.created >=', $dateStart." 00:00:00");
		$this->db->where('MA_System..users.created <=', $dateEnd." 23:59:59");
		$this->db->join('MA_System..Company_information', 'users.id = Company_information.created_by');
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_register_all1($oauth_provider,$dateStart,$dateEnd)
    {
		$this->db->select('id');
		$this->db->where('oauth_provider', $oauth_provider);
		$this->db->from('MA_System..users');
		$this->db->where('MA_System..users.created >=',$dateStart." 00:00:00");
		$this->db->where('MA_System..users.created <=',$dateEnd." 23:59:59");
		$this->db->join('MA_System..Company_information', 'users.id = Company_information.created_by');
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_register_thisweek_admin($day)
    {
		$sql = "SELECT count([MA_System].[dbo].[users].[id]) AS total 
		FROM [MA_System].[dbo].[users]
		WHERE [MA_System].[dbo].[users].[oauth_provider] IS NOT NULL
		AND [MA_System].[dbo].[users].[created] BETWEEN '$day 00:00:00' AND '$day 23:59:59' ";       
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_admin_thisweek_provider($oauth_provider,$day)
    {
		$this->db->select('id');
		$this->db->where('oauth_provider', $oauth_provider);
		$this->db->from('MA_System..users');
		$this->db->where('MA_System..users.created >=', $day." 00:00:00");
		$this->db->where('MA_System..users.created <=', $day." 23:59:59");
		$this->db->join('MA_System..Company_information', 'users.id = Company_information.created_by');
		$query = $this->db->get();
		return $query->num_rows();
    }

	function get_admin_thisweek_all($day)
    {
		$sql = "SELECT count([MA_System].[dbo].[users].[id]) AS total 
		FROM [MA_System].[dbo].[users]
		INNER JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[users].[id] = [MA_System].[dbo].[Company_information].[created_by]
		WHERE [MA_System].[dbo].[users].[oauth_provider] IS NOT NULL
		AND [MA_System].[dbo].[users].[created] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";       
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_register_thisweek($day,$employees_type)
    {
		$sql = "SELECT count([MA_System].[dbo].[users].[id]) AS total 
		FROM [MA_System].[dbo].[users]
		WHERE [MA_System].[dbo].[users].[employees_type]  = '$employees_type'
		AND [MA_System].[dbo].[users].[created] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";       
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_admin_all($dateStart,$dateEnd)
    {
		$this->db->select('id');
		$this->db->from('MA_System..users');
		$this->db->where('oauth_provider !=', NULL);
		$this->db->where('MA_System..users.created >=', $dateStart." 00:00:00");
		$this->db->where('MA_System..users.created <=', $dateEnd." 23:59:59");
		$this->db->join('MA_System..Company_information', 'users.id = Company_information.created_by');
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_employee_1($dateStart,$dateEnd)
    {
		$this->db->select('id');
		$this->db->from('MA_System..users');
		$this->db->where('employees_type','1');
		$this->db->where('created_at >=', $dateStart." 00:00:00");
		$this->db->where('created_at <=', $dateEnd." 23:59:59");
		$this->db->where('isdelete','0');
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_employee_2($dateStart,$dateEnd)
    {
		$this->db->select('id');
		$this->db->from('MA_System..users');
		$this->db->where('employees_type', '2');
		$this->db->where('oauth_provider',NULL);
		$this->db->where('created_at >=',$dateStart." 00:00:00");
		$this->db->where('created_at <=',$dateEnd." 23:59:59");
		$this->db->where('isdelete','0');
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_admin_recent($dateStart,$dateEnd)
    {
		$this->db->select('*');
		$this->db->from('MA_System..Company_information');
		$this->db->join('MA_System..users','users.id = MA_System..Company_information.created_by');
		$this->db->where('MA_System..Company_information.created_at >=', $dateStart." 00:00:00");
		$this->db->where('MA_System..Company_information.created_at <=', $dateEnd." 23:59:59");
		$this->db->order_by('MA_System..Company_information.created_at', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
    }

    function get_comment($dateStart,$dateEnd)
    {
		$sql = "SELECT [evaluate_id]
		,[evaluate_topic_1]
		,[evaluate_topic_2]
		,[evaluate_topic_3]
		,[evaluate_topic_4]
		,[evaluate_topic_5]
		,[detail]
		,Comment.[user_id]
		,Comment.[company_id]
		,Comment.[created_by]
		,Comment.[created_at]
		,[oauth_provider]
		,[first_name]
		,[last_name]
		,[employees_type]
		,[picture]
		,(SELECT sum([MA_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
		FROM [MA_System].[dbo].[Evaluate]
		WHERE [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL 
		AND [MA_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
		) as sum_evaluate
		FROM [MA_System].[dbo].[Evaluate] AS Comment
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = Comment.[created_by]
		WHERE Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
		AND Comment.[detail] IS NOT NULL 
		ORDER BY Comment.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }
    function get_topic()
    {
		$sql = "SELECT  * FROM [MA_System].[dbo].[Evaluate_Topic]
		WHERE [MA_System].[dbo].[Evaluate_Topic].[isdelete] = 0";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_comment_count_admin($dateStart,$dateEnd)
    {
		$this->db->select('evaluate_id');
		$this->db->from('MA_System..Evaluate');
		$this->db->where('MA_System..Evaluate.created_at >=', $dateStart." 00:00:00");
		$this->db->where('MA_System..Evaluate.created_at <=', $dateEnd." 23:59:59");
		$this->db->join('MA_System..users', 'MA_System..Evaluate.created_by = users.id');
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_comment_count_employee($employee_type,$dateStart,$dateEnd)
    {
		$this->db->select('evaluate_id');
		$this->db->from('MA_System..Evaluate');
		$this->db->where('MA_System..users.employees_type', $employee_type);
		$this->db->where('MA_System..users.oauth_provider', NULL);
		$this->db->where('MA_System..Evaluate.created_at >=', $dateStart." 00:00:00");
		$this->db->where('MA_System..Evaluate.created_at <=', $dateEnd." 23:59:59");
		$this->db->join('MA_System..users', 'MA_System..Evaluate.created_by = users.id');
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_comment_count_all($dateStart,$dateEnd)
    {		
		$this->db->select('evaluate_id');
		$this->db->from('MA_System..Evaluate');
		$this->db->where('MA_System..Evaluate.created_at >=', $dateStart." 00:00:00");
		$this->db->where('MA_System..Evaluate.created_at <=', $dateEnd." 23:59:59");
		$this->db->join('MA_System..users', 'MA_System..Evaluate.created_by = users.id');
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_ma_all($dateStart,$dateEnd)
    {
		$this->db->select('report_id');
		$this->db->from('MA_System..Report');
		$this->db->where('isdelete','0');
		$this->db->where('created_at >=',$dateStart." 00:00:00");
		$this->db->where('created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_parts_all($dateStart,$dateEnd)
    {
		$this->db->select('parts_id');
		$this->db->from('MA_System..Parts');
		$this->db->where('isdelete','0');
		$this->db->where('created_at >=',$dateStart." 00:00:00");
		$this->db->where('created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_parts_ma($dateStart,$dateEnd)
    {
		$this->db->select('report_detail_id');
		$this->db->from('MA_System..Report_detail');
		$this->db->where('isdelete','0');
		$this->db->where('ma_parts_name !=',NULL);
		$this->db->where('created_at >=',$dateStart." 00:00:00");
		$this->db->where('created_at <=',$dateEnd." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_comment_all()
    {
		$sql = "SELECT count([MA_System].[dbo].[Evaluate].[evaluate_id]) AS total
		FROM [MA_System].[dbo].[Evaluate] ";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }
	
    function get_evaluate_all($dateStart,$dateEnd)
    {
		$this->db->select('evaluate_id');
		$this->db->from('MA_System..Evaluate');
		$this->db->where('MA_System..Evaluate.created_at >=',$dateStart." 00:00:00");
		$this->db->where('MA_System..Evaluate.created_at <=',$dateEnd." 23:59:59");
		$this->db->where('MA_System..Evaluate.detail !=',NULL);
		$this->db->where('MA_System..Evaluate.detail !=',"");
		$this->db->join('MA_System..users','MA_System..Evaluate.created_by = MA_System..users.id');
		$query = $this->db->get();
		return $query->num_rows();
    }

    function get_company()
    {
		$sql = "SELECT [company_id]
		,[company_code]
		,[company_name]
		FROM [MA_System].[dbo].[Company_information]
		WHERE [MA_System].[dbo].[Company_information].[isdelete] = '0'
		ORDER BY [MA_System].[dbo].[Company_information].[company_id] ASC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_search_bycompanyid($company_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT 
		Company.[company_id]
		,[company_name]
		,[company_email]
		,[company_tel]
		,Company.[created_at]
		,[first_name]
		,[last_name]
		,[email]
		,[pic_url]
		,(SELECT count([MA_System].[dbo].[users].[id]) 
		FROM [MA_System].[dbo].[users]  
		WHERE [MA_System].[dbo].[users].[company_id] = Company.[company_id] AND [MA_System].[dbo].[users].[employees_type]  = 1 AND [MA_System].[dbo].[users].[isdelete]  = 0           
		) AS total_employee1
		,(SELECT count([MA_System].[dbo].[users].[id]) 
		FROM [MA_System].[dbo].[users]  
		WHERE [MA_System].[dbo].[users].[company_id] = Company.[company_id] AND [MA_System].[dbo].[users].[employees_type]  = 2	AND [MA_System].[dbo].[users].[isdelete]  = 0
		) AS total_employee2
		,(SELECT count([MA_System].[dbo].[Equipment].[equipment_id]) 
		FROM [MA_System].[dbo].[Equipment]  
		WHERE [MA_System].[dbo].[Equipment].[company_id] = Company.[company_id]
		AND [MA_System].[dbo].[Equipment].[isdelete]  = 0) AS count_equipment
		,(SELECT [MA_System].[dbo].[Report].created_at 
		FROM [MA_System].[dbo].[Report] 
		WHERE [MA_System].[dbo].[Report].[company_id] = Company.[company_id]
		ORDER BY [MA_System].[dbo].[Report].created_at DESC
		OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_created_ma
		,(SELECT top 1 [MA_System].[dbo].[Report].created_at 
		FROM [MA_System].[dbo].[Report]  
		WHERE [MA_System].[dbo].[Report].[company_id] = Company.[company_id]
		ORDER BY [MA_System].[dbo].[Report].created_at DESC 
		) AS created_ma
		,(SELECT [MA_System].[dbo].[Pm].created_at 
		FROM [MA_System].[dbo].[Pm] 
		WHERE [MA_System].[dbo].[Pm].[company_id] = Company.[company_id]
		ORDER BY [MA_System].[dbo].[Pm].created_at DESC  
		OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_created_pm
		,(SELECT top 1 [MA_System].[dbo].[Pm].created_at 
		FROM [MA_System].[dbo].[Pm] 
		WHERE [MA_System].[dbo].[Pm].[company_id] = Company.[company_id]
		ORDER BY [MA_System].[dbo].[Pm].created_at DESC 
		) AS created_pm
		FROM [MA_System].[dbo].[Company_information] AS Company
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = Company.[created_by]
		WHERE Company.[company_id] IN $company_id
		AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";  
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_search_company_all($dateStart,$dateEnd)
    {
		$sql = "SELECT 
		Company.[company_id]
		,[company_name]
		,[company_email]
		,[company_tel]
		,Company.[created_at]
		,[first_name]
		,[last_name]
		,[email]
		,[pic_url]
		,(SELECT count([MA_System].[dbo].[users].[id]) 
		FROM [MA_System].[dbo].[users]  
		WHERE [MA_System].[dbo].[users].[company_id] = Company.[company_id]
		AND [MA_System].[dbo].[users].[employees_type]  = 1
		AND [MA_System].[dbo].[users].[isdelete]  = 0           
		) AS total_employee1
		,(SELECT count([MA_System].[dbo].[users].[id]) 
		FROM [MA_System].[dbo].[users]  
		WHERE [MA_System].[dbo].[users].[company_id] = Company.[company_id]
		AND [MA_System].[dbo].[users].[employees_type]  = 2
		AND [MA_System].[dbo].[users].[isdelete]  = 0
		) AS total_employee2
		,(SELECT count([MA_System].[dbo].[Equipment].[equipment_id]) 
		FROM [MA_System].[dbo].[Equipment]  
		WHERE [MA_System].[dbo].[Equipment].[company_id] = Company.[company_id]
		AND [MA_System].[dbo].[Equipment].[isdelete]  = 0) AS count_equipment
		,(SELECT [MA_System].[dbo].[Report].created_at FROM [MA_System].[dbo].[Report] 
		WHERE [MA_System].[dbo].[Report].[company_id] = Company.[company_id]
		ORDER BY [MA_System].[dbo].[Report].created_at DESC
		OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_created_ma
		,(SELECT top 1 [MA_System].[dbo].[Report].created_at 
		FROM [MA_System].[dbo].[Report]  
		WHERE [MA_System].[dbo].[Report].[company_id] = Company.[company_id]
		ORDER BY [MA_System].[dbo].[Report].created_at DESC 
		) AS created_ma
		,(SELECT [MA_System].[dbo].[Pm].created_at 
		FROM [MA_System].[dbo].[Pm] 
		WHERE [MA_System].[dbo].[Pm].[company_id] = Company.[company_id]
		ORDER BY [MA_System].[dbo].[Pm].created_at DESC  
		OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_created_pm
		,(SELECT top 1 [MA_System].[dbo].[Pm].created_at 
		FROM [MA_System].[dbo].[Pm] 
		WHERE [MA_System].[dbo].[Pm].[company_id] = Company.[company_id]
		ORDER BY [MA_System].[dbo].[Pm].created_at DESC 
		) AS created_pm
		FROM [MA_System].[dbo].[Company_information] AS Company
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = Company.[created_by]
		WHERE Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Company.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_ma_detail_all()
    {
		$sql = "SELECT MA.[company_id]
		,[company_name]
		,(SELECT count([MA_System].[dbo].[Report].[report_id]) 
		FROM [MA_System].[dbo].[Report]  
		WHERE [MA_System].[dbo].[Report].[company_id] = MA.[company_id]
		AND [MA_System].[dbo].[Report].[report_type]  = 1
		AND [MA_System].[dbo].[Report].[report_status]  = 3
		AND [MA_System].[dbo].[Report].[isdelete]  = 0
		) AS report_type1
		,(SELECT count([MA_System].[dbo].[Report].[report_id]) 
		FROM [MA_System].[dbo].[Report]  
		WHERE [MA_System].[dbo].[Report].[company_id] = MA.[company_id]
		AND [MA_System].[dbo].[Report].[report_type]  = 2
		AND [MA_System].[dbo].[Report].[report_status]  = 3
		AND [MA_System].[dbo].[Report].[isdelete]  = 0
		) AS report_type2
		,(SELECT count([MA_System].[dbo].[Report].[report_id]) 
		FROM [MA_System].[dbo].[Report]  
		WHERE [MA_System].[dbo].[Report].[company_id] = MA.[company_id]
		AND [MA_System].[dbo].[Report].[report_status]  = 3
		AND [MA_System].[dbo].[Report].[isdelete]  = 0
		) AS total
		,(SELECT [MA_System].[dbo].[Report].created_at FROM [MA_System].[dbo].[Report] 
		WHERE [MA_System].[dbo].[Report].[company_id] = MA.[company_id]
		ORDER BY [MA_System].[dbo].[Report].created_at DESC
		OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_created_ma
		,(SELECT top 1 [MA_System].[dbo].[Report].created_at 
		FROM [MA_System].[dbo].[Report]  
		WHERE [MA_System].[dbo].[Report].[company_id] = MA.[company_id]
		ORDER BY [MA_System].[dbo].[Report].created_at DESC 
		) AS created_ma
		FROM [MA_System].[dbo].[Report] AS MA
		INNER JOIN [MA_System].[dbo].[Company_information] ON MA.[company_id] = [MA_System].[dbo].[Company_information].[company_id]
		WHERE MA.[isdelete] = 0
		GROUP BY MA.[company_id],[company_name]";  
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_ma_detail_bycompanyid($company_id)
    {
		$sql = "SELECT MA.[company_id]
		,[company_name]
		,(SELECT count([MA_System].[dbo].[Report].[report_id]) 
		FROM [MA_System].[dbo].[Report]  
		WHERE [MA_System].[dbo].[Report].[company_id] = MA.[company_id]
		AND [MA_System].[dbo].[Report].[report_type]  = 1
		AND [MA_System].[dbo].[Report].[report_status]  = 3
		AND [MA_System].[dbo].[Report].[isdelete]  = 0
		) AS report_type1
		,(SELECT count([MA_System].[dbo].[Report].[report_id]) 
		FROM [MA_System].[dbo].[Report]  
		WHERE [MA_System].[dbo].[Report].[company_id] = MA.[company_id]
		AND [MA_System].[dbo].[Report].[report_type]  = 2
		AND [MA_System].[dbo].[Report].[report_status]  = 3
		AND [MA_System].[dbo].[Report].[isdelete]  = 0
		) AS report_type2
		,(SELECT count([MA_System].[dbo].[Report].[report_id]) 
		FROM [MA_System].[dbo].[Report]  
		WHERE [MA_System].[dbo].[Report].[company_id] = MA.[company_id]
		AND [MA_System].[dbo].[Report].[report_status]  = 3
		AND [MA_System].[dbo].[Report].[isdelete]  = 0
		) AS total
		FROM [MA_System].[dbo].[Report] AS MA
		INNER JOIN [MA_System].[dbo].[Company_information] ON MA.[company_id] = [MA_System].[dbo].[Company_information].[company_id]
		WHERE MA.[company_id] IN $company_id AND MA.[isdelete] = 0
		GROUP BY MA.[company_id],[company_name]";  
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

	function get_pm_detail_all()
	{ 
		$sql = "SELECT Report_PM.[company_id] 
		,[company_name]
		,COUNT(Report_PM.[pm_id]) AS total
		,(SELECT [MA_System].[dbo].[Pm].created_at FROM [MA_System].[dbo].[Pm] 
		WHERE [MA_System].[dbo].[Pm].[company_id] = Report_PM.[company_id]
		ORDER BY [MA_System].[dbo].[Pm].created_at DESC OFFSET 1 ROWS FETCH NEXT 1 ROWS ONLY) AS pre_created_pm
		,(SELECT top 1 [MA_System].[dbo].[Pm].created_at FROM [MA_System].[dbo].[Pm] 
		WHERE [MA_System].[dbo].[Pm].[company_id] = Report_PM.[company_id] 
		ORDER BY [MA_System].[dbo].[Pm].created_at DESC ) AS created_pm
		FROM [MA_System].[dbo].[Pm] AS Report_PM
		LEFT JOIN [MA_System].[dbo].[Company_information] ON Report_PM.[company_id] = [MA_System].[dbo].[Company_information].[company_id] 
		WHERE Report_PM.[pm_status] = 2
		AND Report_PM.[isdelete] = 0
		GROUP BY Report_PM.[company_id],[company_name]
		ORDER BY Report_PM.[company_id] ASC";  
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

    function get_pm_detail_bycompanyid($company_id)
    { 
		$sql =" SELECT PM.[company_id]
		,[company_name]
		,COUNT(PM.[pm_id]) AS total
		FROM [MA_System].[dbo].[Pm] AS PM
		INNER JOIN [MA_System].[dbo].[Company_information] ON PM.[company_id] = [MA_System].[dbo].[Company_information].[company_id]
		WHERE PM.[company_id] IN $company_id 
		AND PM.[pm_status] = 2
		AND PM.[isdelete] = 0
		GROUP BY PM.[company_id],[company_name]";  
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function fetch_group($company_id)
    {
		$this->db->where('company_id', $company_id);
		$this->db->where('isdelete', 0);
		$this->db->order_by('group_name', 'ASC');
		$query = $this->db->get('[MA_System].[dbo].[Group_repair]');
		$output = '<option value="">- เลือกกลุ่มงานซ่อม2 -</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->group_id . '">' . $row->group_name . '</option>';
		}
		return $output;
    }

    //Evaluate ******************************************

    function get_evaluate_detail_all($dateStart,$dateEnd)
    {
		$sql = "SELECT [evaluate_id]
		,[evaluate_topic_1]
		,[evaluate_topic_2]
		,[evaluate_topic_3]
		,[evaluate_topic_4]
		,[evaluate_topic_5]
		,[detail]
		,Comment.[user_id]
		,Comment.[company_id]
		,[company_name]
		,Comment.[created_by]
		,Comment.[created_at]
		,[oauth_provider]
		,[first_name]
		,[last_name]
		,[employees_type]
		,[picture]
		,[status]
		,(SELECT sum([MA_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
		FROM [MA_System].[dbo].[Evaluate]
		WHERE [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL 
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
		) as sum_evaluate
		FROM [MA_System].[dbo].[Evaluate] AS Comment
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = Comment.[created_by]
		LEFT JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
		WHERE Comment.[detail] IS NOT NULL 
		AND DATALENGTH(Comment.[detail]) > 0
		AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Comment.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_evaluate_detail_byid($company_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT [evaluate_id]
		,[evaluate_topic_1]
		,[evaluate_topic_2]
		,[evaluate_topic_3]
		,[evaluate_topic_4]
		,[evaluate_topic_5]
		,[detail]
		,Comment.[user_id]
		,Comment.[company_id]
		,[company_name]
		,Comment.[created_by]
		,Comment.[created_at]
		,[oauth_provider]
		,[first_name]
		,[last_name]
		,[employees_type]
		,[picture]
		,[status]
		,(SELECT sum([MA_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
		FROM [MA_System].[dbo].[Evaluate]
		WHERE Comment.[company_id] IN $company_id
		AND [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL 
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
		) as sum_evaluate
		FROM [MA_System].[dbo].[Evaluate] AS Comment
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = Comment.[created_by]
		LEFT JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
		WHERE Comment.[company_id] IN $company_id
		AND DATALENGTH(Comment.[detail]) > 0
		AND Comment.[detail] IS NOT NULL 
		AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Comment.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_evaluate_detail_admin($dateStart,$dateEnd)
    {
		$sql = "SELECT [evaluate_id]
		,[evaluate_topic_1]
		,[evaluate_topic_2]
		,[evaluate_topic_3]
		,[evaluate_topic_4]
		,[evaluate_topic_5]
		,[detail]
		,Comment.[user_id]
		,Comment.[company_id]
		,[company_name]
		,Comment.[created_by]
		,Comment.[created_at]
		,[oauth_provider]
		,[first_name]
		,[last_name]
		,[employees_type]
		,[picture]
		,[status]
		,(SELECT sum([MA_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
		FROM [MA_System].[dbo].[Evaluate]
		WHERE [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL 
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[users].[oauth_provider] IS NOT NULL
		AND [MA_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
		) as sum_evaluate
		FROM [MA_System].[dbo].[Evaluate] AS Comment
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = Comment.[created_by]
		LEFT JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
		WHERE Comment.[detail] IS NOT NULL
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[users].[oauth_provider] IS NOT NULL
		AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Comment.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_evaluate_detail_adminbyid($company_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT [evaluate_id]
		,[evaluate_topic_1]
		,[evaluate_topic_2]
		,[evaluate_topic_3]
		,[evaluate_topic_4]
		,[evaluate_topic_5]
		,[detail]
		,Comment.[user_id]
		,Comment.[company_id]
		,[company_name]
		,Comment.[created_by]
		,Comment.[created_at]
		,[oauth_provider]
		,[first_name]
		,[last_name]
		,[employees_type]
		,[picture]
		,[status]
		,(SELECT sum([MA_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
		FROM [MA_System].[dbo].[Evaluate]
		WHERE [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[users].[oauth_provider] IS NOT NULL
		AND [MA_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
		) as sum_evaluate
		FROM [MA_System].[dbo].[Evaluate] AS Comment
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = Comment.[created_by]
		LEFT JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
		WHERE Comment.[company_id] IN $company_id 
		AND Comment.[detail] IS NOT NULL
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[users].[oauth_provider] IS NOT NULL
		AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Comment.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_evaluate_detail_employee($employee_type,$dateStart,$dateEnd)
    {
		$sql = "SELECT [evaluate_id]
		,[evaluate_topic_1]
		,[evaluate_topic_2]
		,[evaluate_topic_3]
		,[evaluate_topic_4]
		,[evaluate_topic_5]
		,[detail]
		,Comment.[user_id]
		,Comment.[company_id]
		,[company_name]
		,Comment.[created_by]
		,Comment.[created_at]
		,[oauth_provider]
		,[first_name]
		,[last_name]
		,[employees_type]
		,[picture]
		,[status]
		,(SELECT sum([MA_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
		FROM [MA_System].[dbo].[Evaluate]
		WHERE [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[users].[employees_type] = '$employee_type'
		AND [MA_System].[dbo].[users].[oauth_provider] IS NULL
		AND [MA_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
		) as sum_evaluate
		FROM [MA_System].[dbo].[Evaluate] AS Comment
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = Comment.[created_by]
		LEFT JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
		WHERE Comment.[detail] IS NOT NULL
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[users].[employees_type] = '$employee_type'
		AND [MA_System].[dbo].[users].[oauth_provider] IS NULL
		AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Comment.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_evaluate_detail_employeebyid($company_id,$employee_type,$dateStart,$dateEnd)
    {
		$sql = "SELECT [evaluate_id]
		,[evaluate_topic_1]
		,[evaluate_topic_2]
		,[evaluate_topic_3]
		,[evaluate_topic_4]
		,[evaluate_topic_5]
		,[detail]
		,Comment.[user_id]
		,Comment.[company_id]
		,[company_name]
		,Comment.[created_by]
		,Comment.[created_at]
		,[oauth_provider]
		,[first_name]
		,[last_name]
		,[employees_type]
		,[picture]
		,[status]
		,(SELECT sum([MA_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
		FROM [MA_System].[dbo].[Evaluate]
		WHERE Comment.[company_id] IN $company_id
		AND [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[users].[employees_type] = '$employee_type'
		AND [MA_System].[dbo].[users].[oauth_provider] IS NULL
		AND [MA_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
		) as sum_evaluate
		FROM [MA_System].[dbo].[Evaluate] AS Comment
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = Comment.[created_by]
		LEFT JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
		WHERE Comment.[company_id] IN $company_id
		AND Comment.[detail] IS NOT NULL
		AND DATALENGTH(Comment.[detail]) > 0
		AND [MA_System].[dbo].[users].[employees_type] = '$employee_type'
		AND [MA_System].[dbo].[users].[oauth_provider] IS NULL
		AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY Comment.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function get_evaluate_count_all($dateStart,$dateEnd)
    {
		$sql = "SELECT count([MA_System].[dbo].[Evaluate].[evaluate_id]) AS total
		FROM [MA_System].[dbo].[Evaluate] 
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = [MA_System].[dbo].[Evaluate].[created_by]
		WHERE [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL 
		AND DATALENGTH([MA_System].[dbo].[Evaluate].[detail]) > 0
		AND [MA_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_evaluate_count_byid($company_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT count([MA_System].[dbo].[Evaluate].[evaluate_id]) AS total
		FROM [MA_System].[dbo].[Evaluate] 
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = [MA_System].[dbo].[Evaluate].[created_by]
		WHERE [MA_System].[dbo].[Evaluate].[company_id] IN $company_id
		AND [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL
		AND DATALENGTH([MA_System].[dbo].[Evaluate].[detail]) > 0
		AND [MA_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_evaluate_count_admin($dateStart,$dateEnd)
    {
		$sql = "SELECT count([MA_System].[dbo].[Evaluate].[evaluate_id]) AS total
		FROM [MA_System].[dbo].[Evaluate] 
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = [MA_System].[dbo].[Evaluate].[created_by]
		WHERE [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL
		AND DATALENGTH([MA_System].[dbo].[Evaluate].[detail]) > 0
		AND [MA_System].[dbo].[users].[oauth_provider] IS NOT NULL
		AND [MA_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_evaluate_count_adminbyid($company_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT count([MA_System].[dbo].[Evaluate].[evaluate_id]) AS total
		FROM [MA_System].[dbo].[Evaluate] 
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = [MA_System].[dbo].[Evaluate].[created_by]
		WHERE [MA_System].[dbo].[Evaluate].[company_id] IN $company_id
		AND [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL
		AND DATALENGTH([MA_System].[dbo].[Evaluate].[detail]) > 0
		AND [MA_System].[dbo].[users].[oauth_provider] IS NOT NULL
		AND [MA_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_evaluate_count_employee($employee_type,$dateStart,$dateEnd)
    {
		$sql = "SELECT count([MA_System].[dbo].[Evaluate].[evaluate_id]) AS total
		FROM [MA_System].[dbo].[Evaluate] 
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = [MA_System].[dbo].[Evaluate].[created_by]
		WHERE [MA_System].[dbo].[users].[employees_type] = '$employee_type'
		AND [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL
		AND DATALENGTH([MA_System].[dbo].[Evaluate].[detail]) > 0
		AND [MA_System].[dbo].[users].[oauth_provider] IS NULL
		AND [MA_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_evaluate_count_employeebyid($company_id,$employee_type,$dateStart,$dateEnd)
    {
		$sql = "SELECT count([MA_System].[dbo].[Evaluate].[evaluate_id]) AS total
		FROM [MA_System].[dbo].[Evaluate] 
		LEFT JOIN [MA_System].[dbo].[users] ON [MA_System].[dbo].[users].[id] = [MA_System].[dbo].[Evaluate].[created_by]
		WHERE [MA_System].[dbo].[Evaluate].[company_id] IN $company_id
		AND [MA_System].[dbo].[users].[employees_type] = '$employee_type'
		AND [MA_System].[dbo].[Evaluate].[detail] IS NOT NULL
		AND DATALENGTH([MA_System].[dbo].[Evaluate].[detail]) > 0
		AND [MA_System].[dbo].[users].[oauth_provider] IS NULL
		AND [MA_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_parts_detail_all()
    {
		$sql = "SELECT Parts1.[parts_id]
		,[parts_name]
		,Parts1.[company_id]
		,Parts1.[created_at]
		,[company_name]
		FROM [MA_System].[dbo].[Parts] AS Parts1
		INNER JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] =  Parts1.[company_id]
		ORDER BY Parts1.[company_id]";
		$query = $this->db->query($sql);     
		return $query->result_array();
    }

    function get_parts_ma_all()
    {
		$sql = "SELECT [report_detail_id] AS parts_id
		,[ma_parts_name] AS parts_name
		,[MA_System].[dbo].[Report_detail].[company_id]
		,[MA_System].[dbo].[Report_detail].[created_at]
		,[company_name]
		FROM [MA_System].[dbo].[Report_detail]
		INNER JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] =  [MA_System].[dbo].[Report_detail].[company_id]
		WHERE [ma_parts_name] IS NOT NULL  
		AND  [MA_System].[dbo].[Report_detail].[isdelete] = '0'
		ORDER BY company_id ";
		$query = $this->db->query($sql);     
		return $query->result_array();
    }

    function get_parts_detail_bycompid($company_id)
    {
		$sql = "SELECT Parts1.[parts_id]
		,[parts_name]
		,Parts1.[company_id]
		,Parts1.[created_at]
		,[company_name]
		FROM [MA_System].[dbo].[Parts] AS Parts1
		INNER JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] =  Parts1.[company_id]
		WHERE Parts1.[company_id] IN $company_id
		ORDER BY Parts1.[company_id]";
		$query = $this->db->query($sql);     
		return $query->result_array();
    }

    function get_parts_ma_bycompid($company_id)
    {
		$sql = "SELECT [report_detail_id] AS parts_id
		,[ma_parts_name] AS parts_name
		,[MA_System].[dbo].[Report_detail].[company_id]
		,[MA_System].[dbo].[Report_detail].[created_at]
		,[company_name]
		FROM [MA_System].[dbo].[Report_detail]
		INNER JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] =  [MA_System].[dbo].[Report_detail].[company_id]
		WHERE [ma_parts_name] IS NOT NULL  
		AND [MA_System].[dbo].[Report_detail].[company_id] IN $company_id
		AND [MA_System].[dbo].[Report_detail].[isdelete] = '0'
		ORDER BY company_id ";
		$query = $this->db->query($sql);     
		return $query->result_array();
    }
    
    function update_status_evaluate($evaluate_id,$params)
    {
		$this->db->where('evaluate_id',$evaluate_id);
		return $this->db->update('MA_System..Evaluate',$params);
    }

	//equipment
	function get_equipment($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('equipment_id');
		$this->db->from('MA_System..Equipment');
		$this->db->where('isdelete','0');
		$this->db->where('created_at >=',$start_date);
		$this->db->where('created_at <=',$end_date);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_equipment_detail_all()
    {
		$sql = "SELECT Equipment1.equipment_id
		,[equipment_name]
		,[equipment_code]
		,[equipment_area]
      	,[equipment_detail]
		,Equipment1.[company_id]
		,Equipment1.[created_at]
		,[equipment_user]
      	,[equipment_techn]
		,[company_name]
		FROM [MA_System].[dbo].[Equipment] AS Equipment1
		INNER JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] =  Equipment1.[company_id]
		WHERE Equipment1.[isdelete] = '0'
		ORDER BY Equipment1.[company_id] DESC";
		$query = $this->db->query($sql);     
		return $query->result_array();
    }

	function get_equipment_detail_bycompid($company_id)
    {
		$sql = "SELECT Equipment1.equipment_id
		,[equipment_name]
		,[equipment_code]
		,[equipment_area]
		,[equipment_detail]
		,Equipment1.[company_id]
		,Equipment1.[created_at]
		,[equipment_user]
		,[equipment_techn]
		,[company_name]
		FROM [MA_System].[dbo].[Equipment] AS Equipment1
		INNER JOIN [MA_System].[dbo].[Company_information] ON [MA_System].[dbo].[Company_information].[company_id] =  Equipment1.[company_id]
		WHERE Equipment1.[company_id] IN $company_id
		AND Equipment1.[isdelete] = '0'
		ORDER BY Equipment1.[company_id] DESC";
		$query = $this->db->query($sql);     
		return $query->result_array();
    }

    function get_comment_pr($dateStart,$dateEnd)
    {
    	$this->db->select('*');
    	$this->db->from('MA_System..comment_sme');
    	$this->db->where('type','1');
			$this->db->where('MA_System..comment_sme.ts_create >=', $dateStart." 00:00:00");
			$this->db->where('MA_System..comment_sme.ts_create <=', $dateEnd." 23:59:59");    	
			$this->db->order_by('record_id','DESC');
    	$query = $this->db->get();
		return $query->result_array();
    }
}