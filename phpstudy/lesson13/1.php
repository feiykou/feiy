<?php
/*
 * select  
 *    语法：select 字段 from 表名 [where 条件];
 *    * 代表全部字段
 *    
 *    1、查询指定字段的值：select `name` from `stu`; 返回指定字段的值
 *    
 *    2、排序 order by 字段      //倒序|正序
 *      select * from `stu` order by score desc|asc;
 *      
 *    3、限制条数 limit
 *      select * from `stu` limit 0,3; //0可以省略，直接写3
 *      0->开始位置    3->查询条数
 *      
 *    4、统计查询
 *      查询出成绩最好的同学
 *      1）max 最大 
 *        select max(score) as '分数' from stu; //分数是别名
 *      2）min 最小
 *        select min(score) as '分数' from stu; //分数是别名
 *      3）count 统计个数
 *        select count(*) from stu;
 *      4）sum 求和
 *        select sum(score) from stu;
 *      5）avg 平均数  
 *        select avg(score) from stu;
 *      
 *      5、子查询：用的非常多
 *        1）where:把内层的结果返回给外层使用
 *        找出成绩最好的同学信息
 *        select * from stu order by score desc limit 1;//有缺陷，只能获取一个
 *        //where型的子查询，把查询结果当作条件
 *        select * from stu where score = (select max(score) from stu);
 *        
 *        找出成绩小于90并且是女生
 *        select * from stu where score<90 and sex="女";
 *        
 *        2）exists:子查询就是对外层表进行循环，再对内表进行内层查询 返回值是false或者true
 *        找出已经工作了的学生信息
 *        select * from stu s1 where exists (select * from stu_work s2 where s1.id = s2.sid);
 *        
 *        3）from 把内层的结果返回给外层再进行查询，返回结果
 *        select * from (select * from stu where score < 90) as stu1 where sex="女";
 *        select * from stu where score<90 and sex="女";
 *        
 *        
 *       6、连接查询---左连接和右连接用的比较多，inner不怎么用
 *        1）左表 left join 右表 --- 进行左连接查询的时候，不管右表有没有符合条件的数据，左表的数据统统返回
 *         select * form stu_work left join stu on stu_work.sid = stu.id;
 *        2）右连接-right join
 *        
 *        left join,right join,full join的特殊性，不管on上的条件是否为真都会返回left或right表中的记录，full则具有left和right的特性的并集。 而inner jion没这个特殊性，则条件放在on中和where中，返回的结果集是相同的
 *         在使用left join时，on和where条件的区别如下：
           1、 on条件是在生成临时表时使用的条件，它不管on中的条件是否为真，都会返回左边表中的记录。
           2、where条件是在临时表生成好后，再对临时表进行过滤的条件。这时已经没有left join的含义（必须返回左边表的记录）了，条件不为真的就全部过滤掉。
            
            //%  统配所有
            select * from stu where name LIKE '%张%';
            
            
 */

















