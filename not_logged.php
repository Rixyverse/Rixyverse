<?php
$title = "Not logged in !";
require_once("inc/connect.php");
require_once("inc/header.php");
?>
<div class="main-body">
    <div class="warning-content warning-content-forward">
        <div>
            <strong>Welcome to Rixyverse!</strong>
            <p>You must be logged in to access this page.</p>
            <a class="button" href="/login/">Sign In</a>
        </div>
    </div>
</div>
<?php require_once("inc/footer.php") ?>
