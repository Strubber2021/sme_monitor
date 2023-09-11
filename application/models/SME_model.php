<?php
class SME_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get_contact()
    {
        $sql = "SELECT *  FROM [MA_System].[dbo].[comment_sme]
        WHERE DATALENGTH([MA_System].[dbo].[comment_sme].[comment]) > 0
        AND [MA_System].[dbo].[comment_sme].[comment] IS NOT NULL 
        ORDER BY [MA_System].[dbo].[comment_sme].[ts_create] DESC";
        $query = $this->db->query($sql);        
        return $query->result_array();
    }

    public function get_contact_daterange($dateStart,$dateEnd)
    {
        $sql = "SELECT *  FROM [MA_System].[dbo].[comment_sme]
        WHERE [MA_System].[dbo].[comment_sme].[ts_create] BETWEEN '$dateStart 00:00:00' AND '$dateEnd 23:59:59'
        AND DATALENGTH([MA_System].[dbo].[comment_sme].[comment]) > 0
        AND [MA_System].[dbo].[comment_sme].[comment] IS NOT NULL
        ORDER BY [MA_System].[dbo].[comment_sme].[ts_create] DESC";
        $query = $this->db->query($sql);        
        return $query->result_array();
    }
}