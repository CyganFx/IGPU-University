<?php session_start();
require 'connection.php';
require 'sweetAlertFunctions.php';
require 'update_profile.php';
//shortening
$data = $_POST;
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$first_name = $_SESSION['first_name'];
$surname = $_SESSION['surname'];
$email = $_SESSION['email'];
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
  <title><?= $_SESSION['username'] . " profile" ?></title>
</head>

<header class="header">
  <nav class="nav">
    <div class="header__logo">
      <a href="Final.php">IGP<span style="color: #fce38a;">U</span></a>
    </div>
    <ul id="scroll-bar" class="scroll-bar">
      <li onclick="toggleNavBar()"><a class="nav__link" href="#about_page">About</a></li>
      <li onclick="toggleNavBarAndHref()"><a class="nav__link" href="#our_staff_image" id="link_staff">Staff</a></li>
      <li onclick="toggleNavBar()"><a class="nav__link" href="#educational_programs">Educational Programs</a></li>
      <li onclick="toggleNavBar()"><a class="nav__link" href="#news">News</a></li>
      <li onclick="toggleNavBar()"><a class="nav__link" href="#contacts">Contacts</a></li>
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
    <form method="post">
      <div class="image-container">
        <figure class="avatar"></figure>
        <figcaption class="title">
          <input type="text" name="username" placeholder="Type your username" value="<?= $_SESSION['username'] ?>" />
        </figcaption>
      </div>
      <article class="main-container">
        <p><i class="fa fa-id-card-o info"></i><?= $_SESSION['first_name'] . ' ' . $_SESSION['surname'] ?></p>
        <p>
          <i class="fa fa-book info"></i>
          <select name="house">
            <option value="Unknown">Select house</option>
            <option value="engineer">Engineer</option>
            <option value="programmer">Programmer</option>
            <option value="business">Business</option>
          </select>
        </p>
        <p>
          <i class="fa fa-calendar-o info"></i>
          <input type="date" name="birth_date" placeholder="Type your birth date" value="<?= @$_SESSION['birth_date'] ?>" />
        </p>
        <p>
          <i class="fa fa-envelope info"></i>
          <input type="text" name="email" placeholder="Type your email" value="<?= @$_SESSION['email'] ?>" />
        </p>
        <p>
          <i class="fa fa-phone info"></i>
          <input type="text" name="mobile_number" placeholder="Type your number" value="<?= @$_SESSION['mobile_number'] ?>" />
        </p>
        <p>
          <i class="fa fa-info info"></i>
          <textarea name="info" rows="5" cols="40" placeholder="Type brief info about yourself"><?= @$_SESSION['info'] ?></textarea>
        </p>
        <hr />
      </article>
      <button type="submit" class="btn btn-info logout" name="save">Save</button>
    </form>
  </section>

  <script src="profile.js"></script>
</body>

</html>