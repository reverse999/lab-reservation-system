<?php
    session_start();
    include("database.php");
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            $data = mysqli_fetch_array($result);
            $name = $data['username'];
            $_SESSION['username'] = $username;
            header("Location: adminpanel.php");
            
        }  
        else{  
            echo  "Your credentials are wrong!";
        }

    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="login.css">
  <title>Laboratory Room Reservation</title>
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                    <h2>System Login</h2>
                    <div class="inputbox">
                        <input type="text" name="username" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <input type="password" name="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me </label>
                      
                    </div>
                    <button name="submit">Log in</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

