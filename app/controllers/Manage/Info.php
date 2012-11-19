<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午10:12
 *
 */
class Info extends Admin_Controller
{
    function __construct(){
        parent::__construct();
    }

    function BuildingMaterials($pageNo=1)
    {
        $pageSize = 10;
        $this->load->library('pagination');

        $config['uri_segment']=4;
        $config['base_url'] = site_url('Manage/News/Info');
        $config['total_rows'] = $this->model_jc_info->GetCountUnverify();
        $config['per_page'] = $pageSize;
        $config['use_page_numbers']=TRUE;

        $this->pagination->initialize($config);

        $list = $this->model_jc_info->GetListUnverify();
        $this->assign('list',$list);
        $this->display('Manage/Info/BuildingMaterials.html');
    }
    function Furniture()
    {
        $this->display('Manage/Info/Furniture.html');
    }
    function Decoration()
    {
        $this->display('Manage/Info/Decoration.html');
    }
    function Demand()
    {
        $this->display('Manage/Info/Demand.html');
    }
    function Promotion()
    {
        $this->display('Manage/Info/Promotion.html');
    }
    function UserMarket()
    {
        $this->display('Manage/Info/UserMarket.html');
    }
}
