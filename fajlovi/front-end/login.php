<?php 
if (isset($_POST['userlog'])) {
    $useremail = $_POST['useremail'];
    $userpass = md5($_POST['userpass']);
    $logQuery = "SELECT * from profili WHERE email= '" . $useremail . "' and password='" . $userpass . "'";
    $logPokreni = mysqli_query($conn, $logQuery);
    while($row = mysqli_fetch_assoc($logPokreni)) {
        $id = $row['id'];
    }
    if (mysqli_num_rows($logPokreni) == 1) {
        $_SESSION['id'] = $id;
        header ('Location: admin/loggedIn.php');
        
    } else {
        array_push($error_array, "You have to be reqistered in order to log in<br>");
    }
}

?>
<div class="first">
    <h2 class="register">Log in</h2>
    <form method="post">
        <input type="email" name="useremail"  required placeholder="Enter your email"><br>
        <input type="password" name="userpass"  required placeholder="Enter your password"><br>
        <input type="submit" name="userlog"> <br>
        <?php if (in_array("You have to be reqistered in order to log in<br>", $error_array)) {echo "You have to be reqistered in order to log in<br>" ;}  ?>
    </form>
    <a href= "index.php?register" ><h2 class="registerNow">Dont have a profile. Register now!</h2></a>
</div>
