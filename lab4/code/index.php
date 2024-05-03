<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Доска объявлений</title>
</head>
<body>
<h2>Добавить объявление</h2>
<form action="submit.php" method="post">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="title">Заголовок объявления:</label><br>
    <input type="text" id="title" name="title" required><br>

    <label for="category">Категория:</label><br>
    <input type="text" id="category" name="category" required><br><br>
  
    <label for="text">Текст объявления:</label><br>
    <textarea id="text" name="text" rows="4" required></textarea><br>

  
    <input type="submit" value="Добавить">
</form>
</body>
</html>

<?php

require_once "vendor/autoload.php";

use Google\Spreadsheet\DefaultServiceRequest;
use Google\Spreadsheet\ServiceRequestFactory;

function addEntryToGoogleSheet($email, $title, $category, $text)
{
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API PHP');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
    $client->setAccessType('offline');
    $client->setAuthConfig('C:\labs\tablica-422217-8c7720f86b3d.json');

    $service = new Google_Service_Sheets($client);

    $spreadsheetId = '1oKsxv0x_AVvglO7_oRP_srdJsuuvebBViPtSFgcX-hY/edit#gid=0';
    $range = 'FirstSheet';

    $values = [
        [$email, $title, $category, $text]
    ];

    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);

    $params = [
        'valueInputOption' => 'RAW'
    ];

    $result = $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);
    if ($result->getUpdates()->getUpdatedCells() > 0) {
        echo 'успешно добавлено';
    } else {
        echo 'произошла ошибка';
    }
}

$email = $_POST['email'];
$title = $_POST['title'];
$text = $_POST['text'];
$category = $_POST['category'];

addEntryToGoogleSheet($email, $title, $text, $category);
