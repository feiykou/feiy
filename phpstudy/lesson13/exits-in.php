<?php

/*
 * select * from stu s1 where exists (select * from stu_work s2 where s1.id = s2.sid);
 * 这种执行过程可以通俗的理解为：将外查询表的每一行，代入内查询作为检验，如果内查询返回的结果取非空值，则exists子句返回true，这一行可作为外查询的结果行，否则不能作为结果。
        分析器会先看语句的第一个词，当它发现第一个词是select关键字的时候，它会跳到from关键字，然后通过from关键字找到表名并把表装入内存，接着是找where关键字，如果找不到则返回到select找字段解析，如果找到where，则分析其中的条件，完成后再回到select分析字段，最后形成一张虚表。
    where关键字后面的是条件表达式，条件表达式计算完成后，会有一个返回值，即非0或0，非0即为真(true)，0即为假(false)。如果为正则执行select语句，否则不执行select语句。
 * 
 * 
 * 
 *  exists与in的区别：
    1、in引导的子句只能返回一个字段，exists子句可以有多个字段；
    2、通常情况下采用exists要比in效率高，因为in不走索引，但要但要具体情况具体分析：in适合于外表大而内表小的情况；exists适合于外表小而内表大的情况。
 */





















