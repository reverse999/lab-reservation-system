<?php
    session_start();
    echo $_SESSION['username'];
    if(empty($_SESSION['username'])){
        header("location:login.php");
    }

?>