<div class="container">

    <h2 class="heading mb-3 mt-3">Sign Up</h2>

    <form action="./server/requests.php" method="post">
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="name" class="form-label">Name: </label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="email" class="form-label">Email:
                <?php
                if (isset($_SESSION['email_exist'])) {
                    $email_exist = $_SESSION['email_exist'];
                    unset($_SESSION['email_exist']);
                    echo "<span class='error email-exist'>$email_exist</span>";
                    echo "<script>
                        setTimeout(()=>{
                            document.querySelector('.email-exist').style.display = 'none';
                        }, 3000);
                    </script>";
                }
                ?>
            </label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="pass" class="form-label">Password: </label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <div class="mb-3 col-sm-6 offset-sm-3 heading">
            <a href="?login=true" style="color: dodgerblue;">Already have an account?</a>
        </div>
        <!-- <div class="mb-3 col-sm-6 offset-sm-3">
            <label for="conf_pass" class="form-label">Confirm Password: </label>
            <input type="password" class="form-control" id="conf_pass" name="conf_pass">
        </div> -->
        <button type="submit" name="signup" class="btn btn-primary mt-3 col-sm-6 offset-sm-3">Sign Up</button>
    </form>

</div>