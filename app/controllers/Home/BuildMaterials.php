<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午5:10
 *
 */
class BuildMaterials extends MY_Controller
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
}
