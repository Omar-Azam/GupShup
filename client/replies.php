<div class="container">
    <form action="./server/requests.php" method="post">
        <div class="mb-3 mt-3">
            <input type="hidden" name="question_id" value="<?php echo $ques_id; ?>">
            <label for="reply" class="form-label">Reply: </label>
            <textarea class="form-control" id="replies" name="replies" rows="3" placeholder="Write your reply!"></textarea>
        </div>
        <button type="submit" name="reply" class="btn btn-primary">Reply</button>
    </form>
    <h5 class="mt-3">Replies: </h5>
    <?php
    $sql = "SELECT * FROM replies WHERE question_id = $ques_id;";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $replies = $row['replies'];
                $user_id = $row['user_id'];
                $sql = "SELECT DISTINCT users.name FROM replies JOIN users ON replies.user_id = users.id WHERE replies.user_id = $user_id;";
                $user_result = $conn->query($sql);
                if ($user_result) {
                    if ($user_result->num_rows == 1) {
                        $user_data = $user_result->fetch_assoc();
                        $user_name = $user_data['name'];
                        echo "<div class='replies mt-3'>";
                        echo "<p>@$user_name: $replies</p>";
                        echo "</div>";
                    }
                }
            }
        }
    }
    ?>
</div>