<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 – Page Not Found | We Care Dentist</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --mint: #d6f0eb;
            --teal: #1a8f7f;
            --teal-dark: #136b5e;
            --cream: #f7f5f0;
            --charcoal: #1e2a28;
            --muted: #7a9490;
            --white: #ffffff;
            --red-soft: #fdecea;
            --red: #e05a4e;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--cream);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            overflow-y: auto;
            position: relative;
            padding: 24px;
        }

        /* Background blobs */
        body::before {
            content: '';
            position: fixed;
            top: -140px; right: -140px;
            width: 440px; height: 440px;
            border-radius: 50%;
            background: radial-gradient(circle, #fde8d8 0%, transparent 70%);
            opacity: 0.6;
            pointer-events: none;
        }
        body::after {
            content: '';
            position: fixed;
            bottom: -100px; left: -100px;
            width: 380px; height: 380px;
            border-radius: 50%;
            background: radial-gradient(circle, var(--mint) 0%, transparent 70%);
            opacity: 0.5;
            pointer-events: none;
        }

        /* Decorative teeth */
        .deco-tooth {
            position: fixed;
            font-size: 80px;
            opacity: 0.06;
            pointer-events: none;
            user-select: none;
        }
        .deco-tooth:nth-child(1) { top: 10%; left: 6%; font-size: 110px; transform: rotate(-20deg); }
        .deco-tooth:nth-child(2) { bottom: 14%; right: 6%; font-size: 75px; transform: rotate(18deg); }
        .deco-tooth:nth-child(3) { top: 58%; left: 3%; font-size: 52px; transform: rotate(8deg); }

        /* Card */
        .card {
            background: var(--white);
            border-radius: 28px;
            padding: clamp(32px, 5vh, 56px) clamp(24px, 5vw, 56px);
            max-width: 540px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 10;
            box-shadow:
                0 2px 4px rgba(26,143,127,0.05),
                0 8px 24px rgba(26,143,127,0.08),
                0 32px 64px rgba(26,143,127,0.1);
            animation: floatUp 0.7s cubic-bezier(0.22,1,0.36,1) both;
        }

        /* Top accent bar */
        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 12%; right: 12%;
            height: 4px;
            background: linear-gradient(90deg, #e05a4e, #f4a07a);
            border-radius: 0 0 8px 8px;
        }

        @keyframes floatUp {
            from { opacity: 0; transform: translateY(32px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* 404 Big number */
        .big-404 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(5rem, 18vw, 8rem);
            font-weight: 600;
            line-height: 1;
            letter-spacing: -4px;
            margin-bottom: clamp(8px, 2vh, 16px);
            animation: floatUp 0.6s 0.1s both;
            position: relative;
            display: inline-block;
        }

        .big-404 .num { color: var(--charcoal); }
        .big-404 .tooth-mid {
            display: inline-block;
            font-size: clamp(4rem, 14vw, 6.5rem);
            transform: translateY(4px);
            animation: wobble 3s ease-in-out infinite;
            letter-spacing: 0;
        }

        @keyframes wobble {
            0%, 100% { transform: translateY(4px) rotate(-4deg); }
            50%       { transform: translateY(-2px) rotate(4deg); }
        }

        .badge {
            display: inline-block;
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--red);
            background: var(--red-soft);
            padding: 5px 14px;
            border-radius: 100px;
            margin-bottom: clamp(10px, 2vh, 16px);
            animation: floatUp 0.5s 0.2s both;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 600;
            color: var(--charcoal);
            line-height: 1.3;
            margin-bottom: clamp(10px, 2vh, 14px);
            animation: floatUp 0.5s 0.25s both;
        }

        .subtitle {
            font-size: clamp(0.88rem, 2vw, 0.98rem);
            color: var(--muted);
            font-weight: 300;
            line-height: 1.7;
            margin-bottom: clamp(20px, 3vh, 32px);
            animation: floatUp 0.5s 0.3s both;
        }

        .divider {
            width: 48px; height: 2px;
            background: var(--mint);
            margin: 0 auto clamp(16px, 3vh, 28px);
            border-radius: 2px;
            animation: floatUp 0.5s 0.32s both;
        }

        /* Quick links */
        .links-label {
            font-size: 0.78rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 12px;
            animation: floatUp 0.5s 0.35s both;
        }

        .quick-links {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: clamp(20px, 3vh, 28px);
            animation: floatUp 0.5s 0.4s both;
        }

        .quick-link {
            display: flex;
            align-items: center;
            gap: 10px;
            background: var(--cream);
            border-radius: 14px;
            padding: 14px 16px;
            text-decoration: none;
            color: var(--charcoal);
            font-size: 0.88rem;
            font-weight: 500;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
        }

        .quick-link:hover {
            background: var(--mint);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(26,143,127,0.12);
        }

        .quick-link .ql-icon {
            width: 32px; height: 32px;
            background: var(--white);
            border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        }

        .quick-link .ql-icon svg {
            width: 16px; height: 16px;
            color: var(--teal);
        }

        /* Main CTA */
        .btn-wrap {
            animation: floatUp 0.5s 0.45s both;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 30px;
            background: var(--teal);
            color: var(--white);
            text-decoration: none;
            border-radius: 100px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 16px rgba(26,143,127,0.28);
        }

        .btn:hover {
            background: var(--teal-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(26,143,127,0.35);
        }

        .btn svg { width: 16px; height: 16px; transition: transform 0.2s; }
        .btn:hover svg { transform: translateX(3px); }

        .footer-note {
            margin-top: clamp(14px, 2vh, 22px);
            font-size: 0.8rem;
            color: var(--muted);
            animation: floatUp 0.5s 0.5s both;
        }

        @media (max-width: 480px) {
            .card { border-radius: 20px; }
            .deco-tooth, body::before, body::after { display: none; }
            .quick-links { grid-template-columns: 1fr; }
        }

        @media (max-height: 700px) {
            .quick-links { gap: 8px; }
            .quick-link { padding: 10px 14px; }
        }
    </style>
</head>
<body>

    <span class="deco-tooth">🦷</span>
    <span class="deco-tooth">🦷</span>
    <span class="deco-tooth">🦷</span>

    <div class="card">

        <div class="big-404">
            <span class="num">4</span><span class="tooth-mid">🦷</span><span class="num">4</span>
        </div>

        <div class="badge">Page Not Found</div>

        <h1>Oops! Wrong Room.</h1>
        <p class="subtitle">Looks like this page went missing — just like a tooth that needed pulling. Let's get you back on track.</p>

        <div class="divider"></div>

        <p class="links-label">Where would you like to go?</p>

        <div class="quick-links">
            <a href="/" class="quick-link">
                <div class="ql-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </div>
                Home
            </a>
            <a href="blog" class="quick-link">
                <div class="ql-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                Book Appointment
            </a>
            <a href="about" class="quick-link">
                <div class="ql-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                    </svg>
                </div>
                About Us
            </a>
            <a href="blog" class="quick-link">
                <div class="ql-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.13a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .27h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 8.09a16 16 0 006.29 6.29l1.18-1.18a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/>
                    </svg>
                </div>
                Our Blogs
            </a>
        </div>

        <div class="btn-wrap">
            <a href="/" class="btn">
                Take Me Home
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/>
                </svg>
            </a>
        </div>

        <p class="footer-note">We Care Dentist · Your smile is our priority 🦷</p>
    </div>

</body>
</html>