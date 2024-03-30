<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["surname"] = $_POST["surname"];
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["age"] = $_POST["age"];
    header("Location: 2b1.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
</head>
<body>
<form method="post">
    фамилия: <input type="text" name="surname"><br>
    имя:     <input type="text" name="name"><br>
    возраст: <input type="text" name="age"><br>
    <input type="submit" value="данные">
</form>
</body>
</html>