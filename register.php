<?php
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $usn = $_POST['usn'];
    $year = (int)$_POST['year'];
    $Department = $_POST['department'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];  // Use the password directly without hashing

    // Check if the USN already exists
    $sql = "SELECT * FROM signup WHERE usn = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // USN already exists
        echo "<script>alert('USN already exists. Please use a different USN.'); window.location.href = 'signup1.html';</script>";
    } else {
        // USN is unique, proceed with registration
        $sql = "INSERT INTO signup (username, usn, department, year, mobile, email, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $username, $usn, $department, $year, $mobile, $email, $password);

        // Execute the statement
        if ($stmt->execute()) {
            // Successful registration
            echo "<script>
                    alert('New user registered successfully');
                    window.location.href='login.html';
                  </script>";
        } else {
            // Error during registration
            echo "<script>
                    alert('Error: " . $stmt->error . "');
                    window.location.href='signup1.html';
                  </script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>
