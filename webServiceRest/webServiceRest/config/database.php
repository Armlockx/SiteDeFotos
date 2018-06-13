<?php
class Database{


	    	private $host = "localhost";
	      private $db_name = "julioreus";
	      private $username = "julioreus";
		    private $password = "jr115";
		    public $conn;

		        public function getConnection(){

				        $this->conn = null;

								$this->conn = new mysqli($this->host, $this->db_name, $this->password, $this->username);
								if  (   $this->conn->connect_error) { die("Connection failed: " . $this->conn->connect_error) . "<br><br>"; }
								else{   echo "Conectado! <br><br>"; }

					      return $this->conn;
					    }
}
?>
