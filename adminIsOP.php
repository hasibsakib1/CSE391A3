<?php
session_start();
if (empty($_SESSION['adminName'])) {
    header('location: AdminLogin.php');
}

include_once 'connection.php';

if (isset($_POST['checkDate'])) {
    global $jobID;
    global $date;
    $date = $_POST['changeDate'];
    $jobID = $_POST['id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminisOP.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" />
    <title>Change Appointment</title>
</head>

<body>

    <div class="header">
        <a href="logout.php">Logout</a>
        <a href="redirect.php">Admin Panel</a>
    </div>

    <div id="changeFormDiv">
        <form action="finalize.php" method="POST">

            <input class="inputChange" type="hidden" name="jobid" value="<?php echo $jobID; ?>">
            <p style="text-align: center; margin-top: 20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:18px;">Job Number: <?php echo $jobID; ?></p>
            <input class="inputChange" readonly type="text" name="changeDate" id="changeDate" value="<?php echo $date; ?>" required>

            <p id="changeFormDivp" style="text-align: center"> <label>Select Mechanic: </label> </p>

            <select name="mechanicSlct" id="mechanicSlct" class="dateNmechanic" required>
                <?php
                $query = "SELECT * FROM mechanicinfo;";
                $result = mysqli_query($conn, $query);
                $datas = array();

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $datas[] = $row;
                    }
                }

                echo "<option value='' disabled selected>Select mechanic</option>";

                foreach ($datas as $data) {
                    $id = $data['ID'];
                    $checkSlotQuery = "SELECT * FROM appointment where apt_date = '$date' AND mID = '$id';";
                    $slotResult = mysqli_query($conn, $checkSlotQuery);
                    $resultCount = mysqli_num_rows($slotResult);
                    $resultCount = 4 - $resultCount;
                    if ($resultCount == 0) {
                        echo "<option disabled value=" . $data['ID'] . ">" . $data['name'] . " (Slots Available: " .  $resultCount . ")" . "</option>";
                    } else {
                        echo "<option value=" . $data['ID'] . ">" . $data['name'] . " (Slots Available: " .  $resultCount . ")" . "</option>";
                    }
                }
                ?>
            </select>
            <input id="finalizeBtn" type="submit" name="finalize" id="checkDate" value="Confirm Change">
    </div>

</body>

</html>

<script>
    $("#changeDate").datepicker({
        disabled,
        changeYear: true,
        changeMonth: true,
        dateFormat: 'yy-mm-dd',
        minDate: new Date()
    });
</script>