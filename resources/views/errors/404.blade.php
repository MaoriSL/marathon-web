<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>404</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- boxicons -->
    <link rel="stylesheet" href="https://boxicons.com/css/boxicons.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    @vite(["resources/css/normalize.css", 'resources/css/app.css', 'resources/js/app.js', 'resources/css/404.css'])
</head>

<body>
    <main>
        <div class="text">
            <h1>404</h1>
            <h2>Somthings gone missing ...</h2>
            <a href="{{ route('index') }}">Back to home</a>
        </div>
        <div class="img">
        </div>
    </main>

</body>

</html>