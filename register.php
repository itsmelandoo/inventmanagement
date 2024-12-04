<?php

include ('connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];  
    $role = $_POST["role"];  

    // INITIALIZING INPUT DATA
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){
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
        $role = validate($_POST['role']);

        // ERROR HANDLING FOR EMPTY FIELDS
        if(empty($username)){
            header("Location: register.php?error=Username is required");
            exit();
        }else if(empty($password)){
            header("Location: register.php?error=Password is required");
            exit();
        }else if(empty($confirmpassword)){
            header("Location: register.php?error=Confirm Password is required");
            exit();
        }else if(empty($role)){
            header("Location: register.php?error=Role is required");
            exit();
        }else if($password !== $confirmpassword){
            header("Location: register.php?error=Password does not match is required");
            exit();
        }else{
            $sql  = "INSERT INTO login (username, password, role) VALUES ('$username', '$password', '$role')";
            
            $result = $connection->query($sql);

            
        
            }
            
        }
        }   
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <div class="register-form">
            <form for="" method="post">  
                <?php if(isset($_GET['error'])) {?>
                    <p class="error"><?php echo $_GET['error']; ?></p>
                <?php }?>
                <div class="input-user">
                    <input type="text"  placeholder="Username"  name="username">
                </div>
                <div class="input-pass">
                   <input type="password" placeholder="Password"  name="password">
                </div>
                <div class="confirm-pass">
                    <input type="password" placeholder="Confirm Password"  name="confirmpassword">
                </div>
                <div class="role">
                    <input type="text" placeholder="Role" name="role" value="user">
                </div>
                <div class="button">
                    <button type="submit">Register</button>
                </div>
                <div class="login">
                    <a href="index.php">Already Have an Account?</a>
                </div>
            </form>
        </div>
    </body>
</html>