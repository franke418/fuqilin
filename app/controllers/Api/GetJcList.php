<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Author: Franke Yang <franke418@live.com>
 * Date: 12-11-19
 * Time: 下午6:14
 *
 */
class GetJcList extends CI_Controller
{
    function Condition($str)
    {
        $condition = explode('_', $str);
        $sort = $condition[0];
        $ex = $condition[1];
        $order = $condition[2]; //0=jc_info_id 1=jc_info_onclick  2=price 3= price desc
        $price = $condition[3]; //jc_info_price
        $s_c = array('jc_info_sort' => $sort, 'jc_info_expansion' => $ex);

        $s_order = "";
        if ($order == 0) {
            $s_order = "jc_info_id desc";
        } elseif ($order == 1) {
            $s_order = "jc_info_onclick desc";
        } elseif ($order == 2) {
            $s_order = "jc_info_price asc";
        } elseif ($order == 3) {
            $s_order = "jc_info_price desc";
        }

        if ($price == 1) {
            $s_c['jc_info_price'] = "jc_info_id > 0";
        } elseif ($order == 2) {
            $s_c['jc_info_price'] = "jc_info_id <= 0";
        }
        $this->db->order_by($s_order);
        $ret = $this->db->get_where("jc_info",$s_c)->result_array();

        foreach($ret as $r)
        {
            echo '<dl>';
            echo "<dt><a title='$r[jc_info_name]' href='{site_url('Home/BuildingMaterials/ShowInfo')}/$r[jc_info_id]' target='_blank'>";
            echo "<img alt='$r[jc_info_name]' src='$r[jc_info_img]'></a></dt>";
            echo "<dd class='two1'>";
        }
        /*echo "

                <dd class="two1">
                    <h3>
                        <a title='{$i_list.jc_info_name}' href='{site_url('Home/BuildingMaterials/ShowInfo')}/{$i_list.jc_info_id}'
                           target='_blank'>{$i_list.jc_info_name}</a></h3>
                    <p>
                        品牌：<u>{$i_list.jc_info_brand}</u></p>
                    <p>
                        描述：<span>{$i_list.jc_info_text}</span></p>
                    <h4>
                        商家：<a title='{$i_list.user_info_name}' href='{site_url('Home/Enterprise/ShowInfo')}/{$i_list.user_info_id}'
                              target='_blank'> {$i_list.user_info_name}</a>&nbsp;&nbsp;|&nbsp;&nbsp;关注度：{$i_list.jc_info_onclick}??</h4>
                </dd>
                <dd class='two2'>
                    ￥&nbsp;<span>{$i_list.jc_info_price}</span></dd>
                <dd class='two3'>
                    <span>{$i_list.jc_info_date}</span>
                    <p>
                        <a title='联系方式' href='{site_url('Home/Enterprise/ShowInfo')}/{$i_list.user_info_id}'
                           target='_blank'>
                            <img src='/static/images/contact.gif' alt='联系方式' /></a></p>
                    <p>
                        <a target='_blank' href='http://wpa.qq.com/msgrd?v=3&uin={$i_list.user_info_QQ}&site=qq&menu=yes'>
                            <img border='0' src='http://wpa.qq.com/pa?p=2:{$i_list.user_info_QQ}:42' alt='点此交谈'
                                 title='在线咨询'></a></p>
                </dd>
            </dl>
            {/foreach}";*/
    }

}
