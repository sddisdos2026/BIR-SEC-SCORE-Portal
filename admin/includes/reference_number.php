<?php

$dsn = "mysql:host=localhost;dbname=test;charset=utf8mb4;port=3307";
    $user = "root";
    $pass = "";
    
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    $revenue_region = $row['revenue_region'];

    $now  = new DateTime("now", new DateTimeZone("Asia/Manila"));
    $year = (int)$now->format('Y');

    try {
        $pdo->beginTransaction();

        // Lock the row for this year + prefix (prevents duplicate refs under concurrency)
        $select = $pdo->prepare("
            SELECT last_value
            FROM ref_sequences
            WHERE seq_year = :y AND prefix = :p
            FOR UPDATE
        ");
        $select->execute([':y' => $year, ':p' => $revenue_region]);
        $row = $select->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $next = (int)$row['last_value'] + 1;

            $update = $pdo->prepare("
                UPDATE ref_sequences
                SET last_value = :v
                WHERE seq_year = :y AND prefix = :p
            ");
            $update->execute([':v' => $next, ':y' => $year, ':p' => $revenue_region]);
        } else {
            // First value for this year+prefix => start at 1
            $next = 1;

            $insert = $pdo->prepare("
                INSERT INTO ref_sequences (seq_year, prefix, last_value)
                VALUES (:y, :p, :v)
            ");
            $insert->execute([':y' => $year, ':p' => $revenue_region, ':v' => $next]);
        }

        $pdo->commit();

        // Format: PREFIX-MIDTEXTYYYY-00001
        $counter = str_pad((string)$next, 5, "0", STR_PAD_LEFT);
        $output = "{$revenue_region}-SEC{$year}-{$counter}";
        // echo $output;

    } catch (Throwable $e) {
        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }
        throw $e;
    }
?>