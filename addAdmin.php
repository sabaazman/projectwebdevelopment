<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to KC</title>
</head>
<style>
    body {
            background-color: floralwhite;
        }
</style>
<body>
    
</body>
</html>

<?php
include("conn.php");

if(isset($_POST['send'])){
    $matrixNo = $_POST['matrixNo'];
    $adminName = $_POST['adminName'];
    $adminPwd = $_POST['adminPwd'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['email'];
    $facultyName = $_POST['facultyName'];
    $role = $_POST['role'];
    
    // Validate input
    if(empty($matrixNo) || empty($adminName) || empty($adminPwd) || empty($phoneNum) || empty($email) || empty($facultyName) || empty($role)) {
        echo "Please fill in all fields";
        exit;
    }
    
    // Hash the password
    $hashedPwd = password_hash($adminPwd, PASSWORD_DEFAULT);
    
    // Prepare and execute SQL query
    $stmt = $conn->prepare("INSERT INTO admin (matrixNo, adminName, adminPwd, phoneNum, email, facultyName, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $matrixNo, $adminName, $hashedPwd, $phoneNum, $email, $facultyName, $role);

    if($stmt->execute()) {
        // Successful insertion
        header('location: admin.php?admin_success=1');
        exit;
    } else {
        // Error handling
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // If form is not submitted
    echo "Form not submitted";
}
?>
