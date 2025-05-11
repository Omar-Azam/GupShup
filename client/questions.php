<div class="container">
    <div class="row">

        <div class="col-sm-8">
            <h2 class="heading mb-3 mt-3">Questions</h2>

            <?php
            include('./common/db_connect.php');
            if (isset($_GET['cate_id'])) {
                $cate_id = $_GET['cate_id'];
                $sql = "SELECT * FROM questions WHERE category_id = $cate_id ORDER BY id DESC;";
            } elseif (isset($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM questions WHERE title LIKE '%$search%' ORDER BY id DESC;";
            } else {
                $sql = "SELECT * FROM questions ORDER BY id DESC;";
            }

            if ($result = $conn->query($sql)) {
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = $row['title'];
                        $id = $row['id'];
                        echo "<div class='questions row mb-3 p-3'>";
                        echo "<a class='text-wrap' title='$title' href='?ques_id=$id'>$title</a>";
                        echo "</div>";
                    }
                }
            }

            ?>
        </div>
        <div class="col-sm-4">
            <?php include('./client/category_listing.php') ?>
        </div>
    </div>
</div>