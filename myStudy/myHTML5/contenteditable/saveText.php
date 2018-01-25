<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2018/1/25
 * Time: 16:08
 */
$myFile=fopen("myText.txt","w");
$text= $_POST['newText'];
fwrite($myFile,$text);
fclose($myFile);

