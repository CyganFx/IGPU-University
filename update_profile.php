<?php
require_once 'connection.php';
require 'User.php';
$data = $_POST;
if (isset($_POST['save'])) {
  $database = new Database();
  $db = $database->getConnection();
  $user = new User($db);
  $user->username = htmlentities($data['username']);
  $user->house = htmlentities($data['house']);
  $user->birth_date = htmlentities($data['birth_date']);
  $user->email = htmlentities($data['email']);
  $user->mobile_number = htmlentities($data['mobile_number']);
  $user->info = htmlentities($data['info']);

  if ($user->editProfile($_SESSION['id'])) {
    $_SESSION['username'] = $user->username;
    $_SESSION['house'] = $user->house;
    $_SESSION['birth_date'] = $user->birth_date;
    $_SESSION['email'] = $user->email;
    $_SESSION['mobile_number'] = $user->mobile_number;
    $_SESSION['info'] = $user->info;
  }
  header('location: profile.php');
}
