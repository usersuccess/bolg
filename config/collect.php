<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/1
 * Time: 9:48
 */
$user_id = $_GET['u_id'];
$post_id = $_GET['p_id'];

try{
    include "inc.php";
    $sql = "select * from mr_collect where user_id=? and post_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $user_id);
    $stmt->bindValue(2, $post_id);
    $stmt->execute();
    if ($stmt->rowCount()){
        $sql = "delete from mr_collect where user_id=? and post_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $user_id);
        $stmt->bindValue(2, $post_id);
        $stmt->execute();
        echo "收藏";
    }else{
        $sql = "insert into mr_collect(user_id,post_id) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$user_id);
        $stmt->bindValue(2,$post_id);
        $stmt->execute();
        echo "取消收藏";
    }
}catch(PDOException $e){
    echo $e->getMessage();
}