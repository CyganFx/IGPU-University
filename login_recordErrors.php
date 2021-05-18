<?php
$data = $_POST;
$salt = 'anime';
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($data['submit'])) {
    $database = new Database();
    $db = $database->getConnection();
    $user = new User($db);

    $user->username = $data['username'];
    $user->password = $data['password'];

    $numberOfRowsUsername = $db->query("SELECT COUNT(*) FROM {$user->getTableName()} WHERE username = '{$user->username}'")->fetchColumn();
    $numberOfRowsPassword = $db->query("SELECT COUNT(*) FROM {$user->getTableName()} WHERE password = '" . md5($user->password . $salt) . "'")->fetchColumn();

    $errors = $user->checkLogin($numberOfRowsUsername, $numberOfRowsPassword);
  }
}
