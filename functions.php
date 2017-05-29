<?php
ini_set("error_reporting","E_ALL & ~E_NOTICE");
function img_postthumb($cid) {
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
		echo '<img src="'.$img_src.'" class="img-rounded img-responsive" style="box-shadow: 0 2px 15px 1px rgba(0,0,0,0.1);">';  //当找到一个src地址的时候，输出缩略图
		break;

		default:
		echo '';  //没找到(默认情况下)，不输出任何内容
	};
}
function themeInit($archive) {
	if ($archive->is('category') or $archive->is('tag') or $archive->is('search') or $archive->is('author')) {
		$archive->parameter->pageSize = 16; // 自定义条数
	}
}
?>