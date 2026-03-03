<?php
require 'db.php';
require 'functions.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);
redirect("read.php");
?>