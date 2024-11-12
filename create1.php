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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $image = '';

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image = $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    $sql = "INSERT INTO products (name, price, quantity, image) VALUES ('$name', '$price', '$quantity', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('New product added successfully')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin-right: 100px;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            margin-left: 200px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333333;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
            color: #555555;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        input[type="file"] {
            padding: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin - Add New Product</h1>
        <form action="create1.php" method="post" enctype="multipart/form-data">
            <label for="name">Product Name:</label>
            <select id="name" name="name" required>
                <option value="assignment_book">Assignment Book</option>
                <option value="journal_sheet">Journal Sheet</option>
                <option value="bags">Bags</option>
                <option value="pens">Pens</option>
                <option value="id_tags">ID Tags</option>
            </select>
            
            <label for="price">Price:</label>
            <input type="number" step="0.01" id="price" name="price"  maxlength="3">
            
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity"  maxlength="2">
            
            <label for="image">Product Image:</label>
            <input type="file" id="image" name="image" accept="image/*">
            
            <button type="submit">Add Product</button>
        </form>
    </div>
</body>
</html>
