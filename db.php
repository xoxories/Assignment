<?php
$host = 'student-mysql.che47cqav4hm.us-east-1.rds.amazonaws.com';
$user = 'student';
$pass = 'Password123!';
$db = 'travel_db';  // Correct database name

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
