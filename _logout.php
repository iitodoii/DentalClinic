<?php
    session_start();
    header( "location: index.php" );
    unset($_SESSION['username']);
    exit();
    ?>
