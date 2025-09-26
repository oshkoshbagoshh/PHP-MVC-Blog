<?php
declare(strict_types=1);

// Load Composer autoload
require __DIR__ . '/../vendor/autoload.php';

/// Load environment variable from .env if available
$dotenvLoaded = false;
if (class_exists(\Dotenv\Dotenv::class)) {
    $envPath = dirname(__DIR__);
    if (file_exists($envPath . '/.env')) {
        \Dotenv\Dotenv::createImmutable($envPath)->safeLoad();
        $dotenvLoaded = true;
    }
}


// Basic env helpers with sensible defaults
$env = static fn(string $key, ?string $default = null) => $_ENV[$key] ?? getenv($key) ?: $default;

// Configure PostgreSQL connection
$driver = $env('DB_CONNECTION', 'pgsql');
if ($driver !== 'pgsql') {
    fwrite(STDERR, "Warning: DB_CONNECTION is '{$driver}', but this seeder expects 'pgsql'. Proceeding anyway...\n ");
}

$host = $env('DB_HOST', '127.0.0.1');
$port = $env('DB_PORT', '5432');
$db = $env('DB_DATABASE', 'blog');
$user = $env('DB_USERNAME', 'postgres');
$pass = $env('DB_PASSWORD', '');

$dsn = "pgsql:host={$host};port={$port};dbname={$db}";

$seedFile = __DIR__ . '/../src/Database/seed.sql';
if (!file_exists($seedFile)) {
    fwrite(STDERR, "Seed file not found at: {$seedFile}\n");
    exit(1);
}

$sql = file_get_contents($seedFile);
if ($sql === false || trim($sql) === '') {
    fwrite(STDERR, "Seed file is empty or unreadable: {$seedFile}\n");
    exit(1);
}

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);

    // Start transaction if possible
    $pdo->beginTransaction();
    $pdo->exec($sql);
    $pdo->commit();

    echo "Database seeding completed successfully.\n";
    if ($dotenvLoaded) {
        echo "(Loaded env from .env)\n";
    }
    exit(0);
} catch (Throwable $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    fwrite(STDERR, "Seeding failed: " . $e->getMessage() . "\n");
    exit(1);
}