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
$GLOBALS['bottomTools'] = 'on';    //总
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
$GLOBALS['style_BGPic'] = ''; //博客背景图设置(填入图片链接)，留空为不开启
$GLOBALS['style_FontWeight'] = 'normal'; //字体粗细 | normal:默认 | lighter:细 | bolder:粗
//因有些背景图与原主题风格不同，你可以将'style_FontWeight'设置为 lighter 再更换一下配色，这样整体性会高一些

//配色 全局配色设定(请自行复制粘贴以下相应数组) | 初版,只包含小部分颜色调整(文章配色请自行在 mori.css 中更改)
//Mori(森) - array('Mori')
//H(类似黑) - array('','#546e7a','#90a4ae','#90a4ae')
//Q(应该青) - array('','#00838f','#00acc1','#00acc1')
//L(有点蓝) - array('#0277bd','#0288d1','#03a9f4','#90caf9')
//F(微微粉) - array('#f48fb1','#f48fb1','#f8bbd0','')
$GLOBALS['style_Color'] = array('Mori');

//前方有怪兽！
$GLOBALS['beta_MoriGarden'] = 'off'; //开启后请自行修改 ./MoriGarden/config.php 配置，否则会出事情的！
$GLOBALS['beta_MoreFunctions'] = 'off'; //开启后将支持pjax等功能，具体内容详见UPDATE.md
