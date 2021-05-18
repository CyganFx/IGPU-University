<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Comment System using PHP and Ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="profile_css.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    .panel-footer {
      display: flex;
      flex-direction: row-reverse;
    }
  </style>
</head>

<body>
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
  <h1 align="center" style="margin-top: 10rem">Welcome to IGPU Chat</h1>
  <br />
  <div class="container">
    <form method="POST" id="comment_form">
      <div class="form-group">
        <h3 class=form-control><?= htmlentities($_SESSION['username']) ?></h3>
        <input type="hidden" name="comment_name" id="comment_name" class="form-control" value="<?= htmlentities($_SESSION['username']) ?> " />
      </div>
      <div class="form-group">
        <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
      </div>
      <div class="form-group">
        <input type="hidden" name="comment_id" id="comment_id" value="0" />
        <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
      </div>
    </form>
    <span id="comment_message"></span>
    <br />
    <div id="display_comment"></div>
  </div>
  <!-- Toastr Alert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>


</html>

<script>
  $(document).ready(function() {

    $('#comment_form').on('submit', function(event) {
      event.preventDefault();
      var form_data = $(this).serialize();
      $.ajax({
        url: "add_comment.php",
        method: "POST",
        data: form_data,
        dataType: "JSON",
        success: function(data) {
          if (data.error != '') {
            $('#comment_form')[0].reset();
            $('#comment_message').html(data.error);
            $('#comment_id').val('0');
            load_comment();
          }
        }
      })
    });

    load_comment();

    function load_comment() {
      $.ajax({
        url: "fetch_comment.php",
        method: "POST",
        success: function(data) {
          $('#display_comment').html(data);
        }
      })
    }

    $(document).on('click', '.reply', function() {
      var comment_id = $(this).attr("id");
      $('#comment_id').val(comment_id);
      $('#comment_content').focus();
    });

  });
</script>