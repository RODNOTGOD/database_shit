<?php

$username = $_GET['username'];


$conn = new mysqli("localhost", "kragendor", "", "Dotify");

if ($conn->connect_error) {
    echo "Error: Unable to connect to server" . PHP_EOL;
    echo "Debuging errno: " . mysqli_connection_errno() . PHP_EOL;
    echo "Debuging error: " . mysqli_connection_error() . PHP_EOL;
    exit;
}

$stmt = $conn->prepare("SELECT Username from User WHERE Username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

echo json_encode([array("exists" => $result->num_rows > 0)]);
?>