<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Welcome to KC</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="mx-auto" style="width: auto;">
                <br><h3><b>Update Admin Profile</b></h3>
            </div>
            <div class="col-md-12 col-md-offset-3">
                <p></p>
                
                <p></p>
                <form method="POST">
                    <div class="form-group">
                    <?php 
                        include "conn.php";
                     // Check if matrixNo is set in the URL
                        if(isset($_GET['matrixNo'])) {
                            $matrixNo = $_GET['matrixNo'];
                            
                            // Fetch event details from the database
                            $sql = "SELECT * FROM admin WHERE matrixNo='$matrixNo'";  
                            $rows = $conn->query($sql);    
                            $row = $rows->fetch_assoc();
                        } else {
                            // Handle case where eventID is not provided
                            echo "Matric number not provided.";
                            exit; // Exit script
                        }
                    ?>
                    <label for="matrixNo">Matric No:</label>
                    <input type="text" name="matrixNo" class="form-control" id="matrixNo" value="<?php echo $row['matrixNo']; ?>"readonly><br>
                    <label for="adminName">Name:</label>
                    <input type="text" name="adminName" class="form-control" id="adminName" placeholder="" require><br>
                    <label for="adminPwd">Password:</label>
                    <input type="password" name="adminPwd" class="form-control" id="adminPwd" placeholder=""><br>
                    <label for="phoneNum">Phone Num:</label>
                    <input type="text" name="phoneNum" class="form-control" id="phoneNum" placeholder=""><br>
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder=""><br>
                    <label for="facultyName">Faculty:</label>
                    <input type="text" name="facultyName" class="form-control" id="facultyName" placeholder=""><br>
                    <label for="role">Role:</label>
                    <input type="text" name="role" class="form-control" id="role" placeholder=""><br>
                    
                    </div>
                    <button type="submit" name="send" class="btn btn-primary">Update</button>
                    <a class="btn btn-outline-danger" href="admin.php" role="button">Back</a>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<?php 
include "conn.php";

$matrixNo=$_GET['matrixNo'];
$sql = "SELECT * FROM admin WHERE matrixNo='$matrixNo'";  

$rows=$conn->query($sql);    
$row=$rows->fetch_assoc();


if(isset($_POST['send'])){
    $matrixNo = $_POST['matrixNo'];
    $adminName = $_POST['adminName'];
    $adminPwd = $_POST['adminPwd'];
    $phoneNum = $_POST['phoneNum'];
    $email = $_POST['email'];
    $facultyName = $_POST['facultyName'];
    $role = $_POST['role'];
    
     // Hash the password
    $hashedPwd = password_hash($adminPwd, PASSWORD_DEFAULT);
    // this is the to be displayed 
    
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    if($matrixNo && $adminName && $adminPwd && $phoneNum && $email && $facultyName && $role) {
        $mysql = "UPDATE admin set matrixNo = '$matrixNo', adminName = '$adminName', adminPwd = '$hashedPwd', phoneNum = '$phoneNum', email = '$email', facultyName = '$facultyName', role = '$role' WHERE matrixNo = '$matrixNo'";
    }
    
    if($conn->query($mysql)){
        header('location: admin.php');
}
else{
    echo("Error in Adding Records in Table : ".$conn->connect_error);
}
    }
    else{
        echo "<br>";
        echo "<center>";
        echo "<span style='color:red; font-size:30px;'>FILL UP <strong>All OF THE FIELDS ON THE FORM IN ORDER TO UPDATE </strong> !!</span>";
        echo "";
        echo "</center>";
    }   
$conn->close();




?>

