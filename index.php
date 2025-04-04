<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #4f46e5;
            --accent: #8b5cf6;
            --background: #f8fafc;
            --text: #1e293b;
            --card-bg: #ffffff;
            --shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .coming-soon-container {
            max-width: 800px;
            padding: 2rem;
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: var(--shadow);
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p {
            font-size: 1.2rem;
            color: #64748b;
            margin-bottom: 2rem;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .countdown-item {
            background: var(--background);
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            text-align: center;
            min-width: 100px;
        }

        .countdown-item span {
            display: block;
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
        }

        .countdown-item small {
            font-size: 1rem;
            color: #64748b;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .social-links a {
            color: var(--text);
            font-size: 1.5rem;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: var(--primary);
        }

        /* Dark Mode Support */
        [data-theme="dark"] {
            --background: #0f172a;
            --text: #f8fafc;
            --card-bg: #1e293b;
            --shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .countdown {
                flex-wrap: wrap;
            }

            .countdown-item {
                min-width: 80px;
                padding: 1rem;
            }

            .countdown-item span {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

<div class="coming-soon-container">
    <h1>Coming Soon</h1>
    <p>We're working hard to bring you something amazing. Stay tuned!</p>
    
    <!-- Countdown Timer -->
    <div class="countdown">
        <div class="countdown-item">
            <span id="days">00</span>
            <small>Days</small>
        </div>
        <div class="countdown-item">
            <span id="hours">00</span>
            <small>Hours</small>
        </div>
        <div class="countdown-item">
            <span id="minutes">00</span>
            <small>Minutes</small>
        </div>
        <div class="countdown-item">
            <span id="seconds">00</span>
            <small>Seconds</small>
        </div>
    </div>

    <!-- Social Links -->
    <div class="social-links">
        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="#" target="_blank"><i class="fab fa-github"></i></a>
        <a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
    </div>
</div>

<!-- Countdown Timer Script -->
<script>
    // Function to calculate the target date
    function getTargetDate() {
        const now = new Date();
        return new Date(
            now.getTime() + 
            (2 * 24 * 60 * 60 * 1000) + // 2 days
            (20 * 60 * 60 * 1000) +      // 20 hours
            (10 * 60 * 1000)             // 10 minutes
        );
    }

    // Check if the target date is already stored in localStorage
    let countdownDate = localStorage.getItem('countdownDate');

    // If not, set the target date and store it in localStorage
    if (!countdownDate) {
        countdownDate = getTargetDate().getTime();
        localStorage.setItem('countdownDate', countdownDate);
    } else {
        countdownDate = parseInt(countdownDate, 10);
    }

    // Update the countdown every 1 second
    const countdown = setInterval(() => {
        const now = new Date().getTime();
        const distance = countdownDate - now;

        // Calculate days, hours, minutes, and seconds
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result
        document.getElementById("days").innerText = String(days).padStart(2, "0");
        document.getElementById("hours").innerText = String(hours).padStart(2, "0");
        document.getElementById("minutes").innerText = String(minutes).padStart(2, "0");
        document.getElementById("seconds").innerText = String(seconds).padStart(2, "0");

        // If the countdown is over, display a message
        if (distance < 0) {
            clearInterval(countdown);
            document.querySelector(".countdown").innerHTML = "<h2>We're Live Shortly!</h2>";
            localStorage.removeItem('countdownDate'); // Clear the stored date
        }
    }, 1000);
</script>

</body>
</html>