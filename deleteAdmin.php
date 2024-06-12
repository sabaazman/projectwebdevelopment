<?php
include "conn.php";
$eventID=$_GET['matrixNo'];

$sql="DELETE FROM admin WHERE matrixNo = '$matrixNo'";

$val= $conn->query($sql);
if($val === TRUE){
header('location: admin.php?deleteAdmin_success=1');
    exit();

}
?>
