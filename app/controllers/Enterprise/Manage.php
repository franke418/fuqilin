<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-19
 * Time: 下午2:00
 *
 */
class Manage extends Enterprise_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
        if ($this->is_post()) {
            $post_info = $this->input->post(NULL, TRUE);
            $post_info['user_info_id'] = $_SESSION['CURRENT_ENTER']['user_info_id'];
            $this->model_user_info->ChangePassword($post_info);
            $_SESSION['message']['changepwd'] = array('type' => 'info', 'msg' => '密码修改成功');
        }
        $this->display('Enterprise/Manage/Index.html');
    }

    function Info()
    {
        if ($this->is_post()) {

        }
        $user = $_SESSION['CURRENT_ENTER'];
        $this->assign('user', $user);
        $this->display('Enterprise/Manage/Info.html');
    }

}
