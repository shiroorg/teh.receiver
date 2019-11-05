<?php

require_once 'Method.php';

// Пример тестовых запросов
$Query = array(
    "Пароль: 0021<br />Спишется 557,79р.<br />Перевод на счет 410011988393296",
    "Спишется 3258.58руб.<br />Пароль: 00431<br /><br />Перевод денег на 410011988393296 счет в яндексе",
    "410011988393296 ваш кошелек <br />Будет списано с кошелька: 3258.58rub. <br />Смс код: 00432<br />",

);

$result = [];
foreach ($Query as $item_query) {
    $result[] = \Billing\Receiver::parser($item_query);
}

print_r($result);