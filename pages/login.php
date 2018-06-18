<html>
    <head>
        <title>Login</title>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<meta name = "google-signin-client_id" content = "261858234418-craiulk3iiilhsr42bpgnfpn58cdm05m.apps.googleusercontent.com">
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
                <div class="g-signin2" data-onsuccess="onSignIn"></div>
                <br><a href="lostpass.php">Lost your password?</a>
                <br><a href="createAcc.php">Don't have an account yet?</a>
            </form>
            <div class="end"><a href="../index.php">Backkkkkkk</a></div>
        </div>
        <p id='msg'></p>
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
        ?>
        <script>
        function onSignIn(googleUser) {
      		var profile = googleUser.getBasicProfile();
      		var userID = profile.getId();
      		var userName = profile.getName();
      		var firstname = profile.getGivenName();
      		var lastname = profile.getFamilyName();
      		var userPicture = profile.getImageUrl();
      		var userEmail = profile.getEmail();
      		var userToken = googleUser.getAuthResponse().id_token;
      		document.getElementById('msg').innerHTML = userEmail;
      		if (userEmail !== '') {
      			var dados = {
      				userID:userID,
      				userName:userName,
      				firstname:firstname,
      				lastname:lastname,
              userToken:userToken,
      				userPicture:userPicture,
      				userEmail:userEmail
      			};
      		$.post('valida.php', dados, function(retorna){
      			if (retorna === '"erro"'){
      					var msg = "Usuário não localizado com o endereço de e-mail digitado.";
      					document.getElementById('msg').innerHTML = msg;
      			} else {
      			window.location.href = retorna;
      			}

      		});
      		}else {
      				var msg = "Usuário não encontrado.";
      				document.getElementById('msg').innerHTML = msg;
      		}
      	}
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <?php
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
        ?>
    </body>
</html>
