<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午9:39
 *
 */
class Furniture extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
        $jj_expansion_lists = $this->model_info_expansion->GetListBy(2);
        $jj_sort_lists = $this->model_jj_sort->GetList();
        $zs_sort_lists = $this->model_zs_sort->GetList();
        $zs_expansion_lists = $this->model_info_expansion->GetListBy(3);
        $company_lists = $this->model_user_info->GetVipList(4);
        $company_byclick_lists = $this->model_user_info->GetTopClick(10);
        // $jc_info_lists = $this->model_jc_info->GetList();
        $this->assign('jj_expansion_lists',$jj_expansion_lists);
        $this->assign('jj_sort_lists',$jj_sort_lists);
        $this->assign('web_map','web_map');
        $this->assign('info_count',10);
        $this->assign('company_byclick_lists',$company_byclick_lists);
        $this->assign('company_lists',$company_lists);
        $this->assign('zs_sort_lists',$zs_sort_lists);
        $this->assign('zs_expansion_lists',$zs_expansion_lists);
        $this->display('Home/Furniture/Index.html');
    }
}
