<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:20
 * To change this template use File | Settings | File Templates.
 */

class Model_jc_sort extends CI_Model
{
    protected $_table = 'jc_sort';

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }
    function Add($info)
    {
        return $this->db->insert($this->_table,$info);
    }
    function Get($id)
    {
        $ret= $this->db->get_where($this->_table,array('jc_sort_id'=>$id))->result_array();
        return $ret[0];
    }
}