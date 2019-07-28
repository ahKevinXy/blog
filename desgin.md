

## 设计模式

> 什么是设计模式 就像工具箱中的一堆工具,在某项工作的时候,有时你会发现有一个工具很适用,有时需要用到其中好几种



* 单例模式 
> 当你实例化一个对象时 ,它可以确保你实例化的这个类将仅有一个实例,并且我们在代码的任何地方都可以召回相同的对象

```php
    class singleDesgin {
        static public $instance;

        private function __construct()
        {

        }
        static public function _getInstance()
        {
            if(!(self::$instance instanceof singleDesgin)
            {
                self::$instance = new self();
            }

            return self::$instance;
        }
    }

```

>单例实例的关键点

```
1 使用一个静态成员来保持一个单例实例
2 有一个私有的__construct 将决定这个类只能被本身所包含的静态方法实例化
3 singleDesgin::getinstance 静态方法被调用的时候返回这个对象

```
> 单例问题
```
    首先 尽管单例思想很伟大,当需要软件某些新的方面需要第二个实例时,它的局限性立即清晰可见.
    一旦对象被实例化,单例模式会被设计为闲置状态,由此导致单元测试成为一场噩梦.
```


#### traits 

> traits 最基本的形式被认为是一个辅助编译器的复制和粘贴技术

```php

trait Singleon {
    private static $_instance = null;
    public static function getInstance () {
        $class = __CLASS__;
        if(!(self::$_instance instanceof __CLASS__)){
            self::$_instance  = new $class();
        }
        return self::$_instance;
    }
}

class DBwriteConnect extends PDO{
    use Singleon;

    private function __construct(){
        parent::__construct();
    }
}


```


* traits 可以解决重用单例模式问题



#### 注册表模式

> 注册表模式仅是一个单独的全局类,在你需要时允许代码检索一个对象的相同实例,也可以在你需要时创建另一个实例

* 注册表表的4种实现方法
1. Registry::set() 添加一个对象到注册表
2. Registry::get() 从注册表的名字检索一个对象
3. Registry::contains() 在注册表检查一个对象是否存在
4. Registry::unset() 通过对象名在注册表中删除一个对象

* 实例代码

```php

    class Registry{
        static private $_store  =array();
        static public function add($object,$name = null){
            $name = (!is_null($name)) ? get_class($object);
        }
        $name = strtolower($name);


    }

```

#### 工厂模式

> 工厂模式制造对象,像工业界与它同名的钢筋混凝土.通常我们将工厂模式用于初始化相同抽象类或接口的具体实现类



#### 迭代模式

> PHP 最有用的功能之一是foreach 结构,使用foreach,我们可以轻松地迭代数组值和对象属性.迭代模式允许我们将foreach的性能添加到任何对象内部存储数据,而不仅仅添加到其公共属性

##### 迭代参数
1. Iterator 最基本的迭代器
2. IteratorAggregate 可以提供一个迭代器的对象,但是它本身并不是一个迭代器
3. RecursiveIteratorInterator 用来遍历RescursiveIterators 
4. FilterIterator 可以对数据进行过滤的迭代器,只返回与过滤器相匹配的数据
5. MultipleIterator 可以依次遍历多个迭代的迭代器
6. LimitIterator 对其数据子集迭代进行限制的过滤器


#### 依赖注入
> 允许类使用者为这个类注入依赖的行为




#### Ioc模式

> 控制反转是将组件间的依赖关系从程序内部提到外部容器来管理,而依赖注入是指组件的依赖通过外部参数或其他形式注入



