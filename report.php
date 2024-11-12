<?php
include 'adminnav.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "klecet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch total remaining products
// $sql_total_quantity = "SELECT SUM(quantity) as total_quantity FROM products";
// $result_total_quantity = $conn->query($sql_total_quantity);
// $total_quantity = $result_total_quantity->fetch_assoc()['total_quantity'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, price, quantity FROM products";
$result = $conn->query($sql);

// Fetch total remaining products
$sql_total_quantity = "SELECT SUM(quantity) as total_quantity FROM products";
$result_total_quantity = $conn->query($sql_total_quantity);
$total_quantity = $result_total_quantity->fetch_assoc()['total_quantity'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .no-products {
            text-align: center;
            color: #888;
            font-size: 18px;
            padding: 20px 0;
        }

        .print-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
            cursor: pointer;
        }

        @media print {
            body * {
                visibility: hidden;
            }
            .container, .container * {
                visibility: visible;
            }
            .container {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                margin: 0;
                padding: 0;
                box-shadow: none;
            }
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Report</h1>
        <div class="print-button" onclick="window.print()">Print Report</div>
        <h2>Remaining Products in Store: <?php echo $total_quantity; ?></h2>
        <!-- <h2>Total Daily Income: ₹<?php echo number_format($total_income, 2); ?></h2> -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='no-products'>No products found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>