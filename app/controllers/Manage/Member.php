<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 上午11:01
 *
 */
class Member extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Enterprise($page = 1)
    {
        $pageSize = 50;
        $list = $this->model_user_info->GetList(1, $page, $pageSize);
        $this->assign('list', $list);
        $this->display('Manage/Member/Enterprise.html');
    }
}
