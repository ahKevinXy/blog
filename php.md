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

1. 贯彻psr-1 使用psr-2 必须贯彻psr-1
2. 缩进 psr-2 推荐 PHP代码使用四个空格缩进
3. 文件和代码行 PHP文件必须使用unix 风格的换行符(lf) ,最后有一个空行,而且不能使用PHP关闭标签?> 每行代码不能超过80个字符.每行末不能有空格
4. 关键字 PHP关键字必须要用小写字母
5. 命名空间 每个命名空间声明语句后必须跟着一个空行.在一系类use声明语句后加一个空行
6. 类 psr-2 类的定义的起始括号应该在类名之后新起一行 ,extends和implements 关键字必须和类名写在一行
7. 方法 方法定义的起始括号要在方法名之后新起一行写,起始圆号之后没有空格,结束圆括号之前也没有空格.方法的每个参数后面有一个逗号和空格
8. 可见性 类中的每个属性和方法都要声明可见性.可见性由public protected private 指定
9. 控制结构 所有控制结构关键字后面都要有一个空格.控制结构关键字包括: if ... 



> todo 

##### psr-3 日志记录器接口






#### 组件

> https://packagist.org




> htmlentites() 过滤特殊的HTML字符

> filter_var filter_input 验证的组件有: aura/filter  respect/validation symfony/validator
##### 安全

1. SQL 注入 解决方案 : 1. 使用预处理语句  2 


##### 密码 
哈希算法 md5 sha1 bcrypt  scrypt

##### 时间,日期和时区

1. 设置默认时区 date.timezone = "America/New_York"
2. 设置默认时区 date_default_timezone_set("PRC")
3. DateTime 提供了一个面向对象的接口,用于管理日期和时间.
4. DateInterval 实例表示长度固定的时间段
5. DateTimeZone 表示时区
6. DatePeriod 一个DateTime 实例 表示迭代开始的时间 一个 DateInterval 表示下一个时期和时间的间隔 一个整数 表示迭代的总次数



#### 数据库

##### pdo扩展

###### 连接
* dsn 数据库驱动的名称 主机或者ip地址 端口号 数据库名称 字符集 

* $pdo = new PDO('mysql:host=127.0.1;dbname=kevin;port=3306;charset=utf8',username,password);

###### 预处理语句

>$pdo -> prepare(sql) $pdo->bindValue(':id',$id,PDO::PARAM_INT) //绑定参数 第三个参数绑定参数的数据类型

##### 查询结果
> $statement ->execute()
* fetch() fetchAll()
1. PDO::FETCH_ASSOC 让fetch() 和fetchAll()返回一个关联数组.数组的键值对应数据库列名
2. PDO::FETCH_NUM 返回一个键为数字的数组.数组的键鱼数据库列在查询结果中的索引
3. PDO::FETCH_BOTH返回一个即有数字又有关联数组
4. PDO::OBJ 返回一个对象 对象的属性是数据库的列名


#####事务 

> $pdo ->beginTransaction()




#### 流 

>定义 : 流的作用是在出发地和目的地之间传输数据.出发地和目的地可以是文件.命令行进程.网络连接.zip或tar压缩文件.临时内存.标准的输入输出,或者PHP流协议封装的实现的任何其它资源





#### php-fpm 配置

##### 全局配置


 * emergency_restart_threshold =10 在指定的一段时间内.如果失效的php-fpm子进程数超过这个值,php-fpm住进程就会重启
 * emergency_restart_interval =1m 设定emergency_restart_threshold 设置采用的时间跨度


 ##### 配置进程池
 * user = root 拥有这个php-fpm进程池子进程的系统用户
 * group =root 子进程中用户组
 * listen = 127.0.0.1:9000 php-fpm 进程池监听的ip地址和端口号
 * listen.allowed_client = 127.0.0.1  可以向这个php-fpm 进程池发送请求的ip地址
 * pm.max_children=51 设定php-fpm 进程池中最多有多少个进程
 * pm.start_servers =3 php-fpm 启动时php-fpm 进程池中立即可用的进程数
 * pm.min_spare_servers =2 php-fpm 空闲时的进程数量最小值
 * pm.max_spare_servers =10 php-fpm 空闲时最多的进程数量
 * pm.max_requests =1000 php-fpm 进程池中各个进程最多能处理的http请求数量.这个设置有助于避免php扩展或库因编写拙劣导致不断内存泄漏
 * slowlog = /log/php-fpm.log 设置日志文件在系统的绝对路径
 * request_slowlog_timeout=5 当前http请求的处理时间超过指定的值,就把请求的回溯信息写入slowlog 设置指定的日志文件



 #### 调优

 ##### php.ini 文件

 * 设置单个php进程可以使用内存的最大值 memory_limit 

 * zend opcache 
```
opcache.memory_consumption =64
opcache.interned_string_buffer =16
opcache.max_accelerated_files = 4000
opcache.validate_timestamps = 1
opcache.revalidate_freq =0
opcache.fast_shutdown =1

```
 1. opcache.memory_consumption =64 为操作码缓存分配的内存量(单位兆mb)
 2. opcache.interned_strings_buffer =16 用来储z驻留字符串的内存量
 3. opcache.max_acelerated_files =4000 操作码缓存中最多能存储多少个PHP脚本
 4. opcache.valiate_timestamps =1 这个值表示经过一段时间后PHP会检查PHP脚本的内容是否有变化.检查变化的时间间隔由opcache.revaliate_freq =0 .如果设置为0 PHP不会检查PHP脚本内容是否变化,我们必须自己动手清除缓存的操作码
 5. opcache.revaliate_freq =0 设置多久检查一次PHP脚本内容是否有变化
 6. opcache.fast_shutdown =1 设置让操作码使用更快的停机步骤,把对象析构和内存释放交给zend engine 内存管理器完成


 ##### 文件上传
 * file_uploads =1 
 * upload_max_filesize =10 最大上传大小
 * max_file_uploads =3 最大上传数目
 > 设置最大上传大小的时候还要考虑NGINX client_max_body_size 设置


 ##### 最长执行时间
 
 * max_execution_time =5 单位s




####xdebug

> xdebug 是最流行的php分析器,使用它分析应用的调用栈,能轻易找到瓶颈和性能问题

##### 配置
1. xdebug.profiler_enable=0 这个设置为了让xdebug 不能自动运行
2. xdebug.profiler_enable_trigger=1 这个设置为了在需要的时候启动xdebug
3. xdebug.profiler_output_dir = xxx 这是一个目录路径,这个目录保存分析器生成的报告


#### xhpof

> xhpof 是facebook 开发,在开发环境和生产环境中能适应,xhpof 收集的信息没有xdebug多,不过消耗系统资源较少


#### HHVM




#### 面向对象编程

* oop 术语 (Object Oriented Programming)

1. class 创建对象的方法或蓝图
2. object 实例
3. instantiate 从类创建对象的动作
4. method 属于对象的函数
5. property 属于对象的变量

* 类的构造

__construct 构造函数  对象实例化会初始化该函数

__destructor 析构函数 对象销毁会调用该函数

