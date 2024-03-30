<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lab3</title>
</head>
<body>
<div id="form">
    <form action="3-2.php" method="post">
        <label for="email">почта</label>
        <input type="email" name="email" required>

        <label for="category">категория</label>
        <?php
        $categories = scandir('category');

        echo '<select name="category" required>';

        foreach ($categories as $category) {
            if (is_dir("category/$category") && $category != '.' && $category != '..') {
                echo "<option value='$category'>$category</option>";
            }
        }

        echo '</select>';
        ?>

        <label for="title">название</label>
        <input type="text" name="title" required>

        <label for="description">описание</label>
        <textarea rows="5" name="description"></textarea>

        <input type="submit" value="сохранить">
    </form>

</div>

<div id="table">
    <table>
        <thead>
        <th>категория</th>
        <th>название</th>
        <th>описание</th>
        <th>почта</th>
        </thead>
        <tbody>
        <?php
        $categories = scandir('category');
        foreach ($categories as $category) {
            if (is_dir("category/$category") && $category != '.' && $category != '..') {
                $subcategories = scandir("category/$category");
                foreach ($subcategories as $subcategory) {
                    if ($subcategory != '.' && $subcategory != '..') {
                        $filePath = "category/$category/$subcategory";
                        $dop = fopen($filePath, 'r');
                        $description = "";
                        $email = "";
                        while ($line = fgets($dop)) {
                            if (filter_var($line, FILTER_VALIDATE_EMAIL)) {
                                $email = $line;
                            } else {
                                $description .= $line;
                            }
                        }
                        fclose($dop);

                        echo '<tr>';
                        echo "<td>$category</td>";
                        echo "<td>".substr($subcategory, 0, strlen($subcategory) - 4)."</td>";
                        echo "<td>$description</td>";
                        echo "<td>$email</td>";
                        echo '</tr>';
                    }
                }
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>