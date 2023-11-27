<?php

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db = "porum";
$conn = new mysqli($host_db, $user_db, $pass_db, $db);
if (!$conn) {
    die("Mất kết nối tới server");
}

function countPostByCate($cateid)
{
    global $conn;
    $query = "SELECT categoryid, categoryname, COUNT(postid) AS so_post from view_post_full GROUP BY categoryid, categoryname HAVING categoryid = $cateid";
    $execute_Query = $conn->query($query);
    if ($execute_Query->num_rows > 0) {
        $num_rows = $execute_Query->fetch_assoc();
        echo $num_rows['so_post'];
    } else {
        echo '0';
    }

}
?>