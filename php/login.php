<?php
include "config.php";
header('Content-Type: application/json');
session_start();

// Проверяем, существует ли счетчик попыток входа в сессии
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// Максимальное количество попыток входа
$max_attempts = 3;

// Проверяем, не превышено ли максимальное количество попыток
if ($_SESSION['login_attempts'] >= $max_attempts) {
    echo "Превышено максимальное количество попыток входа. Попробуйте позже.";
    exit;
}

// Обработка формы входа
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['pass'];

    // Здесь должна быть проверка логина и пароля, например, сравнение с данными в базе данных
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $inputEmail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $inputPassword==$user['password']) {
        // Пользователь аутентифицирован
        echo "успешно";
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header("Location: ../tableScreen.html");
        exit();
        // Сброс счетчика попыток при успешном входе
        $_SESSION['login_attempts'] = 0;
    } else {
        // Увеличиваем счетчик попыток при неудачном входе
        $_SESSION['login_attempts']++;
        echo "Неверный логин или пароль. Осталось попыток: " . ($max_attempts - $_SESSION['login_attempts']);
    }
}
/*if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $inputEmail = $_POST['email'];
    $inputPassword = $_POST['pass'];

    echo $inputEmail;
    echo $inputPassword;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $inputEmail]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $inputPassword==$user['password']) {
        // Пользователь аутентифицирован
        echo "успешно";
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header("Location: ../tableScreen.html");
        exit();
    } else {
        // Неверные учетные данные
        echo "Неверный логин или пароль";
    }
}
else{
    echo "Что-то не так";
}*/
?>