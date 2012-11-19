<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午4:07
 *
 */
class Column extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function BuildingMaterials()
    {
        $list = $this->model_jc_coulumn->GetList();
        $this->assign('list', $list);
        $this->display('Manage/Column/BuildingMaterials.html');
    }

    function BuildingMaterialsAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $config['upload_path'] = UPLOADPATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $ret = $this->upload->do_upload('jc_coulumn_img');
        if (!$ret) {
            $_SESSION['message']['column'] = array('type' => 'error', 'msg' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $post_info['jc_coulumn_img'] = $data['file_name'];
        }
        $this->model_jc_coulumn->Add($post_info);
        $_SESSION['message']['column'] = array('type' => 'info', 'msg' => '建材栏目添加成功！');
        redirect(site_url('Manage/Column/BuildingMaterials'));
    }

    function Enterprise()
    {
        $list = $this->model_user_coulumn->GetList();
        $this->assign('list', $list);
        $this->display('Manage/Column/Enterprise.html');
    }

    function EnterpriseAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $config['upload_path'] = UPLOADPATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $ret = $this->upload->do_upload('user_coulumn_img');
        if (!$ret) {
            $_SESSION['message']['column'] = array('type' => 'error', 'msg' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $post_info['user_coulumn_img'] = $data['file_name'];
        }
        $this->model_user_coulumn->Add($post_info);
        $_SESSION['message']['column'] = array('type' => 'info', 'msg' => '行业添加成功！');
        redirect(site_url('Manage/Column/Enterprise'));
    }

}
