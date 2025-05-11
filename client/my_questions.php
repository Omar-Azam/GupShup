<div class="container">
    <div class="row">
        <div class="col-sm-10 offset-sm-1">
        <h2 class="heading mb-3 mt-3">My Questions</h2>
            <?php
            
            include('./common/db_connect.php');

            $user_id = $_SESSION['user']['id'];
            $sql = "SELECT * FROM questions WHERE user_id = $user_id ORDER BY id DESC;";
            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        $id = $row['id'];
                        echo "<form action='./server/requests.php' method='post'>";
                        echo "<input type='hidden' name='id' value='$id'>";
                        echo "<div class='questions mb-3 p-3 d-flex justify-content-between'>";
                        echo "<a class='text-wrap' title='$title' href='?ques_id=$id'>$title</a>";
                        echo "<input type='submit' name='delete' class='btn btn-primary' value='Delete'>";
                        echo "</div>";
                        echo "</form>";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>