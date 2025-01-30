<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>

  <div class="container mt-5 p-5 col-10 col-md-6 col-lg-4 col-xl-3">
    <form action="login/validate" method="post" class="form-signin">

      <!--header  -->
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <!-- labels and input fields -->
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

      <!-- submit button -->
      <button name="submit" class="btn btn-lg btn-primary btn-block mt-5" type="submit">Sign in</button>
      <p class="mt-3">
        Don't have an account?
        <a href="register.php" class="text-primary">Create one</a>
      </p>
    </form>

</body>