## UPDATE 3.0 THE LAST VERSION

本次更新做出如下更改

##### 增加了

- 使用GUI来编辑 `config.php`
- 无刷音乐播放

##### 修复了

- Pjax 关闭时返回顶部按钮的错误显示
- 站点图标资源似乎无法连接
- 优化 Pjax 框架

##### 微调

- `$GLOBALS['beta_MoreFunctions']` 已默认关闭

##### 已知的问题

- 开启 Ajax 评论需要关闭内置的 Typecho 反垃圾评论
- 主题配色似乎无法更改
- 似乎由于大量的本地 js 和 css 文件导致了页面有时候响应比较慢
- 响应超时会让 Pjax 失效，页面此时会刷新

------

### 随便写写

这是本🐭🐭缝合的最后一个功能增加地版本了。也就是指不再为其添加更多的功能了，因为其他的功能都可以直接通过插件达到不错的体验，各位可以按照自己的需求添加插件。但出现了BUG我一定会即时地修复的。

这个版本的发布确实比较匆忙，完全没有优化好。但因为马上要忙了，所以还是决定凑合着把这个坑先填上，后续再进行修改。

另外我还会试着将主题进行压缩优化，同时改进程序结构，完成后再进行新版本发布。

从1.0到3.0，我把一些常用的功能缝合了起来。相较于原版，缝合版本实现了：

- Pjax无刷浏览
- Ajax评论
- MathJax渲染支持
- 表格样式的修复
- 网站Logo
- 底部登录
- 黑幕功能
- 快速回到顶部
- 背景音乐播放
- GUI编辑配置文件

一路走来，离不开开源社区以下各位的成果：

[Aplayer音乐插件](https://github.com/SatoSouta/Typecho-plugin-APlayerAtBottom)
[Initial主题](https://github.com/jielive/initial)
[萌娘百科](https://zh.moegirl.org.cn/MediaWiki:Mobile.css)
[萌娘百科](https://zh.moegirl.org/MediaWiki:Common.css)

最后，祝各位使用愉快😘（如果有人用的话）。

------

### 历代更新

### UPDATE 2.2

本次更新做出如下更改

增加了

- Ajax 评论

修复了

- Pjax 失效

已知的问题

- 开启 Ajax 评论需要关闭内置的 Typecho 反垃圾评论
- 站点图标资源似乎无法连接

##### UPDATE 2.1

增加了

- 登录功能

修复了

- 跟上了master的3个commits —— 一言能正常使用了
- post页面无法正常打开的问题

##### v 2.0

添加了

- 默认的LOGO（蚌埠住了）

临时删除了

- 登录选项
- RSS 订阅按钮

修复了

- 黑幕的正确使用方法
```
!!!
<span class="bc" title="你想写的"> 这里是黑幕遮挡的内容 </span>
!!! 
```
- **为了开发方便，`$GLOBALS['beta_MoreFunctions']`默认开启**
- 向上滚动无法正常使用的问题

##### v 1.5

添加了

- 快速回到顶部

修复了

- 部分资源在 UPDATE 功能未开启之前就加载了
- 将 css 集合在`beta.css`内

##### v 1.4

添加了

- 网站图标支持
  - 用法：`<link rel="shortcut icon" href="logo的位置" type="image/x-icon">`，**请使用`.ico`文件**

修复了

- `header.php`中一处注释缺失

##### v 1.3

添加了

- 黑幕功能！！！
  - 用法：` <span class="bc" title="你想写的"> 这里是黑幕遮挡的内容 </span>`

##### v 1.2

添加了

- RSS 订阅按钮（默认关闭，且未配置图片）
- 登录、注册入口

修复了

- **现在所有的 UPDATE 功能都需要在`config.php`中开启且所有功能默认关闭**

##### v 1.1

添加了

- 预加载

##### v 1.0

添加了

- pjax 支持
- MathJax 的渲染
- 黑暗模式 （仅想法，未实现，原因请查看 v 1.0 的 commit ）

修复了

- 表格显示不佳