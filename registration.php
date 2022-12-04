<?php
include_once 'connection.php';
include_once 'functions.php';

session_start();
global $uNameMsg;
global $contactNoMsg;
global $nameMsg;
$continue = true;

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $add = mysqli_real_escape_string($conn, $_POST['address']);
    $contactNo = mysqli_real_escape_string($conn, $_POST['contactNo']);
    $userName = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    if (!checkName($name)) {
        $nameMsg = "Name must be alphabetic only";
        $continue = false;
    }

    if (!checkNumber($contactNo)) {
        $contactNoMsg = "Invalid phone number";
        $continue = false;
    }

    if (duplicateExists('userlogin', 'uName', $userName, $conn)) {
        $uNameMsg = "Username not available!";
        $continue = false;
    }

    if (!checkuName($userName)) {
        $uNameMsg = "Username can contain only numbers and letters";
        $continue = false;
    }

    if (duplicateExists('userinfo', 'cNumber', $contactNo, $conn)) {
        $contactNoMsg = "This number is already in use!";
        $continue = false;
    }

    if ($continue) {
        $query = "INSERT INTO userinfo (uName, name, address, cNumber) values (?, ?, ?, ?);";

        $statement = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($statement, $query)) {
            mysqli_stmt_bind_param($statement, "ssss", $userName, $name, $add, $contactNo);
            mysqli_stmt_execute($statement);
        }

        $query1 = "INSERT INTO userlogin (uName, password) values ('$userName' , '$hashedPass');";
        mysqli_query($conn, $query1);

        header('location: successful.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Assignment03 - Register</title>
</head>

<body>
    <div id="loginDiv">
        <form method="post" action="" id="loginForm">
            <div id="loginFormDiv">
                <p class="loginInputparagraph">Sign Up</p>
                <div>
                </div>
                <p class=""></p>
                <p class="loginInputparagraph"> <input type="text" placeholder="Name" class="loginInputBox" name="name" required></p>
                <p style="text-align : center; color : red"> <?php echo $nameMsg; ?> </p>
                <p class="loginInputparagraph"> <input type="text" placeholder="Address" class="loginInputBox" name="address" required></p>
                <p class="loginInputparagraph"> <input type="text" placeholder="Contact Number (without 0 in front)" class="loginInputBox" name="contactNo" required></p>
                <p style="text-align : center; color : red"> <?php echo $contactNoMsg; ?> </p>
                <p class="loginInputparagraph"> <input type="text" placeholder="Username" class="loginInputBox" name="username" required></p>
                <p style="text-align : center; color : red"> <?php echo  $uNameMsg; ?> </p>
                <p class="loginInputparagraph"> <input type="password" placeholder="Password" class="loginInputBox" name="password" required></p>
                <p class="loginInputparagraph"> <input type="submit" value="Sign up" id="loginInputBtn" name="submit"> </p>
                <p id="notUser">Already a user? <a href="userRedir.php">Sign In</a></p>
            </div>
        </form>
    </div>

    <?php
    include_once 'footer.php';
    ?>

</body>

</html>