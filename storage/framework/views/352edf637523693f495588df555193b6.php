<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BOLIQUECHUA - Aprende Quechua</title>
    <script>
        (function() {
            var theme = localStorage.getItem('boliquechua_theme') || 'dark';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700;800&family=Nunito:wght@600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* ============================
           BOLIQUECHUA · Futurista Andino
           Reemplazo total de CSS (mantiene IDs/clases existentes)
           ============================ */

        :root {
            --pri: #ff4a10;
            --pri-dk: #b12d07;
            --pri-lt: #ff7a3e;
            --gold: #ffd166;
            --teal: #00e6c3;
            --purple: #a66bff;
            --blue: #4bb3ff;

            --bg0: #050202;
            --bg1: #0a0503;
            --card: rgba(255, 244, 230, 0.04);
            --card2: rgba(255, 244, 230, 0.06);
            --text: #f3e6d3;
            --muted: rgba(243, 230, 211, 0.62);
            --muted2: rgba(243, 230, 211, 0.46);

            --border: rgba(255, 74, 16, 0.18);
            --border2: rgba(255, 209, 102, 0.14);

            --shadow: 0 18px 60px rgba(0, 0, 0, 0.55);
            --shadow2: 0 10px 30px rgba(0, 0, 0, 0.35);

            --r-lg: 22px;
            --r-md: 16px;
            --r-sm: 12px;

            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        html[data-theme="light"] {
            --bg0: #fdfbf7;
            --bg1: #f3eee6;
            --card: rgba(0, 0, 0, 0.04);
            --card2: rgba(0, 0, 0, 0.08);
            --text: #2b1c14;
            --muted: rgba(43, 28, 20, 0.7);
            --muted2: rgba(43, 28, 20, 0.5);
            --border: rgba(255, 74, 16, 0.3);
            --border2: rgba(255, 209, 102, 0.4);
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --shadow2: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        html[data-theme="light"] body {
            background: radial-gradient(1200px 700px at 20% 10%, rgba(255, 74, 16, 0.12), transparent 55%),
                        radial-gradient(900px 520px at 85% 22%, rgba(0, 230, 195, 0.1), transparent 60%),
                        radial-gradient(900px 650px at 55% 92%, rgba(255, 209, 102, 0.15), transparent 62%),
                        linear-gradient(180deg, var(--bg0), var(--bg1) 55%, #e9e1d5);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { height: 100%; }
        body {
            font-family: 'Nunito', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: var(--text);
            background: radial-gradient(1200px 700px at 20% 10%, rgba(255, 74, 16, 0.20), transparent 55%),
                        radial-gradient(900px 520px at 85% 22%, rgba(0, 230, 195, 0.14), transparent 60%),
                        radial-gradient(900px 650px at 55% 92%, rgba(255, 209, 102, 0.14), transparent 62%),
                        linear-gradient(180deg, var(--bg0), var(--bg1) 55%, #040101);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            text-rendering: geometricPrecision;
        }

        /* Accesibilidad */
        :focus-visible {
            outline: 2px solid rgba(255, 209, 102, 0.85);
            outline-offset: 3px;
            border-radius: 10px;
        }
        @media (prefers-reduced-motion: reduce) {
            * { animation-duration: 0.001ms !important; animation-iteration-count: 1 !important; transition-duration: 0.001ms !important; scroll-behavior: auto !important; }
        }

        /* ====== SPLASH ====== */
        #splash {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: radial-gradient(850px 520px at 50% 30%, rgba(255, 74, 16, 0.18), transparent 62%),
                        radial-gradient(900px 600px at 42% 68%, rgba(255, 209, 102, 0.10), transparent 65%),
                        linear-gradient(180deg, #050202, #0a0503 55%, #050202);
        }

        #splash::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 74, 16, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 74, 16, 0.06) 1px, transparent 1px);
            background-size: 42px 42px;
            opacity: 0.75;
            mask-image: radial-gradient(circle at 50% 40%, black 0 45%, transparent 70%);
            animation: gridPulse 3.2s ease-in-out infinite;
        }

        #splash::after {
            content: '';
            position: absolute;
            inset: -2px;
            background:
                radial-gradient(900px 520px at 50% 35%, rgba(0, 230, 195, 0.08), transparent 65%),
                radial-gradient(1200px 900px at 50% 100%, rgba(255, 209, 102, 0.08), transparent 55%);
            pointer-events: none;
            filter: blur(0.2px);
        }

        @keyframes gridPulse { 0%,100%{opacity:.55} 50%{opacity:1} }

        .radar-rings {
            position: absolute;
            width: min(780px, 92vw);
            height: min(780px, 92vw);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.95;
        }

        .ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255, 74, 16, 0.20);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: ringPulse 3.6s ease-out infinite;
            box-shadow: 0 0 36px rgba(255, 74, 16, 0.08) inset;
        }

        .ring:nth-child(1){width:110px;height:110px;animation-delay:0s}
        .ring:nth-child(2){width:240px;height:240px;animation-delay:.32s}
        .ring:nth-child(3){width:390px;height:390px;animation-delay:.64s}
        .ring:nth-child(4){width:540px;height:540px;animation-delay:.96s}
        .ring:nth-child(5){width:690px;height:690px;animation-delay:1.28s}

        @keyframes ringPulse {
            0%{opacity:0;transform:translate(-50%,-50%) scale(.86)}
            34%{opacity:1}
            100%{opacity:0;transform:translate(-50%,-50%) scale(1.06)}
        }

        .chakana-bg {
            position: absolute;
            width: min(420px, 80vw);
            height: min(420px, 80vw);
            opacity: .07;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            filter: drop-shadow(0 0 50px rgba(255, 74, 16, 0.20));
            animation: chakSpin 24s linear infinite;
        }

        @keyframes chakSpin {
            from{transform:translate(-50%,-50%) rotate(0)}
            to  {transform:translate(-50%,-50%) rotate(360deg)}
        }

        .sp-cont { position: absolute; inset: 0; pointer-events: none; }
        .sp { position: absolute; border-radius: 50%; opacity: 0; animation: spUp linear infinite; }
        @keyframes spUp {
            0%{opacity:0;transform:translateY(0) scale(1)}
            8%{opacity:1}
            88%{opacity:.85}
            100%{opacity:0;transform:translateY(-110vh) scale(.15)}
        }

        .splash-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 0 18px;
            animation: sReveal .85s var(--ease) .35s both;
        }

        @keyframes sReveal {
            from{opacity:0;transform:translateY(34px) scale(.92);filter:blur(1.5px)}
            to  {opacity:1;transform:translateY(0) scale(1);filter:blur(0)}
        }

        .splash-llama {
            width: clamp(92px, 13vw, 118px);
            height: clamp(92px, 13vw, 118px);
            margin: 0 auto 18px;
            display: block;
            animation: llamaFloat 2.1s ease-in-out infinite;
            filter: drop-shadow(0 0 26px rgba(255, 74, 16, .75));
        }

        @keyframes llamaFloat { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-12px)} }

        .splash-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(2.35em, 7.4vw, 4.15em);
            font-weight: 800;
            letter-spacing: clamp(5px, 1.2vw, 10px);
            color: #fff;
            text-transform: uppercase;
            line-height: 1;
            text-shadow: 0 0 34px rgba(255, 74, 16, .55);
        }
        .splash-title span { color: var(--gold); text-shadow: 0 0 34px rgba(255, 209, 102, .55); }

        .splash-sub {
            font-family: 'Rajdhani', sans-serif;
            font-size: .92em;
            letter-spacing: 6px;
            color: rgba(255,255,255,.38);
            text-transform: uppercase;
            margin-top: 10px;
        }

        .s-lines {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 28px 0;
            animation: sReveal .85s var(--ease) .65s both;
        }

        .s-line { height: 1px; width: min(110px, 24vw); background: linear-gradient(90deg, transparent, rgba(255, 74, 16, .85), transparent); }
        .s-dia  { width: 10px; height: 10px; background: var(--gold); transform: rotate(45deg); box-shadow: 0 0 16px rgba(255, 209, 102, .6); }

        .splash-welcome { position: relative; z-index: 2; text-align: center; animation: sReveal .85s var(--ease) .95s both; }
        .sw-lbl { font-family:'Rajdhani',sans-serif;font-size:1em;letter-spacing:5px;color:rgba(255,255,255,.42);text-transform:uppercase; }
        .sw-name { font-family:'Rajdhani',sans-serif;font-size:1.85em;font-weight:700;letter-spacing:3px;color:#fff;text-shadow:0 0 18px rgba(255, 209, 102, .35); }

        .splash-loader { position: relative; z-index: 2; width: 240px; margin-top: 34px; animation: sReveal .85s var(--ease) 1.15s both; }
        .l-track { height: 3px; background: rgba(255,255,255,.09); border-radius: 99px; overflow: hidden; }
        .l-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, var(--pri), var(--gold));
            border-radius: 99px;
            box-shadow: 0 0 18px rgba(255, 74, 16, .45);
            animation: lBar 2.55s var(--ease) 1.35s forwards;
        }
        @keyframes lBar { 0%{width:0%} 55%{width:74%} 100%{width:100%} }
        .l-pct { font-family:'Rajdhani',sans-serif;font-size:.8em;letter-spacing:2px;color:rgba(255,255,255,.30);text-align:right;margin-top:7px; }

        .splash-exit { animation: sOut .62s cubic-bezier(.4,0,1,1) forwards; }
        @keyframes sOut { 0%{opacity:1;transform:scale(1)} 100%{opacity:0;transform:scale(1.04);filter:blur(1px)} }

        /* ====== GAME LOADER ====== */
        #gameLoader {
            position: fixed;
            inset: 0;
            z-index: 8000;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: linear-gradient(180deg, #050202, #0a0503 60%, #050202);
        }
        #gameLoader.show { display: flex; }
        #gameLoader::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 74, 16, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 74, 16, 0.05) 1px, transparent 1px);
            background-size: 42px 42px;
            animation: gridPulse 3.2s ease-in-out infinite;
            opacity: 0.9;
            mask-image: radial-gradient(circle at 50% 50%, black 0 50%, transparent 78%);
        }
        .gl-rings { position:absolute;width:min(520px,92vw);height:min(520px,92vw);top:50%;left:50%;transform:translate(-50%,-50%); }
        .gl-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255, 74, 16, 0.22);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: ringPulse 3.1s ease-out infinite;
        }
        .gl-ring:nth-child(1){width:86px;height:86px;animation-delay:0s}
        .gl-ring:nth-child(2){width:190px;height:190px;animation-delay:.28s}
        .gl-ring:nth-child(3){width:318px;height:318px;animation-delay:.56s}
        .gl-ring:nth-child(4){width:446px;height:446px;animation-delay:.84s}
        .gl-content { position: relative; z-index: 2; text-align: center; padding: 0 18px; }
        .gl-icon { width: 84px; height: 84px; margin: 0 auto 16px; filter: drop-shadow(0 0 20px rgba(255, 74, 16, .70)); animation: llamaFloat 2s ease-in-out infinite; }
        .gl-title { font-family:'Rajdhani',sans-serif;font-size:clamp(1.4em,4vw,2.2em);font-weight:700;letter-spacing:5px;color:#fff;text-transform:uppercase;text-shadow:0 0 22px rgba(255, 74, 16, .45); }
        .gl-sub { font-family:'Rajdhani',sans-serif;font-size:.82em;letter-spacing:4px;color:rgba(255,255,255,.35);text-transform:uppercase;margin-top:6px; }
        .gl-bar-wrap { width: 200px; margin-top: 28px; }
        .gl-track { height: 3px; background: rgba(255,255,255,.09); border-radius: 99px; overflow: hidden; }
        .gl-bar { height: 100%; width: 0%; background: linear-gradient(90deg, var(--pri), var(--gold)); border-radius: 99px; box-shadow: 0 0 14px rgba(255, 74, 16, .38); }

        /* ====== APP ====== */
        #app { display: none; flex-direction: column; height: 100vh; width: 100%; }
        #app.visible { display: flex; }

        /* Lobby particles layer */
        #lp { position: fixed; inset: 0; pointer-events: none; z-index: 1; overflow: hidden; }
        .lp { position: absolute; border-radius: 50%; opacity: 0; filter: drop-shadow(0 0 8px rgba(255, 209, 102, 0.15)); animation: lpUp linear infinite; }
        @keyframes lpUp { 0%{opacity:0;transform:translateY(0) scale(1)} 10%{opacity:1} 86%{opacity:.85} 100%{opacity:0;transform:translateY(-108vh) scale(.16)} }

        /* ====== HEADER ====== */
        #topbar {
            position: relative;
            z-index: 100;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: clamp(12px, 1.8vh, 20px) clamp(16px, 3vw, 54px);
            background: rgba(7, 3, 2, 0.76);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 74, 16, 0.12);
        }
        #topbar::before {
            content:'';
            position:absolute;
            inset: 0;
            pointer-events:none;
            background: radial-gradient(900px 220px at 18% 0%, rgba(255, 74, 16, 0.16), transparent 55%),
                        radial-gradient(700px 220px at 82% 0%, rgba(0, 230, 195, 0.09), transparent 60%);
            opacity: .85;
        }
        #topbar::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 12%;
            right: 12%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 74, 16, 0.95), transparent);
            box-shadow: 0 0 12px rgba(255, 74, 16, 0.35);
            opacity: .9;
        }

        .logo {
            position: relative;
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(1.65em, 3vw, 2.55em);
            font-weight: 800;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: rgba(255,255,255,.92);
            line-height: 1;
            text-shadow: 0 0 18px rgba(255, 74, 16, 0.18);
        }
        .logo span { color: var(--pri); text-shadow: 0 0 18px rgba(255, 74, 16, .35); }
        .tagline { font-family:'Rajdhani',sans-serif;font-size:clamp(.56em,.75vw,.74em);letter-spacing:3.2px;color:var(--muted2);text-transform:uppercase;margin-top:4px; }

        .topbar-center { display: flex; gap: clamp(8px, 1.2vw, 16px); align-items: center; position: relative; z-index: 1; }
        .stat-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
            border: 1px solid rgba(255, 74, 16, 0.15);
            border-radius: 14px;
            padding: clamp(7px, 1vh, 11px) clamp(10px, 1.5vw, 18px);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 24px rgba(0,0,0,.18);
        }
        .stat-chip svg { width: 18px; height: 18px; flex-shrink: 0; opacity: .95; }
        .stat-chip::before {
            content:'';
            position:absolute;
            inset:0;
            background: radial-gradient(120px 50px at 30% 0%, rgba(255, 209, 102, 0.10), transparent 65%);
            opacity: .9;
            pointer-events: none;
        }
        .stat-chip::after { content:''; position:absolute; bottom:0; left:14%; right:14%; height:2px; border-radius: 2px; opacity:.95; }
        .stat-chip.hp::after  { background:#ff4d4d; box-shadow:0 0 8px rgba(255, 77, 77, .55); }
        .stat-chip.str::after { background:var(--gold); box-shadow:0 0 8px rgba(255, 209, 102, .45); }
        .stat-chip.pts::after { background:var(--teal); box-shadow:0 0 8px rgba(0, 230, 195, .45); }
        .stat-chip-val { font-family:'Rajdhani',sans-serif; font-size: clamp(1em, 1.4vw, 1.3em); font-weight: 700; color: rgba(255,255,255,.92); }

        .avatar-btn {
            position: relative;
            z-index: 1;
            width: clamp(40px, 4vw, 52px);
            height: clamp(40px, 4vw, 52px);
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 122, 62, 0.95), rgba(177, 45, 7, 0.95));
            border: 1px solid rgba(255, 74, 16, 0.35);
            box-shadow: 0 0 0 3px rgba(255, 74, 16, 0.10), 0 16px 30px rgba(0,0,0,.35);
            cursor: pointer;
            transition: transform .18s var(--ease), box-shadow .18s var(--ease), filter .18s var(--ease);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .avatar-btn svg { width: 22px; height: 22px; }
        .avatar-btn:hover { transform: translateY(-1px) scale(1.06); box-shadow: 0 0 0 3px rgba(255, 74, 16, 0.14), 0 18px 40px rgba(0,0,0,.48); filter: saturate(1.08); }
        .avatar-btn:active { transform: scale(.98); }

        .stats-mobile {
            display: none;
            position: relative;
            z-index: 10;
            flex-shrink: 0;
            gap: 10px;
            padding: 10px 16px 6px;
            background: rgba(7, 3, 2, 0.62);
            border-bottom: 1px solid rgba(255, 74, 16, 0.12);
            backdrop-filter: blur(14px);
        }
        .sm-chip {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
            border: 1px solid rgba(255, 74, 16, 0.15);
            border-radius: 14px;
            padding: 9px 10px;
            position: relative;
            overflow: hidden;
        }
        .sm-chip svg { width: 16px; height: 16px; opacity: .95; }
        .sm-chip::after { content:''; position:absolute; bottom:0; left:12%; right:12%; height:2px; border-radius: 2px; opacity:.95; }
        .sm-chip.hp::after  { background:#ff4d4d; box-shadow:0 0 7px rgba(255, 77, 77, .55); }
        .sm-chip.str::after { background:var(--gold); box-shadow:0 0 7px rgba(255, 209, 102, .45); }
        .sm-chip.pts::after { background:var(--teal); box-shadow:0 0 7px rgba(0, 230, 195, .45); }
        .sm-chip-val { font-family:'Rajdhani',sans-serif; font-size: 1.12em; font-weight: 700; color: rgba(255,255,255,.92); }

        /* ====== MAIN ====== */
        #main {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            position: relative;
            z-index: 2;
            padding: clamp(16px, 2.5vh, 28px) clamp(16px, 3vw, 54px) clamp(18px, 2vh, 26px);
        }

        #main::before {
            content:'';
            position:absolute;
            inset: 0;
            pointer-events:none;
            background:
                radial-gradient(1200px 420px at 10% 0%, rgba(255, 74, 16, 0.10), transparent 62%),
                radial-gradient(900px 420px at 90% 0%, rgba(0, 230, 195, 0.06), transparent 60%);
            opacity: .9;
        }

        .sec-head { position: relative; z-index: 1; display: flex; align-items: center; gap: 14px; margin-bottom: clamp(14px, 2vh, 22px); }
        .sec-line { flex: 1; height: 1px; background: linear-gradient(90deg, rgba(255, 74, 16, 0.22), transparent); }
        .sec-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(.8em, 1.1vw, .98em);
            font-weight: 800;
            letter-spacing: 4px;
            color: rgba(255, 209, 102, 0.70);
            text-transform: uppercase;
            text-shadow: 0 0 18px rgba(255, 74, 16, 0.12);
        }

        .cat-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(clamp(210px, 22vw, 340px), 1fr));
            gap: clamp(12px, 1.8vw, 24px);
        }

        .cat-card {
            background: linear-gradient(180deg, rgba(255, 244, 230, 0.06), rgba(255, 244, 230, 0.03));
            border-radius: var(--r-lg);
            border: 1px solid rgba(255, 74, 16, 0.16);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow2);
            transition: transform .18s var(--ease), box-shadow .18s var(--ease), border-color .18s var(--ease), filter .18s var(--ease);
            min-height: 220px;
        }
        .cat-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); border-color: rgba(255, 209, 102, 0.18); filter: saturate(1.06); }
        .cat-card:active { transform: translateY(-2px) scale(.985); }
        .cat-card:nth-child(2n) { --cc: var(--gold); }
        .cat-card:nth-child(3n) { --cc: var(--teal); }
        .cat-card:nth-child(4n) { --cc: var(--purple); }
        .cat-card:nth-child(5n) { --cc: var(--blue); }
        .cat-card:nth-child(6n) { --cc: var(--pri); }

        .cat-card::before {
            content:'';
            position:absolute;
            inset:-2px;
            background:
                radial-gradient(520px 220px at 18% 0%, rgba(255, 209, 102, 0.10), transparent 55%),
                radial-gradient(520px 240px at 80% 0%, color-mix(in srgb, var(--cc, var(--pri)) 20%, transparent), transparent 60%),
                linear-gradient(120deg, transparent 0 28%, rgba(255, 255, 255, 0.04) 34%, transparent 44%),
                radial-gradient(1000px 600px at 50% 120%, rgba(255, 74, 16, 0.08), transparent 62%);
            opacity: .95;
            pointer-events:none;
        }
        .cat-card::after {
            content:'';
            position:absolute;
            inset: 0;
            pointer-events:none;
            background:
                linear-gradient(180deg, rgba(0,0,0,0.0), rgba(0,0,0,0.18) 70%, rgba(0,0,0,0.30));
            opacity: .9;
        }

        .cc-topbar {
            position: relative;
            z-index: 1;
            height: 4px;
            background: linear-gradient(90deg, var(--cc, var(--pri)), rgba(255, 209, 102, 0.7));
            box-shadow: 0 0 18px color-mix(in srgb, var(--cc, var(--pri)) 55%, transparent);
        }

        .cc-body {
            position: relative;
            z-index: 2;
            padding: clamp(18px, 2.5vw, 30px) clamp(14px, 2vw, 24px) clamp(16px, 2vh, 24px);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 10px;
        }

        .cc-img-wrap {
            width: clamp(74px, 9vw, 122px);
            height: clamp(74px, 9vw, 122px);
            border-radius: 18px;
            background: radial-gradient(80px 80px at 30% 30%, rgba(255, 209, 102, 0.10), transparent 70%),
                        rgba(255, 74, 16, 0.08);
            border: 1px solid rgba(255, 74, 16, 0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: clamp(10px, 1.2vh, 14px);
            overflow: hidden;
            box-shadow: 0 10px 22px rgba(0,0,0,.22);
            transition: transform .2s var(--ease), box-shadow .2s var(--ease), border-color .2s var(--ease);
        }
        .cat-card:hover .cc-img-wrap { transform: translateY(-3px) scale(1.07); border-color: rgba(255, 209, 102, 0.16); box-shadow: 0 14px 34px rgba(0,0,0,.34); }
        .cc-img-wrap svg { width: 62%; height: 62%; }

        .cc-name {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(1.2em, 1.9vw, 1.7em);
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255,255,255,.94);
            text-shadow: 0 0 18px rgba(255, 74, 16, 0.12);
        }
        .cc-cta {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(.72em, .95vw, .88em);
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: color-mix(in srgb, var(--cc, var(--pri)) 70%, var(--gold));
            margin-top: 2px;
            opacity: .92;
        }

        /* Flecha (existe en HTML) */
        .cc-arrow {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 14px;
            background: rgba(255, 244, 230, 0.05);
            border: 1px solid rgba(255, 74, 16, 0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3;
            transition: transform .18s var(--ease), border-color .18s var(--ease), background .18s var(--ease);
        }
        .cc-arrow svg { width: 18px; height: 18px; stroke: rgba(243, 230, 211, 0.68); }
        .cat-card:hover .cc-arrow { transform: translateY(-50%) translateX(2px); border-color: rgba(255, 209, 102, 0.16); background: rgba(255, 244, 230, 0.07); }

        /* ====== SUBMENU ====== */
        #submenu {
            position: fixed;
            inset: 0;
            z-index: 400;
            display: none;
            flex-direction: column;
            background: rgba(5, 2, 1, 0.88);
            backdrop-filter: blur(18px);
            overflow-y: auto;
        }
        #submenu.open { display: flex; }
        #submenu::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 74, 16, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 74, 16, 0.05) 1px, transparent 1px);
            background-size: 42px 42px;
            pointer-events: none;
            opacity: .9;
            mask-image: radial-gradient(circle at 50% 40%, black 0 55%, transparent 80%);
        }
        .sm-inner {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: clamp(16px, 2.5vh, 28px) clamp(16px, 3vw, 54px) clamp(80px, 10vh, 110px);
            animation: smSlide .36s var(--ease) both;
        }
        @keyframes smSlide { from{opacity:0;transform:translateY(26px);filter:blur(1px)} to{opacity:1;transform:translateY(0);filter:blur(0)} }

        .sm-header { display: flex; align-items: center; gap: 16px; margin-bottom: clamp(18px, 3vh, 34px); }
        .sm-back {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: rgba(255, 244, 230, 0.05);
            border: 1px solid rgba(255, 74, 16, 0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform .18s var(--ease), border-color .18s var(--ease), background .18s var(--ease);
        }
        .sm-back svg { width: 20px; height: 20px; stroke: rgba(243, 230, 211, 0.70); }
        .sm-back:hover { transform: translateY(-1px); border-color: rgba(255, 209, 102, 0.16); background: rgba(255, 244, 230, 0.07); }
        .sm-back:active { transform: translateY(0) scale(.98); }

        .sm-cat-info { display: flex; align-items: center; gap: 14px; }
        .sm-cat-img {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: radial-gradient(70px 50px at 30% 30%, rgba(255, 209, 102, 0.10), transparent 70%),
                        rgba(255, 74, 16, 0.08);
            border: 1px solid rgba(255, 74, 16, 0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 14px 34px rgba(0,0,0,.30);
        }
        .sm-cat-img svg { width: 70%; height: 70%; }
        .sm-cat-name { font-family:'Rajdhani',sans-serif;font-size:clamp(1.35em,3vw,2.25em);font-weight:900;letter-spacing:4px;text-transform:uppercase;color:rgba(255,255,255,.94); }
        .sm-cat-sub { font-family:'Rajdhani',sans-serif;font-size:clamp(.76em,1vw,.92em);letter-spacing:3px;color:var(--muted);text-transform:uppercase;margin-top:4px; }

        .sm-divider { height: 1px; background: linear-gradient(90deg, rgba(255, 74, 16, 0.22), transparent); margin-bottom: clamp(18px, 3vh, 34px); }
        .sm-sec-title { font-family:'Rajdhani',sans-serif;font-size:clamp(.78em,1vw,.9em);font-weight:900;letter-spacing:4px;color:rgba(255, 209, 102, 0.70);text-transform:uppercase;margin-bottom:clamp(14px,2vh,22px); }

        .sm-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(clamp(220px, 24vw, 420px), 1fr)); gap: clamp(14px, 2vw, 26px); }

        .mode-card {
            background: linear-gradient(180deg, rgba(255, 244, 230, 0.06), rgba(255, 244, 230, 0.03));
            border-radius: 24px;
            border: 1px solid rgba(255, 74, 16, 0.16);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: block;
            transition: transform .18s var(--ease), box-shadow .18s var(--ease), border-color .18s var(--ease), filter .18s var(--ease);
            padding: clamp(24px, 3vw, 40px) clamp(20px, 2.5vw, 36px);
            box-shadow: var(--shadow2);
            min-height: 210px;
        }

        .mode-card::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(520px 220px at 15% 0%, rgba(255, 209, 102, 0.10), transparent 60%),
                radial-gradient(520px 240px at 86% 0%, color-mix(in srgb, var(--mc, var(--pri)) 22%, transparent), transparent 62%),
                linear-gradient(115deg, transparent 0 36%, rgba(255,255,255,.04) 42%, transparent 52%);
            opacity: .95;
        }

        .mode-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--mc, var(--pri)), rgba(255, 209, 102, 0.75));
            box-shadow: 0 0 16px color-mix(in srgb, var(--mc, var(--pri)) 55%, transparent);
        }
        .mode-card:nth-child(1) { --mc: var(--pri); }
        .mode-card:nth-child(2) { --mc: var(--gold); }
        .mode-card:nth-child(3) { --mc: var(--teal); }
        .mode-card:nth-child(4) { --mc: var(--purple); }

        .mode-card:hover { transform: translateY(-7px); box-shadow: var(--shadow); border-color: rgba(255, 209, 102, 0.18); filter: saturate(1.06); }
        .mode-card:active { transform: translateY(-2px) scale(.985); }

        .mc-icon {
            position: relative;
            z-index: 1;
            width: clamp(50px, 5.5vw, 74px);
            height: clamp(50px, 5.5vw, 74px);
            background: radial-gradient(70px 50px at 30% 30%, rgba(255, 209, 102, 0.10), transparent 70%),
                        rgba(255, 244, 230, 0.04);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,.08);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: clamp(14px, 1.8vh, 22px);
            transition: transform .18s var(--ease), border-color .18s var(--ease);
            box-shadow: 0 12px 22px rgba(0,0,0,.18);
        }
        .mc-icon svg { width: 26px; height: 26px; stroke: rgba(243, 230, 211, 0.80); }
        .mode-card:hover .mc-icon { transform: scale(1.09) translateY(-2px); border-color: rgba(255, 209, 102, 0.12); }

        .mc-name {
            position: relative;
            z-index: 1;
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(1.3em, 2.2vw, 1.95em);
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255,255,255,.94);
            margin-bottom: 8px;
        }
        .mc-desc { position: relative; z-index: 1; font-size: clamp(.8em, 1vw, .95em); font-weight: 700; color: var(--muted); line-height: 1.5; }
        .mc-badge {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: clamp(12px, 1.5vh, 18px);
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(.70em, .85vw, .86em);
            font-weight: 900;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: color-mix(in srgb, var(--mc, var(--pri)) 72%, var(--gold));
            border: 1px solid color-mix(in srgb, var(--mc, var(--pri)) 55%, transparent);
            border-radius: 10px;
            padding: 6px 12px;
            background: rgba(255, 244, 230, 0.03);
            transition: transform .18s var(--ease), background .18s var(--ease);
        }
        .mode-card:hover .mc-badge { transform: translateY(-1px); background: rgba(255, 244, 230, 0.06); }

        /* ====== FOOTER / NAVBAR ====== */
        #navbar {
            position: relative;
            z-index: 100;
            flex-shrink: 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 10px;
            padding: clamp(8px, 1.2vh, 14px) clamp(8px, 2vw, 54px) clamp(14px, 2vh, 22px);
            background: rgba(7, 3, 2, 0.76);
            backdrop-filter: blur(16px);
            border-top: 1px solid rgba(255, 74, 16, 0.12);
        }
        #navbar::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 22%;
            right: 22%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 74, 16, 0.95), transparent);
            box-shadow: 0 0 12px rgba(255, 74, 16, 0.35);
            opacity: .85;
        }
        .nb-btn {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            padding: clamp(6px, 1vh, 10px) clamp(14px, 2.5vw, 40px);
            border-radius: 14px;
            background: transparent;
            border: 1px solid transparent;
            font-family: inherit;
            transition: background .15s var(--ease), border-color .15s var(--ease), transform .15s var(--ease);
        }
        .nb-btn svg { width: 22px; height: 22px; }
        .nb-btn:hover { background: rgba(255, 244, 230, 0.04); border-color: rgba(255, 74, 16, 0.10); transform: translateY(-1px); }
        .nb-btn:active { transform: translateY(0) scale(.98); }
        .nb-btn.active { background: rgba(255, 74, 16, 0.10); border-color: rgba(255, 74, 16, 0.16); }
        .nb-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 24%;
            right: 24%;
            height: 2px;
            background: rgba(255, 74, 16, 0.95);
            box-shadow: 0 0 8px rgba(255, 74, 16, 0.45);
            border-radius: 99px 99px 0 0;
        }
        .nb-lbl {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(.62em, .75vw, .80em);
            font-weight: 900;
            letter-spacing: 2px;
            color: rgba(243, 230, 211, 0.56);
            text-transform: uppercase;
        }
        .nb-btn.active .nb-lbl { color: rgba(255, 74, 16, 0.92); }

        /* ====== MODALES ====== */
        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 600;
            background: rgba(0, 0, 0, .64);
            backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
            cursor: pointer;
            padding: 18px;
        }
        .overlay.show { display: flex; }
        .sheet {
            width: 100%;
            max-width: 520px;
            max-height: 88vh;
            overflow-y: auto;
            cursor: default;

            border-radius: 26px;
            border: 1px solid rgba(255, 74, 16, 0.18);
            background:
                radial-gradient(540px 260px at 18% 0%, rgba(255, 209, 102, 0.10), transparent 60%),
                radial-gradient(560px 280px at 85% 0%, rgba(0, 230, 195, 0.06), transparent 62%),
                linear-gradient(180deg, rgba(255, 244, 230, 0.06), rgba(10, 5, 3, 0.94));
            box-shadow: var(--shadow);
            padding: clamp(18px, 2.5vh, 28px) clamp(18px, 2.5vw, 32px) clamp(20px, 3vh, 36px);
            animation: sheetPop .30s var(--ease);
        }
        @keyframes sheetPop { from{transform:scale(.95) translateY(14px);opacity:0;filter:blur(1px)} to{transform:scale(1) translateY(0);opacity:1;filter:blur(0)} }

        .profile-ava {
            width: clamp(62px, 7vw, 84px);
            height: clamp(62px, 7vw, 84px);
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 122, 62, 0.95), rgba(177, 45, 7, 0.95));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            box-shadow: 0 0 0 3px rgba(255, 74, 16, 0.10), 0 20px 44px rgba(0,0,0,.45);
            border: 1px solid rgba(255, 74, 16, 0.22);
        }
        .profile-ava svg { width: 26px; height: 26px; }
        .profile-name {
            text-align: center;
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(1.05em, 1.6vw, 1.3em);
            font-weight: 900;
            letter-spacing: 2px;
            color: rgba(255,255,255,.94);
        }

        .profile-stats {
            display: flex;
            justify-content: center;
            gap: clamp(14px, 2.5vw, 28px);
            margin: 16px 0;
            padding: 14px;
            background: rgba(5, 2, 1, 0.55);
            border-radius: 16px;
            border: 1px solid rgba(255, 74, 16, 0.14);
        }
        .ps-item { text-align: center; }
        .ps-val { font-family:'Rajdhani',sans-serif;font-size:clamp(1.3em,2vw,1.7em);font-weight:900;color: rgba(255, 209, 102, 0.90); }
        .ps-lbl { font-size:clamp(.6em,.75vw,.74em);font-weight:900;color: rgba(243, 230, 211, 0.56);letter-spacing:1.5px;text-transform:uppercase; }

        .sh-divider, hr.sh-divider {
            border: 0;
            height: 1px;
            background: linear-gradient(90deg, rgba(255, 74, 16, 0.22), transparent);
            margin: 16px 0;
        }

        .sh-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            background: rgba(255, 244, 230, 0.05);
            border: 1px solid rgba(255, 74, 16, 0.16);
            border-radius: 16px;
            padding: clamp(11px, 1.5vh, 15px) 16px;
            font-family: inherit;
            font-size: clamp(.92em, 1.1vw, 1.05em);
            font-weight: 900;
            color: rgba(255,255,255,.92);
            cursor: pointer;
            margin-bottom: 10px;
            transition: transform .16s var(--ease), background .16s var(--ease), border-color .16s var(--ease);
        }
        .sh-btn:hover { transform: translateY(-1px); background: rgba(255, 244, 230, 0.07); border-color: rgba(255, 209, 102, 0.16); }
        .sh-btn:active { transform: translateY(0) scale(.99); }

        .logro-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 16px; }
        .logro-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 15px;
            background: rgba(5, 2, 1, 0.55);
            border-radius: 14px;
            border: 1px solid rgba(255, 74, 16, 0.14);
        }
        .logro-item svg { width: 22px; height: 22px; flex-shrink: 0; }
        .logro-name { font-family:'Rajdhani',sans-serif; font-weight: 900; letter-spacing: 1px; color: rgba(255,255,255,.94); }
        .logro-desc { font-weight: 800; color: rgba(243, 230, 211, 0.62); font-size: .92em; margin-top: 2px; }
        .logro-locked { opacity: .35; filter: grayscale(.85); }

        /* ====== THEME TOGGLE BUTTON ====== */
        .theme-toggle-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: var(--card);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 8px 14px;
            border-radius: 30px;
            cursor: pointer;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.95em;
            font-weight: 700;
            letter-spacing: 1px;
            transition: all 0.22s var(--ease);
            user-select: none;
        }
        .theme-toggle-btn:hover {
            background: var(--card2);
            border-color: var(--gold);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(255, 209, 102, 0.2);
        }
        .theme-toggle-btn:active {
            transform: translateY(0) scale(0.98);
        }
        .theme-icon {
            font-size: 1.1em;
            display: inline-block;
            transition: transform 0.3s var(--ease);
        }
        .theme-toggle-btn:hover .theme-icon {
            transform: rotate(25deg) scale(1.15);
        }
        .theme-lbl {
            font-size: 0.88em;
            font-weight: 800;
            text-transform: uppercase;
        }

        /* ====== MODO CLARO (LIGHT THEME) ====== */
        html[data-theme="light"] {
            --bg0: #fbf8f3;
            --bg1: #f3ece0;
            --card: rgba(255, 255, 255, 0.88);
            --card2: rgba(255, 255, 255, 0.96);
            --text: #23150c;
            --muted: #6b5344;
            --muted2: #8a7364;
            --border: rgba(214, 60, 10, 0.18);
            --border2: rgba(201, 133, 0, 0.22);
            --shadow: 0 16px 45px rgba(90, 40, 10, 0.10);
            --shadow2: 0 8px 25px rgba(90, 40, 10, 0.08);
        }

        html[data-theme="light"] body {
            color: var(--text);
            background: radial-gradient(1200px 700px at 20% 10%, rgba(255, 122, 62, 0.14), transparent 55%),
                        radial-gradient(900px 520px at 85% 22%, rgba(0, 201, 167, 0.10), transparent 60%),
                        radial-gradient(900px 650px at 55% 92%, rgba(245, 166, 35, 0.12), transparent 62%),
                        linear-gradient(180deg, var(--bg0), var(--bg1) 55%, #eae0cf);
        }

        html[data-theme="light"] #topbar {
            background: rgba(251, 248, 243, 0.90);
            border-bottom: 1px solid rgba(214, 60, 10, 0.16);
        }
        html[data-theme="light"] #navbar {
            background: rgba(251, 248, 243, 0.92);
            border-top: 1px solid rgba(214, 60, 10, 0.16);
        }

        html[data-theme="light"] .logo {
            color: #23150c;
            text-shadow: none;
        }

        html[data-theme="light"] .stat-chip {
            background: rgba(255, 255, 255, 0.92);
            border-color: rgba(214, 60, 10, 0.16);
            box-shadow: 0 4px 14px rgba(90, 40, 10, 0.06);
        }
        html[data-theme="light"] .sm-chip {
            background: rgba(255, 255, 255, 0.92);
            border-color: rgba(214, 60, 10, 0.16);
        }

        html[data-theme="light"] .cat-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(248, 243, 235, 0.90));
            border-color: rgba(214, 60, 10, 0.16);
            box-shadow: 0 10px 30px rgba(90, 40, 10, 0.07);
        }
        html[data-theme="light"] .cat-card:hover {
            border-color: rgba(201, 133, 0, 0.35);
            box-shadow: 0 18px 45px rgba(90, 40, 10, 0.13);
        }

        html[data-theme="light"] .cc-name {
            color: #23150c;
            text-shadow: none;
        }
        html[data-theme="light"] .cc-arrow {
            background: rgba(214, 60, 10, 0.06);
            border-color: rgba(214, 60, 10, 0.16);
        }
        html[data-theme="light"] .cc-arrow svg {
            stroke: #6b5344;
        }

        html[data-theme="light"] #submenu {
            background: rgba(251, 248, 243, 0.95);
        }
        html[data-theme="light"] .sm-cat-name {
            color: #23150c;
        }
        html[data-theme="light"] .sm-cat-img {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.18);
            box-shadow: 0 8px 20px rgba(90, 40, 10, 0.08);
        }
        html[data-theme="light"] .sm-back {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.18);
        }
        html[data-theme="light"] .sm-back svg {
            stroke: #23150c;
        }
        html[data-theme="light"] .mode-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 243, 235, 0.92));
            border-color: rgba(214, 60, 10, 0.16);
            box-shadow: 0 10px 30px rgba(90, 40, 10, 0.08);
        }
        html[data-theme="light"] .mode-card:hover {
            border-color: rgba(201, 133, 0, 0.35);
            box-shadow: 0 18px 45px rgba(90, 40, 10, 0.13);
        }
        html[data-theme="light"] .mc-name {
            color: #23150c;
        }
        html[data-theme="light"] .mc-icon {
            background: rgba(214, 60, 10, 0.08);
            border-color: rgba(214, 60, 10, 0.18);
        }
        html[data-theme="light"] .mc-icon svg {
            stroke: #23150c;
        }
        html[data-theme="light"] .mc-badge {
            background: rgba(214, 60, 10, 0.06);
        }

        html[data-theme="light"] .sheet {
            background:
                radial-gradient(540px 260px at 18% 0%, rgba(245, 166, 35, 0.12), transparent 60%),
                radial-gradient(560px 280px at 85% 0%, rgba(0, 201, 167, 0.08), transparent 62%),
                linear-gradient(180deg, #ffffff, #f7f1e6);
            border-color: rgba(214, 60, 10, 0.20);
            box-shadow: 0 20px 60px rgba(90, 40, 10, 0.18);
        }
        html[data-theme="light"] .profile-name {
            color: #23150c;
        }
        html[data-theme="light"] .profile-stats,
        html[data-theme="light"] .logro-item {
            background: rgba(240, 231, 219, 0.7);
            border-color: rgba(214, 60, 10, 0.14);
        }
        html[data-theme="light"] .logro-name {
            color: #23150c;
        }
        html[data-theme="light"] .sh-btn {
            background: rgba(240, 231, 219, 0.85);
            border-color: rgba(214, 60, 10, 0.2);
            color: #23150c;
        }
        html[data-theme="light"] .sh-btn:hover {
            background: rgba(230, 218, 202, 0.95);
        }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 768px) {
            .topbar-center { display: none; }
            .stats-mobile { display: flex; }
            .cat-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .sm-grid { grid-template-columns: repeat(2, 1fr); }
            .cc-arrow { display: none; }
        }
        @media (max-width: 480px) {
            #topbar { padding: 12px 14px; }
            #main { padding: 16px 14px 18px; }
            .cat-grid { grid-template-columns: 1fr; }
            .sm-grid { grid-template-columns: 1fr; }
            .theme-lbl { display: none; }
            .theme-toggle-btn { padding: 7px 10px; border-radius: 50%; }
        }
    </style>
