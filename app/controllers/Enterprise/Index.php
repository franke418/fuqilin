<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-19
 * Time: 上午9:37
 *
 */
class Index extends Enterprise_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
        $this->assign('os',php_uname('s').' '.php_uname('r'));
        $this->assign('php_version',PHP_VERSION);
        $this->assign('run_method',php_sapi_name());
        $this->assign('server_version',$_SERVER['SERVER_SOFTWARE']);
        $this->display('Enterprise/Home/Index.html');
    }
}
