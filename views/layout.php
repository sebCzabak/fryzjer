<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/fryzjer/public/css/style.css">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/fryzjer/home">Fryzjero</a>
        <div class="navbar-nav">
            <a class="nav-link" href="/fryzjer/services">Usługi</a>
            <a class="nav-link" href="/fryzjer/login">Logowanie</a>
        </div>
    </div>
</nav>

<main class="container">
    <?php echo $content; ?>
</main>

<footer class="text-center mt-5 py-5 border-top">
    &copy; 2026 System Rezerwacji Fryzjerskich
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>