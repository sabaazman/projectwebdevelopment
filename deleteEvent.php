<?php
include "conn.php";
$eventID=$_GET['eventID'];

$sql="DELETE FROM event WHERE eventID = '$eventID'";

$val= $conn->query($sql);
if($val === TRUE){
header('location: main.php?delete_success=1');
    exit();

}
?>
