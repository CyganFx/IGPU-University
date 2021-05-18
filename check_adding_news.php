<?php
require_once 'connection.php';
$data = $_POST;
if (isset($data['day'])) {
  $database = new Database();
  $db = $database->getConnection();
  if (trim($data['day']) === '') {
    echo "input day, please";
    return;
  }
  $query = "SELECT COUNT(*) FROM news WHERE day = :day";
  $stmt = $db->prepare($query);
  $stmt->execute(array(
    ':day' => $data['day']
  ));
  $numberOfDates = $stmt->fetchColumn();
  //prepare TODO
  if ($numberOfDates > 0) {
    echo 'date is reserved';
  } else {
    echo 'date is valid';
  }
}
