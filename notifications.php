<?php
require_once("inc/connect.php");
if(!isset($_SESSION['token'])){
    exit(require_once("not_logged.php"));
}
$title = "Notifications";
require_once("inc/header.php");
require_once("inc/htm.php");
?>
<body>
    <div class="no-content">
            <p>The notification page is not ready for now.Why you don't try other features?</p>
    </div>
</body>
<?php require_once("inc/footer.php") ?>