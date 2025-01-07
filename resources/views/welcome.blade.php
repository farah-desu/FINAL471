<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOOD - Stay Focused, Stay Motivated</title>
    <link rel="stylesheet" href="land.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">MOOD</div>
            <ul class="nav-links">
                <li><a href="#features">Features</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            <div class="auth-links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="auth-btn">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="auth-btn">Log in</a>
                        <a href="{{ route('register') }}" class="auth-btn">Register</a>
                    @endauth
                @endif
            </div>
        </nav>
    </header>

    <section id="features" class="features">
        <h2>Features</h2>
        <div class="feature-list">
            <div class="feature">
                <h3>Study Tracking</h3>
                <p>Log your study sessions and track your focus and progress over time by redeeming your time coins.</p>
            </div>
            <div class="feature">
                <h3>Motivational Insights</h3>
                <p>Receive motivation and tips to stay motivated.</p>
            </div>
            <div class="feature">
                <h3>Custom Study Environments</h3>
                <p>Create a study environment that suits your mood and helps you stay in the zone.</p>
            </div>
        </div>
    </section>

    <section id="about" class="about">
        <h2>About MOOD</h2>
        <p>MOOD is designed to help you stay focused, track your progress via a reward system, and maintain a productive study environment. Whether you're working on assignments, learning new skills, or preparing for exams, MOOD helps you create the perfect atmosphere for success.</p>
    </section>

    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <p>We’d love to hear your feedback or answer any questions you may have.</p>
        <a href="mailto:support@moodapp.com">Email Us</a>
    </section>

    <footer>
        <p>&copy; 2024 MOOD. All rights reserved.</p>
    </footer>
</body>
</html>
