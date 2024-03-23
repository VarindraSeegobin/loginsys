<?php 
    session_start();
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Admin Credentials</title>
</head>
<body>
    <form method="post" action = "createadmin.php">
        <h2> Enter your admin first name</h2>
        <input type = "text" name = "admin_first_name" placeholder = "Enter your admin first name."> <br><br>

        <h2> Enter your admin last name</h2>
        <input type = "text" name = "admin_last_name" placeholder = "Enter your admin last name."> <br><br>

        <h2> Enter your admin email</h2>
        <input type = "email" name = "admin_email" placeholder = "Enter your admin email."> <br><br>

        <h2> Enter your admin password</h2>
        <input type = "password" name = "admin_password" placeholder = "Enter your admin password."> <br><br>

        <input type = "submit" name = "admin_submission" value = "Create Admin">
    </form>
</body>
</html>

<?php
    if (isset($_POST["admin_submission"])) {
        $admin_first_name = filter_var($_POST["admin_first_name"],FILTER_SANITIZE_SPECIAL_CHARS);
        $admin_last_name = filter_var($_POST["admin_last_name"],FILTER_SANITIZE_SPECIAL_CHARS);
        $admin_email = filter_var($_POST["admin_email"],FILTER_SANITIZE_SPECIAL_CHARS);
        $admin_password = filter_var($_POST["admin_password"],FILTER_SANITIZE_SPECIAL_CHARS);

        $admin_password_hash = password_hash($admin_password, PASSWORD_DEFAULT);
        

        $admin_insert_query = "INSERT INTO `admins` (`first_name`,`last_name`,`email`,`password`) VALUES ('$admin_first_name','$admin_last_name','$admin_email','$admin_password_hash')";

        if (mysqli_query($connection,$admin_insert_query)) {
            echo "Admin created successfully.";
            echo "<a href = index.php> Login Here! </a>";
        }
        else {
            echo "Admin creation failed.";
        }
    }
?>
