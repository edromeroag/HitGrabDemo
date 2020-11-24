<?php
    session_start();
    require_once 'util/functions.php';

    echo <<<_HEADER
        <!DOCTYPE html>
        <html>
            <head>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css'>
                <link rel='stylesheet' href='css/styles.css' type='text/css'>
                <script src='js/javascript.js'></script>
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js'></script>
                <script src='https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js'></script>
            </head>
            <body>
    _HEADER
?>