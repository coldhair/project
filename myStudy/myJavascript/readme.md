# 我的Javascript学习内容
2018年1月24日，学习了https://www.imooc.com/video/9491
## DOM学习的主要内容
- DOMready-认识DOM-文档与节点类型等
- 节点探究-节点的类型判断-元素节点的继承层次-元素节点的分类
- 节点创建与删除
- 节点查找与筛选
- 表单与表格操作
- 属性系统
- 样式设置
## 学习了滑动门的案例
- 路径：project\myStudy\myJavascript\slidingDoors01
- 学习了parseInt()函数的用法，见：myStudy/myJavascript/parseInt.html
## 学习了用Github项目管理
- 上传push下载pull，在phpStorm中用 `Ctrl+Shift+K`
- Git的使用，Press `Ctrl+K`做Push.
## 条件判断时False 等效值
下面这些值将被计算出 false (also known as [Falsy](https://developer.mozilla.org/en-US/docs/Glossary/Falsy) values):
- `false`
- `undefined`
- `null`
- `0`
- `NaN`
- 空字符串（`""`）
2018年1月26日
## DOM事件探秘
- 事件冒泡 大部分浏览器都支持，可放心使用 myStudy/myJavascript/test001.html
> 事件冒泡：即事件最开始由最具体的元素（文档中嵌套层次最深的那个节点）接收，然后逐级向上传播至最不具体的元素（文档）。
- 事件捕获 不太具体的节点应该更早接受到事件，而最具体的节点最后接受到事件。
添加事件的方法
- 使用HTML事件处理程序
- DOM 0级事件处理程序
> 较传统的方式：把一个函数赋值给一个事件处理程序的属性（简单、具有跨浏览器的优势）。
- DOM 2级事件处理程序
>DOM 2级事件处理定义了两个方法：用于添加和删除事件处理程序的操作，分别是addEventListener()和removeEventListener()。
>所有的DOM节点都可使用这两个方法，接受三个参数：要处理的事件名、事件处理程序的函数、布尔值。
>布尔值的true表示在捕获阶段调用函数，false表示在冒泡阶段调用函数，一般设置为false。
- DOM 2级可以添加多个事件处理程序，会按顺序执行。
***
- 事件对象
> 定义：在触发DOM上的事件都会产生一个对象，事件对象event包含的信息
1. DOM 中的事件对象 
> 1).type属性 用于获取事件类型；
> 2).target属性 用于获取事件目标；
> 3).stopPropagation()方法 用于阻止事件冒泡；
> 4).preventDefault()方法 阻止事件的默认行为；

- 通过事件实现登录面板的显示和隐藏 myStudy/myJavascript/showLogin01/showLogin.html



