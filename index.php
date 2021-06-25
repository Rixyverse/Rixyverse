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
                                <a class="guest-terms-link symbol" href="/info/rules">Rixyverse Rules</a>
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
                        <li class="trigger" data-href="/communities/1">
                            <img src="/assets/img/gnrl_banner.gif" class="community-list-cover">
                            <div class="community-list-body">
                                <span class="icon-container">
                                    <img class="icon" src="/assets/img/gnrl_icon.gif">
                                </span>
                                <div class="body">
                                    <a class="title" href="/titles/1">General Discussion Community</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</body>