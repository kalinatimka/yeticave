<?php
require_once('data.php');
// require_once('functions.php');

$page_content = template('templates/index.php', ['announcements' => $announcements, 'lot_time_remaining' => $lot_time_remaining]);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Главная', 'categories' => $categories]);
print($layout_content);
