<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:26
 * To change this template use File | Settings | File Templates.
 */

class Model_xq_sort extends CI_Model
{
    protected $_table = 'xq_sort';

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }
}