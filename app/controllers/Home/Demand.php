<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午9:40
 *
 */
class Demand extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
        $company_byclick_lists = $this->db->query("select user_info_id,user_info_name,user_info_oclick from user_info where user_info_type=1 and user_info_check=1 order by user_info_oclick desc limit 0,10")->result_array();
        $company_lists = $this->model_user_info->GetVipList(4);
        $this->assign('company_byclick_lists',$company_byclick_lists);
        $this->assign('company_lists', $company_lists);
        $xq_expansion_lists = $this->model_info_expansion->GetListBy(4);
        $xq_sort_lists = $this->model_xq_sort->GetList();
        $zs_sort_lists = $this->model_zs_sort->GetList();
        $zs_expansion_lists = $this->model_info_expansion->GetListBy(3);
        $company_lists = $this->model_user_info->GetVipList(4);
        $company_byclick_lists = $this->model_user_info->GetTopClick(10);
        // $jc_info_lists = $this->model_jc_info->GetList();
        $this->assign('xq_expansion_lists',$xq_expansion_lists);
        $this->assign('xq_sort_lists',$xq_sort_lists);
        $this->assign('web_map','web_map');
        $this->assign('info_count',10);
        $this->assign('company_byclick_lists',$company_byclick_lists);
        $this->assign('company_lists',$company_lists);
        $this->assign('zs_sort_lists',$zs_sort_lists);
        $this->assign('zs_expansion_lists',$zs_expansion_lists);
        $this->display('Home/Demand/Index.html');
    }
}
