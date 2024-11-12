<?php
// Database connection
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usn = $_POST['usn'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match'); window.location.href='resetpassword.html';</script>";
        exit;
    }

    // Check if USN exists in the signup table
    $stmt = $conn->prepare("SELECT * FROM signup WHERE usn = ?");
    $stmt->bind_param("s", $usn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the password (not hashed as per your request)
        $stmt = $conn->prepare("UPDATE signup SET password = ? WHERE usn = ?");
        $stmt->bind_param("ss", $new_password, $usn);

        if ($stmt->execute()) {
            echo "<script>alert('Password updated successfully'); window.location.href='login.html';</script>";
        } else {
            echo "<script>alert('Error updating password');</script>";
        }
    } else {
        echo "<script>alert('USN not found'); window.location.href='resetpassword.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
