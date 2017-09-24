<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/1
 * Time: 16:26
 */
session_start();
include "../config/inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微博</title>
    <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../public/css/a.css">
    <script src="../public/bootstrap/js/bootstrap.js"></script>
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
                <div class="panel-heading" style="background-color: #369;color:#fff;">我的收藏</div>
                <div class="panel-body">
                    <?php
                    $sql = "select * from mr_collect where user_id={$_SESSION['id']}";
                    $result = $pdo->query($sql);
                    while($row = $result->fetch(PDO::FETCH_ASSOC)):
                        ?>
                        <div class="panel panel-default">
                            <a href="fmanager.php?id=<?php $sql1="select * from mr_post where id={$row['post_id']}";
 $re=$pdo->query($sql1);
 $row2=$re->fetch(PDO::FETCH_ASSOC);
                            echo $row2['user_id']?>" style="text-decoration:none;" >
                                <div class="panel-body">
                                    <?php
                                    echo $row2['content'];
                                    ?>
                            </a>
                                </div>

                        </div>
                        <?php
                    endwhile;
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>