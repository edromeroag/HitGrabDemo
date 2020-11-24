<?php
    require_once 'header.php';

    if(isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $result = queryMysql("SELECT gold, traps FROM inventory WHERE username='$user'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        echo "<h4>Gold: " . $row['gold'] . " Number of traps: " . $row['traps'] . "</h4>";
    }
    
?>