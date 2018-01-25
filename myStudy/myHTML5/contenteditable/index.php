<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Contenteditable</title>
    <script>
function myFunction() {
    var xr= new XMLHttpRequest();
    var url= "saveText.php";
    var text= document.getElementById("myDiv").innerHTML;
    var vars = "newText="+text;

    xr.open("POST",url,true);
    xr.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xr.send(vars);
}
     </script>
</head>
<body>
<h1>可编辑内容保存演示</h1>
<div id="myDiv" contenteditable="true" onblur="myFunction()">
    <?php include("myText.txt");  ?>
</div>

</body>
</html>