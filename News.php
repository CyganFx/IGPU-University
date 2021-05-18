<?php
class News
{
  private $conn;
  private $table_name = "news";

  public $id;
  public $day;
  public $month;
  public $url;
  public $descriprion;

  public function getTableName()
  {
    return $this->table_name;
  }

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function create()
  {
    $query = "INSERT INTO {$this->table_name} (day, month, description) VALUES (:day, :month, :description)";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':day', $this->day);
    $stmt->bindParam(':month', $this->month);
    $stmt->bindParam(':description', $this->description);
    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