</head>
<body>

<!-- ========== SPLASH ========== -->
<div id="splash">
    <div class="radar-rings">
        <div class="ring"></div><div class="ring"></div>
        <div class="ring"></div><div class="ring"></div><div class="ring"></div>
    </div>
    <svg class="chakana-bg" viewBox="0 0 100 100" fill="none"><path d="M33 0H67V33H100V67H67V100H33V67H0V33H33V0Z" fill="#E8450A"/><circle cx="50" cy="50" r="10" fill="none" stroke="#E8450A" stroke-width="2"/></svg>
    <div class="sp-cont" id="spCont"></div>
    <div class="splash-content">
        <img src="<?php echo e(asset('frames de saludo sin fondo/frame_1.png')); ?>" class="splash-llama" alt="Mascota animada">
        <div class="splash-title">BOLI<span>QUECHUA</span></div>
        <div class="splash-sub">Sistema de aprendizaje · v2.0</div>
    </div>
    <div class="s-lines"><div class="s-line"></div><div class="s-dia"></div><div class="s-line"></div></div>
    <div class="splash-welcome"><div class="sw-lbl">Bienvenido de vuelta</div><div class="sw-name"><?php echo e($nombreUsuario); ?></div></div>
    <div class="splash-loader"><div class="l-track"><div class="l-bar"></div></div><div class="l-pct" id="lPct">0%</div></div>
