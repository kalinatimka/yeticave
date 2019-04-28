<?php
require_once('data.php');
require_once('functions.php');

if (empty($_SESSION['user'])) {
    return http_response_code(403);
}

$temp_data = $_POST;
$error = [];

foreach ($temp_data as $key => $value) {
    if($temp_data[$key] == "" || $temp_data[$key] == "Выберите категорию") {
        $error[$key] = 'Необходимо заполнить это поле!';
    }
}
$page_content = template('templates/add.php', ['temp_data' => $temp_data, 'error' => $error, 'categories' => $categories]);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Добавить лот', 'categories' => $categories]);
print($layout_content);

