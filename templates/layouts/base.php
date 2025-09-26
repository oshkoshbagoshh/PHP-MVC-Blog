<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->section('title', 'My Blog') ?></title>

    <!-- Your Custom CSS -->
    <link rel="stylesheet" href="/public/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <?= $this->section('stylesheets') ?>
</head>
<body>
<header class="header">
    <nav class="navbar">
        <a href="/" class="logo"><?= $this->e($site_name ?? "My Site") ?></a>
        <ul class="nav-links">
            <li><a href="/" class="<?= $_SERVER['REQUEST_URI'] === '/' ? 'active' : '' ?>">Home</a></li>
            <li><a href="/posts"
                   class="<?= str_contains($_SERVER['REQUEST_URI'], 'posts') ? 'active' : '' ?>">Posts</a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <?php if ($_SESSION['user']['role'] === 'admin'): ?>
                    <li><a href="/admin">Dashboard</a></li>
                <?php endif; ?>
                <li><a href="/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="/login">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main class="container">
    <!-- Flash Messages -->
    <?php if (isset($_SESSION['flash_messages'])): ?>
        <?php foreach ($_SESSION['flash_messages'] as $type => $messages): ?>
            <?php foreach ($messages as $message): ?>
                <div class="alert alert-<?= $this->e($type) ?>">
                    <?= $this->e($message) ?>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <?php unset($_SESSION['flash_messages']); ?>
    <?php endif; ?>

    <?= $this->section('content') ?>
</main>

<footer class="card" style="margin-top: 3rem;">
    <div class="card-body" style="text-align: center; background: var(--dark-bg); color: white;">
        <?= $current_year = Date('Y');
        $this->section('footer',
                '<p>&copy; ' . $current_year ?? $current_year = Date('Y') . ' ' . '. All rights reserved.</p>') ?>
    </div>
</footer>

<?= $this->section('javascript') ?>
</body>
</html>
