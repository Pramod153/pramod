<?php
include 'adminnav.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "klecet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, price, quantity, image FROM products";
$result = $conn->query($sql);
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

        .container1 {
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

        img {
            max-width: 100px;
            border-radius: 4px;
        }

        .no-products {
            text-align: center;
            color: #888;
            font-size: 18px;
            padding: 20px 0;
        }

        .action-button {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }

        .delete-button {
            background-color: #d9534f;
        }

        .delete-button:hover {
            background-color: #c9302c;
        }

        .edit-button {
            background-color: #f0ad4e;
        }

        .edit-button:hover {
            background-color: #ec971f;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>
    <div class="container1">
        <h1>Admin - View Products</h1>
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $sno = 0;
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $sno = $sno + 1; 
                        echo "<tr>";
                        echo "<td>" . $sno . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["price"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td><img src='" . $row["image"] . "' alt='" . $row["name"] . "'></td>";
                        echo "<td>
                                <div class='button-group'>
                                    <form action='create1.php' method='get'>
                                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                                        <button type='submit' class='action-button edit-button'>Edit</button>
                                    </form>
                                    <form action='delete.php' method='post' onsubmit='return confirm(\"Are you sure you want to delete this product?\");'>
                                        <input type='hidden' name='id' value='" . $row["id"] . "'>
                                        <button type='submit' class='action-button delete-button'>Delete</button>
                                    </form>
                                </div>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='no-products'>No products found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
