<?php

declare(strict_types=1);

// Функция автозагрузки
spl_autoload_register(function ($class) {
    $prefix = 'MyProject\\';
    $base_dir = __DIR__ . '/MyProject/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

// Создание обычных пользователей
$user1 = new User("Chikmarev Sergey", "serj", "password123");
$user2 = new User("Lolo Lali", "LoLa", "password456");
$user3 = new User("Biba Boba", "boba", "password789");


// Создание привилегированного пользователя
$superUser = new SuperUser("Admin User", "admin", "adminpass", "Administrator");

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система управления пользователями</title>
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
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        
        .dashboard {
            display: grid;
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        .card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        h1, h2 {
            color: var(--primary-color);
            margin: 0;
        }
        
        h1 {
            font-size: 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }
        
        h2 {
            font-size: 1.5rem;
        }
        
        .users-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }
        
        .user-card {
            border-left: 4px solid var(--accent-color);
            padding: 1rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }
        
        .super-user-card {
            border-left: 4px solid var(--primary-color);
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .user-info {
            margin: 0.5rem 0;
        }
        
        .user-info strong {
            color: var(--secondary-color);
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .stat-card {
            text-align: center;
            padding: 1.5rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }
        
        .stat-card h3 {
            color: var(--primary-color);
            margin-top: 0;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: var(--secondary-color);
            margin: 0.5rem 0;
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .badge-primary {
            background-color: var(--primary-color);
            color: white;
        }
        
        .badge-admin {
            background-color: var(--danger-color);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>👥 Система управления пользователями</h1>
        
        <div class="dashboard">
            <div class="card">
                <div class="card-header">
                    <h2>Обычные пользователи</h2>
                    <span class="badge badge-primary">Количество: <?php echo User::getUserCount(); ?></span>
                </div>
                <div class="users-grid">
                    <?php
                    $regularUsers = [$user1, $user2, $user3];
                    foreach ($regularUsers as $user) {
                        echo '<div class="user-card">';
                        echo '<div class="user-info"><strong>Имя:</strong> ' . htmlspecialchars($user->name) . '</div>';
                        echo '<div class="user-info"><strong>Логин:</strong> ' . htmlspecialchars($user->login) . '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h2>Привилегированный пользователь</h2>
                    <span class="badge badge-admin">Администратор</span>
                </div>
                <div class="users-grid">
                    <div class="user-card super-user-card">
                        <?php
                        $superUserInfo = $superUser->getInfo();
                        foreach ($superUserInfo as $key => $value) {
                            $labels = [
                                'name' => 'Имя',
                                'login' => 'Логин',
                                'role' => 'Роль'
                            ];
                            $label = $labels[$key] ?? ucfirst($key);
                            echo '<div class="user-info"><strong>' . $label . ':</strong> ' . htmlspecialchars($value) . '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <a href="https://img.plantuml.biz/plantuml/png/hLHDRe905DxFAMQfgLw0cCQaAnTT6NTk44PBWZDc6Eh2abZRdQRTTjShgAqfncglyEP6VO0G4UsYCO4mx-_xUG7gdZAbylik8PPhUXvjUKmsk6AoQrgCZWYbLtHaTZmbJKi5b9jzPb2C7DuxhhcYv_1pnG623uMqpzKjmV7eMwfqI579WrOACELZ7EzE31kyAqfbWzuBnoR1eREzeOABelJJUd5Roh42wYFMZV2vCgZ3LLpB30Zv7mi5tJ6VpLBCWARdKZclfSTKAvKJJKU2CjDDVy3a1PnBuRBJg_1IXaljev8Z-sCxQ3pDtPg3MdC_dJol2qjgveGUR2h_ojSUgjNuNOdpIPYD4iA5ObI90HNT_BTYK7Y3hPx0Ie_rCwnWhHyfNh20ENp13fPw2jyGjZdCzKIF8OI5ViB-UPIby8Cj6prBMgCMXDZeruIm8vGI_OWpau9yxp7A4kyDDdz0Y74y35jKCeNrETHPcqVAFZ4PDs1_c9RmlCF960f3_K98dN4RVn6_" target="_blank">Просмотреть диаграмму классов</a>
            <div class="card">
                <div class="card-header">
                    <h2>Статистика системы</h2>
                </div>
                <div class="stats-grid">
                    <div class="stat-card">
                        <h3>Обычные пользователи</h3>
                        <div class="stat-value"><?php echo User::getUserCount(); ?></div>
                        <p>Всего зарегистрировано</p>
                    </div>
                    <div class="stat-card">
                        <h3>Администраторы</h3>
                        <div class="stat-value"><?php echo SuperUser::getSuperUserCount(); ?></div>
                        <p>Привилегированные пользователи</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    // Удаление пользователей
    echo '<div class="container">';
    echo '<div class="card">';
    echo '<div class="card-header"><h2>Управление пользователями</h2></div>';
    echo '<div style="padding: 1.5rem;">';
    
    // Начинаем буферизацию вывода
    
    
    // Сначала очищаем массив обычных пользователей
    unset($regularUsers);
    
    // Теперь удаляем отдельные переменные пользователей
    unset($user3);
    unset($user2);
    unset($user1);
    
    // В конце удаляем привилегированного пользователя
    unset($superUser);
    
    // Получаем содержимое буфера и очищаем его
    
    
    // Выводим все сообщения внутри блока
    echo '<p style="color: var(--danger-color); font-weight: bold;">Все пользователи были удалены из системы.</p>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    ?>
</body>
</html>
