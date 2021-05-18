<?php
require_once 'connection.php';
session_start();
$database = new Database();
$db = $database->getConnection();
$query = "
SELECT * FROM tbl_comments 
WHERE parent_comment_id = '0' 
ORDER BY comment_id DESC
";

$statement = $db->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach ($result as $row) {
  $output .= '
 <div class="panel panel-default">
  <div class="panel-heading">By <b>' . $row["comment_sender_name"] . '</b> on <i>' . $row["date"] . '</i></div>
  <div class="panel-body">' . $row["comment"] . '</div>
  <div class="panel-footer" align="right">
  ';
  if ($_SESSION['username'] == 'admin' || $_SESSION['username'] == $row['comment_sender_name']) {
    $output .= '
    <form action="delete_comment.php" method="post">
      <input type="hidden" name="comment_id" value = "' . $row['comment_id'] . '" />
    <button type="submit" class="btn btn-danger delete" name="delete_comment">Delete</button>
    </form>
    ';
  }
  $output .= '<button type="button" class="btn btn-default reply" id="' . $row["comment_id"] . '">Reply</button></div>
 </div>
 ';
  $output .= get_reply_comment($db, $row["comment_id"]);
}

echo $output;

function get_reply_comment($db, $parent_id = 0, $marginleft = 0)
{
  $query = "
 SELECT * FROM tbl_comments WHERE parent_comment_id = '" . $parent_id . "'
 ";
  $output = '';
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $count = $statement->rowCount();
  if ($parent_id == 0) {
    $marginleft = 0;
  } else {
    $marginleft = $marginleft + 48;
  }
  if ($count > 0) {
    foreach ($result as $row) {
      $output .= '
   <div class="panel panel-default" style="margin-left:' . $marginleft . 'px">
    <div class="panel-heading">By <b>' . $row["comment_sender_name"] . '</b> on <i>' . $row["date"] . '</i></div>
    <div class="panel-body">' . $row["comment"] . '</div>
    <div class="panel-footer" align="right">';
      if ($_SESSION['username'] == 'admin') {
        $output .= '<button type="button" class="btn btn-danger delete" name="delete_comment">Delete</button>';
      }
      $output .= '
     <button type="button" class="btn btn-default reply" id="' . $row["comment_id"] . '">Reply</button></div>
   </div>
   ';
      $output .= get_reply_comment($db, $row["comment_id"], $marginleft);
    }
  }
  return $output;
}
