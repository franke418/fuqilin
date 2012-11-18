<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lucky41
 * Date: 12-11-17
 * Time: 下午12:38
 * To change this template use File | Settings | File Templates.
 */

class Model_news_info extends CI_Model
{
    protected $_table = 'news_info';

    function GetList($pageNo, $pageSize)
    {
        return $this->db->get($this->_table, $pageSize, ($pageNo - 1) * $pageSize)->result_array();
    }

    function GetTop($cid,$count)
    {
        $condition = array('news_info_sort'=>$cid);
        $this->db->order_by('news_info_date','desc');
        return $this->db->get_where($this->_table,$condition,$count)->result_array();
    }

    function Add($info)
    {
        return $this->db->insert($this->_table, $info);
    }

    function GetCount()
    {
        return $this->db->count_all_results($this->_table);
    }

    function Del($id)
    {
        return $this->db->delete($this->_table, array('news_info_id' => $id));
    }
}