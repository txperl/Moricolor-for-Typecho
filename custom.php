<?php
    $bT_all = new Typecho_Widget_Helper_Form_Element_Radio('bT_all',array('off' => '关闭','on' => '开启'),'on','底部工具栏总开关',NULL);
    $form->addInput($bT_all);
    $bT_hitokoto = new Typecho_Widget_Helper_Form_Element_Radio('bT_hitokoto',array('off' => '关闭','on' => '开启'),'on','一言',NULL);
    $form->addInput($bT_hitokoto);
    $bT_category = new Typecho_Widget_Helper_Form_Element_Radio('bT_category',array('off' => '关闭','on' => '开启'),'on','分类',NULL);
    $form->addInput($bT_category);
    $bT_tag = new Typecho_Widget_Helper_Form_Element_Radio('bT_tag',array('off' => '关闭','on' => '开启'),'off','标签',NULL);
    $form->addInput($bT_tag);
    $bT_page = new Typecho_Widget_Helper_Form_Element_Radio('bT_page',array('off' => '关闭','on' => '开启'),'off','页面',NULL);
    $form->addInput($bT_page); 
    $bT_search = new Typecho_Widget_Helper_Form_Element_Radio('bT_search',array('off' => '关闭','on' => '开启'),'on','搜索',NULL);
    $form->addInput($bT_search);
    $tools_Pages_if = new Typecho_Widget_Helper_Form_Element_Radio('tools_Pages_if',array('off' => '关闭','on' => '开启'),'off','换页导航自定义链接',NULL);
    $form->addInput($tools_Pages_if);
    $index_QuickPreview_Img = new Typecho_Widget_Helper_Form_Element_Radio('index_QuickPreview_Img',array('off' => '关闭','on' => '开启'),'off','文章预览是否显示图片',NULL);
    $form->addInput($index_QuickPreview_Img);
    $index_QuickPreview_Img = new Typecho_Widget_Helper_Form_Element_Radio('index_QuickPreview_Img',array('off' => '关闭','on' => '开启'),'off','文章预览是否显示图片',NULL);
    $style_TextIndent = new Typecho_Widget_Helper_Form_Element_Radio('style_TextIndent',array('off' => '关闭','on' => '开启'),'off','首行缩进',NULL);
    $form->addInput($style_TextIndent);
    $style_CommentShow = new Typecho_Widget_Helper_Form_Element_Radio('style_CommentShow',array('off' => '关闭','on' => '开启'),'off','默认显示评论',NULL);
    $form->addInput($style_CommentShow);
    $beta_MoriGarden= new Typecho_Widget_Helper_Form_Element_Radio('beta_MoriGarden',array('off' => '关闭','on' => '开启'),'off','MoriGarden',NULL);
    $form->addInput($beta_MoriGarden);
    $beta_MoreFunctions = new Typecho_Widget_Helper_Form_Element_Radio('beta_MoreFunctions',array('off' => '关闭','on' => '开启'),'off','Beta测试内容',NULL);
    $form->addInput($beta_MoreFunctions);
    $tools_Pages_title = new Typecho_Widget_Helper_Form_Element_Text('tools_Pages_title',NULL,"{your_url}",'自定义链接标题','{your_url}');
    $form->addInput($tools_Pages_title);
    $tools_Pages_url = new Typecho_Widget_Helper_Form_Element_Text('tools_Pages_url',NULL,"https://github.com/txperl/Moricolor-for-Typecho",'自定义链接','https://github.com/txperl/Moricolor-for-Typecho');
    $form->addInput($tools_Pages_url);
    $index_QuickPreview = new Typecho_Widget_Helper_Form_Element_Text('index_QuickPreview',NULL,"1",'快速浏览页数','每页默认显示 X 个快速预览');
    $form->addInput($index_QuickPreview);
    $style_TextBar = new Typecho_Widget_Helper_Form_Element_Text('style_TextBar',NULL,"1",'文章页头部信息','1:功能按钮及分享按钮（文章目录导航仅支持 h3,h4 层级）<br />0:纯文本');
    $form->addInput($style_TextBar);
    $style_BGPic = new Typecho_Widget_Helper_Form_Element_Text('style_BGPic',NULL,NULL,'博客背景图设置','填入图片链接，留空为不开启');
    $form->addInput($style_BGPic);
    $style_FontWeight = new Typecho_Widget_Helper_Form_Element_Text('style_FontWeight',NULL,"normal",'字体粗细','normal:默认 | lighter:细 | bolder:粗');
    $form->addInput($style_FontWeight);
    $style_Color = new Typecho_Widget_Helper_Form_Element_Text('style_Color',NULL,"array('Mori')",'全局配色设定（复制相应内容）',
        'Mori(森) - array(\'Mori\')<br />
        H(类似黑) - array(\'\',\'#546e7a\',\'#90a4ae\',\'#90a4ae\')<br />
        Q(应该青) - array(\'\',\'#00838f\',\'#00acc1\',\'#00acc1\')<br />
        L(有点蓝) - array(\'#0277bd\',\'#0288d1\',\'#03a9f4\',\'#90caf9\')<br />
        F(微微粉) - array(\'#f48fb1\',\'#f48fb1\',\'#f8bbd0\',\'\')');
    $form->addInput($style_Color);
    
    $id = new Typecho_Widget_Helper_Form_Element_Text('id',NULL,NULL,'歌单id','这里填写你的 <b>网易云音乐</b> 或 <b>QQ音乐</b> 歌单ID，请不要填写成为UserID');
	$form->addInput($id);
    $autoplay = new Typecho_Widget_Helper_Form_Element_Radio('autoplay',array ('0' => '启用','1' => '禁用'),'1','自动播放','PS：部分主题或浏览器可能不支持此项。');
	$form->addInput($autoplay);
    $lrc = new Typecho_Widget_Helper_Form_Element_Radio('lrc',array ('0' => '启用','1' => '禁用'),'0','歌词显示','选择是否开启歌词显示');
    $form->addInput($lrc);
    $order = new Typecho_Widget_Helper_Form_Element_Radio('order',array ('0' => '列表顺序','1' => '随机播放'),'0','音频循环顺序','选择你的音乐播放方式~');
	$form->addInput($order);
    $color = new Typecho_Widget_Helper_Form_Element_Text('color',NULL,'#34495e','主题颜色','这里填写十六进制颜色代码，作为进度条和音量条的主题颜色');
	$form->addInput($color);
    $volume = new Typecho_Widget_Helper_Form_Element_Text('volume', null, '0.7', _t('默认音量'), '这里填写不大于1的数字作为默认音量<br/>PS：播放器会记忆用户设置，用户手动设置音量后默认音量即失效');
    $form->addInput($volume);
    $hide = new Typecho_Widget_Helper_Form_Element_Radio('hide', array ('0' => '否', '1' => '是'), '0','是否默认收起播放器', '选择“是”后则会默认收起播放器');
    $form->addInput($hide);
    $cachetime = new Typecho_Widget_Helper_Form_Element_Text('cachetime', null, '86400', _t('缓存时间（秒）'), '这里填写自动缓存的时间，默认为24小时');
    $form->addInput($cachetime);
    $server = new Typecho_Widget_Helper_Form_Element_Radio('server', array ('0' => '网易云音乐', '1' => 'QQ音乐'), '0','选择音乐来源', '您可以选择使用网易云音乐或者QQ音乐的歌单');
    $form->addInput($server);
    $netease = new Typecho_Widget_Helper_Form_Element_Radio('netease', array ('0' => '自定义API', '1' => 'Shota\'s API', '2' => 'O\'s API', '3' => 'Meto API'), '1','网易云音乐解析服务器选择', '您可以自行选择音乐歌单解析服务器');
    $form->addInput($netease);
    $tencent = new Typecho_Widget_Helper_Form_Element_Radio('tencent', array ('0' => '自定义API', '1' => 'Meto API', '2' => 'O\'s API'), '1','QQ音乐解析服务器选择', '您可以自行选择音乐歌单解析服务器');
    $form->addInput($tencent);
    $api = new Typecho_Widget_Helper_Form_Element_Text('iapi', null, null, _t('自定义API'), '若您上一个设置选择了自定义API，请您按照下面的方式填写，若没有选择则可以空着<br/>示例：https://api.713.moe/netease?type=playlist&id=');
    $form->addInput($api);