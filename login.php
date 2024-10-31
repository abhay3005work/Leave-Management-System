<!DOCTYPE html>
<html lang="en">

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
            <div class="form-container active" id="loginForm">
                <div class="form-box bg-white/95 backdrop-blur-lg rounded-2xl p-8 shadow-xl border border-green-100">
                    <h2 class="text-3xl font-bold text-green-800 mb-8 text-center">Welcome Back</h2>
                    <form>
                        <div class="space-y-6">
                            <div>
                                <input type="email" placeholder="Email" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <input type="password" placeholder="Password" required
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
                    <form>
                        <div class="space-y-6">
                            <div>
                                <input type="text" placeholder="Full Name" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <input type="email" placeholder="Email" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <input type="password" placeholder="Password" required
                                    class="w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-green-500 focus:outline-none transition-colors">
                            </div>
                            <div>
                                <input type="password" placeholder="Confirm Password" required
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
</body>

</html>