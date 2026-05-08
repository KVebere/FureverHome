<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FureverHome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="top-nav">
        <button id="menuToggle"
                aria-controls="sideNav"
                aria-expanded="false">
            ☰ Menu
        </button>
    </nav>

    <aside class="side-nav" id="sideNav" aria-hidden="true">
        <button class="close-btn" aria-label="Close menu">✕</button>

        <a class = "side-href" href="/profile">Profile</a>
        <a class = "side-href" href="/savedMatches">Saved Matches</a>
    </aside>

    <?php echo $slot; ?>


    <nav class="bottom-nav">
        <a href="/match">Match</a>
        <a href="/home">Home</a>
        <a href="/discover">Discover</a>
    </nav>

</body>

</html>
