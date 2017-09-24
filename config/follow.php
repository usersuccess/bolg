<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/1
 * Time: 9:48
 */
$user_id = $_GET['u_id'];
$post_id = $_GET['p_id'];
$time=date('Y-m-d H:i:s',time());
try{
    include "inc.php";
    $sql = "select * from mr_friend where user_id=? and friend_id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1, $user_id);
    $stmt->bindValue(2, $post_id);
    $stmt->execute();
    if ($stmt->rowCount()){
        $sql = "delete from mr_friend where user_id=? and friend_id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $user_id);
        $stmt->bindValue(2, $post_id);
        $stmt->execute();
        echo "关注";
    }else{
        $sql = "insert into mr_friend(user_id,friend_id,guanzhu_time) VALUES (?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1,$user_id);
        $stmt->bindValue(2,$post_id);
        $stmt->bindValue(3,$time);
        $stmt->execute();
        echo "取消关注";
    }
}catch(PDOException $e){
   echo $e->getMessage();
}