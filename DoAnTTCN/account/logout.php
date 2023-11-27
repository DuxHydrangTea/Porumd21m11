<?php
session_start();
unset($_SESSION['username']);
header('location: /DoAnTTCN/index.php');
?>