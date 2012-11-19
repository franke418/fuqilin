<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-17
 * Time: 上午8:59
 *
 */
class Enterprise_Controller extends MY_Controller
{
    function __construct(){
        parent::__construct();
        if(!isset($_SESSION['CURRENT_ENTER']))
        {
            redirect(site_url('/'));
        }
        else
        {
            $c_user = $_SESSION['CURRENT_ENTER'];
            $user_name = $c_user['user_info_loginid'];
            $this->assign('c_enter_name',$user_name);
        }
    }
}
