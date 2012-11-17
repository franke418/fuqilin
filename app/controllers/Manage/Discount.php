<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 下午3:37
 *
 */
class Discount extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Category()
    {
        $list = $this->model_dz_sort->GetList();
        $this->assign('list', $list);
        $this->display('Manage/Discount/Category.html');
    }

    function CategoryAdd()
    {
        if ($this->is_post()) {
            $post_info = $this->input->post(NULL, TRUE);
            $info['dz_sort_name'] = $post_info['cate_name'];
            $info['dz_sort_text'] = $post_info['cate_text'];
            $this->model_dz_sort->Add($info);
            $_SESSION['message']['discount'] = array('type' => 'info', 'msg' => '分类添加成功！');
            redirect(site_url('Manage/Discount/Category'));
        }
    }

    function Info($pageNo = 1)
    {
        $pageSize = 1;
        $this->load->library('pagination');

        $config['uri_segment']=4;
        $config['base_url'] = site_url('Manage/Discount/Info');
        $config['total_rows'] = $this->model_dz_info->GetCount();
        $config['per_page'] = $pageSize;
        $config['use_page_numbers']=TRUE;

        $this->pagination->initialize($config);

        $list = $this->model_dz_info->GetList($pageNo, $pageSize);
        //var_dump($list);exit;
        $c_list = $this->model_dz_sort->GetList();
        $this->assign('list', $list);
        $this->assign('c_list', $c_list);
        $this->assign('p_link',$this->pagination->create_links());
        $this->display('Manage/Discount/Info.html');
    }

    function InfoAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $config['upload_path'] = UPLOADPATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $ret = $this->upload->do_upload('dz_info_img');
        if (!$ret) {
            $_SESSION['message']['discount'] = array('type' => 'error', 'msg' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $post_info['dz_info_img'] = $data['file_name'];
        }
        $this->model_dz_info->Add($post_info);
        $_SESSION['message']['discount'] = array('type' => 'info', 'msg' => '信息添加成功！');
        redirect(site_url('Manage/Discount/Info'));
    }
}