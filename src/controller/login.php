<?php

// Démarre la session
session_start();

// Vérifie si une session est active
if (session_status() !== PHP_SESSION_ACTIVE || empty($_SESSION['user_id'])) {
    // La session n'est pas active ou $_SESSION['user_id'] est vide
    // Rediriger vers la page de connexion
    header("Location: login.php");
    exit();
}
