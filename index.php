<?php

// MySQL database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_records";

// Create a connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $weight = $_POST['weight'];
    $email = $_POST['email'];

    // Handle uploaded PDF file
    $pdfFile = $_FILES['health-report']['tmp_name'];
    $pdfContent = addslashes(file_get_contents($pdfFile));

    // Prepare SQL statement to insert user details and PDF file into the database
    $sql = "INSERT INTO users (name, age, weight, email, health_report) VALUES ('$name', $age, $weight, '$email', '$pdfContent')";

    if (mysqli_query($con, $sql)) {
        echo "Data submitted successfully.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
if (mysqli_query($con, $sql)) {
    echo "Data submitted successfully.";
    header("Location: success.php"); // Redirect to a success page
    exit(); // Terminate the script after redirection
} else {
    echo "Error: " . mysqli_error($con);
}


mysqli_close($con);

?>
