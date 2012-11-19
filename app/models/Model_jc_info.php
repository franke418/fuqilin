<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:21
 * @property CI_DB_active_record $db
 */
class Model_jc_info extends CI_Model
{
    protected $_table = 'jc_info';

    function GetListByEId($eid)
    {
        //jc_info_addid
        return $this->db->get_where($this->_table, array('jc_info_addid' => $eid))->result_array();
    }

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }

    function GetListUnverify()
    {
        return $this->db->get_where($this->_table, array('jc_info_type' => 0))->result_array();
    }

    function GetCountUnverify()
    {
        return count($this->GetListUnverify());
    }
}