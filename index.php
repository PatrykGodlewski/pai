<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 500px; margin: 50px auto; padding: 20px; }
        h1 { margin-bottom: 1em; }
        ul { list-style: none; padding: 0; }
        li { margin: 0.5em 0; }
        a { display: inline-block; padding: 10px 16px; background: #333; color: white; text-decoration: none; border-radius: 4px; }
        a:hover { background: #555; }
    </style>
</head>
<body>
    <h1>Home</h1>
    <p>Select an app:</p>
    <ul>
        <?php
        $dirs = array_filter(glob('*'), function ($item) {
            return is_dir($item) && $item !== '.' && $item !== '..' && $item[0] !== '.';
        });
        sort($dirs);
        foreach ($dirs as $dir):
            $url = htmlspecialchars($dir);
        ?>
        <li><a href="/<?= $url ?>/"><?= htmlspecialchars($dir) ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
