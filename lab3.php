<?php
// Lab 3 - Design Patterns Implementation
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб. 3: Паттерны (Singleton, Factory, MVC)</title>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
            --warning-color: #f9a825;
            --border-radius: 8px;
            --box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        
        .container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        h1, h2 {
            color: var(--primary-color);
            margin: 0;
        }
        
        h1 {
            font-size: 2.2rem;
            margin-bottom: 0.5rem;
        }
        
        .subtitle {
            color: var(--secondary-color);
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }
        
        .back-link {
            display: inline-block;
            margin-bottom: 1.5rem;
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
        }
        
        .back-link:hover {
            text-decoration: underline;
            color: var(--primary-color);
        }
        
        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .section-title {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--light-color);
        }
        
        .pattern-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        
        .pattern-card {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.2rem;
            border-top: 4px solid var(--accent-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .pattern-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .pattern-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: var(--secondary-color);
            margin-bottom: 0.8rem;
        }
        
        .pattern-description {
            color: #555;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            line-height: 1.5;
        }
        
        .pattern-links {
            display: flex;
            gap: 0.8rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }
        
        .pattern-link {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: var(--accent-color);
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.85rem;
            transition: background-color 0.3s ease;
        }
        
        .pattern-link:hover {
            background-color: var(--secondary-color);
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-left: 0.5rem;
        }
        
        .badge-singleton {
            background-color: var(--success-color);
            color: white;
        }
        
        .badge-factory {
            background-color: var(--warning-color);
            color: white;
        }
        
        .badge-mvc {
            background-color: var(--danger-color);
            color: white;
        }
        
        .footer {
            text-align: center;
            margin-top: 3rem;
            padding: 1.5rem 0;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="back-link">← Назад к списку лабораторных</a>
        
        <div class="header">
            <h1>Лабораторная работа 3</h1>
            <div class="subtitle">Практическое применение паттернов: Singleton, Factory Method, MVC</div>
        </div>
        
        <div class="card">
            <h2 class="section-title">Реализованные паттерны</h2>
            <div class="pattern-grid">
                <div class="pattern-card">
                    <div class="pattern-name">Одиночка (Singleton) <span class="badge badge-singleton">Порождающий</span></div>
                    <div class="pattern-description">
                        Гарантирует единственный экземпляр класса Settings с глобальным доступом. Хранит настройки приложения.
                    </div>
                    <div class="pattern-links">
                        <a href="lab3/patterns/singleton/settings_use.php" class="pattern-link" target="_blank">Демонстрация</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Фабричный метод (Factory Method) <span class="badge badge-factory">Порождающий</span></div>
                    <div class="pattern-description">
                        Создает различные типы пользователей через абстрактную фабрику: администраторов, обычных пользователей и менеджеров.
                    </div>
                    <div class="pattern-links">
                        <a href="lab3/patterns/factory-method/factory_use.php" class="pattern-link" target="_blank">Демонстрация</a>
                        <a href="lab3/patterns/factory-method/factory-method.html" class="pattern-link" target="_blank">Диаграмма</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">MVC (Model-View-Controller) <span class="badge badge-mvc">Архитектурный</span></div>
                    <div class="pattern-description">
                        Разделение на Модель, Представление (HTML, JSON, Text, Markdown) и Контроллер для управления данными пользователей.
                    </div>
                    <div class="pattern-links">
                        <a href="lab3/patterns/mvc/mvc_use.php" class="pattern-link" target="_blank">Демонстрация</a>
                        <a href="lab3/patterns/mvc/mvc-pattern.html" class="pattern-link" target="_blank">Диаграмма</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer">
            PHP Patterns Lab &copy; <?php echo date('Y'); ?> | Современный интерфейс v3.0
        </div>
    </div>
</body>
</html>