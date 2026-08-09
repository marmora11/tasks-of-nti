<?php
$conn = mysqli_connect("localhost", "root", "", "task4");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>