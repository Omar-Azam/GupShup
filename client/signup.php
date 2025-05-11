<div class="container">

    <h2 class="heading mb-3 mt-3">Sign Up</h2>

    <form action="./server/requests.php" method="post">
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="name" class="form-label">Name: 
                <?php
                error("name_error", 5000);
                ?>
            </label>
            <input type="text" class="form-control" id="name" name="name" value="<?php value("name")?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="email" class="form-label">Email:
                <?php
                error("email_error", 5000);
                ?>
            </label>
            <input type="email" class="form-control" id="email" name="email" value="<?php value("email")?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="pass" class="form-label">Password: 
                <?php
                error("pass_error", 5000);
                ?>
            </label>
            <input type="password" class="form-control" id="pass" name="pass" value="<?php value("pass")?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="conf_pass" class="form-label">Confirm Password: 
                <?php
                error("conf_pass_error", 5000);
                ?>
            </label>
            <input type="password" class="form-control" id="conf_pass" name="conf_pass" value="<?php value("conf_pass")?>">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3 heading">
            <a href="?login=true" style="color: dodgerblue;">Already have an account?</a>
        </div>
        <button type="submit" name="signup" class="btn btn-primary mt-3 col-sm-6 offset-sm-3">Sign Up</button>
    </form>

</div>