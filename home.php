<?php
    require_once 'header.php';

    if(isset($_SESSION['user'])) {
        $loggedin = TRUE;
    } 
    else {
        $loggedin = FALSE;
    }
    if(!$loggedin) {
        echo "<h1>Please log in <a href='login.php'>here</a></h1>";
    } else {
        echo <<<_LOGGEDIN
            <div class='center'>
                <ul>
                    <li><button id='inventory' onClick=getInventory()>Inventory</button></li>
                    <li><button id='gold' onClick=shop(this)>Get More Gold</button></li>
                    <li><button id='traps' onClick=shop(this)>Get More Traps</buton></li>
                    <li><button id='hunt' onClick=hunt()>Hunt!</button></li>
                    <li><a href='logout.php'>Logout</a></li>
                </ul>
            </div>
            <span id="response"></span>
            </body>
            </html>
        _LOGGEDIN;
    }
?>