<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторные работы PHP</title>
    <style>
        :root {
            --primary: #4361ee;
            --primary-light: #4895ef;
            --secondary: #3f37c9;
            --accent: #f72585;
            --dark: #1b263b;
            --light: #f8f9fa;
            --gray: #e9ecef;
            --success: #4cc9f0;
            --warning: #f8961e;
            --danger: #ef233c;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
        }

        .subtitle {
            color: var(--secondary);
            font-weight: 500;
            opacity: 0.8;
        }

        .labs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .lab-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .lab-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, var(--primary), var(--accent));
        }

        .lab-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.12);
        }

        .lab-number {
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .lab-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .lab-description {
            color: #6c757d;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }

        .lab-link {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1.2rem;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
        }

        .lab-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(67, 97, 238, 0.3);
        }

        .lab-link i {
            margin-left: 8px;
            transition: transform 0.3s ease;
        }

        .lab-link:hover i {
            transform: translateX(3px);
        }

        .footer {
            text-align: center;
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            color: #6c757d;
            font-size: 0.9rem;
        }

        /* Анимации */
        .lab-card {
            opacity: 0;
            animation: cardAppear 0.6s ease-out forwards;
        }

        @keyframes cardAppear {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .lab-card:nth-child(1) { animation-delay: 0.1s; }
        .lab-card:nth-child(2) { animation-delay: 0.2s; }
        .lab-card:nth-child(3) { animation-delay: 0.3s; }
        .lab-card:nth-child(4) { animation-delay: 0.4s; }

        /* Эффект пульсации */
        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }

        /* Адаптивность */
        @media (max-width: 768px) {
            .labs-grid {
                grid-template-columns: 1fr;
            }
            
            body {
                padding: 1.5rem;
            }
            
            .logo {
                font-size: 2rem;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="pulse">
            <div class="logo">PHP LABS</div>
            <div class="subtitle">Лабораторные работы по программированию</div>
        </header>
        
        <div class="labs-grid">
            <div class="lab-card">
                <div class="lab-number">Лабораторная работа #1</div>
                <h3 class="lab-title">Управление пользователями</h3>
                <p class="lab-description">Система управления пользователями с различными уровнями доступа и статистикой</p>
                <a href="lab1.php" class="lab-link">
                    Открыть <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="lab-card">
                <div class="lab-number">Лабораторная работа #2</div>
                <h3 class="lab-title">Работа с формами</h3>
                <p class="lab-description">Обработка данных форм, валидация и сохранение результатов</p>
                <a href="lab2.php" class="lab-link">
                    Открыть <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
            <div class="lab-card">
                <div class="lab-number">Лабораторная работа #3</div>
                <h3 class="lab-title">Базы данных</h3>
                <p class="lab-description">Взаимодействие с MySQL, CRUD операции</p>
                <a href="lab3.php" class="lab-link">
                    Открыть <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            
             <div class="lab-card">
                <div class="lab-number">Лабораторная работа #4</div>
                <h3 class="lab-title">новостная лента</h3>
                <p class="lab-description">Использование ООП с базой данных SQLite</p>
                <a href="news/news.php" class="lab-link">
                    Открыть <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
        
        <div class="footer">
            PHP LABS &copy; <?php echo date('Y'); ?> | Версия 3.0
        </div>
    </div>
</body>
</html>