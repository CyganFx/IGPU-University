<?php
require_once 'connection.php';
$data = $_POST;
if (isset($data['delete_comment'])) {
  $database = new Database();
  $db = $database->getConnection();
  $sql = "DELETE FROM tbl_comments WHERE comment_id = :currentId";
  $stmt = $db->prepare($sql);
  $stmt->execute(array(':currentId' => $data['comment_id']));
  header('Location: comments.php');
}
