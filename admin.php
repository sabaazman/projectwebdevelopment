<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: main.php");
    exit;
}


include "conn.php";
//if($db){ echo "connection success";}
$sql = "SELECT * FROM admin";    
$val=$conn->query($sql);    
$rows=$val;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to KC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font: 17px sans-serif;
            /* text-align: center;*/
            background-color: floralwhite;
        }
        .navbar-nav {
            margin-left: auto;
        }
        #t {
            color: white;
            font-size: 16px;
        }
        #f {
            font-size: 17px;
            color: white;
        }
        #a {
            font-size: 25px;
        }
        #e {
            text-align: center;
        }
        #button {
            padding: 6px 10px;
            font-size: 16px;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
        }
        td,th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            font-size: 17px;
        }
        th {
            text-align: center;
            background-color: #82B39D ;
        }
        h2 {
            color: black;
            font-size: 40px;
            text-align: center;
            font-family: "Times New Roman", Times, serif;
        }
    </style>
</head>
<body>
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="img/logo2.png" width="32" height="32" class="d-inline-block" alt="">
            &nbsp;KEMBARA CLUB
        </a>


        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a id="f" class="nav-link" href="main.php">Event</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                        |
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">

                    </a>
                </li>
                <li class="nav-item">
                    <a id="f" class="nav-link" href="member.php">Member Registration</a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                        |
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">

                    </a>
                </li>
                <li class="nav-item">
                    <a id="f" class="nav-link" href="feedback.php">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                        |
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">

                    </a>
                </li>
                <li class="nav-item">
                    <a id="f" class="nav-link" href="admin.php">Admin List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                    |
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
                    </a>
                </li>
                <li class="nav-item">
                    <a id="f" class="nav-link" href="adminLog.php">Admin Log</a>
                </li>
            </ul>
        </div>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a id="t" class="nav-link disabled" href="#">
<!--                    Admin: <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>-->
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">

                </a>
            </li>
            <li class="nav-item">
                <a id="button" href="about.html" class="btn btn-danger">
                    Log out
                </a>

            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">
            <div class="mx-auto" style="width: auto;">
                <br><br><br>
                <h2><b>ADMIN LIST</b></h2>
            </div>
            <div style="padding:7px 16px;height:1000px;">
                <div class="col-md-20 col-md-offset-3">
                    <p></p>

                    <!-- Button trigger modal -->
                    <!-- Button trigger modal -->

                    <br><br>
                    <div class="text-left">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Admin</button>

                    </div>
                    <p></p>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Event</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <!--        FORM ADD TASK            -->
                                    <!--        FORM ADD TASK            -->


                                    <form action="addAdmin.php" method="post">
        <div class="form-group">
            <label for="matrixNo">Matric No:</label>
            <input type="text" name="matrixNo" class="form-control" id="matrixNo" placeholder=""><br>
            <label for="adminName">Name:</label>
            <input type="text" name="adminName" class="form-control" id="adminName" placeholder=""><br>
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
        <button type="submit" name="send" class="btn btn-primary">Add</button>
    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--                Item table -->
                    <!--                Item table -->

                    <table>
                        <thead>
                            <tr>
                                <th scope="col"><b>MATRIC NUMBER</b></th>
                                <th scope="col"><b>NAME</b></th>
                                <th scope="col"><b>PHONE NUMBER</b></th>
                                <th scope="col"><b>EMAIL</b></th>
                                <th scope="col"><b>FACULTY</b></th>
                                <th scope="col"><b>ROLE</b></th>
                                <th scope="col"><b>UPDATE</b></th>
                                <th scope="col"><b>DELETE</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <?php while($row=$rows->fetch_assoc()):?>

                                <td id="e" class="col-md-1"><?php echo $row['matrixNo'];?></td>
                                <td class="col-md-4"><?php echo $row['adminName'];?></td>
                                <td id="e" class="col-md-2">0<?php echo $row['phoneNum'];?></td>
                                <td id="e" class="col-md-2"><?php echo $row['email'];?></td>
                                <td id="e" class="col-md-2"><?php echo $row['facultyName'];?></td>
                                <td id="e" class="col-md-2"><?php echo $row['role'];?></td>

                                <td><a href="updateAdmin.php?matrixNo=<?php echo $row['matrixNo'];?>" class="btn btn-primary">Update</a></td>

                                <!--<td><a href="deleteEvent.php?eventID=<?php echo $row['eventID'];?>" class="btn btn-danger">Delete</a></td>-->
                                
                                <td><a href="deleteAdmin.php?matrixNo=<?php echo $row['matrixNo']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a></td>

                            </tr>
                            <?php endwhile; ?>

                        </tbody>
                    </table>
                    <br><br><br><br>
                    <!--                end of table-->
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
     <script>
        // Check if URL has the success parameter and show alert
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('admin_success')) {
            alert('Admin added successfully!');
        }
        //alert if user successful delete
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('deleteAdmin_success')) {
                alert('Admin successfully deleted!');
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>