<?php
include ('config.php');

// Initialize variables for the alert messages
$alertClass = '';
$alertMessage = '';

if(isset($_POST['submit'])){
    $uName=$_POST['uName'];
    $uMatrixNo=$_POST['uMatrixNo'];
    $phoneNum=$_POST['phoneNum'];
    $email=$_POST['email'];
    $facultyName=$_POST['facultyName'];
    $reason=$_POST['reason'];

    $query=mysqli_query($con, "INSERT INTO user (uName,uMatrixNo,phoneNum,email,facultyName,reason) VALUES ('$uName','$uMatrixNo','$phoneNum','$email','$facultyName','$reason')");
    if($query)
    {
        // Success message
        $alertClass = 'alert alert-success';
        $alertMessage = 'Data inserted successfully';
    }else{
        // Error message
        $alertClass = 'alert alert-danger';
        $alertMessage = 'There was an error inserting data';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <!-- Display the alert message based on the condition -->
        <?php if (!empty($alertMessage)) { ?>
            <div class="<?php echo $alertClass; ?>" role="alert">
                <?php echo $alertMessage; ?>
            </div>
        <?php } ?>

        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Registration Club Members</h2>
                <form method="POST" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="uName" class="form-label">Full name:</label>
                        <input type="text" class="form-control" name="uName" placeholder="Enter name" required>
                        <div class="invalid-feedback">
                            Please enter your full name.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="uMatrixNo" class="form-label">Matrix no:</label>
                        <input type="text" class="form-control" name="uMatrixNo" placeholder="Enter matrix no" required>
                        <div class="invalid-feedback">
                            Please enter your matrix number.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="phoneNum" class="form-label">Phone number:</label>
                        <input type="number" class="form-control" name="phoneNum" placeholder="Enter phone number" required>
                        <div class="invalid-feedback">
                            Please enter your phone number.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="facultyName" class="form-label">Faculty:</label>
                        <select id="facultyName" name="facultyName" class="form-select" required>
                            <option value="">Select your faculty</option>
                            <option value="fsktm">FSKTM</option>
                            <option value="fptv">FPTV</option>
                            <option value="fkee">FKEE</option>
                            <option value="fkmp">FKMP</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select your faculty.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason to join:</label>
                        <textarea name="reason" class="form-control" cols="30" rows="4" placeholder="Enter your reason to join this club" required></textarea>
                        <div class="invalid-feedback">
                            Please provide a reason to join.
                        </div>
                    </div>
                    <div class="d-grid">
                     <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button><br>
                     <a href="about.html" class="btn btn-secondary btn-lg">Back</a><br>
                    </div>
                </form>
            </div>
        </div><br><br>
    </div>

    <!-- Include Bootstrap JS (optional for some components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>
