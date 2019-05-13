<?php
require_once('data.php');
require_once('functions.php');

if (empty($_SESSION['user'])) {
    return http_response_code(403);
}

$con = connectToDb();
if (!$con){
    print("Ошибка подключения: " . mysqli_connect_error());
}
else {
    $id = $_SESSION['user']['id'];
    $query = "SELECT MAX(price) AS price, image_link, lot.name, category.title AS category, TIMESTAMPDIFF(SECOND, NOW(), end_date) AS timer, TIMESTAMPDIFF(SECOND, MAX(dateNtime), NOW()) AS bet_time, lot.id AS id_lot, id_winner, contact_data
    FROM bet
    JOIN lot
    ON bet.id_lot = lot.id
    JOIN category
    ON lot.id_category = category.id
    JOIN `user`
    ON lot.id_creator = `user`.id
    WHERE id_user = $id
    GROUP BY id_lot
    ORDER BY bet_time";
    $my_lots = selectFromDb($con, $query);
    $array['my-lots'] = $my_lots;
    $array['tf'] = $time_finishing;
}

$array['categories'] = $categories;
$con = connectToDb();

$page_content = template('templates/my-lots.php', $array);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Главная', 'categories' => $categories]);
print($layout_content);
