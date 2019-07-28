### elasticsearch 博客

#### 理解搜索

* 非结构化搜索： 查找有搜索技术、工作经验的候选人
* 结构化搜索： 查找有5到10年工作经验到候选人
* 基于地理信息的搜索 ： 查找在江湾镇复原200公里的候选人
* 分析查询： 计算所有候选人的平均工资
* 组合查询： 计算在江湾镇100公里并且有5-10年工资经验的候选人的平均工资


#### lucene 的介绍

``` 

 lucene 是提供了一个功能丰富，底层的查询和索引库
```


#### Elasticsearch 介绍
```
    elasticsearch 是一款基于lucence 的面向文档的搜索引擎。具有良好的性能和可扩展性。它对lucence 进行了 抽象，屏蔽了它的底层细节，让搜索和分析更容易实现。它不仅具有搜索的功能，还提供了分布式，可扩展和多租户等特性。它的数据类型是非常灵活的，我们可以使用系统默认的规则就行匹配，也可以对它进行精确的控制。它提供了支持Json的restful接口，也提供了基于java，php 的api。
```
#### Elasticsearch  用途

* 当需要搜索你卖的商品，可以通过Elasticsearch 来存储你的整个产品目录和库存信息，为客户提供精准搜索，可以为客户推荐相关的商品

* 当你想收集日志和交易数据的时候，需要分析和挖掘这些数据，寻找趋势，进行统计、总结，或发现异常。在这种情况下，可以使用Logstash 或者其他工具进行收集数据，当这些数据存储到Elasticsearch 中。你可以搜索和汇总这些数据，找到任何你感兴趣的信息

* 当你运行一个价格提醒平台，可以给客户提供一些规则，例如客户有兴趣购买一个电子设备，当商品的价格在未来的一个月内价格低于多少钱的时候通知客户。在这种情况下。你可以把供应商的价格，把他们定期存储到Elasticsearch 中，使用定时器过滤来匹配客户的需求，当查询到价格低于客户设定的值后给客户发送一条通知

* 当有大量数据时，你有商业智能分析的需求，希望快速调查、分析和可视化。在这种情况，你可以使用Elasticsearch 来存储数据，然后使用Kibana 建立自定义的仪表盘或者你熟悉的语言开发展示界面，你可以使用Elasticsearch 的聚合功能来执行复杂的商业智能与数据查询

#### Elasticsearch 优点

* 横向可扩展性： 只需要增加一台服务器，做点配置，启动一下Elasticsearch 进程就可以并入集群

* 分片机制提供更好的发布性： 同一个索引分成多个分片（sharding),这点类似HDFS 的块机制；分而治之的方式可提供处理效率
* 高可用： 提供复制机制，一个分片可以设置多个复制，使得某个服务器在宕机的情况下，集群仍旧可以照常使用，并把宕机丢失的数据复制恢复到其他节点
* 使用简单： 只需要一个命令就可以下载文件，快速搭建一个站内搜索引擎


##### 索引 （index）
```
    索引是一个逻辑命名空间下不同类型的文档集合。Elasticsearch 的索引可以认为是数据库中的一个Schema。对于不同 的索引，我们可以应用不同的扩展性和可用性的配置参数。这些参数包括分片的个数、复制因子等。
```


##### 类型 （type）

```
    Elaticsearch 类型是逻辑上具有相同格式的文档集合。类型可以和数据库中表的概念类比。类型属于某个索引，属于某一个类型的文档具有相同的字段和数据类型。类型通常表示的是一些实体对象。我们可以强制同一个类型的文档使用相同的数据类型。同一类型的文档逻辑上具有相似性，描述同一个实体对象

```

##### 文档（document）
```
    Elasticsearch 的文档是对所描述的实体对象的具体实例化。从某种意义上说，它可以和关系型数据库中的行进行对于。在不同的语言中，它与不同的术语相关。

```

##### 字段(field)
```
    Elasticsearch 的文档包含了已Json的键值对方式组织的多个字段，字段可以是对象类型、数组类型或者核心数据类型。类型与表对应，文档与行对应，字段与列对应。字段的值也就自然地与表中的某行某列的数据单元对应
```

##### 节点(node)

```
    单个elsasticsearch 服务实例称为node 

```



#### Elasticsearch 的CRUD (增删改查)


* 创建文档
    在索引添加一个新的文档

```
    curl -XPUT  http://..../{  'firstname': '' }

 ```

 * 获取文档
    获取索引中的文档

