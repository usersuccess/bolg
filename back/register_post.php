<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 16:02
 */
include "../config/inc.php";
if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $password = md5(trim(($password)));
    $sex = $_POST['sex'];
    $qq = trim($_POST['QQ']);
    $email = trim($_POST['email']);
    $reg_time = time();

    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "select * from mr_user where username=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $username);
    $res = $stmt->execute();
    if ($stmt->rowCount()){
        echo "<script>alert('用户名已存在');window.location.href='register.php';</script>";
    }else{
        $sql1="insert into mr_user (username,password,reg_time,sex,qq,email)values(?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql1);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);
        $stmt->bindValue(3, $reg_time);
        $stmt->bindValue(4, $sex);
        $stmt->bindValue(5, $qq);
        $stmt->bindValue(6, $email);
        $res = $stmt->execute();
        if($stmt->rowCount()){
            header("location:login.php");
        }else{
            echo "<script>alert('注册失败!');window.location.href='register.php'</script>";
        }
    }
}