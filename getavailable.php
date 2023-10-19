<?php
$court = $_GET['court'];
$date = $_GET['date'];
$con = mysqli_connect('localhost','root',null);
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"cocomelon");
$sql = "SELECT * FROM booking WHERE Court = '".$court."' AND Book_Date = '".$date."'";
$result = mysqli_query($con,$sql);

$booked_slots = array();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Store booking data in an array
                    $booked_slots[] = array(
                        'start' => $row['Book_StartTime'],
                        'end' => $row['Book_EndTime']
                    );
                }
            }

            $total_slots = 24; // Total slots available in a day (adjust as needed)
            $start_time = strtotime('8:00');
            $end_time = strtotime('23:59');

            $available_slots = array();

            // Create an array of all time slots for the day
            $all_time_slots = array();
            for ($i = $start_time; $i <= $end_time; $i += 3600) { // 1800 seconds = 30 minutes
                $time_slot = date("Y-m-d H:i:s", $i);
                $all_time_slots[] = $time_slot;
            }

            foreach ($all_time_slots as $time_slot) {
                $slot_booked = false;

                foreach ($booked_slots as $booking) {
                    $start = strtotime($booking['start']);
                    $end = strtotime($booking['end']);

                    if (strtotime($time_slot) >= $start && strtotime($time_slot) < $end) {
                        $slot_booked = true;
                        break;
                    }
                }

                if (!$slot_booked) {
                    $available_slots[] = $time_slot;
                }
            }
            ?>
            <div class="input-court">
            <label>Start Time</label>
            <select name="stime">
            <?php
            echo '<option value="">Select Start Time</option>';
            foreach ($available_slots as $time_slot) {
                // Format the time slot for a more user-friendly display
                $formatted_time_slot = date("h:i A", strtotime($time_slot));

                //echo $formatted_time_slot . "<br>";
                echo '<option value="'.  $formatted_time_slot .'" >'.  $formatted_time_slot .'</option>';
            }
            ;
            ?>
            </select>
            </div>

            
            <div class="input-court" <?php if (!isset($_GET['redirected'])) echo 'style="display: none;"'; ?>>
            <label>End Time</label>
            <select name="etime" >
            <?php
            echo '<option value="">Select End Time</option>';
            foreach ($available_slots as $time_slot) {
                // Format the time slot for a more user-friendly display
                $formatted_time_slot = date("h:i A", strtotime($time_slot));

                //echo $formatted_time_slot . "<br>";
                echo '<option value="'.  $formatted_time_slot .'" >'.  $formatted_time_slot .'</option>';
            }
            ;
            ?>
            </select>
            </div>
            <?php
            mysqli_close($con);
            ?>

        