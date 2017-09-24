<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/30
 * Time: 13:13
 */
include "../config/inc.php";
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sql="insert into mr_collect (user_id,post_id,status)values(?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(1, $username);
$stmt->bindValue(2, $password);
$stmt->bindValue(3, $reg_time);
$res = $stmt->execute();