<?php
class Jobth_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	// function get_login_counter($day)
	// {
	//   $sql = "SELECT count([SPN_HRM_04DB].[dbo].[counter].[counter_id]) AS count_sum 
	//   FROM [SPN_HRM_04DB].[dbo].[counter]
	//   WHERE [SPN_HRM_04DB].[dbo].[counter].[date] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";
	//   $query = $this->db->query($sql);        
	//   return $query->row_array();
	// }
	function get_login_counter($day)
	{
		$this->db->select('count_sum');
		$this->db->where('date', $day);
		$this->db->from('SPN_HRM_04DB..counter_sum');
		$query = $this->db->get();
		return $query->row_array();
	}
	function get_master_job_type()
	{
		$sql = "SELECT *
		FROM [SPN_HRM_04DB].[dbo].[master_job_type]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}
	// function get_users_countweek($day)
	// {
	//   $sql = "SELECT count([SPN_HRM_04DB].[dbo].[users].[id]) AS total 
	//   FROM [SPN_HRM_04DB].[dbo].[users]
	//   WHERE [SPN_HRM_04DB].[dbo].[users].[created_at] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";
	//   $query = $this->db->query($sql);        
	//   return $query->row_array();
	// }

	function get_regis_employers($day)
	{
		$this->db->select('id');
		$this->db->from('SPN_HRM_04DB..employers');
		$this->db->where('created_at >=',$day." 00:00:00");
		$this->db->where('created_at <=',$day." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_regis_users($day)
	{
		$this->db->select('id');
		$this->db->from('SPN_HRM_04DB..users');
		$this->db->where('created_at >=',$day." 00:00:00");
		$this->db->where('created_at <=',$day." 23:59:59");
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_regis_employers_m($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('id');
		$this->db->from('SPN_HRM_04DB..employers');
		$this->db->where('created_at >=',$start_date);
		$this->db->where('created_at <=',$end_date);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_regis_users_m($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('id');
		$this->db->from('SPN_HRM_04DB..users');
		$this->db->where('created_at >=',$start_date);
		$this->db->where('created_at <=',$end_date);
		$query = $this->db->get();
		return $query->num_rows();
	}

	// function get_employers_countweek($day)
	// {
	//   $sql = "SELECT count([SPN_HRM_04DB].[dbo].[employers].[id]) AS total 
	//   FROM [SPN_HRM_04DB].[dbo].[employers]
	//   WHERE [SPN_HRM_04DB].[dbo].[employers].[created_at] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";
	//   $query = $this->db->query($sql);        
	//   return $query->row_array();
	// }

	function get_users_all($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('SPN_HRM_04DB..users.id');
		$this->db->from('SPN_HRM_04DB..users');
		$this->db->join('SPN_HRM_04DB..resumes','SPN_HRM_04DB..users.id = SPN_HRM_04DB..resumes.user_id','left');
		$this->db->where('SPN_HRM_04DB..resumes.created_at >=',$start_date);
		$this->db->where('SPN_HRM_04DB..resumes.created_at <=',$end_date);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_employers_all($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('SPN_HRM_04DB..employers.id');
		$this->db->from('SPN_HRM_04DB..employers');
		$this->db->join('SPN_HRM_04DB..employer_profile','SPN_HRM_04DB..employers.id = SPN_HRM_04DB..employer_profile.employer_id','left');
		$this->db->where('SPN_HRM_04DB..employer_profile.created_at >=',$start_date);
		$this->db->where('SPN_HRM_04DB..employer_profile.created_at <=',$end_date);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_jobs_countweek($day)
	{
		$sql = "SELECT count([SPN_HRM_04DB].[dbo].[jobs].[job_id]) AS total 
		FROM [SPN_HRM_04DB].[dbo].[jobs]
		WHERE [SPN_HRM_04DB].[dbo].[jobs].[created_at] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
	}
	function get_resumes_countweek($day)
	{
		$sql = "SELECT count([SPN_HRM_04DB].[dbo].[resumes].[resume_id]) AS total 
		FROM [SPN_HRM_04DB].[dbo].[resumes]
		WHERE [SPN_HRM_04DB].[dbo].[resumes].[user_id] IS NOT NULL
		AND  [SPN_HRM_04DB].[dbo].[resumes].[created_at] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
	}
	function get_jobs_count_all($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";
		$this->db->select('job_id');
		$this->db->from('SPN_HRM_04DB..jobs');
		$this->db->where('created_at >=',$start_date);
		$this->db->where('created_at <=',$end_date);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_resumes_count_all($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";
		$this->db->select('resume_id');
		$this->db->from('SPN_HRM_04DB..resumes');
		$this->db->where('created_at >=',$start_date);
		$this->db->where('created_at <=',$end_date);
		$query = $this->db->get();
		return $query->num_rows();
	}

  	//review program
	function get_review_program($dateStart,$dateEnd)
	{
		$sql = "SELECT * 
		FROM [SPN_HRM_04DB].[dbo].[user_program_report]
		WHERE [SPN_HRM_04DB].[dbo].[user_program_report].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}
	function get_review_month_count($user_type,$dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('id');
		$this->db->from('SPN_HRM_04DB..user_program_report');
		$this->db->where('user_type',$user_type);
		$this->db->where('created_at >= ',$start_date);
		$this->db->where('created_at <= ',$end_date);
		$query = $this->db->get();
		return $query->num_rows();
	}
	function get_review_month_all($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('id');
		$this->db->from('SPN_HRM_04DB..user_program_report');
		$this->db->where('created_at >= ',$start_date);
		$this->db->where('created_at <= ',$end_date);
		$query = $this->db->get();
		return $query->num_rows();
	}
	//user
	function get_list_employers()
	{
		$sql = "SELECT [profile_id],[employer_id],[SPN_HRM_04DB].[dbo].[employer_profile].[name] 
		FROM [SPN_HRM_04DB].[dbo].[employers]
		INNER JOIN [SPN_HRM_04DB].[dbo].[employer_profile] ON [SPN_HRM_04DB].[dbo].[employers].[id] = [SPN_HRM_04DB].[dbo].[employer_profile].[employer_id]
		WHERE [SPN_HRM_04DB].[dbo].[employer_profile].[name] IS NOT NULL ";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}
	//review
	function get_review_byemployer()
	{
		$sql = "SELECT [id]
		,[user_id]
		,[text]
		,[name]
		,[user_type]
		,[tel]
		,[view_status]
		,[SPN_HRM_04DB].[dbo].[user_program_report].[created_at]
		FROM [SPN_HRM_04DB].[dbo].[user_program_report]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[employer_profile] ON  [SPN_HRM_04DB].[dbo].[user_program_report].[user_id] = [SPN_HRM_04DB].[dbo].[employer_profile].[employer_id]
		WHERE [SPN_HRM_04DB].[dbo].[user_program_report].[user_type] = 'employer'";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}
	function get_review_byuser(){
		$sql = "SELECT [SPN_HRM_04DB].[dbo].[user_program_report].[id]
		,[SPN_HRM_04DB].[dbo].[user_program_report].[user_id]
		,[text]
		,[SPN_HRM_04DB].[dbo].[users].[name]
		,[SPN_HRM_04DB].[dbo].[users].[lastname]
		,[SPN_HRM_04DB].[dbo].[users].[contact_tel]
		,[resume_name]
		,[resume_lastname]
		,[user_type]
		,[resume_tel_contact]
		,[view_status]
		,[SPN_HRM_04DB].[dbo].[user_program_report].[created_at]
		FROM [SPN_HRM_04DB].[dbo].[user_program_report]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[resumes] ON  [SPN_HRM_04DB].[dbo].[user_program_report].[user_id] = [SPN_HRM_04DB].[dbo].[resumes].[user_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[users] ON [SPN_HRM_04DB].[dbo].[user_program_report].[user_id] = [SPN_HRM_04DB].[dbo].[users].[id]
		WHERE [SPN_HRM_04DB].[dbo].[user_program_report].[user_type] = 'user'";

		$query = $this->db->query($sql);        
		return $query->result_array();
	}
  	//job =====================================*/
    function get_emp_jobtype_all_y($dateStart,$dateEnd)
    {
		$sql = "SELECT employer1.[profile_id] 
		,employer1.[employer_id] 
		,[SPN_HRM_04DB].[dbo].[jobs].[job_type_id]
		,[job_type_name]
		,employer1.[name]
		,employer1.[created_at] 
		,COUNT(employer1.[employer_id]) AS total 
		FROM [SPN_HRM_04DB].[dbo].[employer_profile] AS employer1 
		LEFT JOIN [SPN_HRM_04DB].[dbo].[jobs] on [SPN_HRM_04DB].[dbo].[jobs].[employer_id] = employer1.[employer_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = [SPN_HRM_04DB].[dbo].[jobs].[job_type_id]
		WHERE employer1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		AND employer1.name IS NOT NULL 
		AND [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] IS NOT NULL
		GROUP BY  employer1.[profile_id] 
		,employer1.[employer_id] 
		,[SPN_HRM_04DB].[dbo].[jobs].[job_type_id]
		,[job_type_name]
		,employer1.[name]
		,employer1.[created_at]  
		ORDER BY employer1.[name] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function count_emp_jobtype_all_y($dateStart,$dateEnd)
    {
		$sql = "SELECT COUNT(DISTINCT employer1.[employer_id]) AS total
			FROM [SPN_HRM_04DB].[dbo].[employer_profile] AS employer1 
			LEFT JOIN [SPN_HRM_04DB].[dbo].[jobs] on [SPN_HRM_04DB].[dbo].[jobs].[employer_id] = employer1.[employer_id]
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = [SPN_HRM_04DB].[dbo].[jobs].[job_type_id]
			WHERE employer1.[created_at] BETWEEN '2021-01-01 00:00:00' AND '2022-08-31 23:59:59'
			AND employer1.name IS NOT NULL 
			AND [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] IS NOT NULL";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }


    function get_emp_jobtype_all_n($dateStart,$dateEnd)
    {
		$sql = "SELECT [job_id]
			,[job_name]
			,jobs1.[job_type_id]
			,[job_type_name]
			,[job_workplace_name] AS name
			,jobs1.[created_at]
			,COUNT(jobs1.[job_id]) AS total
			FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] on [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id]
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type_work] on [SPN_HRM_04DB].[dbo].[master_job_type_work].[job_type_work_id] = jobs1.[job_type_work_id]
			WHERE jobs1.[employer_id] IS NULL
			AND jobs1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
			GROUP BY [job_id]
			,[job_name]
			,jobs1.[job_type_id]
			,[job_type_name]
			,[job_workplace_name]
			,jobs1.[created_at]
			ORDER BY jobs1.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function count_emp_jobtype_all_n($dateStart,$dateEnd)
    {
		$sql = "SELECT COUNT([job_id]) AS total
			FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] on [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id]
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type_work] on [SPN_HRM_04DB].[dbo].[master_job_type_work].[job_type_work_id] = jobs1.[job_type_work_id]
			WHERE jobs1.[employer_id] IS NULL
			AND jobs1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_emp_jobtype_byid_y($job_type_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT employer1.[profile_id] 
			,employer1.[employer_id] 
			,[SPN_HRM_04DB].[dbo].[jobs].[job_type_id]
			,[job_type_name]
			,employer1.[name]
			,employer1.[created_at] 
			,COUNT(employer1.[employer_id]) AS total 
			FROM [SPN_HRM_04DB].[dbo].[employer_profile] AS employer1 
			LEFT JOIN [SPN_HRM_04DB].[dbo].[jobs] on [SPN_HRM_04DB].[dbo].[jobs].[employer_id] = employer1.[employer_id]
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = [SPN_HRM_04DB].[dbo].[jobs].[job_type_id]
			WHERE [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] IN $job_type_id
			AND employer1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
			AND employer1.name IS NOT NULL 
			AND [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] IS NOT NULL
			GROUP BY  employer1.[profile_id] 
			,employer1.[employer_id] 
			,[SPN_HRM_04DB].[dbo].[jobs].[job_type_id]
			,[job_type_name]
			,employer1.[name]
			,employer1.[created_at]  
			ORDER BY [SPN_HRM_04DB].[dbo].[jobs].[job_type_id]";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function count_emp_jobtype_byid_y($job_type_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT COUNT(DISTINCT employer1.[employer_id]) AS total
			FROM [SPN_HRM_04DB].[dbo].[employer_profile] AS employer1 
			LEFT JOIN [SPN_HRM_04DB].[dbo].[jobs] on [SPN_HRM_04DB].[dbo].[jobs].[employer_id] = employer1.[employer_id]
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = [SPN_HRM_04DB].[dbo].[jobs].[job_type_id]
			WHERE [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] IN $job_type_id
			AND employer1.[created_at] BETWEEN '2021-01-01 00:00:00' AND '2022-08-31 23:59:59'
			AND employer1.name IS NOT NULL 
			AND [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] IS NOT NULL";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }


    function get_emp_jobtype_byid_n($job_type_id,$dateStart,$dateEnd)
    {
		$sql = " SELECT [job_id]
			,[job_name]
			,jobs1.[job_type_id]
			,[job_type_name]
			,[job_workplace_name] AS name
			,jobs1.[created_at]
			,COUNT(jobs1.[job_id]) AS total
			FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] on [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id]
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type_work] on [SPN_HRM_04DB].[dbo].[master_job_type_work].[job_type_work_id] = jobs1.[job_type_work_id]
			WHERE jobs1.[employer_id] IS NULL
			AND jobs1.[job_type_id] IN $job_type_id
			AND jobs1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
			GROUP BY [job_id]
			,[job_name]
			,jobs1.[job_type_id]
			,[job_type_name]
			,[job_workplace_name]
			,jobs1.[created_at]
			ORDER BY jobs1.[job_type_id]";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function count_emp_jobtype_byid_n($job_type_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT COUNT([job_id]) AS total
			FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] on [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id]
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type_work] on [SPN_HRM_04DB].[dbo].[master_job_type_work].[job_type_work_id] = jobs1.[job_type_work_id]
			WHERE jobs1.[employer_id] IS NULL
			AND jobs1.[job_type_id] IN $job_type_id
			AND jobs1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }



    function get_res_jobtype_all_y($dateStart,$dateEnd)
    {
		$sql = "SELECT [id]
		,[email]
		,[name]
		,[lastname]
		,[contact_tel]
		,[resume_interest_job_1]
		,[job_type_name]
		,COUNT(users1.[id]) AS total
		FROM [SPN_HRM_04DB].[dbo].[users] AS users1
		LEFT JOIN [SPN_HRM_04DB].[dbo].[resumes] on [SPN_HRM_04DB].[dbo].[resumes].[user_id] = users1.[id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1]
		WHERE [resume_interest_job_1] IS NOT NULL
		AND [job_type_name] IS NOT NULL
		AND [SPN_HRM_04DB].[dbo].[resumes].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		GROUP BY[id]
		,[email]
		,[name]
		,[lastname]
		,[contact_tel]
		,[resume_interest_job_1]
		,[job_type_name]
		ORDER BY users1.[id] DESC
		";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function count_res_jobtype_all_y($dateStart,$dateEnd)
    {
		$sql = "SELECT COUNT(DISTINCT users1.[id]) AS total  
			FROM [SPN_HRM_04DB].[dbo].[users] AS users1
			LEFT JOIN [SPN_HRM_04DB].[dbo].[resumes] on [SPN_HRM_04DB].[dbo].[resumes].[user_id] = users1.[id]
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1]
			WHERE [resume_interest_job_1] IS NOT NULL
			AND [job_type_name] IS NOT NULL
			AND [SPN_HRM_04DB].[dbo].[resumes].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_res_jobtype_all_n($dateStart,$dateEnd)
    {
		$sql = "SELECT [resume_id]
		,[resume_name] AS name
		,[resume_lastname] AS lastname
		,[resume_email_contact] AS email
		,[resume_interest_job_1]
		,[job_type_name]
		,resumes1.[created_at]
		,COUNT(resumes1.[resume_id]) AS total
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		WHERE resumes1.[user_id] IS NULL
		AND resumes1.[resume_interest_job_1] IS NOT NULL
		AND resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		GROUP BY [resume_id]
		,[resume_name] 
		,[resume_lastname]
		,[resume_email_contact]
		,[resume_interest_job_1]
		,[job_type_name]
		,resumes1.[created_at]
		ORDER BY resumes1.[resume_id] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function count_res_jobtype_all_n($dateStart,$dateEnd)
    {
		$sql = "SELECT  COUNT([resume_id]) AS total 
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		WHERE resumes1.[user_id] IS NULL
		AND resumes1.[resume_interest_job_1] IS NOT NULL
		AND resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }


    function get_res_jobtype_byid_y($job_type_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT [id]
		,[email]
		,[name]
		,[lastname]
		,[contact_tel]
		,[resume_interest_job_1]
		,[job_type_name]
		,COUNT(users1.[id]) AS total
		FROM [SPN_HRM_04DB].[dbo].[users] AS users1
		LEFT JOIN [SPN_HRM_04DB].[dbo].[resumes] on [SPN_HRM_04DB].[dbo].[resumes].[user_id] = users1.[id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1]
		WHERE [resume_interest_job_1] IS NOT NULL
		AND [resume_interest_job_1] IN $job_type_id
		AND [SPN_HRM_04DB].[dbo].[resumes].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		GROUP BY[id]
		,[email]
		,[name]
		,[lastname]
		,[contact_tel]
		,[resume_interest_job_1]
		,[job_type_name]
		ORDER BY users1.[id] DESC
		";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function count_res_jobtype_byid_y($job_type_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT COUNT(DISTINCT users1.[id]) AS total  
			FROM [SPN_HRM_04DB].[dbo].[users] AS users1
			LEFT JOIN [SPN_HRM_04DB].[dbo].[resumes] on [SPN_HRM_04DB].[dbo].[resumes].[user_id] = users1.[id]
			LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1]
			WHERE [resume_interest_job_1] IS NOT NULL
			AND [resume_interest_job_1] IN $job_type_id
			AND [SPN_HRM_04DB].[dbo].[resumes].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }

    function get_res_jobtype_byid_n($job_type_id,$dateStart,$dateEnd)
    {
		$sql = " SELECT [resume_id]
		,[resume_name] AS name
		,[resume_lastname] AS lastname
		,[resume_email_contact] AS email
		,[resume_interest_job_1]
		,[job_type_name]
		,resumes1.[created_at]
		,COUNT(resumes1.[resume_id]) AS total
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		WHERE resumes1.[user_id] IS NULL
		AND resumes1.[resume_interest_job_1] IN $job_type_id
		AND resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		GROUP BY [resume_id]
		,[resume_name] 
		,[resume_lastname]
		,[resume_email_contact]
		,[resume_interest_job_1]
		,[job_type_name]
		,resumes1.[created_at]
		ORDER BY resumes1.[resume_id] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
    }

    function count_res_jobtype_byid_n($job_type_id,$dateStart,$dateEnd)
    {
		$sql = "SELECT COUNT([resume_id]) AS total 
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		WHERE resumes1.[user_id] IS NULL
		AND resumes1.[resume_interest_job_1] IN $job_type_id
		AND resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->row_array();
    }








  /*=========================================*/

  // function get_job_detail_all($dateStart,$dateEnd)
  // {
  //   $sql = "SELECT 
  //     jobs1.employer_id
  //     ,[name]
  //     ,[post_type]
  //     ,jobs1.[job_type_id]
  //     ,[job_type_name]
  //     ,(SELECT count([SPN_HRM_04DB].[dbo].[jobs].[job_id]) 
  //     FROM  [SPN_HRM_04DB].[dbo].[jobs]
  //     WHERE [SPN_HRM_04DB].[dbo].[jobs].[employer_id] = jobs1.employer_id
  //     AND [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] = jobs1.[job_type_id]) AS total_type
  //     FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1
  //     INNER JOIN [SPN_HRM_04DB].[dbo].[employer_profile] ON jobs1.[employer_id] = [SPN_HRM_04DB].[dbo].[employer_profile].[employer_id]
  //     INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id]
  //     WHERE jobs1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
  //     GROUP BY jobs1.employer_id,[name],[post_type],jobs1.[job_type_id],[job_type_name]
  //     ORDER BY jobs1.[job_type_id]";
  //   $query = $this->db->query($sql);        
  //   return $query->result_array();
  // }

	function get_job_total_company_all($dateStart,$dateEnd)
	{
		$sql = "SELECT DISTINCT jobs1.employer_id 
		FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1 
		INNER JOIN [SPN_HRM_04DB].[dbo].[employer_profile] ON jobs1.[employer_id] = [SPN_HRM_04DB].[dbo].[employer_profile].[employer_id] 
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id] 
		WHERE jobs1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_job_total_company_login($post_type,$dateStart,$dateEnd)
	{
		$sql = "SELECT DISTINCT jobs1.employer_id 
		FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1 
		INNER JOIN [SPN_HRM_04DB].[dbo].[employer_profile] ON jobs1.[employer_id] = [SPN_HRM_04DB].[dbo].[employer_profile].[employer_id] 
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id] 
		WHERE jobs1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		AND jobs1.[post_type] = '$post_type'";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_resumes_detail_all($dateStart,$dateEnd)
	{
		$sql = "SELECT [user_id]
		,[id]
		,[resume_post_type]
		,[resume_interest_job_1]
		,[resume_name]
		,[resume_lastname]
		,[job_type_name]
		,[name]
		,[lastname]
		,(SELECT count([SPN_HRM_04DB].[dbo].[resumes].[resume_id]) 
		FROM  [SPN_HRM_04DB].[dbo].[resumes]
		WHERE [SPN_HRM_04DB].[dbo].[resumes].[user_id] = resumes1.[user_id]
		AND [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1] = resumes1.[resume_interest_job_1]) AS total
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[users] ON [SPN_HRM_04DB].[dbo].[users].[id] = resumes1.[user_id]
		WHERE resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY resumes1.[resume_interest_job_1]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_job_detail_post_type($post_type,$dateStart,$dateEnd)
	{
		//1,0 post_type = เป็นสมาชิก,ไม่เป็นสมาชิก
		$sql = "SELECT 
		jobs1.employer_id
		,[name]
		,[post_type]
		,jobs1.[job_type_id]
		,[job_type_name]
		,(SELECT count([SPN_HRM_04DB].[dbo].[jobs].[job_id]) 
		FROM  [SPN_HRM_04DB].[dbo].[jobs]
		WHERE [SPN_HRM_04DB].[dbo].[jobs].[employer_id] = jobs1.employer_id
		AND [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] = jobs1.[job_type_id]) AS total_type
		FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1
		INNER JOIN [SPN_HRM_04DB].[dbo].[employer_profile] ON jobs1.[employer_id] = [SPN_HRM_04DB].[dbo].[employer_profile].[employer_id]
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id]
		WHERE  jobs1.[post_type] = '$post_type'
		AND jobs1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		GROUP BY jobs1.employer_id,[name],[post_type],jobs1.[job_type_id],[job_type_name]
		ORDER BY jobs1.[job_type_id]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_resumes_detail_post_type0($post_type,$dateStart,$dateEnd)
	{
		//0 post_type = ไม่เป็นสมาชิก 
		$sql = "SELECT [user_id]
		,[id]
		,[resume_post_type]
		,[resume_interest_job_1]
		,[resume_name]
		,[resume_lastname]
		,[job_type_name]
		,[name]
		,[lastname]
		,(SELECT count([SPN_HRM_04DB].[dbo].[resumes].[resume_id]) 
		FROM  [SPN_HRM_04DB].[dbo].[resumes]
		WHERE [SPN_HRM_04DB].[dbo].[resumes].[user_id] = resumes1.[user_id]
		AND [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1] = resumes1.[resume_interest_job_1]) AS total
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[users] ON [SPN_HRM_04DB].[dbo].[users].[id] = resumes1.[user_id]
		WHERE resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		AND (resumes1.[resume_post_type] = '$post_type' OR resumes1.[resume_post_type] IS NULL)
		ORDER BY resumes1.[resume_interest_job_1]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_resumes_detail_post_type1($post_type,$dateStart,$dateEnd)
	{
		//1 post_type = เป็นสมาชิก
		$sql = "SELECT [user_id]
		,[id]
		,[resume_post_type]
		,[resume_interest_job_1]
		,[resume_name]
		,[resume_lastname]
		,[job_type_name]
		,[name]
		,[lastname]
		,(SELECT count([SPN_HRM_04DB].[dbo].[resumes].[resume_id]) 
		FROM  [SPN_HRM_04DB].[dbo].[resumes]
		WHERE [SPN_HRM_04DB].[dbo].[resumes].[user_id] = resumes1.[user_id]
		AND [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1] = resumes1.[resume_interest_job_1]) AS total
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[users] ON [SPN_HRM_04DB].[dbo].[users].[id] = resumes1.[user_id]
		WHERE resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		AND resumes1.[resume_post_type] = '$post_type'
		ORDER BY resumes1.[resume_interest_job_1]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}


	function get_job_detail_jobtype($job_type,$dateStart,$dateEnd)
	{
		//post_type = ALL,job_type_id = เลือก
		$sql = "SELECT 
		jobs1.employer_id
		,[name]
		,[post_type]
		,jobs1.[job_type_id]
		,[job_type_name]
		,(SELECT count([SPN_HRM_04DB].[dbo].[jobs].[job_id]) 
		FROM  [SPN_HRM_04DB].[dbo].[jobs]
		WHERE [SPN_HRM_04DB].[dbo].[jobs].[employer_id] = jobs1.employer_id
		AND [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] = jobs1.[job_type_id]) AS total_type
		FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1
		INNER JOIN [SPN_HRM_04DB].[dbo].[employer_profile] ON jobs1.[employer_id] = [SPN_HRM_04DB].[dbo].[employer_profile].[employer_id]
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id]
		WHERE jobs1.[job_type_id] IN $job_type
		AND jobs1.[created_at] BETWEEN '2021-01-01 00:00:00' AND '2022-08-31 23:59:59'
		GROUP BY jobs1.employer_id,[name],[post_type],jobs1.[job_type_id],[job_type_name]
		ORDER BY jobs1.[job_type_id]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_job_detail_jobtype_posttype($job_type,$post_type,$dateStart,$dateEnd)
	{
		//post_type = 0 ไม่เป็นสมาชิก ,job_type_id = เลือก
		$sql = "SELECT 
		jobs1.employer_id
		,[name]
		,[post_type]
		,jobs1.[job_type_id]
		,[job_type_name]
		,(SELECT count([SPN_HRM_04DB].[dbo].[jobs].[job_id]) 
		FROM  [SPN_HRM_04DB].[dbo].[jobs]
		WHERE [SPN_HRM_04DB].[dbo].[jobs].[employer_id] = jobs1.employer_id
		AND [SPN_HRM_04DB].[dbo].[jobs].[job_type_id] = jobs1.[job_type_id]) AS total_type
		FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1
		INNER JOIN [SPN_HRM_04DB].[dbo].[employer_profile] ON jobs1.[employer_id] = [SPN_HRM_04DB].[dbo].[employer_profile].[employer_id]
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id]
		WHERE jobs1.[job_type_id] IN $job_type
		AND jobs1.[post_type] = '$post_type'
		AND jobs1.[created_at] BETWEEN '2021-01-01 00:00:00' AND '2022-08-31 23:59:59'
		GROUP BY jobs1.employer_id,[name],[post_type],jobs1.[job_type_id],[job_type_name]
		ORDER BY jobs1.[job_type_id]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_resumes_detail_jobtype($job_type,$dateStart,$dateEnd)
	{
		//ALL posttype
		//resume_post_type = job_type
		$sql = "SELECT [user_id]
		,[id]
		,[resume_post_type]
		,[resume_interest_job_1]
		,[resume_name]
		,[resume_lastname]
		,[job_type_name]
		,[name]
		,[lastname]
		,(SELECT count([SPN_HRM_04DB].[dbo].[resumes].[resume_id]) 
		FROM  [SPN_HRM_04DB].[dbo].[resumes]
		WHERE [SPN_HRM_04DB].[dbo].[resumes].[user_id] = resumes1.[user_id]
		AND [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1] = resumes1.[resume_interest_job_1]) AS total
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[users] ON [SPN_HRM_04DB].[dbo].[users].[id] = resumes1.[user_id]
		WHERE resumes1.[resume_interest_job_1] IN $job_type
		resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		ORDER BY resumes1.[resume_interest_job_1]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_resumes_detail_jobtype_posttype0($job_type,$post_type,$dateStart,$dateEnd)
	{
		//0 posttype
		//resume_post_type = job_type
		$sql = "SELECT [user_id]
		,[id]
		,[resume_post_type]
		,[resume_interest_job_1]
		,[resume_name]
		,[resume_lastname]
		,[job_type_name]
		,[name]
		,[lastname]
		,(SELECT count([SPN_HRM_04DB].[dbo].[resumes].[resume_id]) 
		FROM  [SPN_HRM_04DB].[dbo].[resumes]
		WHERE [SPN_HRM_04DB].[dbo].[resumes].[user_id] = resumes1.[user_id]
		AND [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1] = resumes1.[resume_interest_job_1]) AS total
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[users] ON [SPN_HRM_04DB].[dbo].[users].[id] = resumes1.[user_id]
		WHERE resumes1.[resume_interest_job_1] IN $job_type
		resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		AND (resumes1.[resume_post_type] = '$job_type' OR resumes1.[resume_post_type] IS NULL)
		ORDER BY resumes1.[resume_interest_job_1]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_resumes_detail_jobtype_posttype1($job_type,$post_type,$dateStart,$dateEnd)
	{
		//0 posttype
		//resume_post_type = job_type
		$sql = "SELECT [user_id]
		,[id]
		,[resume_post_type]
		,[resume_interest_job_1]
		,[resume_name]
		,[resume_lastname]
		,[job_type_name]
		,[name]
		,[lastname]
		,(SELECT count([SPN_HRM_04DB].[dbo].[resumes].[resume_id]) 
		FROM  [SPN_HRM_04DB].[dbo].[resumes]
		WHERE [SPN_HRM_04DB].[dbo].[resumes].[user_id] = resumes1.[user_id]
		AND [SPN_HRM_04DB].[dbo].[resumes].[resume_interest_job_1] = resumes1.[resume_interest_job_1]) AS total
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		INNER JOIN [SPN_HRM_04DB].[dbo].[master_job_type] ON [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = resumes1.[resume_interest_job_1]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[users] ON [SPN_HRM_04DB].[dbo].[users].[id] = resumes1.[user_id]
		WHERE resumes1.[resume_interest_job_1] IN $job_type
		resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		AND resumes1.[resume_interest_job_1] = '$post_type'
		ORDER BY resumes1.[resume_interest_job_1]";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}
  
	//user
	function get_employers_y($dateStart,$dateEnd)
	{
		$sql = "SELECT employer1.[profile_id] 
		,employer1.[employer_id] 
		,employer1.[name]
		,[contact_name]
		,[email] 
		,[tel]
		,[address]
		,[district_name]
		,[amphur_name]
		,[province_name]
		,[zip_code]
		,[contact_name]
		,[industry_name_th]
		,[business_name_th]
		,[SPN_HRM_04DB].[dbo].[master_industrial_estate].[name] AS industrial_estate_name_th
		,employer1.[created_at] 
		,COUNT([SPN_HRM_04DB].[dbo].[jobs].[job_id]) AS total 
		FROM [SPN_HRM_04DB].[dbo].[employer_profile] AS employer1 
		LEFT JOIN [SPN_HRM_04DB].[dbo].[jobs] on [SPN_HRM_04DB].[dbo].[jobs].[employer_id] = employer1.[employer_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_district] ON [SPN_HRM_04DB].[dbo].[master_loc_district].[district_id] = employer1.[district_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_amphur] ON [SPN_HRM_04DB].[dbo].[master_loc_amphur].[amphur_id] = employer1.[amphur_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_province] ON [SPN_HRM_04DB].[dbo].[master_loc_province].[province_id] = employer1.[province_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_industry_group] ON [SPN_HRM_04DB].[dbo].[master_industry_group].[industry_id] = employer1.[industrial_group]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_business_group] ON [SPN_HRM_04DB].[dbo].[master_business_group].[business_id] = employer1.[bussiness_category]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_industrial_estate] ON [SPN_HRM_04DB].[dbo].[master_industrial_estate].[id] = employer1.[industrial_estate_name]
		WHERE employer1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		AND employer1.name IS NOT NULL 
		GROUP BY employer1.[profile_id] ,employer1.[employer_id] ,employer1.[name] ,[contact_name],[email] ,[tel],[address],[district_name],[amphur_name]
		,[province_name],[zip_code],[contact_name],[industry_name_th],[business_name_th],[SPN_HRM_04DB].[dbo].[master_industrial_estate].[name],employer1.[created_at] 
		ORDER BY employer1.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_employers_n($dateStart,$dateEnd)
	{
		$sql = "SELECT [job_id]
		,[job_name]
		,[job_type_name]
		,[job_type_work_name]
		,[education_name]
		,[amphur_name]
		,[province_name]
		,[job_workplace_name]
		,[job_workplace_email]
		,[job_workplace_tel]
		,CAST(job_workplace_address AS NVARCHAR(255)) job_workplace_address
		,[job_workplace_website]
		,jobs1.[created_at]
		,COUNT(jobs1.[job_id]) AS total
		FROM [SPN_HRM_04DB].[dbo].[jobs] AS jobs1
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type] on [SPN_HRM_04DB].[dbo].[master_job_type].[job_type_id] = jobs1.[job_type_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_job_type_work] on [SPN_HRM_04DB].[dbo].[master_job_type_work].[job_type_work_id] = jobs1.[job_type_work_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_education] on [SPN_HRM_04DB].[dbo].[master_education].[education_id] = jobs1.[education_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_amphur] ON [SPN_HRM_04DB].[dbo].[master_loc_amphur].[amphur_id] = jobs1.[amphur_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_province] ON [SPN_HRM_04DB].[dbo].[master_loc_province].[province_id] = jobs1.[province_id]
		WHERE jobs1.[employer_id] IS NULL
		AND jobs1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		GROUP BY [job_id],[job_name] ,[job_type_name],[job_type_work_name] ,[education_name] ,[amphur_name] ,[province_name] ,[job_workplace_name]
				,[job_workplace_email],[job_workplace_tel],CAST(job_workplace_address AS NVARCHAR(255)),[job_workplace_website],jobs1.[created_at]
		ORDER BY jobs1.[created_at] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_users_y($dateStart,$dateEnd)
	{
		$sql = "SELECT [id]
		,[email]
		,[name]
		,[lastname]
		,[contact_tel]
		,CAST(address AS NVARCHAR(255)) address
		,[district_name]
		,[amphur_name]
		,[province_name]
		,[section_profile_updated]
		,COUNT([SPN_HRM_04DB].[dbo].[resumes].[resume_id]) AS total
		FROM [SPN_HRM_04DB].[dbo].[users] AS users1
		LEFT JOIN [SPN_HRM_04DB].[dbo].[resumes] on [SPN_HRM_04DB].[dbo].[resumes].[user_id] = users1.[id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_district] ON [SPN_HRM_04DB].[dbo].[master_loc_district].[district_id] = users1.[district_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_amphur] ON [SPN_HRM_04DB].[dbo].[master_loc_amphur].[amphur_id] = users1.[amphur_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_province] ON [SPN_HRM_04DB].[dbo].[master_loc_province].[province_id] = users1.[province_id]
		WHERE [SPN_HRM_04DB].[dbo].[resumes].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		GROUP BY [id]
		,[email]
		,[name]
		,[lastname]
		,[contact_tel]
		,CAST(address AS NVARCHAR(255))
		,[district_name]
		,[amphur_name]
		,[province_name]
		,[section_profile_updated]
		ORDER BY users1.[id] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function get_users_n($dateStart,$dateEnd)
	{
		$sql = "SELECT [resume_id]
		,[resume_name]
		,[resume_lastname]
		,[resume_email_contact]
		,[resume_tel_contact]
		,CAST(resume_address AS NVARCHAR(255)) resume_address
		,[district_name]
		,[amphur_name]
		,[province_name]
		,[resume_zip_code]
		,resumes1.[created_at]
		,COUNT(resumes1.[resume_id]) AS total
		FROM [SPN_HRM_04DB].[dbo].[resumes] AS resumes1
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_district] ON [SPN_HRM_04DB].[dbo].[master_loc_district].[district_id] = resumes1.[resume_district_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_amphur] ON [SPN_HRM_04DB].[dbo].[master_loc_amphur].[amphur_id] = resumes1.[resume_amphur_id]
		LEFT JOIN [SPN_HRM_04DB].[dbo].[master_loc_province] ON [SPN_HRM_04DB].[dbo].[master_loc_province].[province_id] = resumes1.[resume_province_id]
		WHERE resumes1.[user_id] IS NULL
		AND resumes1.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
		GROUP BY [resume_id]
		,[resume_name]
		,[resume_lastname]
		,[resume_email_contact]
		,[resume_tel_contact]
		,CAST(resume_address AS NVARCHAR(255))
		,[district_name]
		,[amphur_name]
		,[province_name]
		,[resume_zip_code]
		,resumes1.[created_at]
		ORDER BY resumes1.[resume_id] DESC";
		$query = $this->db->query($sql);        
		return $query->result_array();
	}

	function update_user_program_report($id,$params)
	{
		$this->db->where('id',$id);
		return $this->db->update('SPN_HRM_04DB..user_program_report',$params);
	}

	function get_employers_recent($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('employers.email,employer_profile.name,employer_profile.created_at');
		$this->db->from('SPN_HRM_04DB..employers');
		$this->db->join('SPN_HRM_04DB..employer_profile', 'employers.id = employer_profile.employer_id');
		$this->db->where('employer_profile.created_at >=',$start_date);
		$this->db->where('employer_profile.created_at <=',$end_date);
		$this->db->where('employer_profile.name !=',NULL);
		$this->db->order_by('employer_profile.created_at', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_users_recent($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('users.email,users.name,resumes.created_at');
		$this->db->from('SPN_HRM_04DB..users');
		$this->db->join('SPN_HRM_04DB..resumes', 'users.id = resumes.user_id');
		$this->db->where('resumes.created_at >=',$start_date);
		$this->db->where('resumes.created_at <=',$end_date);
		$this->db->where('users.name !=',NULL);
		$this->db->order_by('resumes.created_at', 'DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_employers($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('employers.email,employer_profile.name,employer_profile.created_at');
		$this->db->from('SPN_HRM_04DB..employers');
		$this->db->join('SPN_HRM_04DB..employer_profile', 'employers.id = employer_profile.employer_id');
		$this->db->where('employer_profile.created_at >=',$start_date);
		$this->db->where('employer_profile.created_at <=',$end_date);
		$this->db->where('employer_profile.name !=',NULL);
		$this->db->order_by('employer_profile.created_at', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_users($dateStart,$dateEnd)
	{
		$start_date = $dateStart." 00:00:00";
		$end_date = $dateEnd." 23:59:59";

		$this->db->select('users.email,users.name,resumes.created_at');
		$this->db->from('SPN_HRM_04DB..users');
		$this->db->join('SPN_HRM_04DB..resumes', 'users.id = resumes.user_id');
		$this->db->where('resumes.created_at >=',$start_date);
		$this->db->where('resumes.created_at <=',$end_date);
		$this->db->where('users.name !=',NULL);
		$this->db->order_by('resumes.created_at', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
}