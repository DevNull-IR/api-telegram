<?php 
header('Content-Type: application/json');
@$token = $_GET['token'];
@$method = $_GET['method'];
/**
* @Pre_Code
* @dev_null_project
* @dev_null
*/
function bot($method,$datas=[]){
    global $token;
    $url = "https://api.telegram.org/bot".$token."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
echo json_encode(bot("$method",unserialize($_GET['data'])),448);
