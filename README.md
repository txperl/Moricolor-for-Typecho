### Moricolor
一片森林，一座木屋，如世外桃源般，静谧、安逸。森林的气息，如梦境般，让人神往。

如同她的名字一样，给人以一种自然、恬静的文字阅读体验。

> 预计发布 Typecho,WordPress 版本，目前前者已基本完成，后者预计暑假中期发布。
> 你现在看到的只是此版本的提前预览版本，请待发布。

Demo: [森の色](https://yumoe.com/)

----------


### Moricolor v1 Chapter I

#### 预览图
![home1](https://dn-loliamp.qbox.me/image/blog/FireShot%20Capture%208%20-%20%E6%A3%AE%E3%81%AE%E8%89%B2%20-%20https___yumoe.com_.png)
![home2](https://dn-loliamp.qbox.me/image/blog/FireShot%20Capture%207%20-%20%E6%A3%AE%E3%81%AE%E8%89%B2%20-%20https___yumoe.com_.png)
![post](https://dn-loliamp.qbox.me/image/blog/FireShot%20Capture%209%20-%20Typecho%20Theme%20Moricolor%20-%20%E6%A3%AE%E4%B9%8B%E8%89%B2%20-%20%E6%A3%AE%E3%81%AE%E8%89%B2%20-%20https___yumoe.com_archives_moricolor.html%20%281%29.png)

#### 细节

 - 点击 **主页的日期** ，可 **快速预览文章**
 - 在文章页面下，只能通过文章结尾处的 **HOME按钮** 返回主页，或是浏览器返回
 - 在其他任何页面下，都是通过 **点击博客标题** 返回主页，或是浏览器返回

#### 一些食用方法

##### 'config.php' 为主题全局配置文件
``` php 
// 'on' 为开启
// 'off'或留空 为关闭

//底部小工具
$GLOBALS['bottomTools'] = 'on'; //总
$GLOBALS['bottomTools_hitokoto'] = 'on'; //一言
$GLOBALS['bottomTools_category'] = 'on'; //分类
$GLOBALS['bottomTools_search'] = 'on'; //搜索

//主页设置
$GLOBALS['index_QuickPreview'] = '0'; //默认显示 X 个快速预览
```

##### 本主题包含一套 Material Design 图标
位于 './fonts/md'

详细情况请参考 [Material Design Iconic Font][1]

##### 配色参考
 - [Flat UI 设计规范配色][2]
 - [Material Design Color][3]

##### Zoom.js使用 [图片缩放]
```html
<img src="{img_url}" data-action="zoom" class="img-rounded img-responsive">
```

##### Prism.js使用 [代码高亮]
只有部分语言适用，若想支持更多请去官网自行下载
```html
<pre><code class="language-xxx">{your_code}</code></pre>
```
&
<pre><code>
```{language}
{your_code}
```
</code></pre>


##### 封面图设置
在文章中加入
```html
<!-- img_quick:img_url; -->
```
为了整体样式的美观性，建议 图片宽度 >= 980px

##### 其他注意事项
1.本主题引用了多个本地资源，若是访问速度明显下降，请自行将本地资源上传到CDN或使用其他解决方案
2.更多问题可以询问作者

----------


#### Moricolor的诞生离不开以下开源项目

 - [Flat UI][5]
 - [Material Design Iconic Font][6]
 - [Bootstrap Collapse JS][7]
 - [jQuery][8]
 - [zoom_vanilla.js][9]
 - [Prism.js][10]

#### 未来

 - 花园功能（类似于博主的个人喜好展示地）
 - 更多的独立页面
 - 更好的文字排版

#### 写在最后

本程序源代码可任意修改并任意使用，但禁止商业化用途。一旦使用，任何不可知事件都与原作者无关，原作者不承担任何后果。

如果您喜欢，希望可以在页面某处保留原作者(Trii Hsia)版权信息。

感谢。


  [1]: http://zavoloklom.github.io/material-design-iconic-font/index.html
  [2]: http://www.bootcss.com/p/flat-ui/
  [3]: https://www.materialpalette.com/colors
  [4]: https://yumoe.com/usr/uploads/2017/05/624856042.png
  [5]: http://www.bootcss.com/p/flat-ui/
  [6]: https://github.com/zavoloklom/material-design-iconic-font
  [7]: http://v3.bootcss.com/javascript/#collapse
  [8]: http://jquery.com/
  [9]: https://github.com/spinningarrow/zoom-vanilla.js
  [10]: http://prismjs.com/