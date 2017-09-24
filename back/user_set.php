<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 10:04
 */
session_start();
include "../config/inc.php";
$sql = "select * from mr_user where id={$_SESSION['id']}";
$result = $pdo->query($sql);
$row = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人博客</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../public/css/a.css">
    <script src="../public/bootstrap/js/bootstrap.js"></script>
    <script src="../public/javascript/check.js"></script>
    <style type="text/css">
        body{background-color: #eee;}
    </style>
</head>
<body>
<div style="background:#eee;width:1000px;text-align: center;margin:10px auto;" >
    <div style="align:center;color:#fff">
        <a href="index.php">
            <img src="<?php
            $sql = "select * from mr_user where id={$_SESSION['id']}";
            $res = $pdo->query($sql);
            $row = $res->fetch(PDO::FETCH_ASSOC);
            echo "../config/upload/".$row['touxiang'];
            ?>" class="img-circle" width="60px" height="60px">
            <b><h1><?php echo $_SESSION['username'] ?></h1></b>
        </a>
    </div>
</div>
<div class="container" style="width:1000px;margin:10px auto;">
    <div class="row" >
        <div class="col-xs-2 " >
            <div class="list-group" >
                <a href="index.php"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-menu-hamburger" style="margin-left:10px"></span>&nbsp;&nbsp;首页</a>
                <a href="add.php"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-pencil" style="margin-left:10px"></span>&nbsp;&nbsp;写文章</a>
                <a href="manager.php"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-comment" style="margin-left:10px"></span>&nbsp;&nbsp;我的动态</a>
                <a href="follow.php"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-heart" style="margin-left:10px"></span>&nbsp;&nbsp;我的好友</a>
                <a href="myCollect.php"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-cog" style="margin-left:10px"></span>&nbsp;&nbsp;我的收藏</a>
                <a href="user_set.php"  class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-cog" style="margin-left:10px"></span>&nbsp;&nbsp;设置</a>
                <a href="loginout.php" class="list-group-item" style="height:50px;">
                    <span class="glyphicon glyphicon-log-out" style="margin-left:10px"></span>&nbsp;&nbsp;退出系统</a>
            </div>
        </div>
        <div class="col-xs-10" >
            <div  class="panel panel-default" >
                <form action="userset_post.php" id="form1" method="post" class="panel-body" >
                    <div class="form-group" >
                        <label class="control-label">用户名&nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp;&nbsp;<span id="showUser"></span>
                        <input type="text" value="<?php echo $row['username'] ?>" name="username" id="username" class="form-control" style="width:250px" placeholder="用户名" onkeyup="checkUser()" autocomplete="off" required oninvalid="setCustomValidity('不能为空')" oninput="setCustomValidity('')">
                    </div>
                    <br>
                    <div class="form-group" >
                        <label class="control-label">密码&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="password" name="password" id="password" class="form-control" style="width:250px" placeholder="密码" autocomplete="off" >
                    </div>
                    <br>
                    <div class="form-group" >
                        <label class="control-label">QQ&nbsp;&nbsp;&nbsp;&nbsp;</label>
                        <input type="text" value="<?php echo $row['qq'] ?>" name="QQ" id="QQ" class="form-control" style="width:250px" placeholder="QQ" autocomplete="off" required oninvalid="setCustomValidity('不能为空')" oninput="setCustomValidity('')"><!--自带的表单验证-->
                    </div>
                    <br>
                    <div class="form-group">
                        <span style="float:left">上传头像:</span><input type="file" name="upfile" id="upfile" onchange="checkFile()" style="float:left"><span id="showFile"></span>
                        <input type="hidden" name="file" id="file" value="">
                    </div>
                    <br>
                    <div class="form-group" >
                        <input type="submit" name="submit" value="保存修改" class="btn btn-info btn-sm form-control" style="width:250px" >
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>