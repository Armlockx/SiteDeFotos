<html>
<head>
    <title>Lost your password?</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="lostpass.css">
</head>

<body>
    <div class="login">
        <img src="../images/quest.png" class="avatar">
        <h1>Lost your password?</h1>
        <h2>You can follow these steps:</h2>
        <p>-Talk to Curt;</p><br>
        <p>-Sit and cry;</p><br>

        <form action="" method="post">
            <p>-Or, insert your email and we will contact you ASAP.</p><br>
            <input type="email" name="lostemail" placeholder="Enter your Email">
            <input type="submit" name="submit" value="Submit">
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
        isset($_POST['lostemail']) && trim($_POST['lostemail']) != '') {
    $lostemail = filter_input(INPUT_POST, 'lostemail', FILTER_DEFAULT);

    $sql = "INSERT INTO lostpassw (email) VALUES ('$lostemail')";
}
else{   echo "Some fields are in blank! <br><br>"; }


    if ($conn->query($sql) === TRUE) {  echo "New record created successfully"; }
    else {  echo "Error creating table: " . $conn->error; }

    $conn->close();
?>


</body>
</html>