<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 21:28
 */
include "../config/inc.php";
$id = $_GET['id'];
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$sql = "delete from mr_post where post_type=0 and id={$id}";
$pdo->query($sql);
header("location:manager.php");