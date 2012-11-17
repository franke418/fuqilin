<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-16
 * Time: 下午11:29
 * @property CI_DB_active_record $db
 */
class Model_web_info extends CI_Model
{
    protected $_table = 'web_info';

    /**
     * 获取某条信息
     */
    function get_single_info($name = NULL)
    {
        $condition = array('web_info_name' => $name);
        $this->db->order_by('web_info_id', 'desc');
        $ret = $this->db->get_where($this->_table, $condition)->result_array();
        return $ret[0]['web_info_content'];
    }

    /**
     *  设置某条信息
     * @param $name
     * @param $value
     * @return object
     */
    function set_single_info($name, $value)
    {
        $data = array('web_info_content' => $value);
        $this->db->where('web_info_name', $name);
        return $this->db->update($this->_table, $data);
    }
}
