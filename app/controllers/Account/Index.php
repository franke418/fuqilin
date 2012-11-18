<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午4:59
 *
 */
class Index extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    function Register()
    {
        if ($this->is_post()) {
            $post_info = $this->input->post(NULL, TRUE);
            //sdfsdfsdfsdf
        }
        $this->display('Account/Index/Register');
    }

    function Login()
    {

    }
}
