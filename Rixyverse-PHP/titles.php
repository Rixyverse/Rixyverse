
<?php
require_once("inc/connect.php");
require_once("inc/htm.php");
if (isset($_GET['id'])) {
    $query = $db->prepare("SELECT * FROM `titles` WHERE `id`=:id");
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
$title = $result2['name'];
require_once("inc/header.php");
?>
<div id="main-body" class="community-top">
        <div id="sidebar">
            <section class="sidebar-container" id="sidebar-community">
                    <span id="sidebar-cover">
                        <a href="/titles/<?php echo $result2['id']; ?>"><img src="<?php echo $result2['bannerurl']; ?>"></a>
                    </span>
                <header id="sidebar-community-body">
                    <span id="sidebar-community-img">
                        <span class="icon-container">
                            <a href="/titles/<?php echo $result2['id']; ?>"><img src="<?php echo $result2['iconurl']; ?>" class="icon"></a>
                        </span>
                    </span>
                    <h1 class="community-name"><a href="/titles/<?php echo $result2['id']; ?>"><?php echo $result2['name']; ?></a></h1>
                </header>
                <div class="community-description js-community-description">
                        <div class="text js-truncated-text"><?php echo $result2['description']; ?></div>
                </div>
            </section>
        </div>
<div class="main-column">
    <div class="post-list-outline">
        <div class="postsz">
            <div class="tab-container">
                <div class="tab2">
                    <a class="selected">All Posts</a>
                    <a>Popular Posts (coming soon)</a>
                </div>
            </div>
            <?php
            if(isset($_SESSION['token'])){?>
            <form id="post-form" method="post" class="for-identified-user" data-post-subtype="default">
                    <div class="feeling-selector js-feeling-selector"><label class="symbol feeling-button feeling-button-normal checked"><input type="radio" name="feeling_id" value="0" checked=""><span class="symbol-label">normal</span></label><label class="symbol feeling-button feeling-button-happy"><input type="radio" name="feeling_id" value="1"><span class="symbol-label">happy</span></label><label class="symbol feeling-button feeling-button-like"><input type="radio" name="feeling_id" value="2"><span class="symbol-label">like</span></label><label class="symbol feeling-button feeling-button-surprised"><input type="radio" name="feeling_id" value="3"><span class="symbol-label">surprised</span></label><label class="symbol feeling-button feeling-button-frustrated"><input type="radio" name="feeling_id" value="4"><span class="symbol-label">frustrated</span></label><label class="symbol feeling-button feeling-button-puzzled"><input type="radio" name="feeling_id" value="5"><span class="symbol-label">puzzled</span></label></div>
                    <div class="textarea-with-menu">
                        <div class="textarea-container">
                            <textarea name="body" class="textarea-text textarea" maxlength="2000" placeholder="Share your thoughts in a post to this community." data-open-folded-form="" data-required="" spellcheck="false"></textarea>
                        </div>
                    </div>
                    <div class="form-buttons">
                        <input type="submit" class="black-button post-button" value="Send" name="post">
                    </div>
            </form>
            <?php }
            if(isset($_POST['post']) && isset($_SESSION['token'])){
                if(!empty($_POST['body'])){
                    $query = $db->prepare("INSERT INTO `posts`(`linkedtitleid`, `author`, `content`, `feeling`) VALUES ('".$result2['id']."','".$user['id']."','".$_POST['body']."','".$_POST['feeling_id']."')");
                    $query->execute();
                }else{
                    echo "
                    <p><span class='red'>You put nothing in the body of your post!</span></p>";
                }
            }?>
            <div class="body-content" id="community-post-list">
                <div class="list post-list">
                    <?php
                    $query = $db->prepare("SELECT * FROM `posts` WHERE `linkedtitleid`=".$result2['id']." ORDER BY `id` DESC");
                    $query->execute();
                    $result2 = $query->fetchAll();
                    foreach($result2 as $post){
                        $author = getUserDataByID($post['author']);
                        $yeah = getNumberOfYeahs($post['id']);
                        $replies = getNumberOfReplies($post['id']); ?>
                        <div id="<?php echo $post['id'] ?>" data-href="/posts/<?php echo $post['id'] ?>" class="post trigger" tabindex="0">
                            <a href="/users/<?php echo $author['nameid'] ?>" class="icon-container">
                                <img src="<?php echo getAvatar($post['author']) ?>" class="icon">
                            </a>
                            <p class="user-name"><a href="/users/<?php echo $author['nameid'] ?>"><?php echo $author['nickname'] ?></a></p>
                            <p class="timestamp-container">
                                <a class="timestamp" href="/posts/<?php echo $post['id'] ?>">wip</a>
                            </p>
                            <div class="body post-content">
                                <p class="post-content-text"><?php echo $post['content'] ?></p>
                                <div class="post-meta">
                                    <button type="button" class="symbol submit yeah-button">
                                        <?php 
                                        switch($post['feeling']){
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
                                                <span class="yeah-button-text">Yeah...</span>
                                            <?php 
                                                break;
                                            case 4: 
                                            ?>
                                                <span class="yeah-button-text">Yeah...</span>
                                        <?php   break;
                                            } ?>
                                    </button>
                                    <div class="yeah symbol"><span class="symbol-label">Yeahs</span><span class="empathy-count"><?php echo $yeah ?></span></div>
                                    <div class="reply symbol"><span class="symbol-label">Replies</span><span class="reply-count"><?php echo $replies ?></span></div>        
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once("inc/footer.php"); ?>