</div>

<!-- ========== GAME LOADER ========== -->
<div id="gameLoader"><div class="gl-rings"><div class="gl-ring"></div><div class="gl-ring"></div><div class="gl-ring"></div><div class="gl-ring"></div></div><div class="gl-content"><img src="<?php echo e(asset('frames de saludo sin fondo/frame_1.png')); ?>" class="gl-icon" alt="Mascota animada"><div class="gl-title" id="glTitle">Cargando...</div><div class="gl-sub">BOLIQUECHUA</div><div class="gl-bar-wrap"><div class="gl-track"><div class="gl-bar" id="glBar"></div></div></div></div></div>

<!-- ========== APP ========== -->
<div id="app">
    <div id="lp"></div>
    <header id="topbar">
        <div><div class="logo">BOLI<span>QUECHUA</span></div><div class="tagline">Aprende quechua jugando</div></div>
        <div class="topbar-center">
            <div class="stat-chip hp"><svg viewBox="0 0 24 24" fill="#e74c3c"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z"/></svg><span class="stat-chip-val"><?php echo e($vidas); ?></span></div>
            <div class="stat-chip str"><svg viewBox="0 0 24 24" fill="none" stroke="#F5A623" stroke-width="2.2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg><span class="stat-chip-val"><?php echo e($racha); ?></span></div>
            <div class="stat-chip pts"><svg viewBox="0 0 24 24" fill="#00C9A7"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><span class="stat-chip-val"><?php echo e($puntuacion); ?></span></div>
        </div>
        <div style="display: flex; align-items: center; gap: 10px;">
            <button class="theme-toggle-btn" id="themeToggleBtn" onclick="toggleTheme()" title="Cambiar modo claro / oscuro">
                <span class="theme-icon">☀️</span>
                <span class="theme-lbl">Modo</span>
            </button>
            <button class="avatar-btn" onclick="window.location.href='<?php echo e(route('profile.edit')); ?>'" title="Ver mi perfil">
                <?php if(isset($avatar) && (str_starts_with($avatar, '/uploads/') || str_starts_with($avatar, 'http'))): ?>
                    <img src="<?php echo e(asset($avatar)); ?>" alt="Avatar" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
                <?php elseif(isset($avatar) && $avatar === 'llama'): ?>
                    <span style="font-size: 24px;">🦙</span>
                <?php elseif(isset($avatar) && $avatar === 'condor'): ?>
                    <span style="font-size: 24px;">🦅</span>
                <?php elseif(isset($avatar) && $avatar === 'inca'): ?>
                    <span style="font-size: 24px;">👑</span>
                <?php elseif(isset($avatar) && $avatar === 'coya'): ?>
                    <span style="font-size: 24px;">👸</span>
                <?php elseif(isset($avatar) && $avatar === 'inti'): ?>
                    <span style="font-size: 24px;">☀️</span>
                <?php elseif(isset($avatar) && $avatar === 'chakana'): ?>
                    <span style="font-size: 24px;">🏔️</span>
                <?php elseif(isset($avatar) && $avatar === 'puma'): ?>
                    <span style="font-size: 24px;">🏹</span>
                <?php elseif(isset($avatar) && $avatar === 'diablada'): ?>
                    <span style="font-size: 24px;">🎭</span>
                <?php else: ?>
                    <svg viewBox="0 0 24 24" fill="none" stroke="#F0DCC0" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                <?php endif; ?>
            </button>
        </div>
    </header>
    <div class="stats-mobile" id="statsMobile">
        <div class="sm-chip hp"><svg viewBox="0 0 24 24" fill="#e74c3c"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z"/></svg><span class="sm-chip-val"><?php echo e($vidas); ?></span></div>
        <div class="sm-chip str"><svg viewBox="0 0 24 24" fill="none" stroke="#F5A623" stroke-width="2.2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg><span class="sm-chip-val"><?php echo e($racha); ?></span></div>
        <div class="sm-chip pts"><svg viewBox="0 0 24 24" fill="#00C9A7"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><span class="sm-chip-val"><?php echo e($puntuacion); ?></span></div>
    </div>
    <main id="main">
        <div class="sec-head"><div class="sec-line"></div><div class="sec-title">Elige una categoría</div><div class="sec-line" style="background:linear-gradient(270deg,var(--border),transparent)"></div></div>
        <div class="cat-grid" id="catGrid">
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cat-card" onclick="openSubmenu(<?php echo e($cat->id); ?>, '<?php echo e($cat->nombre); ?>', '<?php echo e($cat->icono ?? ''); ?>')">
                <div class="cc-topbar"></div>
                <div class="cc-body">
                    <div class="cc-img-wrap">
                        <svg viewBox="0 0 64 64" fill="none"><rect x="8" y="8" width="48" height="48" rx="10" fill="rgba(232,69,10,0.12)" stroke="rgba(232,69,10,0.4)" stroke-width="1.5"/><path d="M20 32 L32 20 L44 32 L44 46 L20 46 Z" fill="rgba(245,166,35,0.18)" stroke="#F5A623" stroke-width="1.5" stroke-linejoin="round"/><circle cx="32" cy="32" r="6" fill="rgba(232,69,10,0.25)" stroke="#E8450A" stroke-width="1.5"/></svg>
                    </div>
                    <div class="cc-name"><?php echo e($cat->nombre); ?></div>
                    <div class="cc-cta">Seleccionar ▶</div>
                </div>
                <div class="cc-arrow"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg></div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Mascota animada en bucle en el dashboard -->
        <img src="<?php echo e(asset('frames de saludo sin fondo/frame_1.png')); ?>" class="dashboard-llama" alt="Condorio animado" style="position: fixed; bottom: 80px; right: 10px; width: clamp(120px, 25vw, 200px); pointer-events: none; z-index: 10; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.3));">
    </main>
    <nav id="navbar">
        <button class="nb-btn" onclick="window.location.href='<?php echo e(url('/categorias')); ?>'"><svg viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg><span class="nb-lbl">Inicio</span></button>
        <button class="nb-btn" onclick="showLogros()"><svg viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg><span class="nb-lbl">Logros</span></button>
        <button class="nb-btn" onclick="alert('Práctica próximamente')"><svg viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg><span class="nb-lbl">Práctica</span></button>
        <button class="nb-btn" onclick="window.location.href='<?php echo e(route('profile.edit')); ?>'"><svg viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg><span class="nb-lbl">Perfil</span></button>
    </nav>
