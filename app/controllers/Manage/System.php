<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 上午10:05
 *
 */
class System extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Setting()
    {
        if ($this->is_post()) {
            $post_info = $this->input->post(NULL, TRUE);
            $this->model_web_info->set_single_info('title', $post_info['title']);
            $this->model_web_info->set_single_info('keywords', $post_info['keywords']);
            $this->model_web_info->set_single_info('description', $post_info['desc']);
            $_SESSION['message']['setting'] = array('type' => 'info', 'msg' => '信息修改成功！');
        }
        $this->assign('title', $this->model_web_info->get_single_info('title'));
        $this->assign('keywords', $this->model_web_info->get_single_info('keywords'));
        $this->assign('desc', $this->model_web_info->get_single_info('description'));
        $this->display('Manage/System/Setting.html');
    }

    function CleanTemp()
    {
        $dh = opendir(TEMPPATH);
        while ($file = readdir($dh)) {
            if ($file != '.' && $file != '..') {
                $fullpath = TEMPPATH . $file;
                unlink($fullpath);
                echo $file . '        .... 清理成功！<br/>';
            }

        }
        $this->alert('清理完成！', NULL);
    }

    function FriendLinks()
    {
        $links = $this->model_links_info->GetList();
        $this->assign('links', $links);
        $this->display('Manage/System/FriendLinks.html');
    }

    function FriendLinksDel()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $link_id = $post_info['link_id'];
        $this->model_links_info->Delete($link_id);
        $_SESSION['message']['friendlink'] = array('type' => 'info', 'msg' => '删除成功！');
        redirect(site_url('Manage/System/FriendLinks'));
    }

    function FriendLinksAdd()
    {
        $post_info = $this->input->post(NULL, TRUE);
        $info['links_info_text'] = $post_info['link_text'];
        $info['links_info_src'] = $post_info['link_src'];
        $info['links_info_type'] = isset($post_info['link_type']) ? 1 : 0;
        $this->model_links_info->Add($info);
        $_SESSION['message']['friendlink'] = array('type' => 'info', 'msg' => '添加成功！');
        redirect(site_url('Manage/System/FriendLinks'));
    }
}
