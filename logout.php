<?php 
    session_start();

    unset($_SESSION['verified_user_id']);
    unset($_SESSION['idTokenString']);

    header('Location: index.php');

?>