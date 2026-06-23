<?php
session_start();

function getPdo(): PDO {
    // TODO: Update DSN/credentials accordingly
    $dsn  = 'mysql:host=localhost;dbname=test;charset=utf8mb4;port=3307';
    $user = 'root';
    $pass = '';

    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    return $pdo;
}

/**
 * Returns the next sequence for the given prefix and current year.
 * Format: {PREFIX}{YYYY}-{#####}, e.g., "RR1-SEC2026-00001"
 *
 * @param PDO    $pdo
 * @param string $prefix e.g., 'RR1-SEC'
 * @param int    $pad    number of digits to pad (default 5)
 * @return array ['prefix'=>..., 'year'=>YYYY, 'seq'=>N, 'ref'=>string]
 */

function nextYearlySequence(PDO $pdo, string $prefix, int $pad = 5): array {
    $year = (int)date('Y');

    $pdo->beginTransaction();
    try {
        // Ensure row exists for this (prefix, year)
        $stmt = $pdo->prepare(
            "INSERT INTO yearly_counters (prefix, year, last_value)
             VALUES (:pfx, :yr, 0)
             ON DUPLICATE KEY UPDATE last_value = last_value"
        );
        $stmt->execute([':pfx' => $prefix, ':yr' => $year]);

        // Lock the row, then increment atomically
        $stmt = $pdo->prepare(
            "SELECT last_value FROM yearly_counters
             WHERE prefix = :pfx AND year = :yr
             FOR UPDATE"
        );
        $stmt->execute([':pfx' => $prefix, ':yr' => $year]);
        $row = $stmt->fetch();

        $next = (int)$row['last_value'] + 1;

        $stmt = $pdo->prepare(
            "UPDATE yearly_counters
             SET last_value = :next
             WHERE prefix = :pfx AND year = :yr"
        );
        $stmt->execute([':next' => $next, ':pfx' => $prefix, ':yr' => $year]);

        $pdo->commit();

        $padded = str_pad((string)$next, $pad, '0', STR_PAD_LEFT);
        $ref    = "{$prefix}-SEC{$year}-{$padded}";

        return [
            'prefix' => $prefix,
            'year'   => $year,
            'seq'    => $next,
            'ref'    => $ref,
        ];
    } catch (Throwable $e) {
        $pdo->rollBack();
        throw $e;
    }
}

$prefix = trim((string)($_POST['prefix'] ?? ''));
// $prefix = 'RR2';
// echo $prefix;

// (Optional) Server-side validation for prefix (length, allowed chars)
if ($prefix === '' || strlen($prefix) > 32) {
    http_response_code(422);
    exit('Invalid prefix.');
}

$pdo = getPdo();
$seq = nextYearlySequence($pdo, $prefix, 5);

// Save generated ref for display after redirect
$_SESSION['last_ref'] = $seq['ref'];

header('Location: form.php');
exit;
?>
