<?php
header('Content-Type: application/json');

// Проверяем, что это POST-запрос
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из POST-запроса
    $name = $_POST['name'] ?? '';
    $type = $_POST['type'] ?? '';

    $viewers = $_POST['viewers'] ?? [];
    $editors = $_POST['editors'] ?? [];

    // Проверка на пустые поля
    if (empty($name) || empty($type)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Пожалуйста, заполните все поля.'
        ]);
        exit;
    }

    // Здесь можно сохранить в файл, базу данных и т.д.
    // Для примера — просто логируем в файл
    $data = [
        'name' => $name,
        'type' => $type,
        'viewers' => $viewers,
        'editors' => $editors
    ];

    // Сохраняем как JSON в файл (attributes.json)
    file_put_contents('attributes.json', json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    // Отправляем успешный ответ
    echo json_encode([
        'status' => 'success',
        'message' => 'Атрибут успешно сохранён.'
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Недопустимый метод запроса.'
    ]);
}
