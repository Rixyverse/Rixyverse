<?php
require_once("connect.php");
global $title;
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
    </head>
    <?php if(!isset($_SESSION['token'])){ ?>
    <body class="guest">
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
    <body token="<?php echo $_SESSION['token'] ?>">
    <div id="sub-body">
            <menu id="global-menu">
                <li id="global-menu-logo"><h1><a href="/"><img src="/assets/img/menu-logo.png" alt="Rixyverse"></a></h1></li>
                <li id="global-menu-list">
                        <ul>
                            <li id="global-menu-feed"><a href="/activity/" class="symbol"><span>Activity Feed</span></a></li>
                            <li id="global-menu-community"><a href="/" class="symbol"><span>Communities</span></a></li>
                            <li id="global-menu-news"><a href="/403" class="symbol"><span>nothing</span></a></li>
                            <!--Not working for now (because we don't have the needed js for this)-->
                            <li id="global-menu-my-menu"><button class="symbol js-open-global-my-menu open-global-my-menu"></button>
                                <menu id="global-my-menu" class="invisible none">
                                    <li><a href="/settings/profile" class="symbol my-menu-profile-setting"><span>Profile Settings</span></a></li>
                                    <li><a href="#" class="symbol my-menu-account-setting"><span>Account Settings</span></a></li>
                                    <li><a href="/info/rules" class="symbol my-menu-guide"><span>Nodeverse Rules</span></a></li>
                                    <li><a href="/info/contact" class="symbol my-menu-info"><span>Contact the Team</span></a></li>
                                    <li><a href="/blocked" class="symbol my-menu-block"><span>Blocked Users</span></a></li>
                                </menu>
                            </li>                            
                        </ul>
                    </li>
            </menu>
        </div>
    <?php } ?>
</html>