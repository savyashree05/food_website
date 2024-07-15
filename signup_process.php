

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = $_POST["password"]; // You should hash the password for security

    // Database connection (replace with your database credentials)
    $servername = "localhost";
    $db_username = "root";
    $db_password = "Iwbo052003!!!";
    $dbname = "fauget_restaurant";

    // Create connection
    $conn = new mysqli($localhost, $root, $Iwbo052003!!!, $fauget_restaurant);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)");
    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    
    // Bind parameters
    $stmt->bind_param("ssss", $fullname, $email, $username, $hashed_password);

    // Execute statement
    if ($stmt->execute()) {
        // Redirect to success page or login page
        <li><a href="signin.html">Sign In</a></li>
        exit();
    } else {
        // Handle error
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If someone tries to access this script directly
    <li><a href="signin.html">Sign In</a></li>
    exit();
}
?>
