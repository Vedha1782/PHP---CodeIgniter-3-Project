<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Database Error</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        .box { border: 1px solid #d00; padding: 20px; border-radius: 5px; }
        h2 { color: #d00; }
    </style>
</head>
<body>
    <div class="box">
        <h2>A Database Error Occurred</h2>
        <p><?php echo $heading; ?></p>
        <p><?php echo $message; ?></p>
    </div>
</body>
</html>
