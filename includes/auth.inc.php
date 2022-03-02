<?php
    if(!isset($_SESSION['can_edit']) && $_SESSION['can_edit'] != 1) {
        header('location: login.php');
    }
?>