### UPDATE 1.5

本次更新做出如下更改

##### 添加了

- 快速回到顶部

##### 修复了

- 部分资源在 UPDATE 功能未开启之前就加载了
- 将 css 集合在`beta.css`内

##### 已知的问题

- [遗留问题] 使用 pjax 后评论无法正常使用，可以配套 [AjaxComments - GitHub](https://github.com/visamz/AjaxComments) 使用 （欲了解更多请查看 v 1.0 的 commit ）

------

### 测试进度

还没开始呢！

------

### ~~画大饼~~计划中！UPDATE 2 系列 ！

- [ ] 测试 UPDATE 1 系列
- [ ] 整合 [AllsitePasswd - GitHub](https://github.com/gogobody/AllsitePasswd) （全站加密）
- [ ] 整合 [AjaxComments - GitHub](https://github.com/visamz/AjaxComments)  （Ajax评论）
- [ ] 整合 [PartiallyPassword - GitHub](https://github.com/wuxianucw/PartiallyPassword) （加密部分段落）

------

### 历代更新

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

------

### 写在最后

整合插件，这玩意可行吗？我没试过，也没看到类似的文章。

如果原作者同意且有可能的化，我也会尽快（鸽子预定）整合以上插件。