### UPDATE 2.2

本次更新做出如下更改

##### 增加了

- Ajax 评论

##### 修复了

- Pjax 失效

##### 已知的问题

- 开启 Ajax 评论需要关闭内置的 Typecho 反垃圾评论
- 站点图标资源似乎无法连接

------

### 随便写写

终于把 Ajax 评论拿下了，累死了。🐭🐭不怎么会写程序，但我还是挺会缝合的…… 接下来就是逢一个反垃圾评论吧。

------

### 测试进度

- 通过版本：
  - v 1.0
  - v 1.1
  - v 1.3 —— 黑幕功能
  - v 1.4 —— LOGO

- 有Bug的版本 
  - v 1.2
  - v 1.5 —— 向上滚动

------

### ~~画大饼~~计划中！UPDATE 2 系列 ！

- [X] 测试 UPDATE 1 系列
- [ ] 整合 [AllsitePasswd - GitHub](https://github.com/gogobody/AllsitePasswd) （全站加密）
- [X] 整合 ajax 评论
- [ ] 整合 [PartiallyPassword - GitHub](https://github.com/wuxianucw/PartiallyPassword) （加密部分段落）

------

### 历代更新

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