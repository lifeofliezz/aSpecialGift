<?php
    require "header.php";
    ?>

<main>
    <div class="wrapper-main">
         <section class="section-default">

             <?php
                if(isset($_SESSION['userId'])){
                    echo '<p class="login-status">you are logged in</p>';
                }
                else{
                    echo '<ul>
                            <li><a href="#">I have a code</a></li>
                            <li><a href="signup.php">Make a weddingpresentlist</a></li>
                            </ul>';
                }
             ?>
         </section>
    </div>
</main>

<?php
    require "footer.php";
    ?>