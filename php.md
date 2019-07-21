## PHP 博客

### php 基础知识

#### 命名空间

* 命名空间代码始终放在<?php 后面
* PHP命名空间与操作系统的物理文件系统不同，这是一个虚拟概念

* 多重导入

```php
 use xxxx\xxxxx.
    xxxx\xxxx,
    xxxx\xxx;
```

* 一个文件中使用多个命名空间


* 全局命名空间


* 自动加载
```
    命名空间为PHP 制定来PSR-4 自动加载器标准奠定基础
    PHP 解释器在运行时按需自动找到并加载PHP类的过程

    __autoload (淘汰)

    spl_autoload_register() 可以多个

```


##### 接口(interface)

 > 接口是两个PHP对象之间的契约，其目的不是让一个对象依赖另一个对象的身份，而是依赖另一个对象的能力。接口把我们代码和依赖解耦，而且允许我们的代码依赖任何实现来预期接口的第三方代码。


 #### 性状(trait)

##### 介绍
 trait 是类的部分实现，可以混入一个或多个现有的PHP类中。trait两个作用 ： 表明类可以做什么，提供模块化实现

 ##### 使用方法
 将语句添加到PHP类定义体中即可

 #### 生成器(generator)

 ##### 介绍
 生成器是简单的迭代器

 ##### 创建迭代器

 ```php
 function myGenerator (){
     yield 'name';
     yield 'kevin';
 }

 ```


 #### 闭包 与匿名函数

 ##### 介绍
```
  闭包是指在创建封装周围状态的函数.即便闭包所在的环境不存在,闭包中封装的状态依然存在
  匿名函数其实就是没有名称的函数.匿名函数可以赋值给变量,还能像其他任何PHP对象那样传递.不过匿名函数仍是函数,匿名函数特别适合作为函数或方法的回调

```



#### Zend Opcache(字节码缓存)

* 使用字节码缓存

> 字节码缓存能存储预先编译好的PHP字节码.意味着请求PHP脚本时,PHP 解释器不用每次都读取,解析和编译PHP代码.PHP解释器会从内存中读取预先编译好的字节码,然后立即执行.这样能节省很多时间,极大地提升应用的性能

* 启用 zend Opcache
1. 手动编译的时候 在./configure 命令加 --enable-opcache
2. 在php.ini 文件中指定zend opcache 扩展路径 php-config --extension-dir
> 如果使用Xdebug ,在PHP.ini 文件中先加载 php-opcache

* 配置 zend opcache
1. opcache.validate_timestamps =1 //生产环境设为 0
2. opcache.revalidate_freq =0
3. opcache.memory_consumption = 64
4. opcache.interned_strings_buffer =16
5. opcache.max_accelerated_files = 4000
6. opcache.fast_shutdown =1 


####  内置的HTTP 服务器

1. 配置服务器 php -S localhost:800 -c app/config/php.ini   --指定启动的php配置文件 

2. php_spai_name() 查看是否使用 内置服务器

3. 缺点 : PHP内置服务器不能使用到生产环境  内置服务器性能不能好 容易产生阻塞 只支持少数的媒体类型  内置服务器通过路由器支持少量的url 重写规则



#### psr

* 介绍

> psr (php standards recommendation ) 简称 

1. psr-1: 基本的代码风格
2. psr-2: 严格的代码风格
3. psr-3: 日志记录器接口
4. psr-4: 自动加载

##### psr -1 基本代码风格

```
    如果想编写符合社区标准的PHP 代码,首先要遵守psr-1,

```

> psr-1 要求
1. PHP标签 必须把PHP 代码放在 <?php ?> 或 <? ?> 标签内.不得使用其它PHP标签句法
2. 编码 所有PHP文件都必须使用utf-8字符集编码,而且不能有字符顺序标记(byte order mark,bom)
3. 目的 一个PHP文件可以定义符合,或者执行有副作用的操作,但不能同时做这两件事
4. 自动加载 PHP命名空间和类必须遵守psr-4自动加载标准.我们只需要为PHP符号选择合适的名称
5. 类的名称 PHP名称必须一直使用大驼峰式(CamelCase).这种格式也叫标题式(titlecase)
6. 常量名称 PHP常量的名称必须全部使用大写字母.如果需要,可以使用下划线吧单词分开

7. 方法的名称 PHP方法的名称必须一直使用camelcase小这种驼峰式.方法名的首字母是小写的,后续单词的首字母是大写


##### psr-2 严格的代码风格


>psr-2 要求







