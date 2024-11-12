<?php
session_start();
include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usn = $_POST['usn'];
    $password = $_POST['password'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT id, password FROM signup WHERE usn = ?");
    $stmt->bind_param("s", $usn);

    // Execute the statement
    $stmt->execute();
    $stmt->store_result();

    // Debug: Display USN and number of rows received using a popup
    // echo "<script>
    //         alert('USN entered: " . $usn . "\\nNumber of rows received: " . $stmt->num_rows . "');
    //       </script>";

    // Check if user exists
    if ($stmt->num_rows > 0) {
        // Bind the result to variables
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();

        // Debug: Check if the password was fetched
        // echo "<script>
        //         alert('Fetched password from database: " . $stored_password . "');
        //       </script>";

        // Compare passwords directly since they are not hashed
        if ($password === $stored_password) {
            $_SESSION['usn'] = $usn;
            $_SESSION['user_id'] = $id;
            // Redirect to the stationary page
            echo "<script>
                    alert('Login successful');
                    window.location.href='stationary.php';
                  </script>";
        } else {
            // Password does not match
            echo "<script>
                    alert('Invalid password');
                    window.location.href='login.html';
                  </script>";
        }
    } else {
        // No user found with the entered USN
        echo "<script>
                alert('No user found with that USN');
                window.location.href='signup1.html';
              </script>";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();

?>
