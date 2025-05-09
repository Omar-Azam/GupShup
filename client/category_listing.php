<div class="category-box">
    <h2 class="heading mb-3 mt-3">Category</h2>
    <div class='category <?php if (!isset($_GET['cate_id'])) {
                                echo "category-active";
                            } ?> row mb-3 p-3'>
        <a href="/omar/gupshup">ALL</a>
    </div>
    <?php
    $sql = "SELECT * FROM category;";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category_name = ucfirst($row['name']);
                $category_id = $row['id'];

                echo "<div class='category row mb-3 p-3 " . (isset($_GET['cate_id']) ? ($category_id == $_GET['cate_id'] ? "category-active" : "") : "") . "'>";
                echo "<a class='' href='?cate_id=$category_id'>$category_name</a>";
                echo "</div>";
            }
        }
    }
    ?>
</div>