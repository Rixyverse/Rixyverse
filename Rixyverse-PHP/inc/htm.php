<?php
//this file contains some functions that are used by rixyverse
//also the code is bad
require_once("tok_gen.php");
require_once("connect.php");
function login($id){
    global $db;
    $token = password_generator(20);
    $query = $db->prepare("INSERT INTO `tokens`(`token`, `linked_id`) VALUES (:token, :id)");
    $query->execute([
        "token" => $token,
        "id" => $id
    ]);
    $_SESSION['token'] = $token;
    header("Location: /");
}    
function getUserDataByNameID($nameid){
    global $db;
    $query = $db->prepare("SELECT * FROM `users` WHERE `nameid`=:nameid");
    $query->execute([
        'nameid' => $nameid
    ]);
    $result = $query->fetch();
    return $result;
}
function getUserDataByID($id){
    global $db;
    $query = $db->prepare("SELECT * FROM `users` WHERE `id`=:id");
    $query->execute([
        'id' => $id
    ]);
    $result = $query->fetch();
    return $result;
}
function getUserDataByToken($token){
    global $db;
    $query = $db->prepare("SELECT * FROM `tokens` WHERE `token`=:token");
    $query->execute([
        'token' => $token
    ]);
    $result = $query->fetch();
    $result2 = getUserDataByID($result['linked_id']);
    return $result2;
}
function getAvatar($id){
    $result = getUserDataByID($id);
    if(!$result['avatar_url']==""){
        $avatar = $result['avatar_url']; 
    }else{ 
        $avatar = "/assets/img/anonymous.png";
    }
    return $avatar;
}
?>

