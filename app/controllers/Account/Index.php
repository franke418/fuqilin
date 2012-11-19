<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午4:59
 *
 */
class Index extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function Register()
    {
        if ($this->is_post()) {
            $post_info = $this->input->post(NULL, TRUE);
            //sdfsdfsdfsdf
        }
        $this->display('Account/Index/Register');
    }
    function Logout()
    {
        unset($_SESSION['IS_LOGGED']);
        unset($_SESSION['CURRENT_MEMBER']);
        unset($_SESSION['CURRENT_ENTER']);
        redirect(site_url('/'));
    }

    function Login()
    {
       if($this->is_post())
       {
           $post_info = $this->input->post(NULL,TRUE);
           $ret = $this->model_user_info->Validate($post_info);
           if(empty($ret))
           {
               $this->alert('用户名或密码错误！',NULL);
           }
           else
           {
               //var_dump($ret);
               ///var_dump($ret['user_info_type']);exit;
               $_SESSION['IS_LOGGED'] = TRUE;
               if($ret[0]['user_info_type'] == 1)
               {
                   $_SESSION['CURRENT_ENTER'] = $ret[0];
                   redirect(site_url('Enterprise/Manage/Index'));
               }else
               {
                   $_SESSION['CURRENT_MEMBER'] = $ret[0];
                   redirect(site_url('Member/Manage/Index'));
               }
           }
       }
    }
}
