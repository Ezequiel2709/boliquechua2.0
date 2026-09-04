<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BOLIQUECHUA - Perfil de Usuario</title>
    <script>
        (function() {
            var theme = localStorage.getItem('boliquechua_theme') || 'dark';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700;800&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --pri: #ff4a10;
            --pri-dk: #b12d07;
            --pri-lt: #ff7a3e;
            --gold: #ffd166;
            --gold-dk: #f5a623;
            --teal: #00e6c3;
            --purple: #a66bff;
            --blue: #4bb3ff;
            --danger: #ff4d4d;

            --bg0: #050202;
            --bg1: #0a0503;
            --bg2: #120704;
            --card: rgba(255, 244, 230, 0.04);
            --card2: rgba(255, 244, 230, 0.07);
            --card-hover: rgba(255, 244, 230, 0.09);
            --text: #f3e6d3;
            --muted: rgba(243, 230, 211, 0.65);
            --muted2: rgba(243, 230, 211, 0.45);

            --border: rgba(255, 74, 16, 0.20);
            --border2: rgba(255, 209, 102, 0.16);

            --shadow: 0 18px 60px rgba(0, 0, 0, 0.65);
            --shadow-sm: 0 8px 24px rgba(0, 0, 0, 0.4);

            --r-lg: 24px;
            --r-md: 18px;
            --r-sm: 12px;

            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            font-family: 'Nunito', system-ui, -apple-system, sans-serif;
            color: var(--text);
            background: radial-gradient(1200px 700px at 15% 10%, rgba(255, 74, 16, 0.18), transparent 55%),
                        radial-gradient(900px 520px at 85% 20%, rgba(0, 230, 195, 0.12), transparent 60%),
                        radial-gradient(900px 650px at 50% 90%, rgba(255, 209, 102, 0.12), transparent 62%),
                        linear-gradient(180deg, var(--bg0), var(--bg1) 50%, #030101);
            min-height: 100vh;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* Partículas de fondo */
        .bg-particles {
            position: fixed;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }
        .bg-p {
            position: absolute;
            border-radius: 50%;
            opacity: 0;
            animation: floatP 7s linear infinite;
        }
        @keyframes floatP {
            0% { opacity: 0; transform: translateY(0) scale(0.8); }
            15% { opacity: 0.7; }
            85% { opacity: 0.6; }
            100% { opacity: 0; transform: translateY(-100vh) scale(0.2); }
        }

        /* Layout Principal */
        .app-container {
            position: relative;
            z-index: 1;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px 60px;
        }

        /* Topbar / Header */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 0;
            margin-bottom: 24px;
            border-bottom: 1px solid var(--border);
            gap: 16px;
            flex-wrap: wrap;
        }
        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--card);
            border: 1px solid var(--border);
            color: var(--text);
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 0.95em;
            transition: all 0.2s var(--ease);
        }
        .back-btn:hover {
            background: var(--pri);
            color: #fff;
            transform: translateX(-3px);
            box-shadow: 0 0 20px rgba(255, 74, 16, 0.4);
        }
        .brand-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.8em;
            font-weight: 800;
            letter-spacing: 3px;
            color: #fff;
            text-transform: uppercase;
        }
        .brand-title span { color: var(--pri); text-shadow: 0 0 16px rgba(255, 74, 16, 0.5); }

        .topbar-stats {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .stat-pill {
            display: flex;
            align-items: center;
            gap: 7px;
            background: var(--card2);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 7px 15px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.15em;
            font-weight: 700;
        }
        .stat-pill.heart { color: #ff5252; border-color: rgba(255, 82, 82, 0.3); }
        .stat-pill.fire { color: var(--gold); border-color: rgba(255, 209, 102, 0.3); }
        .stat-pill.xp { color: var(--teal); border-color: rgba(0, 230, 195, 0.3); }

        .logout-btn-top {
            background: rgba(255, 77, 77, 0.12);
            border: 1px solid rgba(255, 77, 77, 0.3);
            color: #ff7676;
            border-radius: 30px;
            padding: 9px 18px;
            font-weight: 700;
            font-size: 0.9em;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .logout-btn-top:hover {
            background: var(--danger);
            color: #fff;
            box-shadow: 0 0 18px rgba(255, 77, 77, 0.4);
        }

        /* Notificación de Estado */
        .status-alert {
            background: linear-gradient(90deg, rgba(0, 230, 195, 0.15), rgba(0, 230, 195, 0.05));
            border: 1px solid rgba(0, 230, 195, 0.4);
            color: var(--teal);
            border-radius: var(--r-md);
            padding: 14px 20px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-weight: 600;
            animation: fadeIn 0.3s ease;
        }
        .error-alert {
            background: linear-gradient(90deg, rgba(255, 77, 77, 0.15), rgba(255, 77, 77, 0.05));
            border: 1px solid rgba(255, 77, 77, 0.4);
            color: #ff8080;
            border-radius: var(--r-md);
            padding: 14px 20px;
            margin-bottom: 24px;
            font-weight: 600;
        }

        /* Grid Principal de Perfil */
        .profile-grid {
            display: grid;
            grid-template-columns: 360px 1fr;
            gap: 24px;
        }
        @media (max-width: 900px) {
            .profile-grid { grid-template-columns: 1fr; }
        }

        /* Tarjeta de Perfil Hero */
        .profile-card {
            background: linear-gradient(180deg, rgba(255, 244, 230, 0.06), rgba(255, 244, 230, 0.02));
            border: 1px solid var(--border);
            border-radius: var(--r-lg);
            padding: 30px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        .profile-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(180deg, rgba(255, 74, 16, 0.22), transparent);
            pointer-events: none;
        }

        /* Avatar Grande */
        .avatar-wrap {
            position: relative;
            margin-bottom: 18px;
            cursor: pointer;
        }
        .avatar-frame {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--pri), var(--gold));
            padding: 4px;
            box-shadow: 0 0 35px rgba(255, 74, 16, 0.35);
            position: relative;
            transition: transform 0.3s var(--ease);
        }
        .avatar-wrap:hover .avatar-frame {
            transform: scale(1.04);
            box-shadow: 0 0 45px rgba(255, 74, 16, 0.55);
        }
        .avatar-img-inner {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: #140804;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        .avatar-img-inner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .avatar-img-inner svg {
            width: 75%;
            height: 75%;
        }
        .avatar-edit-badge {
            position: absolute;
            bottom: 4px;
            right: 4px;
            background: var(--pri);
            border: 2px solid #140804;
            color: #fff;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.5);
            transition: all 0.2s;
        }
        .avatar-wrap:hover .avatar-edit-badge {
            background: var(--gold);
            color: #140804;
            transform: scale(1.1);
        }

        .user-name {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.8em;
            font-weight: 800;
            color: #fff;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }
        .user-email {
            font-size: 0.92em;
            color: var(--muted);
            margin-bottom: 14px;
            word-break: break-all;
        }

        /* Badge de Liga */
        .league-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 209, 102, 0.12);
            border: 1px solid rgba(255, 209, 102, 0.35);
            color: var(--gold);
            padding: 6px 16px;
            border-radius: 20px;
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.1em;
            font-weight: 700;
            margin-bottom: 20px;
            box-shadow: 0 0 15px rgba(255, 209, 102, 0.15);
        }

        .user-joined {
            font-size: 0.85em;
            color: var(--muted2);
            margin-bottom: 24px;
        }

        .profile-actions {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .btn-primary {
            width: 100%;
            background: linear-gradient(135deg, var(--pri), var(--pri-dk));
            border: 1px solid var(--pri-lt);
            color: #fff;
            padding: 12px 20px;
            border-radius: var(--r-md);
            font-weight: 800;
            font-size: 1em;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.2s var(--ease);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 6px 20px rgba(255, 74, 16, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(255, 74, 16, 0.45);
            filter: brightness(1.1);
        }
        .btn-secondary {
            width: 100%;
            background: var(--card2);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 11px 20px;
            border-radius: var(--r-md);
            font-weight: 700;
            font-size: 0.95em;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-color: rgba(255, 209, 102, 0.4);
        }
        .btn-danger {
            width: 100%;
            background: rgba(255, 77, 77, 0.1);
            border: 1px solid rgba(255, 77, 77, 0.25);
            color: #ff7676;
            padding: 11px 20px;
            border-radius: var(--r-md);
            font-weight: 700;
            font-size: 0.95em;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-danger:hover {
            background: var(--danger);
            color: #fff;
            box-shadow: 0 6px 20px rgba(255, 77, 77, 0.4);
        }

        /* Columna Derecha (Estadísticas & Secciones) */
        .content-col {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* MÓDULO DE RACHA ESTILO DUOLINGO */
        .streak-card {
            background: linear-gradient(135deg, rgba(255, 74, 16, 0.14), rgba(255, 209, 102, 0.06));
            border: 1px solid rgba(255, 74, 16, 0.35);
            border-radius: var(--r-lg);
            padding: 26px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
        }
        .streak-card::after {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 160px;
            height: 160px;
            background: radial-gradient(circle, rgba(255, 74, 16, 0.25), transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }
        .streak-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 12px;
        }
        .streak-title-wrap {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .streak-flame-icon {
            font-size: 2.8em;
            filter: drop-shadow(0 0 16px rgba(255, 122, 62, 0.8));
            animation: flamePulse 2s ease-in-out infinite alternate;
        }
        @keyframes flamePulse {
            0% { transform: scale(0.95); filter: drop-shadow(0 0 10px rgba(255, 74, 16, 0.6)); }
            100% { transform: scale(1.08); filter: drop-shadow(0 0 24px rgba(255, 209, 102, 0.9)); }
        }
        .streak-count {
            font-family: 'Rajdhani', sans-serif;
            font-size: 2.2em;
            font-weight: 800;
            color: #fff;
            line-height: 1;
        }
        .streak-count span { color: var(--gold); }
        .streak-sub {
            font-size: 0.9em;
            color: var(--muted);
            margin-top: 3px;
        }

        /* Calendario Semanal de Racha */
        .streak-week {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 8px;
            background: rgba(0, 0, 0, 0.28);
            border-radius: var(--r-md);
            padding: 14px 10px;
            border: 1px solid rgba(255, 74, 16, 0.15);
        }
        .week-day {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }
        .day-letter {
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.95em;
            font-weight: 700;
            color: var(--muted2);
            text-transform: uppercase;
        }
        .week-day.today .day-letter {
            color: var(--gold);
            font-weight: 800;
        }
        .day-bubble {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--muted2);
            transition: all 0.3s;
        }
        .week-day.active .day-bubble {
            background: linear-gradient(135deg, var(--pri), var(--gold-dk));
            border-color: var(--gold);
            color: #fff;
            box-shadow: 0 0 16px rgba(255, 74, 16, 0.55);
            transform: scale(1.05);
        }
        .week-day.today .day-bubble {
            border: 2px solid var(--gold);
        }

        /* Tarjeta de Estadísticas y Nivel XP */
        .stats-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--r-lg);
            padding: 26px;
            box-shadow: var(--shadow);
        }
        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
        }
        .section-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.45em;
            font-weight: 800;
            color: #fff;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .section-title::before {
            content: '';
            width: 4px;
            height: 20px;
            background: var(--pri);
            border-radius: 2px;
        }

        /* Barra de Nivel XP */
        .level-progress-box {
            background: var(--card2);
            border: 1px solid var(--border2);
            border-radius: var(--r-md);
            padding: 18px;
            margin-bottom: 20px;
        }
        .level-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-family: 'Rajdhani', sans-serif;
            font-weight: 700;
        }
        .level-name {
            font-size: 1.3em;
            color: var(--gold);
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .level-xp-text {
            font-size: 1.1em;
            color: var(--teal);
        }
        .xp-bar-track {
            width: 100%;
            height: 14px;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            border: 1px solid rgba(0, 230, 195, 0.2);
        }
        .xp-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--teal), #67ffdb);
            border-radius: 10px;
            box-shadow: 0 0 14px rgba(0, 230, 195, 0.6);
            transition: width 0.8s var(--ease);
        }

        /* Cuadrícula de Métricas */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 14px;
        }
        .metric-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            border-radius: var(--r-md);
            padding: 16px 14px;
            text-align: center;
            transition: transform 0.2s, background 0.2s;
        }
        .metric-box:hover {
            transform: translateY(-2px);
            background: rgba(255, 255, 255, 0.06);
            border-color: var(--border2);
        }
        .metric-icon { font-size: 2em; margin-bottom: 6px; }
        .metric-val {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.7em;
            font-weight: 800;
            color: #fff;
            line-height: 1.1;
        }
        .metric-lbl {
            font-size: 0.82em;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 4px;
        }

        /* LOGROS Y MEDALLAS */
        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
        }
        .achievement-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--r-md);
            padding: 18px;
            display: flex;
            gap: 14px;
            align-items: flex-start;
            position: relative;
            overflow: hidden;
            transition: all 0.2s var(--ease);
        }
        .achievement-card.completed {
            border-color: rgba(255, 209, 102, 0.4);
            background: linear-gradient(135deg, rgba(255, 209, 102, 0.08), rgba(255, 74, 16, 0.04));
        }
        .achievement-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }
        .ach-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }
        .achievement-card.completed .ach-icon-box {
            background: linear-gradient(135deg, var(--gold-dk), var(--pri));
            box-shadow: 0 0 16px rgba(255, 209, 102, 0.4);
        }
        .ach-info { flex: 1; }
        .ach-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.18em;
            font-weight: 700;
            color: #fff;
            margin-bottom: 2px;
        }
        .ach-desc {
            font-size: 0.84em;
            color: var(--muted);
            line-height: 1.3;
            margin-bottom: 8px;
        }
        .ach-progress-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .ach-bar-track {
            flex: 1;
            height: 6px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 6px;
            overflow: hidden;
        }
        .ach-bar-fill {
            height: 100%;
            background: var(--gold);
            border-radius: 6px;
        }
        .ach-badge-status {
            font-size: 0.76em;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 10px;
            background: rgba(0, 230, 195, 0.15);
            color: var(--teal);
        }
        .ach-badge-status.locked {
            background: rgba(255, 255, 255, 0.08);
            color: var(--muted2);
        }

        /* MODAL / SECCIÓN DE PERSONALIZACIÓN DE AVATAR */
        .modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(12px);
            z-index: 999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s var(--ease);
        }
        .modal-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }
        .modal-box {
            background: linear-gradient(180deg, #180c07, #0d0603);
            border: 1px solid var(--border);
            border-radius: var(--r-lg);
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 30px;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.8);
            position: relative;
            transform: translateY(20px) scale(0.96);
            transition: transform 0.25s var(--ease);
        }
        .modal-overlay.active .modal-box {
            transform: translateY(0) scale(1);
        }
        .modal-close {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--card2);
            border: 1px solid var(--border);
            color: var(--muted);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .modal-close:hover {
            color: #fff;
            background: var(--pri);
        }

        /* Selector de Avatares Predefinidos */
        .avatar-presets-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin: 18px 0;
        }
        @media (max-width: 500px) {
            .avatar-presets-grid { grid-template-columns: repeat(3, 1fr); }
        }
        .preset-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            padding: 12px 8px;
            border-radius: var(--r-md);
            background: rgba(255, 255, 255, 0.03);
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.2s;
        }
        .preset-item:hover {
            background: rgba(255, 74, 16, 0.1);
            border-color: rgba(255, 74, 16, 0.4);
            transform: translateY(-2px);
        }
        .preset-item.selected {
            background: rgba(255, 74, 16, 0.2);
            border-color: var(--pri);
            box-shadow: 0 0 20px rgba(255, 74, 16, 0.4);
        }
        .preset-icon {
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: #1e0d06;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .preset-name {
            font-size: 0.8em;
            color: var(--text);
            font-weight: 700;
        }

        /* Subida de Archivo Foto */
        .file-upload-zone {
            display: block;
            border: 2px dashed rgba(255, 74, 16, 0.35);
            border-radius: var(--r-md);
            padding: 24px;
            text-align: center;
            background: rgba(0, 0, 0, 0.25);
            cursor: pointer;
            transition: all 0.2s;
            margin-bottom: 20px;
        }
        .file-upload-zone:hover {
            border-color: var(--gold);
            background: rgba(255, 209, 102, 0.05);
        }
        .upload-icon { font-size: 2.2em; color: var(--pri); margin-bottom: 8px; }
        .upload-hint { font-size: 0.85em; color: var(--muted2); margin-top: 4px; }

        /* Formularios */
        .form-group {
            margin-bottom: 16px;
            text-align: left;
        }
        .form-label {
            display: block;
            font-size: 0.9em;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 6px;
        }
        .form-input {
            width: 100%;
            background: rgba(0, 0, 0, 0.4);
            border: 1px solid var(--border);
            border-radius: var(--r-sm);
            padding: 12px 16px;
            color: #fff;
            font-family: 'Nunito', sans-serif;
            font-size: 0.95em;
            transition: all 0.2s;
        }
        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 15px rgba(255, 209, 102, 0.25);
        }
        .input-error {
            font-size: 0.8em;
            color: #ff6b6b;
            margin-top: 4px;
        }

        /* Tabs para Modales */
        .tabs-header {
            display: flex;
            gap: 10px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
        .tab-btn {
            background: none;
            border: none;
            color: var(--muted);
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.15em;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .tab-btn.active {
            background: var(--card2);
            color: var(--gold);
            box-shadow: 0 0 12px rgba(255, 209, 102, 0.15);
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: translateY(0); } }

        /* ====== THEME TOGGLE BUTTON ====== */
        .theme-toggle-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: var(--card);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 8px 16px;
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
            background: var(--pri);
            color: #fff;
            border-color: var(--pri);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 74, 16, 0.3);
        }
        .theme-toggle-btn:active {
            transform: translateY(0) scale(0.98);
        }
        .theme-icon {
            font-size: 1.1em;
            transition: transform 0.3s var(--ease);
            display: inline-block;
        }
        .theme-toggle-btn:hover .theme-icon {
            transform: rotate(20deg) scale(1.12);
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
            --bg2: #eae0cf;
            --card: rgba(255, 255, 255, 0.90);
            --card2: rgba(255, 255, 255, 0.96);
            --card-hover: rgba(255, 255, 255, 1);
            --text: #23150c;
            --muted: #6b5344;
            --muted2: #8a7364;
            --border: rgba(214, 60, 10, 0.18);
            --border2: rgba(201, 133, 0, 0.22);
            --shadow: 0 16px 45px rgba(90, 40, 10, 0.10);
            --shadow-sm: 0 6px 18px rgba(90, 40, 10, 0.07);
        }

        html[data-theme="light"] body {
            color: var(--text);
            background: radial-gradient(1200px 700px at 15% 10%, rgba(255, 122, 62, 0.12), transparent 55%),
                        radial-gradient(900px 520px at 85% 20%, rgba(0, 201, 167, 0.08), transparent 60%),
                        radial-gradient(900px 650px at 50% 90%, rgba(245, 166, 35, 0.10), transparent 62%),
                        linear-gradient(180deg, var(--bg0), var(--bg1) 50%, #e2d5be);
        }

        html[data-theme="light"] .topbar {
            border-bottom-color: rgba(214, 60, 10, 0.16);
        }

        html[data-theme="light"] .back-btn {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.18);
            color: #23150c;
            box-shadow: 0 4px 12px rgba(90, 40, 10, 0.06);
        }
        html[data-theme="light"] .back-btn:hover {
            background: var(--pri);
            color: #fff;
        }

        html[data-theme="light"] .brand-title {
            color: #23150c;
        }

        html[data-theme="light"] .stat-pill {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.16);
            box-shadow: 0 4px 12px rgba(90, 40, 10, 0.05);
        }
        html[data-theme="light"] .stat-pill.heart { color: #d63c3c; border-color: rgba(214, 60, 60, 0.22); }
        html[data-theme="light"] .stat-pill.fire  { color: #c98500; border-color: rgba(201, 133, 0, 0.28); }
        html[data-theme="light"] .stat-pill.xp    { color: #008f7a; border-color: rgba(0, 143, 122, 0.28); }

        html[data-theme="light"] .profile-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 243, 235, 0.92));
            border-color: rgba(214, 60, 10, 0.16);
            box-shadow: 0 16px 45px rgba(90, 40, 10, 0.09);
        }
        html[data-theme="light"] .profile-card::before {
            background: linear-gradient(180deg, rgba(214, 60, 10, 0.12), transparent);
        }

        html[data-theme="light"] .user-name {
            color: #23150c;
        }
        html[data-theme="light"] .league-badge {
            background: rgba(201, 133, 0, 0.12);
            border-color: rgba(201, 133, 0, 0.35);
            color: #c98500;
        }

        html[data-theme="light"] .btn-secondary {
            background: rgba(240, 231, 219, 0.85);
            border-color: rgba(214, 60, 10, 0.18);
            color: #23150c;
        }
        html[data-theme="light"] .btn-secondary:hover {
            background: rgba(228, 215, 198, 0.95);
            color: #23150c;
        }

        html[data-theme="light"] .streak-card {
            background: linear-gradient(135deg, rgba(214, 60, 10, 0.09), rgba(201, 133, 0, 0.05));
            border-color: rgba(214, 60, 10, 0.28);
            box-shadow: 0 12px 35px rgba(90, 40, 10, 0.08);
        }
        html[data-theme="light"] .streak-count {
            color: #23150c;
        }
        html[data-theme="light"] .streak-week {
            background: rgba(240, 231, 219, 0.65);
            border-color: rgba(214, 60, 10, 0.14);
        }
        html[data-theme="light"] .day-bubble {
            background: rgba(90, 40, 10, 0.06);
            border-color: rgba(90, 40, 10, 0.14);
        }

        html[data-theme="light"] .stats-card,
        html[data-theme="light"] .achievement-card {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.14);
            box-shadow: 0 10px 30px rgba(90, 40, 10, 0.06);
        }
        html[data-theme="light"] .achievement-card.completed {
            background: linear-gradient(135deg, rgba(201, 133, 0, 0.08), rgba(214, 60, 10, 0.04));
            border-color: rgba(201, 133, 0, 0.35);
        }

        html[data-theme="light"] .section-title {
            color: #23150c;
        }
        html[data-theme="light"] .ach-title {
            color: #23150c;
        }

        html[data-theme="light"] .level-progress-box {
            background: rgba(240, 231, 219, 0.75);
            border-color: rgba(201, 133, 0, 0.22);
        }
        html[data-theme="light"] .xp-bar-track {
            background: rgba(90, 40, 10, 0.12);
            border-color: rgba(0, 143, 122, 0.2);
        }

        html[data-theme="light"] .metric-box {
            background: rgba(240, 231, 219, 0.55);
            border-color: rgba(214, 60, 10, 0.14);
        }
        html[data-theme="light"] .metric-box:hover {
            background: rgba(228, 215, 198, 0.85);
        }
        html[data-theme="light"] .metric-val {
            color: #23150c;
        }

        html[data-theme="light"] .modal-box {
            background: linear-gradient(180deg, #ffffff, #f7f1e6);
            border-color: rgba(214, 60, 10, 0.18);
            box-shadow: 0 25px 70px rgba(90, 40, 10, 0.22);
        }
        html[data-theme="light"] .modal-close {
            background: rgba(240, 231, 219, 0.85);
            border-color: rgba(214, 60, 10, 0.18);
            color: #6b5344;
        }
        html[data-theme="light"] .modal-close:hover {
            background: var(--pri);
            color: #fff;
        }

        html[data-theme="light"] .preset-item {
            background: rgba(240, 231, 219, 0.55);
            border-color: rgba(214, 60, 10, 0.14);
        }
        html[data-theme="light"] .preset-item:hover {
            background: rgba(214, 60, 10, 0.08);
            border-color: rgba(214, 60, 10, 0.35);
        }
        html[data-theme="light"] .preset-icon {
            background: #ffffff;
        }

        html[data-theme="light"] .file-upload-zone {
            background: rgba(240, 231, 219, 0.45);
            border-color: rgba(214, 60, 10, 0.30);
        }
        html[data-theme="light"] .file-upload-zone:hover {
            background: rgba(201, 133, 0, 0.05);
            border-color: #c98500;
        }

        html[data-theme="light"] .form-input {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.22);
            color: #23150c;
        }
        html[data-theme="light"] .form-input:focus {
            border-color: #c98500;
            box-shadow: 0 0 15px rgba(201, 133, 0, 0.18);
        }
        html[data-theme="light"] .form-label {
            color: #23150c;
        }

        html[data-theme="light"] .tabs-header {
            border-bottom-color: rgba(214, 60, 10, 0.16);
        }
        html[data-theme="light"] .tab-btn {
            color: #6b5344;
        }
        html[data-theme="light"] .tab-btn.active {
            background: rgba(240, 231, 219, 0.85);
            color: #c98500;
        }

        html[data-theme="light"] .status-alert {
            background: linear-gradient(90deg, rgba(0, 143, 122, 0.12), rgba(0, 143, 122, 0.04));
            border-color: rgba(0, 143, 122, 0.35);
            color: #008f7a;
        }

        @media (max-width: 600px) {
            .theme-lbl { display: none; }
        }
    </style>
