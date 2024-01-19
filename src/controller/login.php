<?php

session_start();

if (session_status() !== PHP_SESSION_ACTIVE || empty($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
