<?php
ini_set("error_reporting", "E_ALL & ~E_NOTICE");
header("Content-type: text/html; charset=utf-8");
require 'config.php';
echo '<div class="container"><hr>';
$data = srh();

//twitter
if ($GLOBALS['twitter'] != '') {
    $twi = $data[0];
    $twi = json_decode($twi, true);
    $num = count($twi);

    echo '<h5 style="font-weight:normal;margin-bottom:20px;margin-top:30px;">Twitter</h5>';
    for ($i = 0; $i < $num; $i++) {
        $text = $twi[$i]['text'];
        $time = $twi[$i]['created_at'];
        echo '<center><div class="tarc-t"><div class="tarc-tile">' . $text . '</div></div></center>';
    }
}

//bangumi
if ($GLOBALS['bangumi'] != '') {
    $bgm = $data[1];
    $bgm = json_decode($bgm, true);
    $numb = count($bgm);

    echo '<h5 style="font-weight:normal;margin-bottom:20px;margin-top:30px;">我的追番</h5>';
    echo '<section style="overflow:hidden;">';
    for ($i = 0; $i < $numb; $i++) {
        $weekday = $bgm[$i]['subject']['air_weekday'];
        $weekday = str_replace(array("1", "2", "3", "4", "5", "6", "7"), array("周一", "周二", "周三", "周四", "周五", "周六", "周日",), $weekday);
        $bankumitype = $bgm[$i]['subject']['type'];
        $bankumitype = str_replace(array("2", "6"), array("二次元", "三次元",), $bankumitype);
        if ($bgm[$i]['subject']['eps'] == '0' || $bgm[$i]['subject']['eps'] == '') {
            $eps = '??';
        } else {
            $eps = $bgm[$i]['subject']['eps'];
        }
        if ($bgm[$i]['subject']['name_cn'] == '') {
            $name_cn = $bgm[$i]['name'];
        } else {
            $name_cn = $bgm[$i]['subject']['name_cn'];
        }
        if ($bgm[$i]['ep_status'] < $eps || $bgm[$i]['subject']['eps'] == '0' || $bgm[$i]['subject']['eps'] == '') {
            $proc = $bgm[$i]['ep_status'] . '/' . $eps;
            $img = $bgm[$i]['subject']['images']['large'];
            $img = str_replace('http://lain.bgm.tv', 'https://lain.bgm.tv', $img);
            echo '<div class="arc-t"><div class="arc-tile"><div style="box-shadow: 0 2px 15px 1px rgba(0,0,0,0.1);width:60%;max-height:150px;float:left;margin-right:5px;"><img src="' . $img . '" data-action="zoom" class="img-rounded img-responsive"></div><small><a target="_blank" href="' . $bgm[$i]['subject']['url'] . '">' . $name_cn . '</a></small><br><span class="arc-date">&' . $bgm[$i]['name'] . '</span><br><span class="arc-date">进度：' . $proc . '</span><br><span class="arc-date">首播：' . $bgm[$i]['subject']['air_date'] . '</span><br><span class="arc-date">放送：' . $weekday . '</span><br><span class="arc-date">最近：' . date('Y-m-d', $bgm[$i]['lasttouch']) . '</span></div></div>';
        }
    }
    echo '</section>';
}

//bilibili
if ($GLOBALS['bilibili'] != '') {
    $result = get_bilibili_operalist($GLOBALS['bilibili']); //获取接口返回值
    $bil = json_decode($result, true);
    $bils = $bil['data']['list'];
    $numc = count($bils);

    if ($GLOBALS['bangumi'] == '') {
        echo '<h5 style="font-weight:normal;margin-bottom:20px;margin-top:30px;">我的追番</h5>';
    }

    echo '<section style="overflow:hidden;">';
    for ($i = 0; $i < $numc; $i++) {
        if ($bils[$i]['badge'] == '') {
            $bils[$i]['badge'] = 'Biu😋';
        }
        $link = 'https://www.bilibili.com/bangumi/media/md' . $bils[$i]['media_id'];
        echo '<div class="arc-t" style="width: 20%;"><div class="arc-tile"><small><a target="_blank" href="' . $link . '">' . $bils[$i]['title'] . '</a></small><br><span class="arc-date">&' . $bils[$i]['badge'] . '</span><br><span class="arc-date">首播：' . $bils[$i]['publish']['release_date'] . '</span><br><span class="arc-date">地区：' . $bils[$i]['areas'][0]['name'] . '</span><br><span class="arc-date">最新：' . $bils[$i]['new_ep']['title'] . ' 话</span></div></div>';
    }
    echo '</section>';
}

function srh()
{
    require_once 'config.php';
    $api_url = $GLOBALS['api_url'] . '?';
    $twitter_url = $api_url . 'app=twitter&key=user_timeline&screen_name=' . $GLOBALS['twitter'];
    $bangumi_url = $api_url . 'app=bangumi&key=watching&name=' . $GLOBALS['bangumi'];
    $urls = array();
    array_push($urls, $twitter_url); //0
    array_push($urls, $bangumi_url); //1
    //获取网页数据
    $frst = curl_multi($urls);
    $rst = array();
    array_push($rst, $frst[0]); //0
    array_push($rst, $frst[1]); //1
    return $rst;
}
//多线程抓取网页
function curl_multi($urls)
{
    if (!is_array($urls) or count($urls) == 0) {
        return false;
    }
    $num = count($urls);
    $curl = $curl2 = $text = array();
    $handle = curl_multi_init();
    function createCh($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Trident/7.0; rv:11.0) like Gecko'); //设置头部
        curl_setopt($ch, CURLOPT_REFERER, $url); //设置来源
        curl_setopt($ch, CURLOPT_ENCODING, "gzip"); // 编码压缩
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); //是否采集301、302之后的页面
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5); //查找次数，防止查找太深
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HEADER, 0); //输出头部
        return $ch;
    }
    foreach ($urls as $k => $v) {
        $url = $urls[$k];
        $curl[$k] = createCh($url);
        curl_multi_add_handle($handle, $curl[$k]);
    }
    $active = null;
    do {
        $mrc = curl_multi_exec($handle, $active);
    } while ($mrc == CURLM_CALL_MULTI_PERFORM);

    while ($active && $mrc == CURLM_OK) {
        if (curl_multi_select($handle) != -1) {
            usleep(100);
        }
        do {
            $mrc = curl_multi_exec($handle, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
    }

    foreach ($curl as $k => $v) {
        if (curl_error($curl[$k]) == "") {
            $text[$k] = (string) curl_multi_getcontent($curl[$k]);
        }
        curl_multi_remove_handle($handle, $curl[$k]);
        curl_close($curl[$k]);
    }
    curl_multi_close($handle);
    return $text;
}

/**
 * 获取【番剧列表】数据
 *
 * @param [type] $uID
 * @return void
 * @author Twor
 * @since 2020 01 12
 */
function get_bilibili_operalist($uID)
{
    $url = 'https://api.bilibili.com/x/space/bangumi/follow/list?type=1&vmid=' . $uID;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Origin: https://space.bilibili.com", "Referer: https://space.bilibili.com/" . $uID . "/bangumi"));
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}
