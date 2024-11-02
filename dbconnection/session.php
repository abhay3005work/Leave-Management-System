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

/*
This code implements session management functionality:

1. Session Initialization:
   - Starts PHP session at the beginning of the file
   - Allows session data to persist across pages

2. isLoggedIn() Function:
   - Checks if user is currently logged in
   - Verifies user_id exists in session and is not empty
   - Returns boolean true/false

3. requireLogin() Function:
   - Forces login for protected pages
   - Checks if session is started, starts if not
   - If user not logged in:
     * Stores current URL for redirect after login
     * Redirects to login page
     * Stops further code execution

4. regenerateSession() Function:
   - Security feature to prevent session fixation attacks
   - Creates new session ID for logged in users
   - Maintains session data while changing ID
   - Only runs for authenticated users

5. Security Features:
   - Session fixation prevention
   - Proper session initialization checks
   - Secure redirects with exit()
   - URL tracking for better UX
*/
