<?php
require_once('data.php');
require_once('functions.php');
require_once('userdata.php');

$login_data = $_POST;
$errors = [];

foreach ($login_data as $key => $value) {
    if ($login_data[$key] == "") {
        $errors[$key] = "Необходимо заполнить это поле!";
    }
}
if (empty($errors) && !empty($login_data)) {
    $flag = false;
    foreach ($users as $value) {
        if ($value['email'] == $login_data['email']) {
            $user = $value;
            $flag = true;
            break;
        }
    }
    if (!$flag) {
        $errors['email'] = 'Введен неверный email';
    }
    else {
        if (!password_verify($login_data['password'], $user['password'])) {
            $errors['password'] = 'Введен неверный пароль';
        }
        else {
            session_start();
            $_SESSION['user'] = $user;
            header("Location: /index.php");
        }
    }
}
$page_content = template('templates/login.php', ['login_data' => $login_data, 'errors' => $errors, 'categories' => $categories]);
// $aba = template('templates/layout.php', $array);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Авторизация', 'categories' => $categories]);
print($layout_content);