</div>

<!-- ========== SUBMENÚ ========== -->
<div id="submenu">
    <div class="sm-inner">
        <div class="sm-header">
            <div class="sm-back" onclick="closeSubmenu()"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg></div>
            <div class="sm-cat-info"><div class="sm-cat-img" id="smCatImg"><svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="32" r="20" stroke="#E8450A" stroke-width="1.5" fill="rgba(232,69,10,0.1)"/></svg></div><div><div class="sm-cat-name" id="smCatName">Categoría</div><div class="sm-cat-sub">Elige tu modo de juego</div></div></div>
        </div>
        <div class="sm-divider"></div>
        <div class="sm-sec-title">Modos de juego disponibles</div>
        <div class="sm-grid" id="smGrid">
            <a class="mode-card" data-mode="multiple" href="#"><div class="mc-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div><div class="mc-name">Opción Múltiple</div><div class="mc-desc">Elige la respuesta correcta entre varias opciones.</div><span class="mc-badge">Jugar ahora ▶</span></a>
            <a class="mode-card" data-mode="flashcards" href="#"><div class="mc-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="3"/><line x1="2" y1="10" x2="22" y2="10"/></svg></div><div class="mc-name">Flashcards</div><div class="mc-desc">Voltea las tarjetas y memoriza palabras en quechua.</div><span class="mc-badge">Jugar ahora ▶</span></a>
            <a class="mode-card" data-mode="match" href="#"><div class="mc-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><circle cx="6" cy="6" r="3"/><circle cx="18" cy="18" r="3"/><path d="M9 6h3a3 3 0 0 1 3 3v6"/></svg></div><div class="mc-name">Relacionar</div><div class="mc-desc">Conecta cada palabra en español con su traducción en quechua.</div><span class="mc-badge">Jugar ahora ▶</span></a>
            <a class="mode-card" data-mode="escribir" href="#"><div class="mc-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div><div class="mc-name">¿Cómo se dice?</div><div class="mc-desc">Escribe cómo se dice la palabra mostrada en quechua.</div><span class="mc-badge">Jugar ahora ▶</span></a>
        </div>
    </div>
