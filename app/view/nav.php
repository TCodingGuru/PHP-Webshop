<nav class="navbar navbar-expand navbar-dark bg-dark">
  <div class="container">

    <!-- Navbar items left -->
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/product">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart/index">Cart</a>
        </li>
      </ul>
    </div>

    <!-- Navbar items right -->
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ms-auto">

        <!-- only clickable when logged in -->
        <li class="nav-item">
          <?php if (isset($_SESSION['logged_User']) && isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
            <a class="nav-link" href="/admin">Admin</a>
          <?php } else { ?>
            <a class="nav-link disabled" href="#">Admin</a>
          <?php } ?>
        </li>

        <!-- when logged in, show logout butten and reverse -->
        <li class="nav-item">
          <?php if (!isset($_SESSION['logged_User'])) { ?>
            <a class="nav-link" href="/login">Login</a>
          <?php } else { ?>
            <a class="nav-link" href="/login/logout">Logout</a>
          <?php } ?>
        </li>
      </ul>
    </div>

  </div>
</nav>