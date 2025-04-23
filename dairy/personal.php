<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Farmer Data</title>
    <link rel="stylesheet" href="personal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="form-container">
        <header>
            <h1>View Farmers Data</h1>
        </header>

        <main>

<?php
// fetch_farmer_details.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dairy_management"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $farmerNumber = $conn->real_escape_string($_POST['farmerNumber']); // Sanitize input

    // SQL query to fetch farmer details
    $sql = "SELECT farmerNumber, farmerName, phoneNumber, maritalStatus, numberOfChildren, address, milkType 
            FROM farmers 
            WHERE farmerNumber = '$farmerNumber'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data in table format
        echo "<div class='farmer-details'><table>";
        echo "<tr><th>Farmer Number</th><th>Farmer Name</th><th>Phone Number</th><th>Marital Status</th><th>Number of Children</th><th>Address</th><th>Milk Type</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . htmlspecialchars($row["farmerNumber"]) . "</td><td>" . htmlspecialchars($row["farmerName"]) . "</td><td>" . htmlspecialchars($row["phoneNumber"]) . "</td><td>" . htmlspecialchars($row["maritalStatus"]) . "</td><td>" . htmlspecialchars($row["numberOfChildren"]) . "</td><td>" . htmlspecialchars($row["address"]) . "</td><td>" . htmlspecialchars($row["milkType"]) . "</td></tr>";
        }
        echo "</table></div>";
    } else {
        echo "<div class='farmer-details'><p>No farmer found with this number.</p></div>";
    }

    $conn->close();
}
?>
</main>

<footer>
            <nav class="taskbar">
                <a href="portal.html"><i class="fa fa-home"></i> Home</a>
                <a href="farmerdetails.html"><i class="fa fa-user"></i> Farmer Data</a>
                <a href="temp.html"><i class="fa fa-list"></i> Farmer Milk Details</a>
                <a href="form.html"><i class="fa fa-plus"></i> Milk Offering</a>
                <a href="#"><i class="fa fa-eye"></i> View Farmer</a>
            </nav>
        </footer>
    </div>
</body>
</html>

