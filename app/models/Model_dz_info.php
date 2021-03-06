<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:35
 * @property CI_DB_active_record $db
 */

class Model_dz_info extends CI_Model
{
    protected $_table = 'dz_info';

    function GetList($pageNo, $pageSize)
    {
        return $this->db->get($this->_table, $pageSize, ($pageNo - 1) * $pageSize)->result_array();
    }

    function GetTop($count)
    {
        $this->db->order_by('dz_info_number','desc');
        return $this->db->get_where($this->_table,array('dz_info_type'=>1,'dz_info_hot'=>1),$count)->result_array();
    }

    function Add($info)
    {
        return $this->db->insert($this->_table,$info);
    }

    function GetCount()
    {
        return $this->db->count_all_results($this->_table);
    }
}