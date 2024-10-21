<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['employee_id'])) {
    header('Location: index.html'); // Redirect to login page if not logged in
    exit();
}

// Database connection
$host = 'localhost'; // Your host
$db = 'mydb';        // Your database name
$user = 'root';       // Your database username
$pass = '';           // Your database password

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form when submitted

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Request</title>
    <style>
        body {
            background-image: url('leave_background.jpg');
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="date"], textarea, input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Emergency Form</h2>
        <form method="POST" action="em.php">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>

            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>

            <label for="reason">Reason for Leave:</label>
            <textarea id="reason" name="reason" rows="4" required></textarea>

            <input type="submit" value="Submit Leave Request">
        </form>
    </div>
</body>
</html>
