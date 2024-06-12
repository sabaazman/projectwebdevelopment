<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
session_start();

// Check if the user is already logged in, if yes then redirect them to the main page
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: main.php");
    exit;
}*/

// Include config file
require_once "conn.php";

// Define variables and initialize with empty values
$matrixNo = $adminPwd = "";
$matrixNo_err = $adminPwd_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if matrix number is empty
    if(empty(trim($_POST["matrixNo"]))){
        $matrixNo_err = "Please enter your matric number.";
    } else{
        $matrixNo = trim($_POST["matrixNo"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["adminPwd"]))){
        $adminPwd_err = "Please enter your password.";
    } else{
        $adminPwd = trim($_POST["adminPwd"]);
    }

    // Validate credentials
    if(empty($matrixNo_err) && empty($adminPwd_err)){
        // Prepare a select statement
        $sql = "SELECT adminID, matrixNo, adminPwd FROM admin WHERE matrixNo = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_matrixNo);

            // Set parameters
            $param_matrixNo = $matrixNo;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $adminID, $matrixNo, $hashed_adminPwd);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($adminPwd, $hashed_adminPwd)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["adminID"] = $adminID;
                            $_SESSION["matrixNo"] = $matrixNo;

                            // Get the current time in the desired format
                            $current_time = date('H:i:s');

                            // Insert log record into adminLog table
                            $log_sql = "INSERT INTO adminLog (matrixNo, date, time) VALUES (?, CURDATE(), ?)";
                            if($log_stmt = mysqli_prepare($conn, $log_sql)){
                                mysqli_stmt_bind_param($log_stmt, "ss", $matrixNo, $current_time);
                                mysqli_stmt_execute($log_stmt);
                                mysqli_stmt_close($log_stmt);
                            }

                            // Redirect user to main page
                            header("location: main.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid matric number or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid matric number or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { 
            font: 14px sans-serif; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
           background-image: url('webDev/event/bg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: darkseagreen; /* Fallback color in case the image doesn't load */
        }
        .wrapper { 
            width: 360px; 
            padding: 20px; 
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Admin Login</h2>
        <p>Please fill in your credentials to login.</p>
        
        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Matric Number</label>
                <input type="text" name="matrixNo" class="form-control <?php echo (!empty($matrixNo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $matrixNo; ?>">
                <span class="invalid-feedback"><?php echo $matrixNo_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="adminPwd" class="form-control <?php echo (!empty($adminPwd_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $adminPwd_err; ?></span>
            </div>
            <div class="form-group">
          <input type="submit" class="btn btn-primary" value="Login">
            <a href="about.html" class="btn btn-secondary">Back</a>
            </div>
            <p>Don't have an account? Contact admin.</p>
        </form>
    </div>   
</body>
</html>
