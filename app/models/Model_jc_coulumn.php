<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:20
 * To change this template use File | Settings | File Templates.
 */

class Model_jc_coulumn extends CI_Model
{
    protected $_table = 'jc_coulumn';

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }

    function Add($info)
    {
        return $this->db->insert($this->_table, $info);
    }

    function GetTop($count)
    {
        $this->db->order_by('jc_coulumn_number', 'desc');
        return $this->db->get($this->_table, $count)->result_array();
    }
}