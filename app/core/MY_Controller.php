<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-16
 * Time: 下午11:29
 * @property Model_web_info $model_web_info
 * @property CI_Cache_file $cache
 */
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->_load_constants();
        $this->assign('base_url',base_url());
    }

    /**
     * 读取公共信息到缓存中
     */
    function _load_constants()
    {
        $this->load->driver('cache',array('adapter' => 'file', 'backup' => 'apc'));
        if(!$this->cache->get('site_title'))
        {
            $site_title = $this->model_web_info->get_single_info('title');
            $site_keywords = $this->model_web_info->get_single_info('keywords');
            $site_desc = $this->model_web_info->get_single_info('description');
            $this->cache->save('site_title',$site_title,3000);
            $this->cache->save('site_keywords',$site_keywords,3000);
            $this->cache->save('site_desc',$site_desc,3000);
        }
        $this->assign('site_title',$this->cache->get('site_title'));
        $this->assign('site_keywords',$this->cache->get('site_keywords'));
        $this->assign('site_desc',$this->cache->get('site_desc'));
    }

    /**
     *  渲染提供的模板并显示
     * @param $tpl
     */
    function display($tpl)
    {
        $this->my_smarty->display($tpl);
    }

    /**
     *  将值赋到模板变量
     * @param $key
     * @param $value
     */
    function assign($key, $value)
    {
        $this->my_smarty->assign($key, $value);
    }

    /**
     *  弹出JS警告框
     * @param $msg 警告内容
     * @param null $ret_url 为NULL时默认返回上一页，否则返回提供的路径
     */
    function alert($msg, $ret_url = NULL)
    {
        header('ContentType:text/html;charset=utf-8');
        echo '<script type="text/javascript">';
        echo "alert('$msg');";
        if ($ret_url === NULL) {
            echo "history.go(-1);";
        } else {
            echo "window.location.href='$ret_url'";
        }
        echo '</script>';
    }

    function is_post()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
            return TRUE;
        else
            return FALSE;
    }
    function is_get()
    {
        if($_SERVER['REQUEST_METHOD'] === 'GET')
            return TRUE;
        else
            return FALSE;
    }
}

require_once 'Admin_Controller.php';