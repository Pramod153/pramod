<?php
include 'connect.php';
include 'adminnav.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $usnToDelete = $_POST['usn'];
    $sqlDelete = "DELETE FROM signup WHERE usn = ?";
    $stmt = $conn->prepare($sqlDelete);
    $stmt->bind_param("s", $usnToDelete);
    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>User deleted successfully.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error deleting user: " . $conn->error . "</div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

    </style>
</head>
<body>
    <div class="container">
        <h2>Student Details</h2>
        <div class="table-container">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">USN Number</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Department</th>
                        <th scope="col">Year</th>
                        <th scope="col">Email ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT username, usn, mobile, department, year, email FROM signup";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($row["username"]) . "</td>
                                    <td>" . htmlspecialchars($row["usn"]) . "</td>
                                    <td>" . htmlspecialchars($row["mobile"]) . "</td>
                                    <td>" . htmlspecialchars($row["department"]) . "</td>
                                    <td>" . htmlspecialchars($row["year"]) . "</td>
                                    <td>" . htmlspecialchars($row["email"]) . "</td>
                                    <td>
                                        <form method='POST' action=''>
                                            <input type='hidden' name='usn' value='" . htmlspecialchars($row["usn"]) . "' />
                                            <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                                        </form>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No users found</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


















