<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:22
 * To change this template use File | Settings | File Templates.
 */

class Model_jj_sort extends CI_Model
{
    protected $_table = 'jj_sort';

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }
    function Add(array $info){
        return $this->db->insert($this->_table,$info);
    }
}