<?php
class Welcome_model extends CI_Model
{
  function __construct()
  {
      parent::__construct();
  }
	function get_job_thisweek($day)
  {
    //$day = '2022-01-21';
    //หาช่าง
    $sql = "SELECT count([MA_Board].[dbo].[Post_job].[job_id]) AS total_job  
    FROM [MA_Board].[dbo].[Post_job]
    WHERE [MA_Board].[dbo].[Post_job].[created_at] BETWEEN '$day 00:00:00' AND '$day 23:59:59'    
    AND [MA_Board].[dbo].[Post_job].[isdelete] = 0 ";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_techn_thisweek($day)
  {
    //$day = '2022-01-22';
    //หางาน
    $sql = "SELECT count([MA_Board].[dbo].[Post_technician].[user_id]) AS total_techn  
    FROM [MA_Board].[dbo].[Post_technician]
    WHERE [MA_Board].[dbo].[Post_technician].[created_at] BETWEEN '$day 00:00:00' AND '$day 23:59:59'    AND [MA_Board].[dbo].[Post_technician].[isdelete] = 0 ";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_job_all($dateStart,$dateEnd)
  {
    $sql = "SELECT count([MA_Board].[dbo].[Post_job].[job_id]) AS total  
    FROM [MA_Board].[dbo].[Post_job] 
    WHERE [MA_Board].[dbo].[Post_job].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [MA_Board].[dbo].[Post_job].[isdelete] = '0'";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_techn_all($dateStart,$dateEnd)
  {
    $sql = "SELECT count([MA_Board].[dbo].[Post_technician].[user_id]) AS total  
    FROM [MA_Board].[dbo].[Post_technician]
    WHERE [MA_Board].[dbo].[Post_technician].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [MA_Board].[dbo].[Post_technician].[isdelete] = '0' ";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_job_count($dateStart,$dateEnd)
  {
    $sql = "SELECT count([MA_Board].[dbo].[Post_job].[job_id]) AS total  
    FROM [MA_Board].[dbo].[Post_job] 
    WHERE [MA_Board].[dbo].[Post_job].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [MA_Board].[dbo].[Post_job].[isdelete] = '0'";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_techn_count($dateStart,$dateEnd)
  {
    $sql = "SELECT count([MA_Board].[dbo].[Post_technician].[user_id]) AS total  
    FROM [MA_Board].[dbo].[Post_technician]
    WHERE [MA_Board].[dbo].[Post_technician].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [MA_Board].[dbo].[Post_technician].[isdelete] = '0' ";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_contact($dateStart,$dateEnd)
  {
    $sql = "SELECT contact_desc,created_at 
    FROM [MA_Board].[dbo].[Contact]
    WHERE [MA_Board].[dbo].[Contact].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [MA_Board].[dbo].[Contact].[isdelete] = '0' 
    AND contact_desc IS NOT NULL";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_contact_count($dateStart,$dateEnd)
  {
    $sql = "SELECT count(contact_id) AS contact_count FROM [MA_Board].[dbo].[Contact]
    WHERE [MA_Board].[dbo].[Contact].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND  [MA_Board].[dbo].[Contact].[isdelete] = '0' 
    AND  [MA_Board].[dbo].[Contact].[contact_desc] IS NOT NULL";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_contact_count_all($dateStart,$dateEnd)
  {
    $sql = "SELECT count(contact_id) AS count_all FROM [MA_Board].[dbo].[Contact]
    WHERE [MA_Board].[dbo].[Contact].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND [MA_Board].[dbo].[Contact].[isdelete] = '0' 
    AND [MA_Board].[dbo].[Contact].[contact_desc] IS NOT NULL
    AND DATALENGTH([MA_Board].[dbo].[Contact].[contact_desc]) > 0 ";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_typerepair()
  {
    $sql = "SELECT type_id,type_name FROM [MA_Board].[dbo].[Type_repair]
    WHERE [MA_Board].[dbo].[Type_repair].[isdelete] = '0'";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_count_techtype1()
  {
    $sql = "SELECT count(user_id) AS total_type1 FROM [MA_Board].[dbo].[Post_technician]
    WHERE [MA_Board].[dbo].[Post_technician].[tech_id] = '1' 
    AND [MA_Board].[dbo].[Post_technician].isdelete = '0'";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_count_techtype2()
  {
    $sql = "SELECT count(user_id) AS total_type2 FROM [MA_Board].[dbo].[Post_technician]
    WHERE [MA_Board].[dbo].[Post_technician].[tech_id] = '2' 
    AND [MA_Board].[dbo].[Post_technician].isdelete = '0'";
    $query = $this->db->query($sql);        
    return $query->row_array();
  }

  function get_techn_detail($dateStart,$dateEnd)
  {
    // $sql = "SELECT *,[MA_Board].[dbo].[Post_technician].[created_at]
    // FROM [MA_Board].[dbo].[Post_technician]
    // LEFT JOIN [MA_Board].[dbo].[Type_technician] ON [MA_Board].[dbo].[Post_technician].[tech_id] = [MA_Board].[dbo].[Type_technician].[tech_id]
    // WHERE  [MA_Board].[dbo].[Post_technician].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    // AND [MA_Board].[dbo].[Post_technician].[isdelete] = '0' ORDER BY [MA_Board].[dbo].[Post_technician].[created_at] DESC";
      $sql = "SELECT [user_id]
      ,[user_name]
      ,[type_id]
      ,[type_repair_id]
      ,[provinces_id]
      ,[geographie_id]
      ,[address]
      ,Techn.[tech_id]
      ,[tel]
      ,[user_email]
      ,[jobdesc1]
      ,[jobdesc2]
      ,[jobdesc3]
      ,[jobdesc4]
      ,[jobdesc5]
      ,[jobdesc6]
      ,[detail]
      ,[profile]
      ,[facebook_url]
      ,[line_id]
      ,Techn.[created_at]
      ,tech_name
      FROM [MA_Board].[dbo].[Post_technician] As Techn
      LEFT JOIN [MA_Board].[dbo].[Type_technician] ON Techn.[tech_id] = [MA_Board].[dbo].[Type_technician].[tech_id]
      WHERE  Techn.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
      AND Techn.[isdelete] = '0' ORDER BY Techn.[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_job_detail($dateStart,$dateEnd)
  {
    // $sql = "SELECT *,[MA_Board].[dbo].[Post_job].[created_at] FROM [MA_Board].[dbo].[Post_job]
    // LEFT JOIN [MA_System].[dbo].[Type_repair] ON [MA_Board].[dbo].[Post_job].[type_id] = [MA_System].[dbo].[Type_repair].[type_id]
    // LEFT JOIN [MA_System].[dbo].[provinces] ON [MA_Board].[dbo].[Post_job].[provinces_id] = [MA_System].[dbo].[provinces].[provinces_id]
    // LEFT JOIN [MA_System].[dbo].[amphures] ON [MA_Board].[dbo].[Post_job].[amphures_id] = [MA_System].[dbo].[amphures].[amphures_id]
    // WHERE [MA_Board].[dbo].[Post_job].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    // AND [MA_Board].[dbo].[Post_job].[isdelete] = '0' ORDER BY [MA_Board].[dbo].[Post_job].[created_at] DESC ";
      $sql ="SELECT Job.[job_id]
      ,Job.[job_desc]
      ,Job.[type_id]
      ,Job.[provinces_id]
      ,Job.[amphures_id]
      ,Job.[geographie_id]
      ,[geo_id]
      ,[address]
      ,[locat_id]
      ,[job_username]
      ,[tel]
      ,[email]
      ,[profile]
      ,[jobdesc1]
      ,[jobdesc2]
      ,[jobdesc3]
      ,[jobdesc4]
      ,[facebook_url]
      ,[linkedin_url]
      ,[twitter_url]
      ,[instagram_url]
      ,[report_rate]
      ,Job.[company_id]
      ,[report_date_in]
      ,[urgent]
      ,Job.[created_at]
    ,type_name
    ,province_id
    ,provinces_name_th
    ,amphures_name_th
    FROM [MA_Board].[dbo].[Post_job] AS Job
    LEFT JOIN [MA_Board].[dbo].[Type_repair] ON Job.[type_id] = [MA_Board].[dbo].[Type_repair].[type_id]
    LEFT JOIN [MA_System].[dbo].[provinces] ON Job.[provinces_id] = [MA_System].[dbo].[provinces].[provinces_id]
    LEFT JOIN [MA_System].[dbo].[amphures] ON Job.[amphures_id] = [MA_System].[dbo].[amphures].[amphures_id]
    WHERE Job.[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    AND Job.[isdelete] = '0' ORDER BY Job.[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_provinces($provinces_id)
  {
    $this->db->select('provinces_name_th');
    $this->db->where('provinces_id', $provinces_id);        
    $query = $this->db->get("MA_System..provinces");
    return $query->row_array();
  }

  function get_typename($type_id)
  {
    $this->db->select('type_name');
    $this->db->from('MA_Board..Type_repair');        
    $this->db->where('MA_Board..Type_repair.type_id', $type_id);
    return $this->db->get()->row_array();
  }

  //job
  function get_job_detail_all($dateStart,$dateEnd)
  {
    $sql = "SELECT [job_id]
    ,[job_username]
    ,[tel]
    ,[urgent]
    ,[type_name]
    ,[MA_Board].[dbo].[Post_job].[created_at]
      FROM [MA_Board].[dbo].[Post_job] 
      LEFT JOIN [MA_Board].[dbo].[Type_repair] ON [MA_Board].[dbo].[Post_job].[type_id] = [MA_Board].[dbo].[Type_repair].[type_id]
      WHERE [MA_Board].[dbo].[Post_job].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
      AND [MA_Board].[dbo].[Post_job].[isdelete] = '0' 
      ORDER BY [MA_Board].[dbo].[Post_job].[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_job_detail_bytypeid($type_id,$dateStart,$dateEnd)
  {
    $sql = "SELECT [job_id]
    ,[job_username]
    ,[tel]
    ,[urgent]
    ,[type_name]
    ,[MA_Board].[dbo].[Post_job].[created_at]
      FROM [MA_Board].[dbo].[Post_job] 
      LEFT JOIN [MA_Board].[dbo].[Type_repair] ON [MA_Board].[dbo].[Post_job].[type_id] = [MA_Board].[dbo].[Type_repair].[type_id]
      WHERE [MA_Board].[dbo].[Post_job].[type_id] IN $type_id
      AND [MA_Board].[dbo].[Post_job].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
      AND [MA_Board].[dbo].[Post_job].[isdelete] = '0' 
      ORDER BY [MA_Board].[dbo].[Post_job].[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_techn_detail_all($dateStart,$dateEnd)
  {
    $sql ="SELECT [user_id]
    ,[user_name]
    ,[type_repair_id]
    ,[tel]
    ,[MA_Board].[dbo].[Post_technician].[tech_id]
    ,[tech_name]
    ,[MA_Board].[dbo].[Post_technician].[created_at]
    FROM [MA_Board].[dbo].[Post_technician]
    LEFT JOIN [MA_Board].[dbo].[Type_technician] ON [MA_Board].[dbo].[Post_technician].[tech_id] = [MA_Board].[dbo].[Type_technician].[tech_id]
    WHERE [MA_Board].[dbo].[Post_technician].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
    AND [MA_Board].[dbo].[Post_technician].isdelete = 0
    ORDER BY [MA_Board].[dbo].[Post_technician].[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  function get_techn_detail_bytypeid($type_id,$dateStart,$dateEnd)
  {
    $sql ="SELECT [user_id]
    ,[user_name]
    ,[type_repair_id]
    ,[tel]
    ,[MA_Board].[dbo].[Post_technician].[tech_id]
    ,[tech_name]
    ,[MA_Board].[dbo].[Post_technician].[created_at]
    FROM [MA_Board].[dbo].[Post_technician]
    LEFT JOIN [MA_Board].[dbo].[Type_technician] ON [MA_Board].[dbo].[Post_technician].[tech_id] = [MA_Board].[dbo].[Type_technician].[tech_id]
    WHERE [MA_Board].[dbo].[Post_technician].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59' 
    $type_id AND [MA_Board].[dbo].[Post_technician].isdelete = 0
    ORDER BY [MA_Board].[dbo].[Post_technician].[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

  //review
  function get_contact_detail_all($dateStart,$dateEnd)
  {
    $sql = "SELECT * 
    FROM [MA_Board].[dbo].[Contact]
    WHERE [MA_Board].[dbo].[Contact].[isdelete] = '0' 
    AND [MA_Board].[dbo].[Contact].[contact_desc] IS NOT NULL
    AND DATALENGTH([MA_Board].[dbo].[Contact].[contact_desc]) > 0
    AND [MA_Board].[dbo].[Contact].[created_at] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
    ORDER BY [MA_Board].[dbo].[Contact].[created_at] DESC";
    $query = $this->db->query($sql);        
    return $query->result_array();
  }

}