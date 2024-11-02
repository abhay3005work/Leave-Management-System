<?php
require_once __DIR__ . '/dbconnection/session.php';
require_once __DIR__ . '/dbconnection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new Database();
    $conn = $database->getConnection();

    if (!$conn) {
        header("Location: login.php?error=db_connection_error");
        exit();
    }

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Basic validation
    if (empty($full_name) || empty($email) || empty($password)) {
        header("Location: login.php?error=empty_fields");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: login.php?error=invalid_email");
        exit();
    }

    try {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            header("Location: login.php?error=email_exists");
            exit();
        }

        // Hash password before saving
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Save user details to database
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
        if ($stmt->execute([$full_name, $email, $hashedPassword])) {
            // Auto login after successful signup
            $_SESSION['user_id'] = $conn->lastInsertId();
            $_SESSION['full_name'] = $full_name;

            header("Location: quiz.php");
            exit();
        } else {
            header("Location: login.php?error=registration_failed");
            exit();
        }
    } catch (PDOException $e) {
        error_log("Registration Error: " . $e->getMessage());
        header("Location: login.php?error=registration_failed");
        exit();
    }
}

/*
This code handles the user registration/signup process:

1. File Requirements:
   - Includes session.php for session management
   - Includes connection.php for database connectivity

2. Request Validation:
   - Verifies that the request method is POST
   - Establishes database connection
   - Checks if connection is successful

3. Input Processing:
   - Retrieves and sanitizes user input (full_name, email, password)
   - Trims whitespace from full_name and email
   
4. Input Validation:
   - Checks for empty fields
   - Validates email format using filter_var()
   
5. Database Operations:
   - Checks if email already exists in database
   - Uses prepared statements for security
   - Hashes password using PASSWORD_DEFAULT algorithm
   - Inserts new user record into database
   
6. Session Management:
   - On successful registration:
     * Sets user_id and full_name in session
     * Automatically logs user in
     * Redirects to quiz.php
   - On failure:
     * Redirects back to login with appropriate error message

7. Error Handling:
   - Catches and logs database errors
   - Uses PDO for secure database operations
   - Provides user-friendly error messages
   - Implements proper error redirection
*/
