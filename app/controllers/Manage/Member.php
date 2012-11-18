<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 上午11:01
 *
 */
class Member extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Enterprise($page = 1)
    {
        $pageSize = 50;
        $list = $this->model_user_info->GetList(1, $page, $pageSize);
        $this->assign('list', $list);
        $this->display('Manage/Member/Enterprise.html');
    }

    function EnterpriseColumn()
    {
        $list = $this->model_user_coulumn->GetList();
        $this->assign('list', $list);
        $this->display('Manage/Member/EnterpriseColumn.html');
    }

    function EnterpriseColumnDel()
    {
        $id = $this->input->post('c_id', TRUE);
        $this->model_user_coulumn->Del($id);
        $_SESSION['message']['member'] = array('type' => 'info', 'msg' => '企业栏目删除成功！');
        redirect(site_url('Manage/Member/EnterpriseColumn'));
    }

    function EnterpriseColumnAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $config['upload_path'] = UPLOADPATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $ret = $this->upload->do_upload('user_coulumn_img');
        if (!$ret) {
            $_SESSION['message']['member'] = array('type' => 'error', 'msg' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $post_info['user_coulumn_img'] = $data['file_name'];
        }
        $this->model_user_coulumn->Add($post_info);
        $_SESSION['message']['member'] = array('type' => 'info', 'msg' => '企业栏目添加成功！');
        redirect(site_url('Manage/Member/EnterpriseColumn'));
    }

    function EnterpriseCategory()
    {
        $list = $this->model_user_sort->GetList();
        $c_list = $this->model_user_coulumn->GetList();
        $this->assign('list',$list);
        $this->assign('c_list',$c_list);
        $this->display('Manage/Member/EnterpriseCategory.html');
    }

    function EnterpriseCategoryAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $config['upload_path'] = UPLOADPATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $ret = $this->upload->do_upload('user_sort_img');
        if (!$ret) {
            $_SESSION['message']['member'] = array('type' => 'error', 'msg' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $post_info['user_sort_img'] = $data['file_name'];
        }
        $this->model_user_sort->Add($post_info);
        $_SESSION['message']['member'] = array('type' => 'info', 'msg' => '企业分类添加成功！');
        redirect(site_url('Manage/Member/EnterpriseCategory'));
    }
}