</head>
<body>

    <!-- Partículas ambientales -->
    <div class="bg-particles" id="bgParticles"></div>

    <div class="app-container">

        <!-- Topbar -->
        <header class="topbar">
            <div class="topbar-left">
                <a href="<?php echo e(route('categorias')); ?>" class="back-btn">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>
                    Volver al juego
                </a>
                <div class="brand-title">BOLI<span>QUECHUA</span></div>
            </div>

            <div class="topbar-stats">
                <div class="stat-pill heart" title="Vidas">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z"/></svg>
                    <span><?php echo e($vidas); ?></span>
                </div>
                <div class="stat-pill fire" title="Días de racha">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                    <span><?php echo e($racha); ?></span>
                </div>
                <div class="stat-pill xp" title="Puntos XP">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <span><?php echo e($puntuacion); ?></span>
                </div>
                <button class="theme-toggle-btn" id="profileThemeToggleBtn" onclick="toggleTheme()" title="Cambiar a Modo Claro">
                    <span class="theme-icon">☀️</span>
                    <span class="theme-lbl">Modo</span>
                </button>
                <button type="button" class="logout-btn-top" onclick="openModal('logoutModal')">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                    Cerrar sesión
                </button>
            </div>
        </header>

        <!-- Alertas de estado -->
        <?php if(session('status') === 'profile-updated'): ?>
            <div class="status-alert">
                <span>✨ ¡Perfil y avatar actualizados exitosamente!</span>
                <button type="button" onclick="this.parentElement.remove()" style="background:none;border:none;color:var(--teal);cursor:pointer;font-size:18px;">✕</button>
            </div>
        <?php endif; ?>
        <?php if(session('status') === 'password-updated'): ?>
            <div class="status-alert">
                <span>🔒 ¡Contraseña modificada correctamente!</span>
                <button type="button" onclick="this.parentElement.remove()" style="background:none;border:none;color:var(--teal);cursor:pointer;font-size:18px;">✕</button>
            </div>
        <?php endif; ?>
        <?php if($errors->any()): ?>
            <div class="error-alert">
                <strong>Ocurrió un inconveniente:</strong>
                <ul style="margin-left: 20px; margin-top: 6px;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Grid Principal de Perfil -->
        <div class="profile-grid">

            <!-- Columna Izquierda: Tarjeta Hero del Usuario -->
            <div class="profile-card">
                <div class="avatar-wrap" onclick="openModal('avatarModal')" title="Haz clic para cambiar tu foto o avatar">
                    <div class="avatar-frame">
                        <div class="avatar-img-inner" id="currentAvatarDisplay">
                            <?php if($user->avatar && (str_starts_with($user->avatar, '/uploads/') || str_starts_with($user->avatar, 'http'))): ?>
                                <img src="<?php echo e(asset($user->avatar)); ?>" alt="Avatar de <?php echo e($user->name); ?>">
                            <?php elseif($user->avatar === 'llama'): ?>
                                <span style="font-size: 60px;">🦙</span>
                            <?php elseif($user->avatar === 'condor'): ?>
                                <span style="font-size: 60px;">🦅</span>
                            <?php elseif($user->avatar === 'inca'): ?>
                                <span style="font-size: 60px;">👑</span>
                            <?php elseif($user->avatar === 'coya'): ?>
                                <span style="font-size: 60px;">👸</span>
                            <?php elseif($user->avatar === 'inti'): ?>
                                <span style="font-size: 60px;">☀️</span>
                            <?php elseif($user->avatar === 'chakana'): ?>
                                <span style="font-size: 60px;">🏔️</span>
                            <?php elseif($user->avatar === 'puma'): ?>
                                <span style="font-size: 60px;">🏹</span>
                            <?php elseif($user->avatar === 'diablada'): ?>
                                <span style="font-size: 60px;">🎭</span>
                            <?php else: ?>
                                <svg viewBox="0 0 24 24" fill="none" stroke="#F0DCC0" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="avatar-edit-badge" title="Cambiar avatar">📷</div>
                </div>

                <h1 class="user-name"><?php echo e($user->name); ?></h1>
                <p class="user-email"><?php echo e($user->email); ?></p>

                <div class="league-badge">
                    <span><?php echo e($liga['icono']); ?></span>
                    <span><?php echo e($liga['nombre']); ?></span>
                </div>

                <div class="user-joined">
                    🗓️ Miembro desde <?php echo e($user->created_at ? $user->created_at->translatedFormat('F Y') : 'Reciente'); ?>

                </div>

                <div class="profile-actions">
                    <button type="button" class="btn-primary" onclick="openModal('avatarModal')">
                        <span>🎨</span> Cambiar Foto / Avatar
                    </button>
                    <button type="button" class="btn-secondary" onclick="openModal('editInfoModal')">
                        <span>⚙️</span> Editar Datos y Cuenta
                    </button>
                    <button type="button" class="btn-secondary" onclick="openModal('passwordModal')">
                        <span>🔒</span> Cambiar Contraseña
                    </button>
                    <button type="button" class="btn-danger" onclick="openModal('logoutModal')">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                        Cerrar Sesión
                    </button>
                </div>
            </div>

            <!-- Columna Derecha: Racha, Nivel XP y Logros Duolingo -->
            <div class="content-col">

                <!-- TARJETA DE RACHA ESTILO DUOLINGO -->
                <div class="streak-card">
                    <div class="streak-head">
                        <div class="streak-title-wrap">
                            <div class="streak-flame-icon">🔥</div>
                            <div>
                                <div class="streak-count">
                                    <span><?php echo e($racha); ?></span> <?php echo e($racha === 1 ? 'DÍA DE RACHA' : 'DÍAS DE RACHA'); ?>

                                </div>
                                <div class="streak-sub">
                                    <?php if($racha > 0): ?>
                                        ¡Tu fuego andino está encendido! Practica hoy para mantenerlo activo.
                                    <?php else: ?>
                                        ¡Juega hoy una lección para comenzar tu racha de aprendizaje!
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Calendario semanal de racha -->
                    <div class="streak-week">
                        <?php $__currentLoopData = $calendarioRacha; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="week-day <?php echo e($dia['activo'] ? 'active' : ''); ?> <?php echo e($dia['es_hoy'] ? 'today' : ''); ?>">
                                <span class="day-letter"><?php echo e($dia['letra']); ?></span>
                                <div class="day-bubble" title="<?php echo e($dia['nombre']); ?><?php echo e($dia['es_hoy'] ? ' (Hoy)' : ''); ?>">
                                    <?php if($dia['activo']): ?>
                                        🔥
                                    <?php elseif($dia['es_hoy']): ?>
                                        ⚡
                                    <?php else: ?>
                                        •
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <!-- NIVEL XP Y ESTADÍSTICAS -->
                <div class="stats-card">
                    <div class="section-header">
                        <div class="section-title">Nivel de Aprendizaje y Estadísticas</div>
                    </div>

                    <!-- Barra de Nivel XP -->
                    <div class="level-progress-box">
                        <div class="level-head">
                            <div class="level-name">
                                <span><?php echo e($nivelInfo['icon']); ?></span>
                                <span>Nivel <?php echo e($nivelActual); ?> · <?php echo e($nivelInfo['nombre']); ?></span>
                            </div>
                            <div class="level-xp-text">
                                <?php echo e($xpEnNivel); ?> / <?php echo e($xpRequerida); ?> XP
                            </div>
                        </div>
                        <div class="xp-bar-track">
                            <div class="xp-bar-fill" style="width: <?php echo e($progresoNivel); ?>%;"></div>
                        </div>
                    </div>

                    <!-- Cuadrícula de Métricas -->
                    <div class="metrics-grid">
                        <div class="metric-box">
                            <div class="metric-icon">⚡</div>
                            <div class="metric-val"><?php echo e($puntuacion); ?></div>
                            <div class="metric-lbl">Puntos XP Totales</div>
                        </div>
                        <div class="metric-box">
                            <div class="metric-icon">💖</div>
                            <div class="metric-val"><?php echo e($vidas); ?>/5</div>
                            <div class="metric-lbl">Vidas Disponibles</div>
                        </div>
                        <div class="metric-box">
                            <div class="metric-icon">📖</div>
                            <div class="metric-val"><?php echo e($totalPalabras); ?></div>
                            <div class="metric-lbl">Palabras Quechua</div>
                        </div>
                        <div class="metric-box">
                            <div class="metric-icon">🏔️</div>
                            <div class="metric-val"><?php echo e($totalCategorias); ?></div>
                            <div class="metric-lbl">Categorías Activas</div>
                        </div>
                    </div>
                </div>

                <!-- LOGROS Y MEDALLAS DUOLINGO -->
                <div class="stats-card">
                    <div class="section-header">
                        <div class="section-title">Logros y Medallas</div>
                        <span style="font-size: 0.9em; color: var(--gold); font-weight: 700;">
                            <?php echo e(count(array_filter($logros, fn($l) => $l['completado']))); ?> / <?php echo e(count($logros)); ?> Desbloqueados
                        </span>
                    </div>

                    <div class="achievements-grid">
                        <?php $__currentLoopData = $logros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="achievement-card <?php echo e($logro['completado'] ? 'completed' : ''); ?>">
                                <div class="ach-icon-box">
                                    <?php echo e($logro['icono']); ?>

                                </div>
                                <div class="ach-info">
                                    <div class="ach-title"><?php echo e($logro['titulo']); ?></div>
                                    <div class="ach-desc"><?php echo e($logro['descripcion']); ?></div>
                                    <div class="ach-progress-wrap">
                                        <div class="ach-bar-track">
                                            <div class="ach-bar-fill" style="width: <?php echo e(($logro['actual'] / max(1, $logro['maximo'])) * 100); ?>%; background: <?php echo e($logro['color']); ?>;"></div>
                                        </div>
                                        <span class="ach-badge-status <?php echo e($logro['completado'] ? '' : 'locked'); ?>">
                                            <?php echo e($logro['completado'] ? 'COMPLETADO ✨' : $logro['actual'].'/'.$logro['maximo']); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- ========== MODAL: CAMBIAR FOTO / AVATAR ========== -->
    <div class="modal-overlay" id="avatarModal">
        <div class="modal-box">
            <button type="button" class="modal-close" onclick="closeModal('avatarModal')">✕</button>
            <h2 style="font-family:'Rajdhani',sans-serif; font-size: 1.6em; color: #fff; margin-bottom: 6px;">Personaliza tu Foto de Perfil</h2>
            <p style="font-size: 0.9em; color: var(--muted); margin-bottom: 20px;">Elige un avatar andino o sube una imagen personalizada desde tu dispositivo.</p>

            <form method="POST" action="<?php echo e(route('profile.update')); ?>" enctype="multipart/form-data" id="avatarForm">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                <input type="hidden" name="name" value="<?php echo e($user->name); ?>">
                <input type="hidden" name="email" value="<?php echo e($user->email); ?>">
                <input type="hidden" name="avatar_preset" id="selectedPresetInput" value="<?php echo e($user->avatar); ?>">

                <!-- Selector de Pestañas -->
                <div class="tabs-header">
                    <button type="button" class="tab-btn active" onclick="switchAvatarTab('presetsTab')">Avatares Andinos</button>
                    <button type="button" class="tab-btn" onclick="switchAvatarTab('uploadTab')">Subir Foto</button>
                </div>

                <!-- Tab 1: Avatares Andinos -->
                <div id="presetsTab">
                    <div class="avatar-presets-grid">
                        <div class="preset-item <?php echo e($user->avatar === 'llama' ? 'selected' : ''); ?>" onclick="selectPreset('llama', this)">
                            <div class="preset-icon">🦙</div>
                            <div class="preset-name">Llama</div>
                        </div>
                        <div class="preset-item <?php echo e($user->avatar === 'condor' ? 'selected' : ''); ?>" onclick="selectPreset('condor', this)">
                            <div class="preset-icon">🦅</div>
                            <div class="preset-name">Cóndor</div>
                        </div>
                        <div class="preset-item <?php echo e($user->avatar === 'inca' ? 'selected' : ''); ?>" onclick="selectPreset('inca', this)">
                            <div class="preset-icon">👑</div>
                            <div class="preset-name">Inca</div>
                        </div>
                        <div class="preset-item <?php echo e($user->avatar === 'coya' ? 'selected' : ''); ?>" onclick="selectPreset('coya', this)">
                            <div class="preset-icon">👸</div>
                            <div class="preset-name">Coya</div>
                        </div>
                        <div class="preset-item <?php echo e($user->avatar === 'inti' ? 'selected' : ''); ?>" onclick="selectPreset('inti', this)">
                            <div class="preset-icon">☀️</div>
                            <div class="preset-name">Inti</div>
                        </div>
                        <div class="preset-item <?php echo e($user->avatar === 'chakana' ? 'selected' : ''); ?>" onclick="selectPreset('chakana', this)">
                            <div class="preset-icon">🏔️</div>
                            <div class="preset-name">Chakana</div>
                        </div>
                        <div class="preset-item <?php echo e($user->avatar === 'puma' ? 'selected' : ''); ?>" onclick="selectPreset('puma', this)">
                            <div class="preset-icon">🏹</div>
                            <div class="preset-name">Guerrero</div>
                        </div>
                        <div class="preset-item <?php echo e($user->avatar === 'diablada' ? 'selected' : ''); ?>" onclick="selectPreset('diablada', this)">
                            <div class="preset-icon">🎭</div>
                            <div class="preset-name">Diablada</div>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Subida de Archivo Foto -->
                <div id="uploadTab" style="display: none;">
                    <label class="file-upload-zone" for="avatarFileInput">
                        <div class="upload-icon">📷</div>
                        <div style="font-weight: 700; color: #fff;">Haz clic para seleccionar una foto</div>
                        <div class="upload-hint">Formatos: JPG, PNG, WEBP (Máx. 3MB)</div>
                        <input type="file" id="avatarFileInput" name="avatar_file" accept="image/png, image/jpeg, image/webp" style="display: none;" onchange="previewUpload(this)">
                    </label>

                    <div id="uploadPreviewBox" style="display: none; text-align: center; margin-bottom: 18px;">
                        <img id="uploadPreviewImg" src="#" alt="Previsualización" style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid var(--pri);">
                        <div style="font-size: 0.85em; color: var(--teal); margin-top: 6px;">Foto lista para guardar</div>
                    </div>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" class="btn-primary" style="flex: 1;">Guardar Avatar</button>
                    <button type="button" class="btn-secondary" style="width: auto;" onclick="closeModal('avatarModal')">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========== MODAL: EDITAR INFORMACIÓN ========== -->
    <div class="modal-overlay" id="editInfoModal">
        <div class="modal-box">
            <button type="button" class="modal-close" onclick="closeModal('editInfoModal')">✕</button>
            <h2 style="font-family:'Rajdhani',sans-serif; font-size: 1.6em; color: #fff; margin-bottom: 6px;">Editar Datos Personales</h2>
            <p style="font-size: 0.9em; color: var(--muted); margin-bottom: 20px;">Actualiza tu nombre y correo electrónico.</p>

            <form method="POST" action="<?php echo e(route('profile.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
                
                <div class="form-group">
                    <label class="form-label" for="editName">Nombre Completo</label>
                    <input type="text" id="editName" name="name" class="form-input" value="<?php echo e(old('name', $user->name)); ?>" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="editEmail">Correo Electrónico</label>
                    <input type="email" id="editEmail" name="email" class="form-input" value="<?php echo e(old('email', $user->email)); ?>" required>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 24px;">
                    <button type="submit" class="btn-primary" style="flex: 1;">Guardar Cambios</button>
                    <button type="button" class="btn-secondary" style="width: auto;" onclick="closeModal('editInfoModal')">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========== MODAL: CAMBIAR CONTRASEÑA ========== -->
    <div class="modal-overlay" id="passwordModal">
        <div class="modal-box">
            <button type="button" class="modal-close" onclick="closeModal('passwordModal')">✕</button>
            <h2 style="font-family:'Rajdhani',sans-serif; font-size: 1.6em; color: #fff; margin-bottom: 6px;">Cambiar Contraseña</h2>
            <p style="font-size: 0.9em; color: var(--muted); margin-bottom: 20px;">Asegúrate de utilizar una contraseña segura.</p>

            <form method="POST" action="<?php echo e(route('password.update')); ?>">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>

                <div class="form-group">
                    <label class="form-label" for="update_password_current_password">Contraseña Actual</label>
                    <input type="password" id="update_password_current_password" name="current_password" class="form-input" required autocomplete="current-password">
                </div>

                <div class="form-group">
                    <label class="form-label" for="update_password_password">Nueva Contraseña</label>
                    <input type="password" id="update_password_password" name="password" class="form-input" required autocomplete="new-password">
                </div>

                <div class="form-group">
                    <label class="form-label" for="update_password_password_confirmation">Confirmar Nueva Contraseña</label>
                    <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-input" required autocomplete="new-password">
                </div>

                <div style="display: flex; gap: 10px; margin-top: 24px;">
                    <button type="submit" class="btn-primary" style="flex: 1;">Actualizar Contraseña</button>
                    <button type="button" class="btn-secondary" style="width: auto;" onclick="closeModal('passwordModal')">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ========== MODAL: CERRAR SESIÓN ========== -->
    <div class="modal-overlay" id="logoutModal">
        <div class="modal-box" style="max-width: 440px; text-align: center;">
            <div style="font-size: 50px; margin-bottom: 12px;">👋</div>
            <h2 style="font-family:'Rajdhani',sans-serif; font-size: 1.6em; color: #fff; margin-bottom: 8px;">¿Deseas cerrar sesión?</h2>
            <p style="font-size: 0.95em; color: var(--muted); margin-bottom: 24px;">Tu progreso y rachas se encuentran guardados en tu cuenta.</p>

            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn-danger" style="flex: 1;">Sí, Cerrar Sesión</button>
                    <button type="button" class="btn-secondary" style="flex: 1;" onclick="closeModal('logoutModal')">Cancelar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Generador de partículas ambientales
        function spawnParticles() {
            const container = document.getElementById('bgParticles');
            const colors = ['#FF4A10', '#FFD166', '#00E6C3', '#FF7A3E'];
            for (let i = 0; i < 25; i++) {
                const p = document.createElement('div');
                p.className = 'bg-p';
                const size = 2 + Math.random() * 4;
                const col = colors[Math.floor(Math.random() * colors.length)];
                p.style.cssText = `
                    left: ${Math.random() * 100}%;
                    top: ${60 + Math.random() * 40}%;
                    width: ${size}px;
                    height: ${size}px;
                    background: ${col};
                    box-shadow: 0 0 ${size * 2}px ${col};
                    animation-duration: ${5 + Math.random() * 6}s;
                    animation-delay: ${Math.random() * 4}s;
                `;
                container.appendChild(p);
            }
        }
        spawnParticles();

        // Control de Modales
        function openModal(id) {
            document.getElementById(id).classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = '';
        }
        window.addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                e.target.classList.remove('active');
                document.body.style.overflow = '';
            }
        });

        // Tabs del Modal de Avatar
        function switchAvatarTab(tabId) {
            document.getElementById('presetsTab').style.display = tabId === 'presetsTab' ? 'block' : 'none';
            document.getElementById('uploadTab').style.display = tabId === 'uploadTab' ? 'block' : 'none';
            
            document.querySelectorAll('.tabs-header .tab-btn').forEach((btn, idx) => {
                if ((tabId === 'presetsTab' && idx === 0) || (tabId === 'uploadTab' && idx === 1)) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }

        // Selección de Preset
        function selectPreset(presetKey, el) {
            document.querySelectorAll('.preset-item').forEach(item => item.classList.remove('selected'));
            el.classList.add('selected');
            document.getElementById('selectedPresetInput').value = presetKey;
            
            // Limpiar archivo si seleccionó preset
            document.getElementById('avatarFileInput').value = '';
            document.getElementById('uploadPreviewBox').style.display = 'none';
        }

        // Previsualización de Foto Subida
        function previewUpload(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('uploadPreviewImg').src = e.target.result;
                    document.getElementById('uploadPreviewBox').style.display = 'block';
                    // Limpiar selección de presets
                    document.querySelectorAll('.preset-item').forEach(item => item.classList.remove('selected'));
                    document.getElementById('selectedPresetInput').value = '';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // ====== MODO CLARO / OSCURO ======
        function updateProfileThemeUI(theme) {
            const btn = document.getElementById('profileThemeToggleBtn');
            if (!btn) return;
            const icon = btn.querySelector('.theme-icon');
            const lbl  = btn.querySelector('.theme-lbl');
            if (theme === 'light') {
                if (icon) icon.textContent = '🌙';
                if (lbl)  lbl.textContent  = 'Oscuro';
                btn.title = 'Cambiar a Modo Oscuro';
            } else {
                if (icon) icon.textContent = '☀️';
                if (lbl)  lbl.textContent  = 'Claro';
                btn.title = 'Cambiar a Modo Claro';
            }
        }

        function toggleTheme() {
            const current = document.documentElement.getAttribute('data-theme') || 'dark';
            const next = current === 'dark' ? 'light' : 'dark';
            document.documentElement.setAttribute('data-theme', next);
            localStorage.setItem('boliquechua_theme', next);
            updateProfileThemeUI(next);
        }

        // Inicializar UI al cargar
        document.addEventListener('DOMContentLoaded', function() {
            const theme = localStorage.getItem('boliquechua_theme') || 'dark';
            updateProfileThemeUI(theme);
        });
    </script>
</body>
</html>
<?php /**PATH D:\proyecto-boliquechua-de-chore-main (1)\proyecto-boliquechua-de-chore-main\resources\views/profile/edit.blade.php ENDPATH**/ ?>