<?php
    session_start();
    define("HOST","localhost");
    define("DB_NAME","rixyverse");
    define("USER", "root");
    define("PASS",""); 

    try {
        $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME , USER, PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo '<head><title>Error - Rixyverse</title><link rel="stylesheet" href="/assets/css/offdevice.css"/><link rel="stylesheet" href="/assets/css/dark.css"/><link rel="shortcut icon" type="image/png" href="/assets/img/favicon.png"/></head><body><body class="guest"><div id="sub-body"><menu id="global-menu"><li id="global-menu-logo"><h1><a href="/"><img src="/assets/img/menu-logo.png" alt="Rixyverse"></a></h1></li></menu></div></body><div class="no-content"><p>The database disconnected itself.Please try again later!</p></div></body>' ;
        exit;
    }
?>
