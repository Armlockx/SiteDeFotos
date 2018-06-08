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
                <input type="submit" name="submit" value="Login">
                <br><a href="lostpass.php">Lost your password?</a>
                <br><a href="createAcc.php">Don't have an account yet?</a>
            </form>
            <div class="end"><a href="../index.php">Backkkkkkk</a></div>
        </div>
        <?php
        $servername = "localhost";
        $dBuser = "julioreus";
        $dBpass = "jr115";
        $dBname = $dBuser;

        $conn = new mysqli($servername, $dBuser, $dBpass, $dBname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            echo "Conectado a base de dados de: " . $dBuser . "<br><br>";
        }

        if( isset($_POST['user']) && trim($_POST['user']) != '' && isset($_POST['passw']) && trim($_POST['passw']) != '') {

            $userlog = filter_input(INPUT_POST, 'user', FILTER_DEFAULT);
            $passlog = filter_input(INPUT_POST, 'passw', FILTER_DEFAULT);

            $sql = ("SELECT * FROM pessoa WHERE user='$userlog' AND password='$passlog'");
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "id: ".$row["id"]."<br>";
                    echo "Name :".$row["firstname"]." ".$row["lastname"]."<br>";
                    echo "Email: ".$row["email"]."<br><br>";

                    echo  "<script>alert('successfully logged as: $userlog.');</script>";

                    session_start();
                    $_SESSION['id_client'] = $row["id"] ;$_SESSION['user_client'] = $userlog;
                    $_SESSION['fname_client'] = $row["firstname"]; $_SESSION['lname_client'] = $row["lastname"];
                    $_SESSION['email_client'] = $row["email"];


                    require_once ("users/userpage.php");
                    echo ("<script>window.location.href = \"users/userpage.php\";</script>");
                }
            } else {
                echo  "<script>alert('0 results');</script>";
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