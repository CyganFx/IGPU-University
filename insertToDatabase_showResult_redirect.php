<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (empty($errors)) {
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    $user->first_name = $_POST['first_name'];
    $user->surname = $_POST['surname'];
    $user->username = $_POST['username'];
    $user->password = $_POST['password'];
    $user->email = $_POST['email'];

    if ($user->create($salt)) {
      echo "<script>console.log('created')</script>";
      swalSuccessfulRegistration(); //redirects
    }
  } else {
    echo "<script>console.log('some error')</script>";
    swalError($errors);
  }
}
