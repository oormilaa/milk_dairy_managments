<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dairy_management";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $farmerNumber = $conn->real_escape_string($_POST['farmerNumber']);
    $farmerName = $conn->real_escape_string($_POST['farmerName']);
    $phoneNumber = $conn->real_escape_string($_POST['phoneNumber']);
    $maritalStatus = $conn->real_escape_string($_POST['maritalStatus']);
    $numberOfChildren = isset($_POST['numberOfChildren']) ? (int)$_POST['numberOfChildren'] : 0;
    $address = $conn->real_escape_string($_POST['address']);
    $milkType = $conn->real_escape_string($_POST['milkType']);

    // Prepare the value for numberOfChildren
    $numberOfChildrenValue = ($numberOfChildren === 0) ? 'NULL' : "'$numberOfChildren'";

    // Insert the data into the database
    $sql = "INSERT INTO farmers (farmerNumber, farmerName, phoneNumber, maritalStatus, numberOfChildren, address, milkType)
            VALUES ('$farmerNumber', '$farmerName', '$phoneNumber', '$maritalStatus', $numberOfChildrenValue, '$address', '$milkType')";

    if ($conn->query($sql) === TRUE) {
        echo 'Success';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
