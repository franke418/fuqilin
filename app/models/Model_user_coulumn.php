<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:39
 * To change this template use File | Settings | File Templates.
 */

class Model_user_coulumn extends CI_Model
{
    protected $_table = 'user_coulumn';

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }

    function Add($info)
    {
        return $this->db->insert($this->_table, $info);
    }

    function Del($id)
    {
        return $this->db->delete($this->_table, array('user_coulumn_id' => $id));
    }
}