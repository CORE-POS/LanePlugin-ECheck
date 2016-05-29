<?php

if (!class_exists('ECheck', false)) {
    include(__DIR__ . '/../ECheck.php');
}
if (!class_exists('CashDropNotifier', false)) {
    include(__DIR__ . '/../ECheckTender.php');
}
if (!class_exists('CashDropParser', false)) {
    include(__DIR__ . '/../ECheckVerifyPage.php');
}

