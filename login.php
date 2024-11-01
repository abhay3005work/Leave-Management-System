<?php
require_once __DIR__ . '/dbconnection/session.php';

// Redirect if already logged in
if (isLoggedIn()) {
    // If there's a specific page the user was trying to access, go there
    if (isset($_SESSION['redirect_url'])) {
        $redirect = $_SESSION['redirect_url'];
        unset($_SESSION['redirect_url']);
        header("Location: " . $redirect);
    } else {
        // Only redirect to quiz.php if there's no specific destination
        header("Location: quiz.php");
    }
    exit();
}
?>
<!DOCTYPE html>

<head>
    <?php include 'header/header.php'; ?>
</head>

<body id="login" class="min-h-screen bg-gradient-to-br from-green-100 to-green-200 flex flex-col">
    <nav class="w-full p-6 flex justify-between items-center">
        <div class="logo">
            <a href="./index.php">
                <h3 class="magnet text-black">NueroVista.</h3>
            </a>
        </div>
    </nav>
    <div class="flex-1 flex items-center justify-center p-6">
        <div class="relative w-full max-w-md mx-auto">
            <?php if (isset($_GET['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <?php
                    switch ($_GET['error']) {
                        case 'email_exists':
                            echo "This email is already registered";
                            break;
                        case 'registration_failed':
                            echo "Registration failed. Please try again";
                            break;
                        case 'invalid_credentials':
                            echo "Invalid email or password";
                            break;
                        case 'server_error':
                            echo "An error occurred. Please try again later.";
                            break;
                        case 'login_required':
                            echo "Please log in to access that page";
                            break;
                        default:
                            echo "An error occurred";
                    }
                    ?>
                </div>
            <?php endif; ?>
            <div class="form-container active" id="loginForm">
                <div class="form-box bg-white/95 backdrop-blur-lg rounded-2xl p-8 shadow-xl border border-green-100">
                    <h2 class="text-3xl font-bold text-green-800 mb-8 text-center">Welcome Back</h2>
                    <form method="POST" action="process_login.php">
                        <div class="space-y-6">
                            <div>
                                <input type="email" name="email" placeholder="Email" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <input type="password" name="password" placeholder="Password" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <button type="submit"
                                class="w-full py-3 bg-gradient-to-r from-green-600 to-green-500 text-white rounded-lg hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200">
                                Sign In
                            </button>
                            <div class="switch-text">
                                Don't have an account?<a href="#" onclick="toggleForms()">Sign up here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="form-container hidden" id="signupForm">
                <div class="form-box bg-white/95 backdrop-blur-lg rounded-2xl p-8 shadow-xl border border-green-100">
                    <h2 class="text-3xl font-bold text-green-800 mb-8 text-center">Create Account</h2>
                    <form method="POST" action="process_signup.php">
                        <div class="space-y-6">
                            <div>
                                <input type="text" name="full_name" placeholder="Full Name" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <input type="email" name="email" placeholder="Email" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <input type="password" name="password" placeholder="Password" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <input type="password" name="confirm_password" placeholder="Confirm Password" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <button type="submit"
                                class="w-full py-3 bg-gradient-to-r from-green-600 to-green-500 text-white rounded-lg hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200">
                                Sign Up
                            </button>
                            <div class="switch-text">
                                Already have an account?<a href="#" onclick="toggleForms()">Sign in here</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'header/footer.php'; ?>

    <script>
        function toggleForms() {
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signupForm');

            loginForm.classList.toggle('active');
            loginForm.classList.toggle('hidden');
            signupForm.classList.toggle('active');
            signupForm.classList.toggle('hidden');
        }
    </script>
</body>

</html>