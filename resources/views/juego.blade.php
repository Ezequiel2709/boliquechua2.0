<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $categoria->nombre }} - BOLIQUECHUA</title>
    <script>
        (function() {
            var theme = localStorage.getItem('boliquechua_theme') || 'dark';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --pri: #E8450A;
            --pri-dk: #9B2D06;
            --pri-lt: #FF6B35;
            --gold: #F5A623;
            --gold-lt: #FFD166;
            --teal: #00C9A7;
            --bg: #0D0704;
            --bg-dk: #080402;
            --card: #1E0E06;
            --card-dk: #170B04;
            --text: #F0DCC0;
            --muted: #A07050;
            --border: rgba(232,100,10,0.15);
            --glow: rgba(232,69,10,0.5);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Nunito', sans-serif;
            background: var(--bg);
            min-height: 100vh;
        }

        /* Partículas */
        .game-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
        }
        .gp {
            position: absolute;
            width: 3px;
            height: 3px;
            background: var(--pri);
            border-radius: 50%;
            opacity: 0;
            animation: floatParticle 5s linear infinite;
            box-shadow: 0 0 4px var(--pri);
        }
        @keyframes floatParticle {
            0% { opacity: 0; transform: translateY(0) scale(1); }
            10% { opacity: 0.8; }
            90% { opacity: 0.5; }
            100% { opacity: 0; transform: translateY(-100vh) scale(0.2); }
        }

        .app-wrapper {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 20px;
            background: linear-gradient(180deg, var(--bg-dk), transparent);
            border-bottom: 1px solid var(--border);
            flex-wrap: wrap;
            gap: 10px;
        }

        .back-btn {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 40px;
            padding: 8px 18px;
            color: var(--text);
            text-decoration: none;
            font-weight: 600;
            transition: 0.2s;
        }
        .back-btn:hover { background: var(--pri); color: white; }

        .category-info {
            text-align: center;
        }
        .category-icon { font-size: 2em; filter: drop-shadow(0 0 6px var(--pri)); }
        .category-name { font-family: 'Rajdhani', sans-serif; color: var(--text); letter-spacing: 2px; }

        .stats-mini {
            display: flex;
            gap: 15px;
            background: var(--card);
            padding: 6px 18px;
            border-radius: 40px;
            border: 1px solid var(--border);
        }
        .stat-mini { color: var(--text); font-weight: 600; }

        /* Selector de modo */
        .mode-selector {
            display: flex;
            justify-content: center;
            gap: 8px;
            padding: 12px 20px;
            flex-wrap: wrap;
            background: rgba(0,0,0,0.3);
        }
        .mode-btn {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 40px;
            padding: 6px 16px;
            color: var(--muted);
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }
        .mode-btn.active {
            background: var(--pri);
            color: white;
            border-color: var(--pri);
        }

        /* Progreso */
        .progress-section {
            padding: 12px 20px;
        }
        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: 0.7em;
            color: var(--muted);
            margin-bottom: 6px;
        }
        .progress-track {
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            height: 6px;
        }
        .progress-fill {
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, var(--pri), var(--gold));
            border-radius: 10px;
            transition: width 0.3s;
        }

        /* Game container */
        .game-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .game-card {
            background: var(--card);
            border-radius: 32px;
            padding: 30px 25px;
            width: 100%;
            max-width: 550px;
            border: 1px solid var(--border);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        /* ===== Audio (Web Speech API) ===== */
        .audio-banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 20px;
            background: linear-gradient(180deg, rgba(232,69,10,0.12), rgba(0,0,0,0.15));
            border: 1px solid rgba(232,100,10,0.18);
            color: var(--text);
            margin-bottom: 14px;
        }
        .audio-banner .ab-left {
            display: flex;
            flex-direction: column;
            gap: 2px;
            min-width: 0;
        }
        .ab-title {
            font-family: 'Rajdhani', sans-serif;
            letter-spacing: 2px;
            font-weight: 700;
            color: var(--gold-lt);
            font-size: 0.95em;
        }
        .ab-sub {
            color: var(--muted);
            font-size: 0.78em;
            font-weight: 700;
            letter-spacing: 1px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .ab-actions { display: flex; gap: 8px; flex-shrink: 0; }
        .audio-btn {
            background: rgba(8,4,2,0.55);
            border: 1px solid var(--border);
            border-radius: 40px;
            padding: 8px 12px;
            color: var(--text);
            cursor: pointer;
            font-weight: 800;
            letter-spacing: 1px;
            transition: 0.15s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .audio-btn:hover { background: rgba(232,69,10,0.18); border-color: rgba(232,69,10,0.35); box-shadow: 0 0 14px rgba(232,69,10,0.18); }
        .audio-btn:disabled { opacity: 0.45; cursor: not-allowed; box-shadow: none; }
        .audio-btn.small { padding: 6px 10px; font-size: 0.88em; }
        .audio-pill {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
            margin: 10px auto 0;
            padding: 8px 12px;
            border-radius: 60px;
            border: 1px solid rgba(232,100,10,0.18);
            background: rgba(0,0,0,0.18);
            color: var(--muted);
            font-weight: 800;
            letter-spacing: 1px;
            max-width: 100%;
        }
        .speakable {
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }
        .speakable:hover { filter: drop-shadow(0 0 10px rgba(232,69,10,0.22)); }

        /* Opción múltiple */
        .question-word {
            font-family: 'Rajdhani', sans-serif;
            font-size: 2.5em;
            text-align: center;
            color: var(--gold);
            background: var(--bg-dk);
            padding: 25px;
            border-radius: 24px;
            margin-bottom: 25px;
        }
        .question-word .q-word {
            color: var(--gold-lt);
            text-shadow: 0 0 18px rgba(245,166,35,0.15);
        }
        .options-grid {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .option-btn {
            background: var(--bg-dk);
            border: 1px solid var(--border);
            border-radius: 60px;
            padding: 12px 20px;
            text-align: center;
            cursor: pointer;
            transition: 0.1s;
            color: var(--text);
            font-weight: 600;
        }
        .option-btn.correct { background: #2E7D32; border-color: #4CAF50; }
        .option-btn.incorrect { background: #C62828; border-color: #EF5350; }

        /* Flashcard */
        .flashcard {
            background: linear-gradient(135deg, var(--pri-dk), var(--card-dk));
            border-radius: 28px;
            padding: 50px 20px;
            text-align: center;
            cursor: pointer;
        }
        .flashcard-question { font-size: 2em; color: var(--text); }
        .flashcard-answer { font-size: 1.3em; color: var(--gold); margin-top: 20px; display: none; }
        .flashcard-input {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: var(--bg-dk);
            border: 1px solid var(--border);
            border-radius: 60px;
            color: var(--text);
        }

        /* Relacionar */
        .match-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .match-col {
            flex: 1;
            background: var(--bg-dk);
            border-radius: 20px;
            padding: 15px;
        }
        .match-col h4 { text-align: center; color: var(--muted); margin-bottom: 15px; }
        .match-item {
            background: var(--card);
            padding: 10px;
            margin: 8px 0;
            border-radius: 12px;
            text-align: center;
            cursor: pointer;
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        .match-item .mi-text { flex: 1; text-align: center; font-weight: 800; color: var(--text); }
        .match-item .mi-audio {
            border-radius: 40px;
            padding: 6px 10px;
            border: 1px solid rgba(232,100,10,0.18);
            background: rgba(8,4,2,0.45);
            color: var(--muted);
            font-weight: 900;
            cursor: pointer;
            flex-shrink: 0;
        }
        .match-item .mi-audio:hover { color: var(--text); border-color: rgba(232,69,10,0.35); background: rgba(232,69,10,0.12); }
        .match-item.selected { border-color: var(--pri); background: rgba(232,69,10,0.2); }
        .match-item.matched { opacity: 0.5; text-decoration: line-through; cursor: default; }

        /* Escribir */
        .escribir-input {
            width: 100%;
            padding: 14px;
            background: var(--bg-dk);
            border: 1px solid var(--border);
            border-radius: 60px;
            color: var(--text);
            margin: 20px 0;
        }
        .check-btn {
            background: var(--pri);
            border: none;
            border-radius: 60px;
            padding: 10px 25px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .feedback {
            margin: 15px 0;
            padding: 10px;
            border-radius: 30px;
            text-align: center;
        }
        .feedback-correct { background: rgba(46,125,50,0.3); color: #81C784; }
        .feedback-incorrect { background: rgba(198,40,40,0.3); color: #EF9A9A; }
        .next-btn {
            background: var(--gold);
            border: none;
            border-radius: 60px;
            padding: 10px 25px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
        }

        .bottom-nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 15px;
            background: var(--card-dk);
            border-top: 1px solid var(--border);
        }
        .bottom-nav button {
            background: none;
            border: none;
            color: var(--muted);
            font-weight: 600;
            cursor: pointer;
        }
        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.8);
            backdrop-filter: blur(5px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }
        .modal-sheet {
            background: var(--card);
            border-radius: 32px;
            padding: 30px;
            text-align: center;
            width: 90%;
            max-width: 320px;
        }
        .modal-sheet button {
            background: var(--pri);
            border: none;
            border-radius: 40px;
            padding: 10px 20px;
            margin: 10px;
            color: white;
            cursor: pointer;
        }
        /* ====== THEME TOGGLE BUTTON ====== */
        .theme-toggle-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: var(--card);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 8px 14px;
            border-radius: 40px;
            cursor: pointer;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.9em;
            font-weight: 700;
            letter-spacing: 1px;
            transition: all 0.2s;
            user-select: none;
        }
        .theme-toggle-btn:hover {
            background: var(--pri);
            color: white;
            border-color: var(--pri);
            transform: translateY(-1px);
        }
        .theme-icon {
            font-size: 1.1em;
            display: inline-block;
            transition: transform 0.3s;
        }
        .theme-toggle-btn:hover .theme-icon {
            transform: rotate(20deg) scale(1.1);
        }
        .theme-lbl {
            font-size: 0.85em;
            font-weight: 800;
            text-transform: uppercase;
        }

        /* ====== MODO CLARO (LIGHT THEME) ====== */
        html[data-theme="light"] {
            --bg: #fbf8f3;
            --bg-dk: #f3ece0;
            --card: #ffffff;
            --card-dk: #f8f3eb;
            --text: #23150c;
            --muted: #6b5344;
            --border: rgba(214, 60, 10, 0.18);
            --glow: rgba(214, 60, 10, 0.25);
        }

        html[data-theme="light"] body {
            background: var(--bg);
            color: var(--text);
        }

        html[data-theme="light"] .header {
            background: rgba(251, 248, 243, 0.95);
            border-bottom: 1px solid rgba(214, 60, 10, 0.16);
        }

        html[data-theme="light"] .back-btn,
        html[data-theme="light"] .stats-mini,
        html[data-theme="light"] .theme-toggle-btn {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.16);
            color: #23150c;
            box-shadow: 0 4px 12px rgba(90, 40, 10, 0.05);
        }
        html[data-theme="light"] .theme-toggle-btn:hover,
        html[data-theme="light"] .back-btn:hover {
            background: var(--pri);
            color: #ffffff;
        }

        html[data-theme="light"] .category-name {
            color: #23150c;
        }

        html[data-theme="light"] .mode-selector {
            background: rgba(240, 231, 219, 0.55);
        }

        html[data-theme="light"] .mode-btn {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.16);
            color: #6b5344;
        }

        html[data-theme="light"] .mode-btn.active {
            background: var(--pri);
            color: #ffffff;
            border-color: var(--pri);
        }

        html[data-theme="light"] .game-card {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.16);
            box-shadow: 0 16px 45px rgba(90, 40, 10, 0.09);
        }

        html[data-theme="light"] .audio-banner {
            background: linear-gradient(180deg, rgba(214, 60, 10, 0.08), rgba(245, 166, 35, 0.05));
            border-color: rgba(214, 60, 10, 0.16);
        }
        html[data-theme="light"] .ab-title {
            color: #c98500;
        }
        html[data-theme="light"] .audio-btn {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.2);
            color: #23150c;
        }
        html[data-theme="light"] .audio-pill {
            background: rgba(240, 231, 219, 0.6);
            border-color: rgba(214, 60, 10, 0.16);
            color: #6b5344;
        }

        html[data-theme="light"] .question-word {
            background: #f7f1e6;
            color: #c98500;
        }
        html[data-theme="light"] .question-word .q-word {
            color: #d63c0a;
            text-shadow: none;
        }

        html[data-theme="light"] .option-btn {
            background: #f7f1e6;
            border-color: rgba(214, 60, 10, 0.16);
            color: #23150c;
        }
        html[data-theme="light"] .option-btn:hover {
            background: #eedfcb;
            border-color: var(--pri);
        }

        html[data-theme="light"] .flashcard {
            background: linear-gradient(135deg, #fff3eb, #fbf0e6);
            border: 1px solid rgba(214, 60, 10, 0.22);
            box-shadow: 0 10px 30px rgba(90, 40, 10, 0.08);
        }
        html[data-theme="light"] .flashcard-question {
            color: #23150c;
        }
        html[data-theme="light"] .flashcard-answer {
            color: #c98500;
        }
        html[data-theme="light"] .flashcard-input {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.25);
            color: #23150c;
        }

        html[data-theme="light"] .match-col {
            background: #f7f1e6;
        }
        html[data-theme="light"] .match-item {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.16);
        }
        html[data-theme="light"] .match-item .mi-text {
            color: #23150c;
        }
        html[data-theme="light"] .match-item .mi-audio {
            background: #f7f1e6;
            border-color: rgba(214, 60, 10, 0.18);
            color: #6b5344;
        }

        html[data-theme="light"] .escribir-input {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.25);
            color: #23150c;
        }

        html[data-theme="light"] .bottom-nav {
            background: rgba(251, 248, 243, 0.95);
            border-top: 1px solid rgba(214, 60, 10, 0.16);
        }
        html[data-theme="light"] .bottom-nav button {
            color: #6b5344;
        }

        html[data-theme="light"] .modal-sheet {
            background: #ffffff;
            border: 1px solid rgba(214, 60, 10, 0.2);
            box-shadow: 0 20px 60px rgba(90, 40, 10, 0.2);
            color: #23150c;
        }
        html[data-theme="light"] .modal-sheet h2 {
            color: #23150c;
        }
        html[data-theme="light"] .modal-sheet p {
            color: #6b5344;
        }

        .mascota-animada {
            position: absolute;
            top: 35%;
            left: 2%;
            width: clamp(180px, 22vw, 280px);
            pointer-events: none;
            z-index: 1;
        }

        @media (max-width: 850px) {
            .game-container {
                flex-direction: column;
                justify-content: flex-start;
            }
            .mascota-animada {
                position: relative;
                top: auto;
                left: auto;
                width: 150px;
                margin-bottom: 10px;
            }
        }

        .duo-banner-wrapper {
            position: fixed;
            bottom: -300px;
            left: 0;
            width: 100%;
            z-index: 900;
            transition: bottom 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            /* Sombra para diferenciarlo del contenido de fondo */
            box-shadow: 0 -4px 20px rgba(0,0,0,0.15);
        }
        .duo-banner-wrapper.show {
            bottom: 50px; /* Queda justo sobre el bottom-nav */
        }
        .duo-banner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 10%;
            font-family: 'Rajdhani', sans-serif;
            box-sizing: border-box;
        }
        .duo-banner.correct {
            background-color: #d7ffb8;
            color: #58a700;
            border-top: 2px solid #58a700;
        }
        .duo-banner.correct .duo-btn-siguiente {
            background-color: #58a700;
            color: white;
            box-shadow: 0 4px 0 #468500;
        }
        .duo-banner.incorrect {
            background-color: #ffdfe0;
            color: #ea2b2b;
            border-top: 2px solid #ea2b2b;
        }
        .duo-banner.incorrect .duo-btn-siguiente {
            background-color: #ea2b2b;
            color: white;
            box-shadow: 0 4px 0 #cc2020;
        }

        .duo-banner-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .duo-banner-left img {
            width: 90px;
            height: auto;
            animation: floatUp 0.5s ease-out;
        }
        .duo-banner-text {
            display: flex;
            flex-direction: column;
        }
        #duo-banner-title {
            font-size: 2em;
            font-weight: 800;
            margin: 0;
        }
        #duo-banner-subtitle {
            font-size: 1.2em;
            font-weight: 600;
            opacity: 0.9;
        }

        .duo-btn-siguiente {
            border: none;
            border-radius: 16px;
            padding: 15px 50px;
            font-size: 1.2em;
            font-weight: 800;
            text-transform: uppercase;
            cursor: pointer;
            transition: transform 0.1s, box-shadow 0.1s;
        }
        .duo-btn-siguiente:active {
            transform: translateY(4px);
            box-shadow: 0 0 0 transparent !important;
        }

        @keyframes floatUp {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        @media (max-width: 600px) {
            .game-card { padding: 20px; }
            .question-word { font-size: 1.8em; padding: 15px; }
            .audio-banner { border-radius: 18px; }
            .theme-lbl { display: none; }
            
            .duo-banner {
                flex-direction: column;
                padding: 15px;
                gap: 15px;
            }
            .duo-banner-left {
                width: 100%;
                justify-content: flex-start;
            }
            .duo-banner-left img {
                width: 70px;
            }
            .duo-banner-right {
                width: 100%;
            }
            .duo-btn-siguiente {
                width: 100%;
            }
            .duo-banner-wrapper.show {
                bottom: 45px; 
            }
        }
    </style>
</head>
<body>

<!-- Banner estilo Duolingo -->
<div id="duo-banner-wrapper" class="duo-banner-wrapper">
    <div id="duo-banner" class="duo-banner correct">
        <div class="duo-banner-left">
            <img id="duo-banner-img" src="{{ asset('animaciones condorio en gif/correcto.svg') }}" alt="Icono">
            <div id="duo-banner-text" class="duo-banner-text">
                <div id="duo-banner-title">¡Correcto!</div>
                <div id="duo-banner-subtitle"></div>
            </div>
        </div>
        <div class="duo-banner-right">
            <button id="duo-banner-btn" class="duo-btn-siguiente">Continuar</button>
        </div>
    </div>
</div>

<div class="game-particles" id="particles"></div>

<div class="app-wrapper">
    <div class="header">
        <div style="display: flex; align-items: center; gap: 8px;">
            <a href="{{ url('/categorias') }}" class="back-btn">← Volver</a>
            <button class="theme-toggle-btn" id="gameThemeToggleBtn" onclick="toggleTheme()" title="Cambiar modo claro / oscuro">
                <span class="theme-icon">☀️</span>
                <span class="theme-lbl">Modo</span>
            </button>
        </div>
        <div class="category-info">
            <div class="category-icon">{{ $categoria->icono }}</div>
            <div class="category-name">{{ $categoria->nombre }}</div>
        </div>
        <div class="stats-mini">
            <div class="stat-mini">❤️ <span id="vidasDisplay">{{ $vidas }}</span></div>
            <div class="stat-mini">⭐ <span id="puntosDisplay">0</span></div>
        </div>
    </div>

    <div class="mode-selector" id="modeSelector">
        <button class="mode-btn active" data-mode="multiple">📖 Opción múltiple</button>
        <button class="mode-btn" data-mode="flashcards">🃏 Flashcards</button>
        <button class="mode-btn" data-mode="match">🔗 Relacionar</button>
        <button class="mode-btn" data-mode="escribir">✍️ ¿Cómo se dice?</button>
    </div>

    <div class="progress-section">
        <div class="progress-label"><span>Progreso</span><span id="progresoText">0/0</span></div>
        <div class="progress-track"><div class="progress-fill" id="progressFill"></div></div>
    </div>

    <div class="game-container" id="gameContainer" style="position: relative;">
        <!-- Mascota esperando animada (procesada sin fondo) -->
        <img id="mascotaAnimada" class="mascota-animada" src="{{ asset('animaciones condorio en gif/condorio esperando_processed.gif') }}" alt="Condorio animado">
        
        <div class="game-card" id="gameContent">Cargando...</div>
    </div>

    <div class="bottom-nav" style="position: relative; z-index: 1000;">
        <button onclick="location.reload()">🔄 Reiniciar</button>
        <button onclick="window.location.href='{{ route('categorias') }}'">🏠 Inicio</button>
    </div>
</div>

<div class="modal-overlay" id="resultModal">
    <div class="modal-sheet">
        <h2>🏁 Juego completado</h2>
        <p id="modalMessage"></p>
        <button onclick="cerrarModalYReiniciar()">🔄 Jugar de nuevo</button>
        <button onclick="window.location.href='{{ route('categorias') }}'">🏠 Ir a inicio</button>
    </div>
</div>

<script>
    // Datos desde PHP
    const palabras = @json($palabras);
    let currentIndex = 0;
    let puntos = 0;
    let vidas = {{ $vidas }};
    const vidasIniciales = {{ $vidas }};
    let waitingResponse = false;
    let progresoGuardado = false;

    // Detectar modo de juego desde la URL (?modo=...)
    const urlParams = new URLSearchParams(window.location.search);
    let urlMode = (urlParams.get('modo') || '').toLowerCase();
    if (urlMode === 'flashcard') urlMode = 'flashcards';
    if (urlMode === 'relacionar') urlMode = 'match';
    if (urlMode === 'comodice') urlMode = 'escribir';

    const validModes = ['multiple', 'flashcards', 'match', 'escribir'];
    let currentMode = validModes.includes(urlMode) ? urlMode : 'multiple';

    // Sincronizar botones de modo con el modo activo
    document.querySelectorAll('.mode-btn').forEach(btn => {
        if (btn.dataset.mode === currentMode) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });

    // Variables para modo Relacionar (Match)
    const MATCH_BATCH_SIZE = 5;
    let matchBatches = [];
    let matchBatchIndex = 0;
    let matchSelected = null;
    let matchMatched = 0;

    // ===================== POPUPS ANIMADOS =====================
    function mostrarFeedbackBanner(esCorrecto, extraMensaje = '', onContinue = null) {
        const wrapper = document.getElementById('duo-banner-wrapper');
        const banner = document.getElementById('duo-banner');
        const img = document.getElementById('duo-banner-img');
        const title = document.getElementById('duo-banner-title');
        const subtitle = document.getElementById('duo-banner-subtitle');
        const btn = document.getElementById('duo-banner-btn');

        if (esCorrecto) {
            banner.className = 'duo-banner correct';
            img.src = "{{ asset('animaciones condorio en gif/correcto.svg') }}";
            title.innerText = '¡Correcto!';
            subtitle.innerText = extraMensaje;
        } else {
            banner.className = 'duo-banner incorrect';
            img.src = "{{ asset('animaciones condorio en gif/incorrecto.svg') }}";
            title.innerText = 'Incorrecto';
            subtitle.innerText = extraMensaje;
        }

        btn.onclick = () => {
            wrapper.classList.remove('show');
            if (onContinue) onContinue();
        };

        // Limpiar botones antiguos si existen
        document.querySelectorAll('#nextBtn, #nextFlashBtn, #nextMatchBtn, #nextEscribirBtn').forEach(el => el.innerHTML = '');

        wrapper.classList.add('show');
    }

    // ===================== AUDIO (Web Speech API) =====================
    const AUDIO = {
        supported: typeof window !== 'undefined' && 'speechSynthesis' in window && typeof window.SpeechSynthesisUtterance !== 'undefined',
        voicesReady: false,
        selectedVoice: null,
        last: { text: '', lang: 'es-PE', rate: 0.95, pitch: 1.05 }
    };

    function escapeHtml(str) {
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    function getVoicesSafe() {
        if (!AUDIO.supported) return [];
        try { return window.speechSynthesis.getVoices() || []; }
        catch (e) { return []; }
    }

    function pickVoice(preferredLangs = ['es-PE', 'es-BO', 'es-ES', 'es']) {
        const voices = getVoicesSafe();
        if (!voices.length) return null;

        const norm = (s) => String(s || '').toLowerCase();
        const langs = preferredLangs.map(l => norm(l));

        for (const l of langs) {
            const v = voices.find(vv => norm(vv.lang) === l);
            if (v) return v;
        }
        for (const l of langs) {
            const v = voices.find(vv => norm(vv.lang).startsWith(l));
            if (v) return v;
        }
        const vEs = voices.find(vv => norm(vv.lang).startsWith('es'));
        return vEs || voices[0] || null;
    }

    function ensureVoices() {
        if (!AUDIO.supported) return;
        const voices = getVoicesSafe();
        if (voices.length) {
            AUDIO.voicesReady = true;
            AUDIO.selectedVoice = AUDIO.selectedVoice || pickVoice();
        }
    }

    if (AUDIO.supported) {
        ensureVoices();
        window.speechSynthesis.onvoiceschanged = () => ensureVoices();
    }

    function stopSpeech() {
        if (!AUDIO.supported) return;
        try { window.speechSynthesis.cancel(); } catch (e) {}
        
        const mascota = document.getElementById('mascotaAnimada');
        if (mascota) {
            mascota.src = "{{ asset('animaciones condorio en gif/condorio esperando_processed.gif') }}";
        }
    }

    function speakText(text, opts = {}) {
        const t = String(text || '').trim();
        if (!t) return;

        if (!AUDIO.supported) {
            showAudioUnsupportedOnce();
            return;
        }

        ensureVoices();
        stopSpeech();

        const utter = new SpeechSynthesisUtterance(t);
        utter.lang = opts.lang || 'es-PE';
        utter.rate = typeof opts.rate === 'number' ? opts.rate : 0.95;
        utter.pitch = typeof opts.pitch === 'number' ? opts.pitch : 1.05;
        utter.volume = typeof opts.volume === 'number' ? opts.volume : 1;

        const voice = opts.voice || AUDIO.selectedVoice || pickVoice([utter.lang, 'es-PE', 'es-BO', 'es-ES', 'es']);
        if (voice) utter.voice = voice;

        AUDIO.last = { text: t, lang: utter.lang, rate: utter.rate, pitch: utter.pitch };

        const mascota = document.getElementById('mascotaAnimada');
        if (mascota) {
            utter.onstart = () => {
                mascota.src = "{{ asset('animaciones condorio en gif/condorio_hablando_processed.gif') }}";
            };
            utter.onend = () => {
                mascota.src = "{{ asset('animaciones condorio en gif/condorio esperando_processed.gif') }}";
            };
            utter.onerror = () => {
                mascota.src = "{{ asset('animaciones condorio en gif/condorio esperando_processed.gif') }}";
            };
        }

        try { window.speechSynthesis.speak(utter); }
        catch (e) { showAudioUnsupportedOnce(); }
    }

    function speakQuechua(text) {
        speakText(text, { lang: 'es-PE', rate: 0.90, pitch: 1.03 });
        updateAudioBannerSubtitle(`Último audio: ${text}`);
    }

    function speakSpanish(text) {
        speakText(text, { lang: 'es-PE', rate: 0.98, pitch: 1.02 });
        updateAudioBannerSubtitle(`Último audio: ${text}`);
    }

    function repeatLastAudio() {
        if (!AUDIO.last.text) return;
        speakText(AUDIO.last.text, { lang: AUDIO.last.lang, rate: AUDIO.last.rate, pitch: AUDIO.last.pitch });
    }

    let audioUnsupportedShown = false;
    function showAudioUnsupportedOnce() {
        if (audioUnsupportedShown) return;
        audioUnsupportedShown = true;
        const el = document.getElementById('gameContent');
        if (!el) return;
        const warning = `
          <div class="feedback feedback-incorrect" style="margin-bottom:12px;">
            ⚠️ Tu navegador no soporta Web Speech API (audio). Prueba en Chrome / Edge actualizado.
          </div>
        `;
        el.innerHTML = warning + el.innerHTML;
    }

    function audioBannerHtml(modeLabel) {
        const disabled = AUDIO.supported ? '' : 'disabled';
        const sub = AUDIO.supported ? 'Toca 🔊 para escuchar la pronunciación.' : 'Audio no disponible en este navegador.';
        return `
          <div class="audio-banner" id="audioBanner">
            <div class="ab-left">
              <div class="ab-title">🔊 ${escapeHtml(modeLabel)}</div>
              <div class="ab-sub" id="audioBannerSub">${escapeHtml(sub)}</div>
            </div>
            <div class="ab-actions">
              <button class="audio-btn small" ${disabled} onclick="repeatLastAudio()">⟲ Repetir</button>
              <button class="audio-btn small" ${disabled} onclick="stopSpeech()">⏹️ Parar</button>
            </div>
          </div>
        `;
    }

    function updateAudioBannerSubtitle(text) {
        const s = document.getElementById('audioBannerSub');
        if (!s) return;
        s.textContent = String(text || '');
    }

    function roundIntroForMode(mode) {
        if (mode === 'multiple') return { label: 'Opción múltiple', intro: 'Escucha la palabra y elige la respuesta correcta.' };
        if (mode === 'flashcards') return { label: 'Flashcards', intro: 'Escucha y escribe la traducción en español.' };
        if (mode === 'match') return { label: 'Relacionar', intro: 'Escucha y relaciona: quechua con español.' };
        return { label: '¿Cómo se dice?', intro: 'Escucha y escribe la palabra en quechua.' };
    }

    function speakRoundIntro(mode) {
        const { intro } = roundIntroForMode(mode);
        speakSpanish(intro);
    }

    function renderQuechuaSpeakable(word, opts = {}) {
        const w = String(word || '');
        const size = opts.size === 'small' ? 'small' : '';
        return `
          <span class="speakable" onclick="speakQuechua('${w.replace(/'/g, "\\'")}')">
            <span class="q-word">${escapeHtml(w)}</span>
            <button class="audio-btn ${size}" ${AUDIO.supported ? '' : 'disabled'} onclick="event.stopPropagation(); speakQuechua('${w.replace(/'/g, "\\'")}')">🔊</button>
          </span>
        `;
    }

    function actualizarUI() {
        document.getElementById('vidasDisplay').innerText = vidas;
        document.getElementById('puntosDisplay').innerText = puntos;
        let progreso = palabras.length > 0 ? Math.round((currentIndex / palabras.length) * 100) : 0;
        document.getElementById('progressFill').style.width = progreso + '%';
        document.getElementById('progresoText').innerText = `${currentIndex}/${palabras.length}`;
    }

    function guardarProgresoEnServidor() {
        if (progresoGuardado) return;
        progresoGuardado = true;
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        fetch('{{ route("guardar.progreso") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                puntos: puntos,
                vidas: vidas
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const saveNotice = document.getElementById('saveNotice');
                if (saveNotice) {
                    saveNotice.innerHTML = `✅ ¡Puntaje guardado! (Puntos totales: ${data.puntuacion_total} | Racha: ${data.racha_dias} días)`;
                }
            }
        })
        .catch(err => console.error('Error guardando progreso:', err));
    }

    function gameOver() {
        document.getElementById('modalMessage').innerHTML = `
            ⭐ Puntos ganados: <strong>+${puntos}</strong><br>
            ❤️ Vidas restantes: <strong>${vidas}</strong><br>
            📚 Palabras completadas: <strong>${currentIndex}/${palabras.length}</strong>
            <div id="saveNotice" style="margin-top:10px; font-size:0.9em; color:var(--teal);">💾 Guardando progreso...</div>
        `;
        document.getElementById('resultModal').style.display = 'flex';
        guardarProgresoEnServidor();
    }

    function cerrarModalYReiniciar() {
        document.getElementById('resultModal').style.display = 'none';
        currentIndex = 0;
        puntos = 0;
        progresoGuardado = false;
        if (vidas <= 0) vidas = 5;
        waitingResponse = false;
        matchBatches = [];
        actualizarUI();
        cargarJuego();
    }

    function siguientePalabra() {
        if (currentIndex + 1 < palabras.length) {
            currentIndex++;
            cargarJuego();
        } else {
            gameOver();
        }
    }

    // ===================== MODO MÚLTIPLE =====================
    function cargarMultiple() {
        if (!palabras || palabras.length === 0) {
            document.getElementById('gameContent').innerHTML = '<div class="feedback">No hay palabras disponibles en esta categoría.</div>';
            return;
        }
        const palabra = palabras[currentIndex];
        let opciones = [palabra.palabra_espanol];
        let otras = palabras.filter((_, i) => i !== currentIndex);
        otras.sort(() => Math.random() - 0.5);
        for (let i = 0; i < Math.min(3, otras.length); i++) {
            opciones.push(otras[i].palabra_espanol);
        }
        opciones.sort(() => Math.random() - 0.5);

        const intro = roundIntroForMode('multiple');
        let html = `
            ${audioBannerHtml(intro.label)}
            <div class="question-word">❓ ¿Qué significa "${renderQuechuaSpeakable(palabra.palabra_quechua)}"?</div>
            <div class="options-grid" id="opcionesGrid">
                ${opciones.map(op => `<div class="option-btn" onclick="checkMultiple('${op.replace(/'/g, "\\'")}', this)">${escapeHtml(op)}</div>`).join('')}
            </div>
            <div id="feedbackMultiple"></div>
            <div id="nextBtn"></div>
        `;
        document.getElementById('gameContent').innerHTML = html;
        speakRoundIntro('multiple');
        speakQuechua(palabra.palabra_quechua);
    }

    window.checkMultiple = function(selected, el) {
        if (waitingResponse) return;
        const palabra = palabras[currentIndex];
        const feedbackDiv = document.getElementById('feedbackMultiple');
        if (selected === palabra.palabra_espanol) {
            puntos += palabra.puntos;
            el.classList.add('correct');
            waitingResponse = true;
            mostrarFeedbackBanner(true, '', siguientePalabra);
        } else {
            vidas--;
            actualizarUI();
            el.classList.add('incorrect');
            document.querySelectorAll('.option-btn').forEach(btn => {
                if (btn.innerText.trim() === palabra.palabra_espanol) btn.classList.add('correct');
            });
            waitingResponse = true;
            if (vidas <= 0) mostrarFeedbackBanner(false, `Era: ${palabra.palabra_espanol}`, gameOver);
            else mostrarFeedbackBanner(false, `Era: ${palabra.palabra_espanol}`, siguientePalabra);
        }
        actualizarUI();
        document.querySelectorAll('.option-btn').forEach(btn => btn.style.pointerEvents = 'none');
    };

    // ===================== MODO FLASHCARDS =====================
    function cargarFlashcards() {
        if (!palabras || palabras.length === 0) {
            document.getElementById('gameContent').innerHTML = '<div class="feedback">No hay palabras disponibles.</div>';
            return;
        }
        const palabra = palabras[currentIndex];
        const intro = roundIntroForMode('flashcards');
        let html = `
            ${audioBannerHtml(intro.label)}
            <div class="flashcard" id="flashcard">
                <div class="flashcard-question">📖 ${renderQuechuaSpeakable(palabra.palabra_quechua)}</div>
                <div class="audio-pill">
                    <button class="audio-btn small" ${AUDIO.supported ? '' : 'disabled'} onclick="speakQuechua('${palabra.palabra_quechua.replace(/'/g, "\\'")}')">🔊 Escuchar</button>
                    <button class="audio-btn small" ${AUDIO.supported ? '' : 'disabled'} onclick="repeatLastAudio()">⟲ Repetir</button>
                </div>
                <div class="flashcard-answer" id="flashAnswer">${escapeHtml(palabra.palabra_espanol)}</div>
                <input type="text" id="flashInput" class="flashcard-input" placeholder="Escribe la traducción en español..." autocomplete="off">
                <button class="check-btn" id="checkFlashBtn">Verificar</button>
                <div id="feedbackFlash"></div>
                <div id="nextFlashBtn"></div>
            </div>
        `;
        document.getElementById('gameContent').innerHTML = html;
        document.getElementById('checkFlashBtn').onclick = () => verificarFlashcard();
        document.getElementById('flashInput').addEventListener('keydown', (e) => {
            if (e.key === 'Enter') verificarFlashcard();
        });
        speakRoundIntro('flashcards');
        speakQuechua(palabra.palabra_quechua);
    }

    function verificarFlashcard() {
        if (waitingResponse) return;
        const palabra = palabras[currentIndex];
        const input = document.getElementById('flashInput').value.trim().toLowerCase();
        const correcta = palabra.palabra_espanol.toLowerCase();
        const feedback = document.getElementById('feedbackFlash');
        if (input === correcta) {
            puntos += palabra.puntos;
            waitingResponse = true;
            mostrarFeedbackBanner(true, '', siguientePalabra);
        } else {
            vidas--;
            actualizarUI();
            waitingResponse = true;
            if (vidas <= 0) mostrarFeedbackBanner(false, `Era: ${palabra.palabra_espanol}`, gameOver);
            else mostrarFeedbackBanner(false, `Era: ${palabra.palabra_espanol}`, siguientePalabra);
        }
        actualizarUI();
        document.getElementById('flashInput').disabled = true;
    }

    // ===================== MODO RELACIONAR (Paginado en tandas) =====================
    function initMatchBatches() {
        let shuffled = [...palabras].sort(() => Math.random() - 0.5);
        matchBatches = [];
        for (let i = 0; i < shuffled.length; i += MATCH_BATCH_SIZE) {
            matchBatches.push(shuffled.slice(i, i + MATCH_BATCH_SIZE));
        }
        matchBatchIndex = 0;
    }

    function cargarMatch() {
        if (!palabras || palabras.length === 0) {
            document.getElementById('gameContent').innerHTML = '<div class="feedback">No hay palabras disponibles.</div>';
            return;
        }
        if (matchBatches.length === 0) {
            initMatchBatches();
        }
        const currentBatch = matchBatches[matchBatchIndex] || [];
        if (currentBatch.length === 0) {
            gameOver();
            return;
        }

        let quechuas = [...currentBatch].sort(() => Math.random() - 0.5);
        let espanoles = [...currentBatch].sort(() => Math.random() - 0.5);
        matchMatched = 0;

        let html = `
            ${audioBannerHtml(roundIntroForMode('match').label)}
            <div style="text-align:center;font-size:0.85em;color:var(--muted);margin-bottom:8px;">
                Ronda ${matchBatchIndex + 1} de ${matchBatches.length} (${currentBatch.length} parejas)
            </div>
            <div class="match-container">
                <div class="match-col"><h4>🇵🇪 Quechua</h4><div id="colQuechua"></div></div>
                <div class="match-col"><h4>🇪🇸 Español</h4><div id="colEspanol"></div></div>
            </div>
            <div id="matchFeedback"></div>
            <div id="nextMatchBtn"></div>
        `;
        document.getElementById('gameContent').innerHTML = html;
        const colQ = document.getElementById('colQuechua');
        const colE = document.getElementById('colEspanol');
        quechuas.forEach(p => {
            let div = document.createElement('div');
            div.className = 'match-item';
            div.innerHTML = `<span class="mi-text">${escapeHtml(p.palabra_quechua)}</span><button class="mi-audio" ${AUDIO.supported ? '' : 'disabled'} title="Escuchar">🔊</button>`;
            div.dataset.id = p.id;
            div.dataset.type = 'que';
            div.querySelector('.mi-audio').onclick = (e) => { e.stopPropagation(); speakQuechua(p.palabra_quechua); };
            div.onclick = () => selectMatchItem(div, currentBatch.length);
            colQ.appendChild(div);
        });
        espanoles.forEach(p => {
            let div = document.createElement('div');
            div.className = 'match-item';
            div.innerHTML = `<span class="mi-text">${escapeHtml(p.palabra_espanol)}</span>`;
            div.dataset.id = p.id;
            div.dataset.type = 'es';
            div.onclick = () => selectMatchItem(div, currentBatch.length);
            colE.appendChild(div);
        });
        matchSelected = null;
        speakRoundIntro('match');
    }

    function selectMatchItem(el, batchSize) {
        if (el.classList.contains('matched')) return;
        if (matchSelected === null) {
            document.querySelectorAll('.match-item').forEach(i => i.classList.remove('selected'));
            el.classList.add('selected');
            matchSelected = el;
        } else {
            if (matchSelected.dataset.type === el.dataset.type) {
                document.querySelectorAll('.match-item').forEach(i => i.classList.remove('selected'));
                matchSelected = null;
                return;
            }
            const queItem = matchSelected.dataset.type === 'que' ? matchSelected : el;
            const esItem = matchSelected.dataset.type === 'es' ? matchSelected : el;
            if (parseInt(queItem.dataset.id) === parseInt(esItem.dataset.id)) {
                queItem.classList.add('matched');
                esItem.classList.add('matched');
                queItem.classList.remove('selected');
                esItem.classList.remove('selected');
                puntos += 20;
                matchMatched++;
                currentIndex++;
                actualizarUI();
                if (matchMatched === batchSize) {
                    matchBatchIndex++;
                    if (matchBatchIndex < matchBatches.length) {
                        mostrarFeedbackBanner(true, 'Ronda completada', cargarMatch);
                    } else {
                        mostrarFeedbackBanner(true, '¡Todas las rondas completadas!', gameOver);
                    }
                } else {
                    mostrarFeedbackBanner(true, '¡Sigue así!', () => {});
                }
            } else {
                vidas--;
                actualizarUI();
                if (vidas <= 0) mostrarFeedbackBanner(false, 'Pareja incorrecta', gameOver);
                else mostrarFeedbackBanner(false, 'Pareja incorrecta', () => {});
            }
            matchSelected = null;
            document.querySelectorAll('.match-item').forEach(i => i.classList.remove('selected'));
        }
    }

    // ===================== MODO ESCRIBIR =====================
    function cargarEscribir() {
        if (!palabras || palabras.length === 0) {
            document.getElementById('gameContent').innerHTML = '<div class="feedback">No hay palabras disponibles.</div>';
            return;
        }
        const palabra = palabras[currentIndex];
        const intro = roundIntroForMode('escribir');
        let html = `
            ${audioBannerHtml(intro.label)}
            <div class="question-word">✍️ ¿Cómo se dice "${escapeHtml(palabra.palabra_espanol)}" en quechua?</div>
            <div class="audio-pill">
                <button class="audio-btn small" ${AUDIO.supported ? '' : 'disabled'} onclick="speakSpanish('¿Cómo se dice ${palabra.palabra_espanol.replace(/'/g, "\\'")} en quechua?')">🔊 Escuchar consigna</button>
                <button class="audio-btn small" ${AUDIO.supported ? '' : 'disabled'} onclick="repeatLastAudio()">⟲ Repetir</button>
            </div>
            <input type="text" id="escribirInput" class="escribir-input" placeholder="Escribe en quechua..." autocomplete="off">
            <button class="check-btn" id="checkEscribirBtn">Verificar</button>
            <div id="feedbackEscribir"></div>
            <div id="nextEscribirBtn"></div>
        `;
        document.getElementById('gameContent').innerHTML = html;
        document.getElementById('checkEscribirBtn').onclick = () => verificarEscribir();
        document.getElementById('escribirInput').addEventListener('keydown', (e) => {
            if (e.key === 'Enter') verificarEscribir();
        });
        speakRoundIntro('escribir');
    }

    function verificarEscribir() {
        if (waitingResponse) return;
        const palabra = palabras[currentIndex];
        const input = document.getElementById('escribirInput').value.trim().toLowerCase();
        const correcta = palabra.palabra_quechua.toLowerCase();
        const feedback = document.getElementById('feedbackEscribir');
        if (input === correcta) {
            puntos += palabra.puntos;
            waitingResponse = true;
            speakQuechua(palabra.palabra_quechua);
            mostrarFeedbackBanner(true, '', siguientePalabra);
        } else {
            vidas--;
            actualizarUI();
            waitingResponse = true;
            speakQuechua(palabra.palabra_quechua);
            if (vidas <= 0) mostrarFeedbackBanner(false, `Era: ${palabra.palabra_quechua}`, gameOver);
            else mostrarFeedbackBanner(false, `Era: ${palabra.palabra_quechua}`, siguientePalabra);
        }
        actualizarUI();
        document.getElementById('escribirInput').disabled = true;
    }

    // ===================== CONTROL PRINCIPAL =====================
    function cargarJuego() {
        waitingResponse = false;
        if (vidas <= 0) {
            gameOver();
            return;
        }
        if (!AUDIO.supported) showAudioUnsupportedOnce();
        if (currentMode === 'multiple') cargarMultiple();
        else if (currentMode === 'flashcards') cargarFlashcards();
        else if (currentMode === 'match') cargarMatch();
        else if (currentMode === 'escribir') cargarEscribir();
        actualizarUI();
    }

    document.querySelectorAll('.mode-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.mode-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentMode = btn.dataset.mode;
            currentIndex = 0;
            puntos = 0;
            waitingResponse = false;
            matchBatches = [];
            actualizarUI();
            cargarJuego();
        });
    });

    // Partículas
    for (let i = 0; i < 40; i++) {
        let p = document.createElement('div');
        p.className = 'gp';
        p.style.left = Math.random() * 100 + '%';
        p.style.bottom = Math.random() * 100 + '%';
        p.style.animationDuration = 3 + Math.random() * 5 + 's';
        p.style.animationDelay = Math.random() * 5 + 's';
        document.getElementById('particles').appendChild(p);
    }

    // Modo claro / oscuro persistente
    function updateThemeUI(theme) {
        const btn = document.getElementById('gameThemeToggleBtn');
        if (btn) {
            const icon = btn.querySelector('.theme-icon');
            const lbl = btn.querySelector('.theme-lbl');
            if (theme === 'light') {
                if (icon) icon.textContent = '🌙';
                if (lbl) lbl.textContent = 'Oscuro';
                btn.title = 'Cambiar a Modo Oscuro';
            } else {
                if (icon) icon.textContent = '☀️';
                if (lbl) lbl.textContent = 'Claro';
                btn.title = 'Cambiar a Modo Claro';
            }
        }
    }

    function toggleTheme() {
        const current = document.documentElement.getAttribute('data-theme') || 'dark';
        const next = current === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', next);
        localStorage.setItem('boliquechua_theme', next);
        updateThemeUI(next);
    }

    const currentTheme = localStorage.getItem('boliquechua_theme') || 'dark';
    updateThemeUI(currentTheme);

    actualizarUI();
    cargarJuego();
</script>
</body>
</html>