<?php
require_once('data.php');
require_once('functions.php');

$lot = $_GET['lot'];
$lot_info = $announcements[$lot];
if (empty($lot_info)) {
    return http_response_code(404);
}

$page_content = template('templates/lot.php', ['lot_time_remaining' => $lot_time_remaining, 'bets' => $bets, 'lot_info'=>$lot_info]);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Лот | '.$lot_info['title'], 'categories' => $categories]);
print($layout_content);


