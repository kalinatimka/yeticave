<?php
require_once('data.php');
require_once('functions.php');
require_once('userdata.php');

$sign_up_data = $_POST;
$errors = [];

if (!empty($sign_up_data)) {
    $errors = form_validate($sign_up_data, $users);
    if (empty($errors)) {
        $con = connectToDb();
        $password = password_hash($sign_up_data['password'], PASSWORD_DEFAULT);
        if (isset($_FILES['file'])) {
            $fn = $_FILES['file']['name'];
            $fp = __DIR__ . '/img/';
            $link = '/img/' . $fn;
            move_uploaded_file($_FILES['file']['tmp_name'], $fp . $fn);
        }
        else {
            $link = null;
        }
        $query = "INSERT INTO user (register_date, email, name, password, avatar_link, contact_data) VALUES (NOW(), ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 'sssss', $sign_up_data['email'], $sign_up_data['name'], $password, $link, $sign_up_data['message']);
        mysqli_stmt_execute($stmt);
        header("Location: /index.php");
    }
}

$page_content = template('templates/sign-up.php', ['categories' => $categories, 'sign_up_data' => $sign_up_data, 'errors' => $errors]);
$layout_content = template('templates/layout.php', ['page_name' => 'Регистрация', 'content' => $page_content, 'categories' => $categories]);
print($layout_content);
