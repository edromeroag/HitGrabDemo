<?php
    $dbhost = 'localhost';
    $dbname = 'hitgrabdemo';
    $dbuser = 'admin';
    $dbpass = 'demo';

    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if($connection->connect_error) {
        die("Database Connection Failed");
    } 

    function queryMySql($query) {
        global $connection;
        $result = $connection->query($query);
        if(!$result) {
            die("Failed to query database");
        }
        return $result;
    }

    function destroySession() {
        $_SESSION = array();

        if(session_id() != "" || isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 2592000, '/');
        }

        session_destroy();
    }

    function sanitizeString($var) {
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        if(get_magic_quotes_gpc()) {
            $var = stripcslashes($var);
        }
        return $connection->real_escape_string($var);
    }
?>