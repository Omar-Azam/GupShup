<div class="container">
    
    <h2 class="heading mb-3 mt-3">Login</h2>

    <form action="./server/requests.php" method="post">
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="email" class="form-label">Email: 
                <?php
                error("email_error", 5000);
                ?>
            </label>
            <input type="email" class="form-control" id="email" name="email" value="<?php value("login_email")?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="pass" class="form-label">Password: 
                <?php
                error("pass_error", 5000);
                ?>
            </label>
            <input type="password" class="form-control" id="pass" name="pass" value="<?php value("login_pass")?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3 heading">
            <a href="?signup=true" style="color: dodgerblue;">Create an account?</a>
        </div>
        <button type="submit" name="login" class="btn btn-primary mt-3 col-sm-6 offset-sm-3">Login</button>
    </form>

</div>