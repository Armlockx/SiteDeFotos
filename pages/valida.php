<?php
	session_start();

	include_once ("conexao.php");

	$email = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_STRING);

	$result_usuario = "SELECT * FROM pessoa WHERE email='$email' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);

	if (($resultado_usuario) AND ($resultado_usuario->num_rows != 0)) {
		$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
		$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
		$_SESSION['id_client'] = $resultado_usuario->fetch_assoc()["id"];
		$_SESSION['user_client'] = $resultado_usuario->fetch_assoc()["user"];;
		$_SESSION['fname_client'] = $firstname; $_SESSION['lname_client'] = $lastname;
		$_SESSION['email_client'] = $email;
		$resultado = 'users/userpage.php';
		echo $resultado;
	} else {
		include_once '../webService/objects/pessoa.php';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
		$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
		$userToken = filter_input(INPUT_POST, 'userToken', FILTER_SANITIZE_STRING);
		$passwordHash = password_hash($userToken, PASSWORD_DEFAULT);
		$userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_STRING);
		$sql = "INSERT INTO pessoa
				(firstname, lastname, birthday,address,
		email, user, password, password_hash)
				VALUES ('$firstname', '$lastname', '1000-01-01', 'null', '$email', '$userName', '$userToken', '$passwordHash')";

		$conn->query($sql)

		$result_usuario = "SELECT * FROM pessoa WHERE email='$email' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$_SESSION['id_client'] = $resultado_usuario->fetch_assoc()["id"];
		$_SESSION['user_client'] = $resultado_usuario->fetch_assoc()["user"];;
		$_SESSION['fname_client'] = $firstname; $_SESSION['lname_client'] = $lastname;
		$_SESSION['email_client'] = $email;
		$resultado = 'users/userpage.php';
		echo $resultado;
	}
