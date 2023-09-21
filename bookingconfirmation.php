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

        // Output the booking details
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
        ?>
    </div>
</body>
</html>