```
 curl -XGET http://.....

 {
     '_index' : '',
     '_type' : '',
     '_id': '',
     '_version': '',
     'found': '',
     '_source':{
         ''
     }
 }

```
* 更新文档

    如果要更新Elasticsearch中的文档，可以使用和创建文档完全相同的命令。Elastisearch 会简单的使用新的文档覆盖原有的文档。在Elasticsearch 底层，文档是不可变的。因此更新文档只是模拟了获取-修改-更新的锅铲。文档每次更新，元数据中的_version 版本号都会递增。

```
    curl -XPOST http:// /_update?pretty -d '{
        'doc' :{
            'experience': 8
            
            }
    }'

```


* 删除文档

```
 curl -XDELETE http://.../1{id} 


 ```

 * 创建索引
  如果只是想创建一个空索引，就可以在http put 请求中指定索引的名称

```
curl -XPUT http :// /hrms?pretty

```


#### 映射

```
我们在Elasticsearch 中 索引了一个新的文档。需要注意的是，在数据被索引到Elasticsearch 之前，我们没有显式 地指定字段的类型，当是它仍然成功的写入Elasticsearch

```
```
 curl -XGET http://   /_mapping?
```


#### 数据类型

Elasticsearch 支持大多数的核心数据类型
* string
* byte short int long
* float double
* boolean
* date

> 支持 数据、内嵌对象、ipv4、地理信息坐标点、地理信息形状类型



#### 创建映射

``` 
可以通过PUT请求来添加、修改映射

curl -XPUT http://....com /_mapping -d '{
    "properties": {
        'name':{
            'type':'string'
        }
    }
}'

```
#### 索引模板

```
    索引模板可以根据索引的名称匹配索引。当新曾经的索引满足对应的索引名称匹配原则。它会自动应用索引模板中定义的类型映射


    curl -XPUT http:// -d  '{
        "template" : '',
        "mapping": {
            ''
        }
     }'
```



##### 查询数据
1. 使用各种查询类型 (简单的词项查询,短语查询,范围查询,布尔查询,模糊查询,区间查询,通配符查询,空间查询)
2. 组合简单查询构建复杂查询
3. 文档过滤,在不影响评分的前提下抛弃哪些不满足特定查询条件的文档
4. 查找与特定文档相似的文档
5. 查找特定短语的查询建议与拼写检查
6. 使用切面构建动态导航和计算各种统计量
7. 使用预搜索并查找与指定文档匹配的query集合





##### 倒序索引

```
    被用来存储在全文搜索下某个单词在一个文档或者一组文档中的存储位置的映射


```


#### es 配置

1. cluster.name: kevin 配置es 的集群名称
2. node.name :  配置es 节点名称
3. node.master: true 是否为master 节点
4. node.data: true 指定该节点是否存储索引数据
5. index.number_of_shards : 5 设置默认索引分片个数
6. index.number_of_replicas 设置默认索引副本个数
7. path.data:  xxx/xxx 设置索引数据存储路径
8. path.logs: xxx/xxx 设置日志文件存储路径
9. bootstrap.mlockall: true 设置为true 来锁住内存.因为jvm开始swapping时es 的效率会降低,所以要保证它不swap,可以把ES_MIN_MEM和ES_MAX_MEM两个环境变量设置为同一个值,并且保证机器有足够的内存分配给es
10. network.host: 192.168.0.1 设置绑定的ip地址 默认0.0.0.0(全部访问)
11. http.port: 9200 设置对外服务的http端口
12. transport.tcp.port : 9300 设置节点间的tcp端口也是Java api 使用的端口
13. transport.tcp.compress: true 是否压缩tcp传输 默认不压缩
14. http.max_content_length: 100mb 设置内容的最大容量
15. http.cors.enabled:false 是否使用http 协议对外提供服务 默认为true
16. discover.zen.minimum_master_nodes:1 设置这个参数来保证集群中的节点知道其他n个有master资格的节点
17. dicover.zen.ping.timeout: 设置集群中自动发现其他节点时ping
连接超时时间
18. discover.zen.ping.multicast.enabled:false 设置是否打开多播发现节点
19. discover.zen.ping.unicast.hosts:[] [] [] 设置集群中master 节点的初始列表 
20. script.engine.groovy.inline.update:on 开启groovy  脚本支持,inline 表示脚本的来源为内嵌式




