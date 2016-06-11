<?php
require '../database/database.php';
$conn = database::connect();
$id=$_GET['id'];
$sql = "SELECT * FROM sanpham WHERE id='$id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_array();
    echo $row["img"];
} 
database::disconnect();
?>