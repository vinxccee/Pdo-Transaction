<?php
function validateNumber($number) {
    if (!is_numeric($number) || $number < 0) {
        return false;
    }
    return true;
}
function computeTotal($price, $qty) {
    return $price * $qty;
}
function redirect($page) {
    header("Location: $page");
    exit();
}
?>