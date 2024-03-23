<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ponte-Diller Admin System</title>
</head>
<body>
    <h1>Welcome to the Ponte-Diller Admin System</h1>
    <p>Hi, <?php echo $_SESSION["username"]; ?>. You are now logged in.</p>
    <a href="logout.php">Logout</a>
</body>
</html>