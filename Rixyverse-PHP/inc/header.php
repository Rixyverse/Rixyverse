<?php
require_once("connect.php");
require_once("htm.php");
global $title;
if(isset($_SESSION['token'])){
    $result = getUserDataByToken($_SESSION['token']);
}
?>
<html>
    <head>
        <title><?php echo $title ?> - Rixyverse</title>
        <link rel="stylesheet" href="/assets/css/offdevice.css"/>
        <link rel="stylesheet" href="/assets/css/dark.css"/>
        <link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png"/>
        <meta property="og:description" content="Rixyverse is a Miiverse Clone that allows you to discuss with other users about games and more.">
        <meta property="og:locale" content="en_US">
        <meta property="og:title" content="Rixyverse">
        <meta property="og:type" content="article">
        <meta property="og:image" content="/assets/img/favicon.png">
        <meta property="og:site_name" content="Rixyverse">
        <script src="/assets/js/rixyverse.js"></script>
        <noscript>You need JavaScript to run this app.</noscript>
    </head>
    <?php if(!isset($_SESSION['token'])){ ?>
    <body class="guest">
        <div id="wrapper" class="guest-top">
            <div id="sub-body">
                <menu id="global-menu">
                    <li id="global-menu-logo"><h1><a href="/"><img src="/assets/img/menu-logo.png" alt="Rixyverse"></a></h1></li>
                    <li id="global-menu-login">
                            <a href="/login/" class="login">
                                <input type="image" alt="Sign in" src="/assets/img/sign-in.png">
                            </a>
                    </li>
                </menu>
            </div>
    </body>
    <?php }else{ ?>
    <body>
        <div id="wrapper" class="guest-top">
            <div id="sub-body">
                    <menu id="global-menu">
                        <li id="global-menu-logo"><h1><a href="/"><img src="/assets/img/menu-logo.png" alt="Rixyverse"></a></h1></li>
                        <li id="global-menu-list">
                                <ul>
                                    <li id="global-menu-mymenu"><a href="/users/<?php echo $result['nameid'] ?>"><span class="icon-container"><img src="<?php echo getAvatar($result['id']) ?>" alt="User Page"/></span><span>User Page</span></a></li>
                                    <li id="global-menu-feed"><a href="/activity/" class="symbol"><span>Activity Feed</span></a></li>
                                    <li id="global-menu-community"><a href="/" class="symbol"><span>Communities</span></a></li>
                                    <li id="global-menu-message"><a href="/messages/" class="symbol"><span>Messages</span><span class="badge" style>1</span></a></li>
                                    <li id="global-menu-news"><a href="/notifs/" class="symbol"><span class="badge" style>1</span></a></li>
                                    <!--Not working for now (because we don't have the needed js for this)-->
                                    <li id="global-menu-my-menu"><button class="symbol js-open-global-my-menu open-global-my-menu"></button>
                                        <menu id="global-my-menu" class="invisible none">
                                            <li><a href="/settings/profile" class="symbol my-menu-profile-setting"><span>Profile Settings</span></a></li>
                                            <li><a href="#" class="symbol my-menu-account-setting"><span>Account Settings</span></a></li>
                                            <li><a href="/info/rules" class="symbol my-menu-guide"><span>Rixy Rules</span></a></li>
                                            <li><a href="/info/contact" class="symbol my-menu-info"><span>Contact the Team</span></a></li>
                                            <li><a href="/blocked" class="symbol my-menu-block"><span>Blocked Users</span></a></li>
                                            <li><form action="/logout/" method="post" id="my-menu-logout" class="symbol"><input type="submit" value="Log out"></form></li>
                                        </menu>
                                    </li>                            
                                </ul>
                            </li>
                    </menu>
                </div>
    <?php } ?>
</html>