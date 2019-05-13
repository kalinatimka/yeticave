<?php
require_once ('functions.php');
$con = connectToDb();

if (!$con) {
    print("Ошибка подключения: " . mysqli_connect_error());
}
else {
    $query = "SELECT * FROM category";
    $categories = selectFromDb($con, $query);
}
