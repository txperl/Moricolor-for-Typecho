### Moricolor
一片森林，一座木屋，如世外桃源般，静谧、安逸。森林的气息，如梦境般，让人神往。

如同她的名字一样，给人以一种自然、恬静的文字阅读体验。

> Moricolor Chapter I 现已发布
> 
> 欢迎体验使用


***Demo1***: [Yumoe v2][1]

[MoriColor for Hexo](https://github.com/Anapopo/Moricolor-for-Hexo) by Anapopo.

----------


### Moricolor Chapter I

#### 细节

 - 点击 **主页的日期** ，可 **快速预览文章**
 - 在文章页面下，可通过文章结尾处的 **HOME按钮** 返回主页，或是浏览器返回
 - 在其他任何页面下，都是通过 **点击博客标题** 返回主页，或是浏览器返回

#### 一些食用方法

**'config.php' 为主题全局配置文件**
``` php 
// 'on' 为开启
// 'off'或留空 为关闭

//Pages -换页导航中间的三条杠！
$GLOBALS['tools_Pages_if'] = 'off'; //是否开启自定义链接
$GLOBALS['tools_Pages'] = array(
  '{your_title}' => '{your_url}', 
  'Moricolor' => 'https://github.com/txperl/Moricolor-for-Typecho'
  );

//底部小工具
$GLOBALS['bottomTools'] = 'on'; //总
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
> 
//前方有怪兽！
$GLOBALS['beta_MoriGarden'] = 'off'; //开启后请自行修改 ./MoriGarden/config.php 配置，否则会出事情的！
```


**MoriGarden[Beta]**

MoriGarden是基于Thatsi的一个简单例子  
这个工具可将你的社交平台动态与博客同步，开启后位于主页底部  
目前包含如下内容：  
twitter: 以时间轴顺序，获取对应 id (@后面的名称)的公开推文（墙内也可使用）  
bangumi: 以时间轴顺序，获取对应 id (@后面的名称)的在看番剧 （这个应该只有二次元迷会用得到吧，我反正是用了...）  
bilibili: 以时间轴顺序，获取对应 id 的在看番剧  
P.s. 因为测试阶段默认使用我个人注册的 API TOKEN,所以请勿随意或恶意提交


**本主题包含一套 Material Design 图标**

位于 './fonts/md'

详细情况请参考 [Material Design Iconic Font][2]


**配色参考**

 - [Flat UI 设计规范配色][3]
 - [Material Design Color][4]


**Prism.js使用 [代码高亮]**

只有部分语言适用，若想支持更多请去官网自行下载
```html
<pre><code class="language-xxx">{your_code}</code></pre>
```
&  
<pre><code class="language-html">
```{language}
{your_code}
```
</code></pre>


**封面图设置**

在文章中加入
```html 
<!-- img_quick:img_url; -->
```
为了整体样式的美观性，建议 图片宽度 >= 980px


**自定义快速预览内容**

在文章中加入
```html 
<!-- des_quick:your_words; -->
```
将 your_words 改成你需要的内容即可


**配色与背景图与字体粗细相关**

目前配色只是一个初版，所以很不完善  
关于背景图，设置一下淡灰风格的图片会显得不那么奇怪  
字体粗细如果没有更改，但你添加了背景图，可以试着改成 lighter 或 bolder ，这样样式整体性会高一些


**其他注意事项**

1. 本主题引用了多个本地资源，若是访问速度明显下降，请自行将本地资源上传到CDN或使用其他解决方案
2. 文章目录导航仅支持 h3,h4 层级，并且手机端不会显示
3. 更多问题可以询问作者

----------


#### Moricolor的诞生离不开以下开源项目

 - [Flat UI][5]
 - [Material Design Iconic Font][6]
 - [Bootstrap Collapse JS][7]
 - [jQuery][8]
 - [zoom_vanilla.js][9]
 - [Prism.js][10]

#### 更新日志
##### Chapter I
 - **[v1.5]**
 - 微调 `<h4>,<h5>,<img>` 标签样式
 - 微调 MoriGarden bilibili 功能与样式
 - 更改 一言 API 更换为『api.imjad.cn』
 - **[v1.4]**
 - 全新 [MoriColor for Hexo](https://github.com/Anapopo/Moricolor-for-Hexo) 主题 (感谢 Anapopo)
 - 微调 `<h4>,<a>,<li>` 标签样式
 - 微调 背景图片灰度取值
 - 微调 页面细节
 - 更改 一言 API 更换为『api.imjad.cn』
 - 更改 主题资源 CDN(CloudflareCDN → StaticfileCDN)
 - 更改 MoriGarden 基于重写版的 Thatsi
 - **[v1.3]**
 - 修复 文章导航重名替换 BUG
 - 优化 SEO
 - **[v1.2!]**
 - 新增 自定义快速预览内容
 - **[v1.2]**
 - 新增 博客背景图
 - 新增 字体粗细选择(配合博客背景图一起使用效果更佳)
 - 新增 评论分页样式(之前忘记写惹)
 - 新增 非常少的配色选择
 - 微调 `<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<a>,<li>,<blockquote>` 标签样式
 - 优化 文章排版
 - **[v1.1]**
 - 新增 是否允许评论判断
 - 更改 将字体源由 本地&七牛CDN 转至 Cloudflare
 - 删除 多余本地文件
 - **[v1.0]**
 - 新增 归档页面折叠显示
 - 新增 figure,figcaption标签样式
 - 新增 文章页头部图片(封面图片) | 使用方式: `<!-- img_quick:img_url; -->`
 - 微调 移动端布局
 - 取消 MoriGarden Weibo 解析
 - 取消 首页分页反转
 - **[beta5]**
 - 新增 文章页头部样式设置
 - 新增 webkit自定义滚动条
 - 微调 部分样式(归档页面tag,主页小工具排版,文章排版与字体大小)
 - 微调 其他细节
 - **[beta4]**
 - 全新 文章页面头部样式
 - 新增 TextBar
 - 新增 文章目录导航(仅支持 h3,h4 层级)
 - 优化 评论层级样式
 - **[beta3]**
 - 测试 Moricolor后花园_基于Thatsi
 - 新增 默认显示评论设置
 - 新增 自定义Pages导航设置(换页导航中间的三条杠杠)
 - 修复 插件无法显示BUG
 - **[beta2]**
 - 全新 归档页面设计
 - 新增 段落缩进设置
 - 新增 标签云(归档页面中)
 - 新增 小工具_Tag,Page
 - 更改 主页月份显示方式(3个字母简写)
 - 修复 评论作者信息编辑BUG

#### 写在最后

本程序源代码可任意修改并任意使用，但禁止商业化用途。一旦使用，任何不可知事件都与原作者无关，原作者不承担任何后果。

如果您喜欢，希望可以在页面某处保留原作者(Trii Hsia)版权信息。

感谢。


  [1]: https://null.yumoe.com/2-0/
  [2]: http://zavoloklom.github.io/material-design-iconic-font/index.html
  [3]: http://www.bootcss.com/p/flat-ui/
  [4]: https://www.materialpalette.com/colors
  [5]: http://www.bootcss.com/p/flat-ui/
  [6]: https://github.com/zavoloklom/material-design-iconic-font
  [7]: http://v3.bootcss.com/javascript/#collapse
  [8]: http://jquery.com/
  [9]: https://github.com/spinningarrow/zoom-vanilla.js
  [10]: http://prismjs.com/