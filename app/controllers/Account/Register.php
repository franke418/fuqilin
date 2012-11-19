<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-19
 * Time: 下午3:30
 *
 */
class Register extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function Choose()
    {
        $this->display('Home/Register/Choose.html');
    }

    function Personal()
    {
        if ($this->is_post()) {
            $post_info = $this->input->post(NULL, TRUE);
            if ($post_info['user_info_password'] != $post_info['user_info_password_re']) {
                $_SESSION['message']['register'] = array('type' => 'error', 'msg' => '两次密码输入不一致');
            } else {
                unset($post_info['user_info_password_re']);
                $this->model_user_info->Add($post_info);
                $this->alert('注册成功！请登录！', site_url('/'));
            }
        }
        $this->display('Home/Register/Personal.html');
    }

    function Enterprise()
    {
        if ($this->is_post()) {
            $post_info = $this->input->post(NULL, TRUE);
            if ($post_info['user_info_password'] != $post_info['user_info_password_re']) {
                $_SESSION['message']['register'] = array('type' => 'error', 'msg' => '两次密码输入不一致');
            } else {
                unset($post_info['user_info_password_re']);
                $post_info['user_info_type'] = 1;
                $this->model_user_info->Add($post_info);
                $this->alert('注册成功！请登录！', site_url('/'));
            }
        }
        $c_list = $this->model_user_coulumn->GetList();
        $this->assign('c_list',$c_list);
        $this->display('Home/Register/Enterprise.html');
    }
}
