<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Dates</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS -->
</head>
<body>
    <div class="container">
        <h2>Request Leave</h2>
        <form action="submit_leave_request.php" method="POST">
            <input type="hidden" name="employee_id" value="<?php echo $_GET['employee_id']; ?>">
            <label for="start_date">Start Date:</label>
            <input type="date" id="start_date" name="start_date" required>
            <br>
            <label for="end_date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>
            <br>
            <label for="reason">Reason:</label>
            <textarea id="reason" name="reason" required></textarea>
            <br>
            <button type="submit">Submit Request</button>
        </form>
    </div>
</body>
</html>
