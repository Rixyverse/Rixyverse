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
function getUserData($nameid){
    global $db;
    $query2 = $db->prepare("SELECT * FROM `users` WHERE `nameid`=:nameid");
    $query2->execute([
        'nameid' => $nameid
    ]);
    $result = $query2->fetch();
    return $result;
}

?>

