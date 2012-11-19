<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $zh_info_lists = $this->db->query("select zh_info_id,zh_info_name,zh_info_img,zh_info_member from zh_info where zh_info_type=1 and zh_info_hot=1 order by zh_info_number desc limit 0,6")->result_array();
        $zh_sort_lists = $this->db->query("select zh_sort_id,zh_sort_name from zh_sort order by zh_sort_number desc limit 0,3")->result_array();
        $news_jc_lists = $this->db->query("select news_info_id,news_info_name from news_info where news_info_hot=1 and news_info_sort=1 order by news_info_number desc limit 0,8")->result_array();
        $xq_info_lists = $this->db->query("select xq_info_id,xq_info_name,xq_info_date from xq_info where xq_info_type=1 and xq_info_hot=1 order by xq_info_number desc limit 0,8")->result_array();
        $es_info_lists = $this->db->query("select es_info_id,es_info_name,es_info_date from es_info where es_info_type=1 and es_info_hot=1 order by es_info_number desc limit 0,8")->result_array();
        $jc_sort_hot_lists = $this->db->query("select jc_sort_id,jc_sort_name from jc_sort where jc_sort_hot=1 order by jc_sort_number desc limit 0,5")->result_array();
        $jc_info_hot_lists = $this->db->query("select jc_info_id,jc_info_name,jc_info_img,jc_info_price from jc_info where jc_info_type=1 and jc_info_hot=1 order by jc_info_number desc limit 0,12")->result_array();
        $company_byclick_lists = $this->db->query("select user_info_id,user_info_name,user_info_oclick from user_info where user_info_type=1 and user_info_check=1 order by user_info_oclick desc limit 0,10")->result_array();
        $jc_sort_lists = $this->db->query("select jc_sort_id,jc_sort_name,jc_sort_cid from jc_sort order by jc_sort_hot desc,jc_sort_number desc")->result_array();
        $jc_coulumn_cont_lists = $this->db->query("select count(*) as jc_count,jc_info_coulumn from jc_info group by jc_info_coulumn")->result_array();
        $jc_coulumn_lists = $this->model_jc_coulumn->GetTop(6);
        $company_lists = $this->model_user_info->GetVipList(4);
        $links_lists = $this->model_links_info->GetList();
        $news_gg_lists = $this->model_news_info->GetTop(3, 2);
        $dz_lists = $this->model_dz_info->GetTop(7);
        $this->assign('zh_info_lists',$zh_info_lists);
        $this->assign('zh_sort_lists',$zh_sort_lists);
        $this->assign('news_jc_lists',$news_jc_lists);
        $this->assign('xq_info_lists',$xq_info_lists);
        $this->assign('es_info_lists',$es_info_lists);
        $this->assign('jc_sort_hot_lists',$jc_sort_hot_lists);
        $this->assign('jc_info_hot_lists',$jc_info_hot_lists);
        $this->assign('company_byclick_lists',$company_byclick_lists);
        $this->assign('jc_sort_lists',$jc_sort_lists);
        $this->assign('jc_coulumn_cont_lists', $jc_coulumn_cont_lists);
        $this->assign('jc_coulumn_lists', $jc_coulumn_lists);
        $this->assign('company_lists', $company_lists);
        $this->assign('links_lists', $links_lists);
        $this->assign('news_gg_lists', $news_gg_lists);
        $this->assign('dz_lists', $dz_lists);
        $this->display('Home/Index/Index.html');
    }
}
