<!-- backup -->
<?php
include("config2.php");

$message = ''; // To hold success or error message

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['feedbackEmail'] ?? '');
    $feedback = trim($_POST['inputText'] ?? '');

    if (!empty($email) && !empty($feedback)) {
        $stmt = $mysqli->prepare("INSERT INTO feedback (email, feedback) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $email, $feedback);
            if ($stmt->execute()) {
                $message = "<p class='success'>Thank you for your feedback! We highly value your feedback!</p>";
            } else {
                $message = "<p class='error'>Failed to save feedback: " . htmlspecialchars($stmt->error) . "</p>";
            }
            $stmt->close();
        } else {
            $message = "<p class='error'>Error preparing statement: " . htmlspecialchars($mysqli->error) . "</p>";
        }
    } else {
        $message = "<p class='error'>Please fill in all fields.</p>";
    }
}

$result = $mysqli->query("SELECT * FROM feedback");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            height: 150px;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .success {
            background-color: #DFF2BF;
            color: #4F8A10;
            border: 1px solid #D6E9C6;
        }
        .error {
            background-color: #F2DEDE;
            color: #A94442;
            border: 1px solid #EBCCD1;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Rate your experience</h1>
    <?php echo $message; ?>
    <form action="" method="POST">
        <label for="feedbackEmail">Email:</label>
        <input type="text" id="feedbackEmail" name="feedbackEmail" placeholder="Enter your email here">
        <br><br>

        <label for="inputText">We highly value your feedback! <br> Kindly take a moment to rate your experience and provide us with your valuable feedback.</label>
        <br><br>
        <textarea id="inputText" name="inputText" placeholder="Tell about your experience!" rows="4" cols="50"></textarea>
        <br><br>
        <button type="submit" name="submit">Submit</button>
    </form>
</div>
</body>
</html>
