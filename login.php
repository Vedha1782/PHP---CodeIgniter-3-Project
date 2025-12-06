<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container col-md-4">
    <h3>Sign In</h3>
    <?php if($this->session->flashdata('error')): ?>
      <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
    <form method="post" action="<?php echo site_url('auth/login_submit'); ?>">
      <div class="mb-2">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>
      <div class="mb-2">
        <label>Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-primary">Login</button>
      <a href="<?php echo site_url('auth/register'); ?>" class="btn btn-link">Register</a>
    </form>
  </div>
</body>
</html>
