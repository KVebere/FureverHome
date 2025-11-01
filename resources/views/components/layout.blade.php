<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    
    <nav class="top-nav">
        <!-- <a href="/"><img src="/images/logo.png" alt="FureverHome Logo"></a> -->
        <button class="menu-button">Menu</button>
    </nav>

    <?php echo $slot; ?>

    
    <nav class="bottom-nav">
        <button>Match</button>
        <button>Home</button>
        <button>Discover</button>
    </nav>

</body>

</html>