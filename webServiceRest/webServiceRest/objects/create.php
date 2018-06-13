<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';

include_once '../objects/pessoa.php';

$database = new Database();
$db = $database->getConnection();

$pessoa = new pessoa($db);

$data = json_decode(file_get_contents("php://input"));

$pessoa->firstname = $data->firstname;
$pessoa->lastname = $data->lastname;
$pessoa->birthday = $data->birthday;
$pessoa->address = $data->address;
$pessoa->email = $data->email;
$pessoa->user = $data->user;
$pessoa->password = $data->password;
$pessoa->password_hash = password_hash($pessoa->password, PASSWORD_DEFAULT);

if($pessoa->create()){
    echo '{';
        echo '"mensagem": "pessoa foi criada."';
    echo '}';
}

else{
    echo '{';
        echo '"message": "Não foi possível criar a pessoa."';
    echo '}';
}
?>
