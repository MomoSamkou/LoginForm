<?php
   session_start();   //otvorenie session
   
    //kontrola ci uz bol potvrdeny formular a ci boli vyplnene obidva udaje aj username aj password
   if (isset($_POST['login']) && !empty($_POST['username']) 
      && !empty($_POST['password'])) {

        //connect string do DB
        $servername = "localhost";
        $username = "Moravcik";
        $password = "1234";
        $dbname = "moravcik3a";

        // Create connection
        $conn = new mysqli($servername, $username, 
            $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        //echo "Connected successfully";

        //vyber hesla z DB podla usera, ktory sa prihlasuje
        $sql = "SELECT password FROM t_user where username ='".$_POST['username']."'";
        $result = $conn->query($sql);

        //ak vrati select viac ako 0 riadkov, user existuje
        if ($result->num_rows > 0) {
          // output data of each row
          $row = $result->fetch_assoc();
          if($row["password"]==$_POST['password']) {
          //  if(password_verify($_POST['password'],$row["pasword"])) {
                $_SESSION['valid'] = true; //ulozenie session
                $_SESSION['timeout'] = time();
                $_SESSION['username'] = $_POST['username'];

                //presmerovanie na dalsiu stranku
                header("Location: welcome.php", true, 301);
                exit();
          } else {
            echo "wrong password";
          }
        } else {
          echo "wrong username";
        }
    
    $conn->close();
   
}     
            
   
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login form</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="wrapper">
    <?php
        echo $error_message; 
    ?>
    <form action="index.php" method="post">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required autofocus>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt' ></i>
        </div>
        <button type="submit" name="submit" class="btn">Login</button>
        <div class="register-link">
            <p>Don't have an account? <a href="register.php" id="Register">Register</a></p>
        </div>
    </form>
</div>
</body>
</html>
