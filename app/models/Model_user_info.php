<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:41
 * @property CI_DB_active_record $db
 */

class Model_user_info extends CI_Model
{
    protected $_table = 'user_info ';

    /**
     *  获取会员列表
     * @param $sign 0=个人 1=企业
     * @param $pageNo 页码
     * @param $pageSize 每页数
     * @return array
     */
    function GetList($sign, $pageNo, $pageSize)
    {
        $condition = array('user_info_type' => $sign);
        return $this->db->get_where($this->_table, $condition, $pageSize, ($pageNo - 1) * $pageSize)->result_array();
    }

    function GetVipList($count)
    {
        $condtion = array('user_info_type' => 1, 'user_info_vip' => 1, 'user_info_check' => 1);
        $this->db->order_by('user_info_number', 'desc');
        $this->db->get_where($this->_table, $condtion, $count)->result_array();
    }

    function GetTopClick($count)
    {
        $condtion = array('user_info_type' => 1, 'user_info_check' => 1);
        $this->db->order_by('user_info_oclick', 'desc');
        $this->db->get_where($this->_table, $condtion, $count)->result_array();
    }
}