<?php
require_once('data.php');
require_once('functions.php');


$con = connectToDb();

if (!$con) {
    $error = mysqli_connect_error();
    print($error);
}
else {
    $id = intval($_GET['id'] ?? 1);
    if ($id == 0) {
        header("Location: /category.php?id=1");
    }
    $cur_page = intval($_GET['page'] ?? 1);
    if ($cur_page == 0) {
        header("Location: /category.php?id=$id");
    }
    $query = mysqli_query($con, "SELECT COUNT(*) as count FROM lot WHERE id_category = $id");
    $items_count = mysqli_fetch_assoc($query)['count'];
    $pages_count = ceil($items_count / $items_per_page);
    $arr_pages = range(1, $pages_count);
    $offset = ($cur_page - 1) * $items_per_page;
    $query = "SELECT lot.id, name, image_link, start_price, end_date, category.title AS category
              FROM lot
              JOIN category
              ON lot.id_category = category.id
              WHERE category.id = $id
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
        'search' => $search,
        'link' => 'category.php?id=' . $id . '&page=',
        'categories' => $categories,
        'category' => $announcements[0]['category']
    ];
}


$page_content = template('templates/category.php', $array);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Категории', 'categories' => $categories]);
print($layout_content);
