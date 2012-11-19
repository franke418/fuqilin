<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午3:59
 *
 */
class Furniture extends Enterprise_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
        $list = $this->model_zs_info->GetListByEId($_SESSION['CURRENT_ENTER']['user_info_id']);
        $this->assign('list', $list);
        $this->display('Enterprise/Furniture/Index.html');
    }

    function Add()
    {
        $post_info = $this->input->post(NULL,TRUE);
        $this->model_zs_info->Add($post_info);
        redirect(site_url('Enterprise/Furniture/Index'));
    }
}
