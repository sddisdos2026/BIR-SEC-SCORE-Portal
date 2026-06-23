<?php
// success.php
session_start();

$ref = $_SESSION['last_ref'] ?? null;
unset($_SESSION['last_ref']);

// Prepare the next token for a new issuance
$_SESSION['issue_token'] = bin2hex(random_bytes(16));
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Reference Issued</title></head>
<body>
  <h1>Reference Issued</h1>
  <?php if ($ref): ?>
    <p>New reference: <strong><?php echo htmlspecialchars($ref, ENT_QUOTES); ?></strong></p>
  <?php else: ?>
    <p>No new reference generated in this session.</p>
  <?php endif; ?>
  <p><a href="form.php">Generate another</a></p>
</body>
</html>