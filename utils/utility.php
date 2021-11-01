<?php

function getGet($key){
    $value = '';
    if(isset($_GET[$key])){
        $value = $_GET[$key];
        $value = fixSqlInjection($value);
    }
    return trim($value);
}
function getPOST($key){
    $value = '';
    if(isset($_POST[$key])){
        $value = $_POST[$key];
        $value = fixSqlInjection($value);
    }
    return trim($value);
}
function getRequest($key){
    $value = '';
    if(isset($_REQUEST[$key])){
        $value = $_REQUEST[$key];
        $value = fixSqlInjection($value);
    }
    return trim($value);
}
function getCookie($key){
    $value = '';
    if(isset($_COOKIE[$key])){
        $value = $_COOKIE[$key];
        $value = fixSqlInjection($value);
    }
    return trim($value);
}
function fixSqlInjection($sql){
    $sql = str_replace('\\','\\\\',$sql);
    $sql = str_replace('\'','\\\'',$sql);
    return $sql;
}
function getToken(){
    if(isset($_SESSION['user'])){
        return $_SESSION['user'];
    }
    $token = getCookie('token');
    $sql = "select * from token where token = '$token'";
    $item = executeResult($sql,true);
    if($item!=null){
        $userId = $item['user_id'];
        $sql = " select * from user where id = '$userId'";
        $item = executeResult($sql,true);
        if($item !=null){
            $_SESSION['user'] = $item;
            return $item;
        }
    }
    return null;
}