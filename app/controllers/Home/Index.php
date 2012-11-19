<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $jc_coulumn_lists = $this->model_jc_coulumn->GetTop(6);
        $jc_coulumn_cont_lists = $this->db->query('select count(*) as jc_count,jc_info_coulumn from jc_info where jc_info_coulumn in(select top 6 jc_coulumn_id,jc_coulumn_name from jc_coulumn order by jc_coulumn_number desc)group by jc_info_coulumn')->result_array();
        /*'select count(*) as jc_count,jc_info_coulumn
from jc_info
where jc_info_coulumn in(
select top 6 jc_coulumn_id,jc_coulumn_name
from jc_coulumn
order by jc_coulumn_number desc)
group by jc_info_coulumn'*/
        $company_lists = $this->model_user_info->GetVipList(4);
        $links_lists = $this->model_links_info->GetList();
        $news_gg_lists = $this->model_news_info->GetTop(3, 2);
        $dz_lists = $this->model_dz_info->GetTop(7);
        $this->assign('jc_coulumn_cont_lists', $jc_coulumn_cont_lists);
        $this->assign('jc_coulumn_lists', $jc_coulumn_lists);
        $this->assign('company_lists', $company_lists);
        $this->assign('links_lists', $links_lists);
        $this->assign('news_gg_lists', $news_gg_lists);
        $this->assign('dz_lists', $dz_lists);
        $this->display('Home/Index/Index.html');
    }
}
