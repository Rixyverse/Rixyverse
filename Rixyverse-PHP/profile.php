<?php
require_once("inc/htm.php");
if (isset($_GET['id']) && !$_GET['id']=="") {
    $result2 = getUserDataByNameID($_GET['id']);
}
if (isset($_GET['id'])) {
    if(is_null($result2['id'])){
        die(require_once("404.php"));
    }
}else{
    die(require_once("404.php"));
}
$check = getUserDataByToken($_SESSION['token']);
if($check['id'] == $result2['id']){
    $title = "Your profile";
    $isMe = true;
}else{
    $isMe = false;
    $nameid = $_GET['id'];
    $title = $result2['nickname'];
}
require_once("inc/header.php");
require_once("inc/user-sidebar.php");
?>
<?php require_once("inc/footer.php"); ?>