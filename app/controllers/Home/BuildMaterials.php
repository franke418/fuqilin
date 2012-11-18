<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-18
 * Time: 下午5:10
 *
 */
class BuildMaterials extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function Index()
    {
        $this->display('Home/BuildingMaterials/Index.html');
    }
}
