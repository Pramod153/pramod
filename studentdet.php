<!-- <?php
include 'connect.php';
include 'adminnav.php';
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
        .table-container {
            margin-top: 20px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            white-space: nowrap;
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
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found</td></tr>";
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
















 -->
