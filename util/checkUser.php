<?php
    require_once 'functions.php';
    
    if(isset($_POST['user']) && isset($_POST['type'])) {
        $user = sanitize_string($_POST['user']);
        $type = $_POST['type']
        
        if($type === "username") {
            $result = queryMysql("SELECT * FROM users WHERE username='$user'");

            if($result->num_rows) {
                echo "<span class='taken'>&nbsp;&#x2718; The username '$user' is already taken</span>";
            } else {
                echo "<span class='available'>&nbsp;&#x2714; The username '$user' is available</span>";
            }
        } else {
            $result =  queryMysql("SELECT * FROM users WHERE email='$user'");

            if($result->num_rows) {
                echo "<span class='taken'>&nbsp;&#x2718; An account with the email $user already exists</span>";
        }
    }
?>