<?php
require_once("inc/connect.php");
$title = "All Communities";
require_once("inc/header.php");
if(isset($_SESSION['token'])){
    $isMe = true;
    require_once("inc/user-sidebar.php");
}
?>
<?php
if(!isset($_SESSION['token'])){?>
<body>
    <div id="container">
            <div id="main-body" class="guest-top">
<?php } ?>
                <div class="main-column">
                    <div class="post-list-outline">
                        <div class="body-content" id="community-top">
                            <h2 class="label">All Communities</h2>
                            <ul class="list community-list">
                                <?php
                                $query = $db->prepare("SELECT * FROM `titles`");
                                $query->execute();
                                $result2 = $query->fetchAll();
                                if(empty($result2)){?>
                                        <h2 class="community-title">No communities have been created yet.</h2>
                                <?php }
                                foreach($result2 as $title){ ?>
                                    <li class="trigger">
                                        <div class="community-list-body">
                                            <span class="icon-container">
                                                <img src="<?php echo $title['iconurl'] ?>" class="icon">
                                            </span>
                                            <div class="body">
                                                <a class="title" href="/titles/<?php echo $title['id'] ?>"><?php echo $title['name'] ?></a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
</div>
<?php require_once("inc/footer.php"); ?>