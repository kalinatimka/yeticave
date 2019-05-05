<?php
require_once('data.php');
require_once('functions.php');

if (empty($_SESSION['user'])) {
    return http_response_code(403);
}

$temp_data = $_POST;
$error = [];

if (!empty($temp_data)) {
    foreach ($temp_data as $key => $value) {
        if($temp_data[$key] == "" || $temp_data[$key] == "Выберите категорию") {
            $error[$key] = 'Необходимо заполнить это поле!';
        }
    }
    if (empty($error)) {
        $con = connectToDb();
        $fn = $_FILES['lot-file']['name'];
        $fp = __DIR__ . '/img/';
        $link = '/img/' . $fn;
        move_uploaded_file($_FILES['lot-file']['tmp_name'], $fp . $fn);
        $user_id = $_SESSION['user']['id'];
        $cat = $temp_data['category'];
        $query = "SELECT id FROM category WHERE title = '$cat'";
        $result = mysqli_query($con, $query);
        $id = intval(mysqli_fetch_assoc($result)['id']);
        $query = "INSERT INTO lot (creating_date, name, description, image_link, start_price, end_date, bet_step, id_creator, id_category)
                  VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 'sssisiii', $temp_data['lot-name'], $temp_data['message'], $link, $temp_data['lot-rate'], $temp_data['lot-date'], $temp_data['lot-step'], $user_id, $id);
        mysqli_stmt_execute($stmt);
        header("Location: /index.php");
    }
}
$page_content = template('templates/add.php', ['temp_data' => $temp_data, 'error' => $error, 'categories' => $categories]);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Добавить лот', 'categories' => $categories]);
print($layout_content);

