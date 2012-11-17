<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class Index extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $dz_lists = $this->model_dz_info->GetTop(7);
        $this->assign('dz_lists',$dz_lists);
        $this->display('Home/Index/Index.html');
    }
}
