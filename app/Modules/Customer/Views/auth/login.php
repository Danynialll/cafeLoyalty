<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- SweetAlert2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow p-4" style="width: 100%; max-width: 400px;">
  <h4 class="mb-3 text-center">Login</h4>
  <form id="loginForm">
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" class="form-control" name="username" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" class="form-control" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
  </form>
  <div class="text-center mt-3">
    <a href="/customer/register">Don't have an account? Register</a>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    fetch('/customer/loginHandle', {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      },
      body: formData
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        Swal.fire({
          icon: 'success',
          title: 'Login Successful',
          text: data.message
        }).then(() => {
          window.location.href = data.redirect || '/customer/dashboard';
        });
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Login Failed',
          text: data.message
        });
      }
    })
    .catch(err => {
      console.error(err);
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'Something went wrong while logging in.'
      });
    });
  });
</script>
</body>
</html>
