<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login-email']) && isset($_POST['login-password'])) {
        $email = $_POST['login-email'];
        $password = $_POST['login-password'];

        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['username'] = $user['name'];
                header("Location:\Honest Chocolate Website\HOME\products.php");
                exit();
            } else {
                echo "Invalid password";
            }
        } else {
            echo "No user found with this email";
        }
        $stmt->close();
    }
}

$conn->close();
?>

