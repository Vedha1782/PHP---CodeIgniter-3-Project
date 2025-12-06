<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container col-md-4">
    <h3>Register</h3>
    <form method="post" action="<?php echo site_url('auth/register_submit'); ?>">
      <div class="mb-2">
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
      </div>
      <div class="mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-2">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-success">Register</button>
      <a href="<?php echo site_url('auth/login'); ?>" class="btn btn-link">Login</a>
    </form>
  </div>
</body>
</html>
