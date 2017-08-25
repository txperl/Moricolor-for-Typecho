<?php
// 'on' 为开启
// 'off'或留空 为关闭

//Pages -换页导航中间的三条杠！
$GLOBALS['tools_Pages_if'] = 'off'; //是否开启自定义链接
$GLOBALS['tools_Pages'] = array(
	'{your_title}' => '{your_url}', 
	'Moricolor' => 'https://github.com/txperl/Moricolor-for-Typecho'
	);

//底部小工具
$GLOBALS['bottomTools'] = 'on';	//总
$GLOBALS['bottomTools_hitokoto'] = 'on'; //一言
$GLOBALS['bottomTools_category'] = 'on'; //分类
$GLOBALS['bottomTools_tag'] = 'off'; //标签
$GLOBALS['bottomTools_page'] = 'off'; //页面
$GLOBALS['bottomTools_search'] = 'on'; //搜索

//主页
$GLOBALS['index_QuickPreview'] = '1'; //每页默认显示 X 个快速预览
$GLOBALS['index_QuickPreview_Img'] = 'off'; //文章预览是否显示图片

//样式
$GLOBALS['style_TextBar'] = '1'; //文章页头部信息 | 1:功能按钮及分享按钮(文章目录导航仅支持 h3,h4 层级) | 0:纯文本
$GLOBALS['style_TextIndent'] = 'off'; //首行缩进
$GLOBALS['style_CommentShow'] = 'off'; //默认显示评论
$GLOBALS['style_Color'] = 'normal'; //全局配色设定 | 下个版本开放 | 有生之年...

//前方有怪兽！
$GLOBALS['beta_MoriGarden'] = 'off'; //开启后请自行修改 ./MoriGarden/config.php 配置，否则会出事情的！
?>