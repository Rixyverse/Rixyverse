<?php
global $isMe;
global $nameid;
require_once("connect.php");
require_once("htm.php");
if($isMe){
    $result2 = getUserDataByToken($_SESSION['token']);
}else{
    $result2 = getUserDataByNameID($nameid);
}
?>
<div id="container">
<div id="main-body" class="profile-top">
    <div id="sidebar" class="user-sidebar profile-top">
        <div class="sidebar-container">
            <div id="sidebar-profile-body">
                    <?php if($result2['level'] >= 1){ ?>
                    <div class="icon-container official-user"><img src="/assets/img/official-user.png" class="official-tag">
                        <a href="/users/<?php echo $result2['nameid'] ?>"><img src="<?php echo getAvatar($result2['id']) ?>" alt="<?php echo $result2['nickname'] ?>" class="icon"></a>
                    </div>
                    <?php }else{ ?>
                    <div class="icon-container">
                        <a href="/users/<?php echo $result2['nameid'] ?>"><img src="<?php echo getAvatar($result2['id']) ?>" alt="<?php echo $result2['nickname'] ?>" class="icon"></a>
                    </div>
                    <?php } ?>
                <a href="/users/<?php echo $result2['nameid'] ?>" class="nick-name"><?php echo $result2['nickname'] ?></a>
                <p class="id-name"><?php echo $result2['nameid'] ?></p>
            </div>
        </div>
        <div class="sidebar-container sidebar-profile">
            <?php if($result2['description']){ ?>
                <div class="profile-comment">
                    <p><?php echo $result2['description'] ?></p>
                </div>
            <?php } ?>
            <div class="user-data">
                <div class="data-content">
                    <h4><span>ID</span></h4>
                    <div class="note">#<?php echo $result2['id'] ?></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
