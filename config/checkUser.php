<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/26
 * Time: 17:24
 */
$user = $_GET['u'];
try{
    include "inc.php";
    $sql = "select * from mr_user where username=?";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(1,$user);
    $res = $stmt->execute();
    if($stmt->rowCount()){
        echo "用户名已存在";
    }else{
        echo "用户名可用";
    }
}catch(PDOException $e){
    echo $e->getMessage();
}