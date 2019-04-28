<?php
require_once('data.php');
require_once('functions.php');

$lot = $_GET['lot'];
$lot_info = $announcements[$lot];

$cookie_name = "history";
$cookie_expire = strtotime("+1 year");
$path = "/";

if (empty($lot_info)) {
    return http_response_code(404);
}

if (isset($_COOKIE['history'])){
    $history = json_decode($_COOKIE['history']);
    $flag = false;
    foreach ($history as $value) {
        if ($value == $lot) {
            $flag = true;
            break;
        }
    }
    if (!$flag) {
        $history[] = $lot;
        setcookie($cookie_name, json_encode($history), $cookie_expire, $path);
    }
}
else {
    $arr_history[] = $lot;
    setcookie($cookie_name, json_encode($arr_history), $cookie_expire, $path);
}

$page_content = template('templates/lot.php', ['lot_time_remaining' => $lot_time_remaining, 'bets' => $bets, 'lot_info'=>$lot_info, 'categories' => $categories]);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Лот | '.$lot_info['title'], 'categories' => $categories]);
print($layout_content);


