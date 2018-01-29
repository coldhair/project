<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/1/29
 * Time: 15:35
 */

/**
 * @param $tag
 * @return string
 */
//header("Content-type:text/html,charset=UTF-8");
//先定义一个打印标题的小函数
function createHtmlTag($tag = "")
{
    echo "<h1>$tag</h1>";
}

createHtmlTag("JSON和Serialize对比");
//先定义一个数组
$member= array('username','age');
//打印一下数组
var_dump($member);
//转化为json格式
$jsonObj=json_encode($member);
//转化为serialize格式
$serialize=serialize($member);

//打印出来对比一下
createHtmlTag($jsonObj);
createHtmlTag($serialize);