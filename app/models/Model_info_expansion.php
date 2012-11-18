<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:18
 * To change this template use File | Settings | File Templates.
 */

class Model_info_expansion extends CI_Model
{
    protected $_table = 'info_expansion';

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }
    function GetListBy($exp_coulumn)
    {
        return $this->db->get_where($this->_table,array('exp_coulumn'=>$exp_coulumn))->result_array();
    }

    function Add($info)
    {
        return $this->db->insert($this->_table,$info);
    }
}