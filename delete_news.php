<?php
require_once 'connection.php';
require_once 'News.php';
$data = $_POST;
if (isset($data['delete_button'])) {
  $database = new Database();
  $db = $database->getConnection();
  $news = new News($db);
    $sql = "DELETE FROM {$news->getTableName()} WHERE id = :currentId";
    $stmt = $db->prepare($sql);
    $stmt->execute(array( ':currentId' => $data['news_id']));
}