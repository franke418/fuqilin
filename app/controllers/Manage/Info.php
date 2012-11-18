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

    function BuildingMaterials()
    {
        $list = $this->model_jc_info->GetListUnverify();
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
