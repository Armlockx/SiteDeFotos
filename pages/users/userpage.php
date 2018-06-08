<html>
<head>
    <title>Hello!</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

<?php
//<link rel="stylesheet" type="text/css" href="logincss.css">
session_start();
echo "<br>HELLOOOOOOOOOOO ". $_SESSION['fname_client'] . "!!!<br><br>";

echo "Your credentials: <br><br>";

echo "ID: " . $_SESSION['id_client'] . "<br>";
echo "Username: " . $_SESSION['user_client'] . "<br>";
echo "Name: " . $_SESSION['fname_client'] ." ". $_SESSION['lname_client'] . "<br>";
echo "Email: " . $_SESSION['email_client'] . "<br><br>";

echo "sessionName:           " . session_name().'<br>';
echo "sessionID:             " . session_id().'<br>';
echo "sessionStatus:         " . session_status().'<br>';
echo "sessionSavePath:       " . session_save_path().'<br>';
echo "sessionSavePathWithId: " . session_save_path(). '/sess_'.session_id().'<br>';
?>

</body>
</html>