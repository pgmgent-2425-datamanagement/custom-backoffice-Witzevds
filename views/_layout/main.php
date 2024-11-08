<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' ' . $_ENV['SITE_NAME'] ?></title>
    <link rel="stylesheet" href="/css/main.css?v=<?php if ($_ENV['DEV_MODE'] == "true") {
                                                        echo time();
                                                    }; ?>">
</head>

<body>
    <div class="brand">BrandName</div>

    <nav>
        <a href="/">Home</a>
        <a href="/beers">beers</a>
        <a href="/reviews">reviews</a>
        <a href="/beers/add">add beer</a>
    </nav>

    <main>
        <?= $content; ?>
    </main>

    <footer>
        &copy; <?= date('Y'); ?> - Beer Viewer
    </footer>
</body>

</html>