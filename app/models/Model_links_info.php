<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 上午11:06
 * @property CI_DB_active_record $db
 */
class Model_links_info extends CI_Model
{
    protected $_table = 'links_info';

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }

    function Delete($id=0)
    {
        return $this->db->delete($this->_table,array('links_info_id'=>$id));
    }

    function Add(array $info)
    {
        return $this->db->insert($this->_table,$info);
    }
}
