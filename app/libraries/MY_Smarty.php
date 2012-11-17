<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'smarty/Smarty.class.php';

class MY_Smarty extends Smarty
{
    function __construct(){
        parent::__construct();
        $this->setCacheDir(TEMPPATH);
        $this->setCompileDir(TEMPPATH);
        $this->setTemplateDir(TPLPATH);
        //$this->debugging=TRUE;
    }
}
