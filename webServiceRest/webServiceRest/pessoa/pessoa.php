<?php
class Pessoa{
  private $conn;
  private $table_name = "pessoa";
  public $id;
	public $firstname;
  public $lastname;
  public $birthday;
	public $address;
	public $email;
	public $user;
	public $password;
	public $password_hash;

  public function __construct($db){
    $this->conn = $db;
	}

  function read(){
    $query = "SELECT * FROM pessoa";
    $stmt = $this->conn->query($query);
    return $stmt;
	}
  function create(){


    if(
        $this->firstname != '' &&
        $this->lastname != '' &&
        $this->birthday != '' &&
        $this->address != '' &&
        $this->email != '' &&
        $this->user != '' &&
        $this->password != ''
    ){
    $this->firstname=htmlspecialchars(strip_tags($this->firstname));
    $this->lastname=htmlspecialchars(strip_tags($this->lastname));
    $this->birthday=htmlspecialchars(strip_tags($this->birthday));
    $this->address=htmlspecialchars(strip_tags($this->address));
    $this->email=htmlspecialchars(strip_tags($this->email));
    $this->user=htmlspecialchars(strip_tags($this->user));
    $this->password=htmlspecialchars(strip_tags($this->password));
    $this->password_hash=htmlspecialchars(strip_tags($this->password_hash));

    $query = "INSERT INTO pessoa
    (firstname, lastname, birthday, address, email, user, password, password_hash)
    VALUES ('$this->firstname', '$this->lastname', '$this->birthday', '$this->address', '$this->email', '$this->user', '$this->password', '$this->password_hash')";

    $stmt = $this->conn->query($query);
    return true;
    }else{
      return false;
    }
  }
}
