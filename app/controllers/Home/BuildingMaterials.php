<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午5:10
 *
 */
class BuildingMaterials extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
        $jc_coulumn_lists = $this->model_jc_coulumn->GetList();
        $jc_sort_lists = $this->model_jc_sort->GetList();
        $jc_info_lists = $this->model_jc_info->GetList();
        $this->assign('jc_coulumn_lists',$jc_coulumn_lists);
        $this->assign('jc_sort_lists',$jc_sort_lists);
        $this->assign('jc_info_lists',$jc_info_lists);
        $this->display('Home/BuildingMaterials/Index.html');
    }

    function ShowSort($id)
    {
        $jc_sort_lists = $this->model_jc_sort->GetList();
        $sort = $this->model_jc_sort->Get($id);
        $zs_sort_lists = $this->model_zs_sort->GetList();
        $company_lists = $this->model_user_info->GetVipList(4);
        $company_byclick_lists = $this->model_user_info->GetTopClick(10);
        $this->assign('jc_sort_lists',$jc_sort_lists);
        $this->assign('web_map','web_map');
        $this->assign('info_count',10);
        $this->assign('company_byclick_lists',$company_byclick_lists);
        $this->assign('company_lists',$company_lists);
        $this->assign('zs_sort_lists',$zs_sort_lists);
        $this->assign('web_title',$sort['jc_sort_name']);
        $jc_expansion_lists = $this->model_info_expansion->GetListBy(1);
        $this->assign('jc_expansion_lists',$jc_expansion_lists);
        $this->display('Home/BuildingMaterials/ShowSort.html');
    }
}
