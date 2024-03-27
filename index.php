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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css" >
</head>

   <body>
  <!--<form action = "index.php" method = "post">

  <div class="container">
   <label for="username"><b>Username</b></label>
   <input type = "text" name = "username" placeholder = "username" required autofocus></br>
   <label for="password"><b>Password</b></label>
   <input type = "password" name = "password" placeholder = "password" required>
   
   <input class="button" type = "submit" name="login">
</div>
   </form> -->
   
   <form action="index.php" method="post">

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <input class="button" type = "submit" name="login">
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
</form> 
   </html>