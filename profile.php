<?php session_start();
require 'connection.php';
require 'sweetAlertFunctions.php';

//shortening
$data = $_POST;
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$first_name = $_SESSION['first_name'];
$surname = $_SESSION['surname'];
$email = $_SESSION['email'];

if (isset($data['logout'])) {
  swalLogout($username); //destroys session
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="profile_css.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="icon" href="images/title_logo.png"> -->
  <title><?= $username . " profile" ?></title>
</head>

<header class="header">
  <nav class="nav">
    <div class="header__logo">
      <a href="Final.php">IGP<span style="color: #fce38a;">U</span></a>
    </div>
    <ul id="scroll-bar" class="scroll-bar">
      <li onclick="toggleNavBar()"><a class="nav__link" href="Final.php#about_page">About</a></li>
      <li onclick="toggleNavBarAndHref()"><a class="nav__link" href="#our_staff_image" id="link_staff">Staff</a></li>
      <li onclick="toggleNavBar()"><a class="nav__link" href="Final.php#educational_programs">Educational Programs</a></li>
      <li onclick="toggleNavBar()"><a class="nav__link" href="Final.php#news">News</a></li>
      <li onclick="toggleNavBar()"><a class="nav__link" href="Final.php#contacts">Contacts</a></li>
      <?php if (!isset($_SESSION['username'])) : ?>
        <li onclick="toggleNavBar()"><a class="nav__link" href="registration.php">Sign Up</a></li>
        <li onclick="toggleNavBar()"><a class="nav__link" href="login.php">Login</a></li>
      <?php else : ?>
        <li onclick="toggleNavBar()"><a class="nav__link" href="profile.php"><?= $_SESSION['username'] ?></a></li>
      <?php endif; ?>
    </ul>
    <div class="scroll-navbar-button" id="scroll-navbar-button" onclick="toggleNavBar()">
      <i class="fa fa-bars"></i>
    </div>
  </nav>
</header>

<body>
  <section class="profile-card">
    <div class="image-container">
      <figure class="avatar"></figure>
      <figcaption class="title">
        <h2><?= $username ?></h2>
      </figcaption>
    </div>
    <article class="main-container">
      <p><i class="fa fa-id-card-o info"></i><?= $first_name . ' ' . $surname ?></p>
      <p><i class="fa fa-book info"></i>
        <?php if (!isset($_SESSION['house']) || empty(trim($_SESSION['house']))) : ?>
          Unknown
        <?php else :
          echo $_SESSION['house'];
        endif; ?>
      </p>
      <p>
        <i class="fa fa-calendar-o info"></i>
        <?php if (!isset($_SESSION['birth_date']) || empty(trim($_SESSION['birth_date']))) : ?>
          Unknown
        <?php else :
          echo $_SESSION['birth_date'];
        endif; ?>
      </p>
      <p><i class="fa fa-envelope info"></i><?= $email ?></p>
      <p>
        <i class="fa fa-phone info"></i>
        <?php if (!isset($_SESSION['mobile_number']) || empty(trim($_SESSION['mobile_number']))) : ?>
          Unknown
        <?php else :
          echo $_SESSION['mobile_number'];
        endif; ?>
      </p>
      <p>
        <i class="fa fa-info info"></i>
        <?php if (!isset($_SESSION['info']) || empty(trim($_SESSION['info']))) : ?>
          Unknown
        <?php else :
          echo $_SESSION['info'];
        endif; ?>
      </p>
      <hr />
    </article>

    <footer class="footer">
      <form method="post">
        <button type="submit" class="btn btn-secondary logout" name="logout">Logout</button>
      </form>
      <form action="edit_profile.php" method="post">
        <button type="submit" class="btn btn-info edit" name="edit">Edit</button>
      </form>
      <button class="btn btn-warning comments" onclick="window.location.href='comments.php'">Comments</button>
    </footer>
  </section>

  <script src="profile.js"></script>
</body>

</html>