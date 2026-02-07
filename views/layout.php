<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <title>Fryzjero <?php echo isset($title) ? " &bull; $title" : ""; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BASE_URL; ?>/home">Fryzjero</a>
      <div class="navbar-nav ms-auto"> <a class="nav-link" href="<?php echo BASE_URL; ?>/home">Strona główna</a>
    
   <?php if (isset($_SESSION['user_id'])): ?>
    <span class="nav-link text-warning">Witaj, <?php echo $_SESSION['user_name']; ?>!</span>
    
    <a class="nav-link" href="<?php echo BASE_URL; ?>/booking/index">Moje Rezerwacje</a>
    
    <?php if ($_SESSION['user_role'] === 'admin'): ?>
        <a class="nav-link" href="<?php echo BASE_URL; ?>/admin">Panel Admina</a>
    <?php endif; ?>

    <a class="nav-link btn btn-outline-light btn-sm mx-2" href="<?php echo BASE_URL; ?>/logout">Wyloguj</a>
    <?php else: ?>
        <a class="nav-link" href="<?php echo BASE_URL; ?>/login">Logowanie</a>
        <a class="nav-link" href="<?php echo BASE_URL; ?>/register">Rejestracja</a>
    <?php endif; ?>
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