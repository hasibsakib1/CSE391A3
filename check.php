<?php
session_start();
$_SESSION['msg'] = '';
include_once 'connection.php';

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

if (isset($_POST['submit'])) {

    $currentDate = date('yy-m-d');
    $user = $_SESSION['userName'];
    $serial = $_POST['carSerial'];
    $engineNo =  $_POST['engineNumber'];
    $date = $_POST['aptDate'];

    if (!ctype_alnum($serial) || !ctype_alnum($engineNo)) {
        $_SESSION['invalidSerial'] = "Car serial number & engine number must be alphanumeric";
        header('location:home.php');
    }

    $checkdateQuery = "SELECT * FROM appointment WHERE uName = '$user' AND apt_date = '$date'";
    $result = mysqli_query($conn, $checkdateQuery);

    if (mysqli_num_rows($result) > 0) {
        header('location: home.php');
        $_SESSION['msg'] = "You already have an appointment scheduled on $date";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homeStyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" />
    <title>Home</title>
</head>

<body>
    <div class="nav">
        <a href="logout.php"><b>Log Out</b></a>
        <a href="redirectUser.php"><b>Home</b></a>
    </div>

    <div class="bookingFormDiv">

        <p>Welcome <?php echo $_SESSION['userName']; ?></p>

        <form action="process.php" method="POST" id="bookingForm" name="bookingForm">
            <input class="info" type="text" name="carSerial" placeholder="Car serial number" value="<?php echo $serial ?>" readonly required>
            <input class="info" type="text" name="engineNumber" placeholder="Car engine number" value="<?php echo $engineNo ?>" readonly required>

            <div id="dateSlct">
                <p>
                    <label style="font-weight:normal;" for="date">Select preferred date: </label>
                    <input style="min-width: 200px" id="txtDate" class="dateNmechanic" type="text" name="aptDate" placeholder="Select desired date" value="<?php echo $date ?>" readonly required>
                </p>
                <p>
                    <label style="font-weight:normal;">Select Mechanic: </label>
                    <select style="margin-top:20px; min-width: 250px; min-height: 40px" name="mechanicSlct" id="mechanicSlct" class="dateNmechanic" required>

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
                </p>
            </div>
            <button name="submit" id="submitbtn">Confirm</button>
        </form>
    </div>

    <?php include_once 'footer.php'; ?>
</body>

</html>

<script>
    $("#txtDate").datepicker({
        disabled,
        changeYear: true,
        changeMonth: true,
        dateFormat: 'yy-mm-dd',
        minDate: new Date()
    });
</script>