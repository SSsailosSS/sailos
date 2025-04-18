<?php
class NumbersSquared implements Iterator {
    private $start;
    private $end;
    private $current;

    public function __construct($start, $end) {
        $this->start = $start;
        $this->end = $end;
    }

    public function rewind() {
        $this->current = $this->start;
    }

    public function valid() {
        return $this->current <= $this->end;
    }

    public function next() {
        $this->current++;
    }

    public function key() {
        return $this->current;
    }

    public function current() {
        return $this->current * $this->current;
    }
}

// Пример использования
$obj = new NumbersSquared(3, 7);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб. 4: Итераторы в PHP</title>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4895ef;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --success-color: #4cc9f0;
            --danger-color: #f72585;
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
        
        h1, h2 {
            color: var(--primary-color);
            margin: 0 0 1.5rem 0;
        }
        
        h1 {
            font-size: 2.2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--light-color);
        }
        
        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .result-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }
        
        .result-item {
            background-color: var(--light-color);
            border-radius: var(--border-radius);
            padding: 1rem;
            text-align: center;
        }
        
        .result-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--secondary-color);
            margin: 0.5rem 0;
        }
        
        .code-block {
            background-color: #f5f5f5;
            border-radius: var(--border-radius);
            padding: 1rem;
            font-family: 'Courier New', Courier, monospace;
            margin: 1.5rem 0;
            overflow-x: auto;
        }
        
        .uml-diagram {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-top: 2rem;
            text-align: center;
        }
        
        .uml-image {
            max-width: 100%;
            height: auto;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔢 Лабораторная работа: Итераторы в PHP</h1>
        
        <div class="card">
            <h2>Реализация класса NumbersSquared</h2>
            
            <p>Класс NumbersSquared реализует интерфейс Iterator и позволяет итерировать по последовательности чисел, возводя их в квадрат.</p>
            
            <div class="code-block">
                <pre><?php echo htmlspecialchars('
class NumbersSquared implements Iterator {
    private $start;
    private $end;
    private $current;

    public function __construct($start, $end) {
        $this->start = $start;
        $this->end = $end;
    }

    public function rewind() {
        $this->current = $this->start;
    }

    public function valid() {
        return $this->current <= $this->end;
    }

    public function next() {
        $this->current++;
    }

    public function key() {
        return $this->current;
    }

    public function current() {
        return $this->current * $this->current;
    }
}
                '); ?></pre>
            </div>
        </div>
        
        <div class="card">
            <h2>Пример использования</h2>
            
            <div class="code-block">
                <pre>$obj = new NumbersSquared(3, 7);
foreach($obj as $num => $square) {
    echo "Квадрат числа $num = $square\n";
}</pre>
            </div>
            
            <h3>Результат выполнения:</h3>
            <div class="result-grid">
                <?php foreach($obj as $num => $square): ?>
                <div class="result-item">
                    <div>Число</div>
                    <div class="result-value"><?= $num ?></div>
                    <div>Квадрат</div>
                    <div class="result-value"><?= $square ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <div class="card">
            <h2>Диаграмма класса NumbersSquared</h2>
            
            <div class="uml-diagram">
                <img src="https://www.plantuml.com/plantuml/png/SoWkIImgAStDuG8pk3Yr1LIWkLIB4bC8ICn9J4xLqDMrKl1IWk1o0000" 
                     alt="UML диаграмма класса NumbersSquared" 
                     class="uml-image">
                <p>PlantUML код: <code>@startuml\nclass NumbersSquared {\n  - start: int\n  - end: int\n  - current: int\n  + __construct(start: int, end: int)\n  + rewind(): void\n  + valid(): bool\n  + next(): void\n  + key(): int\n  + current(): int\n}\n@enduml</code></p>
            </div>
        </div>
        
        <div class="card">
            <h2>Реализация IteratorAggregate в NewsDB</h2>
            
            <p>Класс NewsDB был модифицирован для реализации интерфейса IteratorAggregate:</p>
            
            <div class="code-block">
                <pre><?php echo htmlspecialchars('
class NewsDB implements IteratorAggregate {
    private $items = [];
    
    private function getCategories() {
        // Получение категорий из БД
        // Заполнение $this->items
    }
    
    public function __construct() {
        $this->getCategories();
    }
    
    public function getIterator() {
        return new ArrayIterator($this->items);
    }
}
                '); ?></pre>
            </div>
            
            <p>Использование в news.php:</p>
            <div class="code-block">
                <pre>&lt;select name="category"&gt;
&lt;?php foreach($news as $id => $name): ?&gt;
    &lt;option value="&lt;?= $id ?&gt;"&gt;&lt;?= $name ?&gt;&lt;/option&gt;
&lt;?php endforeach; ?&gt;
&lt;/select&gt;</pre>
            </div>
        </div>
    </div>
</body>
</html>