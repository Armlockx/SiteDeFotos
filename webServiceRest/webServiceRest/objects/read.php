<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../objects/pessoa.php';

$database = new Database();
$db = $database->getConnection();


$pessoa = new pessoa($db);

$stmt = $pessoa->read();
echo($stmt)
$num = $stmt->num_rows;

if($num>0){

	    $pessoas_arr=array();
	        $pessoas_arr["records"]=array();

	        while ($row = $stmt->fetch_assoc()){
			        extract($row);

				        $pessoa_item=array(
						            "id" => $id,
							                "firstname" => $firstname,
									            "lastname" => $lastname,
										                "birthday" => $birthday,
												            "address" => $address,
													                "email" => $email,
															            "user" => $user,
																                "password" => $password
																		        );

				        array_push($pessoas_arr["records"], $pessoa_item);
				    }

		    echo json_encode($pessoas_arr);
}

else{
	    echo json_encode(
		            array("mensagem" => "Nenhuma pessoa encontrada")
			        );
}
?>
