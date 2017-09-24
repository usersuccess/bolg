<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/26
 * Time: 20:06
 */
include 'comment.php';
$sql = "select * from mr_user where id={$_GET['user_id']}";
$res = $pdo->query($sql);
$row = $res->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微博</title>
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
        <a href="fmanager.php?id=<?php echo $_GET['user_id'] ?>">
            <img src="<?php
            echo "../config/upload/".$row['touxiang'];
            ?>" class="img-circle" width="60px" height="60px">
            <b><h1><?php echo $row['username'] ?></h1></b>
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
        <?php
        $sql = "select * from mr_post where user_id={$_GET['user_id']} and id={$_GET['id']}";
        $result = $pdo->query($sql);
        $row = $result->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="panel panel-default">
                <div class="panel-body">
                        <?php
                            echo $row['content'];
                        ?>
                </div>
                <div class="panel-footer">评论(<?php
                    $sql = "select * from mr_post where post_type=1 and pid={$_GET['id']} order by add_time desc ";
                    $result = $pdo->query($sql);
                    $rows = $result->fetchall(PDO::FETCH_ASSOC);
                    echo count($rows);
                    ?>)<div style="float:right"><?php echo date("Y-m-d H:i:s",$row['add_time']) ?></div></div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">发表评论</div>
                <div class="panel-body">
                <form action="" method="post">
                    <div class="form-group" >
                        <input type="text" name="comment" class="form-control" placeholder="说点什么..." required>
                        <input type="hidden" name="pid" value="<?php echo $_GET['id'] ?>">
                        <!--<input type="hidden" name="comment_num" value="<?php /*echo count($rows) */?>">-->
                    </div>
                    <div class="form-group" >
                        <button class="btn btn-default" name="submit" type="submit">评论</button>
                        </div>

                </form>
                    <div>
                        <?php

                        $sql = "select * from mr_collect where user_id=? and post_id=?";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(1,$_SESSION['id']);
                        $stmt->bindValue(2, $_GET['id']);
                        $stmt->execute();
                        if ($stmt->rowCount()){
                            echo "<button id='collect' class='btn btn-info btn-group-xs' onclick='collect()'>取消收藏</button>";
                        }else{
                            echo "<button id='collect' class='btn btn-info btn-group-xs' onclick='collect()'>收藏</button>";
                        }
                        ?>
                        <input type="hidden" id="user_id" value="<?php echo $_SESSION['id']?>">
                        <input type="hidden" id="post_id" value="<?php echo $_GET['id']?>">

                    </div>
                <?php
                $sql = "select * from mr_post where post_type=1 and pid={$_GET['id']} order by add_time desc ";
                $result = $pdo->query($sql);
                while($row = $result->fetch(PDO::FETCH_ASSOC)):
                    $sql1 = "select username from mr_user where id={$row['comment_user_id']}";
                    $result1 = $pdo->query($sql1);
                    $rows = $result1->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="panel panel-success">
                    <div class="panel-heading">
                    <?php echo $rows['username'].":" ?>
                        <div style="float:right"><?php echo date("Y-m-d H:i:s",$row['add_time']) ?></div>
                    </div>
                    <div class="panel-body">
                    <?php echo $row['content']?>
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
</div>
</body>
</html>