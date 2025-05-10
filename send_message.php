<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // If message is successfully inserted, show success alert and redirect
        echo "<script>
                alert('Message sent successfully!');
                window.location.href = 'index.php'; // Replace with your form page URL
              </script>";
    } else {
        // If there is an error, show error alert
        echo "<script>
                alert('Error: " . $stmt->error . "');
                window.location.href = 'index.php'; // Replace with your form page URL
              </script>";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
