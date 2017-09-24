<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 10:46
 */
include 'Upload.php';
try{
    $file=new UploadFile($_FILES['upfile']);
    $file->save();
}catch(Exception $e){
    echo $e->getMessage();
}