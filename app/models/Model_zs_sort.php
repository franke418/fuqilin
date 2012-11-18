<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:24
 * To change this template use File | Settings | File Templates.
 */

class Model_zs_sort extends CI_Model
{
    protected $_table = 'zs_sort';

    function GetList()
    {
        //$this->db->order_by('zs_sort_hot','desc');
        $this->db->order_by('zs_sort_number','desc');
        return $this->db->get($this->_table)->result_array();
    }
    function Add($info)
    {
        return $this->db->insert($this->_table,$info);
    }
}