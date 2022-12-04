<?php
session_start();
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
    $mechanic = $_POST['mechanicSlct'];

    $query = "INSERT INTO appointment (mID, uName, serialNo, engineNo, apt_date) values (?, ?, ?, ?, ?);";

    $statement = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($statement, $query)) {
        mysqli_stmt_bind_param($statement, "issss", $mechanic, $user, $serial, $engineNo, $date);
        mysqli_stmt_execute($statement);
    }

    $_SESSION['serial'] = $serial;
    $_SESSION['engineNo'] = $engineNo;
    $_SESSION['date'] = $date;


    $query = "SELECT name from mechanicinfo where ID = '$mechanic';";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['mechanic'] = $row['name'];
        }
    }
    header('location: confirm.php');
}
