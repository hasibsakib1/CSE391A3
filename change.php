<?php
session_start();
if (empty($_SESSION['adminName'])) {
    header('location: AdminLogin.php');
}


$id = $_GET['id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="changeStyle.css">
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

        <p style="text-align: center; margin-top: 20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:18px;">Job Number: <?php echo $id; ?></p>
        <p style="text-align: center; margin-top: 20px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size:18px;">Change Date: </p>

        <form id="changeForm" action="adminIsOP.php" method="POST">
            <input class="inputChange" type="hidden" name="id" id="id" value="<?php echo $id; ?>">
            <input class="inputChange" autocomplete="off" type="text" name="changeDate" id="changeDate" required>
            <input id="submitBtn" type="submit" name="checkDate" id="checkDate" value="Check Date">
        </form>

    </div>

</body>

</html>

<script>
    $("#changeDate").datepicker({
        changeYear: true,
        changeMonth: true,
        dateFormat: 'yy-mm-dd',
        minDate: new Date()
    });
</script>