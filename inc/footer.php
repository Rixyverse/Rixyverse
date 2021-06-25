<?php
require_once("connect.php");
require_once("htm.php");
if(isset($_SESSION['token'])){
    $result = getUserDataByToken($_SESSION['token']);
}
?>
<div id="footer">
    <div id="footer-inner">
        <div id="link-container">
            <?php if(isset($_SESSION['token'])){ ?>
            <p><a href="/logout/">Logout</a></p>
            <?php } ?>
            <p id="copyright">You're at the end of the page, <strong><?php if(isset($_SESSION['token'])) {echo $result['nickname'];}else{echo "Guest";} ?></strong> !</p>
            <p id="copyright">Rixyverse is a nonprofit fan project based on assets from Nintendo and Hatena, and is not affiliated with either company.</p>
        </div>
    </div>
</div>