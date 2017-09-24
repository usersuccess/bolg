<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 14:09
 */
session_start();
include "../config/inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>写文章</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../public/css/a.css">
    <script src="../public/bootstrap/js/bootstrap.js"></script>
    <script src="../public/javascript/check.js"></script>
    <link rel="stylesheet" href="../public/kindeditor/themes/default/default.css" />
    <link rel="stylesheet" href="../public/kindeditor/plugins/code/prettify.css" />
    <script charset="utf-8" src="../public/kindeditor/kindeditor.js"></script>
    <script charset="utf-8" src="../public/kindeditor/lang/zh_CN.js"></script>
    <script charset="utf-8" src="../public/kindeditor/plugins/code/prettify.js"></script>
    <script>
        KindEditor.ready(function(K) {
            var editor1 = K.create('textarea[name="content"]', {
                cssPath : '../plugins/code/prettify.css',
                uploadJson : '../php/upload_json.php',
                fileManagerJson : '../php/file_manager_json.php',
                allowFileManager : true,
                afterCreate : function() {
                    var self = this;
                    K.ctrl(document, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                    K.ctrl(self.edit.doc, 13, function() {
                        self.sync();
                        K('form[name=example]')[0].submit();
                    });
                }
            });
            prettyPrint();
        });
    </script>
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
<div class="panel panel-default">
    <div class="panel-body"  >
        <form action="add_post.php" method="post">
            <div class="form-group" >
                <label class="control-label"></label>
                <textarea name="content" id="content" class="form-control" style="width:100%;height:300px" ></textarea>
            </div>
            <br>
            <div style="text-align:center">
                <input type="submit" name="submit" value="发表" required class="btn btn-info btn-sm form-control" style="width:300px">
            </div>
        </form>
    </div>
</div>
<div id="show" class="panel panel-default" style="display:none">
    <div class="panel-body">
        <span id="error" style="color:#f00;"></span>
    </div>
</div>
            </div>
        </div>
    </div>

</body>
</html>

