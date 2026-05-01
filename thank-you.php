<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You – We Care Dentist</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --mint: #d6f0eb;
            --teal: #1a8f7f;
            --teal-dark: #136b5e;
            --cream: #f7f5f0;
            --charcoal: #1e2a28;
            --muted: #7a9490;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: var(--cream);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            overflow-y: auto;
            position: relative;
            padding: 20px;
        }

        /* Background decorative elements */
        body::before {
            content: '';
            position: fixed;
            top: -120px;
            right: -120px;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--mint) 0%, transparent 70%);
            opacity: 0.7;
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -100px;
            left: -100px;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            background: radial-gradient(circle, #c8e8f5 0%, transparent 70%);
            opacity: 0.5;
            pointer-events: none;
        }

        /* Floating tooth illustration */
        .deco-tooth {
            position: fixed;
            font-size: 80px;
            opacity: 0.06;
            pointer-events: none;
            user-select: none;
        }

        .deco-tooth:nth-child(1) {
            top: 12%;
            left: 8%;
            font-size: 100px;
            transform: rotate(-15deg);
        }

        .deco-tooth:nth-child(2) {
            bottom: 18%;
            right: 7%;
            font-size: 70px;
            transform: rotate(20deg);
        }

        .deco-tooth:nth-child(3) {
            top: 55%;
            left: 4%;
            font-size: 50px;
            transform: rotate(5deg);
        }

        .card {
            background: var(--white);
            border-radius: 28px;
            padding: clamp(28px, 5vh, 52px) clamp(24px, 5vw, 52px);
            max-width: 520px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 10;
            box-shadow:
                0 2px 4px rgba(26, 143, 127, 0.05),
                0 8px 24px rgba(26, 143, 127, 0.08),
                0 32px 64px rgba(26, 143, 127, 0.1);
            animation: floatUp 0.7s cubic-bezier(0.22, 1, 0.36, 1) both;
        }

        @keyframes floatUp {
            from {
                opacity: 0;
                transform: translateY(32px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Top accent bar */
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 12%;
            right: 12%;
            height: 4px;
            background: linear-gradient(90deg, var(--teal), #5bc8ba);
            border-radius: 0 0 8px 8px;
        }

        .icon-wrap {
            width: clamp(56px, 8vh, 80px);
            height: clamp(56px, 8vh, 80px);
            background: var(--mint);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto clamp(16px, 3vh, 28px);
            animation: popIn 0.5s 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.5);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .icon-wrap svg {
            width: 38px;
            height: 38px;
        }

        .badge {
            display: inline-block;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--teal);
            background: var(--mint);
            padding: 5px 14px;
            border-radius: 100px;
            margin-bottom: 16px;
            animation: floatUp 0.5s 0.2s both;
        }

        h1 {
            font-family: 'Open Sans', sans-serif;
            font-size: clamp(1.8rem, 4vw, 2.4rem);
            font-weight: 600;
            color: var(--charcoal);
            line-height: 1.2;
            margin-bottom: clamp(10px, 2vh, 16px);
            animation: floatUp 0.5s 0.25s both;
        }

        .subtitle {
            font-size: clamp(0.88rem, 2vw, 1rem);
            color: var(--muted);
            font-weight: 300;
            line-height: 1.7;
            margin-bottom: clamp(20px, 3vh, 36px);
            animation: floatUp 0.5s 0.3s both;
        }

        .divider {
            width: 48px;
            height: 2px;
            background: var(--mint);
            margin: 0 auto clamp(16px, 3vh, 32px);
            border-radius: 2px;
            animation: floatUp 0.5s 0.35s both;
        }

        .info-row {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--cream);
            border-radius: 14px;
            padding: clamp(12px, 2vh, 16px) 20px;
            margin-bottom: 10px;
            text-align: left;
            animation: floatUp 0.5s 0.4s both;
        }

        .info-icon {
            width: 36px;
            height: 36px;
            background: var(--white);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.06);
        }

        .info-icon svg {
            width: 18px;
            height: 18px;
            color: var(--teal);
        }

        .info-text {
            font-size: 0.88rem;
            color: var(--charcoal);
            font-weight: 400;
        }

        .info-text strong {
            display: block;
            font-weight: 500;
            margin-bottom: 2px;
        }

        .info-text span {
            color: var(--muted);
            font-size: 0.82rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: clamp(20px, 3vh, 32px);
            padding: 13px 30px;
            background: var(--teal);
            color: var(--white);
            text-decoration: none;
            border-radius: 100px;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.01em;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(26, 143, 127, 0.3);
            animation: floatUp 0.5s 0.5s both;
        }

        .btn:hover {
            background: var(--teal-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(26, 143, 127, 0.35);
        }

        .btn svg {
            width: 16px;
            height: 16px;
            transition: transform 0.2s;
        }

        .btn:hover svg {
            transform: translateX(3px);
        }

        .footer-note {
            margin-top: clamp(14px, 2vh, 24px);
            font-size: 0.8rem;
            color: var(--muted);
            animation: floatUp 0.5s 0.55s both;
        }

        @media (max-width: 480px) {
            .card {
                border-radius: 20px;
            }

            .deco-tooth {
                display: none;
            }

            body::before,
            body::after {
                display: none;
            }
        }

        @media (max-height: 700px) {
            .badge {
                margin-bottom: 10px;
            }

            .info-row {
                padding: 10px 16px;
                margin-bottom: 8px;
            }

            .info-icon {
                width: 30px;
                height: 30px;
            }

            .info-icon svg {
                width: 15px;
                height: 15px;
            }
        }

        /* Confetti dots */
        .confetti {
            position: fixed;
            width: 8px;
            height: 8px;
            border-radius: 2px;
            pointer-events: none;
            animation: fall linear forwards;
            z-index: 5;
        }

        @keyframes fall {
            0% {
                transform: translateY(-20px) rotate(0deg);
                opacity: 1;
            }

            100% {
                transform: translateY(110vh) rotate(720deg);
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <span class="deco-tooth">🦷</span>
    <span class="deco-tooth">🦷</span>
    <span class="deco-tooth">🦷</span>

    <div class="card">
        <div class="icon-wrap">
            <svg viewBox="0 0 24 24" fill="none" stroke="#1a8f7f" stroke-width="2.2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="M20 6L9 17l-5-5" />
            </svg>
        </div>

        <div class="badge">Form Received</div>

        <h1>Thank You!</h1>
        <p class="subtitle">Your message is in good hands. Our team will be in touch with you very soon.</p>

        <div class="divider"></div>

        <div class="info-row">
            <div class="info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <line x1="16" y1="2" x2="16" y2="6" />
                    <line x1="8" y1="2" x2="8" y2="6" />
                    <line x1="3" y1="10" x2="21" y2="10" />
                </svg>
            </div>
            <div class="info-text">
                <strong>Response Time</strong>
                <span>We typically respond within 24 hours</span>
            </div>
        </div>

        <div class="info-row" style="animation-delay:0.45s">
            <div class="info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path
                        d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.13a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .27h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.09a16 16 0 006.29 6.29l1.18-1.18a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z" />
                </svg>
            </div>
            <div class="info-text">
                <strong>Need Urgent Help?</strong>
                <span>Call us directly for immediate assistance</span>
            </div>
        </div>

        <a href="https://wecaredentist.com/" class="btn">
            Back to Home
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12" />
                <polyline points="12 5 19 12 12 19" />
            </svg>
        </a>

        <p class="footer-note">We Care Dentist · Your smile is our priority 🦷</p>
    </div>

    <script>
        // Confetti burst on load
        const colors = ['#1a8f7f', '#5bc8ba', '#d6f0eb', '#a8ddd7', '#f4c94a', '#f9a8d4'];
        function makeConfetti() {
            for (let i = 0; i < 48; i++) {
                const el = document.createElement('div');
                el.className = 'confetti';
                el.style.cssText = `
                    left: ${Math.random() * 100}vw;
                    top: -10px;
                    background: ${colors[Math.floor(Math.random() * colors.length)]};
                    width: ${4 + Math.random() * 8}px;
                    height: ${4 + Math.random() * 8}px;
                    border-radius: ${Math.random() > 0.5 ? '50%' : '2px'};
                    animation-duration: ${1.5 + Math.random() * 2}s;
                    animation-delay: ${Math.random() * 0.8}s;
                `;
                document.body.appendChild(el);
                el.addEventListener('animationend', () => el.remove());
            }
        }
        window.addEventListener('load', makeConfetti);
    </script>
</body>

</html>