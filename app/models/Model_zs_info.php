<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:25
 * To change this template use File | Settings | File Templates.
 */

class Model_zs_info extends CI_Model
{
    protected $_table = 'zs_info';
    function GetListByEId($eid)
    {
        return $this->db->get_where($this->_table, array('zs_info_addid' => $eid))->result_array();
    }
}