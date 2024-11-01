<?php
require_once 'dbconnection/session.php';

// Check if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Get user ID and name for logged-in user
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['full_name'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header/header.php'; ?>
</head>

<body id="sol-n-track" class="bg-gradient-to-br from-green-900 to-green-500 min-h-screen selection:bg-green-500 selection:text-white">
    <audio autoplay muted loop src="./assets/takealongs/audio/Anuv Jain - JO TUM MERE HO (Lyrics) - Indie India (youtube).mp3"></audio>
    <div class="main">
        <nav class="flex justify-between items-center p-6">
            <div class="logo">
                <a href="index.php">
                    <h3 class="magnet text-white">NueroVista.</h3>
                </a>
            </div>
            <div class="icon">
                <i class="fa-solid fa-music magnet" style="color:white" id="playsong" onclick="songplay()"></i>
            </div>
        </nav>
        <div class="container mx-auto p-8">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-white hover:text-gray-200 transition-colors fade-in mb-2">
                    <i class="fas fa-chart-line mr-3"></i>Dashboard
                </h1>
                <h2 class="text-4xl font-bold text-white mb-4">Welcome, <?php echo htmlspecialchars($user_name); ?>!</h2>
                <h3 class="text-2xl text-white/90">Your Mental Health Journey</h3>
            </div>

            <div class="bg-white rounded-2xl shadow-2xl p-8 border border-green-200">
                <div class="mb-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="stats-card bg-green-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                        <h3 class="text-xl font-semibold text-green-800 mb-2">Average Score</h3>
                        <p class="text-3xl font-bold text-green-600">83.3%</p>
                    </div>
                    <div class="stats-card bg-green-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                        <h3 class="text-xl font-semibold text-green-800 mb-2">Total Assessments</h3>
                        <p class="text-3xl font-bold text-green-600">15</p>
                    </div>
                    <div class="stats-card bg-green-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow">
                        <h3 class="text-xl font-semibold text-green-800 mb-2">Progress Status</h3>
                        <p class="text-xl font-bold text-green-600">Improving</p>
                    </div>
                </div>

                <div class="table-container bg-white rounded-lg shadow-lg p-6 border border-green-100">
                    <table id="quizResultsTable" class="display w-full">
                        <thead>
                            <tr class="bg-green-50">
                                <th class="text-green-800">Date</th>
                                <th class="text-green-800">Quiz Type</th>
                                <th class="text-green-800">Score</th>
                                <th class="text-green-800">Time Taken</th>
                                <th class="text-green-800">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Add database connection and query here
                            // Example data structure:
                            $results = [
                                ['2024-01-15', 'Depression Assessment', '85%', '10 mins', 'Completed'],
                                ['2024-01-10', 'Anxiety Screening', '75%', '8 mins', 'Completed'],
                                ['2024-01-05', 'Stress Test', '90%', '12 mins', 'Completed'],
                                ['2023-12-28', 'Mental Health Check', '82%', '15 mins', 'Completed'],
                                ['2023-12-20', 'Depression Assessment', '78%', '11 mins', 'Completed'],
                                ['2023-12-15', 'Anxiety Screening', '80%', '9 mins', 'Completed'],
                                ['2023-12-08', 'Stress Test', '88%', '13 mins', 'Completed'],
                                ['2023-12-01', 'Mental Health Check', '85%', '14 mins', 'Completed'],
                                ['2023-11-25', 'Depression Assessment', '72%', '12 mins', 'Completed'],
                                ['2023-11-18', 'Anxiety Screening', '77%', '10 mins', 'Completed'],
                                ['2023-11-10', 'Depression Assessment', '70%', '11 mins', 'Completed'],
                                ['2023-11-05', 'Stress Test', '82%', '13 mins', 'Completed'],
                                ['2023-10-28', 'Mental Health Check', '79%', '12 mins', 'Completed'],
                                ['2023-10-20', 'Anxiety Screening', '83%', '9 mins', 'Completed'],
                                ['2023-10-15', 'Depression Assessment', '86%', '10 mins', 'Completed']
                            ];

                            foreach ($results as $result) {
                                echo "<tr class='hover:bg-green-50 transition-colors'>";
                                foreach ($result as $value) {
                                    echo "<td class='text-green-700'>$value</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="button-container mt-8 flex justify-center gap-4">
                    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition-colors">
                        <i class="fas fa-download mr-2"></i>Download Report
                    </button>
                    <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition-colors">
                        <i class="fas fa-share-alt mr-2"></i>Share Results
                    </button>
                </div>
            </div>
        </div>

        <?php include 'header/footer.php'; ?>


    </div>
</body>

</html>