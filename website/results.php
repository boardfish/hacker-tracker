<?php require_once __DIR__ . "/vendor/autoload.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Hacker Tracker Results page</title>
</head>
<body>
    <?php
    for ($i = 1; $i <= 4; $i++):
    ?>
    <p><?= $_POST["teammate{$i}"]; ?></p>
    <?php
    endfor;
    ?>
</body>
</html>
