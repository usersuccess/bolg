<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 10:29
 */
class UploadFile{
    public $fileName;
    public $dir='upload';
    public $fileSize="2048000";
    public $fileType=array('jpg','png','gif');
    public $newFileName;
    private $upFileType;
    public function __construct($filename)
    {
        if(empty($filename)){
            throw new Exception('没有上传文件');
        }else{
            $this->fileName = $filename;
        }
        $this->IsError();
    }

    public function IsError(){
        if($this->fileName['error']>0){
            switch ($this->fileName['error']){
                case 1:
                    throw new Exception("文件大小超过2m!");
                    break;
                case 2:
                    throw new Exception("超出系统指定值!");
                    break;
                case 3:
                    throw new Exception("文件只有部分被上传!");
                    break;
                case 4:
                    throw new Exception("没有文件被上传!");
                    break;
            }
        }
    }

    public function IsDirCreate(){
        if(!is_dir($this->dir)){
            mkdir($this->dir,0777,true);
        }
    }

    public function IsFileSize(){
        if($this->fileName['size']>$this->fileSize){
            throw new Exception('该文件大小超出指定大小!');
        }
    }

    public function IsFileType(){
        $typeArr = explode(".", $this->fileName['name']);
        $this->upFileType = array_pop($typeArr);
        if(!in_array($this->upFileType, $this->fileType)){
            throw new Exception("不支持的文件格式!");
        }
    }

    public function CreateFileName(){
        $this->newFileName = md5(time()).".".$this->upFileType;

    }

    public function save(){
        $this->IsDirCreate();
        $this->IsFileSize();
        $this->IsFileType();
        $this->CreateFileName();
        if(is_uploaded_file($this->fileName['tmp_name'])){
            if(move_uploaded_file($this->fileName['tmp_name'],$this->dir."/".$this->newFileName)){
                echo $this->newFileName;
            }else{
                echo "文件上传失败";
            }
        }
    }
}