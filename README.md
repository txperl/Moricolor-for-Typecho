### Moricolor
一片森林，一座木屋，如世外桃源般，静谧、安逸。森林的气息，如梦境般，让人神往。

如同她的名字一样，给人以一种自然、恬静的文字阅读体验。

> Moricolor Chapter I 现已发布
> 
> 欢迎体验使用

----------


### Moricolor Chapter I

#### 预览图
[Home1](https://dn-loliamp.qbox.me/1.png) & [Home2](https://dn-loliamp.qbox.me/2.png) & [Home3](https://dn-loliamp.qbox.me/4.png) & [Post](https://dn-loliamp.qbox.me/3.png)

#### 细节

 - 点击 **主页的日期** ，可 **快速预览文章**
 - 在文章页面下，可通过文章结尾处的 **HOME按钮** 返回主页，或是浏览器返回
 - 在其他任何页面下，都是通过 **点击博客标题** 返回主页，或是浏览器返回

#### 一些食用方法

> **'config.php' 为主题全局配置文件**
> ``` php 
> // 'on' 为开启
> // 'off'或留空 为关闭
> 
> //Pages -换页导航中间的三条杠！
> $GLOBALS['tools_Pages_if'] = 'off'; //是否开启自定义链接
> $GLOBALS['tools_Pages'] = array(
>   '{your_title}' => '{your_url}', 
>   'Moricolor' => 'https://github.com/txperl/Moricolor-for-Typecho'
>   );
> 
> //底部小工具
> $GLOBALS['bottomTools'] = 'on'; //总
> $GLOBALS['bottomTools_hitokoto'] = 'on'; //一言
> $GLOBALS['bottomTools_category'] = 'on'; //分类
> $GLOBALS['bottomTools_tag'] = 'off'; //标签
> $GLOBALS['bottomTools_page'] = 'off'; //页面
> $GLOBALS['bottomTools_search'] = 'on'; //搜索
> 
> //主页
> $GLOBALS['index_QuickPreview'] = '1'; //每页默认显示 X 个快速预览
> $GLOBALS['index_QuickPreview_Img'] = 'off'; //文章预览是否显示图片
> 
> //样式
> $GLOBALS['style_TextBar'] = '1'; //文章页头部信息 | 1:功能按钮及分享按钮(文章目录导航仅支持 h3,h4 层级) | 0:纯文本
> $GLOBALS['style_TextIndent'] = 'off'; //首行缩进
> $GLOBALS['style_CommentShow'] = 'off'; //默认显示评论
> $GLOBALS['style_Color'] = 'normal'; //全局配色设定 | 下个版本开放 | 有生之年...
> 
> //前方有怪兽！
> $GLOBALS['beta_MoriGarden'] = 'off'; //开启后请自行修改 ./MoriGarden/config.php 配置，否则会出事情的！
> ```

> **MoriGarden[Beta]**
> MoriGarden是基于Thatsi的一个简单例子
> 这个工具可将你的社交平台动态与博客同步，开启后位于主页底部
> 目前包含如下内容：
> twitter: 以时间轴顺序，获取对应id(是@后面的名称)的公开推文（墙内也可使用）
> bangumi: 以时间轴顺序，获取对应id(是@后面的名称)的在看番剧 （这个应该只有二次元迷会用得到吧，我反正是用了...）
> P.s. 因为测试阶段默认使用我个人注册的API TOKEN,所以请勿随意或恶意提交

> **本主题包含一套 Material Design 图标**
> 
> 位于 './fonts/md'
> 
> 详细情况请参考 [Material Design Iconic Font][2]

> **配色参考**
> 
>  - [Flat UI 设计规范配色][3]
>  - [Material Design Color][4]

> **Zoom.js使用 [图片缩放]**
> ```html
> <img src="{img_url}" data-action="zoom" class="img-rounded img-responsive">
> ```

> **Prism.js使用 [代码高亮]**
> 只有部分语言适用，若想支持更多请去官网自行下载
> ```html
> <pre><code class="language-xxx">{your_code}</code></pre>
> ```
> &
> <pre><code class="language-html">
> ```{language}
> {your_code}
> ```
> </code></pre>

> **封面图设置**
> 在文章中加入
> ```html
> <!-- img_quick:img_url; -->
> ```
> 为了整体样式的美观性，建议 图片宽度 >= 980px

> **其他注意事项**
> 1.本主题引用了多个本地资源，若是访问速度明显下降，请自行将本地资源上传到CDN或使用其他解决方案
> 2.文章目录导航仅支持 h3,h4 层级
> 3.更多问题可以询问作者

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

 - 新增 归档页面折叠显示
 - 新增 figure,figcaption标签样式
 - 新增 文章页头部图片(封面图片) | 使用方式: <!-- img_quick:img_url; -->
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


  [1]: https://github.com/txperl/Moricolor-for-Typecho
  [2]: http://zavoloklom.github.io/material-design-iconic-font/index.html
  [3]: http://www.bootcss.com/p/flat-ui/
  [4]: https://www.materialpalette.com/colors
  [5]: http://www.bootcss.com/p/flat-ui/
  [6]: https://github.com/zavoloklom/material-design-iconic-font
  [7]: http://v3.bootcss.com/javascript/#collapse
  [8]: http://jquery.com/
  [9]: https://github.com/spinningarrow/zoom-vanilla.js
  [10]: http://prismjs.com/