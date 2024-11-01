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
