<?php
    require_once 'header.php';
    if(isset($_SESSION['user'])) {
        destroySession();
        echo "<h4>You have been logged out. Please <a href='login.php'>login</a></h4>";
    }
?>