<?php
require_once("inc/connect.php");
$query = $db->prepare("SELECT * FROM `titles` WHERE `id`=:id");
$query->execute([
    "id" => $_GET['id']
]);
$result = $query->fetch();
if (isset($_GET['id'])) {
    if(is_null($result['id'])){
        die(require_once("404.php"));
    }
}else{
    die(require_once("404.php"));
}
$title = $result['name'];
require_once("inc/header.php");
require_once("inc/htm.php");
?>
<div id="main-body" class="community-top">
        <div id="sidebar">
            <section class="sidebar-container" id="sidebar-community">
                    <span id="sidebar-cover">
                        <a href="/titles/<?php echo $result['id']; ?>"><img src="<?php echo $result['bannerurl']; ?>"></a>
                    </span>
                <header id="sidebar-community-body">
                    <span id="sidebar-community-img">
                        <span class="icon-container">
                            <a href="/titles/<?php echo $result['id']; ?>"><img src="<?php echo $result['iconurl']; ?>" class="icon"></a>
                        </span>
                    </span>
                    <h1 class="community-name"><a href="/titles/<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></h1>
                </header>
                <div class="community-description js-community-description">
                        <div class="text js-truncated-text"><?php echo $result['description']; ?></div>
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
            <div class="body-content" id="community-post-list">
                <div class="list post-list">
                </div>
            </div>
        </div>
    </div>
</div>