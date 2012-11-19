<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-19
 * Time: 上午9:17
 *
 */
class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
        redirect(site_url('Enterprise/Index/Index'));
    }

    function Login()
    {
        if ($this->is_post()) {
            $post_info = $this->input->post(NULL, TRUE);
            $post_info['user_info_password'] = md5($post_info['user_info_password']);
            $ret = $this->model_user_info->EnterpriseValidate($post_info);
            if (!empty($ret)) {
                $_SESSION['CURRENT_ENTER'] = $ret[0];
                redirect(site_url('Enterprise/Home/Index'));
            } else {
                $_SESSION['message']['enterprise'] = array('type' => 'error', 'msg' => '登录失败，请重试。');
            }
        }
        $this->display('Enterprise/Home/Login.html');
    }

    function Logout()
    {
        unset($_SESSION['CURRENT_ENTER']);
        redirect(site_url('Enterprise/Home/Login'));
    }
}
