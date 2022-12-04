<?php
include_once 'connection.php';
session_start();
if (empty($_SESSION['adminName'])) {
    header('location: AdminLogin.php');
}


if (isset($_POST['finalize'])) {
    $id = $_POST['jobid'];
    $date = $_POST['changeDate'];
    $mechanic = $_POST['mechanicSlct'];

    $query = "UPDATE appointment SET mID = '$mechanic', apt_date = '$date', overridden = 'yes' WHERE job_ID = '$id';";
    mysqli_query($conn, $query);

    echo $_SESSION['adminOP'] = "Successful, Date has been changed to $date and mechanic ID no: $mechanic has been appointed for job number $id";
    header('location: adminPanel.php');
}
