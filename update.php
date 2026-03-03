<?php
require 'db.php';
require 'functions.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE id = :id");
$stmt->execute([':id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    if (!validateNumber($price) || !validateNumber($qty)) {
        die("Invalid input! Price and Quantity must not be negative.");
    }
    $total = computeTotal($price, $qty);
    $sql = "UPDATE transactions 
            SET item=:item, price=:price, qty=:qty, total=:total
            WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':item' => $item,
        ':price' => $price,
        ':qty' => $qty,
        ':total' => $total,
        ':id' => $id
    ]);
    redirect("read.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Update Transaction</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; }

body {
    font-family: 'DM Sans', sans-serif;
    background: linear-gradient(135deg, #ffe6f0 0%, #fff0f8 50%, #fce4ec 100%);
    margin: 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 20px;
}

.container {
    background: white;
    padding: 36px 40px;
    width: 100%;
    max-width: 460px;
    border-radius: 20px;
    box-shadow: 0 4px 6px rgba(255, 100, 180, 0.08), 0 12px 32px rgba(255, 100, 180, 0.15);
}

.badge {
    display: inline-block;
    background: #fce4ec;
    color: #ad1457;
    font-size: 0.75rem;
    font-weight: 600;
    padding: 3px 10px;
    border-radius: 20px;
    letter-spacing: 0.4px;
    margin-bottom: 6px;
}

h2 {
    text-align: center;
    color: #c2185b;
    font-size: 1.4rem;
    font-weight: 600;
    margin: 0 0 28px;
    letter-spacing: -0.3px;
}

.header-area {
    text-align: center;
    margin-bottom: 28px;
}

.form-group {
    margin-bottom: 16px;
}

label {
    display: block;
    font-size: 0.8rem;
    font-weight: 600;
    color: #ad1457;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    margin-bottom: 6px;
}

input {
    width: 100%;
    padding: 11px 14px;
    border-radius: 10px;
    border: 1.5px solid #f8bbd0;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    color: #333;
    background: #fff9fb;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
}

input:focus {
    border-color: #f06292;
    box-shadow: 0 0 0 3px rgba(240, 98, 146, 0.12);
    background: white;
}

.btn-group {
    display: flex;
    gap: 10px;
    margin-top: 8px;
}

button {
    flex: 1;
    padding: 13px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg, #f06292, #e91e8c);
    color: white;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
    box-shadow: 0 4px 14px rgba(233, 30, 140, 0.3);
}

button:hover {
    opacity: 0.92;
    transform: translateY(-1px);
}

.btn-cancel {
    flex: 1;
    padding: 13px;
    border-radius: 10px;
    border: 1.5px solid #f8bbd0;
    background: white;
    color: #c2185b;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.2s;
}

.btn-cancel:hover {
    background: #fff0f5;
}
</style>
</head>
<body>
<div class="container">
    <div class="header-area">
        <div class="badge">ID #<?= $id ?></div>
        <h2>Update Transaction</h2>
    </div>
    <form method="post">
        <div class="form-group">
            <label for="item">Item Name</label>
            <input type="text" id="item" name="item" value="<?= htmlspecialchars($data['item']) ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" step="0.01" name="price" value="<?= $data['price'] ?>" required>
        </div>
        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" id="qty" name="qty" value="<?= $data['qty'] ?>" required>
        </div>
        <div class="btn-group">
            <a href="read.php" class="btn-cancel">Cancel</a>
            <button type="submit">Update</button>
        </div>
    </form>
</div>
</body>
</html>