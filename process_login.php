<?php
require_once __DIR__ . '/dbconnection/session.php';
require_once __DIR__ . '/dbconnection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $conn = $database->getConnection();

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    try {
        $stmt = $conn->prepare("SELECT id, full_name, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Login successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: quiz.php");
            exit();
        } else {
            // Invalid credentials
            header("Location: login.php?error=invalid_credentials");
            exit();
        }
    } catch (PDOException $e) {
        error_log("Login Error: " . $e->getMessage());
        header("Location: login.php?error=server_error");
        exit();
    }
} else {
    // If someone tries to access this file directly
    header("Location: login.php");
    exit();
}

/*
This code handles the login process:

1. File Requirements:
   - Includes session.php for session management
   - Includes connection.php for database connectivity

2. Request Validation:
   - Checks if the request method is POST
   - If not POST, redirects to login.php

3. Database Connection:
   - Creates new Database instance
   - Gets database connection

4. User Input Processing:
   - Gets email and password from POST data
   - Trims email to remove whitespace

5. Login Logic:
   - Prepares SQL statement to select user data
   - Uses parameterized query for security
   - Verifies password using password_verify()
   
6. Session Management:
   - On successful login:
     * Sets user_id and full_name in session
     * Redirects to quiz.php
   - On failed login:
     * Redirects back to login with error message

7. Error Handling:
   - Catches database errors
   - Logs errors and shows user-friendly messages
   - Uses PDO for secure database operations
*/