</div>

<!-- ========== MODAL LOGROS ========== -->
<div class="overlay" id="logrosModal" onclick="closeModal('logrosModal')">
    <div class="sheet" onclick="event.stopPropagation()">
        <div class="profile-ava"><svg viewBox="0 0 24 24" fill="#FFD166"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
        <div class="profile-name">Mis Logros</div>
        <div class="profile-stats"><div class="ps-item"><span class="ps-val">6</span><span class="ps-lbl">Categorías</span></div><div class="ps-item"><span class="ps-val"><?php echo e($puntuacion); ?></span><span class="ps-lbl">Puntos</span></div></div>
        <hr class="sh-divider">
        <div class="logro-list"><div class="logro-item"><svg viewBox="0 0 24 24" fill="#FFD166"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><div><div class="logro-name">Primera lección</div><div class="logro-desc">Completaste tu primera lección</div></div></div><div class="logro-item <?php echo e($racha >= 7 ? '' : 'logro-locked'); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="#F5A623" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg><div><div class="logro-name">Racha de 7 días</div><div class="logro-desc">Juega 7 días seguidos</div></div></div><div class="logro-item <?php echo e($puntuacion >= 100 ? '' : 'logro-locked'); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="#00C9A7" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg><div><div class="logro-name">100 Puntos</div><div class="logro-desc">Alcanza 100 puntos en quechua</div></div></div></div>
        <button class="sh-btn" onclick="closeModal('logrosModal')">Cerrar</button>
    </div>
