<?php
// MySQL database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_records";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email ID from the form
    $email = $_POST["email"];

    // Prepare SQL statement to fetch user's health report from the database
    $sql = "SELECT health_report FROM users WHERE email = '$email'";

    // Execute the SQL statement
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the health report file from the result
        $row = $result->fetch_assoc();
        $healthReport = $row["health_report"];

        // Provide the health report file for download
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=health_report.pdf");
        echo $healthReport;
        exit;
    } else {
        echo "No health report found for the given email ID.";
    }
}

// Close the database connection
$conn->close();
?>
