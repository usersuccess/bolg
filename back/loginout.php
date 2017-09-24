<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 11:17
 */
session_start();
if(isset($_SESSION['username'])){
    session_destroy();
    setcookie(session_name(),'',1,'/');
    echo "<script>window.parent.location.href='login.php'</script>";
}