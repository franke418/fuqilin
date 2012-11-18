<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午4:23
 *
 */
class Expansion extends Admin_Controller
{
    function __construct(){
        parent::__construct();
    }

    function Index()
    {
        $list = $this->model_info_expansion->GetList();
        $c_list = array(1=>'建材',2=>'家具',3=>'装饰',4=>'需求',5=>'打折',6=>'二手');
        $n_list = array();
        foreach($list as $l)
        {
            //var_dump($l['exp_coulumn']);
            //var_dump($c_list[$l['exp_coulumn']]);
            $l['exp_coulumn'] = $c_list[$l['exp_coulumn']];
            $n_list[] = $l;
        }
        $this->assign('list',$n_list);
        $this->assign('c_list',$c_list);
        $this->display('Manage/Expansion/Index.html');
    }

    function Add()
    {
        $post_info = $this->input->post(NULL,TRUE);
        $this->model_info_expansion->Add($post_info);
        $_SESSION['message']['info'] = array('type' => 'info', 'msg' => '分类添加成功！');
        redirect(site_url('Manage/Expansion/Index'));
    }
}
