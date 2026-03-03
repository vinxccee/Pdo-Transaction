<?php
require 'db.php';
$stmt = $pdo->query("SELECT * FROM transactions ORDER BY id DESC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
<title>Transaction List</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; }

body {
    font-family: 'DM Sans', sans-serif;
    background: linear-gradient(135deg, #ffe6f0 0%, #fff0f8 50%, #fce4ec 100%);
    margin: 0;
    min-height: 100vh;
    padding: 40px 20px;
}

.container {
    background: white;
    padding: 36px 40px;
    width: 100%;
    max-width: 860px;
    margin: auto;
    border-radius: 20px;
    box-shadow: 0 4px 6px rgba(255, 100, 180, 0.08), 0 12px 32px rgba(255, 100, 180, 0.15);
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 28px;
    flex-wrap: wrap;
    gap: 12px;
}

h2 {
    color: #c2185b;
    font-size: 1.4rem;
    font-weight: 600;
    margin: 0;
    letter-spacing: -0.3px;
}

.add-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: linear-gradient(135deg, #f06292, #e91e8c);
    color: white;
    font-family: 'DM Sans', sans-serif;
    font-weight: 600;
    font-size: 0.88rem;
    text-decoration: none;
    padding: 9px 18px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(233, 30, 140, 0.28);
    transition: opacity 0.2s, transform 0.15s;
    letter-spacing: 0.1px;
}

.add-btn:hover {
    opacity: 0.9;
    transform: translateY(-1px);
}

.table-wrap {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    font-size: 0.93rem;
}

thead th {
    background: #fce4ec;
    color: #ad1457;
    font-weight: 600;
    font-size: 0.78rem;
    text-transform: uppercase;
    letter-spacing: 0.7px;
    padding: 12px 16px;
    text-align: left;
    white-space: nowrap;
}

thead th:first-child { border-radius: 10px 0 0 10px; }
thead th:last-child  { border-radius: 0 10px 10px 0; }

tbody td {
    padding: 13px 16px;
    color: #444;
    border-bottom: 1px solid #fce4ec;
}

tbody tr:last-child td {
    border-bottom: none;
}

tbody tr:hover td {
    background: #fff5f9;
}

.actions {
    display: flex;
    gap: 8px;
    align-items: center;
}

.btn-edit, .btn-delete {
    font-family: 'DM Sans', sans-serif;
    font-size: 0.82rem;
    font-weight: 600;
    text-decoration: none;
    padding: 5px 12px;
    border-radius: 7px;
    transition: opacity 0.2s, transform 0.15s;
    display: inline-block;
}

.btn-edit {
    background: #fce4ec;
    color: #c2185b;
}

.btn-edit:hover {
    background: #f8bbd0;
}

.btn-delete {
    background: #fdecea;
    color: #c62828;
}

.btn-delete:hover {
    background: #ffcdd2;
}

.empty-state {
    text-align: center;
    padding: 48px 20px;
    color: #f48fb1;
    font-size: 0.95rem;
}

.empty-state .icon {
    font-size: 2.5rem;
    margin-bottom: 12px;
}

.currency::before {
    content: '₱';
    color: #f06292;
    font-size: 0.8em;
    margin-right: 1px;
}
</style>
</head>
<body>
<div class="container">
    <div class="header">
        <h2>Transactions</h2>
        <a href="index.php" class="add-btn">+ Add New</a>
    </div>
    <div class="table-wrap">
    <?php if (empty($rows)): ?>
        <div class="empty-state">
            <div class="icon">🧾</div>
            <div>No transactions yet. Add your first one!</div>
        </div>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td style="color:#f48fb1; font-weight:600;">#<?= $row['id'] ?></td>
                    <td style="font-weight:500;"><?= htmlspecialchars($row['item']) ?></td>
                    <td><span class="currency"></span><?= number_format($row['price'], 2) ?></td>
                    <td><?= $row['qty'] ?></td>
                    <td style="font-weight:600; color:#c2185b;"><span class="currency"></span><?= number_format($row['total'], 2) ?></td>
                    <td>
                        <div class="actions">
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Delete this transaction?')">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    </div>
</div>
</body>
</html>