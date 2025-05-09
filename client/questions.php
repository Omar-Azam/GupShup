<div class="container">
    <div class="row">

        <div class="col-sm-8">
            <h2 class="heading mb-3 mt-3">Questions</h2>

            <?php
            include('./common/db_connect.php');
            if (isset($_GET['cate_id'])) {
                $cate_id = $_GET['cate_id'];
                $sql = "SELECT * FROM questions WHERE category_id = $cate_id;";
            } elseif (isset($_GET['latest'])) {
                $sql = "SELECT * FROM questions ORDER BY id DESC;";
            } elseif (isset($_GET['myQues']) && isset($_SESSION['user']['name'])) {
                $user_id = $_SESSION['user']['id'];
                $sql = "SELECT * FROM questions WHERE user_id = $user_id;";
            } elseif (isset($_GET['search'])) {
                $search = $_GET['search'];
                $sql = "SELECT * FROM questions WHERE title LIKE '%$search%';";
            } else {
                $sql = "SELECT * FROM questions;";
            }

            if (isset($_GET['myQues']) && isset($_SESSION['user']['name'])) {
                if ($result = $conn->query($sql)) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $title = $row['title'];
                            $id = $row['id'];
                            echo "<form action='./server/requests.php' method='post'>";
                            echo "<input type='hidden' name='id' value='$id'>";
                            echo "<div class='questions mb-3 p-3 d-flex justify-content-between'>";
                            echo "<a class='text-wrap' href='?ques_id=$id'>$title</a>";
                            echo "<input type='submit' name='delete' class='btn btn-primary' value='Delete'>";
                            echo "</div>";
                            echo "</form>";
                        }
                    }
                }
            } else {
                if ($result = $conn->query($sql)) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $title = $row['title'];
                            $id = $row['id'];
                            echo "<div class='questions row mb-3 p-3'>";
                            echo "<a class='text-wrap' href='?ques_id=$id'>$title</a>";
                            echo "</div>";
                        }
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