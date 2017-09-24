<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/26
 * Time: 20:25
 */
session_start();
include "../config/inc.php";
if(isset($_POST['submit'])){
    $pid = $_POST['pid'];
    $username = $_SESSION['username'];
    $comment_id = $_SESSION['id'];
    $content = $_POST['comment'];
    $time = time();
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $sql = "insert into mr_post(content,add_time,username,user_id,post_type,comment_user_id,pid)values(?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $content);
    $stmt->bindValue(2, $time);
    $stmt->bindValue(3, $username);
    $stmt->bindValue(4, $comment_id);
    $stmt->bindValue(5, 1);
    $stmt->bindValue(6, $comment_id);
    $stmt->bindValue(7, $pid);
    $res = $stmt->execute();
    /*if($stmt->rowCount()) {
    }*/
}