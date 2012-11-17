<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 下午3:37
 *
 */
class Discount extends Admin_Controller
{
    function __construct(){
        parent::__construct();
    }

    function Category()
    {
        $list = $this->model_dz_sort->GetList();
        $this->assign('list',$list);
        $this->display('Manage/Discount/Category.html');
    }
}
