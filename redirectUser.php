<?php
session_start();
unset($_SESSION['invalidSerial']);
unset($_SESSION['msg']);

header('location:home.php');
