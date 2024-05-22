<?php
defined('BASEPATH') or exit('No direct script access allowed');

$lang['no'] = '编号';
$lang['action'] = '操作';
$lang['add'] = '添加';
$lang['print_report'] = '打印报告';
$lang['save_data'] = '保存';
$lang['update_data'] = '保存更改';
$lang['close_dialog'] = '关闭';

$jsonData1 = file_get_contents(site_url('assets/json/school_ukk_hotel_zh.postman_environment.json'));
$myData1 = json_decode($jsonData1, true)['values'];

// Create variables dynamically
foreach ($myData1 as $item) {
    $lang[$item['key']] = $item['value'];
    $lang[$item['key'] . '_input'] = '输入' . $item['value'];
    $lang[$item['key'] . '_btn'] = $item['value'];

}

// Define routes dynamically based on JSON data
$jsonData2 = file_get_contents(FCPATH . ('assets/json/school_ukk_hotel_zh_tables.postman_environment.json'));
$myData2 = json_decode($jsonData2, true)['values'];


foreach ($myData2 as $item) {
    $lang[$item['key'] . '_v1_title'] = $item['value']; // Assuming $item['value'] is already translated
    $lang[$item['key'] . '_v2_title'] = '列表' . $item['value']; // "Daftar" -> "列表"
    $lang[$item['key'] . '_v3_title'] = '数据' . $item['value']; // "Data" -> "数据"
    $lang[$item['key'] . '_v4_title'] = '报告' . $item['value']; // "Laporan" -> "报告"
    $lang[$item['key'] . '_v5_title'] = '数据' . $item['value']; // "Data" -> "数据"
    $lang[$item['key'] . '_v6_title'] = '个人资料' . $item['value']; // "Profil" -> "个人资料"
    $lang[$item['key'] . '_v7_title'] = $item['value'] . '成功!'; // "Berhasil" -> "成功"
    $lang[$item['key'] . '_v8_title'] = '详情' . $item['value']; // "Detail" -> "详情"
}