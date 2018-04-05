<?php
$GLOBALS['api_url'] = 'http://mori.cafe/what/lea/'; //开发测试中，请勿更改此地址！
$GLOBALS['twitter'] = ''; //twitter screen_name | 如 txperl | 留空表示不开启
$GLOBALS['bangumi'] = ''; //bangumi user | 如 228091 | 留空表示不开启

//说明
//MoriGarden是基于Thatsi的一个简单例子
//目前包含如下内容：
//twitter: 以时间轴顺序，获取对应id(是@后面的名称)的公开推文（墙内也可使用）
//bangumi: 以时间轴顺序，获取对应id(是@后面的名称)的在看番剧（这个应该只有二次元迷会用得到吧，我反正是用了...）
//weibo: 未开放
//instagram: none
//P.s. 因为测试阶段默认使用我个人注册的API TOKEN,所以请勿随意或恶意提交
?>