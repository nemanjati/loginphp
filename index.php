
    <?php
    include ("fajlovi/config.php");
    include ("fajlovi/header.php");

?>
   
   <div class="headerBar">
      <form action="" method="POST" class="form-search">
         <input type="text" name="search" placeholder="Search" id="seatchInput">
         <input type="submit" value="Search" name="searchBtn" id="searchBtn">
      </form>
       <ul class="main-nav">
           <li><a href="index.php">Home</a></li>
            <li><a href="index.php?login">Log in</a></li>
            <li><a href="index.php?register">Register</a></li>
            <li><a href="index.php?logOut">Log Out</a></li>
       </ul>
   </div>
    <div class="wrapp">
        <div class="forma">
            <?php
            if (isset($_GET['login'])) {
                include ("fajlovi/front-end/login.php");
            };
            if (isset($_GET['register']) ) {
                include ("fajlovi/front-end/registracija.php");
            };
            if (isset($_GET['logOut']) ) {
                include ("fajlovi/front-end/logOut.php");
            };
            if (isset($_SESSION['id'])) {
                if(isset($_POST['searchBtn'])) {
                    include("fajlovi/front-end/search.php");
                }
            } else if (!isset($_GET['login']) && !isset($_GET['register']) && !isset($_GET['logOut'])) {
                echo " you need to be logged in to search users";
            }
            ?>
        </div>
    </div>
<script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
      integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
      integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
      crossorigin="anonymous"
    ></script>
    
</body>
</html>