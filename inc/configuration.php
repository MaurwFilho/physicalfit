<?php 



class Sql {

	private $conn;

	public function __construct(){

		return $this->conn = mysqli_connect("127.0.0.1", "root", "", "physicalfit");

	}

	public function query($string_query){

		return mysqli_query($this->conn, $string_query);

	}

	public function __destruct(){

		mysqli_close($this->conn);

	}

}

$sql = new Sql();

$sql->query("INSERT INTO professor (nome, email, senha) VALUES ('Boi', 'boi@boi.boi', 'teste');");

$result = $sql->query("SELECT * FROM professor");

$data = array();

while ($row = $result->fetch_assoc()) {

	array_push($data, $row);

}

echo json_encode($data);


?>