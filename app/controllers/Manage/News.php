<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 上午9:13
 *
 */
class News extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Info($pageNo=1)
    {
        $pageSize = 10;
        $this->load->library('pagination');

        $config['uri_segment']=4;
        $config['base_url'] = site_url('Manage/News/Info');
        $config['total_rows'] = $this->model_news_info->GetCount();
        $config['per_page'] = $pageSize;
        $config['use_page_numbers']=TRUE;

        $this->pagination->initialize($config);

        $c_list = $this->model_news_sort->GetList();
        $list = $this->model_news_info->GetList($pageNo,$pageSize);
        $this->assign('list', $list);
        $this->assign('c_list', $c_list);
        $this->assign('p_link',$this->pagination->create_links());
        $this->display('Manage/News/Info.html');
    }

    function InfoAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $config['upload_path'] = UPLOADPATH;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '1024';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $ret = $this->upload->do_upload('news_info_img');
        if (!$ret) {
            $_SESSION['message']['news'] = array('type' => 'error', 'msg' => $this->upload->display_errors());
        } else {
            $data = $this->upload->data();
            $post_info['news_info_img'] = $data['file_name'];
        }
        $post_info['news_info_hot'] = isset($post_info['news_info_hot']) ? 1 : 0;
        $post_info['news_info_date'] = date("Y-m-d H:i:s",time());
        $post_info['news_info_addid'] = $_SESSION['CURRENT_ADMIN']['admin_info_id'];
        $this->model_news_info->Add($post_info);
        $_SESSION['message']['news'] = array('type' => 'info', 'msg' => '信息添加成功！');
        redirect(site_url('Manage/News/Info/1'));
    }
    function InfoDel()
    {
        $id = $this->input->post('news_info_id',TURE);
        $this->model_news_info->Del($id);
        $_SESSION['message']['news'] = array('type' => 'info', 'msg' => '信息删除成功！');
        redirect(site_url('Manage/News/Info/1'));
    }
}
