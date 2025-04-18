<?php
// Lab 2 - Design Patterns Implementation
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб. 2: Паттерны проектирования</title>
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
            max-width: 1200px;
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
        
        .pattern-desc {
            color: #555;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }
        
        .pattern-links {
            display: flex;
            gap: 0.8rem;
            margin-top: 1rem;
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
        
        .badge-creational {
            background-color: var(--success-color);
            color: white;
        }
        
        .badge-structural {
            background-color: var(--warning-color);
            color: white;
        }
        
        .badge-behavioral {
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
            <h1>Лабораторная работа 2</h1>
            <div class="subtitle">Паттерны проектирования в PHP</div>
        </div>
        
        <div class="card">
            <h2 class="section-title">Порождающие паттерны <span class="badge badge-creational">Создание</span></h2>
            <div class="pattern-grid">
                <div class="pattern-card">
                    <div class="pattern-name">Фабричный метод (Factory Method)</div>
                    <div class="pattern-desc">Определяет интерфейс для создания объекта, делегируя инстанцирование подклассам.</div>
                    <div class="pattern-links">
                        <a href="lab2/FactoryMethod/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Абстрактная фабрика (Abstract Factory)</div>
                    <div class="pattern-desc">Создает семейства взаимосвязанных объектов без указания их классов.</div>
                    <div class="pattern-links">
                        <a href="lab2/AbstractFactory/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Строитель (Builder)</div>
                    <div class="pattern-desc">Отделяет конструирование сложного объекта от его представления.</div>
                    <div class="pattern-links">
                        <a href="lab2/Builder/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Прототип (Prototype)</div>
                    <div class="pattern-desc">Создает объекты путем клонирования существующих прототипов.</div>
                    <div class="pattern-links">
                        <a href="lab2/Prototype/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Одиночка (Singleton)</div>
                    <div class="pattern-desc">Гарантирует единственный экземпляр класса с глобальным доступом.</div>
                    <div class="pattern-links">
                        <a href="lab2/Singleton/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h2 class="section-title">Структурные паттерны <span class="badge badge-structural">Структура</span></h2>
            <div class="pattern-grid">
                <div class="pattern-card">
                    <div class="pattern-name">Адаптер (Adapter)</div>
                    <div class="pattern-desc">Обеспечивает совместную работу несовместимых интерфейсов.</div>
                    <div class="pattern-links">
                        <a href="lab2/Adapter/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Мост (Bridge)</div>
                    <div class="pattern-desc">Разделяет абстракцию и реализацию для независимого изменения.</div>
                    <div class="pattern-links">
                        <a href="lab2/Bridge/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Компоновщик (Composite)</div>
                    <div class="pattern-desc">Объединяет объекты в древовидные структуры для иерархий.</div>
                    <div class="pattern-links">
                        <a href="lab2/Composite/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Декоратор (Decorator)</div>
                    <div class="pattern-desc">Динамически добавляет объектам новые обязанности.</div>
                    <div class="pattern-links">
                        <a href="lab2/Decorator/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Фасад (Facade)</div>
                    <div class="pattern-desc">Предоставляет упрощенный интерфейс к сложной подсистеме.</div>
                    <div class="pattern-links">
                        <a href="lab2/Facade/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Легковес (Flyweight)</div>
                    <div class="pattern-desc">Эффективно поддерживает множество мелких объектов.</div>
                    <div class="pattern-links">
                        <a href="lab2/Flyweight/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Заместитель (Proxy)</div>
                    <div class="pattern-desc">Предоставляет суррогат или заместитель другого объекта.</div>
                    <div class="pattern-links">
                        <a href="lab2/Proxy/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <h2 class="section-title">Поведенческие паттерны <span class="badge badge-behavioral">Поведение</span></h2>
            <div class="pattern-grid">
                <div class="pattern-card">
                    <div class="pattern-name">Цепочка обязанностей (Chain of Responsibility)</div>
                    <div class="pattern-desc">Передает запрос по цепочке потенциальных обработчиков.</div>
                    <div class="pattern-links">
                        <a href="lab2/ChainOfResponsibility/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Команда (Command)</div>
                    <div class="pattern-desc">Инкапсулирует запрос как объект.</div>
                    <div class="pattern-links">
                        <a href="lab2/Command/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Итератор (Iterator)</div>
                    <div class="pattern-desc">Последовательно обходит элементы коллекции.</div>
                    <div class="pattern-links">
                        <a href="lab2/Iterator/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Посредник (Mediator)</div>
                    <div class="pattern-desc">Упрощает взаимодействие между классами.</div>
                    <div class="pattern-links">
                        <a href="lab2/Mediator/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Снимок (Memento)</div>
                    <div class="pattern-desc">Сохраняет и восстанавливает состояние объекта.</div>
                    <div class="pattern-links">
                        <a href="lab2/Memento/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Наблюдатель (Observer)</div>
                    <div class="pattern-desc">Определяет зависимость "один-ко-многим" между объектами.</div>
                    <div class="pattern-links">
                        <a href="lab2/Observer/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Состояние (State)</div>
                    <div class="pattern-desc">Позволяет объекту изменять поведение при изменении состояния.</div>
                    <div class="pattern-links">
                        <a href="lab2/State/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Стратегия (Strategy)</div>
                    <div class="pattern-desc">Определяет семейство алгоритмов, инкапсулирует их.</div>
                    <div class="pattern-links">
                        <a href="lab2/Strategy/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Шаблонный метод (Template Method)</div>
                    <div class="pattern-desc">Определяет скелет алгоритма, делегируя шаги подклассам.</div>
                    <div class="pattern-links">
                        <a href="lab2/TemplateMethod/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
                
                <div class="pattern-card">
                    <div class="pattern-name">Посетитель (Visitor)</div>
                    <div class="pattern-desc">Определяет новую операцию без изменения классов элементов.</div>
                    <div class="pattern-links">
                        <a href="lab2/Visitor/Conceptual/index.php" class="pattern-link" target="_blank">Концепт</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer">
            PHP Design Patterns &copy; <?php echo date('Y'); ?> | Современный интерфейс v2.0
        </div>
    </div>
</body>
</html>