</div>

<!-- ========== MODAL PERFIL ========== -->
<div class="overlay" id="profileModal" onclick="closeModal('profileModal')">
    <div class="sheet" onclick="event.stopPropagation()">
        <div class="profile-ava">
            <?php if(isset($avatar) && (str_starts_with($avatar, '/uploads/') || str_starts_with($avatar, 'http'))): ?>
                <img src="<?php echo e(asset($avatar)); ?>" alt="Avatar" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
            <?php elseif(isset($avatar) && $avatar === 'llama'): ?>
                <span style="font-size: 38px;">🦙</span>
            <?php elseif(isset($avatar) && $avatar === 'condor'): ?>
                <span style="font-size: 38px;">🦅</span>
            <?php elseif(isset($avatar) && $avatar === 'inca'): ?>
                <span style="font-size: 38px;">👑</span>
            <?php elseif(isset($avatar) && $avatar === 'coya'): ?>
                <span style="font-size: 38px;">👸</span>
            <?php elseif(isset($avatar) && $avatar === 'inti'): ?>
                <span style="font-size: 38px;">☀️</span>
            <?php elseif(isset($avatar) && $avatar === 'chakana'): ?>
                <span style="font-size: 38px;">🏔️</span>
            <?php elseif(isset($avatar) && $avatar === 'puma'): ?>
                <span style="font-size: 38px;">🏹</span>
            <?php elseif(isset($avatar) && $avatar === 'diablada'): ?>
                <span style="font-size: 38px;">🎭</span>
            <?php else: ?>
                <svg viewBox="0 0 24 24" fill="none" stroke="#F0DCC0" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
            <?php endif; ?>
        </div>
        <div class="profile-name"><?php echo e($nombreUsuario); ?></div>
        <div class="profile-stats"><div class="ps-item"><span class="ps-val"><?php echo e($puntuacion); ?></span><span class="ps-lbl">Puntos</span></div><div class="ps-item"><span class="ps-val"><?php echo e($racha); ?></span><span class="ps-lbl">Racha</span></div><div class="ps-item"><span class="ps-val"><?php echo e($vidas); ?></span><span class="ps-lbl">Vidas</span></div></div>
        <hr class="sh-divider">
        <button type="button" class="sh-btn" onclick="toggleTheme()">🌓 Alternar Modo Claro / Oscuro</button>
        <button type="button" class="sh-btn" style="background: linear-gradient(135deg, var(--pri), var(--pri-dk)); color: #fff; font-weight: 700;" onclick="window.location.href='<?php echo e(route('profile.edit')); ?>'">🌟 Ver Perfil Completo y Avatar</button>
        <form method="POST" action="<?php echo e(route('logout')); ?>"><?php echo csrf_field(); ?><button type="submit" class="sh-btn" style="color: #ff7676;">Cerrar sesión</button></form>
        <button class="sh-btn" onclick="closeModal('profileModal')">Cerrar</button>
    </div>
