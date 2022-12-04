<?php
session_start();
include_once 'connection.php';

if (empty($_SESSION['invalidSerial'])) {
    $_SESSION['invalidSerial'] = '';
}

if (empty($_SESSION['msg'])) {
    $_SESSION['msg'] = '';
}

if (!isset($_SESSION['userName'])) {
    header('location: index.php');
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

        <form action="check.php" method="POST" id="bookingForm" name="bookingForm">
            <input class="info" type="text" name="carSerial" placeholder="Car serial number" required>
            <input class="info" type="text" name="engineNumber" placeholder="Car engine number" required>

            <div id="dateSlct">
                <label for="date">Select preferred date: </label>
                <input autocomplete="off" id="txtDate" class="dateNmechanic" type="text" name="aptDate" placeholder="Select desired date" required>
            </div>
            <p style="margin-top: 50px; color:red"><?php echo $_SESSION['msg']; ?></p>
            <p style="margin-top: 50px; color:red"><?php echo $_SESSION['invalidSerial']; ?></p>
            <button name="submit" id="submitbtn">Check Availability</button>
        </form>
    </div>

    <?php include_once 'footer.php'; ?>
</body>

</html>

<script>
    $("#txtDate").datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: 'yy-mm-dd',
        minDate: new Date()
    });
</script>