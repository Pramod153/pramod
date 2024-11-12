<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $amount = $_POST['amount'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_number = $_POST['card_number'];
    $exp_date = $_POST['exp_date'];
    $cvv = $_POST['cvv'];

    // Here you would typically integrate with a payment gateway API.
    // For demonstration, we'll just display a success message.

    echo "<h1>Payment Successful</h1>";
    echo "<p>Thank you, " . $name . " for your purchase.</p>";
    echo "<p>Amount: $" . $amount . "</p>";
    echo "<p>Product ID: " . $product_id . "</p>";
    echo "<p>An email receipt has been sent to: " . $email . "</p>";
}
if (isset($_POST['logout'])) {
    session_destroy(); // Destroy the session to log the user out
    header("Location: login.php"); // Redirect to the login page
    exit();
}
?>
<form method="POST" action="index.php">
    <input type="submit" name="logout" value="Logout">
</form>