</div>

<script>
    // Animación de mascota ping-pong
    const animFrames = [];
    for (let i = 1; i <= 40; i++) {
        if (i <= 10) {
            animFrames.push(`<?php echo e(asset('frames de saludo sin fondo/frame_')); ?>${i}.png`);
        } else {
            animFrames.push(`<?php echo e(asset('frames de saludo sin fondo/frame_')); ?>${i}-removebg-preview.png`);
        }
    }
    const splashImg = document.querySelector('.splash-llama');
    const glImg = document.querySelector('.gl-icon');
    const dashboardImg = document.querySelector('.dashboard-llama');
    let frameIdx = 0;
    let animDir = 1;
    setInterval(() => {
        if (splashImg && document.getElementById('splash').style.display !== 'none') {
            splashImg.src = animFrames[frameIdx];
        }
        if (glImg && document.getElementById('gameLoader').style.display !== 'none') {
            glImg.src = animFrames[frameIdx];
        }
        if (dashboardImg) {
            dashboardImg.src = animFrames[frameIdx];
        }
        
        frameIdx += animDir;
        if (frameIdx >= 39) { animDir = -1; frameIdx = 39; }
        if (frameIdx <= 0) { animDir = 1; frameIdx = 0; }
    }, 45); // ~22fps

    // Partículas splash
    for (let i = 0; i < 40; i++) {
        let p = document.createElement('div');
        p.className = 'sp';
        p.style.cssText = `left:${Math.random()*100}%;top:${72+Math.random()*28}%;width:${2+Math.random()*3.5}px;height:${2+Math.random()*3.5}px;background:${Math.random()>.5?'#F5A623':'#E8450A'};animation-duration:${3+Math.random()*6}s;animation-delay:${Math.random()*4}s;box-shadow:0 0 ${4+Math.random()*3}px ${Math.random()>.5?'#F5A623':'#E8450A'};`;
        document.getElementById('spCont').appendChild(p);
    }
    let pct = 0;
    let interval = setInterval(() => { pct = Math.min(pct + Math.floor(Math.random()*8)+2, 100); document.getElementById('lPct').innerText = pct+'%'; if(pct>=100) clearInterval(interval); }, 70);
    setTimeout(() => {
        document.getElementById('splash').classList.add('splash-exit');
        setTimeout(() => { document.getElementById('splash').style.display = 'none'; document.getElementById('app').classList.add('visible'); spawnLobbyParticlesLoop(); }, 650);
    }, 3800);
    function spawnLobbyParticlesLoop() { for(let i=0;i<35;i++) setTimeout(spawnLP, i*90); setInterval(spawnLP, 270); }
    function spawnLP() { let p = document.createElement('div'); p.className = 'lp'; let s = 2+Math.random()*4; p.style.cssText = `left:${Math.random()*100}%;bottom:${-4+Math.random()*8}%;width:${s}px;height:${s}px;background:${['#F5A623','#E8450A','#FFD166','#FF6B35','#00C9A7'][Math.floor(Math.random()*5)]};animation-duration:${5+Math.random()*8}s;`; document.getElementById('lp').appendChild(p); setTimeout(()=>p.remove(), (5+Math.random()*8)*1000); }
    let currentCat = null;
    function openSubmenu(id, name, icon) {
        currentCat = id;
        document.getElementById('smCatName').innerText = name;
        document.getElementById('submenu').classList.add('open');
        document.body.style.overflow = 'hidden';
        let cards = document.querySelectorAll('#smGrid .mode-card');
        cards.forEach(card => {
            let mode = card.dataset.mode || 'multiple';
            card.href = `/juego/${id}?modo=${mode}`;
        });
    }
    function closeSubmenu() { document.getElementById('submenu').classList.remove('open'); document.body.style.overflow = ''; }
    function showLogros() { document.getElementById('logrosModal').classList.add('show'); }
    function showProfile() { document.getElementById('profileModal').classList.add('show'); }
    function closeModal(id) { document.getElementById(id).classList.remove('show'); }
    window.addEventListener('click', (e) => { if(e.target.classList.contains('overlay')) closeModal(e.target.id); });
    // Modo claro / oscuro persistente
    function updateThemeUI(theme) {
        const btn = document.getElementById('themeToggleBtn');
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
        closeModal('profileModal');
    }

    // Inicializar UI de tema
    document.addEventListener('DOMContentLoaded', () => {
        const theme = localStorage.getItem('boliquechua_theme') || 'dark';
        updateThemeUI(theme);
    });
</script>
</body>
</html><?php /**PATH D:\proyecto-boliquechua-de-chore-main (1)\proyecto-boliquechua-de-chore-main\resources\views/index.blade.php ENDPATH**/ ?>