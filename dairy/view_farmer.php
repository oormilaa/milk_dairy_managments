<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Farmer Data</title>
    <link rel="stylesheet" href="temp.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>
    <div class="form-container">
        <header>
            <h1>View Farmer Data</h1>
        </header>

        <main>
            <?php
            // Database connection settings
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "dairy_management";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch farmer data based on the farmer number
            $farmer_number = $conn->real_escape_string($_GET['farmer_number']);
            $sql = "SELECT * FROM milk_offerings WHERE farmer_number = '$farmer_number'";
            $result = $conn->query($sql);

            // Initialize a variable to calculate the grand total
            $grand_total = 0;

            // Check if data is available
            if ($result->num_rows > 0) {
                echo "<h2 class='farmer-details-header'>Farmer Details</h2>";
                echo "<table class='farmer-data-table'>";
                echo "<tr><th>Date</th><th>Time</th><th>Milk Type</th><th>Liters</th><th>Fat Content</th><th>SNF</th><th>Rate per Liter</th><th>Total Price</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["date"] . "</td>
                            <td>" . $row["time"] . "</td>
                            <td>" . $row["milk_type"] . "</td>
                            <td>" . $row["liters"] . "</td>
                            <td>" . $row["fat_content"] . "</td>
                            <td>" . $row["snf"] . "</td>
                            <td>" . $row["rate"] . "</td>
                            <td>" . $row["total_price"] . "</td>
                          </tr>";
                    // Add to the grand total
                    $grand_total += $row["total_price"];
                }
                echo "</table>";
                echo "<h3 class='grand-total'>Grand Total: ₹" . $grand_total . "</h3>";
            } else {
                echo "<p class='no-data'>No data found for Farmer Number: " . $farmer_number . "</p>";
            }

            // Close connection
            $conn->close();
            ?>
        </main>

        <footer>
            <nav class="taskbar">
                <a href="portal.html"><i class="fa fa-home"></i> Home</a>
                <a href="farmerdetails.html"><i class="fa fa-user"></i> Farmer Data</a>
                <a href="temp.html"><i class="fa fa-list"></i> Farmer Milk Details</a>
                <a href="form.html"><i class="fa fa-plus"></i> Milk Offering</a>
                <a href="personal.html"><i class="fa fa-eye"></i> View Farmer</a>
            </nav>
        </footer>
    </div>
</body>
</html>
