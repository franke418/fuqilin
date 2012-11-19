<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午3:30
 *
 */
class Category extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Furniture()
    {
        $list = $this->model_jj_sort->GetList();
        $this->assign('list', $list);
        $this->display('Manage/Category/Furniture.html');
    }

    function Decoration()
    {
        $list = $this->model_zs_sort->GetList();
        $this->assign('list', $list);
        $this->display('Manage/Category/Decoration.html');
    }

    function BuildingMaterials()
    {
        $list = $this->model_jc_sort->GetList();
        $c_list = $this->model_jc_coulumn->GetList();
        $this->assign('list', $list);
        $this->assign('c_list', $c_list);
        $this->display('Manage/Category/BuildingMaterials.html');
    }
    function FurnitureAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $config['upload_path'] = UPLOADPATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $ret = $this->upload->do_upload('jj_zs_img');
        if (!$ret) {
            $_SESSION['message']['category'] = array('type' => 'error', 'msg' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $post_info['jj_zs_img'] = $data['file_name'];
        }
        //$post_info['jc_sort_hot'] = isset($post_info['jc_sort_hot']) ? 1 : 0;
        $this->model_jj_sort->Add($post_info);
        $_SESSION['message']['category'] = array('type' => 'info', 'msg' => '家具分类添加成功！');
        redirect(site_url('Manage/Category/Furniture'));
    }
    function DecorationAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $config['upload_path'] = UPLOADPATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $ret = $this->upload->do_upload('jc_zs_img');
        if (!$ret) {
            $_SESSION['message']['category'] = array('type' => 'error', 'msg' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $post_info['jc_zs_img'] = $data['file_name'];
        }
        //$post_info['jc_sort_hot'] = isset($post_info['jc_sort_hot']) ? 1 : 0;
        $this->model_zs_sort->Add($post_info);
        $_SESSION['message']['category'] = array('type' => 'info', 'msg' => '建材栏目添加成功！');
        redirect(site_url('Manage/Category/Decoration'));
    }

    function BuildingMaterialsAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $config['upload_path'] = UPLOADPATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $ret = $this->upload->do_upload('jc_sort_img');
        if (!$ret) {
            $_SESSION['message']['category'] = array('type' => 'error', 'msg' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $post_info['jc_sort_img'] = $data['file_name'];
        }
        $post_info['jc_sort_hot'] = isset($post_info['jc_sort_hot']) ? 1 : 0;
        $this->model_jc_sort->Add($post_info);
        $_SESSION['message']['category'] = array('type' => 'info', 'msg' => '建材栏目添加成功！');
        redirect(site_url('Manage/Category/BuildingMaterials'));
    }
}
