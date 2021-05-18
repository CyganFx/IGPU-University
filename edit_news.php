<?php
require_once 'connection.php';
require_once 'News.php';
$data = $_POST;
if (isset($data['edit_news'])) {
  $database = new Database();
  $db = $database->getConnection();
  $news = new News($db);
  $query = "UPDATE {$news->getTableName()} SET day = :day, month = :month, description = :description WHERE id = :id";
  $stmt = $db->prepare($query);
  $stmt->execute(array(
    ':day' => $data['day'],
    ':month' => $data['month'],
    ':description' => $data['description'],
    ':id' => $data['news_id']
  ));
  header("Location: Final.php#news");
}
