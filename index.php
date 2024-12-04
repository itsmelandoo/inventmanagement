<?php
//CONNECTING TO SERVER AND DATABASE
include "connect.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$username = $_POST["username"];
$password = $_POST["password"];
    
    // INITIALIZING INPUT DATA
    if(isset($_POST['username']) && isset($_POST['password'])){
        // VALIDATE THE INPUT OF THE USER FOR SECURITY PURPOSES
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        // VALIDATING THE VARIABLES 
        $username = validate($_POST['username']);
        $password = validate($_POST['password']);

        // ERROR HANDLING FOR EMPTY FIELDS
        if(empty($username)){
            header("Location: index.php?error=Username is required");
            exit();
        }else if(empty($password)){
            header("Location: index.php?error=Password is required");
            exit();
        }else{
            // ACQUIRING DATA IN THE DATABASE 
            $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
            
            $result = mysqli_query($connection,$sql);
            
            if(mysqli_num_rows($result) === 1){
               $row = mysqli_fetch_assoc($result);
              
               if($row['username'] === $username && $row['password'] === $password){
                header("location: home.php");
                exit();
               }
            }else{
                header("Location: index.php?error=Incorrect Username or Password");
                exit();
            }
        }
    }else{
       header("location: index.php");
       exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <!-- TITLE ANIMATION -->
        <div class="greetings">
            <h2 class="SlideOnLeft slide--fast">Navi</h2>
            <h3 class="SlideOnLeft slide--slow">Merchandise</h3>
        </div>

        <!-- LOGIN FORM  -->
        <div class="form">
            <form for="" method="post"> 
                 <!--ERROR NOTIFICATION  -->
                <?php if(isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php }?>
                <div class="input-user">
                    <input type="text"  placeholder="Username" name="username">
                </div>
                <div class="input-pass">
                    <input type="password" placeholder="Password" name="password">
                </div>
                <div class="button">
                    <button type="submit">Login </button>
                </div>
                <div class="register">
                    <a href=" register.php">Register Here!</a>
                </div>
            </form>
        </div>
    </body>
</html>