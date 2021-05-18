<?php
require_once 'connection.php';
require_once 'News.php';
$data = $_POST;
if (isset($data['day']) && isset($data['month']) && isset($data['description'])) {
  $database = new Database();
  $db = $database->getConnection();
  $news = new News($db);
  $news->day = htmlentities($data['day']);
  $news->month = htmlentities($data['month']);
  $news->description = htmlentities($data['description']);
  $query =  "SELECT COUNT(*) FROM {$news->getTableName()} WHERE day = :day AND month = :month";
  $stmt = $db->prepare($query);
  $stmt->execute(array(
    ':day' => $data['day'],
    ':month' => $data['month']
  ));
  $numberOfDates = $stmt->fetchColumn();
  if ($numberOfDates > 0) {
    echo 'day is reserved';
    // header("Location: Final.php#news");
  } else {
    if ($news->create()) {
      echo 'successfully added';
    } else {
      echo 'creation fail';
    }
    
    // header("Location: Final.php#news");
  }
}
