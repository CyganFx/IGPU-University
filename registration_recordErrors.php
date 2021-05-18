<?php
$data = $_POST;
$salt = 'anime';
$correct_student_key = 'igpu322';
$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $database = new Database();
  $db = $database->getConnection();
  $user = new User($db);

  $user->first_name = htmlentities($data['first_name']);
  $user->surname = htmlentities($data['surname']);
  $user->username = htmlentities($data['username']);
  $user->password = htmlentities($data['password']);
  $user->email = htmlentities($data['email']);

  $numberOfRowsUsername = $db->query("SELECT COUNT(*) FROM {$user->getTableName()} WHERE username = '{$user->username}'")->fetchColumn();
  $numberOfRowsEmail = $db->query("SELECT COUNT(*) FROM {$user->getTableName()} WHERE email = '{$user->email}'")->fetchColumn();

  $errors = $user->recordRegistrationErrors($data['student_key'], $correct_student_key, $data['password2'], $numberOfRowsUsername, $numberOfRowsEmail);
}
