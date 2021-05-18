<?php
require 'connection.php';
require 'User.php';
require 'registration_recordErrors.php';
require 'sweetAlertFunctions.php';
require 'insertToDatabase_showResult_redirect.php';
require 'header.php';
?>

<!-- Overlay Animation -->

<div class="plus" id="plus" onclick="window.location.href = 'Final.php'"></div>
<div class="overlay"></div>

<!-- Application Form -->

<div class="wrapper">
  <div class="registration-form">
    <form class="container input-fields" method="post">
      <div class="row">
        <div class="col-lg-6">
          <label>Student Key</label>
        </div>
        <div class="col-lg-6">
          <input type="text" class="input" name="student_key" placeholder="Type igpu322" value="<?= @$data['student_key'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <label>First Name</label>
        </div>
        <div class="col-lg-6">
          <input type="text" class="input" name="first_name" placeholder="Type your first name" value="<?= @$data['first_name'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <label>Surname</label>
        </div>
        <div class="col-lg-6">
          <input type="text" class="input" name="surname" placeholder="Type your surname" value="<?= @$data['surname'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <label>Username</label>
        </div>
        <div class="col-lg-6">
          <input type="text" class="input" name="username" id="username" placeholder="Type your username" value="<?= @$data['username'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <label>Password</label>
        </div>
        <div class="col-lg-6">
          <input type="password" class="input" name="password" placeholder="Type your password" value="<?= @$data['password'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <label>Confirm Passoword</label>
        </div>
        <div class="col-lg-6">
          <input type="password" class="input" name="password2" placeholder="Confirm password" value="<?= @$data['password2'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <label>Email</label>
        </div>
        <div class="col-lg-6">
          <input type="email" name="email" id="email" class="input" placeholder="amadeus@gmail.com" value="<?= @$data['email'] ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 offset-lg-8">
          <input type="submit" class="input" id="submit" name="submit" value="SUBMIT">
        </div>
      </div>
    </form>
  </div>
</div>

<?php require 'footer.php'; ?>