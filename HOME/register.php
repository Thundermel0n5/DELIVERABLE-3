<?php

include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signup-name']) && isset($_POST['signup-email']) && isset($_POST['signup-password']) && isset($_POST['signup-confirm-password'])) {
        $name = $_POST['signup-name'];
        $email = $_POST['signup-email'];
        $password = $_POST['signup-password'];
        $confirmPassword = $_POST['signup-confirm-password'];

        if ($password !== $confirmPassword) {
            echo "Passwords do not match";
        } else {
            $sql = "SELECT * FROM users WHERE email=?";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                die("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "Email already exists. Please choose another email.";
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    die("Prepare failed: " . $conn->error);
                }
                $stmt->bind_param("sss", $name, $email, $hashedPassword);

                if ($stmt->execute() === TRUE) {
                    echo "Signup successful";
                } else {
                    echo "Error: " . $stmt->error;
                }
            }
            $stmt->close();
        }
    }
}

$conn->close();
?>
