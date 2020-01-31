<?php
$GLOBALS['api_url'] = 'https://api.tls.moe/'; // 测试中，请勿更改此地址

// 社区类
//// 动态
$GLOBALS['twitter'] = ''; // twitter screen name | 如 txperl | 留空表示不开启
// 动漫类
//// 观看进度（建议只开启一个）
$GLOBALS['bangumi'] = ''; // bangumi user id | 如 228091&txperl | 留空表示不开启
$GLOBALS['bilibili'] = ''; // bilibili user id | 如 208259 | 留空表示不开启 | 开启后请注意隐私控制

//说明
//MoriGarden 是基于 Thatsi 的一个简单例子
//目前包含如下内容：
//twitter: 以时间轴顺序，获取对应id(是@后面的名称)的公开推文（墙内也可使用）
//bangumi: 以时间轴顺序，获取对应id(是@后面的名称)的在看番剧（这个应该只有二次元迷会用得到吧，我反正是用了...）
//weibo: 未开放
//instagram: none
//P.s. 因为测试阶段默认使用我个人注册的 API TOKEN,所以请勿随意或恶意提交
