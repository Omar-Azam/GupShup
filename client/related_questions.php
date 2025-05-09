<div class="category-box">
    <h2 class="heading mb-3 mt-3">Related Questions</h2>
    <?php
    $sql = "SELECT * FROM questions WHERE category_id = $category_id and id != $id;";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $question_title = $row['title'];
                $question_id = $row['id'];
                    echo "<div title='$question_title' class='category row mb-3 p-3'>";
                    echo "<a class='text-wrap' href='?ques_id=$question_id'>$question_title</a>";
                    echo "</div>";
            }
        }
    }
    ?>
</div>