<!DOCTYPE html>
<html>
<head>
<title>Add Transaction</title>
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

.logo {
    text-align: center;
    margin-bottom: 6px;
    font-size: 28px;
}

h2 {
    text-align: center;
    color: #c2185b;
    font-size: 1.4rem;
    font-weight: 600;
    margin: 0 0 28px;
    letter-spacing: -0.3px;
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

input::placeholder {
    color: #f0a0c0;
}

button {
    width: 100%;
    padding: 13px;
    margin-top: 8px;
    border-radius: 10px;
    border: none;
    background: linear-gradient(135deg, #f06292, #e91e8c);
    color: white;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.95rem;
    font-weight: 600;
    cursor: pointer;
    letter-spacing: 0.2px;
    transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
    box-shadow: 0 4px 14px rgba(233, 30, 140, 0.3);
}

button:hover {
    opacity: 0.92;
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(233, 30, 140, 0.35);
}

button:active {
    transform: translateY(0);
}

.nav-link {
    display: block;
    margin-top: 20px;
    text-align: center;
    color: #e91e8c;
    font-weight: 500;
    font-size: 0.9rem;
    text-decoration: none;
    padding: 10px;
    border-radius: 8px;
    transition: background 0.2s;
}

.nav-link:hover {
    background: #fff0f5;
}
</style>
</head>
<body>
<div class="container">
    <h2>Add Transaction</h2>
    <form method="post" action="create.php">
        <div class="form-group">
            <label for="item">Item Name</label>
            <input type="text" id="item" name="item" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" step="0.01" name="price" required>
        </div>
        <div class="form-group">
            <label for="qty">Quantity</label>
            <input type="number" id="qty" name="qty" required>
        </div>
        <button type="submit">Save Transaction</button>
    </form>
    <a href="read.php" class="nav-link">→ View All Transactions</a>
</div>
</body>
</html>