<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' ' . $_ENV['SITE_NAME'] ?></title>

    <link rel="stylesheet" href="/css/reset.css">

    <link rel="stylesheet" href="/css/main.css">
</head>

<body>
    <div class="header">
        <nav class="header__nav">
            <div class="nav"></div>
            <a href="/">Home</a>
            <a href="/events">Events</a>
            <a href="/users">Users</a>
            <a href="/locations">locations</a>
            <a href="/tickets">tickets</a>
            <a href="/dashboard">dashboard</a>
        </nav>
        <div class="header__profile">
            <a href="/users/<?= $_SESSION['user_id'] ?? '' ?>">
                <?= htmlspecialchars($_SESSION['user_name'] ?? 'Guest') ?>
            </a>


        </div>
    </div>

    <main>
        <?= $content; ?>
    </main>


</body>

</html>