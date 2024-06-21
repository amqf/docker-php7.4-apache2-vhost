<?php

define('DB_HOST', getenv('DB_HOST'));
define('DB_NAME', getenv('DB_NAME'));
define('DB_USER', getenv('DB_USER'));
define('DB_PASS', getenv('DB_PASS'));

try {
    $pdo = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;charset=utf8',
            DB_HOST,
            DB_NAME
        ),
        DB_USER,
        DB_PASS
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return [
        'success' => true,
        'data' => $pdo->query('SELECT * FROM users')->fetchAll(PDO::FETCH_ASSOC),
    ];
} catch (PDOException $e) {
    return [
        'success' => false,
        'message' => $e->getMessage(),
    ];
}
