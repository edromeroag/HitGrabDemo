<?php
    require_once 'header.php';

    function checkGold($user) {
        $result = queryMysql("SELECT gold FROM inventory WHERE username='$user'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $goldAmount = $row['gold'];
        if($goldAmount < 20) {
            return FALSE;
        }
        return TRUE;
    }

    function pay($user) {
        $result = queryMysql("SELECT gold FROM inventory WHERE username='$user'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $newAmount = $row['gold'] - 20;
        queryMysql("UPDATE inventory SET gold='$newAmount' WHERE username='$user'");
    }
    
    function insert($u, $i, $q) {
        $result = queryMysql("SELECT $i FROM inventory WHERE username='$u'");
        if($result) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $quantity = $q + $row["$i"];
        }
        else {
            echo "<h4>Could not access inventory</h4>";
        }

        $result =  queryMysql("UPDATE inventory SET $i='$quantity' WHERE username='$u'");
            if($result) {
                echo "<h4>$i amount updated!</h4>";
            }
            else {
                echo "<h4>$i amount could not be updated</h4>";
            }
    }

    function purchaseGold($u) {
        insert($u, 'gold', 100);
    }

    function purchaseTrap($u) {
       if(checkGold($u)) {
           insert($u, 'traps', 1);
           pay($u);
       }
    }

    if(isset($_POST['item'])) {
        $item = sanitizeString($_POST['item']);
        $user = $_SESSION['user'];
        
        if($item === 'gold') {
            purchaseGold($user);
        }
        elseif($item === 'traps') {
            purchaseTrap($user);
        }
    }
?>