<?php
require_once('data.php');
require_once('functions.php');

$con = connectToDb();
$search = $_GET['search'] ?? null;

if (!$con) {
    $error = mysqli_error($con);
    print($error);
}
else {
    if ($search) {
        $cur_page = intval($_GET['page'] ?? 1);
        if ($cur_page == 0) {
            header("Location: /search.php?search=$search");
        }
        $query = "SELECT COUNT(*) as count FROM lot WHERE MATCH(name, description) AGAINST (?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, 's', $search);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $items_count = mysqli_fetch_assoc($result)['count'];
        $pages_count = ceil($items_count / $items_per_page);
        $arr_pages = range(1, $pages_count);
        $offset = ($cur_page - 1) * $items_per_page;
        $query = "SELECT lot.id, name, image_link, start_price, end_date, category.title AS category
                  FROM lot
                  JOIN category
                  ON lot.id_category = category.id
                  WHERE MATCH(name, description) AGAINST (?)
                  LIMIT $items_per_page OFFSET $offset";
        $stmt = mysqli_prepare($con, $query);
        if (!$stmt) {
            print(mysqli_error($con));
        }
        mysqli_stmt_bind_param($stmt, 's', $search);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $announcements = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $array = [
            'announcements' => $announcements,
            'arr_pages' => $arr_pages,
            'cur_page' => $cur_page,
            'search' => $search,
            'link' => 'search.php?search=' . $search . '&page='
        ];
    }
    $array['categories'] = $categories;
}

$page_content = template('templates/search.php', $array);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Поиск по запросу '. $search, 'categories' => $categories, 'search' => $search]);
print($layout_content);
