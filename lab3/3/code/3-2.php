<?php
function redirectToHome(): void
{
    header('Location: /');
    exit();
}

if (false === isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description']))
{
    redirectToHome();
}

$category = $_POST['category'];
$title = $_POST['title'];
$description = $_POST['description']."\n".$_POST['email'];

$filePath = "category/{$category}/{$title}.txt";

if (false === file_put_contents($filePath, $description))
{
    throw new Exception("что-то не так");
}
chmod($filePath, 0777);
redirectToHome();