<?php
session_start();

$items_per_page = 9;
$time_finishing = 86400;

function template ($path, $array) {
    if (file_exists($path)) {
        ob_start();
        require_once($path);
        $html_code = ob_get_clean();
    }
    else {
        $html_code = '';
    }
    return $html_code;
}

function form_validate ($array, $array2 = null) {
    $errors = [];
    foreach ($array as $key => $value) {
        if (empty($value)) {
            $errors[$key] = 'Заполните это поле!';
        }
    }
    if (isset($array['email']) && $array2 != null) {
        foreach ($array2 as $value) {
            if ($value['email'] == $array['email']){
                $errors['email'] = "Duplicate!";
            }
        }
    }
    return $errors;
}

function connectToDb () {
    $con = mysqli_connect('localhost', 'root', '', 'yeticave');
    return $con;
}

function selectFromDb($con, $query) {
    $result = mysqli_query($con, $query);
    if (!$result) {
        print("Ошибка Mysql: " . mysqli_error($con));
        // Шаблон с ошибкой
    }
    else {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }
}

function showDate($time) { // Определяем количество и тип единицы измерения
    // $time = time() - strtotime($time);
    if ($time < 60) {
        return '< минуты назад';
    } elseif ($time < 3600) {
        return dimension((int)($time/60), 'i') . ' назад';
    } elseif ($time < 86400) {
        return dimension((int)($time/3600), 'G') . ' назад';
    } elseif ($time < 2592000) {
        return dimension((int)($time/86400), 'j') . ' назад';
    } elseif ($time < 31104000) {
        return dimension((int)($time/2592000), 'n') . ' назад';
    } elseif ($time >= 31104000) {
        return dimension((int)($time/31104000), 'Y') . ' назад';
    }
}

function timeToClose($time) {
    // $time = strtotime($time) - time();
    if ($time < 86400) {
        return gmdate("H:i:s", $time);
    } elseif ($time < 2592000) {
        return dimension((int)($time/86400), 'j');
    } elseif ($time < 31104000) {
        return dimension((int)($time/2592000), 'n');
    } elseif ($time >= 31104000) {
        return dimension((int)($time/31104000), 'Y');
    }
}

function dimension($time, $type) { // Определяем склонение единицы измерения
    $dimension = array(
        'n' => array('месяцев', 'месяц', 'месяца', 'месяц'),
        'j' => array('дней', 'день', 'дня'),
        'G' => array('часов', 'час', 'часа'),
        'i' => array('минут', 'минуту', 'минуты'),
        'Y' => array('лет', 'год', 'года')
    );
    if ($time >= 5 && $time <= 20)
        $n = 0;
    else if ($time == 1 || $time % 10 == 1)
        $n = 1;
    else if (($time <= 4 && $time >= 1) || ($time % 10 <= 4 && $time % 10 >= 1))
        $n = 2;
    else
        $n = 0;
    return $time.' '.$dimension[$type][$n];
}

