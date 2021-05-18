<?php
require 'connection.php';
require 'delete_news.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=0.67,maximum-scale=0.67">
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <!-- CSS -->
  <link rel="stylesheet" href="FinalCSS.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Montserrat:400,700&amp;subset=cyrillic-ext" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  <!-- Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" href="images/title_logo.png">

  <title>IGPU</title>
</head>

<body>

  <!-- Header -->

  <header class="header">
    <nav class="nav">
      <div class="header__logo">
        <a href="Final.php">IGP<span style="color: #fce38a;">U</span></a>
      </div>
      <ul id="scroll-bar" class="scroll-bar">
        <li onclick="toggleNavBar()"><a class="nav__link" href="Final.php#about_page">About</a></li>
        <li onclick="toggleNavBarAndHref()"><a class="nav__link" href="Final.php#our_staff_image" id="link_staff">Staff</a></li>
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

  <!-- Main Page with Parallax -->

  <section class="intro">
    <div class="container">
      <article class="intro__inner">
        <h2 class="intro__suptitle lax" data-lax-translate-y="0 1, 300 -70" data-lax-opacity="0 1, 200 0">
          Welcome To</h2>
        <h1 class="intro__title lax" data-lax-translate-y="0 1, 500 -100" data-lax-opacity="0 1, 350 0">
          International Genius People University</h1>
        <a class="btn lax" data-lax-translate-y="0 1, 900 -120" data-lax-opacity="0 1, 500 0" href="#about_page">Learn More</a>
      </article>
    </div>
  </section>

  <!-- Slider -->

  <footer class="slider">
    <div class="container">
      <div class="slider__inner">
        <div class="slider__item active">
          <span class="slider__num">01</span> Quality Education
        </div>
        <div class="slider__item">
          <span class="slider__num">02</span> Student's Life
        </div>
        <div class="slider__item">
          <span class="slider__num">03</span> Prestige
        </div>
        <div class="slider__item">
          <span class="slider__num">04</span> Career
        </div>
      </div>
    </div>
  </footer>

  <!-- Stylish Line -->

  <aside class="line">
    <img src="images/horizontal_line3.svg" alt="horizontal_line" id="horizontal_line">
  </aside>

  <!-- About Page -->

  <section class="about_page" id="about_page">
    <article class="About_us">
      <div class="about_text">
        <h1 class="h1">A few words about us</h1>
        <p>IGP University is devoted to excellence in teaching, learning, and research, and to developing leaders in many disciplines who make a difference globally. This university is established in 2020 to highlight the brightest minds around the world.
          Our 3 year educational system is equivalent to Graduate certificate of Harvard. Ultra modest equipment, laboratory and conditions made for students.
        </p>
      </div>
    </article>
    <aside class="bg_students">
      <img src="images/bg_students.jpg" id="about_student_image">
    </aside>
  </section>

  <!-- Staff -->

  <div class="our_staff_image" id="our_staff_image">
    <img src="images/our_staff_image.jpg" alt="our_staff" style="max-width: 100%;" class="staff_image lax" data-lax-translate-x="0 200, 1700 1617">
  </div>
  <ul class="Staff" id="Staff">
    <li class="item Elon">
      <h1>Elon Musk</h1>
      <img src="images/Elon_Musk.jpg" style="height: 450px; max-width: 100%; border-radius: 50%;" class="staff_img Elon" id="staff_img_Elon">
      <button type="button" class="button Elon_button" id="Elon_button" onclick="displayElon()">Info</button>
      <ul type="disc" id="sub-item">
        <li>
          <p class="description">Mechanical Engineer PhD</p>
        </li>
        <li>
          <p class="description">Director of SpaceX</p>
        </li>
        <li>
          <p class="description">Rocket building Lecturer</p>
        </li>
      </ul>
    </li>
    <li class="item Bill">
      <h1>Bill Gates</h1>
      <img src="images/Bill_Gates.jpg" style="height: 450px; border-radius: 50%;" class="staff_img Bill" id="staff_img_Bill">
      <button type="button" class="button Bill_button" onclick="displayBill()">Info</button>
      <ul type="disc" id="sub-item2">
        <li>
          <p>Software Engineer PhD</p>
        </li>
        <li>
          <p>Director of Microsoft</p>
        </li>
        <li>
          <p>ICT Lecturer</p>
        </li>
      </ul>
    </li>
    <li class="item Jeff">
      <h1>Jeff Bezos</h1>
      <img src="images/Jeff_Bezos2.jpg" style="height: 450px; max-width: 100%; border-radius: 50%;" class="staff_img Jeff" id="staff_img_Jeff">
      <button type="button" class="button Jeff_button" onclick="displayJeff()">Info</button>
      <ul type="disc" id="sub-item3">
        <li>
          <p>Businessman</p>
        </li>
        <li>
          <p>Director of Amazon</p>
        </li>
        <li>
          <p>Economy/Management Lecturer</p>
        </li>
      </ul>
    </li>
  </ul>

  <!-- Educational Programs -->

  <section class="educational_programs" id="educational_programs">
    <div class="foundation"><button type="button" class="apply_button" onclick="window.open('foundation_application.html')">Info</button>
      <p class="educational_program_text">Foundation Program</p>
    </div>
    <div class="bachelor"><button type="button" class="apply_button" onclick="window.open('bachelor_application.html')">Info</button>
      <p class="educational_program_text">Bachelor's Program</p>
    </div>
    <div class="master"><button type="button" class="apply_button" onclick="window.open('master_application.html')">Info</button>
      <p class="educational_program_text">Ultra Master's Program</p>
    </div>
  </section>

  <!-- News -->

  <h1 class="h1" id="news">News</h1>

  <?php
  if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') : ?>
    <form method="post" class="form" id="news_form">
      <div class="news_field">
        <label>Day</label>
        <input type="number" name="add_day" id="add_day" />
      </div>
      <div class="news_field">
        <label>Month</label>
        <input type="text" name="add_month" id="add_month" />
      </div>
      <div class="news_field">
        <label>Description</label>
        <input type="text" name="add_description" id="add_description" />
      </div>
      <button type="button" name="add_news" class="btn news" id="add_news">Add</button>
    </form>
  <?php endif ?>
  <section class="container_news">
    <?php
    $database = new Database();
    $db = $database->getConnection();
    $statement = $db->query("SELECT * FROM news ORDER BY day DESC");
    foreach ($statement as $news) : ?>
      <article class="col">
        <time class="date date_WEB"><?= htmlentities($news['day']) ?> <br /><?= htmlentities($news['month']) ?></time>
        <div class="event_description event_WEB">
          <div class="event_picture_WEB"> </div>
          <p><?= htmlentities($news['description']) ?></p>
          <?php
          if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin') : ?>
            <input type="hidden" name="news_id" value="<?= $news['id'] ?>">
            <button name="edit_button" class="news_button edit_button" onclick="toggleEditForm(<?= $news['id'] ?>, <?= htmlentities($news['day']) ?>, '<?= htmlentities($news['month']) ?>', '<?= htmlentities($news['description']) ?>' )">Edit</button>
            <form method="post">
              <input type="hidden" name="news_id" value="<?= $news['id'] ?>">
              <button name="delete_button" class="news_button delete_button">Delete</button>
            </form>
          <?php endif ?>
        </div>
      </article>
  <?php endforeach ?>
  <form action="edit_news.php" method="post" class="form" id="edit_form"></form>

  <!-- <article class="col">
      <time class="date date_ADS">26 <br /> March</time>
      <div class="event_description event_ADS">
        <div class="event_picture_ADS"> </div>
        <p>Algorithms and Data Structures final exam. 40 questions 60 min, should be easy</p>
      </div>
    </article>
    <article class="col">
      <time class="date date_Math">28 <br /> March</time>
      <div class="event_description event_Math">
        <div class="event_picture_Math"> </div>
        <p>Math final exam. Try not to lose your scholarship challenge begins</p>
      </div>
    </article> -->
  </section>

  <!-- Contacts -->

  <section class="container_contacts" id="contacts">
    <div class="row top"></div>
    <div class="row top2"></div>
    <div class="row r3">
      <div class="row"></div>
      <div class="empty"></div>
      <div class="row text_contacts">
        <p>Rector's E-mail: <br />
          <a href="mailto:d.ishanov@astanait.edu.kz?subject=Application Questions">d.ishanov@astanait.edu.kz</a></p>
      </div>
    </div>

    <div class="betweenRow"></div>
    <div class="row r4">
      <div class="row"></div>
      <div class="empty"></div>
      <div class="row text_contacts">IGP<span style="color: #fce38a;">U</span></div>
      <div class="row"></div>
    </div>
    <div class="betweenRow"></div>
    <div class="row r5">
      <div class="row"></div>
      <div class="empty"></div>
      <div class="row"></div>
      <div class="empty"></div>
      <div class="row"></div>
    </div>
    <div class="betweenRow"></div>
    <div class="row r6">
      <div class="row text_contacts">
        <p style="margin-top: 50px; margin-left: 70px; width: 100%;"><i class="fa fa-whatsapp" style="font-size: 50px;"></i> +7 777 229 2347</p>
      </div>
      <div class="empty"></div>
      <div class="row text_contacts insta_skype"><a href="https://www.instagram.com/hollow_fame/?hl=ru" target="_blank"><i class="fa fa-instagram" style="font-size: 50px; margin-top: 50px; margin-left: 40px;"></i></a>
        <a href="skype:duman5k"><i class="fa fa-skype" style="font-size: 50px; margin-top: 50px; padding-left: 30px;"></i></a>
      </div>
      <div class="row text_contacts">
        <p style="text-align: center;">Kazakhstan Republic, 010000 <br /> City: Celinograd</p>
      </div>
    </div>
    <div class="betweenRow"></div>
    <div class="row r7">
      <div class="row"></div>
      <div class="empty"></div>
      <div class="row"></div>
      <div class="empty"></div>
      <div class="row text_contacts">
        <!-- Google maps -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2505.954393332496!2d71.41613421551638!3d51.09084917956882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x424585a605525605%3A0x4dff4a1973f7567e!2sAstana%20IT%20University!5e0!3m2!1sru!2skz!4v1584641310585!5m2!1sru!2skz" width="500px" height="200px" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
    <div class="row r8">
      <div class="footer" style="text-align: center;">
        <p>&copy; https://www.igpu.edu/</p>
      </div>
    </div>
    <div class="row left"></div>
    <div class="row right"></div>
  </section>

  <!-- Rate Us -->

  <section class="rate_us">
    <span class="fa fa-star star1" onclick="rate('1')"></span>
    <span class="fa fa-star star2" onclick="rate('2')"></span>
    <span class="fa fa-star star3" onclick="rate('3')"></span>
    <span class="fa fa-star star4" onclick="rate('4')"></span>
    <span class="fa fa-star star5" onclick="rate('5')"></span>
    <span class="span">Rate Us</span>
  </section>


  <!-- Overlay Animation -->

  <div class="plus" id="plus"></div>
  <div class="overlay"></div>

  <!-- Scroll Button -->

  <button onclick="scrollToTop()" id="scroll_to_top" title="Scroll to top">
    <i class="material-icons md-12" id="scroll_arrow">arrow_upward</i>
  </button>



  <!-- Scripts -->

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <!-- Star Icons -->
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <!-- Sweetalert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <!-- Toastr Alert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <!-- Parallax and scroll animation -->
  <script src="https://cdn.jsdelivr.net/npm/lax.js"></script>
  <script src="Final.js"></script>
  <script>
    $(document).ready(function() {
      // Check input with AJAX
      $('#add_day').blur(function() {
        let day = $(this).val();
        $.ajax({
          url: "check_adding_news.php",
          method: "POST",
          data: {
            day: day
          },
          success: function(response) {
            toastr.info('"' + response + '"');
          }
        })
      });

      // Add news with AJAX
      $('#add_news').click(function() {
        let day = $('#add_day').val();
        let month = $('#add_month').val();
        let description = $('#add_description').val();
        $.ajax({
          url: "add_news.php",
          method: "POST",
          data: {
            day: day,
            month: month,
            description: description
          },
          success: function(response) {
            toastr.info('"' + response + '"');
          }
        })
      });
    });
  </script>
</body>

</html>