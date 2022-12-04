<?php
include_once 'connection.php';
session_start();

if (empty($_SESSION['adminName'])) {
    header('location: AdminLogin.php');
}

if (empty($_SESSION['adminOP'])) {
    $_SESSION['adminOP'] = '';
}

global $id;
global $currDate;
$currDate = Date("yy-m-d");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminStyle.css">
    <title>Admin Panel</title>
</head>

<body>
    <div class="header">
        <a href="logout.php">Logout</a>
        <a href="redirect.php">Admin Panel</a>
    </div>

    <div class="main">
        <?php
        $query = "SELECT appointment.job_ID, appointment.uName, mechanicinfo.name, appointment.serialNo, appointment.engineNo, appointment.apt_date, appointment.Overridden
                        FROM appointment
                        INNER JOIN mechanicinfo ON appointment.mID = mechanicinfo.ID ORDER BY apt_date desc;";
        $result = mysqli_query($conn, $query);
        $datas = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $datas[] = $row;
            }
        } ?>
        <p style="text-align: center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><?php echo $_SESSION['adminOP']; ?></p>
        <table id="apts">
            <tr>
                <th>Job Number</th>
                <th>Mechanic</th>
                <th>User</th>
                <th>Car Serial</th>
                <th>Engine Number</th>
                <th>Appointment Date</th>
                <th>Modified My Admin</th>
                <th>Modify Entry</th>
            </tr>
            <?php
            foreach ($datas as $data) {
            ?>
                <tr>
                    <td>
                        <?php echo $data['job_ID']; ?>
                    </td>
                    <td>
                        <?php echo $data['name']; ?>
                    </td>
                    <td>
                        <?php echo $data['uName']; ?>
                    </td>
                    <td>
                        <?php echo $data['serialNo']; ?>
                    </td>
                    <td>
                        <?php echo $data['engineNo']; ?>
                    </td>
                    <td>
                        <?php echo $data['apt_date']; ?>
                    </td>
                    <td>
                        <?php echo $data['Overridden']; ?>
                    </td>
                    <td>
                        <?php
                        if ($data['apt_date'] > $currDate) {
                        ?>
                            <a href='change.php?id=<?php echo $data['job_ID']; ?>'><Button id="edit" name="edit">Edit</Button></a>
                        <?php } else { ?>
                            <Button disabled id="edit" name="edit">Edit</Button>
                        <?php }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>

</body>

</html>