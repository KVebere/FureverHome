<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FureverHome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="top-nav">
        <!-- <a href="/"><img src="/images/logo.png" alt="FureverHome Logo"></a> -->
        <button class="menu-button">Menu</button>
    </nav>

    <?php echo $slot; ?>


    <nav class="bottom-nav">
        <a href="/match">Match</a>
        <a href="/">Home</a>
        <a href="/discover">Discover</a>
    </nav>

</body>

</html>
