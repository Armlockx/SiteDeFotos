<html>
<head>
    <title>Create your Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="createcss.css">
</head>
<body>
<div class="login">
    <img src="../images/create.png" class="avatar">
    <h1>Create your account</h1>
    <form method="post">
        <p>Firstname</p>
        <input type="text" name="firstname" placeholder="Enter your firstname (45 max)">
        <p>Lastname</p>
        <input type="text" name="lastname" placeholder="Enter your lastname (45 max)">
        <p>Birthday</p>
        <input type="date" name="birthday">
        <p>Address</p>
        <input type="text" name="address" placeholder="Enter your address (45 max)">
        <p>Email</p>
        <input type="text" name="email" placeholder="Enter your email">
        <p>Define a username for you account</p>
        <input type="text" name="username" placeholder="Enter your username (35 max)">
        <p>Define a password for your accont</p>
        <input type="password" name="password" placeholder="Enter your password (60 max)">
        <input type="submit" name="submit" value="Create account">
    </form>
    <div class="end"><a href="login.php">Back</a></div>
</div>
<?php
$servername = "localhost";
$dBname = "julioreus";
$dBlogin = "julioreus";
$dBpass = "jr115";


$conn = new mysqli($servername, $dBlogin, $dBpass, $dBname);
if  (   $conn->connect_error) { die("Connection failed: " . $conn->connect_error) . "<br><br>"; }
else{   echo "Conectado! <br><br>"; }


if(
        isset($_POST['firstname']) && trim($_POST['firstname']) != '' &&
        isset($_POST['lastname']) && trim($_POST['lastname']) != '' &&
        isset($_POST['birthday']) && trim($_POST['birthday']) != '' &&
        isset($_POST['address']) && trim($_POST['address']) != '' &&
        isset($_POST['email']) && trim($_POST['email']) != '' &&
        isset($_POST['username']) && trim($_POST['username']) != '' &&
        isset($_POST['password']) && trim($_POST['password']) != ''
) {
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_DEFAULT);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_DEFAULT);
    $birthday = filter_input(INPUT_POST, 'birthday', FILTER_DEFAULT);
    $address = filter_input(INPUT_POST, 'address', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    $username = filter_input(INPUT_POST, 'username', FILTER_DEFAULT);
    $password = filter_input(INPUT_POST, 'password', FILTER_DEFAULT);
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO pessoa
    (firstname, lastname, birthday, address, email, user, password, password_hash) 
    VALUES ('$firstname', '$lastname', '$birthday', '$address', '$email', '$username', '$username', '$passwordHash')";
}
else{   echo "Some fields are in blank! <br><br>"; }


    if ($conn->query($sql) === TRUE) {  echo "New record created successfully"; }
    else {  echo "Error creating table: " . $conn->error; }

    $conn->close();


/*       $sql = "CREATE TABLE pessoa(
                 id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                 firstname VARCHAR(45) NOT NULL,
                 lastname VARCHAR(45) NOT NULL,
                 address VARCHAR(45) NOT NULL,
                 email VARCHAR(55)
         )";

         if ($conn->query($sql) === TRUE) {
             echo "Table created successfully.";
         } else {
             echo "Error creating table: " . $conn->error;
         }
 */
?>
</body>
</html>