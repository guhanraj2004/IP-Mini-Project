<?php
// Start session (if needed)
session_start();
echo $_POST['employee_id'];
echo $_POST['employee_password'];
// Database connection
$host = 'localhost'; // Your host
$db = 'mydb';        // Your database name
$user = 'root';       // Your database username
$pass = '';           // Your database password (or whatever you've set in XAMPP)

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the employee ID and password from the POST request (login form)
if (isset($_POST['employee_id']) && isset($_POST['employee_password'])) {
    $employee_id = $_POST['employee_id'];
    $password = $_POST['employee_password'];

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM employees WHERE employee_id = ? AND password = ?");
    $stmt->bind_param("ss", $employee_id, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if employee exists
    if ($result->num_rows > 0) {
        // Fetch employee data if needed
        $employee = $result->fetch_assoc();

        // Redirect to the leave request form if login is successful
        $_SESSION['employee_id'] = $employee_id;
        header('Location: submit_em.php'); // Assuming you have a leave_form.php to handle leave details
        exit();
    } else {
        echo "Invalid employee ID or password.";
    }

    $stmt->close();
} else {
    echo "Please enter both employee ID and password.";
}

$conn->close();
?>
