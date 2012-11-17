<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 上午12:14
 *
 */
class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Login()
    {
        if ($this->is_post()) {
            $post_info = $this->input->post(NULL, TRUE);
            $ret = $this->model_admin_info->validate($post_info);
            if (!$ret['result']) {
                $_SESSION['message']['login'] = array('type' => 'error', 'msg' => '用户名或密码错误！');
            } else {
                $_SESSION['CURRENT_ADMIN'] = $ret['instance'];
                $this->model_admin_info->update_login_info();
                redirect(site_url('Manage/Admin/Index'));
            }

        }
        $this->display('Manage/Home/Login.html');
    }

    function Logout()
    {
        unset($_SESSION['CURRENT_ADMIN']);
        redirect(site_url('Manage/Home/Login'));
    }
}
