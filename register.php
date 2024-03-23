<?php 
    session_start();
    include ("database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponte-Diller Admin Creation System</title>
</head>
<body>
    <form method = "post" action = "register.php">
        <h2>Enter the following details to verify that you can create a user account.</h2>
        <input type = "password" name = "verification_password" placeholder = "Enter the verification password."> <br><br>
        <input type = "submit" name = "verification_submission" value = "Check Access">
    </form>
</body>
</html>

<?php 
    if (isset($_POST["verification_submission"])) {
        $verification_pass = filter_var($_POST["verification_password"],FILTER_SANITIZE_SPECIAL_CHARS);
        echo $verification_pass . "<br>";
        //send this verification pass through the hasing algorithm and look it up and return the id of the password.
        //if the id is 1, then the user is verified. else, the user is not verified.
        $verification_query = mysqli_query($connection,"SELECT * FROM `admins` WHERE `id` = 1") -> fetch_assoc();
        echo $verification_query["password"] . "<br>";
        if (password_verify($verification_pass,$verification_query["password"])) {
            echo "You are verified.";
            header("Location: createadmin.php");
        }
        else {
            echo "You are not verified.";
        }
    }
?>