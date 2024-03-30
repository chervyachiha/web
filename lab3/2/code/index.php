<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>настюхинс</title>
</head>
<body>
<h1>lab3.2</h1>
<div id="text_analys">
    <?php
    $word = "0";
    $symbols = "0";
    $text = "";

    if (isset($_POST['count_button']) && isset($_POST['text']))
    {
        $text = $_POST['text'];
        $matches = array();

        $regexp = '/\S+/ui';
        $word = (string)preg_match_all($regexp, $text, $matches);

        $regexp = '/./ui';
        $symbols = (string)preg_match_all($regexp, $text, $matches);
    }
    ?>

    <form method="post">
        <textarea name="text" rows="5"></textarea>
        <input type="submit" name="count_button" value="Click">
        <p><?=$word?> слов и <?=$symbols?> символов в тексте найдено</p>
    </form>

</div>
</body>
</html>