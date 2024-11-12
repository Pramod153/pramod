<?php 
include 'connect.php';

// <?php
// session_start();
// include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['usertype'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, password, type FROM login WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();
    $stmt->store_result();

    // Check if user exists
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $type);
        $stmt->fetch();

        // Verify password and user type
        if ($user_type == $type) {
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $user_type;
            // Redirect to a different page based on user type
            if ($user_type == 'a') {
                // header("Location: admin.php");

                echo "<script>
                    alert('Login successful');
                    window.location.href='admin.php';
                  </script>";
            } else {
                // header("Location: .php");
                echo 'other page';
            }
            exit();
        } else {
            echo "<script>
                    alert('Invalid password or user type');
                    window.location.href='login3.html';
                  </script>";
            // echo "Invalid password or user type.";
        }
    } else {
        // echo "No user found with that username.";
        echo "<script>
                    alert('User not found');
                    window.location.href='login3.html';
                  </script>";
    }

    $stmt->close();
}

$conn->close();
?>
