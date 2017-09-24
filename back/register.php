<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 15:16
 */
include "../config/inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.css">
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
    <script src="../public/bootstrap/jquery.min.js"></script>
    <script src="../public/javascript/check.js"></script>
    <style type="text/css">
        body{background-color: #eee;}
    </style>
</head>
<body>
<div  style="width:300px;margin:150px auto;" class="panel panel-default" >
    <div class="panel-heading"><b>注册</b><a href="login.php" style="float:right" class="btn btn-default btn-xs">登录</a></div>
    <form action="register_post.php" method="post" class="panel-body" >
        <div class="input-group input-group-sm" >
            <label class="control-label">用户名&nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp;&nbsp;<span id="showUser"></span>
            <input type="text" name="username" id="username" class="form-control" style="width:250px" placeholder="用户名" onkeyup="checkUser()" autocomplete="off" required oninvalid="setCustomValidity('不能为空')" oninput="setCustomValidity('')">
        </div>
        <br>
        <div class="input-group input-group-sm" >
            <label class="control-label">密码&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="password" name="password" id="password" class="form-control" style="width:250px" placeholder="密码" autocomplete="off" required oninvalid="setCustomValidity('不能为空')" oninput="setCustomValidity('')">
        </div>
        <br>
        <div class="form-group" >
            <label class="control-label">性别&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <select name="sex" class="form-control" style="width:250px">
                <option value=0>保密</option>
                <option value=1>男</option>
                <option value=2>女</option>
            </select>
        </div>
        <div class="input-group input-group-sm" >
            <label class="control-label">QQ&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="QQ" id="QQ" class="form-control" style="width:250px" placeholder="QQ" autocomplete="off" required oninvalid="setCustomValidity('不能为空')" oninput="setCustomValidity('')">
        </div>
        <br>
        <div class="input-group input-group-sm" >
            <label class="control-label">邮箱&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" name="email" id="email" class="form-control" style="width:250px" placeholder="example@xx.com" autocomplete="off" required oninvalid="setCustomValidity('不能为空')" oninput="setCustomValidity('')">
        </div>
        <br>
        <div class="form-group" >
            <input type="submit" name="submit" value="注册" class="btn btn-info btn-sm form-control" style="width:250px" >
        </div>
    </form>
</div>
</body>
</html>

