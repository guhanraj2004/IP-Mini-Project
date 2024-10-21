<?php
session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];

    // Validate admin credentials
    if ($admin_name === 'guhan' && $admin_password === '123') {
        // Fetch leave requests
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        echo "Invalid Admin Name or Password.";
    }
}
?>
