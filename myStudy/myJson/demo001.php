<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/1/29
 * Time: 15:57
 */
//先声明两个数组，一个一维的，一个多维的
$array_1 = array();
$array_2 = array();

//赋值
$array_1['username']='coldhair';
$array_1['age']=35;

$array_2['member1']['useername']='coldhair';
$array_2['member1']['age']=35;
$array_2['member2']['username']='Paul';
$array_2['member2']['age']=26;

echo json_encode($array_1);
echo '<br/>';
echo json_encode($array_2);

//把JSON转化成数组
$json='{"member1":{"useername":"coldhair","age":35},"member2":{"username":"Paul","age":26}}';
$json2array=json_decode($json,true);//默认是false会转化为对象。
echo '<br/>';
var_dump($json2array);
echo '<br/>';
print_r($json2array);
