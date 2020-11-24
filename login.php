<?php
    include_once 'header.php';

    $error = $user = $pass = "";

    if(isset($_POST['user']) && isset($_POST['pass'])) {
        $user = sanitizeString($_POST['user']);
        $pass = sanitizeString($_POST['pass']);

        if($user === "" || $pass === "") {
            $error = "Please enter username and password";
        } 
        else {
            $result = queryMysql("SELECT username, pass FROM users WHERE username='$user'");
            if($result->num_rows) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if($row['pass'] === $pass) {
                    $_SESSION['user'] = $row['username'];
                    echo "<span>You have been logged in <a href='home.php'>begin the hunt</a></span>";
                }
                else {
                    $error = "Password doesn't match";
                }
            } 
            else {
                $error = "Username doesn't exist";
            }
        }
    }

    echo <<<_FORM
        <form method='post' action='login.php'>$error
        <div class='ui-field-contain'>
            <label></label>
            <span>Please enter your details to login or <a href='signup.php'>please sign up here</a></span>
        </div>
        <div class='ui-field-contain'>
            <label>Username</label>
            <input type='text' name='user' maxlength='16' value='$user'>
            <div id='userexists'></div>
        </div> 
        <div class='ui-field-contain'>
            <label>Password</label>
            <input type='password' name='pass' maxlength='255' value='$pass'>
        </div>
        <div class='ui-field-contain'>
            <input type='submit' value='Login'>
        </div> 
    </body>
    </html>
    _FORM;
?>