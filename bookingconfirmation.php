<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        /* Center the confirmation details */
        .confirmation-container {
            text-align: center;
            margin: 0 auto;
            padding: 20px;
            max-width: 400px; /* Adjust the maximum width as needed */
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <!-- Centered container for confirmation details -->
    <div class="confirmation-container">
        <h2>Booking Confirmation</h2>
        <?php
        // Retrieve user inputs
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $courts = $_POST['courts'];
        $trainer = isset($_POST['trainer']) ? $_POST['trainer'] : "no";
        $trainerName = isset($_POST['trainerName']) ? $_POST['trainerName'] : "";

        // Calculate the price
        $courtPricePerHour = 8; // RM per hour
        $trainerPricePerHour = 20; // RM per hour
        $durationInHours = 1; // Default duration is 1 hour

        // Calculate the total price based on the number of courts and trainer selection
        $courtTotalPrice = $courts * $durationInHours * $courtPricePerHour;
        $trainerTotalPrice = ($trainer === "yes") ? $durationInHours * $trainerPricePerHour : 0;
        $totalPrice = $courtTotalPrice + $trainerTotalPrice;

        // Output the booking details and price
        echo "Name: $name<br>";
        echo "Email: $email<br>";
        echo "Phone: $phone<br>";
        echo "Date: $date<br>";
        echo "Time: $time<br>";
        echo "Number of Booking Court: $courts<br>";
        echo "Trainer: $trainer<br>";
        if ($trainer === "yes") {
            echo "Trainer Name: $trainerName<br>";
        }
        echo "Total Price: RM $totalPrice<br>";
        ?>
            
    </div>
</body>
</html>
