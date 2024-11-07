<?php
require_once __DIR__ . '/dbconnection/session.php';
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;

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
                        case 'rate_limited':
                            echo "Too many login attempts. Please try again in a few minutes.";
                            break;
                        default:
                            echo "An error occurred";
                    }
                    ?>
                </div>
            <?php endif; ?>
            <div class="form-container active loginForm" id="loginForm">
                <div class="form-box bg-white/95 backdrop-blur-lg rounded-2xl p-8 shadow-xl border border-green-100">
                    <h2 class="text-3xl font-bold text-green-800 mb-8 text-center">Welcome Back</h2>
                    <form method="POST" action="process_login.php">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
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
                    <form method="POST" action="process_signup.php" onsubmit="return validateSignupForm()">
                        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
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
                                <input type="password" name="password" id="signup-password"
                                    placeholder="Password (min 8 characters)" required
                                    pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                                <small class="text-gray-500">Password must be at least 8 characters with letters and numbers</small>
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
        if (document.getElementById("login")) {
            // Login/Signup form animations
            let loginForm = document.getElementById("loginForm");
            let signupForm = document.getElementById("signupForm");

            // Initial animation on page load
            gsap.from(loginForm, {
                opacity: 0,
                y: 30,
                duration: 0.8,
                ease: "power2.out",
            });

            // Function to animate form transitions
            window.toggleForms = () => {
                if (!loginForm.classList.contains("hidden")) {
                    // Animate login form out
                    gsap.to(loginForm, {
                        opacity: 0,
                        y: 20,
                        duration: 0.4,
                        onComplete: () => {
                            loginForm.classList.add("hidden");
                            signupForm.classList.remove("hidden");
                            // Animate signup form in
                            gsap.fromTo(
                                signupForm, {
                                    opacity: 0,
                                    y: 20
                                }, {
                                    opacity: 1,
                                    y: 0,
                                    duration: 0.4
                                }
                            );
                        },
                    });
                } else {
                    // Animate signup form out
                    gsap.to(signupForm, {
                        opacity: 0,
                        y: 20,
                        duration: 0.4,
                        onComplete: () => {
                            signupForm.classList.add("hidden");
                            loginForm.classList.remove("hidden");
                            // Animate login form in
                            gsap.fromTo(
                                loginForm, {
                                    opacity: 0,
                                    y: 20
                                }, {
                                    opacity: 1,
                                    y: 0,
                                    duration: 0.4
                                }
                            );
                        },
                    });
                }

                // Function to validate signup form
                window.validateSignupForm = () => {
                    const password = document.getElementById("signup-password").value;
                    const confirmPassword = document.querySelector(
                        'input[name="confirm_password"]'
                    ).value;

                    if (password !== confirmPassword) {
                        alert("Passwords do not match!");
                        return false;
                    }
                    return true;
                };
            };
        }
    </script>
</body>

</html>

<!-- //#region Session Management
// Requires session.php for session handling functions
// Checks if user is already logged in using isLoggedIn()
// Handles redirects based on session state:
// * If user is logged in and has a redirect URL saved, goes to that URL
// * Otherwise redirects to quiz.php
// * Cleans up redirect URL from session after use
//#endregion

//#region Error Handling
// Displays error messages via GET parameters
// Handles various error types:
// * email_exists: When registering with existing email
// * registration_failed: General registration errors
// * invalid_credentials: Wrong email/password
// * server_error: Backend/database issues
// * login_required: Accessing protected pages while logged out
// * rate_limited: Too many login attempts
// Shows user-friendly error messages in a styled alert box
//#endregion

//#region Form Processing
// Login Form:
// * POSTs to process_login.php
// * Collects email and password
// * Required field validation
// Signup Form:
// * POSTs to process_signup.php
// * Collects full name, email, password, and confirmation
// * Required field validation
//#endregion

//#region UI State Management
// JavaScript toggleForms() function switches between login/signup views
// Uses CSS classes 'active' and 'hidden' for form visibility
// Maintains form state during error displays
//#endregion

//#region Page Structure
// Includes header.php for common head elements
// Includes footer.php for common footer elements
// Responsive layout with Tailwind CSS
// Consistent styling with the rest of the application
//#endregion -->