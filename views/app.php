<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= config('title') ?></title>

    <link rel="icon" type="image/svg+xml" href="/icon.svg" />
    <link rel="icon" href="/icon.ico" sizes="any">

    <link rel="manifest" href="/manifest.json" />
    
    <link rel="stylesheet" href="/css/base" />
    <link rel="stylesheet" href="/css/colors" />
    <link rel="stylesheet" href="/css/snippets" />
    <link rel="stylesheet" href="/css/components" />
    <link rel="stylesheet" href="/css/button" />
    <link rel="stylesheet" href="/css/form" />
</head>

<body>
    <main class="<?= auth() ? 'simplified' : '' ?>">
        <?= $slot ?>
    </main>
</body>

</html>