<?php
    require_once 'header.php';
    $error = $user = $email = $pass = "";
    
    if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass'])) {
        $user = sanitizeString($_POST['user']);
        $email = sanitizeString($_POST['email']);
        $pass = sanitizeString($_POST['pass']);

        if($user === "" || $email === "" || $pass === "") {
            $error = "fields are missing";
        } else {
            $result = queryMysql("SELECT * FROM users WHERE username='$user' OR email='$email'");
            if($result->num_rows) {
                $error = "user already exists";
            } else {
                queryMysql("INSERT INTO users(username, email, pass, points) VALUES('$user', '$email', '$pass', 100)");
                queryMysql("INSERT INTO inventory(username, traps, gold) VALUES('$user', '0', '100')");
                echo "<span>user has been created</span>";
                $_SESSION['user'] = $user;
                echo "<span>You have been logged in <a href='home.php'>begin the hunt</a></span>";
                
            }
        } 
    }
 
    echo <<<_FORM
        <form method='post' action='signup.php'>$error
        <div class='ui-field-contain'>
            <label></label>
            <span>Please enter your details to sign up or <a href='login.php'>please log in here</a></span>
        </div>
        <div class='ui-field-contain'>
            <label>Username</label>
            <input type='text' name='user' maxlength='16' value='$user'>
            <div id='userexists'></div>
        </div> 
        <div class='ui-field-contain'>
            <label>Email</label>
            <input type='email' name='email' value='$email'>
            <div id='emailexists'></div>
        </div> 
        <div class='ui-field-contain'>
            <label>Password</label>
            <input type='password' name='pass' maxlength='255' value='$pass'>
        </div>
        <div class='ui-field-contain'>
            <input type='submit' value='Sign Up'>
        </div> 
    </body>
    _FORM;
    
?>