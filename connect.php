
<?php
error_reporting(E_ALL); // Report all errors
ini_set('display_errors', 1); // Display errors on the screen


$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$feedback = $_POST['feedback'] ?? '';
$rating = $_POST['rating'] ?? '';


$conn = new mysqli('localhost', 'root', '', 'ai technologies feedback');

if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO  feedback1 (name, email, feedback, rating) VALUES (?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare Failed: " . $conn->error);
}

$stmt->bind_param("ssss", $name, $email, $feedback, $rating);

if ($stmt->execute()) {
    echo "Feedback submitted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
