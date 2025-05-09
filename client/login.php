<div class="container">
    
    <h2 class="heading mb-3 mt-3">Login</h2>

    <form action="./server/requests.php" method="post">
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="email" class="form-label">Email: 
                <?php
                if (isset($_SESSION['email_do_not_exist'])) {
                    $email_do_not_exist = $_SESSION['email_do_not_exist'];
                    unset($_SESSION['email_do_not_exist']);
                    echo "<span class='error email-do-not-exist'>$email_do_not_exist</span>";
                    echo "<script>
                        setTimeout(()=>{
                            document.querySelector('.email-do-not-exist').style.display = 'none';
                        }, 3000);
                    </script>";
                }
                ?>
            </label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="pass" class="form-label">Password: 
                <?php
                if (isset($_SESSION['passErr'])) {
                    $passErr = $_SESSION['passErr'];
                    unset($_SESSION['passErr']);
                    echo "<span class='error passErr'>$passErr</span>";
                    echo "<script>
                        setTimeout(()=>{
                            document.querySelector('.passErr').style.display = 'none';
                        }, 3000);
                    </script>";
                }
                ?>
            </label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3 heading">
            <a href="?signup=true" style="color: dodgerblue;">Create an account?</a>
        </div>
        <button type="submit" name="login" class="btn btn-primary mt-3 col-sm-6 offset-sm-3">Login</button>
    </form>

</div>