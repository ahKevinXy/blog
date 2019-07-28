## laravel 

#### laravel 目录结构

1. app 主要包含应用程序的核心代码
2. bootstrap 主要包含几个框架启动和自动加载配置的文件
3. config 主要包含程序常用的配置文件信息
4. database 主要包含数据库迁移和数据填充文件
5. public 应用程序的入口目录
6. resources 主要包含视图文件
7. storage 包含编译后的blade 模板基于文件的session 文件缓存 和日志文件等
8. tests 主要包含文件自动化测试文件
9. vendor 主要包含依赖库文件
10. .env 为laravel 框架主配置文件
11. composer.json composer 项目依赖管理文件

##### app目录介绍
1. Console 主要包含所有的artisan 命令
2. Events 用来放置与事件相关的类
3. Exception 包含应用程序的异常处理类,用于处理应用程序抛出的任何异常
4. Http 包含路由文件,控制器文件,请求文件,中间键文件
5. Jobs 主要包含消息队列的各种信息类
6. Listeners 主要包含监听事件类
7. Providers 主要包含服务提供者