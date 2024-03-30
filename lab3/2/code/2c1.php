<?php
session_start();
if (isset($_GET))
    $_SESSION['input'] = $_GET;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="get">
    <label>
        имя <input type="text" name="name"><br>
    </label>
    <label>
        возраст <input type="text" name="age"><br>
    </label>
    <label>
        зарплата <input type="text" name="salary"><br>
    </label>
    <label>
        фамилия <input type="text" name="surname"><br>
    </label>
    <label>
        профессия <input type="text" name="profesion"><br>
    </label>
    <input type="submit" value="сохранить">
</form>
<a href="2c2.php"><button>на другую страницу</button></a>
</body>
</html>