<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            width: 100%;
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        p {
            text-align: center;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            color: #007bff;
        }

        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .menu-item {
            width: 45%;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            background-color: #fff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
        }

        .menu-item img {
            max-width: 400px;
            height: 300px;
            border-radius: 8px;
        }

        .menu-item h3 {
            color: #007bff;
        }

        .quantity-controls {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .quantity-controls button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 5px;
            transition: background 0.3s;
        }

        .quantity-controls button:hover {
            background-color: #0056b3;
        }

        .quantity-controls input {
            width: 40px;
            padding-left: 10px;
            text-align: center;
            justify-content: center;
        }

        .order-section {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #007bff;
            border-radius: 8px;
            background-color: #e7f3ff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .order-section button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            margin-right: 10px;
        }

        .order-section button:hover {
            background-color: #218838;
        }

        .total, .result {
            margin-top: 20px;
            font-size: 20px;
            color: #007bff;
            text-align: center;
        }

        .payment-section {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .payment-section input {
            padding: 10px;
            width: 150px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .logout-button {
            display: inline-block;
            background: #dc3545;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .logout-button:hover {
            background: #c82333;
        }

        .logout-container {
            display: flex;
            justify-content: space-between; 
        }

        @media (max-width: 768px) {
        .menu-item {
        flex: 1 1 100%; 
    }

        .quantity-controls input {
        width: 50px; 
    }
}

        @media (max-width: 480px) {
        .order-section button, .payment-section input {
        width: 100%; 
    }

        .total, .result {
        font-size: 18px;
    }
}
    </style>
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
        </header>
        <main>
            <div class="about">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab iste eligendi quae facilis voluptate! Corporis inventore quidem quo recusandae distinctio!</p>
            </div>

            <div class="menu">
                <div class="menu-item">
                    <h3>Pecel Ayam</h3>
                    <img src="https://i.pinimg.com/564x/00/c9/38/00c9383761feb90c8c72c8416b8a66e9.jpg" alt="Pecel Ayam">
                    <p>Harga: Rp. 15.000-</p>
                    <div class="quantity-controls">
                        <button onclick="updateQuantity('food1', -1)">-</button>
                        <input type="number" id="food1Qty" value="0" readonly>
                        <button onclick="updateQuantity('food1', 1)">+</button>
                    </div>
                </div>
                <div class="menu-item">
                    <h3>Pecel Lele</h3>
                    <img src="https://i.pinimg.com/564x/7f/18/8b/7f188b0817c3170741b5aafe0972e907.jpg" alt="Pecel lele">
                    <p>Harga: Rp. 13.000-</p>
                    <div class="quantity-controls">
                        <button onclick="updateQuantity('food2', -1)">-</button>
                        <input type="number" id="food2Qty" value="0" readonly>
                        <button onclick="updateQuantity('food2', 1)">+</button>
                    </div>
                </div>
                <div class="menu-item">
                    <h3>Teh Manis</h3>
                    <img src="https://i.pinimg.com/564x/0a/7c/27/0a7c27f56aa886c3451e4cf97bc37e57.jpg" alt="Teh Manis">
                    <p>Harga: Rp. 5000</p>
                    <div class="quantity-controls">
                        <button onclick="updateQuantity('drink1', -1)">-</button>
                        <input type="number" id="drink1Qty" value="0" readonly>
                        <button onclick="updateQuantity('drink1', 1)">+</button>
                    </div>
                </div>
                <div class="menu-item">
                    <h3>Es Jeruk</h3>
                    <img src="https://i.pinimg.com/564x/2f/ce/05/2fce054dc77697bbc790197ed8c71bbf.jpg" alt="Es Jeruk">
                    <p>Harga: Rp. 7000</p>
                    <div class="quantity-controls">
                        <button onclick="updateQuantity('drink2', -1)">-</button>
                        <input type="number" id="drink2Qty" value="0" readonly>
                        <button onclick="updateQuantity('drink2', 1)">+</button>
                    </div>
                </div>
            </div>

            <div class="order-section">
                <div class="logout-container">
                    <button onclick="calculateTotal()">Kirim Pesanan</button>
                    <a href="logout.php" class="logout-button">Logout</a>
                </div>
                <div class="total" id="total">Total: Rp. 0</div>
                <div class="payment-section">
                    <label for="payment">Masukkan Uang:</label>
                    <input type="number" id="payment" min="0" step="0.01" required>
                    <button onclick="checkPayment()">Bayar</button>
                </div>
                <div class="result" id="result" style="text-align: center;"></div>
            </div>
        </main>
    </div>

    <script>
        let totalCost = 0;

        function updateQuantity(item, change) {
            const qtyInput = document.getElementById(item + 'Qty');
            let currentQty = parseInt(qtyInput.value);
            currentQty += change;

            if (currentQty < 0) {
                currentQty = 0;
            }

            qtyInput.value = currentQty;
        }

        function calculateTotal() {
            totalCost = 0;

            const food1Qty = parseInt(document.getElementById('food1Qty').value);
            const food2Qty = parseInt(document.getElementById('food2Qty').value);
            const drink1Qty = parseInt(document.getElementById('drink1Qty').value);
            const drink2Qty = parseInt(document.getElementById('drink2Qty').value);

            totalCost += food1Qty * 15000;
            totalCost += food2Qty * 13000; 
            totalCost += drink1Qty * 5000; 
            totalCost += drink2Qty * 7000; 

            document.getElementById('total').innerText = 'Total: Rp. ' + totalCost + "-";
        }

        function checkPayment() {
            const payment = parseFloat(document.getElementById('payment').value);
            const resultDiv = document.getElementById('result');

            if (payment < totalCost) {
                resultDiv.innerText = 'Uang tidak cukup!';
            } else {
                const change = payment - totalCost;
                resultDiv.innerText = 'Transaksi berhasil! Kembali: Rp. ' + change + "-";
            }
        }
    </script>
</body>
</html>
