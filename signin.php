<?php
$title = "Login";
require_once("inc/header.php");
require_once("inc/connect.php");
if(isset($_SESSION['nickname'])){
    header("Location: /");
}
?>
    <body>
        <div id="main-body" class="guest">
            <div class="main-column center">
                <div class="post-list-outline login-page">
                    <form method="post">
                        <img src="/assets/img/menu-logo.png">
                        <p class="lh">Log In</p>
                        <p>Sign in with an Rixyverse account to create posts and comments, and more.</p>
                        <h3 class="label"><label>User ID: <input type="text" class="auth-input" name="username" maxlength="32" placeholder="User ID" required></label></h3>
                        <h3 class="label"><label>Password: <input type="password" class="auth-input" name="password" maxlength="32" placeholder="Password" required></label></h3>
                        <button type="submit" class="button">Sign In</button>
                        <div class="ll">
                            <p>If you don't have an account, <a href="/signup/">you can sign up here.</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>