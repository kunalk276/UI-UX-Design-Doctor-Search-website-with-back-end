<?php
// Establish database connection
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "docarea";

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$success_message = "succesfully";

// Handle sign-in form submission
if (isset($_POST["signin"])) {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    // Query database to check if user exists
    $sql = "SELECT * FROM signup WHERE Email='$Email' AND Password='$Password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User authenticated, set success message
        $success_message = "Sign in successfully";
    } else {
        // Invalid credentials, show error message
        $error = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
    <h2>Sign In</h2>
    <?php if (!empty($success_message)) { ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php } ?>

    <?php if (isset($error)) { ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php } ?>
    
    <form action="" method="post">
        <label for="Email">Email:</label><br>
        <input type="email" id="Email" name="Email" required><br>

        <label for="Password">Password:</label><br>
        <input type="password" id="Password" name="Password" required><br>

        <button type="submit" name="signin">Sign In</button>
    </form>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
