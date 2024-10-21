<?php
// Database connection
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "my db"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_id = $_POST['employee_id'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $reason = $_POST['reason'];

    // Insert leave request into the database
    $sql = "INSERT INTO leave_request (employee_id, start_date, end_date, reason, status) VALUES ('$employee_id', '$start_date', '$end_date', '$reason', 'Pending')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Leave request submitted successfully. Waiting for admin approval.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
