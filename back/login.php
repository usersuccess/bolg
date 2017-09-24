<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 17:07
 */
error_reporting(0);
session_start();//开启session
header('content-type:text/html;charset=utf8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户登录</title>
    <link rel="stylesheet"type="text/css"href="../public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css"href="../public/css/login.css"/>
    <script src="../public/bootstrap/js/bootstrap.min.js"></script>
   <script src="../public/javascript/check.js"></script>
  </head>
<body>
<div class="header" title="头部">
    <img src="../public/images/login_logo.png">
</div>
<!--  主体区域 -->
<div class="main">
    <div class="left">
        <div class="login-bg">
            <img src="../public/images/login_banner.png"style="margin-top: 25px">
        </div>
    </div>
    <div class="content">
        <!-- 用户输入区开始 -->
        <div class="panel-body">
            <form  action="" method="post" onsubmit="return checkLogin();">
                <div class="input-group input-group-sm">
                    <label class="glyphicon glyphicon-user input-group-addon" style="top:0px;"></label>

                    <input type="text"name="username"id="username"class="form-control" placeholder="用户名">
                </div>
                <br>
                <div class="input-group input-group-sm">
                    <label class="glyphicon glyphicon-lock input-group-addon" style="top:0px;"></label>
                    <input type="text"name="password"id="password"class="form-control" placeholder="密码">
                </div>
                <br>
                <div class="form-group">
                    <input type="submit"name="submit"id="submit"value="登录"class="btn btn-info btn-sm form-control">
                </div>

            </form>
        </div>
            <div class="panel-heading">
                <b>新用户?</b> <a href="register.php"><b>注册</b></a>
            </div>
        </div>
        <!-- 推荐输入区结束 -->

        <!-- 推荐用户开始 -->
        <div class="recommend">
            <div class="ui horizontal divider">
                <h4 class="ui teal">推荐用户</h4>
            </div>
            <div class="ui tiny images">
                <img class="ui medium circular image" src="../public/images/steve_01.png" >
                <img class="ui medium circular image" src="../public/images/steve_02.png">
                <img class="ui medium circular image" src="../public/images/steve_03.png">
                <img class="ui medium circular image" src="../public/images/steve_04.png">
                <img class="ui medium circular image" src="../public/images/steve_05.png">
                <img class="ui medium circular image" src="../public/images/steve_06.png">

            </div>
        </div>
        <!-- 推荐用户结束 -->
        </div>

</div>
<div class="clear"></div>
<div class="footer">
    江西农业大学——传习教育
    </div>
</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 21:03
 *
 */

if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));
    //$_SESSION['username'] = $username;
    include '../config/inc.php';
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "select * from mr_user where username=? and password =?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $username);
    $stmt->bindValue(2, $password);
    $res = $stmt->execute();
    if ($stmt->rowCount()) {
        //header('location:index.php');
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $rows['id'];
        header('location:jump.php');
    } else {
        echo "<script>alert('用户名或密码错误，请重新登录');location.href='login.php';</script>";
    }
}
