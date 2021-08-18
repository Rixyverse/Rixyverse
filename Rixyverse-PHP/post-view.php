<?php
require_once("inc/connect.php");
require_once("inc/htm.php");
if (isset($_GET['id'])) {
    $query = $db->prepare("SELECT * FROM `posts` WHERE `id`=:id");
    $query->execute([
        "id" => $_GET['id']
    ]);
    $result2 = $query->fetch();
}
if (isset($_GET['id'])) {
    if(is_null($result2['id'])){
        die(require_once("404.php"));
    }
}else{
    die(require_once("404.php"));
}
if(isset($_SESSION['token'])){
    $user = getUserDataByToken($_SESSION['token']);
}
$author = getUserDataByID($result2['author']);
$title = $author['nickname']."'s post";
require_once("inc/header.php");
$query2 = $db->prepare("SELECT * FROM `titles` WHERE `id`=".$result2['linkedtitleid']);
$query2->execute();
$result3 = $query2->fetch();
$yeah = getNumberOfYeahs($result2['id']);
$replies = getNumberOfReplies($result2['id']);
?>
<div id="main-body">
    <div class="main-column replyform-button">
        <div class="post-list-outline">
            <section id="post-content" class="post post-subtype-default">
                <header class="community-container">
                    <h1 class="community-container-heading">
                        <a href="/titles/<?php echo $result3['id'] ?>">
                            <img src="<?php echo $result3['iconurl'] ?>" class="community-icon">
                            <?php echo $result3['name'] ?>
                        </a>
                    </h1>
                </header>
                <div class="user-content">
                    <?php if($author['level'] >= 1){ ?>
                    <a class="icon-container official-user" href="/users/<?php echo $author['nameid'] ?>"><img src="/assets/img/official-user.png" class="official-tag"><img src="<?php echo getAvatar($author['id']) ?>" alt="<?php echo $author['nickname'] ?>" class="icon"></a>
                    <?php }else{ ?>
                    <a class="icon-container" href="/users/<?php echo $author['nameid'] ?>"><img src="<?php echo getAvatar($author['id']) ?>" alt="<?php echo $author['nickname'] ?>" class="icon"></a>
                    <?php } ?>
                    <div class="user-name-content">
                        <p class="user-name">
                            <a href="/users/<?php echo $author['nameid'] ?>"><?php echo $author['nickname'] ?></a>
                            <span class="user-id"><?php echo $author['nameid'] ?>
                        </p>
                        <p class="timestamp-container">
                            <span class="timestamp">
                                wip
                            </span>
                        </p>
                    </div>
                </div>
                <div class="body">
                    <div id="the-post">
                        <div class="post-content-text"><p><?php echo $result2['content'] ?></p></div>
                        <div class="post-meta">
                            <form method='POST'>
                                <button name="yeah" type="submit" class="symbol submit yeah-button">
                                    <?php 
                                    switch($result2['feeling']){
                                        case 0:?>
                                            <span class="yeah-button-text">Yeah!</span>
                                        <?php
                                            break; 
                                        case 1: ?>
                                            <span class="yeah-button-text">Yeah!</span>
                                        <?php 
                                            break;
                                        case 2: ?>
                                            <span class="yeah-button-text">Yeah♥</span>
                                        <?php 
                                            break;
                                        case 3: ?>
                                            <span class="yeah-button-text">Yeah?!</span>
                                        <?php 
                                            break;
                                        case 4: 
                                        ?>
                                            <span class="yeah-button-text">Yeah...</span>
                                        <?php
                                            break;
                                        case 5:
                                        ?>
                                            <span class="yeah-button-text">Yeah...</span>
                                    <?php   break;
                                        } ?>
                                </button>
                                <div class="yeah symbol"><span class="symbol-label">Yeahs</span><span class="empathy-count"><?php echo $yeah ?></span></div>
                                <div class="reply symbol"><span class="symbol-label">Replies</span><span class="reply-count"><?php echo $replies ?></span></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<?php
require_once("inc/footer.php");
?>