<?php
// form.php
session_start();

$ref = $_SESSION['last_ref'] ?? null;
unset($_SESSION['last_ref']);

// Prepare the next token for a new issuance
$_SESSION['issue_token'] = bin2hex(random_bytes(16));
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Generate Reference</title></head>
<body>
  <h1>Generate a New Reference</h1>
  <form method="post" action="issue.php">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token, ENT_QUOTES); ?>">
    <label>
      Prefix:
      <input type="text" name="prefix" value="" required>
    </label>
    <button type="submit">Generate</button>
  </form>

    <?php if ($ref): ?>
    <p>New reference: <strong><?php echo htmlspecialchars($ref, ENT_QUOTES); ?></strong></p>
  <?php else: ?>
    <p>No new reference generated in this session.</p>
  <?php endif; ?>
</body>
</html>

