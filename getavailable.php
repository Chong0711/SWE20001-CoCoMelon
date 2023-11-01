<?php
session_start();
$court = $_GET['court'];
$date = $_GET['date'];
$con = mysqli_connect('localhost','root',null);
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"cocomelon");
$sql = "SELECT * FROM booking WHERE Court = '".$court."' AND Book_Date = '".$date."' AND Status = 'Booked'";
$result = mysqli_query($con,$sql);

    $resultBookedTimes = mysqli_query($con, $sql);
    $bookedTimeRanges = array();

    if ($resultBookedTimes) {
        while ($rowBookedTime = mysqli_fetch_assoc($resultBookedTimes)) {
            $bookedTimeRanges[] = [
                'start' => $rowBookedTime['Book_StartTime'],
                'end' => $rowBookedTime['Book_EndTime']
            ];
        }
    }

    echo '<div class="input-court"><label> Start Time: </label><select id="start-time" name="stime" onchange="handleStartTimeChange()">
    <option value="">Select Start Time</option>';

    $availableTimes = array(
        "08:00:00" => "08:00 AM",
        "09:00:00" => "09:00 AM",
        "10:00:00" => "10:00 AM",
        "11:00:00" => "11:00 AM",
        "12:00:00" => "12:00 PM",
        "13:00:00" => "01:00 PM",
        "14:00:00" => "02:00 PM",
        "15:00:00" => "03:00 PM",
        "16:00:00" => "04:00 PM",
        "17:00:00" => "05:00 PM",
        "18:00:00" => "06:00 PM",
        "19:00:00" => "07:00 PM",
        "20:00:00" => "08:00 PM",
        "21:00:00" => "09:00 PM",
        "22:00:00" => "10:00 PM",
    );

    foreach ($availableTimes as $timeValue => $timeLabel) {
        // Check if the time or its adjacent hour is booked
        $isDisabled = false;
    
        foreach ($bookedTimeRanges as $bookedTimeRange) {
            if ($timeValue >= $bookedTimeRange['start'] && $timeValue < $bookedTimeRange['end']) {
                $isDisabled = true;
                break;
            }
        }
    
        $disabled = $isDisabled ? 'disabled' : '';
        $colorStyle = $isDisabled ? 'style="color: red;"' : '';
    
        echo '<option value="' . $timeValue . '" ' . $disabled . ' ' . $colorStyle . '>' . $timeLabel . '</option>';
    }
    echo '</select></div>';

    $redirected = isset($_GET['redirected']) ? $_GET['redirected'] : false;

    if ($redirected == 'true') {
        echo '<div class="input-court"><label> End Time: </label><select name="etime">
        <option value="">Select End Time</option>';
        $availableTimes = array(
            "08:00:00" => "08:00 AM",
            "09:00:00" => "09:00 AM",
            "10:00:00" => "10:00 AM",
            "11:00:00" => "11:00 AM",
            "12:00:00" => "12:00 PM",
            "13:00:00" => "01:00 PM",
            "14:00:00" => "02:00 PM",
            "15:00:00" => "03:00 PM",
            "16:00:00" => "04:00 PM",
            "17:00:00" => "05:00 PM",
            "18:00:00" => "06:00 PM",
            "19:00:00" => "07:00 PM",
            "20:00:00" => "08:00 PM",
            "21:00:00" => "09:00 PM",
            "22:00:00" => "10:00 PM",
            "23:00:00" => "11:00 PM"
        );
        foreach ($availableTimes as $timeValue => $timeLabel) {
            // Check if the time or its adjacent hour is booked
            $isDisabled = false;

            foreach ($bookedTimeRanges as $bookedTimeRange) {
                if ($timeValue >= $bookedTimeRange['start'] && $timeValue <= $bookedTimeRange['end']) {
                    $isDisabled = true;
                    break;
                }
            }

            $disabled = $isDisabled ? 'disabled' : '';
            $colorStyle = $isDisabled ? 'style="color: red;"' : '';

            echo '<option value="' . $timeValue . '" ' . $disabled . ' ' . $colorStyle . '>' . $timeLabel . '</option>';
        }
        echo '</select></div>';
    }
    else
    {
        echo"<p>End Time: <input type=time name=mendtime id='end-time' readonly></p>";
    }
mysqli_close($con);
?>
<script>
    function handleStartTimeChange() {
        const startTimeInput = document.getElementById('start-time');
        const endTimeInput = document.getElementById('end-time');
        const durationInput = document.getElementById('duration');

        const selectedStartTime = new Date("2023-08-23T" + startTimeInput.value);
        const duration = parseFloat(durationInput.value) || 1; // Default to 1 hour if duration is not set

        if (!isNaN(selectedStartTime.getTime())) {
            const newEndTime = new Date(selectedStartTime);
            newEndTime.setHours(newEndTime.getHours() + duration);

            // Format the end time to HH:MM
            const endHours = newEndTime.getHours().toString().padStart(2, "0");
            const endMinutes = newEndTime.getMinutes().toString().padStart(2, "0");
            endTimeInput.value = endHours + ":" + endMinutes;        }
    }

    // Attach event listeners to the relevant input fields
    document.getElementById("start-time").addEventListener("click", handleStartTimeChange);
    document.getElementById("duration").addEventListener("click", handleStartTimeChange);

    // Initially calculate and set the end time based on start time and duration
    handleStartTimeChange();
</script>

        