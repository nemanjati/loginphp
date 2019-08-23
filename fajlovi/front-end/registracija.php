<?php
if (isset($_POST['submit'])) {
    $ime = $_POST['ime'];
    $ime = strip_tags($ime);
    $ime = str_replace(' ', '', $ime);
    $_SESSION['reg_ime'] = $ime;

    $email = $_POST['email'];
    $_SESSION['reg_email'] = $email;

    $password = md5($_POST['pass']);
    $password2 = md5($_POST['pass2']);

    
    $query = "SELECT * FROM profili WHERE email = '" . $email . "'";
    $query_email = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($query_email) > 0) {
        array_push($error_array, "Email already exists<br>");
    };
    
    if ($password != $password2) {
        array_push($error_array, "Password doesnt match<br>");
    };

    if (empty($error_array)) {
        $query_insert = "INSERT INTO profili (name, email, password) VALUES ('$ime', '$email', '$password')";
        $query_run = mysqli_query($conn, $query_insert);
        if (!$query_run) {
           echo mysqli_error($conn);
        } else {
            unset($_SESSION['reg_ime']);
            unset($_SESSION['reg_prezime']);
            unset($_SESSION['reg_email']);
        }
    }


}

?>

    <div class="second">
         <h2 class="register">Register to log in</h2>
        <form method="POST">
            <input type="text" name="ime" class="ime" placeholder="enter your name" required value="<?php if (isset($_SESSION['reg_ime'])) {
            echo $_SESSION['reg_ime'];  }?>"><br>

            <input type="email" name="email" class="email" placeholder="enter your email" required value="<?php if (isset($_SESSION['reg_email'])) {
            echo $_SESSION['reg_email'];  }?>"><br>
            
            

            <?php if (in_array("Email already exists<br>",$error_array)) { echo "Email already exists<br>";}; ?>

            <input type="password" name="pass" class="pass" placeholder="enter your password" required><br>
            <?php if (in_array("Password doesnt match<br>",$error_array)) { echo "Password doesnt match<br>";}; ?>

            <input type="password" name="pass2" class="pass2" placeholder="confirm password" required><br>
            <input type="submit" name="submit" class="submit">
        </form>
    </div>
       
    

