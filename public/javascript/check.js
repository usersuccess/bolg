/**
 * Created by Administrator on 2017/7/26.
 */
function checkUser(){
    var user = document.getElementById('username').value;
    var xmlHttp = null;
    if(window.XMLHttpRequest){
        xmlHttp = new XMLHttpRequest();
    }else{
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            document.getElementById('showUser').innerText = xmlHttp.responseText;
        }
    }
    xmlHttp.open('get','../config/checkUser.php?u='+user,true);
    xmlHttp.send();
}

function checkFile(){
    var form = document.getElementById('form1');
    var formData = new FormData(form);
    var xmlHttp = null;
    if(window.XMLHttpRequest){
        xmlHttp = new XMLHttpRequest();
    }else{
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            document.getElementById('showFile').innerHTML=xmlHttp.responseText;
            document.getElementById('file').value=xmlHttp.responseText;
        }
    }
    xmlHttp.open("post","../config/filedata.php",true);
    xmlHttp.send(formData);
}

function checkDel(id){
    if(window.confirm("确认删除吗?")){
        window.location='del.php?id='+id;
    }else{
        window.location='manager.php';
    }
}

function checkLogin(){
    var username=document.getElementById('username').value;//获取id对应的值
    var password=document.getElementById('password').value;
    if(username =="")
    {
        //alert('用户名不为空');
        document.getElementById('username').value='用户名不为空';
        document.getElementById('username').select();//取得焦点，还可以用select
        return false;
    }
    if(password =="")
    {
        //alert('密码不为空');
        document.getElementById('password').value='用户名密码不为空';
        document.getElementById('password').select();
        return false;
    }
    //return true;
}

function Follow(){
    var user_id = document.getElementById('user_id').value;
    var post_id = document.getElementById('post_id').value;
    var xmlHttp = null;
    if(window.XMLHttpRequest){
        xmlHttp = new XMLHttpRequest();
    }else{
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            document.getElementById('follow').innerText = xmlHttp.responseText;
        }
    }
    xmlHttp.open('get','../config/follow.php?u_id='+user_id+'&p_id='+post_id,true);
    xmlHttp.send();
}
function collect(){

    var user_id = document.getElementById('user_id').value;
    var post_id = document.getElementById('post_id').value;
    var xmlHttp = null;
    if(window.XMLHttpRequest){
        xmlHttp = new XMLHttpRequest();
    }else{
        xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
    }
    xmlHttp.onreadystatechange = function(){
        if(xmlHttp.readyState==4 && xmlHttp.status==200){
            document.getElementById('collect').innerText = xmlHttp.responseText;
        }
    }
    xmlHttp.open('get','../config/collect.php?u_id='+user_id+'&p_id='+post_id,true);
    xmlHttp.send();
}