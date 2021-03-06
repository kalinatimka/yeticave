<?php
require_once('data.php');
require_once('functions.php');

$history = json_decode($_COOKIE['history']);

$page_content = template('templates/history.php', ['history' => $history, 'categories' => $categories, 'announcements' => $announcements]);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'История просмотров', 'categories' => $categories]);
print($layout_content);
