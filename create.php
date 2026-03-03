<?php
require 'db.php';
require 'functions.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    if (!validateNumber($price) || !validateNumber($qty)) {
        die("Invalid input! Price and Quantity must not be negative.");
    }
    $total = computeTotal($price, $qty);
    $sql = "INSERT INTO transactions (item, price, qty, total)
            VALUES (:item, :price, :qty, :total)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':qty' => $qty,
        ':total' => $total
    ]);
    redirect("read.php");
}
?>