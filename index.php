<?php
include_once 'connection.php';
include_once 'functions.php';

session_start();
if (empty($_SESSION['invalidLogin'])) {
    $_SESSION['invalidLogin'] = '';
}

if (isset($_POST['loginSubmit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['loginUname']);
    $pass = $_POST['loginPass'];

    $query = "SELECT * from userlogin WHERE uName = '$username';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);



    if (mysqli_num_rows($result) == 1) {
        $checkPass = $row['password'];
        if (password_verify($pass, $checkPass)) {
            $_SESSION['userName'] = $username;
            header('location: home.php');
        } else {
            $_SESSION['invalidLogin'] = "Invalid username/password";
        }
    } else {
        $_SESSION['invalidLogin'] = "Invalid username/password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Assignment03 - Login</title>
</head>

<body>
    <div id="loginDiv">
        <form action="" id="loginForm" method="POST">
            <div id="loginFormDiv">
                <p class="loginInputparagraph">Log In</p>
                <p class="loginInputparagraph"> <input type="text" name="loginUname" placeholder="Username" class="loginInputBox"></p>
                <p class="loginInputparagraph"> <input type="password" name="loginPass" placeholder="Password" class="loginInputBox"></p>
                <p style="text-align: center; color:red"><?php echo $_SESSION['invalidLogin']; ?> </p>
                <p class="loginInputparagraph"><input type="submit" name="loginSubmit" value="Submit" id="loginInputBtn"> </p>
                <p id="notUser">Not a user? <a href="registration.php">Sign up</a></p>
            </div>
        </form>
    </div>

    <?php
    include_once 'footer.php';
    ?>
</body>