<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 14:20
 */
session_start();
include "../config/inc.php";
if(isset($_POST['submit'])){
    if(($_SESSION['username'])==null){
        echo "<script>alert('长时间未操作，重新登录');window.parent.location.href='login.php'</script>";
    }
    if(!empty($_POST['content'])){
        $content = $_POST['content'];
        $content =  strip_tags($content);
        $username = $_SESSION['username'];
        $user_id = $_SESSION['id'];
        $time = time();

        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $sql = "insert into mr_post (content,add_time,username,user_id,post_type)values(?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $content);
        $stmt->bindValue(2, $time);
        $stmt->bindValue(3, $username);
        $stmt->bindValue(4, $user_id);
        $stmt->bindValue(5, 0);
        $res = $stmt->execute();
        if($stmt->rowCount()){
            header("location:manager.php");
        }else{
            echo "<script>alert('发表失败');window.location.href='add.php'</script>";
        }
    }else{
        header("location:add.php");
    }
    }
