<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out.</title>
</head>
<body>
    <h2>You have logged out successfully.</h2><br>
    <a href="index.php">Login Again</a>
</body>
</html>
<?php
    session_destroy();
?>