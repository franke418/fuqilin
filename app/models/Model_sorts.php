<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午3:31
 *
 */
class Model_sorts extends CI_Model
{
    protected $_table = 'sorts';

    function GetList()
    {
        return $this->db->get($this->_table)->result_array();
    }

    function Add($info)
    {
        return $this->db->insert($this->_table,$info);
    }
}
