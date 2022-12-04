<?php
session_start();
if (!isset($_SESSION['userName'])) {
    header('location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="confirmStyle.css">
    <title>Document</title>
</head>

<body>
    <div class="nav">
        <a href="logout.php"><b>Log Out</b></a>
        <a href="home.php"><b>Home</b></a>
    </div>
    <div id="aptConfirm">

        <p> <b> Your appointment has been confirmed! </b> </p>

        <p>Car No: <b> <?php echo $_SESSION['serial']; ?> </b></p>
        <p>engineNo: <b> <?php echo $_SESSION['engineNo']; ?> </b> </p>
        <p>Date: <b> <?php echo $_SESSION['date']; ?> </b> </p>
        <p>Mechanic: <b> <?php echo $_SESSION['mechanic']; ?> </b> </p>
    </div>
    <?php include_once 'footer.php'; ?>
</body>

</html>