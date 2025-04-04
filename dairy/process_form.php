<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dairy_management";

    // Create connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $farmerNumbers = $_POST['farmerNumber'];
    $farmerNames = $_POST['farmerName'];
    $milkTypes = $_POST['milkType'];
    $dates = $_POST['date'];
    $times = $_POST['time'];
    $liters = $_POST['liters'];
    $fatContents = $_POST['fatContent'];
    $snfs = $_POST['snf'];
    $rates = $_POST['rate'];
    $totalPrices = $_POST['totalPrice'];

    for ($i = 0; $i < count($farmerNumbers); $i++) {
        $farmerNumber = $conn->real_escape_string($farmerNumbers[$i]);
        $farmerName = $conn->real_escape_string($farmerNames[$i]);
        $milkType = $conn->real_escape_string($milkTypes[$i]);
        $date = $conn->real_escape_string($dates[$i]);
        $time = $conn->real_escape_string($times[$i]);
        $liter = $conn->real_escape_string($liters[$i]);
        $fatContent = $conn->real_escape_string($fatContents[$i]);
        $snf = $conn->real_escape_string($snfs[$i]);
        $rate = $conn->real_escape_string($rates[$i]);
        $totalPrice = $conn->real_escape_string($totalPrices[$i]);

        $sql = "INSERT INTO milk_offerings (farmer_number, farmer_name, milk_type, date, time, liters, fat_content, snf, rate, total_price)
                VALUES ('$farmerNumber', '$farmerName', '$milkType', '$date', '$time', '$liter', '$fatContent', '$snf', '$rate', '$totalPrice')";

        if (!$conn->query($sql)) {
            echo "Error: " . $conn->error;
        }
    }

    $conn->close();
    echo "Success";
}
?>
