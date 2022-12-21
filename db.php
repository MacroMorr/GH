<?php

$serverName = 'localhost';
$userName = 'root';
$password = 'pas123';
$dataBase = 'grinhouse';


// Проверка на подключение к базе данных
try {
    $pdo = new PDO("mysql:host=$serverName; dbname=$dataBase", $userName, $password);
} catch (Exception $e) {
    echo "Ошибка соединения с Базой Данных " . $e->getMessage();
}