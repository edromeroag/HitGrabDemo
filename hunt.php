<?php
    require_once 'header.php';

    function attack($user, $health) {

        $result = queryMysql("SELECT traps FROM inventory WHERE username='$user'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $numOfTraps = $row['traps'];
        $mh = $health;

        while($mh > 0 && $numOfTraps > 0) {
            $numOfTraps = $numOfTraps - 1;
            $mh = $mh - 5;
        }

        queryMysql("UPDATE inventory SET traps='$numOfTraps' WHERE username='$user'");
        
        if($mh > 0) {
            echo "<h4>Not enough traps to slay the mouse</h4>";
        }
        else {
            echo "<h4>Congratulations mouse has been slain!</h4>";
        }

        
        
    }

    
    
    $mouseType = rand(1, 3);
    $user = $_SESSION['user'];

    if($mouseType === 1) {
        $mouseHealth = 5;
    }
    elseif($mouseType === 2) {
        $mouseHealth = 10;
    }
    elseif($mouseType === 3) {
        $mouseHealth = 15;
    }

    echo "<h4>Mouse health is equals to $mouseHealth</h4>";
    attack($user, $mouseHealth);


?>