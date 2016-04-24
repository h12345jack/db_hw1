##作业说明：
>	第一次写PHP的时候写的作业，也是成长的过程，在这个作业中，写过了AJAX，也用过了JQuery的表单验证。
>	

####一.	首先导入cwgdb.sql文件，将数据导入数据库中。
####二.	添加一个用户
	
	CREATE USER 'phpcourse1'@'localhost' IDENTIFIED BY 'phpcourse';
	GRANT all ON cwgdb.* TO 'phpcourse1'@'localhost';

建立了一个用户phpcourse1，设置密码为phpcourse ,授予权限cwgdb的全部权限。
这里需要指出的是在实际的系统中，应该更多的考虑权限管理的问题，对于一般的查询，只应该赋予查询的权限，并且建立视图。而在用户登录也应该对不同的用户赋予不同的权限，设置有rank字段，由于时间关系并没有实现接口去做这一块。
####三.	文件夹下的index.php为入口
####四.	bootstrap与JQuery，
####为了实现ajax提交，使用了JQuery框架,设计响应式的界面，使用了bootstrap框架。

###五.	作业结构说明
在打包的作业中，

![](http://ww3.sinaimg.cn/mw690/8785ef6ejw1f37pyaxx4wj20q0061myo.jpg)

图 1文件结构

![](http://ww2.sinaimg.cn/mw690/8785ef6ejw1f37pynvxt4j20z7090tbn.jpg)

图 2function目录文件说明

其中对于在function中以class为后缀的php文件是我将必要的功能封装为一个类，方便文章的调用。
而在pages中，将nav.php和footer.php作为模板加载在每一个Php页面中，减少了页面的代码逻辑结构上的冗余。
页面展示
 
![](http://ww4.sinaimg.cn/mw690/8785ef6ejw1f37pz2e4imj21400p0qgw.jpg)

图 3检索前端主页

![](http://ww3.sinaimg.cn/mw690/8785ef6ejw1f37pzdt76sj21400lr41v.jpg)
 
图 4检索前段主页续

![](http://ww4.sinaimg.cn/mw690/8785ef6ejw1f37pzuatj8j21gs0jddla.jpg)

 图 5检索结果页面（高亮）

 ![](http://ww2.sinaimg.cn/mw690/8785ef6ejw1f37q03jd10j20z70i7ab8.jpg)
 
图 6用户登录页面，用户名为root，密码为admin(默认值)
 
![](http://ww3.sinaimg.cn/mw690/8785ef6ejw1f37q0ed7q8j20z70j2425.jpg)

图 7后台管理主页面
 
![](http://ww4.sinaimg.cn/mw690/8785ef6ejw1f37q0nvphyj20v10hkwhd.jpg)

图 8文献管理的表格
 
![](http://ww4.sinaimg.cn/mw690/8785ef6ejw1f37q0uciivj20x20iswhd.jpg)

图 9用户管理页面

## 功能说明
###	检索功能
检索功能包括：全文检索、标题检索、作者检索，其中全文检索使用TF*IDF计算相关度排序，采用了停用词表，将常用的词语进行停掉。可以实现自然语言检索。
而在标题检索和作者检索为了更多的检索结果使用的Like语句。
###	文献管理
对于文献提供录入文献功能，后期会加入文献的删除，并且提供文献的去倒排档化和文献倒排档处理的功能。另外在文献录入的时候，因为在数据库中设置dno为主键，而如果文中出现了dno，那么将会不能录入，这里是用程序实现了实体完整性，使用的Ajax，不用刷新页面，用户体验更加友好。
###	用户管理
用户管理主要包括用户的新增，这里如果用户输入了不一样的密码将会进行验证。
在用户管理的表中还有字段包括rank，想要实现对于用户的权限进行管理，限于时间关系，只是设计了模式，而没有具体实现。


![](http://ww4.sinaimg.cn/large/8785ef6ejw1f37q2ka28jj20pg0domz3.jpg)

 
图 10数据库结构

####	一.	用户表
用户表的字段包括用户名username、password、rank、uno四个字段，密码使用md5()函数转为字符串进行存储，并不能使用明码存储。另外还有一个用户权限字段，对于用户进行等级分类。以uno为用户表的主键
####	二.	倒排词表
倒排词表包括字段为word(记录单词)、dno(出现文献编号，外键为dno)、number(出现次数)。这里没有使用稀疏矩阵的倒排档，但是也能够实现TF*IDF的运算
####	三.	文献表
文献表在老师的基础上增加了主键，索引，和是否被倒排档处理字段。其主要的属性包括dno文献编号(主键)、title标题、full_text(fulltext是mysql保留字，因此该名为full_text减少错误，建立索引加快查询速度，如果不切词的话，直接进行like查询也是可以的)、is_wordle(是否被倒排档处理，默认为0,如果被处理后，将被设置为1).

###	拓展功能与实现
拓展功能主要体现在Ajax保证实体完整性和用户的验证。例如左图中如果存在了编号1的文献，将不被录入，这里可以通过数据库的查询保证实体完整性。
而在表单验证的时候，也可以对于用户是否输入了正确的用户名和密码进行验证。另外在用户登录后，应该对于用户的Id，rank用session进行存储，这样可以实现对于用户的记录，甚至可以对于用的操作记录logs，然后有利于对于用户进行分析。
本系统只是西文检索系统的大纲性尝试，还存在许多的问题，对于数据库系统的理解还需要加深。另外对于功能上还存在细节上优化的问题。

 
