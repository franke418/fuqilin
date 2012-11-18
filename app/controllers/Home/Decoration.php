<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午8:59
 *
 */
class Decoration extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
        $zs_sort_lists = $this->model_zs_sort->GetList();
        $zs_expansion_lists = $this->model_info_expansion->GetListBy(3);
        $jc_info_lists = $this->model_jc_info->GetList();
        $this->assign('jc_sort_lists',$zs_sort_lists);
        $this->assign('zs_expansion_lists',$zs_expansion_lists);
        $this->display('Home/Decoration/Index.html');
    }
}
