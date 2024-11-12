<?php
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password']; // Not hashing the password
    $type = $_POST['type'];
    $Department = $_POST['department'];
    $Email_id = $_POST['email'];
    $Phone_no = $_POST['phone'];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO login (username, password, type, Department, Email_id, Phone_no) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Check if the statement was prepared correctly
    if (!$stmt) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssssss", $username, $password, $type, $Department, $Email_id, $Phone_no);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
        alert('New user added successfully');
        window.location.href='admin.php';
      </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="password"], input[type="email"], input[type="tel"], select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New User</h1>
        <form action="staffcreate.php" method="post">

        <!-- <label for="id">id:</label>
            <input type="text" id="id" name="id" required> -->
            
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="a">Admin</option>
                <option value="s">Staff</option>
            </select>
            
            <label for="department">Department:</label>
            <select id="department" name="department" required>
                <option value="cs">Computer Science</option>
                <option value="ec">Electronics and Communication</option>
                <option value="mech">Mechanical</option>
                <option value="mca">MCA</option>
                <option value="mba">MBA</option>
            </select>

            <label for="email">Email ID:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required pattern="[0-9]{10}" maxlength="10">

            <button type="submit">Add  New User</button>
        </form>
    </div>
</body>
</html>
        