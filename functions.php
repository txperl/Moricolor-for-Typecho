<?php
ini_set("error_reporting", "E_ALL & ~E_NOTICE");
function img_postthumb($cid, $type = 0)
{
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')
        ->from('table.contents')
        ->where('table.contents.cid=?', $cid)
        ->order('table.contents.cid', Typecho_Db::SORT_ASC)
        ->limit(1));

    preg_match_all("/<!-- img_quick:(.*?); -->/", $rs['text'], $thumbUrl);  //通过正则式获取图片地址

    $img_src = $thumbUrl[1][0];  //将赋值给img_src
    $img_counter = count($thumbUrl[0]);  //一个src地址的计数器

    switch ($img_counter > 0) {
        case $img_src == "img_url";
            break;

        case $allPics = 1:
            if ($type == 0) {
                echo '<img src="' . $img_src . '" class="img-rounded img-responsive" style="box-shadow: 0 2px 15px 1px rgba(0,0,0,0.1);">';
            } elseif ($type == 1) {
                echo '<div class="cover-image" style="background-image: url(\'' . $img_src . '\');"></div>';
            } elseif ($type == 2) {
                echo '';
            } //当找到一个src地址的时候，输出缩略图
            break;

        default:
            echo '';  //没找到(默认情况下)，不输出任何内容
    };
}
function des_postthumb($cid)
{
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')
        ->from('table.contents')
        ->where('table.contents.cid=?', $cid)
        ->order('table.contents.cid', Typecho_Db::SORT_ASC)
        ->limit(1));

    preg_match_all("/<!-- des_quick:(.*?); -->/", $rs['text'], $thumbC);

    $des_content = $thumbC[1][0];
    $des_counter = count($thumbC[0]);

    if ($des_counter > 0) {
        return $des_content;
    } else {
        return '';
    }
}
function themeInit($archive)
{
    if ($archive->is('category') or $archive->is('tag') or $archive->is('search') or $archive->is('author')) {
        $archive->parameter->pageSize = 16; // 自定义条数
    }
}
function parseContnet($content)
{
    //解析文章 暂只是添加 h3,h4 锚点，为 <img> 添加 data-action

    //添加 h3,h4 锚点
    $ftitle = array();
    preg_match_all('/<h([3-4])>(.*?)<\/h[3-4]>/', $content, $title);
    $num = count($title[0]);

    for ($i = 0; $i < $num; $i++) {
        $f = $title[2][$i];
        $type = $title[1][$i];
        if ($type == '3') {
            $ff = '<h3 id="anchor-' . $i . '">' . $f . '</h3>';
        }
        if ($type == '4') {
            $ff = '<h4 id="anchor-' . $i . '">' . $f . '</h4>';
        }
        array_push($ftitle, $ff);
    }
    for ($i = 0; $i < $num; $i++) {
        $content = str_replace_limit($title[0][$i], $ftitle[$i], $content);
    }

    //<img> 添加 data-action
    $fimg = array();
    preg_match_all('/<img (.*?)>/', $content, $img);
    $num = count($img[0]);

    for ($i = 0; $i < $num; $i++) {
        $f = $img[1][$i];
        $ff = '<img data-action="zoom" ' . $f . '>';

        array_push($fimg, $ff);
    }
    for ($i = 0; $i < $num; $i++) {
        $content = str_replace_limit($img[0][$i], $fimg[$i], $content);
    }

    print_r($content);
}
function str_replace_limit($search, $replace, $subject, $limit = 1)
{
    if (is_array($search)) {
        foreach ($search as $k => $v) {
            $search[$k] = '`' . preg_quote($search[$k], '`') . '`';
        }
    } else {
        $search = '`' . preg_quote($search, '`') . '`';
    }

    return preg_replace($search, $replace, $subject, $limit);
}
function post_tor($content)
{
    $tor = array();
    $f = '<a href="#main-post"><span class="tori">Title</span></a><br>';
    preg_match_all('/<h[3-4]>(.*?)<\/h[3-4]>/', $content, $tor_i);
    $num = count($tor_i[0]);
    for ($i = 0; $i < $num; $i++) {
        $a = '<a href="#anchor-' . $i . '">' . $tor_i[0][$i] . '</a>';
        $f = $f . $a;
    }
    $f = str_replace('<h3>', '<span class="tori">', $f);
    $f = str_replace('</h3>', '</span><br>', $f);
    $f = str_replace('<h4>', '<span class="torii">', $f);
    $f = str_replace('</h4>', '</span><br>', $f);
    if ($num == 0) {
        print_r('');
    } else {
        print_r($f);
    }
}
function change_color($c)
{
    $index_time = 'dt a{color:' . $c[0] . '!important;}';
    $index_post_link = 'dd a{color:' . $c[1] . '!important;}dd a:hover{color:' . $c[2] . '!important;}';
    $post_info = '.post-info a:nth-child(1n){background:' . $c[3] . '!important;}.post-info a:hover{color:' . $c[3] . '!important;background: #fff0 !important;}';
    $rst = $index_time . $index_post_link . $post_info;
    return $rst;
}
function change_fontweight($w)
{
    if ($w == 'lighter') {
        $rst = 'body{font-weight: 300!important;}dt{font-weight: 500!important;}h1,h2,h3{font-weight:500!important;}b, strong{font-weight:500!important;}';
    }
    if ($w == 'bolder') {
        $rst = 'body{font-weight: 600!important;}h1,h2,h3{font-weight:700!important;}b, strong{color:#F39C12!important;}';
    }
    return $rst;
}
