<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 上午8:41
 * @property CI_DB_active_record $db
 */
class Model_admin_info extends CI_Model
{
    protected $_table = 'admin_info';

    /**
     *  通过给定的用户名和密码判断用户是否有效
     * @param array $admin_info
     * @return bool
     */
    function validate(array $admin_info)
    {
        $condition = array('admin_info_loginid' => $admin_info['username'],
            'admin_info_password' => md5($admin_info['password']));
        $ret = $this->db->get_where($this->_table, $condition)->result_array();
        if (empty($ret))
            return array('result' => FALSE, 'instance' => NULL);
        else
            return array('result' => TRUE, 'instance' => $ret[0]);
    }

    function update_login_info()
    {
        $ip = ip2long($_SERVER['REMOTE_ADDR']);
        $data = array('admin_info_lastip' => $ip);
        $condition = array('admin_info_loginid'=>$_SESSION['CURRENT_ADMIN']['admin_info_loginid']);
        $ret = $this->db->update($this->_table, $data, $condition);
        if ($ret === 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
