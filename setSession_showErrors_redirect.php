<?php
$data = $_POST;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($data['relogin'])) {
  if (empty($errors)) {
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);
    $user->username = $data['username'];

    $user->setSessions();

    swalSuccessfulLogin($user->username); //redirects
  } else {
    swalError($errors);
  }
}
