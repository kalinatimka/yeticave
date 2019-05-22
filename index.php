<?php
require_once('data.php');
require_once('functions.php');
require_once('getwinner.php');

$con = connectToDb();

if (!$con) {
    $error = mysqli_connect_error();
    print($error);
}
else {
    $cur_page = intval($_GET['page'] ?? 1);
    if ($cur_page == 0) {
        header("Location: /");
    }
    $query = mysqli_query($con, "SELECT COUNT(*) as count FROM lot");
    $items_count = mysqli_fetch_assoc($query)['count'];
    $pages_count = ceil($items_count / $items_per_page);
    $arr_pages = range(1, $pages_count);
    $offset = ($cur_page - 1) * $items_per_page;
    $query = "SELECT lot.id, name, image_link, start_price, TIMESTAMPDIFF(SECOND, NOW(), end_date) AS timer, category.title AS category
              FROM lot
              JOIN category
              ON lot.id_category = category.id
              WHERE id_winner IS NULL
              ORDER BY end_date LIMIT $items_per_page OFFSET $offset";
    if (!$query) {
        $err = mysqli_error($con);
        print($err);
    }
    $announcements = selectFromDb($con, $query);
    $array = [
        'announcements' => $announcements,
        'arr_pages' => $arr_pages,
        'cur_page' => $cur_page,
        'link' => '/?page=',
        'tf' => $time_finishing
    ];
}

$page_content = template('templates/index.php', $array);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Главная', 'categories' => $categories]);
print($layout_content);
