<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db = "porum";
$conn = new mysqli($host_db, $user_db, $pass_db, $db);
if (!$conn) {
    die("Mất kết nối tới server");
}

?>