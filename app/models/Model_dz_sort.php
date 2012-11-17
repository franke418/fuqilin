<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:34
 * @property CI_DB_active_record $db
 */

class Model_dz_sort extends CI_Model
{
    protected $_table = 'dz_sort';

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }

    function Add(array $info){
        return $this->db->insert($this->_table,$info);
    }
}