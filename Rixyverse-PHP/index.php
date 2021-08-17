<?php
$title = "Home";
require_once("inc/header.php");
require_once("inc/htm.php");
require_once("inc/connect.php")
?>
<body>
    <div id="container">
            <div id="main-body" class="guest-top">
                <?php if(!isset($_SESSION['token'])){ ?>
                <div id="about">
                    <div id="about-inner">
                        <div id="about-text">
                            <h2 class="welcome-message">Welcome to Rixyverse !</h2>
                            <p>Rixyverse is a damn gosh good Miiverse Clone in development and don't exepect so much of this, it's in development.</p>
                            <div class="guest-terms-contents">
                                <a class="guest-terms-link symbol" href="/info/rules/">Rixyverse Rules</a>
                            </div>
                        </div>
                        <img src="/assets/img/miiglobe.png" />
                    </div>
                </div>
                <?php } ?>
                <div class="community-main">
                    <div id="community-eyecatch"></div>
                </div>
                <div class="community-top-sidebar">
                    <form action="/communities/search" class="search">
                        <input maxlength="32" name="query" placeholder="Search all communities" type="text"><input title="Search" type="submit" value="q">
                    </form>
                    <div class="post-list-outline index-memo">
                        <h2 class="label">Rixyverse</h2>
                        <h2>It is in developement?</h2>
                        <p>Yup! But you can access it since it's open-source.</p>
                        <h2>That's a bit empty!</h2>
                        <p>IN DEVELOPEMENT.</p><br>
                    </div>
                </div>
                <div class="community-main">
                    <h3 class="community-title">Featured Communities</h3>
                    <ul class="list community-list community-card-list test-community-list-item">
                        <?php
                        $query = $db->prepare("SELECT * FROM `titles` WHERE `type`=1");
                        $query->execute();
                        $result2 = $query->fetchAll();
                        if(empty($result2)){?>
                        <h2 class="community-title">No communities have been featured yet.</h2>
                        <?php }
                        foreach($result2 as $title){ ?>
                            <li class="trigger">
                                <img src="<?php echo $title['bannerurl'] ?>" class="community-list-cover">
                                <div class="community-list-body">
                                    <span class="icon-container">
                                        <img class="icon" src="<?php echo $title['iconurl'] ?>">
                                    </span>
                                    <div class="body">
                                        <a class="title" href="/titles/<?php echo $title['id'] ?>"><?php echo $title['name'] ?></a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <h3 class="community-title">Recent Communities</h3>
                    <ul class="list community-list community-card-list test-community-list-item">
                        <?php
                        $query = $db->prepare("SELECT * FROM `titles` WHERE `id`<5");
                        $query->execute();
                        $result2 = $query->fetchAll();
                        if(empty($result2)){?>
                        <h2 class="community-title">No communities have been created yet.</h2>
                        <?php }
                        foreach($result2 as $title){ ?>
                            <li class="trigger">
                                <div class="community-list-body">
                                    <span class="icon-container">
                                        <img class="icon" src="<?php echo $title['iconurl'] ?>">
                                    </span>
                                    <div class="body">
                                        <a class="title" href="/titles/<?php echo $title['id'] ?>"><?php echo $title['name'] ?></a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                    <a href="/titles/list" class="big-button">Show more</a>
                    <div id="community-guide-footer">
                        <div id="guide-menu">
                            <a href="https://github.com/Rixyverse" class="arrow-button">Rixyverse on Github</a>
                            <a href="/info/rules/" class="arrow-button">Rixyverse Rules</a>
                            <a href="/info/contact/" class="arrow-button">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
<?php require_once("inc/footer.php"); ?>