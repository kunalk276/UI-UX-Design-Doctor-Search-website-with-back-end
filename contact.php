<?php
// Database connection parameters
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "docarea"; // Replace "your_database_name" with your actual database name

// Establish database connection
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];

    // Prepare SQL statement to insert data into database using prepared statements
    $sql = "INSERT INTO contact (Name, Email, Message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("sss", $Name, $Email, $Message);

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "Thank you for contacting us!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>
&nbsp;
&nbsp;
&nbsp;
<a href="index.html"><h1>Back To Home Page</h1></a>