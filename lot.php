<?php
require_once('data.php');
require_once('functions.php');

$lot = isset($_GET['lot']) == true ? intval($_GET['lot']) : intval($_POST['id']);
if ($lot == 0) {
    header('Location: /');
}

$con = connectToDb();
if (!$con) {
    print("Ошибка подключения: " . mysqli_connect_error());
}
else {
    if (isset($_POST['cost'])) {
        $bet = intval($_POST['cost']);
        $query = "SELECT bet_step, MAX(bet.price) AS cur_price FROM lot
                  JOIN bet
                  ON bet.id_lot = lot.id
                  WHERE lot.id = " . $lot;
        $bet_info = selectFromDb($con, $query)[0];
        if ($bet >= ($bet_info['bet_step'] + $bet_info['cur_price'])) {
            $user_id = $_SESSION['user']['id'];
            $query = "INSERT INTO bet (dateNtime, price, id_user, id_lot) VALUES (NOW(), $bet, $user_id, $lot)";
            $result = mysqli_query($con, $query);
            if (!$result) {
                print("Ошибка Mysql: " . mysqli_error($con));
                // Шаблон с ошибкой
            }
            header("Location: /lot.php?lot=" . $lot);
        }
    }
    $query = "SELECT lot.id, TIMESTAMPDIFF(SECOND, NOW(), end_date) AS timer, lot.name, description, image_link, start_price, bet_step, id_creator, user.name AS creator, title AS category, MAX(bet.price) AS cur_price
              FROM lot
              JOIN category
              ON lot.id_category = category.id
              JOIN user
              ON lot.id_creator = user.id
              JOIN bet
              ON bet.id_lot = lot.id
              WHERE lot.id = " . $lot;
    $lot_info = selectFromDb($con, $query)[0];
    // var_dump($lot_info);
    $min_bet = isset($lot_info['cur_price']) == true ? ($lot_info['cur_price'] + $lot_info['bet_step']) : $lot_info['start_price'];
    $query = "SELECT price, user.name, TIMESTAMPDIFF(SECOND, dateNtime, NOW()) AS dateNtime
              FROM bet
              JOIN user
              ON bet.id_user = user.id
              WHERE bet.id_lot = " . $lot . "
              ORDER BY dateNtime";
    $bets = selectFromDb($con, $query);
    // var_dump($bets);
}

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

$page_content = template('templates/lot.php', ['bets' => $bets, 'lot_info' => $lot_info, 'categories' => $categories, 'min_bet' => $min_bet]);
$layout_content = template('templates/layout.php', ['content' => $page_content, 'page_name' => 'Лот | '.$lot_info['name'], 'categories' => $categories]);
print($layout_content);


