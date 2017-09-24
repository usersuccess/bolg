<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 10:34
 */
session_start();
include "../config/inc.php";
try{
    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = md5(trim($_POST['password']));
        $qq = trim($_POST['QQ']);
        $pic = trim($_POST['file']);

        $sql1 = "select * from mr_user where id={$_SESSION['id']}";
        $res = $pdo->query($sql1);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        if($_POST['password']==""){
            $password = $row['password'];
        }
        if($pic==''){
            $pic = $row['touxiang'];
        }
        $sql = "update mr_user set username=?,password=?,qq=?,touxiang=? where id={$_SESSION['id']}";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);
        $stmt->bindValue(3, $qq);
        $stmt->bindValue(4, $pic);
        $stmt->execute();
        header("location:manager.php");
    }
}catch(Exception $e){
    echo $e->getMessage();
}