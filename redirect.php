<?php
session_start();
unset($_SESSION['adminOP']);

header('location:adminPanel.php');
