<?php 
    session_start();
    include ("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First PHP PAge :D</title>
</head>
<body>
    <form action = "index.php" method = "post">
        <h1>Ponte-Diller SALS</h1>
        <input type = "text" name = "username" placeholder="Enter Your email."> <br><br>
        <input type = "password" name = "password" placeholder = "Enter Your Password."> <br>
        <p>Don't have an account? <a href="register.php">Register Here</a></p>

        <input type="submit" name="submission">
    </form>
</body>
</html>
<?php
    if (isset($_POST["submission"])) {
        $username = filter_input(INPUT_POST, "username",FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password",FILTER_SANITIZE_SPECIAL_CHARS);
        //lookup email and password in database, if they match log in.
        $existence_query = "select * from admins where email = \"$username\"";
        $existence_result = mysqli_query($connection,$existence_query);
        if (password_verify($password,$existence_result -> fetch_assoc()["password"])) {
            $_SESSION["username"] = $username;
            header("Location: welcome.php");
        }
        else {
            echo "Invalid username or password.";
        }
    }


    
?>