<?php
$title = "Sign Up";
require_once("inc/header.php");
require_once("inc/connect.php");
require_once("inc/htm.php");
if(isset($_SESSION['nickname'])){
    header("Location: /");
}
?>
<div id="main-body" class="guest">
                <div class="main-column center">
                    <div class="post-list-outline login-page">
                        <form method="post">
                            <img src="/assets/img/menu-logo.png">
                            <p class="lh">Sign Up</p>
                            <p>Create an Rixyverse account to interact with other users through posts, comments, messages and more!</p><br>
                            <p>You should be 13 years of age or older to join this site.<br>
                            <p class="red" style="margin-bottom:6px" name="error"></p>
                            <h3 class="label"><label><span class="red">*</span> User ID: <input type="text" class="auth-input" name="username" maxlength="32" minlength="4" placeholder="ID" required></label></h3>
                            <h3 class="label"><label><span class="red">*</span> Nickname: <input type="text" class="auth-input" name="nickname" maxlength="32" placeholder="Nickname" required></label></h3>
                            <h3 class="label"><label><span class="red">*</span> Password: <input type="password" class="auth-input" name="password" maxlength="32" placeholder="Password" required></label></h3>
                            <h3 class="label"><label><span class="red">*</span> Confirm Password: <input type="password" class="auth-input" name="confirm" maxlength="32" placeholder="Confirm Password" required></label></h3>
                            <button type="submit" class="button" name="form-submit">Create account</button>
                            <div class="ll">
                                <p>All fields with a red asterisk (<span class="red">*</span>) are required.</p>
                                <p>You can change all of these fields after you sign up; except for user ids, which can only be changed by admins.</p>
                            </div>
                        </form>
                        <?php
                            if(isset($_POST['form-submit'])){
                                if(!empty($_POST['username']) && !empty($_POST['nickname']) && !empty($_POST['password']) && !empty($_POST['confirm'])){
                                    if($_POST['password'] == $_POST['confirm']){
                                        $options = [
                                            "cost" => 12,
                                        ];
                
                                        $hashpass = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
                                        try{
                                            $query = $db->prepare("INSERT INTO `users`(`nameid`, `nickname`, `password`, `description`, `avatarurl`, `level`) VALUES (:nameid,:nickname,:password,'', '', 0)");
                                            $query->execute([
                                                'nameid' => $_POST['username'],
                                                'nickname' => $_POST['nickname'],
                                                'password' => $hashpass
                                            ]);
                                        }catch (PDOException $e){
                                            echo "<div class='ll'>
                                            <p><span class='red'>User ID already picked or unknown database error !</span></p></div>";
                                            exit;
                                       }
                                       $result2 = getUserDataByNameID($_POST['username']);
                                        login($result2['id']);
                                    }else{
                                        echo "<div class='ll'>
                                        <p><span class='red'>Passwords don't match!</span></p></div>";
                                    }
                                }else{
                                    echo "<div class='ll'>
                                        <p><span class='red'>All fields are not completely filled in!</span></p></div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php require_once("inc/footer.php"); ?>