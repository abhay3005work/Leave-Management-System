<?php
session_start();

function isLoggedIn()
{
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

function requireLogin()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user_id'])) {
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        header("Location: /nuerovista/login.php");
        exit();
    }
}

// Add this to prevent session fixation
function regenerateSession()
{
    if (isset($_SESSION['user_id'])) {
        session_regenerate_id(true);
    }
}
