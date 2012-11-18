<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 上午8:59
 *
 */
class Enterprise_Controller extends MY_Controller
{
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION['CURRENT_ENTER']))
        {
            redirect(site_url('Manage/Home/Login'));
        }
        else
        {
            $c_user = $_SESSION['CURRENT_ENTER'];
            $admin_name = $c_user['admin_info_name'];
            $admin_ip = $c_user['admin_info_lastip'];
            $admin_time = $c_user['admin_info_lasttime'];
            $this->assign('c_admin_name',$admin_name);
            $this->assign('c_admin_ip',$admin_ip);
            $this->assign('c_admin_time',$admin_time);
        }
    }
}
