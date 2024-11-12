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

    <link rel="stylesheet" href="/css/reset.css?v=<?php if ($_ENV['DEV_MODE'] == "true") {
                                                        echo time();
                                                    }; ?>">
</head>

<body>


    <nav class="header">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/beers">beers</a></li>
            <li><a href="/reviews">reviews</a></li>
            <li><a href="/beers/add">add beer</a></li>
            <li><a href="/breweries">breweries</a></li>

        </ul>

    </nav>

    <main>
        <?= $content; ?>
    </main>

</body>

</html>