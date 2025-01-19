<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
</head>

<body>
  <h2>Form Login</h2>

  <?php if ($this->session->flashdata('error')): ?>
    <script>
      alert('<?php echo $this->session->flashdata('error'); ?>')
    </script>
  <?php endif; ?>

  <form action="<?php echo site_url('Login/otentikasi'); ?>" method="get">
    <label for="inputUsername">Username</label>
    <input type="text" id="inputUsername" name="inputUsername" required autofocus>
    <br>
    <label for="inputPassword">Password</label>
    <input type="password" id="inputPassword" name="inputPassword" required>
    <button type="submit">Login</button>
  </form>
</body>

</html>