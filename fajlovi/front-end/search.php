<?php 
    $searchtext = $_POST['search'];
?>

<div class="first">
    <h2 class="register">Emails</h2>
    <div class="emails">
        <?php
            $searchQuery = "SELECT * from profili WHERE email LIKE '" . $searchtext . "' ";
            $searchPokreni = mysqli_query($conn, $searchQuery);
            ?>
            <ul class="search-nav">
            <?php
            while($row = mysqli_fetch_assoc ($searchPokreni)) {
                $email = $row ['email'];
                
                ?>
            
                <li><?php echo $email ?></li>
                
           </ul>
                <?php
            }
        ?>
    </div>
    
</div>