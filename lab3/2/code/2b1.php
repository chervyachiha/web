<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>данные пользователя</title>
</head>
<body>
<h1>данные пользователя</h1>
<p>фамилия: <?php echo $_SESSION["surname"]; ?></p>
<p>имя: <?php echo $_SESSION["name"]; ?></p>
<p>возраст: <?php echo $_SESSION["age"]; ?></p>
</body>
</html>