<?php
class User
{
  private $conn;
  private $table_name = "users";

  public $id;
  public $first_name;
  public $surname;
  public $username;
  public $password;
  public $email;
  public $house;
  public $birth_date;
  public $mobile_number;
  public $info;

  public function getTableName()
  {
    return $this->table_name;
  }

  public function __construct($db)
  {
    $this->conn = $db;
  }
  // insert to database
  public function create($salt)
  {
    session_start();
    //try with bracket
    $query = "INSERT INTO {$this->table_name} (first_name, surname, username, password, email) 
              VALUES (:first_name, :surname, :username, :password, :email)";
    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(':first_name', $this->first_name);
    $stmt->bindParam(':surname', $this->surname);
    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':password', $this->password);
    $stmt->bindParam(':email', $this->email);

    if ($stmt->execute()) {
      echo "<script>console.log('executed successfully')</script>";
      $_SESSION['first_name'] = $this->first_name;
      $_SESSION['surname'] = $this->surname;
      $_SESSION['email'] = $this->email;
      return true;
    } else {
      return false;
    }
  }

  public function recordRegistrationErrors($studentKey, $correct_student_key, $password2, $numberOfRowsUsername, $numberOfRowsEmail)
  {
    $errors = array();
    if (empty($studentKey)) {
      $errors[] = 'Enter student key';
    }

    if (empty($this->first_name)) {
      $errors[] = 'Enter first name';
    }

    if (empty($this->surname)) {
      $errors[] = 'Enter surname';
    }

    if (empty($this->username)) {
      $errors[] = 'Enter username';
    }

    if (empty($this->password)) {
      $errors[] = 'Enter password';
    }

    if (empty($password2)) {
      $errors[] = 'Verify password';
    }

    if (empty($this->email)) {
      $errors[] = 'Enter email';
    }

    if ($studentKey != $correct_student_key) {
      $errors[] = 'Incorrect student key';
    }

    if ($this->password != $password2) {
      $errors[] = 'Incorrect password verification';
    }

    if ($numberOfRowsUsername > 0) {
      $errors[] = 'Username already exists';
    }

    if ($numberOfRowsEmail > 0) {
      $errors[] = 'Email already exists';
    }
    return $errors;
  }


  public function checkLogin($numberOfRowsUsername, $numberOfRowsPassword)
  {
    $errors = array();
    if (empty($this->username)) {
      $errors[] = 'Enter username';
    }

    if (empty($this->password)) {
      $errors[] = 'Enter password';
    }

    if ($numberOfRowsUsername + $numberOfRowsPassword !== 2) {
      $errors[] = 'Username or password is incorrect';
    }
    return $errors;
  }

  public function setSessions()
  {
    session_start();
    $sql = "SELECT * FROM {$this->table_name} WHERE username = :username";
    $user_info = $this->conn->prepare($sql);
    $user_info->execute(array(
      ':username' => $this->username
    ));
    foreach ($user_info as $info) {
      $_SESSION['id'] = htmlentities($info['id']);
      $_SESSION['first_name'] = htmlentities($info['first_name']);
      $_SESSION['surname'] = htmlentities($info['surname']);
      $_SESSION['username'] = htmlentities($info['username']);
      $_SESSION['email'] = htmlentities($info['email']);
      $_SESSION['house'] = htmlentities($info['house']);
      $_SESSION['birth_date'] = htmlentities($info['birth_date']);
      $_SESSION['mobile_number'] = htmlentities($info['mobile_number']);
      $_SESSION['info'] = htmlentities($info['info']);
      break;
    }
  }

  public function editProfile($id)
  {
    $sql = "UPDATE {$this->table_name} SET
    username = :username, house = :house, birth_date = :birth_date, email = :email, mobile_number = :mobile_number, info = :info 
    WHERE id = :id";

    $stmt = $this->conn->prepare($sql);

    $stmt->bindParam(':username', $this->username);
    $stmt->bindParam(':house', $this->house);
    $stmt->bindParam(':birth_date', $this->birth_date);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':mobile_number', $this->mobile_number);
    $stmt->bindParam(':info', $this->info);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
