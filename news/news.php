<?php
// Подключаем класс для работы с новостями
require_once "NewsDB.class.php";

// Создаем объект для работы с новостями
$news = new NewsDB();

// Переменная для хранения сообщений об ошибках
$errMsg = "";

// Проверяем запрос на удаление новости
if (isset($_GET['del'])) {
    require "delete_news.inc.php";
}

// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require "save_news.inc.php";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Новостная лента</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        
        h1, h2 {
            color: var(--primary-color);
            margin: 0 0 1.5rem 0;
        }
        
        h1 {
            font-size: 2.2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--light-color);
        }
        
        h2 {
            font-size: 1.5rem;
        }
        
        /* Стили для формы */
        .form-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.2rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        input[type="text"], 
        textarea, 
        select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        input[type="text"]:focus, 
        textarea:focus, 
        select:focus {
            outline: none;
            border-color: var(--accent-color);
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        .submit-btn {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        
        .submit-btn:hover {
            background-color: var(--secondary-color);
        }
        
        /* Стили для новостей */
        .news-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .news-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .news-title {
            color: var(--secondary-color);
            margin: 0 0 1rem 0;
            font-size: 1.2rem;
        }
        
        .news-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #666;
        }
        
        .news-content {
            margin-bottom: 1.5rem;
            color: #555;
            line-height: 1.6;
        }
        
        .news-actions {
            text-align: right;
        }
        
        .delete-btn {
            background-color: var(--danger-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        
        .delete-btn:hover {
            background-color: #c82333;
        }
        
        /* Стили для сообщений */
        .alert {
            padding: 1rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
            font-weight: 500;
        }
        
        .alert-error {
            background-color: var(--danger-color);
            color: white;
        }
        
        .category-badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            background-color: var(--light-color);
            color: var(--secondary-color);
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📰 Новостная лента</h1>
        
        <?php
        // Выводим сообщение об ошибке, если оно есть
        if (!empty($errMsg)) {
            echo "<div class='alert alert-error'>{$errMsg}</div>";
        }
        
        // Выводим новости
        require "get_news.inc.php";
        ?>
        
        <div class="form-card">
            <h2>Добавить новость</h2>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="form-group">
                    <label for="title">Заголовок новости:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                
                <div class="form-group">
                    <label for="category">Выберите категорию:</label>
                    <select id="category" name="category" required>
                    <?php
                    foreach ($news as $id => $name) {
                        echo "<option value=\"{$id}\">{$name}</option>\n";
                    }
                    ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="description">Текст новости:</label>
                    <textarea id="description" name="description" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="source">Источник:</label>
                    <input type="text" id="source" name="source">
                </div>
                
                <button type="submit" class="submit-btn">Добавить новость</button>
            </form>
        </div>
    </div>
</body>
</html>