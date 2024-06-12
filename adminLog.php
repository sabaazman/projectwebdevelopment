<?php
// Initialize the session


include "conn.php";
//if($db){ echo "connection success";}
$sql = "SELECT * FROM adminLog";    
$result = $conn->query($sql);
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
                    |
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">
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
                <h2><b>ADMIN LOGIN HISTORY</b></h2>
            </div>
            <div style="padding:7px 16px;height:1000px;">
                <div class="col-md-20 col-md-offset-3">
                    <p></p>

                    <!-- Button trigger modal -->
                    <!-- Button trigger modal -->

                    <br><br>
                    <p></p>
                    <!--                Item table -->
                    <!--                Item table -->

                    <table>
                        <thead>
                            <tr>
                                <th scope="col"><b>MATRIC NO</b></th>
                                <th scope="col"><b>DATE</b></th>
                                <th scope="col"><b>TIME</b></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $row['matrixNo'] . "</td>";
                                    echo "<td>" . $row['date'] . "</td>";
                                    echo "<td>" . $row['time'] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6'>No records found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <!--                end of table-->
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>