<?php


/**
 * 
 *  抽象工厂
 *  @descript 抽象工厂为一组或相互依赖的对象创建提供接口,而无需指定其具体实现类
 * 
 * 
 * @link https://laravelacademy.org/post/2471.html
 */


 namespace DesignPatterns\Creating\AbstractFactory;



    abstract class AbstractFactory{
        /**
         * 创建文本组件
         */
        abstract public function createText($content);

        /**
         * 创建图片组件
         */
        abstract public function createPicture($path,$name='');
    }




 ?>