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
                        <button type="submit" class="button" name="form-submit">Sign In</button>
                        <div class="ll">
                            <p>If you don't have an account, <a href="/signup/">you can sign up here.</a></p>
                        </div>
                    </form>
                    <?php
                    if(isset($_POST['form-submit'])){
                        if(!empty($_POST['username']) && !empty($_POST['username'])){
                            $q = $db->prepare("SELECT * FROM `users` WHERE `nameid` = :username");
                            $q->execute([
                                "username" => $_POST['username']
                            ]);
                            $result = $q->fetch();
                            if($result==true){
                                if(password_verify($_POST['password'], $result['password'])){
                                    $_SESSION['nickname'] = $_POST['username'];
                                    $_SESSION['level'] = $result['level'];
                                    header("Location: /");
                                }else{
                                    echo "<div class='ll'>
                                    <p><span class='red'>Password incorrect!</span></p></div>";
                                }
                            }else{
                                echo "<div class='ll'>
                                <p><span class='red'>User ID not found!</span></p></div>";
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>