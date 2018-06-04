<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="logincss.css">
    </head>
    <body>
        <div class="login">
            <img src="../images/user.png" class="avatar">
            <h1>Login Here</h1>
            <form method="post">
                <p>Username</p>
                <input type="text" name="user" placeholder="Enter Username">
                <p>Password</p>
                <input type="password" name="passw" placeholder="Enter Password">
                <p>DB name</p>
                <input type="text" name="bdname" placeholder="Enter DB name">
                <input type="submit" name="submit" value="Login">
                <br><a href="lostpass.php">Lost your password?</a>
                <br><a href="createAcc.php">Don't have an account yet?</a>
            </form>
            <div class="end"><a href="../index.html">Back</a></div>
        </div>
	<?php

if( isset($_POST['user']) && trim($_POST['user']) != '' && isset($_POST['passw']) && trim($_POST['passw']) != '' && isset($_POST['bdname']) && trim($_POST['bdname']) != '') {

    		$userlog = filter_input(INPUT_POST, 'user', FILTER_DEFAULT);
    		$passlog = filter_input(INPUT_POST, 'passw', FILTER_DEFAULT);
    		$dBnamelog = filter_input(INPUT_POST, 'bdname', FILTER_DEFAULT);

        	//echo htmlspecialchars($_POST["user"]) . "<br>";
       		//echo htmlspecialchars($_POST["passw"]) . "<br>";

            $servername = "localhost"; //$dBnamelog = "julioreus";

            $conn = new mysqli($servername, $userlog, $passlog, $dBnamelog);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            else{
                echo "Conectado!";
            }
   }
   else{
    echo "Some fields are in blank!";
   }


   /*$sql = "CREATE TABLE lostpassw(
                     id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                     email VARCHAR(55) NOT NULL
             )";

             if ($conn->query($sql) === TRUE) {
                 echo "Table created successfully.";
             } else {
                 echo "Error creating table: " . $conn->error;
             }

          $sql = "CREATE TABLE pessoa(
                    id INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    firstname VARCHAR(45) NOT NULL,
                    lastname VARCHAR(45) NOT NULL,
                    birthday DATE,
                    address VARCHAR(45) NOT NULL,
                    email VARCHAR(55) NOT NULL,
                    user VARCHAR(35) NOT NULL,
                    password VARCHAR(60) NOT NULL,
                    password_hash VARCHAR(60) NOT NULL
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