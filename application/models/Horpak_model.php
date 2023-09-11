<?php
class Horpak_model extends CI_Model
{
  function __construct()
  {
      parent::__construct();
  }

  function get_register($oauth_provider,$dateStart,$dateEnd)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[users].[id]) AS total 
    FROM [Dorm_System].[dbo].[users]
    INNER JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[users].[id] = [Dorm_System].[dbo].[Company_information].[created_by]
    WHERE [Dorm_System].[dbo].[users].[oauth_provider] = '$oauth_provider'
    AND [Dorm_System].[dbo].[users].[created] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  function get_admin_week($oauth_provider,$day)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[users].[id]) AS total 
    FROM [Dorm_System].[dbo].[users]
    INNER JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[users].[id] = [Dorm_System].[dbo].[Company_information].[created_by]
    WHERE [Dorm_System].[dbo].[users].[oauth_provider] = '$oauth_provider'
    AND [Dorm_System].[dbo].[users].[created] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  function get_register_thisweek_admin($day)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[users].[id]) AS total 
    FROM [Dorm_System].[dbo].[users]
    WHERE [Dorm_System].[dbo].[users].[oauth_provider] IS NOT NULL
    AND [Dorm_System].[dbo].[users].[created] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_register_thisweek($day,$employees_type)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[users].[id]) AS total 
    FROM [Dorm_System].[dbo].[users]
    WHERE [Dorm_System].[dbo].[users].[employees_type]  = '$employees_type'
    AND [Dorm_System].[dbo].[users].[created_at] BETWEEN '$day 00:00:00' AND '$day 23:59:59'";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_admin_all($dateStart,$dateEnd)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[users].[id]) AS total 
    FROM [Dorm_System].[dbo].[users]
    WHERE [Dorm_System].[dbo].[users].[oauth_provider] IS NOT NULL
    AND [Dorm_System].[dbo].[users].[created] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";    
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_employee_all($employees_type,$dateStart,$dateEnd)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[users].[id]) AS total 
    FROM [Dorm_System].[dbo].[users]
    WHERE [Dorm_System].[dbo].[users].[employees_type]  = '$employees_type' 
    AND [Dorm_System].[dbo].[users].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";    
    $query = $this->db->query($sql);        
    return $query->row_array(); 
  }

  function get_admin_recent($dateStart,$dateEnd)
  {
    $sql = "SELECT TOP 5 * 
    FROM [Dorm_System].[dbo].[Company_information] 
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = [Dorm_System].[dbo].[Company_information].[created_by]
    WHERE [Dorm_System].[dbo].[Company_information].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    ORDER BY [Dorm_System].[dbo].[Company_information].[created_at] DESC";
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

  function get_comment_all($dateStart,$dateEnd)
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
    ,(SELECT sum([Dorm_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
    FROM [Dorm_System].[dbo].[Evaluate]
    WHERE [Dorm_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
    ) as sum_evaluate
    FROM [Dorm_System].[dbo].[Evaluate] AS Comment
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = Comment.[created_by]
    WHERE Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    ORDER BY Comment.[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_comment_count_admin($dateStart,$dateEnd)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[Evaluate].[evaluate_id]) AS total
    FROM [Dorm_System].[dbo].[Evaluate] 
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = [Dorm_System].[dbo].[Evaluate].[created_by]
    WHERE [Dorm_System].[dbo].[users].[oauth_provider] IS NOT NULL 
    AND [Dorm_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_comment_count_employee($employee_type,$dateStart,$dateEnd)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[Evaluate].[evaluate_id]) AS total
    FROM [Dorm_System].[dbo].[Evaluate] 
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = [Dorm_System].[dbo].[Evaluate].[created_by]
    WHERE [Dorm_System].[dbo].[users].[employees_type] = '$employee_type'
    AND [Dorm_System].[dbo].[users].[oauth_provider] IS NULL
    AND [Dorm_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_comment_count_all($dateStart,$dateEnd)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[Evaluate].[evaluate_id]) AS total
    FROM [Dorm_System].[dbo].[Evaluate] 
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = [Dorm_System].[dbo].[Evaluate].[created_by]
    WHERE [Dorm_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_ma_all($dateStart,$dateEnd)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[Report].[report_id]) AS total
    FROM [Dorm_System].[dbo].[Report]
    WHERE [Dorm_System].[dbo].[Report].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [Dorm_System].[dbo].[Report].[isdelete] = '0' ";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_evaluate_detail_all($dateStart,$dateEnd)
  {
    $sql = "SELECT count([Dorm_System].[dbo].[Evaluate].[evaluate_id]) AS total
    FROM [Dorm_System].[dbo].[Evaluate]
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = [Dorm_System].[dbo].[Evaluate].[created_by]
    WHERE [Dorm_System].[dbo].[Evaluate].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
    AND [Dorm_System].[dbo].[Evaluate].[detail] IS NOT NULL 
    AND DATALENGTH([Dorm_System].[dbo].[Evaluate].[detail]) > 0";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  //user ************

  function get_company()
  {
    $sql = "SELECT [company_id]
    ,[company_code]
    ,[company_name]
    FROM [Dorm_System].[dbo].[Company_information]
    WHERE [Dorm_System].[dbo].[Company_information].[isdelete] = '0'
    ORDER BY [Dorm_System].[dbo].[Company_information].[company_id] ASC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_search_admin_all($dateStart,$dateEnd)
  {
    $sql ="SELECT Company.[company_id] 
      ,[company_name] 
      ,[company_email] 
      ,Company.[created_at] 
      ,[first_name] 
      ,[last_name] 
      ,[email] 
      ,(SELECT top 1 [Dorm_System].[dbo].[Report].created_at 
          FROM [Dorm_System].[dbo].[Report]  
              WHERE [Dorm_System].[dbo].[Report].[company_id] = Company.[company_id]
              ORDER BY [Dorm_System].[dbo].[Report].created_at DESC 
              ) AS created_ma
      FROM [Dorm_System].[dbo].[Company_information] AS Company
      LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = Company.[created_by] 
      WHERE Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
      AND [Dorm_System].[dbo].[users].[oauth_provider] IS NOT NULL 
      ORDER BY Company.[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_search_admin_byid($company_id,$dateStart,$dateEnd)
  {
    $sql = "SELECT 
    Company.[company_id]
    ,[company_name]
    ,[company_email]
    ,Company.[created_at]
    ,[first_name]
    ,[last_name]
    ,[email]
    FROM [Dorm_System].[dbo].[Company_information] AS Company
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = Company.[created_by]
    WHERE Company.[company_id] IN $company_id
    AND Company.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [Dorm_System].[dbo].[users].[oauth_provider] IS NOT NULL
    ORDER BY Company.[company_id]";  
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_searchemp_type_all($employees_type,$dateStart,$dateEnd)
  {
    $sql = "SELECT [Dorm_System].[dbo].[users].[first_name]
    ,[Dorm_System].[dbo].[users].[last_name]
    ,[employees_type]
    ,[email]
    ,[username]
    ,[department_name]
    ,[section_name]
    ,[Dorm_System].[dbo].[users].[company_id]
    ,[company_name]
    ,[company_email]
    ,[Dorm_System].[dbo].[users].[created_at]
    FROM [Dorm_System].[dbo].[users]
    LEFT JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] = [Dorm_System].[dbo].[users].[company_id]
    LEFT JOIN [Dorm_System].[dbo].[Department] ON [Dorm_System].[dbo].[Department].[department_id] =
    [Dorm_System].[dbo].[users].[department_id]
    LEFT JOIN [Dorm_System].[dbo].[Section] ON [Dorm_System].[dbo].[Section].[section_id] =
    [Dorm_System].[dbo].[users].[section_id]
    WHERE [Dorm_System].[dbo].[users].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [Dorm_System].[dbo].[users].[employees_type] = '$employees_type'
    ORDER BY [Dorm_System].[dbo].[users].[company_id]";  
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

   function get_searchemp_type_byid($company_id,$employees_type,$dateStart,$dateEnd)
  {
    $sql = "SELECT [Dorm_System].[dbo].[users].[first_name]
    ,[Dorm_System].[dbo].[users].[last_name]
    ,[employees_type]
    ,[email]
    ,[username]
    ,[department_name]
    ,[section_name]
    ,[Dorm_System].[dbo].[users].[company_id]
    ,[company_name]
    ,[company_email]
    ,[Dorm_System].[dbo].[users].[created_at]
    FROM [Dorm_System].[dbo].[users]
    LEFT JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] = [Dorm_System].[dbo].[users].[company_id]
    LEFT JOIN [Dorm_System].[dbo].[Department] ON [Dorm_System].[dbo].[Department].[department_id] =
    [Dorm_System].[dbo].[users].[department_id]
    LEFT JOIN [Dorm_System].[dbo].[Section] ON [Dorm_System].[dbo].[Section].[section_id] =
    [Dorm_System].[dbo].[users].[section_id]
    WHERE [Dorm_System].[dbo].[users].[company_id] IN $company_id
    AND [Dorm_System].[dbo].[users].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [Dorm_System].[dbo].[users].[employees_type] = '$employees_type'
    ORDER BY [Dorm_System].[dbo].[users].[company_id]";  
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_total_emptype($employees_type,$dateStart,$dateEnd)
  {
    $sql = "SELECT DISTINCT [Dorm_System].[dbo].[users].[company_id] 
      FROM [Dorm_System].[dbo].[users]
      WHERE [Dorm_System].[dbo].[users].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
      AND [Dorm_System].[dbo].[users].[employees_type] = '$employees_type'";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_total_emptype_byid($company_id,$employees_type,$dateStart,$dateEnd)
  {
    $sql = "SELECT DISTINCT [Dorm_System].[dbo].[users].[company_id] 
      FROM [Dorm_System].[dbo].[users]
      WHERE [Dorm_System].[dbo].[users].[company_id] IN $company_id
      AND [Dorm_System].[dbo].[users].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
      AND [Dorm_System].[dbo].[users].[employees_type] = '$employees_type'";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  //job *************

  function get_ma_detail_all()
  {
    $sql = "SELECT MA.[company_id]
      ,[company_name]
      ,(SELECT count([Dorm_System].[dbo].[Report].[report_id]) 
      FROM [Dorm_System].[dbo].[Report]  
      WHERE [Dorm_System].[dbo].[Report].[company_id] = MA.[company_id]
      AND [Dorm_System].[dbo].[Report].[report_type]  = 1
      AND [Dorm_System].[dbo].[Report].[report_status]  = 3
      AND [Dorm_System].[dbo].[Report].[isdelete]  = 0
      ) AS report_type1
      ,(SELECT count([Dorm_System].[dbo].[Report].[report_id]) 
      FROM [Dorm_System].[dbo].[Report]  
      WHERE [Dorm_System].[dbo].[Report].[company_id] = MA.[company_id]
      AND [Dorm_System].[dbo].[Report].[report_type]  = 2
      AND [Dorm_System].[dbo].[Report].[report_status]  = 3
      AND [Dorm_System].[dbo].[Report].[isdelete]  = 0
      ) AS report_type2
      ,(SELECT count([Dorm_System].[dbo].[Report].[report_id]) 
      FROM [Dorm_System].[dbo].[Report]  
      WHERE [Dorm_System].[dbo].[Report].[company_id] = MA.[company_id]
      AND [Dorm_System].[dbo].[Report].[report_status]  = 3
      AND [Dorm_System].[dbo].[Report].[isdelete]  = 0
      ) AS total
      FROM [Dorm_System].[dbo].[Report] AS MA
      INNER JOIN [Dorm_System].[dbo].[Company_information] ON MA.[company_id] = [Dorm_System].[dbo].[Company_information].[company_id]
      WHERE MA.[isdelete] = 0
      GROUP BY MA.[company_id],[company_name]";  
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_pm_detail_all()
  { 
    $sql = "SELECT PM.[company_id]
      ,[company_name]
      ,COUNT(PM.[pm_id]) AS total
      FROM [Dorm_System].[dbo].[Pm] AS PM
      INNER JOIN [Dorm_System].[dbo].[Company_information] ON PM.[company_id] = [Dorm_System].[dbo].[Company_information].[company_id]
      WHERE PM.[pm_status] = 2
      AND PM.[isdelete] = 0
      GROUP BY PM.[company_id],[company_name]";  
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_ma_detail_byid($company_id)
  {
    $sql = "SELECT MA.[company_id]
      ,[company_name]
      ,(SELECT count([Dorm_System].[dbo].[Report].[report_id]) 
      FROM [Dorm_System].[dbo].[Report]  
      WHERE [Dorm_System].[dbo].[Report].[company_id] = MA.[company_id]
      AND [Dorm_System].[dbo].[Report].[report_type]  = 1
      AND [Dorm_System].[dbo].[Report].[report_status]  = 3
      AND [Dorm_System].[dbo].[Report].[isdelete]  = 0
      ) AS report_type1
      ,(SELECT count([Dorm_System].[dbo].[Report].[report_id]) 
      FROM [Dorm_System].[dbo].[Report]  
      WHERE [Dorm_System].[dbo].[Report].[company_id] = MA.[company_id]
      AND [Dorm_System].[dbo].[Report].[report_type]  = 2
      AND [Dorm_System].[dbo].[Report].[report_status]  = 3
      AND [Dorm_System].[dbo].[Report].[isdelete]  = 0
      ) AS report_type2
      ,(SELECT count([Dorm_System].[dbo].[Report].[report_id]) 
      FROM [Dorm_System].[dbo].[Report]  
      WHERE [Dorm_System].[dbo].[Report].[company_id] = MA.[company_id]
      AND [Dorm_System].[dbo].[Report].[report_status]  = 3
      AND [Dorm_System].[dbo].[Report].[isdelete]  = 0
      ) AS total
      FROM [Dorm_System].[dbo].[Report] AS MA
      INNER JOIN [Dorm_System].[dbo].[Company_information] ON MA.[company_id] = [Dorm_System].[dbo].[Company_information].[company_id]
      WHERE MA.[company_id] IN $company_id AND MA.[isdelete] = 0
      GROUP BY MA.[company_id],[company_name]";  
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_pm_detail_byid($company_id)
  { 
    $sql ="
      SELECT PM.[company_id]
      ,[company_name]
      ,COUNT(PM.[pm_id]) AS total
      FROM [Dorm_System].[dbo].[Pm] AS PM
      INNER JOIN [Dorm_System].[dbo].[Company_information] ON PM.[company_id] = [Dorm_System].[dbo].[Company_information].[company_id]
      WHERE PM.[company_id] IN $company_id 
      AND PM.[pm_status] = 2
      AND PM.[isdelete] = 0
      GROUP BY PM.[company_id],[company_name]";  
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  //review ****************

  function get_evaluate_all($dateStart,$dateEnd)
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
    ,(SELECT sum([Dorm_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
    FROM [Dorm_System].[dbo].[Evaluate]
    WHERE [Dorm_System].[dbo].[Evaluate].[detail] IS NOT NULL 
    AND DATALENGTH(Comment.[detail]) > 0
    AND [Dorm_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
    ) as sum_evaluate
    FROM [Dorm_System].[dbo].[Evaluate] AS Comment
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = Comment.[created_by]
    LEFT JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
    WHERE Comment.[detail] IS NOT NULL 
    AND DATALENGTH(Comment.[detail]) > 0
    AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    ORDER BY Comment.[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_evaluate_byemp($employee_type,$dateStart,$dateEnd)
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
    ,(SELECT sum([Dorm_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
    FROM [Dorm_System].[dbo].[Evaluate]
    WHERE [Dorm_System].[dbo].[Evaluate].[detail] IS NOT NULL
    AND DATALENGTH(Comment.[detail]) > 0
    AND [Dorm_System].[dbo].[users].[employees_type] = '$employee_type'
    AND [Dorm_System].[dbo].[users].[oauth_provider] IS NULL
    AND [Dorm_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
    ) as sum_evaluate
    FROM [Dorm_System].[dbo].[Evaluate] AS Comment
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = Comment.[created_by]
    LEFT JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
    WHERE Comment.[detail] IS NOT NULL
    AND DATALENGTH(Comment.[detail]) > 0
    AND [Dorm_System].[dbo].[users].[employees_type] = '$employee_type'
    AND [Dorm_System].[dbo].[users].[oauth_provider] IS NULL
    AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    ORDER BY Comment.[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_evaluate_bycomp($company_id,$dateStart,$dateEnd)
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
    ,(SELECT sum([Dorm_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
    FROM [Dorm_System].[dbo].[Evaluate]
    WHERE Comment.[company_id] IN $company_id
    AND [Dorm_System].[dbo].[Evaluate].[detail] IS NOT NULL 
    AND DATALENGTH(Comment.[detail]) > 0
    AND [Dorm_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
    ) as sum_evaluate
    FROM [Dorm_System].[dbo].[Evaluate] AS Comment
    LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = Comment.[created_by]
    LEFT JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
    WHERE Comment.[company_id] IN $company_id
    AND DATALENGTH(Comment.[detail]) > 0
    AND Comment.[detail] IS NOT NULL 
    AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    ORDER BY Comment.[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_evaluate_bycompemp($company_id,$employee_type,$dateStart,$dateEnd)
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
      ,(SELECT sum([Dorm_System].[dbo].[Evaluate].[evaluate_topic_1]+[evaluate_topic_2]+[evaluate_topic_3]+[evaluate_topic_4]+[evaluate_topic_5])
      FROM [Dorm_System].[dbo].[Evaluate]
      WHERE Comment.[company_id] IN $company_id
      AND [Dorm_System].[dbo].[Evaluate].[detail] IS NOT NULL
      AND DATALENGTH(Comment.[detail]) > 0
      AND [Dorm_System].[dbo].[users].[employees_type] = '$employee_type'
      AND [Dorm_System].[dbo].[users].[oauth_provider] IS NULL
      AND [Dorm_System].[dbo].[Evaluate].[evaluate_id] = Comment.[evaluate_id]
      ) as sum_evaluate
      FROM [Dorm_System].[dbo].[Evaluate] AS Comment
      LEFT JOIN [Dorm_System].[dbo].[users] ON [Dorm_System].[dbo].[users].[id] = Comment.[created_by]
      LEFT JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] = Comment.[company_id]
      WHERE Comment.[company_id] IN $company_id
      AND Comment.[detail] IS NOT NULL
      AND DATALENGTH(Comment.[detail]) > 0
      AND [Dorm_System].[dbo].[users].[employees_type] = '$employee_type'
      AND [Dorm_System].[dbo].[users].[oauth_provider] IS NULL
      AND Comment.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
      ORDER BY Comment.[created_at] DESC";
      $query = $this->db->query($sql);        
      return $query->result_array();
    }

    //parts

    function get_repair_group()
    {
      $sql = "SELECT DISTINCT [group_name]
      FROM [Dorm_System].[dbo].[Group_repair]";  
      $query = $this->db->query($sql);        
      return $query->result_array();
    }

    // function get_parts_detail_all()
    // {
    //   $sql = "SELECT Report1.[company_id]
    //   ,[company_name]
    //   ,Report1.[report_id]
    //   ,[report_doc],Report1.[group_id]
    //   ,[group_name]
    //   ,[Dorm_System].[dbo].[Report_detail].[parts_id]
    //   ,[parts_name]
    //   ,[Dorm_System].[dbo].[Parts].[created_at]
    //   FROM [Dorm_System].[dbo].[Report] AS Report1
    //   LEFT JOIN [Dorm_System].[dbo].[Group_repair] ON [Dorm_System].[dbo].[Group_repair].[group_id] = Report1.[group_id]
    //   INNER JOIN [Dorm_System].[dbo].[Report_detail] ON [Dorm_System].[dbo].[Report_detail].[report_id] = Report1.[report_id]
    //   LEFT JOIN  [Dorm_System].[dbo].[Parts] ON [Dorm_System].[dbo].[Parts].[parts_id] = [Dorm_System].[dbo].[Report_detail].[parts_id]
    //   LEFT JOIN  [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] =  Report1.[company_id]
    //   ORDER BY Report1.[company_id]";
    //   $query = $this->db->query($sql);     
    //   return $query->result_array();
    // }

    function get_parts_detail_all($dateStart,$dateEnd)
    {
      $sql = "SELECT Parts1.[parts_id]
      ,[parts_name]
	    ,Parts1.[company_id]
	    ,Parts1.[created_at]
	    ,[company_name]
      FROM [Dorm_System].[dbo].[Parts] AS Parts1
      INNER JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] =  Parts1.[company_id]
      WHERE [Dorm_System].[dbo].[Company_information].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
      ORDER BY Parts1.[company_id]";
      $query = $this->db->query($sql);     
      return $query->result_array();
    }

    function get_parts_detail()
    {
      $sql = "SELECT Parts1.[parts_id]
      ,[parts_name]
	    ,Parts1.[company_id]
	    ,Parts1.[created_at]
	    ,[company_name]
      FROM [Dorm_System].[dbo].[Parts] AS Parts1
      INNER JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] =  Parts1.[company_id]
      ORDER BY Parts1.[company_id]";
      $query = $this->db->query($sql);     
      return $query->result_array();
    }

    function get_parts_detail_bygrpid($group_name)
    {
      $sql = "SELECT Report1.[company_id]
      ,[company_name]
      ,Report1.[report_id]
      ,[report_doc],Report1.[group_id]
      ,[group_name]
      ,[Dorm_System].[dbo].[Report_detail].[parts_id]
      ,[parts_name]
      ,[Dorm_System].[dbo].[Parts].[created_at]
      FROM [Dorm_System].[dbo].[Report] AS Report1
      LEFT JOIN [Dorm_System].[dbo].[Group_repair] ON [Dorm_System].[dbo].[Group_repair].[group_id] = Report1.[group_id]
      INNER JOIN [Dorm_System].[dbo].[Report_detail] ON [Dorm_System].[dbo].[Report_detail].[report_id] = Report1.[report_id]
      LEFT JOIN  [Dorm_System].[dbo].[Parts] ON [Dorm_System].[dbo].[Parts].[parts_id] = [Dorm_System].[dbo].[Report_detail].[parts_id]
      LEFT JOIN  [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] =  Report1.[company_id]
      WHERE [group_name] = '$group_name'
      ORDER BY Report1.[company_id]";
      $query = $this->db->query($sql);     
      return $query->result_array();
    }

    // function get_parts_detail_bycompid($company_id)
    // {
    //   $sql = "SELECT Report1.[company_id]
    //   ,[company_name]
    //   ,Report1.[report_id]
    //   ,[report_doc],Report1.[group_id]
    //   ,[group_name]
    //   ,[Dorm_System].[dbo].[Report_detail].[parts_id]
    //   ,[parts_name]
    //   ,[Dorm_System].[dbo].[Parts].[created_at]
    //   FROM [Dorm_System].[dbo].[Report] AS Report1
    //   LEFT JOIN [Dorm_System].[dbo].[Group_repair] ON [Dorm_System].[dbo].[Group_repair].[group_id] = Report1.[group_id]
    //   INNER JOIN [Dorm_System].[dbo].[Report_detail] ON [Dorm_System].[dbo].[Report_detail].[report_id] = Report1.[report_id]
    //   LEFT JOIN  [Dorm_System].[dbo].[Parts] ON [Dorm_System].[dbo].[Parts].[parts_id] = [Dorm_System].[dbo].[Report_detail].[parts_id]
    //   LEFT JOIN  [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] =  Report1.[company_id]
    //   WHERE Report1.[company_id] IN $company_id
    //   ORDER BY Report1.[company_id]";
    //   $query = $this->db->query($sql);     
    //   return $query->result_array();
    // }

    function get_parts_detail_bycompid($company_id)
    {
      $sql = "SELECT Parts1.[parts_id]
      ,[parts_name]
	    ,Parts1.[company_id]
	    ,Parts1.[created_at]
	    ,[company_name]
      FROM [Dorm_System].[dbo].[Parts] AS Parts1
      INNER JOIN [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] =  Parts1.[company_id]
      WHERE Parts1.[company_id] IN $company_id
      ORDER BY Parts1.[company_id]";
      $query = $this->db->query($sql);     
      return $query->result_array();
    }

    // function get_parts_detail_bycompgrpid($group_name,$company_id)
    // {
    //   $sql = "SELECT Report1.[company_id]
    //   ,[company_name]
    //   ,Report1.[report_id]
    //   ,[report_doc],Report1.[group_id]
    //   ,[group_name]
    //   ,[Dorm_System].[dbo].[Report_detail].[parts_id]
    //   ,[parts_name]
    //   ,[Dorm_System].[dbo].[Parts].[created_at]
    //   FROM [Dorm_System].[dbo].[Report] AS Report1
    //   LEFT JOIN [Dorm_System].[dbo].[Group_repair] ON [Dorm_System].[dbo].[Group_repair].[group_id] = Report1.[group_id]
    //   INNER JOIN [Dorm_System].[dbo].[Report_detail] ON [Dorm_System].[dbo].[Report_detail].[report_id] = Report1.[report_id]
    //   LEFT JOIN  [Dorm_System].[dbo].[Parts] ON [Dorm_System].[dbo].[Parts].[parts_id] = [Dorm_System].[dbo].[Report_detail].[parts_id]
    //   LEFT JOIN  [Dorm_System].[dbo].[Company_information] ON [Dorm_System].[dbo].[Company_information].[company_id] =  Report1.[company_id]
    //   WHERE [group_name] = '$group_name' AND Report1.[company_id] IN $company_id
    //   ORDER BY Report1.[company_id]";
    //   $query = $this->db->query($sql);     
    //   return $query->result_array();
    // }

}