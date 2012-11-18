<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $company_lists = $this->model_user_info->GetVipList(4);
        $links_lists = $this->model_links_info->GetList();
        $news_gg_lists = $this->model_news_info->GetTop(3,2);
        $dz_lists = $this->model_dz_info->GetTop(7);
        $this->assign('company_lists',$company_lists);
        $this->assign('links_lists',$links_lists);
        $this->assign('news_gg_lists',$news_gg_lists);
        $this->assign('dz_lists',$dz_lists);
        $this->display('Home/Index/Index.html');
    }
}
