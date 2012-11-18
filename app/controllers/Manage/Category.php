<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午3:30
 *
 */
class Info extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Category()
    {
        $list = $this->model_sorts->GetList();
        $this->assign('list', $list);
        $this->display('Manage/Info/Category.html');
    }

    function CategoryAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $post_info['is_hot'] = isset($post_info['is_hot'])?1:0;
        $this->model_sorts->Add($post_info);
        $_SESSION['message']['info'] = array('type' => 'info', 'msg' => '分类添加成功！');
        redirect(site_url('Manage/Info/Category'));
    }
}
