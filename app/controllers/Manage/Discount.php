<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 下午3:37
 *
 */
class Discount extends Admin_Controller
{
    function __construct(){
        parent::__construct();
    }

    function Category()
    {
        $list = $this->model_dz_sort->GetList();
        $this->assign('list',$list);
        $this->display('Manage/Discount/Category.html');
    }

    function CategoryAdd()
    {
        if($this->is_post())
        {
            $post_info = $this->input->post(NULL,TRUE);
            $info['dz_sort_name'] = $post_info['cate_name'];
            $info['dz_sort_text'] = $post_info['cate_text'];
            $this->model_dz_sort->Add($info);
            $_SESSION['message']['discount'] = array('type' => 'info', 'msg' => '分类添加成功！');
            redirect(site_url('Manage/Discount/Category'));
        }
    }

    function Info()
    {
        $list = $this->model_dz_info->GetList();
        $this->assign('list',$list);
        //$this->display();
    }
}