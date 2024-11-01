<?php
require_once __DIR__ . '/dbconnection/session.php';

// Require login to access this page
requireLogin();

// If the user is not logged in, the code below won't execute 
// because requireLogin() will redirect to login.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include 'header/header.php'; ?>
    <style>

    </style>
</head>

<body id="quiz" class="bg-gradient-to-br from-emerald-100 via-green-200 to-teal-100 selection:bg-green-500 selection:text-white">
    <audio autoplay muted loop src="./assets/takealongs/audio/Anuv Jain - JO TUM MERE HO (Lyrics) - Indie India (youtube).mp3"></audio>
    <nav class="fixed z-20 flex justify-between items-center px-8 py-6">
        <div class="logo">
            <a href="./index.php">
                <h3 class="magnet text-emerald-800">NueroVista.</h3>
            </a>
        </div>
        <div class="flex items-center gap-4">
            <div class="icon">
                <i class="fa-solid fa-music magnet text-2xl hover:text-emerald-400 transition-colors cursor-pointer" style="color:#065f46" id="playsong" onclick="songplay()"></i>
            </div>
            <a href="logout.php" class="bg-emerald-500 hover:bg-emerald-600 text-white px-4 py-2 rounded-full transition-colors">
                Logout
            </a>
        </div>
    </nav>

    <div class="progress-bar bg-emerald-500"></div>
    <div class="particles"></div>
    <canvas id="quiz-canvas"></canvas>

    <div class="quiz-container">
        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="1">
            <h3 class="question-text text-emerald-800">Q1. How often do you feel overwhelmed by your emotions?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">✨ Rarely or never</div>
                <div class="option hover:bg-emerald-200">🌟 Sometimes</div>
                <div class="option hover:bg-emerald-200">⭐ Often</div>
                <div class="option hover:bg-emerald-200">💫 Almost always</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="2">
            <h3 class="question-text text-emerald-800">Q2. How well do you handle stress in your daily life?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🌈 Very well</div>
                <div class="option hover:bg-emerald-200">✨ Moderately well</div>
                <div class="option hover:bg-emerald-200">🌟 Not very well</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="3">
            <h3 class="question-text text-emerald-800">Q3. How would you rate your sleep quality?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🌙 Excellent</div>
                <div class="option hover:bg-emerald-200">✨ Good</div>
                <div class="option hover:bg-emerald-200">🌟 Fair</div>
                <div class="option hover:bg-emerald-200">⭐ Poor</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="4">
            <h3 class="question-text text-emerald-800">Q4. How would you rate your ability to concentrate?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🎯 Excellent</div>
                <div class="option hover:bg-emerald-200">✨ Good</div>
                <div class="option hover:bg-emerald-200">🌟 Fair</div>
                <div class="option hover:bg-emerald-200">⭐ Poor</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="5">
            <h3 class="question-text text-emerald-800">Q5. How often do you feel lonely or isolated?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🌺 Rarely or never</div>
                <div class="option hover:bg-emerald-200">✨ Sometimes</div>
                <div class="option hover:bg-emerald-200">🌟 Often</div>
                <div class="option hover:bg-emerald-200">⭐ Very often</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="6">
            <h3 class="question-text text-emerald-800">Q6. How do you typically deal with challenging situations?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🦁 Face them head-on</div>
                <div class="option hover:bg-emerald-200">🦊 Seek help from others</div>
                <div class="option hover:bg-emerald-200">🐢 Take time to process</div>
                <div class="option hover:bg-emerald-200">🦉 Avoid if possible</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="7">
            <h3 class="question-text text-emerald-800">Q7. How often do you engage in activities you enjoy?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🎨 Daily</div>
                <div class="option hover:bg-emerald-200">🎭 Few times a week</div>
                <div class="option hover:bg-emerald-200">🎪 Occasionally</div>
                <div class="option hover:bg-emerald-200">🎯 Rarely</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="8">
            <h3 class="question-text text-emerald-800">Q8. How would you describe your energy levels throughout the day?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">⚡ Consistently high</div>
                <div class="option hover:bg-emerald-200">🌅 Varies but generally good</div>
                <div class="option hover:bg-emerald-200">🌙 Often low</div>
                <div class="option hover:bg-emerald-200">💫 Very inconsistent</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="9">
            <h3 class="question-text text-emerald-800">Q9. How do you handle unexpected changes in your routine?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🌈 Adapt easily</div>
                <div class="option hover:bg-emerald-200">🌤️ Take some time but manage</div>
                <div class="option hover:bg-emerald-200">🌥️ Find it challenging</div>
                <div class="option hover:bg-emerald-200">⛈️ Get very stressed</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="10">
            <h3 class="question-text text-emerald-800">Q10. How often do you feel overwhelmed by your responsibilities?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🍃 Rarely</div>
                <div class="option hover:bg-emerald-200">🌿 Sometimes</div>
                <div class="option hover:bg-emerald-200">🌱 Frequently</div>
                <div class="option hover:bg-emerald-200">🌳 Almost always</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="11">
            <h3 class="question-text text-emerald-800">Q11. How would you rate your self-confidence?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">👑 Very high</div>
                <div class="option hover:bg-emerald-200">💫 Generally good</div>
                <div class="option hover:bg-emerald-200">✨ Could be better</div>
                <div class="option hover:bg-emerald-200">⭐ Need improvement</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="12">
            <h3 class="question-text text-emerald-800">Q12. How do you usually express your emotions?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">💝 Openly and easily</div>
                <div class="option hover:bg-emerald-200">💖 Selectively share</div>
                <div class="option hover:bg-emerald-200">💗 Keep to myself mostly</div>
                <div class="option hover:bg-emerald-200">💓 Difficulty expressing</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="13">
            <h3 class="question-text text-emerald-800">Q13. How often do you take breaks during work/study?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🎯 Regular scheduled breaks</div>
                <div class="option hover:bg-emerald-200">🎪 When feeling tired</div>
                <div class="option hover:bg-emerald-200">🎭 Rarely take breaks</div>
                <div class="option hover:bg-emerald-200">🎨 Work until finished</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="14">
            <h3 class="question-text text-emerald-800">Q14. How do you handle criticism?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🦋 Welcome it as growth</div>
                <div class="option hover:bg-emerald-200">🐝 Consider it carefully</div>
                <div class="option hover:bg-emerald-200">🐛 Sometimes take it personally</div>
                <div class="option hover:bg-emerald-200">🕷️ Very sensitive to it</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="15">
            <h3 class="question-text text-emerald-800">Q15. How often do you practice self-care?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🌺 Daily routine</div>
                <div class="option hover:bg-emerald-200">🌸 Few times a week</div>
                <div class="option hover:bg-emerald-200">🌼 When stressed</div>
                <div class="option hover:bg-emerald-200">🌻 Rarely</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="16">
            <h3 class="question-text text-emerald-800">Q16. How do you feel about your future?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🌠 Very optimistic</div>
                <div class="option hover:bg-emerald-200">⭐ Generally positive</div>
                <div class="option hover:bg-emerald-200">✨ Somewhat uncertain</div>
                <div class="option hover:bg-emerald-200">💫 Worried</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="17">
            <h3 class="question-text text-emerald-800">Q17. How well do you maintain boundaries in relationships?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🛡️ Very well</div>
                <div class="option hover:bg-emerald-200">🔮 Usually good</div>
                <div class="option hover:bg-emerald-200">🎭 Sometimes struggle</div>
                <div class="option hover:bg-emerald-200">🌫️ Often unclear</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="18">
            <h3 class="question-text text-emerald-800">Q18. How do you handle stress?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🧘 Use healthy coping strategies</div>
                <div class="option hover:bg-emerald-200">🎵 Try to stay balanced</div>
                <div class="option hover:bg-emerald-200">🌊 Get overwhelmed sometimes</div>
                <div class="option hover:bg-emerald-200">🌪️ Often feel consumed by it</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="19">
            <h3 class="question-text text-emerald-800">Q19. How satisfied are you with your social connections?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🤝 Very satisfied</div>
                <div class="option hover:bg-emerald-200">🫂 Generally good</div>
                <div class="option hover:bg-emerald-200">👥 Could be better</div>
                <div class="option hover:bg-emerald-200">🕊️ Feel disconnected</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="20">
            <h3 class="question-text text-emerald-800">Q20. How often do you try new things?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🎯 Frequently</div>
                <div class="option hover:bg-emerald-200">🎪 Sometimes</div>
                <div class="option hover:bg-emerald-200">🎭 Occasionally</div>
                <div class="option hover:bg-emerald-200">🎨 Rarely</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="21">
            <h3 class="question-text text-emerald-800">Q21. How do you handle disappointment?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🌈 Learn and move forward</div>
                <div class="option hover:bg-emerald-200">🌤️ Take time to process</div>
                <div class="option hover:bg-emerald-200">🌥️ Struggle but cope</div>
                <div class="option hover:bg-emerald-200">⛈️ Have difficulty moving on</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="22">
            <h3 class="question-text text-emerald-800">Q22. How often do you feel proud of yourself?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🌟 Very often</div>
                <div class="option hover:bg-emerald-200">✨ Regularly</div>
                <div class="option hover:bg-emerald-200">💫 Sometimes</div>
                <div class="option hover:bg-emerald-200">⭐ Rarely</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="23">
            <h3 class="question-text text-emerald-800">Q23. How do you approach personal growth?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🚀 Actively seek opportunities</div>
                <div class="option hover:bg-emerald-200">🌱 Open to learning</div>
                <div class="option hover:bg-emerald-200">🍃 When necessary</div>
                <div class="option hover:bg-emerald-200">🌿 Prefer comfort zone</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="24">
            <h3 class="question-text text-emerald-800">Q24. How do you feel about asking for help?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🤝 Comfortable asking</div>
                <div class="option hover:bg-emerald-200">🫂 Sometimes hesitant</div>
                <div class="option hover:bg-emerald-200">👥 Prefer handling alone</div>
                <div class="option hover:bg-emerald-200">🕊️ Very difficult</div>
            </div>
        </div>

        <div class="question-card bg-emerald-50/80 backdrop-blur-sm shadow-lg" data-index="25">
            <h3 class="question-text text-emerald-800">Q25. How do you handle major life changes?</h3>
            <div class="options">
                <div class="option hover:bg-emerald-200">🌈 Embrace change easily</div>
                <div class="option hover:bg-emerald-200">✨ Adapt gradually</div>
                <div class="option hover:bg-emerald-200">🌟 Find it challenging</div>
                <div class="option hover:bg-emerald-200">⭐ Strongly resist change</div>
            </div>
        </div>
        <div class="flex justify-center mt-8 mb-12">
            <button id="submit-quiz" class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-4 px-12 rounded-full transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-emerald-400/50 backdrop-blur-sm flex items-center gap-3">
                <a href="./sol_n_track.php"><span class="text-xl">Submit & View Results</span></a>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>
        </div>


    </div>
    <?php include 'header/footer.php'; ?>
</body>

</html>