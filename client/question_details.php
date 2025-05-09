<div class="container">
    <div class="row">
        <div class="col-sm-8">

            <h2 class="heading mt-3 mb-3">Question Detail</h2>
            <?php
            include('./common/db_connect.php');
            $ques_id = $_GET['ques_id'];
            $sql = "SELECT * FROM questions WHERE id = $ques_id";
            $result = $conn->query($sql);
            if ($result) {
                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $title = $row['title'];
                    $description = $row['description'];
                    $id = $row['id'];
                    $category_id = $row['category_id'];
                    echo "<h4>Ques: $title</h4>";
                    echo "<h5 class='mt-3'>Description: </h5>";
                    echo "<p>$description</p>";
                    include('./client/replies.php');
                }
            }
            ?>

        </div>
        <div class="col-sm-4">
            <?php include('./client/related_questions.php') ?>
        </div>
    </div>
</div>