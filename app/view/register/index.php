<?php
require __DIR__ . '/../head.php';
require __DIR__ . '/../nav.php';
?>

<body>

  <div class="container mt-5 p-5 col-10 col-md-6 col-lg-4 col-xl-3">
    <form action="user/insert" method="post" class="form-signin">

      <!--header  -->
      <h1 class="h3 mb-3 font-weight-normal">Please Register</h1>

      <label for="inputEmail" class="sr-only">Name</label>
      <input type="email" name="inputName" class="form-control" placeholder="Email address" required autofocus>

      <label for="inputName" class="sr-only">Email address</label>
      <input type="text" name="inputName" class="form-control" placeholder="Full Name" required autofocus>
       
      <label for="inputAddress" class="sr-only">Email address</label>
      <input type="text" name="inputAddress" class="form-control" placeholder="Address" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>

      <!-- submit button -->
      <button name="submit" class="btn btn-lg btn-primary btn-block mt-5" type="submit">Sign in</button>
    </form>

</body>